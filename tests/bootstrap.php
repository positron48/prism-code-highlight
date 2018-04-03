<?php
#include_once __DIR__ . '/../vendor/bolt/bolt/tests/phpunit/bootstrap.php';

    require_once __DIR__ . '/../vendor/autoload.php';

// Install base location
if (!defined('TEST_ROOT')) {
    define('TEST_ROOT', realpath(__DIR__ . '/../vendor/bolt/bolt/'));
}

// PHPUnit's base location
if (!defined('PHPUNIT_ROOT')) {
    define('PHPUNIT_ROOT', realpath(TEST_ROOT . '/tests/phpunit/unit'));
}

// PHPUnit's temporary web root… It doesn't exist yet, so we can't realpath()
if (!defined('PHPUNIT_WEBROOT')) {
    define('PHPUNIT_WEBROOT', dirname(PHPUNIT_ROOT) . '/web-root');
}

define('EXTENSION_AUTOLOAD',  realpath(dirname(__DIR__) . '/vendor/autoload.php'));

require_once EXTENSION_AUTOLOAD;