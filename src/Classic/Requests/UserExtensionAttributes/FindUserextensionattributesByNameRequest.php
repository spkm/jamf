<?php

namespace spkm\Jamf\Classic\Requests\UserExtensionAttributes;

use spkm\Jamf\Classic\Requests\ClassicGetRequest;
use spkm\Jamf\Support\Path;

/**
 * Finds user extension attributes by name: GET /userextensionattributes/name/{name}.
 *
 * You can PUT, POST, and DELETE using this resource URL.
 */
class FindUserextensionattributesByNameRequest extends ClassicGetRequest
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
        return '/userextensionattributes/name/'.Path::segment((string) $this->name);
    }
}
