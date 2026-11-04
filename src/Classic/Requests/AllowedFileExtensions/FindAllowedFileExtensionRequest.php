<?php

namespace spkm\Jamf\Classic\Requests\AllowedFileExtensions;

use spkm\Jamf\Classic\Requests\ClassicGetRequest;

/**
 * Finds the allowed file extension: GET /allowedfileextensions.
 */
class FindAllowedFileExtensionRequest extends ClassicGetRequest
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
        return '/allowedfileextensions';
    }
}
