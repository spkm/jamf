<?php

namespace spkm\Jamf\Pro\Requests\GsxConnection;

use spkm\Jamf\Requests\ActionRequest;

/**
 * Test functionality of an GSX Connection: POST /v1/gsx-connection/test.
 */
class TestGsxConnectionV1Request extends ActionRequest
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
        return '/v1/gsx-connection/test';
    }
}
