<?php

namespace spkm\Jamf\Classic\Requests\ComputerGroups;

use spkm\Jamf\Classic\Requests\ClassicGetRequest;

/**
 * Finds all computer groups: GET /computergroups.
 */
class FindComputerGroupsRequest extends ClassicGetRequest
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
        return '/computergroups';
    }
}
