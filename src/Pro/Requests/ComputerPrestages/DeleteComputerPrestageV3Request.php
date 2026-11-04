<?php

namespace spkm\Jamf\Pro\Requests\ComputerPrestages;

use spkm\Jamf\Requests\DeleteRequest;
use spkm\Jamf\Support\Path;

/**
 * Delete a Computer Prestage with the supplied id: DELETE /v3/computer-prestages/{id}.
 *
 * Deletes a Computer Prestage with the supplied id
 */
class DeleteComputerPrestageV3Request extends DeleteRequest
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
        return '/v3/computer-prestages/'.Path::segment((string) $this->id);
    }
}
