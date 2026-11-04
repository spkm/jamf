<?php

namespace spkm\Jamf\Classic\Resources;

use spkm\Jamf\Classic\ClassicConnector;
use spkm\Jamf\Classic\Requests\CommandFlush\CommandFlushRequest;
use spkm\Jamf\Classic\Requests\CommandFlush\CreateCommandFlushWithIdAndStatusRequest;
use spkm\Jamf\Resources\BaseResource;

/**
 * The commandflush endpoints of the Classic API, from Jamf::classic()->commandFlush().
 *
 * @extends BaseResource<never>
 */
class CommandFlushResource extends BaseResource
{
    public function __construct(ClassicConnector $connector)
    {
        parent::__construct($connector, null);
    }

    /**
     * Flushes commands based on information specified in an XML file: DELETE /commandflush.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function commandFlush(array $options = []): bool
    {
        return $this->perform(new CommandFlushRequest($options));
    }

    /**
     * Flushes commands for computers, computergroups, mobiledevices, or mobiledevicegroups: DELETE
     * /commandflush/{idtype}/id/{id}/status/{status}.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function createCommandFlushWithIdAndStatus(string $idtype, int|string $id, string $status, array $options = []): bool
    {
        return $this->perform(new CreateCommandFlushWithIdAndStatusRequest($idtype, $id, $status, $options));
    }
}
