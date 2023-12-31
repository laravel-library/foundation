<?php

namespace Tests\Unit\Kernel;

use Elephant\FoundationServiceProvider;
use Illuminate\Container\Container;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

class ServiceProviderTest extends TestCase
{
    #[DataProvider('initContainer')]
    public function testProvider(Container $container): void
    {
        $provider = $this->getProvider($container);

        $this->assertIsObject($provider);
    }

    protected function getProvider(Container $container): FoundationServiceProvider
    {
        return new FoundationServiceProvider($container);
    }

    public static function initContainer(): array
    {
        return [
            [self::getApp()],
        ];
    }

    protected static function getApp(): Container
    {
        return Container::getInstance();
    }
}