<?php

namespace spkm\Jamf\Classic\Requests\Webhooks;

use spkm\Jamf\Classic\Requests\ClassicDeleteRequest;
use spkm\Jamf\Support\Path;

/**
 * Deletes a webhook by id: DELETE /webhooks/id/{id}.
 */
class DeleteWebhookByIdRequest extends ClassicDeleteRequest
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
