<?php

declare(strict_types=1);

namespace Rschoonheim\FilamentPage\Component\Interfaces;

/**
 * This file describes what a component definition structure
 * looks like. It is used to validate the structure of a
 * YML component definition.
 *
 * @package Rschoonheim\FilamentPage\Component
 */
interface ComponentDefinitionStructure
{
    public const LARAVEL_VALIDATION_RULES = [
        'name' => ['required', 'string'],
        'type' => ['required', 'string', 'in:singleton,standard'],
        'resources.website_view.path' => ['required', 'string'],
        'resources.admin_view.path' => ['required', 'string'],
    ];
}