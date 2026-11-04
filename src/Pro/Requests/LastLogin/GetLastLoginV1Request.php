<?php

namespace spkm\Jamf\Pro\Requests\LastLogin;

use spkm\Jamf\Pro\Data\LastLoginResponse;
use spkm\Jamf\Requests\GetRequest;

/**
 * Get the date of the last login event: GET /v1/last-login.
 *
 * Returns the date of the last login event.
 */
class GetLastLoginV1Request extends GetRequest
{
    protected ?string $dto = LastLoginResponse::class;

    /**
     * @param  array<string, mixed>  $options  Query options.
     */
    public function __construct(array $options = [])
    {
        $this->options = $options;
    }

    public function resolveEndpoint(): string
    {
        return '/v1/last-login';
    }
}
