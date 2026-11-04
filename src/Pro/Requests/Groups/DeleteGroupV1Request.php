<?php

namespace spkm\Jamf\Pro\Requests\Groups;

use spkm\Jamf\Requests\DeleteRequest;
use spkm\Jamf\Support\Path;

/**
 * Delete a group by platform UUID: DELETE /v1/groups/{id}.
 *
 * Deletes a group by its platform UUID. Returns a 400 error if the group is being used as a dependency. Requires
 * appropriate DELETE privileges.
 *
 * @deprecated Jamf deprecated this endpoint on 2026-05-28.
 */
class DeleteGroupV1Request extends DeleteRequest
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
        return '/v1/groups/'.Path::segment((string) $this->id);
    }
}
