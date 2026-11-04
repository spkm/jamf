<?php

namespace spkm\Jamf\Pro\Requests\ComputerGroups;

use spkm\Jamf\Requests\DeleteRequest;
use spkm\Jamf\Support\Path;

/**
 * Remove specified Smart Computer Group: DELETE /v3/computer-groups/smart-groups/{id}.
 */
class DeleteComputerGroupsSmartGroupV3Request extends DeleteRequest
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
        return '/v3/computer-groups/smart-groups/'.Path::segment((string) $this->id);
    }
}
