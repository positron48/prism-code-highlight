<?php

declare(strict_types=1);

namespace StevenKnibbs\GoogleTagManager;

use Bolt\Widget\Injector\RequestZone;

trait WidgetTrait
{
    /**
     * Gets an extension config value.
     *
     * @param string $key
     *
     * @return mixed
     */
    private function getConfig(string $key)
    {
        return $this->extension->getConfig()->get($key);
    }

    /**
     * Determines whether the widget is
     *
     * @return bool
     */
    private function isEnabled()
    {
        $zones = $this->getConfig('zones');

        // if zones are not set, then assume it shouldn't be shown anywhere.
        if (!is_array($zones) || count($zones) === 0) {
            return false;
        }

        $request = $this->extension->getRequest();

        foreach ($zones as $zone => $isEnabled) {
            if (!$isEnabled) {
                continue;
            }

            // Config only accepts backend and frontend, not async.
            if (!in_array($zone, [RequestZone::FRONTEND, RequestZone::BACKEND])) {
                continue;
            }

            if (!RequestZone::is($request, $zone)) {
                continue;
            }

            // We're in the right zone and it's enabled in config.
            return true;
        }

        return false;
    }

    /**
     * @return string|null
     */
    private function build(): ?string
    {
        $containerId = $this->getConfig('containerid');

        if (empty($containerId)) {
            return null;
        }

        if ($this->isEnabled()) {
            return parent::run(['containerid' => $containerId]);
        }

        return null;
    }
}
