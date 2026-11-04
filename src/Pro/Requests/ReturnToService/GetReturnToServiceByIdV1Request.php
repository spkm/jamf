<?php

namespace spkm\Jamf\Pro\Requests\ReturnToService;

use spkm\Jamf\Pro\Data\ReturnToServiceConfiguration;
use spkm\Jamf\Requests\GetRequest;
use spkm\Jamf\Support\Path;

/**
 * Retrieve a Return to Service Configuration with the supplied id: GET /v1/return-to-service/{id}.
 *
 * Retrieves a Return to Service Configuration with the supplied id
 */
class GetReturnToServiceByIdV1Request extends GetRequest
{
    protected ?string $dto = ReturnToServiceConfiguration::class;

    /**
     * @param  array<string, mixed>  $options  Query options.
     */
    public function __construct(protected int|string $id, array $options = [])
    {
        $this->options = $options;
    }

    public function resolveEndpoint(): string
    {
        return '/v1/return-to-service/'.Path::segment((string) $this->id);
    }
}
