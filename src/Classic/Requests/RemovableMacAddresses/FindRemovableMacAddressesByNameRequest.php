<?php

namespace spkm\Jamf\Classic\Requests\RemovableMacAddresses;

use spkm\Jamf\Classic\Requests\ClassicGetRequest;
use spkm\Jamf\Support\Path;

/**
 * Finds removablemacaddresses by name: GET /removablemacaddresses/name/{name}.
 *
 * You can PUT, POST, and DELETE using this resource URL.
 */
class FindRemovableMacAddressesByNameRequest extends ClassicGetRequest
{
    /**
     * @param  array<string, mixed>  $options  Query options.
     */
    public function __construct(protected string $name, array $options = [])
    {
        $this->options = $options;
    }

    public function resolveEndpoint(): string
    {
        return '/removablemacaddresses/name/'.Path::segment((string) $this->name);
    }
}
