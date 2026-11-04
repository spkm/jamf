<?php

namespace spkm\Jamf\Classic\Requests\MacApplications;

use Saloon\Enums\Method;
use spkm\Jamf\Classic\Requests\ClassicWriteRequest;
use spkm\Jamf\Support\Path;

/**
 * Updates an existing mac application by id: PUT /macapplications/id/{id}.
 *
 * PUT cannot be used to set vpp codes.
 */
class UpdateMacappByIdRequest extends ClassicWriteRequest
{
    protected Method $method = Method::PUT;

    protected string $root = 'mac_application';

    /**
     * @param  array<string, mixed>|string  $record  The record as an array of Jamf's field names (written as XML under <mac_application>), or the XML itself.
     */
    public function __construct(protected int|string $id, array|string $record = [])
    {
        $this->record = $record;
    }

    public function resolveEndpoint(): string
    {
        return '/macapplications/id/'.Path::segment((string) $this->id);
    }
}
