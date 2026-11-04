<?php

namespace spkm\Jamf\Classic\Resources;

use Illuminate\Support\Collection;
use spkm\Jamf\Classic\ClassicConnector;
use spkm\Jamf\Classic\Requests\ClassicRequest;
use spkm\Jamf\Classic\Requests\IBeacons\CreateIBeaconByIdRequest;
use spkm\Jamf\Classic\Requests\IBeacons\DeleteIBeaconByIdRequest;
use spkm\Jamf\Classic\Requests\IBeacons\FindIBeaconsByIdRequest;
use spkm\Jamf\Classic\Requests\IBeacons\FindIBeaconsByNameRequest;
use spkm\Jamf\Classic\Requests\IBeacons\FindIBeaconsRequest;
use spkm\Jamf\Classic\Requests\IBeacons\UpdateIBeaconByIdRequest;

/**
 * The ibeacons endpoints of the Classic API, from Jamf::classic()->ibeacons().
 */
class IBeaconsResource extends ClassicResource
{
    public function __construct(ClassicConnector $connector)
    {
        parent::__construct($connector);
    }

    protected function listRequest(): ClassicRequest
    {
        return new FindIBeaconsRequest;
    }

    protected function itemRequest(int|string $id): ClassicRequest
    {
        return new FindIBeaconsByIdRequest($id);
    }

    protected function createRequest(array|string $record): ClassicRequest
    {
        return new CreateIBeaconByIdRequest(0, $record);
    }

    protected function updateRequest(int|string $id, array|string $record): ClassicRequest
    {
        return new UpdateIBeaconByIdRequest($id, $record);
    }

    protected function deleteRequest(int|string $id): ClassicRequest
    {
        return new DeleteIBeaconByIdRequest($id);
    }

    /**
     * Creates a new iBeacon region by id: POST /ibeacons/id/{id}.
     *
     * @param  array<string, mixed>|string  $record  The record as an array (written under <ibeacon>), or the XML itself.
     */
    public function createIBeaconById(int|string $id, array|string $record = []): mixed
    {
        return $this->fetch(new CreateIBeaconByIdRequest($id, $record));
    }

    /**
     * Deletes an iBeacon region by id: DELETE /ibeacons/id/{id}.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function deleteIBeaconById(int|string $id, array $options = []): bool
    {
        return $this->perform(new DeleteIBeaconByIdRequest($id, $options));
    }

    /**
     * Finds all iBeacon regions: GET /ibeacons.
     *
     * @param  array<string, mixed>  $options  Query options.
     * @return Collection<int, array<string, mixed>>
     */
    public function findIBeacons(array $options = []): Collection
    {
        return $this->fetch(new FindIBeaconsRequest($options));
    }

    /**
     * Finds iBeacon regions by id: GET /ibeacons/id/{id}.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function findIBeaconsById(int|string $id, array $options = []): mixed
    {
        return $this->fetch(new FindIBeaconsByIdRequest($id, $options));
    }

    /**
     * Finds iBeacon regions by name: GET /ibeacons/name/{name}.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function findIBeaconsByName(string $name, array $options = []): mixed
    {
        return $this->fetch(new FindIBeaconsByNameRequest($name, $options));
    }

    /**
     * Updates an existing iBeacon region by id: PUT /ibeacons/id/{id}.
     *
     * @param  array<string, mixed>|string  $record  The record as an array (written under <ibeacon>), or the XML itself.
     */
    public function updateIBeaconById(int|string $id, array|string $record = []): mixed
    {
        return $this->fetch(new UpdateIBeaconByIdRequest($id, $record));
    }
}
