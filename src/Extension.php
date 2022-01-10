<?php

declare(strict_types=1);

namespace Positron48\PrismCodeHighlight;

use Bolt\Extension\BaseExtension;
use Symfony\Component\Filesystem\Filesystem;

class Extension extends BaseExtension
{
    /**
     * @return string
     */
    public function getName(): string
    {
        return 'Prism syntax highlight';
    }

    /**
     * Loads the Prism script and styles.
     *
     * styles in the <head> and script in the <body>.
     */
    public function initialize(): void
    {
        $this->addWidget(new PrismCodeHighlightHeadWidget());
        $this->addWidget(new PrismCodeHighlightBodyWidget());
    }

    public function install(): void
    {
        $projectDir = $this->getContainer()->getParameter('kernel.project_dir');
        $public = $this->getContainer()->getParameter('bolt.public_folder');

        $source = dirname(__DIR__) . '/assets/';
        $destination = $projectDir . '/' . $public . '/assets/';

        $filesystem = new Filesystem();
        $filesystem->mirror($source, $destination);
    }
}
