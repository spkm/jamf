<?php

namespace spkm\Jamf\Classic\Requests\Printers;

use spkm\Jamf\Classic\Requests\ClassicDeleteRequest;
use spkm\Jamf\Support\Path;

/**
 * Deletes a printer by id: DELETE /printers/id/{id}.
 */
class DeletePrinterByIdRequest extends ClassicDeleteRequest
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
