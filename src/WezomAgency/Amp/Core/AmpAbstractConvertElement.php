<?php

namespace WezomAgency\Amp\Core;


abstract class AmpAbstractConvertElement extends AmpAbstractConverter
{
    /** @type string */
    protected $noscript = '';

    public function __construct($html, array $configuration = [])
    {
        parent::__construct($html, $configuration);

        if ($this->hasHtml()) {
            $this->processingNecessaryAttributes();
            $this->removeProhibitedAttributes();
            $this->noScriptFallback();
            $this->changeTagName();
            $this->finish();
        }
    }

    protected function removeProhibitedAttributes () {}

    protected function processingNecessaryAttributes () {}

    protected function noScriptFallback() {}

    protected function changeTagName () {}

    protected function finish() {}
}
