<?php

namespace Bolt\Extension\StevenKnibbs\GoogleTagManager\Tests;

use Bolt\Extension\StevenKnibbs\GoogleTagManager\GoogleTagManagerExtension;
use Bolt\Tests\BoltUnitTest;

/**
 * Class GoogleTagManagerTest
 * @package Bolt\Extension\StevenKnibbs\GoogleTagManager\Tests
 * @author Steven Knibbs <stevenknibbs@gmail.com>
 */
class GoogleTagManagerTest extends BoltUnitTest
{
    /**
     * Test the extension loads correctly.
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