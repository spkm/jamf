<?php

namespace spkm\Jamf\Pro\Requests\ComputerGroups;

use spkm\Jamf\Pro\Data\StaticComputerGroup;
use spkm\Jamf\Requests\GetRequest;
use spkm\Jamf\Support\Path;

/**
 * Get Static Computer Group by Id: GET /v3/computer-groups/static-groups/{id}.
 */
class GetComputerGroupsStaticGroupV3Request extends GetRequest
{
    protected ?string $dto = StaticComputerGroup::class;

    /**
     * @param  array<string, mixed>  $options  Query options.
     */
    public function __construct(protected int|string $id, array $options = [])
    {
        $this->options = $options;
    }

    public function resolveEndpoint(): string
    {
        return '/v3/computer-groups/static-groups/'.Path::segment((string) $this->id);
    }
}
