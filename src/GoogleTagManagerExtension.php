<?php

namespace Bolt\Extension\StevenKnibbs\GoogleTagManager;

use Bolt\Asset\Snippet\Snippet;
use Bolt\Asset\Target;
use Bolt\Controller\Zone;
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
            if ($config['zones']['frontend'] === true) {
                $assets[] = $this->createHeadCallback(Zone::FRONTEND);
                $assets[] = $this->createBodyCallback(Zone::FRONTEND);
            }

            if ($config['zones']['backend'] === true) {
                $assets[] = $this->createHeadCallback(Zone::BACKEND);
                $assets[] = $this->createBodyCallback(Zone::BACKEND);
            }
        }

        return $assets;
    }

    /**
     * @param string $zone
     * @return Snippet
     */
    private function createHeadCallback($zone)
    {
        $asset = new Snippet();
        $asset->setCallback([$this, 'insertAnalyticsInHead'])
            ->setLocation(Target::BEFORE_HEAD_META)
            ->setPriority(99)
            ->setZone($zone);

        return $asset;
    }

    /**
     * @param string $zone
     * @return Snippet
     */
    private function createBodyCallback($zone)
    {
        $asset = new Snippet();
        $asset->setCallback([$this, 'insertAnalyticsInBody'])
            ->setLocation(Target::START_OF_BODY)
            ->setPriority(99)
            ->setZone($zone);

        return $asset;
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
            'containerid' => '',
            'zones' => [
                'frontend' => true,
                'backend' => false
            ]
        ];
    }
}
