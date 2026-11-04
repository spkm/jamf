<?php

namespace spkm\Jamf\Classic\Requests\InfrastructureManagers;

use Saloon\Enums\Method;
use spkm\Jamf\Classic\Requests\ClassicWriteRequest;
use spkm\Jamf\Support\Path;

/**
 * Updates an existing infrastructure manager by id: PUT /infrastructuremanager/id/{id}.
 */
class UpdateInfrastructureManagerByIdRequest extends ClassicWriteRequest
{
    protected Method $method = Method::PUT;

    protected string $root = 'infrastructure_manager';

    /**
     * @param  array<string, mixed>|string  $record  The record as an array of Jamf's field names (written as XML under <infrastructure_manager>), or the XML itself.
     */
    public function __construct(protected int|string $id, array|string $record = [])
    {
        $this->record = $record;
    }

    public function resolveEndpoint(): string
    {
        return '/infrastructuremanager/id/'.Path::segment((string) $this->id);
    }
}
