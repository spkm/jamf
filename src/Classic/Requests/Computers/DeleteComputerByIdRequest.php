<?php

namespace spkm\Jamf\Classic\Requests\Computers;

use spkm\Jamf\Classic\Requests\ClassicDeleteRequest;
use spkm\Jamf\Support\Path;

/**
 * Deletes a computer by id: DELETE /computers/id/{id}.
 *
 * You can DELETE using the resource URLs with parameters of {name}, {udid}, {serial number}, or {macaddress}.
 *
 * @deprecated Jamf deprecated this endpoint on 2025-02-11.
 */
class DeleteComputerByIdRequest extends ClassicDeleteRequest
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
        return '/computers/id/'.Path::segment((string) $this->id);
    }
}
