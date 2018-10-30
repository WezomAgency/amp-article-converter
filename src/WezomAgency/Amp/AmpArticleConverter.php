<?php

namespace WezomAgency\Amp;

use WezomAgency\Amp\Core\AmpAbstractConverter;
use WezomAgency\Amp\Elements\AmpConvertFont2Span;

class AmpArticleConverter extends AmpAbstractConverter
{
    public function convertAll () {
        $this->covertFont2Span('font');
    }

    /**
     * @param string $selector
     * @param array $configuration
     */
    public function covertFont2Span ($selector, $configuration = []) {
        $elements = $this->html->find($selector);
        foreach ($elements as $element) {
            new AmpConvertFont2Span($element, $configuration);
        }
    }
}
