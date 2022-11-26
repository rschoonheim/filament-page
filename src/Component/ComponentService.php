<?php

declare(strict_types=1);

namespace Rschoonheim\FilamentPage\Component;

use Illuminate\Contracts\Filesystem\Filesystem;
use Illuminate\Support\Facades\Storage;
use Rschoonheim\FilamentPage\Component\Exceptions\InvalidComponentDefinitionException;
use Rschoonheim\FilamentPage\Component\Interfaces\ComponentDefinitionStructure;
use Symfony\Component\Yaml\Yaml;

/** @internal  */
class ComponentService
{
    /**
     * Scan the given directory for component definitions and load them
     * into the component registry.
     *
     * @param  string  $directoryPath
     * @return void
     *
     * @throws InvalidComponentDefinitionException
     */
    public function loadFrom(string $directoryPath): void
    {
        $filesystem = Storage::build([
            'driver' => 'local',
            'root' => $directoryPath,
        ]);
        $files = $filesystem->files();
        $this->registerComponentDefinitions($files, $filesystem);
    }

    /**
     * Scan the given directory and its subdirectories for component definitions and load them
     * into the component registry.
     *
     * @param  string  $directoryPath
     * @return void
     *
     * @throws InvalidComponentDefinitionException
     */
    public function loadAllFrom(string $directoryPath): void
    {
        $filesystem = Storage::build([
            'driver' => 'local',
            'root' => $directoryPath,
        ]);
        $files = $filesystem->allFiles();
        $this->registerComponentDefinitions($files, $filesystem);
    }

    private function registerComponentDefinitions(array $files, Filesystem $storage): void
    {
        $ymlFiles = array_filter(
            $files,
            fn ($file) => pathinfo($file, PATHINFO_EXTENSION) === 'yml'
        );

        // Process the YML files and register the component definitions.
        foreach ($ymlFiles as $file) {
            $componentDefinition = Yaml::parse($storage->get($file));

            // Validate the component definition.
            //
            $validator = validator(
                $componentDefinition,
                ComponentDefinitionStructure::LARAVEL_VALIDATION_RULES
            );

            if ($validator->fails()) {
                throw new InvalidComponentDefinitionException('Component definition is invalid. File: '.$file.' Error: '.$validator->errors());
            }
        }
    }
}
