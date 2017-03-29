<?php

namespace Bolt\Extension\StevenKnibbs\GoogleTagManager;

use Bolt\Asset\Snippet\Snippet;
use Bolt\Asset\Target;
use Bolt\Extension\SimpleExtension;

/**
 * Google Tag Manager extension class.
 *
 * @author Steven Knibbs <stevenknibbs@gmail.com>
 */
class GoogleTagManagerExtension extends SimpleExtension
{
    /**
     * @return array
     */
    function registerAssets()
    {
        $config = $this->getConfig();

        $assets = array();

        if ($config['containerid'] != '') {
            $asset = new Snippet();
            $asset->setCallback([$this, 'insertAnalyticsInHead'])
                ->setLocation(Target::BEFORE_HEAD_META)
                ->setPriority(99);

            $assets[] = $asset;

            $asset = new Snippet();
            $asset->setCallback([$this, 'insertAnalyticsInBody'])
                ->setLocation(Target::START_OF_BODY)
                ->setPriority(99);

            $assets[] = $asset;
        }

        return $assets;
    }

    /**
     * @return string
     */
    public function insertAnalyticsInHead()
    {
        $config = $this->getConfig();
        $variables = array('containerid' => $config['containerid']);

        return $this->renderTemplate('head.twig', $variables);
    }

    /**
     * @return string
     */
    public function insertAnalyticsInBody()
    {
        $config = $this->getConfig();
        $variables = array('containerid' => $config['containerid']);

        return $this->renderTemplate('body.twig', $variables);
    }

    /**
     * @return array
     */
    protected function getDefaultConfig()
    {
        return [
            'containerid' => ''
        ];
    }
}
