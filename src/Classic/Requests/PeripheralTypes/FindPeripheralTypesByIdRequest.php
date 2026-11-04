<?php

namespace spkm\Jamf\Classic\Requests\PeripheralTypes;

use spkm\Jamf\Classic\Requests\ClassicGetRequest;
use spkm\Jamf\Support\Path;

/**
 * Finds peripheral types by id: GET /peripheraltypes/id/{id}.
 */
class FindPeripheralTypesByIdRequest extends ClassicGetRequest
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
