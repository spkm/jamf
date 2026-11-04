<?php

namespace spkm\Jamf\Pro\Requests\ApiIntegrations;

use spkm\Jamf\Requests\DeleteRequest;
use spkm\Jamf\Support\Path;

/**
 * Remove specified API integration: DELETE /v1/api-integrations/{id}.
 *
 * Removes specified API integration
 */
class DeleteApiIntegrationV1Request extends DeleteRequest
{
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
