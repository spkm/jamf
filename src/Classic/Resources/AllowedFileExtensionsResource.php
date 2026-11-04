<?php

namespace spkm\Jamf\Classic\Resources;

use Illuminate\Support\Collection;
use spkm\Jamf\Classic\ClassicConnector;
use spkm\Jamf\Classic\Requests\AllowedFileExtensions\CreateAllowedFileExtensionByIdRequest;
use spkm\Jamf\Classic\Requests\AllowedFileExtensions\DeleteAllowedFileExtensionByIdRequest;
use spkm\Jamf\Classic\Requests\AllowedFileExtensions\FindAllowedFileExtensionByIdRequest;
use spkm\Jamf\Classic\Requests\AllowedFileExtensions\FindAllowedFileExtensionByNameRequest;
use spkm\Jamf\Classic\Requests\AllowedFileExtensions\FindAllowedFileExtensionRequest;
use spkm\Jamf\Classic\Requests\ClassicRequest;

/**
 * The allowedfileextensions endpoints of the Classic API, from Jamf::classic()->allowedFileExtensions().
 */
class AllowedFileExtensionsResource extends ClassicResource
{
    public function __construct(ClassicConnector $connector)
    {
        parent::__construct($connector);
    }

    protected function listRequest(): ClassicRequest
    {
        return new FindAllowedFileExtensionRequest;
    }

    protected function itemRequest(int|string $id): ClassicRequest
    {
        return new FindAllowedFileExtensionByIdRequest($id);
    }

    protected function createRequest(array|string $record): ClassicRequest
    {
        return new CreateAllowedFileExtensionByIdRequest(0, $record);
    }

    protected function deleteRequest(int|string $id): ClassicRequest
    {
        return new DeleteAllowedFileExtensionByIdRequest($id);
    }

    /**
     * Creates a new allowed file extension value by id: POST /allowedfileextensions/id/{id}.
     *
     * @param  array<string, mixed>|string  $record  The record as an array (written under <allowed_file_extension>), or the XML itself.
     */
    public function createAllowedFileExtensionById(int|string $id, array|string $record = []): mixed
    {
        return $this->fetch(new CreateAllowedFileExtensionByIdRequest($id, $record));
    }

    /**
     * Deletes an allowed file extension value by id: DELETE /allowedfileextensions/id/{id}.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function deleteAllowedFileExtensionById(int|string $id, array $options = []): bool
    {
        return $this->perform(new DeleteAllowedFileExtensionByIdRequest($id, $options));
    }

    /**
     * Finds the allowed file extension: GET /allowedfileextensions.
     *
     * @param  array<string, mixed>  $options  Query options.
     * @return Collection<int, array<string, mixed>>
     */
    public function findAllowedFileExtension(array $options = []): Collection
    {
        return $this->fetch(new FindAllowedFileExtensionRequest($options));
    }

    /**
     * Finds an allowed file extension value by id: GET /allowedfileextensions/id/{id}.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function findAllowedFileExtensionById(int|string $id, array $options = []): mixed
    {
        return $this->fetch(new FindAllowedFileExtensionByIdRequest($id, $options));
    }

    /**
     * Finds an allowed file extension value by name: GET /allowedfileextensions/extension/{extension}.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function findAllowedFileExtensionByName(string $extension, array $options = []): mixed
    {
        return $this->fetch(new FindAllowedFileExtensionByNameRequest($extension, $options));
    }
}
