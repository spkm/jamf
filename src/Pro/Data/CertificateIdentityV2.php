<?php

namespace spkm\Jamf\Pro\Data;

use spkm\Jamf\Data\Data;

/**
 * A CertificateIdentityV2 record from the Jamf Pro API.
 */
readonly class CertificateIdentityV2 extends Data
{
    protected const HIDDEN = ['keystorePassword'];

    /**
     * @param  array<string, mixed>  $extra  Fields Jamf sent that the model has no property for.
     */
    public function __construct(
        public ?string $filename = null,
        public ?string $keystorePassword = null,
        /** The base 64 encoded certificate. */
        public ?string $identityKeystore = null,
        /** The md5 checksum of the certificate file. Intended to be used in verification the cert being used to sign QuickAdd packages. */
        public ?string $md5Sum = null,
        public array $extra = [],
    ) {}
}
