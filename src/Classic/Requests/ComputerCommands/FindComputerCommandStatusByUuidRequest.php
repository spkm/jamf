<?php

namespace spkm\Jamf\Classic\Requests\ComputerCommands;

use spkm\Jamf\Classic\Requests\ClassicGetRequest;
use spkm\Jamf\Support\Path;

/**
 * Finds a computer command status by uuid: GET /computercommands/status/{statusuuid}.
 *
 * A command waiting to execute will have a Pending status. A command that has failed will have an Error status. A
 * command that has been canceled will have a Canceled status and will not be available using the other GET options.
 */
class FindComputerCommandStatusByUuidRequest extends ClassicGetRequest
{
    /**
     * @param  array<string, mixed>  $options  Query options.
     */
    public function __construct(protected string $statusuuid, array $options = [])
    {
        $this->options = $options;
    }

    public function resolveEndpoint(): string
    {
        return '/computercommands/status/'.Path::segment((string) $this->statusuuid);
    }
}
