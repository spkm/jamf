<?php

namespace spkm\Jamf\Classic\Resources;

use Illuminate\Support\Collection;
use spkm\Jamf\Classic\ClassicConnector;
use spkm\Jamf\Classic\Requests\ClassicRequest;
use spkm\Jamf\Classic\Requests\Scripts\CreateScriptByIdRequest;
use spkm\Jamf\Classic\Requests\Scripts\DeleteScriptByIdRequest;
use spkm\Jamf\Classic\Requests\Scripts\FindScriptsByIdRequest;
use spkm\Jamf\Classic\Requests\Scripts\FindScriptsByNameRequest;
use spkm\Jamf\Classic\Requests\Scripts\FindScriptsRequest;
use spkm\Jamf\Classic\Requests\Scripts\UpdateScriptByIdRequest;

/**
 * The scripts endpoints of the Classic API, from Jamf::classic()->scripts().
 */
class ScriptsResource extends ClassicResource
{
    public function __construct(ClassicConnector $connector)
    {
        parent::__construct($connector);
    }

    protected function listRequest(): ClassicRequest
    {
        return new FindScriptsRequest;
    }

    protected function itemRequest(int|string $id): ClassicRequest
    {
        return new FindScriptsByIdRequest($id);
    }

    protected function createRequest(array|string $record): ClassicRequest
    {
        return new CreateScriptByIdRequest(0, $record);
    }

    protected function updateRequest(int|string $id, array|string $record): ClassicRequest
    {
        return new UpdateScriptByIdRequest($id, $record);
    }

    protected function deleteRequest(int|string $id): ClassicRequest
    {
        return new DeleteScriptByIdRequest($id);
    }

    /**
     * Creates a new script by id: POST /scripts/id/{id}.
     *
     * @param  array<string, mixed>|string  $record  The record as an array (written under <script>), or the XML itself.
     */
    public function createScriptById(int|string $id, array|string $record = []): mixed
    {
        return $this->fetch(new CreateScriptByIdRequest($id, $record));
    }

    /**
     * Deletes a script by id: DELETE /scripts/id/{id}.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function deleteScriptById(int|string $id, array $options = []): bool
    {
        return $this->perform(new DeleteScriptByIdRequest($id, $options));
    }

    /**
     * Finds all scripts: GET /scripts.
     *
     * @param  array<string, mixed>  $options  Query options.
     * @return Collection<int, array<string, mixed>>
     */
    public function findScripts(array $options = []): Collection
    {
        return $this->fetch(new FindScriptsRequest($options));
    }

    /**
     * Finds scripts by id: GET /scripts/id/{id}.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function findScriptsById(int|string $id, array $options = []): mixed
    {
        return $this->fetch(new FindScriptsByIdRequest($id, $options));
    }

    /**
     * Finds scripts by name: GET /scripts/name/{name}.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function findScriptsByName(string $name, array $options = []): mixed
    {
        return $this->fetch(new FindScriptsByNameRequest($name, $options));
    }

    /**
     * Updates an existing script by id: PUT /scripts/id/{id}.
     *
     * @param  array<string, mixed>|string  $record  The record as an array (written under <script>), or the XML itself.
     */
    public function updateScriptById(int|string $id, array|string $record = []): mixed
    {
        return $this->fetch(new UpdateScriptByIdRequest($id, $record));
    }
}
