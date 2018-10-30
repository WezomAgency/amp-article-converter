<?php

namespace WezomAgency\Amp\Elements;

use WezomAgency\Amp\Core\AmpAbstractConvertElement;

class AmpConvertFont2Span extends AmpAbstractConvertElement
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

    protected function processingImportantAttributes()
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
            if ($size !== null && is_numeric($size)) {
                $intsize = intval($size);
                if ($intsize > 7) {
                    $size = '7';
                } elseif ($intsize < -7 || $intsize === 0) {
                    $size = '-7';
                }


                switch ('x' . $size) {
                    case 'x1':
                    case 'x-2':
                    case 'x-3':
                    case 'x-4':
                    case 'x-5':
                    case 'x-6':
                    case 'x-7':
                        $size = 'x-small';
                        break;
                    case 'x2':
                    case 'x-1':
                        $size = 'small';
                        break;
                    case 'x3':
                        $size = 'medium';
                        break;
                    case 'x4':
                    case 'x+1':
                        $size = 'large';
                        break;
                    case 'x5':
                    case 'x+2':
                        $size = 'x-large';
                        break;
                    case 'x6':
                    case 'x+3':
                        $size = 'xx-large';
                        break;
                    case 'x7':
                    case 'x+4':
                    case 'x+5':
                    case 'x+6':
                    case 'x+7':
                        $size = '3rem;font-size:-webkit-xxx-large';
                        break;
                    default:
                        $size = null;
                }
                if ($size) {
                    array_push($this->savedAttrsValues, 'font-size:' . $size);
                }
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
