<?php

namespace spkm\Jamf\Classic\Requests\UserExtensionAttributes;

use spkm\Jamf\Classic\Requests\ClassicGetRequest;

/**
 * Finds all user extension attributes: GET /userextensionattributes.
 */
class FindUserextensionattributesRequest extends ClassicGetRequest
{
    protected string $responseShape = self::LIST;

    /**
     * @param  array<string, mixed>  $options  Query options.
     */
    public function __construct(array $options = [])
    {
        $this->options = $options;
    }

    public function resolveEndpoint(): string
    {
        return '/userextensionattributes';
    }
}
