<?php

namespace spkm\Jamf\Pro\Data;

use spkm\Jamf\Data\Data;

/**
 * A ApiIntegrationResponse record from the Jamf Pro API.
 */
readonly class ApiIntegrationResponse extends Data
{
    /**
     * @param  list<string>|null  $authorizationScopes
     * @param  array<string, mixed>  $extra  Fields Jamf sent that the model has no property for.
     */
    public function __construct(
        public ?int $id = null,
        public ?array $authorizationScopes = null,
        public ?string $displayName = null,
        public ?bool $enabled = null,
        public ?int $accessTokenLifetimeSeconds = null,
        /** Type of API Client: * `CLIENT_CREDENTIALS` - A client ID and secret have been generated for this integration. * `NATIVE_APP_OAUTH` - A native app (i.e., Jamf Reset) has been linked to this... */
        public ?string $appType = null,
        public ?string $clientId = null,
        public array $extra = [],
    ) {}
}
