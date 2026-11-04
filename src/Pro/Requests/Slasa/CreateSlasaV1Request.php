<?php

namespace spkm\Jamf\Pro\Requests\Slasa;

use spkm\Jamf\Requests\ActionRequest;

/**
 * Accept the SLASA: POST /v1/slasa.
 */
class CreateSlasaV1Request extends ActionRequest
{
    protected string $responseShape = self::NONE;

    /**
     * @param  array<string, mixed>  $options  Query options.
     */
    public function __construct(array $options = [])
    {
        $this->options = $options;
    }

    public function resolveEndpoint(): string
    {
        return '/v1/slasa';
    }
}
