<?php

namespace spkm\Jamf\Classic\Requests\Peripherals;

use spkm\Jamf\Classic\Requests\ClassicGetRequest;
use spkm\Jamf\Support\Path;

/**
 * Finds peripherals by id: GET /peripherals/id/{id}.
 */
class FindPeripheralsByIdRequest extends ClassicGetRequest
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
