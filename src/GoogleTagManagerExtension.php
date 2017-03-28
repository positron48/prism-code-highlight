<?php

namespace Bolt\Extension\StevenKnibbs\GoogleTagManager;

use Bolt\Asset\Snippet\Snippet;
use Bolt\Asset\Target;
use Bolt\Extension\SimpleExtension;

/**
 * Google Tag Manager extension class.
 *
 * @author Steven Knibbs <steven.knibbs@gmail.com>
 */
class GoogleTagManagerExtension extends SimpleExtension
{
    /**
     * @return array
     */
    function registerAssets()
    {
        $headAsset = new Snippet();
        $headAsset->setCallback([$this, 'callbackHeadAsset'])
            ->setLocation(Target::BEFORE_HEAD_META)
            ->setPriority(99);

        $bodyAsset = new Snippet();
        $bodyAsset->setCallback([$this, 'callbackBodyAsset'])
            ->setLocation(Target::START_OF_BODY)
            ->setPriority(99);

        return [
            $headAsset,
            $bodyAsset
        ];
    }

    /**
     * @return string
     */
    public function callbackHeadAsset()
    {
        return '<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({\'gtm.start\':
new Date().getTime(),event:\'gtm.js\'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!=\'dataLayer\'?\'&l=\'+l:\'\';j.async=true;j.src=
\'https://www.googletagmanager.com/gtm.js?id=\'+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,\'script\',\'dataLayer\',\'GTM-TQP9LD\');</script>
<!-- End Google Tag Manager -->';
    }

    /**
     * @return string
     */
    public function callbackBodyAsset()
    {
        return '<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-TQP9LD"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->';
    }
}
