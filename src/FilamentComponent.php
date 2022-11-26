<?php

declare(strict_types=1);

namespace Rschoonheim\FilamentPage;

use Illuminate\Support\Facades\Facade;
use Rschoonheim\FilamentPage\Component\ComponentService;

/**
 * Component management facade for
 * the Filament Page Builder package.
 *
 * @method static void loadFrom(string $directoryPath) | Loads component definitions from the given path.
 * @method static void loadRecursiveFrom(string $directoryPath) | Loads component definitions from the given path recursively.
 */
class FilamentComponent extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return ComponentService::class;
    }
}
