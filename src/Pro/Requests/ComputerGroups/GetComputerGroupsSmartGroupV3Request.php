<?php

namespace spkm\Jamf\Pro\Requests\ComputerGroups;

use spkm\Jamf\Pro\Data\SmartComputerGroupV3;
use spkm\Jamf\Requests\GetRequest;
use spkm\Jamf\Support\Path;

/**
 * Get Smart Computer Group by Id: GET /v3/computer-groups/smart-groups/{id}.
 */
class GetComputerGroupsSmartGroupV3Request extends GetRequest
{
    protected ?string $dto = SmartComputerGroupV3::class;

    /**
     * @param  array<string, mixed>  $options  Query options.
     */
    public function __construct(protected int|string $id, array $options = [])
    {
        $this->options = $options;
    }

    public function resolveEndpoint(): string
    {
        return '/v3/computer-groups/smart-groups/'.Path::segment((string) $this->id);
    }
}
