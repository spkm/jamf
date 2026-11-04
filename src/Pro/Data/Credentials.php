<?php

namespace spkm\Jamf\Pro\Data;

use spkm\Jamf\Data\Data;

/**
 * A Credentials record from the Jamf Pro API.
 */
readonly class Credentials extends Data
{
    protected const HIDDEN = ['secretAccessKey'];

    /**
     * @param  array<string, mixed>  $extra  Fields Jamf sent that the model has no property for.
     */
    public function __construct(
        public ?string $accessKeyID = null,
        public ?int $expiration = null,
        public ?string $secretAccessKey = null,
        public ?string $sessionToken = null,
        public ?string $region = null,
        public ?string $bucketName = null,
        public ?string $path = null,
        public ?string $uuid = null,
        public array $extra = [],
    ) {}
}
