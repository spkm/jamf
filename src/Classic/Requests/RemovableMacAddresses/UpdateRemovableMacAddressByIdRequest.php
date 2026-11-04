<?php

namespace spkm\Jamf\Classic\Requests\RemovableMacAddresses;

use Saloon\Enums\Method;
use spkm\Jamf\Classic\Requests\ClassicWriteRequest;
use spkm\Jamf\Support\Path;

/**
 * Updates an existing removableMacAddress by id: PUT /removablemacaddresses/id/{id}.
 */
class UpdateRemovableMacAddressByIdRequest extends ClassicWriteRequest
{
    protected Method $method = Method::PUT;

    protected string $root = 'removable_mac_address';

    /**
     * @param  array<string, mixed>|string  $record  The record as an array of Jamf's field names (written as XML under <removable_mac_address>), or the XML itself.
     */
    public function __construct(protected int|string $id, array|string $record = [])
    {
        $this->record = $record;
    }

    public function resolveEndpoint(): string
    {
        return '/removablemacaddresses/id/'.Path::segment((string) $this->id);
    }
}
