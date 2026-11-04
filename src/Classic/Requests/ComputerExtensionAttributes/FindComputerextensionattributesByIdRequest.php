<?php

namespace spkm\Jamf\Classic\Requests\ComputerExtensionAttributes;

use spkm\Jamf\Classic\Requests\ClassicGetRequest;
use spkm\Jamf\Support\Path;

/**
 * Finds computer extension attributes by id: GET /computerextensionattributes/id/{id}.
 */
class FindComputerextensionattributesByIdRequest extends ClassicGetRequest
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
        return '/computerextensionattributes/id/'.Path::segment((string) $this->id);
    }
}
