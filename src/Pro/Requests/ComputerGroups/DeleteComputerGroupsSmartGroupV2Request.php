<?php

namespace spkm\Jamf\Pro\Requests\ComputerGroups;

use spkm\Jamf\Requests\DeleteRequest;
use spkm\Jamf\Support\Path;

/**
 * Remove specified Smart Computer Group: DELETE /v2/computer-groups/smart-groups/{id}.
 *
 * @deprecated Jamf deprecated this endpoint on 2026-05-28.
 */
class DeleteComputerGroupsSmartGroupV2Request extends DeleteRequest
{
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
