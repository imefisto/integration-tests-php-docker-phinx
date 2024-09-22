<?php declare(strict_types=1);
namespace ExampleApp\Testing\Integration;

use PHPUnit\Framework\TestCase;

class IntegrationTestCase extends TestCase
{
    protected static $bootstrapped = false;

    public static function setUpBeforeClass(): void
    {
        if (!self::$bootstrapped) {
            require_once __DIR__ . '/bootstrap.php';
            self::$bootstrapped = true;
        }
    }
}
