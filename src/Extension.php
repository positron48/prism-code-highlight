<?php

declare(strict_types=1);

namespace Positron48\PrismCodeHighlight;

use Bolt\Extension\BaseExtension;

class Extension extends BaseExtension
{
    /**
     * @return string
     */
    public function getName(): string
    {
        return 'Google Tag Manager';
    }

    /**
     * Loads the Google Tag Manager Scripts.
     *
     * Script comes in 2 parts - one goes in the <body> tag, the other goes
     * in the <head>.
     */
    public function initialize(): void
    {
        $this->addWidget(new PrismCodeHighlightHeadWidget());
        $this->addWidget(new PrismCodeHighlightBodyWidget());
    }
}
