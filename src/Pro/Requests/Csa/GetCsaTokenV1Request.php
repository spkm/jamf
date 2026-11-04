<?php

namespace spkm\Jamf\Pro\Requests\Csa;

use spkm\Jamf\Pro\Data\CsaToken;
use spkm\Jamf\Requests\GetRequest;

/**
 * Get details regarding the CSA token exchange: GET /v1/csa/token.
 */
class GetCsaTokenV1Request extends GetRequest
{
    protected ?string $dto = CsaToken::class;

    /**
     * @param  array<string, mixed>  $options  Query options.
     */
    public function __construct(array $options = [])
    {
        $this->options = $options;
    }

    public function resolveEndpoint(): string
    {
        return '/v1/csa/token';
    }
}
