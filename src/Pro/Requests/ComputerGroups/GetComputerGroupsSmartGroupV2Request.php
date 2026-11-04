<?php

namespace spkm\Jamf\Pro\Requests\ComputerGroups;

use spkm\Jamf\Pro\Data\SmartComputerGroupV2;
use spkm\Jamf\Requests\GetRequest;
use spkm\Jamf\Support\Path;

/**
 * Get Smart Computer Group by Id: GET /v2/computer-groups/smart-groups/{id}.
 *
 * @deprecated Jamf deprecated this endpoint on 2026-05-28.
 */
class GetComputerGroupsSmartGroupV2Request extends GetRequest
{
    protected ?string $dto = SmartComputerGroupV2::class;

    /**
     * @param  array<string, mixed>  $options  Query options.
     */
    public function __construct(protected int|string $id, array $options = [])
    {
        $this->options = $options;
    }

    public function resolveEndpoint(): string
    {
        return '/v2/computer-groups/smart-groups/'.Path::segment((string) $this->id);
    }
}
