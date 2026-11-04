<?php

namespace spkm\Jamf\Pro\Data;

use spkm\Jamf\Data\Data;

/**
 * A Ebook record from the Jamf Pro API.
 */
readonly class Ebook extends Data
{
    /**
     * @param  array<string, mixed>  $extra  Fields Jamf sent that the model has no property for.
     */
    public function __construct(
        public ?string $id = null,
        public ?string $name = null,
        public ?string $kind = null,
        public ?string $url = null,
        public ?bool $free = null,
        public ?string $version = null,
        public ?string $author = null,
        /** If true, it will be automatically installed */
        public ?bool $deployAsManaged = null,
        public ?bool $installAutomatically = null,
        public ?string $categoryId = null,
        public ?string $siteId = null,
        public array $extra = [],
    ) {}
}
