<?php

namespace spkm\Jamf\Classic\Requests\InfrastructureManagers;

use spkm\Jamf\Classic\Requests\ClassicGetRequest;
use spkm\Jamf\Support\Path;

/**
 * Finds infrastructure manager by id: GET /infrastructuremanager/id/{id}.
 */
class FindInfrastructureManagerByIdRequest extends ClassicGetRequest
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
        return '/infrastructuremanager/id/'.Path::segment((string) $this->id);
    }
}
