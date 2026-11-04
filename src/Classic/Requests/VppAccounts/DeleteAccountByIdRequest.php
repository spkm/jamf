<?php

namespace spkm\Jamf\Classic\Requests\VppAccounts;

use spkm\Jamf\Classic\Requests\ClassicDeleteRequest;
use spkm\Jamf\Support\Path;

/**
 * Deletes a vpp account by id: DELETE /vppaccounts/id/{id}.
 */
class DeleteAccountByIdRequest extends ClassicDeleteRequest
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
        return '/vppaccounts/id/'.Path::segment((string) $this->id);
    }
}
