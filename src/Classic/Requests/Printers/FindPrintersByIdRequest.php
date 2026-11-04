<?php

namespace spkm\Jamf\Classic\Requests\Printers;

use spkm\Jamf\Classic\Requests\ClassicGetRequest;
use spkm\Jamf\Support\Path;

/**
 * Finds printers by id: GET /printers/id/{id}.
 */
class FindPrintersByIdRequest extends ClassicGetRequest
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
        return '/printers/id/'.Path::segment((string) $this->id);
    }
}
