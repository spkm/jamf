<?php

namespace spkm\Jamf\Classic\Requests\Computers;

use Saloon\Enums\Method;
use spkm\Jamf\Classic\Requests\ClassicWriteRequest;
use spkm\Jamf\Support\Path;

/**
 * Updates an existing computer by id: PUT /computers/id/{id}.
 *
 * You can PUT using the resource URLs with parameters of {name}, {udid}, {serial number}, or {macaddress}.
 * Certificates and mdm_capable are ignored in a PUT.
 *
 * @deprecated Jamf deprecated this endpoint on 2025-02-11.
 */
class UpdateComputerByIdRequest extends ClassicWriteRequest
{
    protected Method $method = Method::PUT;

    protected string $root = 'computer';

    /**
     * @param  array<string, mixed>|string  $record  The record as an array of Jamf's field names (written as XML under <computer>), or the XML itself.
     */
    public function __construct(protected int|string $id, array|string $record = [])
    {
        $this->record = $record;
    }

    public function resolveEndpoint(): string
    {
        return '/computers/id/'.Path::segment((string) $this->id);
    }
}
