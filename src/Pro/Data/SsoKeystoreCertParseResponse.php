<?php

namespace spkm\Jamf\Pro\Data;

use Illuminate\Support\Collection;
use spkm\Jamf\Data\Data;

/**
 * A SsoKeystoreCertParseResponse record from the Jamf Pro API.
 */
readonly class SsoKeystoreCertParseResponse extends Data
{
    protected const LISTS = ['keys' => CertificateKey::class];

    protected const HIDDEN = ['keystoreFile'];

    /**
     * @param  Collection<int, CertificateKey>|null  $keys
     * @param  list<string>|null  $keystoreFile
     * @param  array<string, mixed>  $extra  Fields Jamf sent that the model has no property for.
     */
    public function __construct(
        public ?string $key = null,
        public ?Collection $keys = null,
        public ?string $type = null,
        public ?string $keystoreSetupType = null,
        public ?array $keystoreFile = null,
        public ?string $keystoreFileName = null,
        public array $extra = [],
    ) {}
}
