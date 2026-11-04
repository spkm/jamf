<?php

namespace spkm\Jamf\Pro\Data;

use Carbon\CarbonImmutable;
use spkm\Jamf\Data\Data;

/**
 * The tenant's currently selected OIDC broker IdP configuration. Secret fields (clientSecret, privateKeyJwt) are
 * never included in the response. The three enum-valued fields are always present but may be null â an unrecognized
 * value from a newer authentication service is read as null rather than...
 */
readonly class OidcBrokerConfig extends Data
{
    /**
     * @param  list<string>|null  $capabilities
     * @param  list<string>|null  $scopes
     * @param  list<string>|null  $redirectUris
     * @param  array<string, mixed>  $extra  Fields Jamf sent that the model has no property for.
     */
    public function __construct(
        public ?string $id = null,
        public ?string $clientType = null,
        /** Read this before updating to determine whether an update changes the client authentication method, which requires supplying the new method's credential. */
        public ?string $clientAuthMethod = null,
        public ?string $productUsernameClaim = null,
        public ?string $productUserMapping = null,
        /** A broker configuration carries ADMIN_SSO; an update preserves whatever is already stored rather than replacing it. The other values exist for non-broker IdP configurations. */
        public ?array $capabilities = null,
        public ?string $discoveryUrl = null,
        public ?string $clientId = null,
        public ?array $scopes = null,
        public ?array $redirectUris = null,
        public ?bool $enabled = null,
        public ?CarbonImmutable $createdAt = null,
        public ?CarbonImmutable $updatedAt = null,
        public array $extra = [],
    ) {}
}
