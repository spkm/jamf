<?php

namespace spkm\Jamf\Classic\Requests\Webhooks;

use spkm\Jamf\Classic\Requests\ClassicGetRequest;
use spkm\Jamf\Support\Path;

/**
 * Finds webhooks by name: GET /webhooks/name/{name}.
 *
 * You can PUT, POST, and DELETE using this resource URL.
 */
class FindWebhooksByNameRequest extends ClassicGetRequest
{
    /**
     * @param  array<string, mixed>  $options  Query options.
     */
    public function __construct(protected string $name, array $options = [])
    {
        $this->options = $options;
    }

    public function resolveEndpoint(): string
    {
        return '/webhooks/name/'.Path::segment((string) $this->name);
    }
}
