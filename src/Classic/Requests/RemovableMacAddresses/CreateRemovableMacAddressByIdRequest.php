<?php

namespace spkm\Jamf\Classic\Requests\RemovableMacAddresses;

use spkm\Jamf\Classic\Requests\ClassicWriteRequest;
use spkm\Jamf\Support\Path;

/**
 * Creates a new removableMacAddress by id: POST /removablemacaddresses/id/{id}.
 */
class CreateRemovableMacAddressByIdRequest extends ClassicWriteRequest
{
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
