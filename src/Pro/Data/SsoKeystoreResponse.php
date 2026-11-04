<?php

namespace spkm\Jamf\Pro\Data;

use Illuminate\Support\Collection;
use spkm\Jamf\Data\Data;

/**
 * A SsoKeystoreResponse record from the Jamf Pro API.
 */
readonly class SsoKeystoreResponse extends Data
{
    protected const LISTS = ['keys' => CertificateKey::class];

    protected const HIDDEN = ['keystoreFileName'];

    /**
     * @param  Collection<int, CertificateKey>|null  $keys
     * @param  array<string, mixed>  $extra  Fields Jamf sent that the model has no property for.
     */
    public function __construct(
        public ?string $key = null,
        public ?Collection $keys = null,
        public ?string $type = null,
        public ?string $keystoreSetupType = null,
        public ?string $keystoreFileName = null,
        public array $extra = [],
    ) {}
}
