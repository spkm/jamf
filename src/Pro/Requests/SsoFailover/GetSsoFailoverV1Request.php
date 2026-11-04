<?php

namespace spkm\Jamf\Pro\Requests\SsoFailover;

use spkm\Jamf\Pro\Data\SsoFailoverData;
use spkm\Jamf\Requests\GetRequest;

/**
 * Retrieve the current failover settings: GET /v1/sso/failover.
 */
class GetSsoFailoverV1Request extends GetRequest
{
    protected ?string $dto = SsoFailoverData::class;

    /**
     * @param  array<string, mixed>  $options  Query options.
     */
    public function __construct(array $options = [])
    {
        $this->options = $options;
    }

    public function resolveEndpoint(): string
    {
        return '/v1/sso/failover';
    }
}
