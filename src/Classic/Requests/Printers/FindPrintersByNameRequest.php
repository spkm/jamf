<?php

namespace spkm\Jamf\Classic\Requests\Printers;

use spkm\Jamf\Classic\Requests\ClassicGetRequest;
use spkm\Jamf\Support\Path;

/**
 * Finds printers by name: GET /printers/name/{name}.
 *
 * You can PUT, POST, and DELETE using this resource URL.
 */
class FindPrintersByNameRequest extends ClassicGetRequest
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
        return '/printers/name/'.Path::segment((string) $this->name);
    }
}
