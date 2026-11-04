<?php

namespace spkm\Jamf\Classic\Requests\ComputerManagement;

use spkm\Jamf\Classic\Requests\ClassicGetRequest;
use spkm\Jamf\Support\Path;

/**
 * Finds computer management information by serial number: GET /computermanagement/serialnumber/{serialnumber}.
 */
class FindComputerManagementBySerialNumberRequest extends ClassicGetRequest
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
        return '/computermanagement/serialnumber/'.Path::segment((string) $this->serialnumber);
    }
}
