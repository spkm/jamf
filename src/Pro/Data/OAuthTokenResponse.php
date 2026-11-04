<?php

namespace spkm\Jamf\Pro\Data;

use spkm\Jamf\Data\Data;

/**
 * A OAuthTokenResponse record from the Jamf Pro API.
 */
readonly class OAuthTokenResponse extends Data
{
    /**
     * @param  array<string, mixed>  $extra  Fields Jamf sent that the model has no property for.
     */
    public function __construct(
        public ?string $access_token = null,
        public ?string $token_type = null,
        /** Space-delimited list of API Roles, formatted and identified by ID like `api-role:{apiRoleId}`. */
        public ?string $scope = null,
        /** Seconds until this access token is expired. This will reflect the `accessTokenLifetimeSeconds` value configured on your API Client. */
        public ?int $expires_in = null,
        public array $extra = [],
    ) {}
}
