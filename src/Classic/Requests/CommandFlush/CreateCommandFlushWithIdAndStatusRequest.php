<?php

namespace spkm\Jamf\Classic\Requests\CommandFlush;

use spkm\Jamf\Classic\Requests\ClassicDeleteRequest;
use spkm\Jamf\Support\Path;

/**
 * Flushes commands for computers, computergroups, mobiledevices, or mobiledevicegroups: DELETE /commandflush/{idtype}/id/{id}/status/{status}.
 *
 * Status may be Pending, Failed, or Pending+Failed. idtype may be specified as computers, computergroups,
 * mobiledevices, or mobiledevicegroups. Multiple devices may be specified by separating identifiers with commas. For
 * example /computers/id/1,2,3/status/Pending+Failed
 */
class CreateCommandFlushWithIdAndStatusRequest extends ClassicDeleteRequest
{
    /**
     * @param  array<string, mixed>  $options  Query options.
     */
    public function __construct(protected string $idtype, protected int|string $id, protected string $status, array $options = [])
    {
        $this->options = $options;
    }

    public function resolveEndpoint(): string
    {
        return '/commandflush/'.Path::segment((string) $this->idtype).'/id/'.Path::segment((string) $this->id).'/status/'.Path::segment((string) $this->status);
    }
}
