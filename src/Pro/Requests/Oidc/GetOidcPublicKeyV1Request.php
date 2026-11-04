<?php

namespace spkm\Jamf\Pro\Requests\Oidc;

use spkm\Jamf\Pro\Data\OidcJwksResponse;
use spkm\Jamf\Requests\GetRequest;

/**
 * Get the public key of the keystore used for signing OIDC messages as a JWT: GET /v1/oidc/public-key.
 *
 * Gets the public key of the keystore used for signing OIDC messages as a JWT
 */
class GetOidcPublicKeyV1Request extends GetRequest
{
    protected ?string $dto = OidcJwksResponse::class;

    /**
     * @param  array<string, mixed>  $options  Query options.
     */
    public function __construct(array $options = [])
    {
        $this->options = $options;
    }

    public function resolveEndpoint(): string
    {
        return '/v1/oidc/public-key';
    }
}
