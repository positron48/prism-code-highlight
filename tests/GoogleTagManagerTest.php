<?php

namespace Bolt\Extension\StevenKnibbs\GoogleTagManager\Tests;

use Bolt\Extension\StevenKnibbs\GoogleTagManager\GoogleTagManagerExtension;
use Bolt\Tests\BoltUnitTest;

/**
 * This test ensures the TagManager Loads correctly.
 *
 **/

class GoogleTagManagerTest extends BoltUnitTest
{
    /**
     *
     */
    public function testExtensionLoad()
    {
        $app = $this->getApp(false);
        $extension = new GoogleTagManagerExtension($app);
        $name = $extension->getName();
        $this->assertSame($name, 'GoogleTagManager');
        $this->assertInstanceOf('\Bolt\Extension\ExtensionInterface', $extension);
    }
}