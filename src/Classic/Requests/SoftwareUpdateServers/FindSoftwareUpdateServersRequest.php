<?php

namespace spkm\Jamf\Classic\Requests\SoftwareUpdateServers;

use spkm\Jamf\Classic\Requests\ClassicGetRequest;

/**
 * Finds all software update servers: GET /softwareupdateservers.
 */
class FindSoftwareUpdateServersRequest extends ClassicGetRequest
{
    protected string $responseShape = self::LIST;

    /**
     * @param  array<string, mixed>  $options  Query options.
     */
    public function __construct(array $options = [])
    {
        $this->options = $options;
    }

    public function resolveEndpoint(): string
    {
        return '/softwareupdateservers';
    }
}
