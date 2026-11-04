<?php

namespace spkm\Jamf\Classic\Requests\Packages;

use spkm\Jamf\Classic\Requests\ClassicGetRequest;

/**
 * Finds all packages: GET /packages.
 */
class FindPackagesRequest extends ClassicGetRequest
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
        return '/packages';
    }
}
