<?php

namespace spkm\Jamf\Classic\Requests\ComputerInventoryCollection;

use spkm\Jamf\Classic\Requests\ClassicGetRequest;

/**
 * Finds the Jamf Pro computer inventory collection information: GET /computerinventorycollection.
 */
class FindcomputerinventorycollectionRequest extends ClassicGetRequest
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
        return '/computerinventorycollection';
    }
}
