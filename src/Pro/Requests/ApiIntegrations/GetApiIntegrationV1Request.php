<?php

namespace spkm\Jamf\Pro\Requests\ApiIntegrations;

use spkm\Jamf\Pro\Data\ApiIntegrationResponse;
use spkm\Jamf\Requests\GetRequest;
use spkm\Jamf\Support\Path;

/**
 * Get specified API integration object: GET /v1/api-integrations/{id}.
 *
 * Gets specified API integration object
 */
class GetApiIntegrationV1Request extends GetRequest
{
    protected ?string $dto = ApiIntegrationResponse::class;

    /**
     * @param  array<string, mixed>  $options  Query options.
     */
    public function __construct(protected int|string $id, array $options = [])
    {
        $this->options = $options;
    }

    public function resolveEndpoint(): string
    {
        return '/v1/api-integrations/'.Path::segment((string) $this->id);
    }
}
