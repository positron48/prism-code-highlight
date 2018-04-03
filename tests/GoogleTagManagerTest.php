<?php

namespace Bolt\Extension\StevenKnibbs\GoogleTagManager\Tests;

/**
 * Class GoogleTagManagerTest
 * @package Bolt\Extension\StevenKnibbs\GoogleTagManager\Tests
 * @author Steven Knibbs <stevenknibbs@gmail.com>
 */
class GoogleTagManagerTest extends GoogleTagManagerTestBase
{
    /**
     * Test the extension loads correctly.
     */
    public function testExtensionLoad()
    {
        $extension = $this->createGoogleTagManager();

        $name = $extension->getName();
        $this->assertSame($name, 'GoogleTagManager');
        $this->assertInstanceOf('\Bolt\Extension\ExtensionInterface', $extension);
    }

    /**
     * 
     */
    public function testExtensionComposerJson()
    {
        $composerJson = json_decode(file_get_contents(dirname(__DIR__) . '/composer.json'), true);

        // Check that the 'bolt-class' key correctly matches an existing class
        $this->assertArrayHasKey('bolt-class', $composerJson['extra']);
        $this->assertTrue(class_exists($composerJson['extra']['bolt-class']));
    }
}