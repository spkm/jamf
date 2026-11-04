<?php

namespace spkm\Jamf\Pro\Requests\GsxConnection;

use spkm\Jamf\Pro\Data\GsxConnection;
use spkm\Jamf\Requests\GetRequest;

/**
 * Finds the Jamf Pro GSX Connection information: GET /v1/gsx-connection.
 */
class GetGsxConnectionV1Request extends GetRequest
{
    protected ?string $dto = GsxConnection::class;

    /**
     * @param  array<string, mixed>  $options  Query options.
     */
    public function __construct(array $options = [])
    {
        $this->options = $options;
    }

    public function resolveEndpoint(): string
    {
        return '/v1/gsx-connection';
    }
}
