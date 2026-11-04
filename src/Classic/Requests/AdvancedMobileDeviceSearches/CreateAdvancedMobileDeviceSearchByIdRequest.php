<?php

namespace spkm\Jamf\Classic\Requests\AdvancedMobileDeviceSearches;

use spkm\Jamf\Classic\Requests\ClassicWriteRequest;
use spkm\Jamf\Support\Path;

/**
 * Creates a new advanced mobile device search by id: POST /advancedmobiledevicesearches/id/{id}.
 */
class CreateAdvancedMobileDeviceSearchByIdRequest extends ClassicWriteRequest
{
    protected string $root = 'advanced_mobile_device_search';

    /**
     * @param  array<string, mixed>|string  $record  The record as an array of Jamf's field names (written as XML under <advanced_mobile_device_search>), or the XML itself.
     */
    public function __construct(protected int|string $id, array|string $record = [])
    {
        $this->record = $record;
    }

    public function resolveEndpoint(): string
    {
        return '/advancedmobiledevicesearches/id/'.Path::segment((string) $this->id);
    }
}
