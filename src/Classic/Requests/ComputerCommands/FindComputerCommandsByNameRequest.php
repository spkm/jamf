<?php

namespace spkm\Jamf\Classic\Requests\ComputerCommands;

use spkm\Jamf\Classic\Requests\ClassicGetRequest;
use spkm\Jamf\Support\Path;

/**
 * Finds matching computer commands by name: GET /computercommands/name/{name}.
 */
class FindComputerCommandsByNameRequest extends ClassicGetRequest
{
    /**
     * @param  array<string, mixed>  $options  Query options.
     */
    public function __construct(protected string $name, array $options = [])
    {
        $this->options = $options;
    }

    public function resolveEndpoint(): string
    {
        return '/computercommands/name/'.Path::segment((string) $this->name);
    }
}
