<?php

namespace spkm\Jamf\Classic\Requests\ComputerHistory;

use spkm\Jamf\Classic\Requests\ClassicGetRequest;
use spkm\Jamf\Support\Path;

/**
 * Finds computer history by serial number: GET /computerhistory/serialnumber/{serialnumber}.
 */
class FindComputerHistoryBySerialNumberRequest extends ClassicGetRequest
{
    /**
     * @param  array<string, mixed>  $options  Query options.
     */
    public function __construct(protected string $serialnumber, array $options = [])
    {
        $this->options = $options;
    }

    public function resolveEndpoint(): string
    {
        return '/computerhistory/serialnumber/'.Path::segment((string) $this->serialnumber);
    }
}
