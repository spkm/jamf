<?php

namespace spkm\Jamf\Classic\Requests\UserExtensionAttributes;

use spkm\Jamf\Classic\Requests\ClassicGetRequest;
use spkm\Jamf\Support\Path;

/**
 * Finds user extension attributes by id: GET /userextensionattributes/id/{id}.
 */
class FindUserextensionattributesByIdRequest extends ClassicGetRequest
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
        return '/userextensionattributes/id/'.Path::segment((string) $this->id);
    }
}
