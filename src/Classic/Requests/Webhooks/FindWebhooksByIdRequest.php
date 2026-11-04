<?php

namespace spkm\Jamf\Classic\Requests\Webhooks;

use spkm\Jamf\Classic\Requests\ClassicGetRequest;
use spkm\Jamf\Support\Path;

/**
 * Finds webhooks by id: GET /webhooks/id/{id}.
 */
class FindWebhooksByIdRequest extends ClassicGetRequest
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
        return '/webhooks/id/'.Path::segment((string) $this->id);
    }
}
