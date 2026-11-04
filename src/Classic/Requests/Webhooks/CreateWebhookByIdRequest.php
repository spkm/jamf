<?php

namespace spkm\Jamf\Classic\Requests\Webhooks;

use spkm\Jamf\Classic\Requests\ClassicWriteRequest;
use spkm\Jamf\Support\Path;

/**
 * Creates a new webhook by id: POST /webhooks/id/{id}.
 */
class CreateWebhookByIdRequest extends ClassicWriteRequest
{
    protected string $root = 'webhook';

    /**
     * @param  array<string, mixed>|string  $record  The record as an array of Jamf's field names (written as XML under <webhook>), or the XML itself.
     */
    public function __construct(protected int|string $id, array|string $record = [])
    {
        $this->record = $record;
    }

    public function resolveEndpoint(): string
    {
        return '/webhooks/id/'.Path::segment((string) $this->id);
    }
}
