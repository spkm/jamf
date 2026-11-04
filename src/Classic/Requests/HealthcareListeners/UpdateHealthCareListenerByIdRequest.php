<?php

namespace spkm\Jamf\Classic\Requests\HealthcareListeners;

use Saloon\Enums\Method;
use spkm\Jamf\Classic\Requests\ClassicWriteRequest;
use spkm\Jamf\Support\Path;

/**
 * Updates an existing healthcare listener by id: PUT /healthcarelistener/id/{id}.
 */
class UpdateHealthCareListenerByIdRequest extends ClassicWriteRequest
{
    protected Method $method = Method::PUT;

    protected string $root = 'healthcare_listener';

    /**
     * @param  array<string, mixed>|string  $record  The record as an array of Jamf's field names (written as XML under <healthcare_listener>), or the XML itself.
     */
    public function __construct(protected int|string $id, array|string $record = [])
    {
        $this->record = $record;
    }

    public function resolveEndpoint(): string
    {
        return '/healthcarelistener/id/'.Path::segment((string) $this->id);
    }
}
