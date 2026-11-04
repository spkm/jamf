<?php

namespace spkm\Jamf\Classic\Requests\Peripherals;

use spkm\Jamf\Classic\Requests\ClassicDeleteRequest;
use spkm\Jamf\Support\Path;

/**
 * Deletes a peripheral by id: DELETE /peripherals/id/{id}.
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
        return '/peripherals/id/'.Path::segment((string) $this->id);
    }
}
