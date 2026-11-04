<?php

namespace spkm\Jamf\Classic\Requests\PeripheralTypes;

use spkm\Jamf\Classic\Requests\ClassicDeleteRequest;
use spkm\Jamf\Support\Path;

/**
 * Deletes a peripheral by id: DELETE /peripheraltypes/id/{id}.
 */
class DeletePeripheralByIdRequest extends ClassicDeleteRequest
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
        return '/peripheraltypes/id/'.Path::segment((string) $this->id);
    }
}
