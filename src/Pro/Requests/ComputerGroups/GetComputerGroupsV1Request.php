<?php

namespace spkm\Jamf\Pro\Requests\ComputerGroups;

use spkm\Jamf\Pro\Data\ComputerGroup;
use spkm\Jamf\Requests\GetRequest;

/**
 * Returns the list of all computer groups: GET /v1/computer-groups.
 *
 * Use it to get the list of all computer groups.
 */
class GetComputerGroupsV1Request extends GetRequest
{
    protected string $responseShape = self::LIST;

    protected ?string $dto = ComputerGroup::class;

    /**
     * @param  array<string, mixed>  $options  Query options.
     */
    public function __construct(array $options = [])
    {
        $this->options = $options;
    }

    public function resolveEndpoint(): string
    {
        return '/v1/computer-groups';
    }
}
