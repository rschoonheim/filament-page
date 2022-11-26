<?php

declare(strict_types=1);

namespace Rschoonheim\FilamentPage\Component\Interfaces;

interface ComponentTypes
{
    /**
     * A singleton component is a component that only
     * can be configured once. E.g. a navigation bar.
     *
     * @var string
     */
    public const SINGLETON = 'singleton';

    /**
     * A standard component is a component that can be
     * configured multiple times. E.g. a card.
     *
     * @var string
     */
    public const STANDARD = 'standard';

}