<?php

namespace spkm\Jamf\Classic\Requests\ComputerManagement;

use spkm\Jamf\Classic\Requests\ClassicGetRequest;
use spkm\Jamf\Support\Path;

/**
 * Finds computer management information by id: GET /computermanagement/id/{id}.
 *
 * Computer command information is available in computerhistory. FileVault 2 information is not available.
 */
class FindComputerManagementByIdRequest extends ClassicGetRequest
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
        return '/computermanagement/id/'.Path::segment((string) $this->id);
    }
}
