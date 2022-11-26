<?php

declare(strict_types=1);

namespace Rschoonheim\FilamentPage\Tests\Suites\Unit;

use Rschoonheim\FilamentPage\Component\ComponentService;
use Rschoonheim\FilamentPage\FilamentComponent;
use Rschoonheim\FilamentPage\Tests\BaseTestCase;

class FilamentComponentTest extends BaseTestCase
{
    /** @test */
    public function can_resolve_facade_accessor_from_container(): void
    {
        $this->assertInstanceOf(
            ComponentService::class,
            FilamentComponent::getFacadeRoot()
        );
    }

    /** @test */
    public function can_load_component_definitions_from_given_path(): void
    {
        FilamentComponent::loadFrom(
            $this->getUtilitiesDirectory() . '/Fixtures/Component/Definitions'
        );


    }

}