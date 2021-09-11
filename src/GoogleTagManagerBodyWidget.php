<?php

declare(strict_types=1);

namespace StevenKnibbs\GoogleTagManager;

use Bolt\Widget\BaseWidget;
use Bolt\Widget\Injector\AdditionalTarget;
use Bolt\Widget\Injector\RequestZone;
use Bolt\Widget\TwigAwareInterface;

/**
 * Adds Google Tag Manager script into top of the <body> tag.
 */
class GoogleTagManagerBodyWidget extends BaseWidget implements TwigAwareInterface
{
    use WidgetTrait;

    protected $name = 'Google Tag Manager Body Widget';
    protected $target = AdditionalTarget::START_OF_BODY;
    protected $priority = 200;
    protected $template = '@google-tag-manager-body-widget/body.twig';
    protected $cacheDuration = 0;

    /**
     * Because the extension config controls which zone the widget is loaded
     * in, the default zone needs to be set to everywhere.
     *
     * @var string
     */
    protected $zone = RequestZone::EVERYWHERE;

    /**
     * @param array $params
     *
     * @return string|null
     */
    public function run(array $params = []): ?string
    {
        return $this->build();
    }
}
