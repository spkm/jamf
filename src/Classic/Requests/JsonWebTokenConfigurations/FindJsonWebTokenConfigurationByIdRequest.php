<?php

namespace spkm\Jamf\Classic\Requests\JsonWebTokenConfigurations;

use spkm\Jamf\Classic\Requests\ClassicGetRequest;
use spkm\Jamf\Support\Path;

/**
 * Find JSON Web Token configuration by id: GET /jsonwebtokenconfigurations/id/{id}.
 */
class FindJsonWebTokenConfigurationByIdRequest extends ClassicGetRequest
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
        return '/jsonwebtokenconfigurations/id/'.Path::segment((string) $this->id);
    }
}
