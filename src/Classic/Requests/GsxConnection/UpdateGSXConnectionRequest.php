<?php

namespace spkm\Jamf\Classic\Requests\GsxConnection;

use Saloon\Enums\Method;
use spkm\Jamf\Classic\Requests\ClassicWriteRequest;

/**
 * Updates the Jamf Pro GSX connection information: PUT /gsxconnection.
 */
class UpdateGSXConnectionRequest extends ClassicWriteRequest
{
    protected Method $method = Method::PUT;

    protected string $root = 'gsx_connection';

    /**
     * @param  array<string, mixed>|string  $record  The record as an array of Jamf's field names (written as XML under <gsx_connection>), or the XML itself.
     */
    public function __construct(array|string $record = [])
    {
        $this->record = $record;
    }

    public function resolveEndpoint(): string
    {
        return '/gsxconnection';
    }
}
