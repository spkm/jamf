<?php

namespace spkm\Jamf\Classic\Requests\HealthcareListeners;

use spkm\Jamf\Classic\Requests\ClassicGetRequest;
use spkm\Jamf\Support\Path;

/**
 * Finds healthcare listener by id: GET /healthcarelistener/id/{id}.
 */
class FindHealthcareListenersByIdRequest extends ClassicGetRequest
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
        return '/healthcarelistener/id/'.Path::segment((string) $this->id);
    }
}
