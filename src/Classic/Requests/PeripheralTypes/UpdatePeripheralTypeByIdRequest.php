<?php

namespace spkm\Jamf\Classic\Requests\PeripheralTypes;

use Saloon\Enums\Method;
use spkm\Jamf\Classic\Requests\ClassicWriteRequest;
use spkm\Jamf\Support\Path;

/**
 * Updates an existing peripheral by id: PUT /peripheraltypes/id/{id}.
 */
class UpdatePeripheralTypeByIdRequest extends ClassicWriteRequest
{
    protected Method $method = Method::PUT;

    protected string $root = 'peripheral_type';

    /**
     * @param  array<string, mixed>|string  $record  The record as an array of Jamf's field names (written as XML under <peripheral_type>), or the XML itself.
     */
    public function __construct(protected int|string $id, array|string $record = [])
    {
        $this->record = $record;
    }

    public function resolveEndpoint(): string
    {
        return '/peripheraltypes/id/'.Path::segment((string) $this->id);
    }
}
