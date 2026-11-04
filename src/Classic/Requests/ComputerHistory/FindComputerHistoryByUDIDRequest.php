<?php

namespace spkm\Jamf\Classic\Requests\ComputerHistory;

use spkm\Jamf\Classic\Requests\ClassicGetRequest;
use spkm\Jamf\Support\Path;

/**
 * Finds computer history by UDID: GET /computerhistory/udid/{udid}.
 */
class FindComputerHistoryByUDIDRequest extends ClassicGetRequest
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
        return '/computerhistory/udid/'.Path::segment((string) $this->udid);
    }
}
