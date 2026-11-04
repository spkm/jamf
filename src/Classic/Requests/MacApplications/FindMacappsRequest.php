<?php

namespace spkm\Jamf\Classic\Requests\MacApplications;

use spkm\Jamf\Classic\Requests\ClassicGetRequest;

/**
 * Finds all mac applications: GET /macapplications.
 */
class FindMacappsRequest extends ClassicGetRequest
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
        return '/macapplications';
    }
}
