<?php

namespace spkm\Jamf\Classic\Resources;

use Illuminate\Support\Collection;
use spkm\Jamf\Classic\ClassicConnector;
use spkm\Jamf\Classic\Requests\ClassicRequest;
use spkm\Jamf\Classic\Requests\JsonWebTokenConfigurations\CreateJsonWebTokenConfigurationByIdRequest;
use spkm\Jamf\Classic\Requests\JsonWebTokenConfigurations\DeleteJsonWebTokenConfigurationByIdRequest;
use spkm\Jamf\Classic\Requests\JsonWebTokenConfigurations\FindJsonWebTokenConfigurationByIdRequest;
use spkm\Jamf\Classic\Requests\JsonWebTokenConfigurations\FindJsonWebTokenConfigurationsRequest;
use spkm\Jamf\Classic\Requests\JsonWebTokenConfigurations\UpdateJsonWebTokenConfigurationByIdRequest;

/**
 * The jsonwebtokenconfigurations endpoints of the Classic API, from Jamf::classic()->jsonWebTokenConfigurations().
 */
class JsonWebTokenConfigurationsResource extends ClassicResource
{
    public function __construct(ClassicConnector $connector)
    {
        parent::__construct($connector);
    }

    protected function listRequest(): ClassicRequest
    {
        return new FindJsonWebTokenConfigurationsRequest;
    }

    protected function itemRequest(int|string $id): ClassicRequest
    {
        return new FindJsonWebTokenConfigurationByIdRequest($id);
    }

    protected function createRequest(array|string $record): ClassicRequest
    {
        return new CreateJsonWebTokenConfigurationByIdRequest(0, $record);
    }

    protected function updateRequest(int|string $id, array|string $record): ClassicRequest
    {
        return new UpdateJsonWebTokenConfigurationByIdRequest($id, $record);
    }

    protected function deleteRequest(int|string $id): ClassicRequest
    {
        return new DeleteJsonWebTokenConfigurationByIdRequest($id);
    }

    /**
     * Creates a new JSON Web Token configuration by id: POST /jsonwebtokenconfigurations/id/{id}.
     *
     * @param  array<string, mixed>|string  $record  The record as an array (written under <json_web_token_configuration>), or the XML itself.
     */
    public function createJsonWebTokenConfigurationById(int|string $id, array|string $record = []): mixed
    {
        return $this->fetch(new CreateJsonWebTokenConfigurationByIdRequest($id, $record));
    }

    /**
     * Deletes a JSON Web Token configuration by id: DELETE /jsonwebtokenconfigurations/id/{id}.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function deleteJsonWebTokenConfigurationById(int|string $id, array $options = []): bool
    {
        return $this->perform(new DeleteJsonWebTokenConfigurationByIdRequest($id, $options));
    }

    /**
     * Find JSON Web Token configuration by id: GET /jsonwebtokenconfigurations/id/{id}.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function findJsonWebTokenConfigurationById(int|string $id, array $options = []): mixed
    {
        return $this->fetch(new FindJsonWebTokenConfigurationByIdRequest($id, $options));
    }

    /**
     * Finds all JSON Web Token configurations: GET /jsonwebtokenconfigurations.
     *
     * @param  array<string, mixed>  $options  Query options.
     * @return Collection<int, array<string, mixed>>
     */
    public function findJsonWebTokenConfigurations(array $options = []): Collection
    {
        return $this->fetch(new FindJsonWebTokenConfigurationsRequest($options));
    }

    /**
     * Updates an existing JSON Web Token configuration by id: PUT /jsonwebtokenconfigurations/id/{id}.
     *
     * @param  array<string, mixed>|string  $record  The record as an array (written under <json_web_token_configuration>), or the XML itself.
     */
    public function updateJsonWebTokenConfigurationById(int|string $id, array|string $record = []): mixed
    {
        return $this->fetch(new UpdateJsonWebTokenConfigurationByIdRequest($id, $record));
    }
}
