<?php

namespace Bolt\Extension\StevenKnibbs\GoogleTagManager\Tests;

use Bolt\Extension\StevenKnibbs\GoogleTagManager\GoogleTagManagerExtension;
use Bolt\Tests\BoltUnitTest;

class GoogleTagManagerTestBase extends BoltUnitTest {
	protected function createGoogleTagManager()
    {
    	$app = $this->getApp(false);
        return new GoogleTagManagerExtension($app);
    }
}