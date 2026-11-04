<?php

namespace spkm\Jamf\Classic\Requests\Computers;

use spkm\Jamf\Classic\Requests\ClassicGetRequest;
use spkm\Jamf\Support\Path;

/**
 * Finds computers by UDID: GET /computers/udid/{udid}.
 *
 * You can PUT, POST, and DELETE using this resource URL.
 *
 * @deprecated Jamf deprecated this endpoint on 2025-02-11.
 */
class FindComputersByUDIDRequest extends ClassicGetRequest
{
    /**
     * @param  array<string, mixed>  $options  Query options.
     */
    public function __construct(protected string $udid, array $options = [])
    {
        $this->options = $options;
    }

    public function resolveEndpoint(): string
    {
        return '/computers/udid/'.Path::segment((string) $this->udid);
    }
}
