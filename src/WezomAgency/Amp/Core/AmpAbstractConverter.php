<?php

namespace WezomAgency\Amp\Core;

use Sunra\PhpSimple\HtmlDomParser;


abstract class AmpAbstractConverter
{
    /** @type \simplehtmldom_1_5\simple_html_dom_node|\simplehtmldom_1_5\simple_html_dom|bool */
    protected $html = null;

    /**
     * AbstractConverter constructor.
     * @param \simplehtmldom_1_5\simple_html_dom_node|\simplehtmldom_1_5\simple_html_dom|string $html
     * @param array $configuration
     */
    public function __construct($html, $configuration = [])
    {
        if (gettype($html) === 'object') {
            $this->html = $html;
        } elseif (gettype($html) === 'string' && strlen($html)) {
            $this->html = HtmlDomParser::str_get_html($html);
        } else {
            $this->html = false;
        }

        if ($this->hasHtml()) {
            $this->setupConfiguration($configuration);
        }
    }

    /**
     * @param array $configuration
     */
    protected function setupConfiguration($configuration) {}

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->hasHtml() ? $this->html->__toString() : '';
    }

    /**
     * @return bool
     */
    public function hasHtml()
    {
        return gettype($this->html) === 'object';
    }
}
