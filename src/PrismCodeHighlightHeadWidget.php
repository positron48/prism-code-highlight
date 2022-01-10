<?php

declare(strict_types=1);

namespace Positron48\PrismCodeHighlight;

use Bolt\Widget\BaseWidget;
use Bolt\Widget\Injector\AdditionalTarget;
use Bolt\Widget\Injector\RequestZone;
use Bolt\Widget\TwigAwareInterface;

/**
 * Adds Google Tag Manager script into top of the <head> tag.
 */
class PrismCodeHighlightHeadWidget extends BaseWidget implements TwigAwareInterface
{
    use WidgetTrait;

    protected $name = 'Prism Code Highlight Head Widget';
    protected $target = AdditionalTarget::AFTER_HEAD_META;
    protected $priority = 200;
    protected $template = '@prism-code-highlight-head-widget/head.twig';
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
