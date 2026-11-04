<?php

namespace spkm\Jamf\Classic\Requests\RemovableMacAddresses;

use spkm\Jamf\Classic\Requests\ClassicGetRequest;
use spkm\Jamf\Support\Path;

/**
 * Finds removablemacaddresses by id: GET /removablemacaddresses/id/{id}.
 */
class FindRemovableMacAddressesByIdRequest extends ClassicGetRequest
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
        return '/removablemacaddresses/id/'.Path::segment((string) $this->id);
    }
}
