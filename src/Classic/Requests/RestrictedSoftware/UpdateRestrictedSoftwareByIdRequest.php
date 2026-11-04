<?php

namespace spkm\Jamf\Classic\Requests\RestrictedSoftware;

use Saloon\Enums\Method;
use spkm\Jamf\Classic\Requests\ClassicWriteRequest;
use spkm\Jamf\Support\Path;

/**
 * Updates an existing restricted software by id: PUT /restrictedsoftware/id/{id}.
 */
class UpdateRestrictedSoftwareByIdRequest extends ClassicWriteRequest
{
    protected Method $method = Method::PUT;

    protected string $root = 'restricted_software';

    /**
     * @param  array<string, mixed>|string  $record  The record as an array of Jamf's field names (written as XML under <restricted_software>), or the XML itself.
     */
    public function __construct(protected int|string $id, array|string $record = [])
    {
        $this->record = $record;
    }

    public function resolveEndpoint(): string
    {
        return '/restrictedsoftware/id/'.Path::segment((string) $this->id);
    }
}
