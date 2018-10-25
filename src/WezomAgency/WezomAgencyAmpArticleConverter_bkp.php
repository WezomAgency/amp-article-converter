<?php

namespace WezomAgency;

use Sunra\PhpSimple\HtmlDomParser;
use WezomAgency\Elements\AbstractFont2SpanConverter;


class WezomAgencyAmpArticleConverterBkp
{
    /**
     * AmpArticleConverter constructor.
     * @param string $html
     * @param object $config
     */
    public function __construct($html, $config = null)
    {
        $this->dom = HtmlDomParser::str_get_html($html);

        $_config = $config ?: (object)[];
        $this->img_common_layout = $_config->img_common_layout ?: 'responsive';
        $this->img_common_lightbox = $_config->img_common_lightbox === true;
        $this->noscript_fallback = $_config->noscript_fallback !== false;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        if ($this->dom) {
            return $this->dom . '';
        }
        return '';
    }

    /** @var \simplehtmldom_1_5\simple_html_dom */
    protected $dom = null;

    /** @var string */
    protected $dataAttrElementConverted = 'data-amp-article-converted';

    /** @var bool */
    protected $noscript_fallback = null;

    /** @var bool */
    protected $img_common_layout = null;

    /** @var bool */
    protected $img_common_lightbox = null;

    /**
     * @param \simplehtmldom_1_5\simple_html_dom_node|\simplehtmldom_1_5\simple_html_dom_node[] $element
     * @return string
     */
    protected function noscriptFallback ($element) {
        if ($this->noscript_fallback) {
            return '<noscript>' . $element->outertext . '</noscript>';
        }
        return '';
    }

    /**
     * @param \simplehtmldom_1_5\simple_html_dom_node|\simplehtmldom_1_5\simple_html_dom_node[] $element
     * @param string $attr
     * @return bool
     */
    protected function mustBeHTTPS($element, $attr)
    {
        $url = $element->attr[$attr];
        return strpos(strtolower($url), 'https://') === 0;
    }

    /**
     * @param \simplehtmldom_1_5\simple_html_dom_node $element
     * @param string $layout
     * @return bool
     */
    protected function layoutCheck ($element, $layout) {
        $flag = false;

        $width = $element->attr['width'];
        if (strpos($width, '%') !== false) {
            $width = null;
        };

        $height = $element->attr['height'];
        if (strpos($height, '%') !== false) {
            $height = null;
        }

        switch ($layout) {
            case 'fixed':
            case 'responsive':
            case 'intrinsic':
                $flag = $width && $height;
                break;

            case 'fixed-height':
                $flag = $height;
                if ($width) {
                    $element->setAttribute('width', 'auto');
                }
                break;

            case 'nodisplay':
            case 'fill':
            case 'container':
            case 'flex-item':
                $flag = true;
                break;
        }
        return $flag;
    }

    public function removeProhibitedElements()
    {
        $this->removeElements([
            'font',
            'style',
            'script',
            'frame',
            'frameset',
            'object',
            'param',
            'applet',
            'embed'
        ]);
    }

    public function removeProhibitedAttributes()
    {
        // borders
        $elements = $this->getElements('[border]');
        foreach ($elements as $element) {
            switch ($element->tag) {
                case 'table':
                    break;
                default:
                    $element->removeAttribute('border');
            }
        }

        $elements = $this->getElements('a');
        foreach ($elements as $element) {
            $target = strtolower($element->attr['target']);
            $href = strtolower($element->attr['href']);
            if ($target) {
                if ($target === '_self' || $target === '_parent' || $target === '_top') {
                    $element->removeAttribute('target');
                }
                $element->setAttribute('target', '_blank');
            }

            if (strpos($href, 'javascript:') !== false) {
                $element->removeAttribute('href');
            }
        }

        $elements = $this->getElements('[style]');
        foreach ($elements as $element) {
            $style = strtolower($element->attr['style']);
            if (strpos($style, '!important')) {
                $style = preg_replace('/!important/', '', $style);
                $element->setAttribute('style', $style);
            }
        }
    }

    public function converAll ()
    {
        $this->convertFont2Span();
        $this->removeProhibitedElements();
        $this->removeProhibitedAttributes();
        $this->convertImg2AmpImg('img', $this->img_common_layout, $this->img_common_lightbox);
        $this->convertAudio2AmpAudio('audio');
    }

    /**
     * @param string $tag
     */
    public function convertFont2Span($tag = 'span')
    {
        $elements = $this->getElements('font');
        foreach ($elements as $element) {
            new AbstractFont2SpanConverter($element)
        }
        /*foreach ($elements as $element) {
            $element->tag = $tag;
            $color = $element->attr['color'];
            $face = $element->attr['face'];
            $style = $element->attr['style'] ?: '';
            $element->removeAttribute('color');
            $element->removeAttribute('face');
            $element->removeAttribute('size');

            if ($color) {
                $style = 'color:' . $color . ';' . $style;
            }
            if ($face) {
                $style = 'font-family:' . $face . ';' . $style;
            }
            if ($color || $face) {
                $element->setAttribute('style', $style);
            }
        }*/
    }

    /**
     * @param string $selector
     * @param string $layout
     * @param int $height
     * @param int|string $width
     */
    public function convertAudio2AmpAudio ($selector = 'audio', $layout = 'fixed-height', $height = 56, $width = 'auto')
    {
        if ($this->dom === false) {
            return;
        }

        $elements = $this->getElements($selector);
        foreach ($elements as $element) {
            if ($element->attr[$this->dataAttrElementConverted]) {
                continue;
            }
            $element->setAttribute($this->dataAttrElementConverted, true);
            $element->setAttribute('controls', true);
            $noscript = $this->noscriptFallback($element);
            if ($this->mustBeHTTPS($element, 'src') !== true) {
                $element->outertext = '';
                continue;
            }

            $element->setAttribute('height', $height);
            $element->setAttribute('width' , $width);
            if ($this->layoutCheck($element, $layout)) {
                $element->tag = 'amp-audio';
                $element->setAttribute('layout', $layout);
                $element->outertext = $element->outertext . $noscript;
            } else {
                $element->outertext = $noscript;
            }
        }

    }

    /**
     * @param string $selector
     * @param string $layout
     * @param bool $lightbox
     */
    public function convertImg2AmpImg ($selector = 'img', $layout = 'responsive', $lightbox = false)
    {
        if ($this->dom === false) {
            return;
        }

        $elements = $this->getElements($selector);
        foreach ($elements as $element) {
            if ($element->attr[$this->dataAttrElementConverted]) {
                continue;
            }
            $element->setAttribute($this->dataAttrElementConverted, true);

            $element->removeAttribute('align');
            $element->removeAttribute('hspace');
            $element->removeAttribute('vspace');
            $element->removeAttribute('longdesc');
            $element->removeAttribute('ismap');
            $element->removeAttribute('usemap');

            $sizes = $element->attr['sizes'];
            $element->removeAttribute('sizes');

            $noscript = $this->noscriptFallback($element);
            if ($this->layoutCheck($element, $layout)) {
                $element->tag = 'amp-img';
                $element->setAttribute('layout', $layout);
                $element->setAttribute('lightbox', $lightbox);
                if (strlen($sizes)) {
                    $size = array_pop(explode(',', strtolower($sizes)));
                    if (!(
                        strpos($size, 'max-') ||
                        strpos($size, 'min-') ||
                        strpos($size, 'screen') ||
                        strpos($size, 'orientation')
                    )) {
                        $element->setAttribute('sizes', $sizes);
                    }
                }
                $element->outertext = $element->outertext . '</amp-img>' . $noscript;
            } else {
                $element->outertext = $noscript;
            }
        }
    }

    /**
     * @param $selector
     * @return \simplehtmldom_1_5\simple_html_dom_node[]
     */
    public function getElements ($selector) {
        return $this->dom->find($selector);
    }

    /**
     * @param string[] $selectors
     */
    public function removeElements($selectors)
    {
        if ($this->dom) {
            foreach ($selectors as $selector) {
                $elements = $this->getElements($selector);
                foreach ($elements as $element) {
                    $element->outertext = '';
                }
            }
        }
    }
}
