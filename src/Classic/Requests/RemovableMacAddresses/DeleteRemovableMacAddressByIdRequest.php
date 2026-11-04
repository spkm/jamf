<?php

namespace spkm\Jamf\Classic\Requests\RemovableMacAddresses;

use spkm\Jamf\Classic\Requests\ClassicDeleteRequest;
use spkm\Jamf\Support\Path;

/**
 * Deletes a removableMacAddress by id: DELETE /removablemacaddresses/id/{id}.
 */
class DeleteRemovableMacAddressByIdRequest extends ClassicDeleteRequest
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
        return '/removablemacaddresses/id/'.Path::segment((string) $this->id);
    }
}
