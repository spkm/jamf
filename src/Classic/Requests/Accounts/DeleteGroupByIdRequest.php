<?php

namespace spkm\Jamf\Classic\Requests\Accounts;

use spkm\Jamf\Classic\Requests\ClassicDeleteRequest;
use spkm\Jamf\Support\Path;

/**
 * Deletes a group by id: DELETE /accounts/groupid/{id}.
 */
class DeleteGroupByIdRequest extends ClassicDeleteRequest
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
        return '/accounts/groupid/'.Path::segment((string) $this->id);
    }
}
