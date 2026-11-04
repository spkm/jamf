<?php

namespace spkm\Jamf\Classic\Requests\ComputerExtensionAttributes;

use spkm\Jamf\Classic\Requests\ClassicGetRequest;
use spkm\Jamf\Support\Path;

/**
 * Finds computer extension attributes by name: GET /computerextensionattributes/name/{name}.
 *
 * You can PUT, POST, and DELETE using this resource URL.
 */
class FindComputerextensionattributesByNameRequest extends ClassicGetRequest
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
        return '/computerextensionattributes/name/'.Path::segment((string) $this->name);
    }
}
