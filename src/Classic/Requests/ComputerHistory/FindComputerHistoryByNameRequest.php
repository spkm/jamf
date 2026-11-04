<?php

namespace spkm\Jamf\Classic\Requests\ComputerHistory;

use spkm\Jamf\Classic\Requests\ClassicGetRequest;
use spkm\Jamf\Support\Path;

/**
 * Finds computer history by name: GET /computerhistory/name/{name}.
 */
class FindComputerHistoryByNameRequest extends ClassicGetRequest
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
        return '/computerhistory/name/'.Path::segment((string) $this->name);
    }
}
