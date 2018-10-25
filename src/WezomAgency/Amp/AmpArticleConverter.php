<?php

namespace WezomAgency\Amp;

use WezomAgency\Amp\Core\AmpAbstractConverter;
use WezomAgency\Amp\Elements\AmpFont2SpanConverter;

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
            new AmpFont2SpanConverter($element, $configuration);
        }
    }
}
