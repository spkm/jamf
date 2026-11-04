<?php

namespace spkm\Jamf\Classic\Resources;

use Illuminate\Support\Collection;
use spkm\Jamf\Classic\ClassicConnector;
use spkm\Jamf\Classic\Requests\ClassicRequest;
use spkm\Jamf\Classic\Requests\DiskEncryptionConfigurations\CreateDiskEncryptionConfigurationByIdRequest;
use spkm\Jamf\Classic\Requests\DiskEncryptionConfigurations\DeleteDiskEncryptionConfigurationByIdRequest;
use spkm\Jamf\Classic\Requests\DiskEncryptionConfigurations\FindDiskEncryptionConfigurationsByIdRequest;
use spkm\Jamf\Classic\Requests\DiskEncryptionConfigurations\FindDiskEncryptionConfigurationsByNameRequest;
use spkm\Jamf\Classic\Requests\DiskEncryptionConfigurations\FindDiskEncryptionConfigurationsRequest;
use spkm\Jamf\Classic\Requests\DiskEncryptionConfigurations\UpdateDiskEncryptionConfigurationByIdRequest;

/**
 * The diskencryptionconfigurations endpoints of the Classic API, from Jamf::classic()->diskEncryptionConfigurations().
 */
class DiskEncryptionConfigurationsResource extends ClassicResource
{
    public function __construct(ClassicConnector $connector)
    {
        parent::__construct($connector);
    }

    protected function listRequest(): ClassicRequest
    {
        return new FindDiskEncryptionConfigurationsRequest;
    }

    protected function itemRequest(int|string $id): ClassicRequest
    {
        return new FindDiskEncryptionConfigurationsByIdRequest($id);
    }

    protected function createRequest(array|string $record): ClassicRequest
    {
        return new CreateDiskEncryptionConfigurationByIdRequest(0, $record);
    }

    protected function updateRequest(int|string $id, array|string $record): ClassicRequest
    {
        return new UpdateDiskEncryptionConfigurationByIdRequest($id, $record);
    }

    protected function deleteRequest(int|string $id): ClassicRequest
    {
        return new DeleteDiskEncryptionConfigurationByIdRequest($id);
    }

    /**
     * Creates a new disk encryption configuration by id: POST /diskencryptionconfigurations/id/{id}.
     *
     * @param  array<string, mixed>|string  $record  The record as an array (written under <disk_encryption_configuration>), or the XML itself.
     */
    public function createDiskEncryptionConfigurationById(int|string $id, array|string $record = []): mixed
    {
        return $this->fetch(new CreateDiskEncryptionConfigurationByIdRequest($id, $record));
    }

    /**
     * Deletes a disk encryption configuration by id: DELETE /diskencryptionconfigurations/id/{id}.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function deleteDiskEncryptionConfigurationById(int|string $id, array $options = []): bool
    {
        return $this->perform(new DeleteDiskEncryptionConfigurationByIdRequest($id, $options));
    }

    /**
     * Finds all disk encryption configurations: GET /diskencryptionconfigurations.
     *
     * @param  array<string, mixed>  $options  Query options.
     * @return Collection<int, array<string, mixed>>
     */
    public function findDiskEncryptionConfigurations(array $options = []): Collection
    {
        return $this->fetch(new FindDiskEncryptionConfigurationsRequest($options));
    }

    /**
     * Finds disk encryption configurations by id: GET /diskencryptionconfigurations/id/{id}.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function findDiskEncryptionConfigurationsById(int|string $id, array $options = []): mixed
    {
        return $this->fetch(new FindDiskEncryptionConfigurationsByIdRequest($id, $options));
    }

    /**
     * Finds disk encryption configurations by name: GET /diskencryptionconfigurations/name/{name}.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function findDiskEncryptionConfigurationsByName(string $name, array $options = []): mixed
    {
        return $this->fetch(new FindDiskEncryptionConfigurationsByNameRequest($name, $options));
    }

    /**
     * Updates an existing disk encryption configuration by id: PUT /diskencryptionconfigurations/id/{id}.
     *
     * @param  array<string, mixed>|string  $record  The record as an array (written under <disk_encryption_configuration>), or the XML itself.
     */
    public function updateDiskEncryptionConfigurationById(int|string $id, array|string $record = []): mixed
    {
        return $this->fetch(new UpdateDiskEncryptionConfigurationByIdRequest($id, $record));
    }
}
