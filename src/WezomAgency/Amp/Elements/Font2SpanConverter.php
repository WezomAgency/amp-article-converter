<?php

namespace WezomAgency\Amp\Elements;

use WezomAgency\Amp\Core\AbstractElementConverter;

class Font2SpanConverter extends AbstractElementConverter
{
    /** @type bool */
    protected $saveFaceAttrValue = null;

    /** @type bool */
    protected $saveColorAttrValue = null;

    /** @type bool */
    protected $saveSizeAttrValue = null;

    /** @type array */
    protected $savedAttrsValues = [];

    /**
     * @param array $configuration
     */
    protected function setupConfiguration($configuration = [])
    {
        $this->saveFaceAttrValue = $configuration['saveFaceAttrValue'] !== false;
        $this->saveColorAttrValue = $configuration['saveColorAttrValue'] !== false;
        $this->saveSizeAttrValue = $configuration['saveSizeAttrValue'] !== false;
    }

    protected function processingNecessaryAttributes()
    {
        if ($this->saveFaceAttrValue) {
            $face = $this->html->attr['face'];
            if ($face) {
                array_push($this->savedAttrsValues, 'font-family:' . $face);
            }
        }
        if ($this->saveColorAttrValue) {
            $color = $this->html->attr['color'];
            if ($color) {
                array_push($this->savedAttrsValues, 'color:' . $color);
            }
        }
        if ($this->saveSizeAttrValue) {
            $size = $this->html->attr['size'];
            if ($size) {
                array_push($this->savedAttrsValues, 'font-size:' . $size);
            }
        }
    }

    protected function removeProhibitedAttributes()
    {
        $this->html->removeAttribute('face');
        $this->html->removeAttribute('color');
        $this->html->removeAttribute('size');
    }

    protected function changeTagName()
    {
        $this->html->tag = 'span';
    }

    protected function finish()
    {
        if (count($this->savedAttrsValues)) {
            $style = $this->html->attr['style'];
            if ($style) {
                $style = preg_replace('/;\s*$/i', '', $style);
                $style = $style . ';' . implode(';', $this->savedAttrsValues);
            } else {
                $style = implode(';', $this->savedAttrsValues);
            }
            $this->html->setAttribute('style', $style);
        }
    }
}
