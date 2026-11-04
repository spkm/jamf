<?php

namespace spkm\Jamf\Pro\Requests\Oidc;

use spkm\Jamf\Pro\Data\OidcPublicFeaturesResponse;
use spkm\Jamf\Requests\GetRequest;

/**
 * Get the public features of the OIDC configuration: GET /v1/oidc/public-features.
 *
 * Retrieves public OIDC configuration features.
 */
class GetOidcPublicFeaturesV1Request extends GetRequest
{
    protected ?string $dto = OidcPublicFeaturesResponse::class;

    /**
     * @param  array<string, mixed>  $options  Query options.
     */
    public function __construct(array $options = [])
    {
        $this->options = $options;
    }

    public function resolveEndpoint(): string
    {
        return '/v1/oidc/public-features';
    }
}
