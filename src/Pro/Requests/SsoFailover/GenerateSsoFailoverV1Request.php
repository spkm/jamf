<?php

namespace spkm\Jamf\Pro\Requests\SsoFailover;

use spkm\Jamf\Pro\Data\SsoFailoverData;
use spkm\Jamf\Requests\ActionRequest;

/**
 * Regenerates failover url: POST /v1/sso/failover/generate.
 */
class GenerateSsoFailoverV1Request extends ActionRequest
{
    protected string $responseShape = self::ONE;

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
        return '/v1/sso/failover/generate';
    }
}
