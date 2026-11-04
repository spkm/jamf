<?php

namespace spkm\Jamf\Classic\Resources;

use Illuminate\Support\Collection;
use spkm\Jamf\Classic\ClassicConnector;
use spkm\Jamf\Classic\Requests\ClassicRequest;
use spkm\Jamf\Classic\Requests\Printers\CreatePrinterByIdRequest;
use spkm\Jamf\Classic\Requests\Printers\DeletePrinterByIdRequest;
use spkm\Jamf\Classic\Requests\Printers\FindPrintersByIdRequest;
use spkm\Jamf\Classic\Requests\Printers\FindPrintersByNameRequest;
use spkm\Jamf\Classic\Requests\Printers\FindPrintersRequest;
use spkm\Jamf\Classic\Requests\Printers\UpdatePrinterByIdRequest;

/**
 * The printers endpoints of the Classic API, from Jamf::classic()->printers().
 */
class PrintersResource extends ClassicResource
{
    public function __construct(ClassicConnector $connector)
    {
        parent::__construct($connector);
    }

    protected function listRequest(): ClassicRequest
    {
        return new FindPrintersRequest;
    }

    protected function itemRequest(int|string $id): ClassicRequest
    {
        return new FindPrintersByIdRequest($id);
    }

    protected function createRequest(array|string $record): ClassicRequest
    {
        return new CreatePrinterByIdRequest(0, $record);
    }

    protected function updateRequest(int|string $id, array|string $record): ClassicRequest
    {
        return new UpdatePrinterByIdRequest($id, $record);
    }

    protected function deleteRequest(int|string $id): ClassicRequest
    {
        return new DeletePrinterByIdRequest($id);
    }

    /**
     * Creates a new printer by id: POST /printers/id/{id}.
     *
     * @param  array<string, mixed>|string  $record  The record as an array (written under <printer>), or the XML itself.
     */
    public function createPrinterById(int|string $id, array|string $record = []): mixed
    {
        return $this->fetch(new CreatePrinterByIdRequest($id, $record));
    }

    /**
     * Deletes a printer by id: DELETE /printers/id/{id}.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function deletePrinterById(int|string $id, array $options = []): bool
    {
        return $this->perform(new DeletePrinterByIdRequest($id, $options));
    }

    /**
     * Finds all printers: GET /printers.
     *
     * @param  array<string, mixed>  $options  Query options.
     * @return Collection<int, array<string, mixed>>
     */
    public function findPrinters(array $options = []): Collection
    {
        return $this->fetch(new FindPrintersRequest($options));
    }

    /**
     * Finds printers by id: GET /printers/id/{id}.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function findPrintersById(int|string $id, array $options = []): mixed
    {
        return $this->fetch(new FindPrintersByIdRequest($id, $options));
    }

    /**
     * Finds printers by name: GET /printers/name/{name}.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function findPrintersByName(string $name, array $options = []): mixed
    {
        return $this->fetch(new FindPrintersByNameRequest($name, $options));
    }

    /**
     * Updates an existing printer by id: PUT /printers/id/{id}.
     *
     * @param  array<string, mixed>|string  $record  The record as an array (written under <printer>), or the XML itself.
     */
    public function updatePrinterById(int|string $id, array|string $record = []): mixed
    {
        return $this->fetch(new UpdatePrinterByIdRequest($id, $record));
    }
}
