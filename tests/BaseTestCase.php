<?php

declare(strict_types=1);

namespace Rschoonheim\FilamentPage\Tests;

use Orchestra\Testbench\TestCase;
use Rschoonheim\FilamentPage\Laravel\Providers\FilamentPageBuilderServiceProvider;

abstract class BaseTestCase extends TestCase
{
    protected function getPackageProviders($app)
    {
        return [
            FilamentPageBuilderServiceProvider::class,
        ];
    }

    protected function getUtilitiesDirectory(): string
    {
        return __DIR__.'/Utilities';
    }
}
