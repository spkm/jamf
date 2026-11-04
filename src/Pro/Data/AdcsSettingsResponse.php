<?php

namespace spkm\Jamf\Pro\Data;

use Carbon\CarbonImmutable;
use spkm\Jamf\Data\Data;

/**
 * A AdcsSettingsResponse record from the Jamf Pro API.
 */
readonly class AdcsSettingsResponse extends Data
{
    /**
     * @param  array<string, mixed>  $extra  Fields Jamf sent that the model has no property for.
     */
    public function __construct(
        public ?string $id = null,
        public ?string $displayName = null,
        public ?string $caName = null,
        public ?string $fqdn = null,
        public ?string $adcsUrl = null,
        public ?AdcsCertificateResponse $serverCert = null,
        public ?AdcsCertificateResponse $clientCert = null,
        public ?bool $revocationEnabled = null,
        public ?string $apiClientId = null,
        public ?bool $outbound = null,
        public ?CarbonImmutable $connectorLastCheckInTimestamp = null,
        public array $extra = [],
    ) {}
}
