<?php

namespace spkm\Jamf\Pro\Requests\ApiAuthentication;

use spkm\Jamf\Pro\Data\Authorization;
use spkm\Jamf\Requests\GetRequest;

/**
 * Get all the Authorization details associated with the current api: GET /auth.
 *
 * Get all the authorization details associated with the current api token
 *
 * @deprecated Jamf deprecated this endpoint on 2020-06-01.
 */
class GetAuthRequest extends GetRequest
{
    protected ?string $dto = Authorization::class;

    /**
     * @param  array<string, mixed>  $options  Query options.
     */
    public function __construct(array $options = [])
    {
        $this->options = $options;
    }

    public function resolveEndpoint(): string
    {
        return '/auth';
    }
}
