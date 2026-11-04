<?php

namespace spkm\Jamf\Tests\Fixtures;

use spkm\Jamf\Data\Data;

readonly class ExampleChild extends Data
{
    /**
     * @param  array<string, mixed>  $extra
     */
    public function __construct(
        public ?string $name = null,
        public ?int $size = null,
        public array $extra = [],
    ) {}
}
