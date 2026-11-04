<?php

namespace spkm\Jamf\Classic\Requests\JsonWebTokenConfigurations;

use spkm\Jamf\Classic\Requests\ClassicDeleteRequest;
use spkm\Jamf\Support\Path;

/**
 * Deletes a JSON Web Token configuration by id: DELETE /jsonwebtokenconfigurations/id/{id}.
 */
class DeleteJsonWebTokenConfigurationByIdRequest extends ClassicDeleteRequest
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
