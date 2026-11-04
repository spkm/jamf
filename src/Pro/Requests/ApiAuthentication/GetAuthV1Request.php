<?php

namespace spkm\Jamf\Pro\Requests\ApiAuthentication;

use spkm\Jamf\Pro\Data\AuthorizationV1;
use spkm\Jamf\Requests\GetRequest;

/**
 * Get all the Authorization details associated with the current api: GET /v1/auth.
 *
 * Get all the authorization details associated with the current api token
 */
class GetAuthV1Request extends GetRequest
{
    protected ?string $dto = AuthorizationV1::class;

    /**
     * @param  array<string, mixed>  $options  Query options.
     */
    public function __construct(array $options = [])
    {
        $this->options = $options;
    }

    public function resolveEndpoint(): string
    {
        return '/v1/auth';
    }
}
