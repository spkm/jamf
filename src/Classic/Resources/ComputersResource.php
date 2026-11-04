<?php

namespace spkm\Jamf\Classic\Resources;

use Illuminate\Support\Collection;
use spkm\Jamf\Classic\ClassicConnector;
use spkm\Jamf\Classic\Requests\ClassicRequest;
use spkm\Jamf\Classic\Requests\Computers\CreateComputerByIdRequest;
use spkm\Jamf\Classic\Requests\Computers\DeleteComputerByIdRequest;
use spkm\Jamf\Classic\Requests\Computers\FindComputersBasicRequest;
use spkm\Jamf\Classic\Requests\Computers\FindComputersByIdRequest;
use spkm\Jamf\Classic\Requests\Computers\FindComputersByIdSubsetRequest;
use spkm\Jamf\Classic\Requests\Computers\FindComputersByMacAddressRequest;
use spkm\Jamf\Classic\Requests\Computers\FindComputersByNameRequest;
use spkm\Jamf\Classic\Requests\Computers\FindComputersBySerialNumberRequest;
use spkm\Jamf\Classic\Requests\Computers\FindComputersByUDIDRequest;
use spkm\Jamf\Classic\Requests\Computers\FindComputersRequest;
use spkm\Jamf\Classic\Requests\Computers\FlushComputerExtensionAttributeDataRequest;
use spkm\Jamf\Classic\Requests\Computers\MatchComputersNamesRequest;
use spkm\Jamf\Classic\Requests\Computers\MatchComputersRequest;
use spkm\Jamf\Classic\Requests\Computers\UpdateComputerByIdRequest;

/**
 * The computers endpoints of the Classic API, from Jamf::classic()->computers().
 */
class ComputersResource extends ClassicResource
{
    public function __construct(ClassicConnector $connector)
    {
        parent::__construct($connector);
    }

    protected function listRequest(): ClassicRequest
    {
        return new FindComputersRequest;
    }

    protected function itemRequest(int|string $id): ClassicRequest
    {
        return new FindComputersByIdRequest($id);
    }

    protected function createRequest(array|string $record): ClassicRequest
    {
        return new CreateComputerByIdRequest(0, $record);
    }

    protected function updateRequest(int|string $id, array|string $record): ClassicRequest
    {
        return new UpdateComputerByIdRequest($id, $record);
    }

    protected function deleteRequest(int|string $id): ClassicRequest
    {
        return new DeleteComputerByIdRequest($id);
    }

    /**
     * Creates a computer by specifying an id of 0: POST /computers/id/{id}.
     *
     * @deprecated Jamf deprecated this endpoint on 2025-03-07.
     *
     * @param  array<string, mixed>|string  $record  The record as an array (written under <computer>), or the XML itself.
     */
    public function createComputerById(int|string $id, array|string $record = []): mixed
    {
        return $this->fetch(new CreateComputerByIdRequest($id, $record));
    }

    /**
     * Deletes a computer by id: DELETE /computers/id/{id}.
     *
     * @deprecated Jamf deprecated this endpoint on 2025-02-11.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function deleteComputerById(int|string $id, array $options = []): bool
    {
        return $this->perform(new DeleteComputerByIdRequest($id, $options));
    }

    /**
     * Finds all computers: GET /computers.
     *
     * @deprecated Jamf deprecated this endpoint on 2025-02-11.
     *
     * @param  array<string, mixed>  $options  Query options.
     * @return Collection<int, array<string, mixed>>
     */
    public function findComputers(array $options = []): Collection
    {
        return $this->fetch(new FindComputersRequest($options));
    }

    /**
     * Finds all computers: GET /computers/subset/basic.
     *
     * @deprecated Jamf deprecated this endpoint on 2025-02-11.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function findComputersBasic(array $options = []): mixed
    {
        return $this->fetch(new FindComputersBasicRequest($options));
    }

    /**
     * Finds computers by id: GET /computers/id/{id}.
     *
     * @deprecated Jamf deprecated this endpoint on 2025-02-11.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function findComputersById(int|string $id, array $options = []): mixed
    {
        return $this->fetch(new FindComputersByIdRequest($id, $options));
    }

    /**
     * Display subsets of information for a computer: GET /computers/id/{id}/subset/{subset}.
     *
     * @deprecated Jamf deprecated this endpoint on 2025-02-11.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function findComputersByIdSubset(int|string $id, string $subset, array $options = []): mixed
    {
        return $this->fetch(new FindComputersByIdSubsetRequest($id, $subset, $options));
    }

    /**
     * Finds computers by mac address: GET /computers/macaddress/{macaddress}.
     *
     * @deprecated Jamf deprecated this endpoint on 2025-02-11.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function findComputersByMacAddress(string $macaddress, array $options = []): mixed
    {
        return $this->fetch(new FindComputersByMacAddressRequest($macaddress, $options));
    }

    /**
     * Finds the first computer with the given name: GET /computers/name/{name}.
     *
     * @deprecated Jamf deprecated this endpoint on 2025-02-11.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function findComputersByName(string $name, array $options = []): mixed
    {
        return $this->fetch(new FindComputersByNameRequest($name, $options));
    }

    /**
     * Finds computers by serial number: GET /computers/serialnumber/{serialnumber}.
     *
     * @deprecated Jamf deprecated this endpoint on 2025-02-11.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function findComputersBySerialNumber(string $serialnumber, array $options = []): mixed
    {
        return $this->fetch(new FindComputersBySerialNumberRequest($serialnumber, $options));
    }

    /**
     * Finds computers by UDID: GET /computers/udid/{udid}.
     *
     * @deprecated Jamf deprecated this endpoint on 2025-02-11.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function findComputersByUDID(string $udid, array $options = []): mixed
    {
        return $this->fetch(new FindComputersByUDIDRequest($udid, $options));
    }

    /**
     * Deletes data collected by an extension attribute: DELETE /computers/extensionattributedataflush/id/{id}.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function flushComputerExtensionAttributeData(int|string $id, array $options = []): bool
    {
        return $this->perform(new FlushComputerExtensionAttributeDataRequest($id, $options));
    }

    /**
     * Searches for computers that match the provided parameter: GET /computers/match/{match}.
     *
     * @deprecated Jamf deprecated this endpoint on 2025-02-11.
     *
     * @param  array<string, mixed>  $options  Query options.
     * @return Collection<int, array<string, mixed>>
     */
    public function matchComputers(string $match, array $options = []): Collection
    {
        return $this->fetch(new MatchComputersRequest($match, $options));
    }

    /**
     * Searches for computers that match the provided name parameter: GET /computers/match/name/{matchname}.
     *
     * @deprecated Jamf deprecated this endpoint on 2025-02-11.
     *
     * @param  array<string, mixed>  $options  Query options.
     * @return Collection<int, array<string, mixed>>
     */
    public function matchComputersNames(string $matchname, array $options = []): Collection
    {
        return $this->fetch(new MatchComputersNamesRequest($matchname, $options));
    }

    /**
     * Updates an existing computer by id: PUT /computers/id/{id}.
     *
     * @deprecated Jamf deprecated this endpoint on 2025-02-11.
     *
     * @param  array<string, mixed>|string  $record  The record as an array (written under <computer>), or the XML itself.
     */
    public function updateComputerById(int|string $id, array|string $record = []): mixed
    {
        return $this->fetch(new UpdateComputerByIdRequest($id, $record));
    }
}
