<?php

namespace spkm\Jamf\Classic\Resources;

use Illuminate\Support\Collection;
use spkm\Jamf\Classic\ClassicConnector;
use spkm\Jamf\Classic\Requests\ClassicRequest;
use spkm\Jamf\Classic\Requests\Ebooks\CreateEBookByIdRequest;
use spkm\Jamf\Classic\Requests\Ebooks\DeleteEBookByIdRequest;
use spkm\Jamf\Classic\Requests\Ebooks\FindEBooksByIdRequest;
use spkm\Jamf\Classic\Requests\Ebooks\FindEBooksByNameRequest;
use spkm\Jamf\Classic\Requests\Ebooks\FindEBooksRequest;
use spkm\Jamf\Classic\Requests\Ebooks\FindEbookssByIdSubsetRequest;
use spkm\Jamf\Classic\Requests\Ebooks\UpdateEBookByIdRequest;

/**
 * The ebooks endpoints of the Classic API, from Jamf::classic()->ebooks().
 */
class EbooksResource extends ClassicResource
{
    public function __construct(ClassicConnector $connector)
    {
        parent::__construct($connector);
    }

    protected function listRequest(): ClassicRequest
    {
        return new FindEBooksRequest;
    }

    protected function itemRequest(int|string $id): ClassicRequest
    {
        return new FindEBooksByIdRequest($id);
    }

    protected function createRequest(array|string $record): ClassicRequest
    {
        return new CreateEBookByIdRequest(0, $record);
    }

    protected function updateRequest(int|string $id, array|string $record): ClassicRequest
    {
        return new UpdateEBookByIdRequest($id, $record);
    }

    protected function deleteRequest(int|string $id): ClassicRequest
    {
        return new DeleteEBookByIdRequest($id);
    }

    /**
     * Creates a new ebook by id: POST /ebooks/id/{id}.
     *
     * @param  array<string, mixed>|string  $record  The record as an array (written under <ebook>), or the XML itself.
     */
    public function createEBookById(int|string $id, array|string $record = []): mixed
    {
        return $this->fetch(new CreateEBookByIdRequest($id, $record));
    }

    /**
     * Deletes an ebook by id: DELETE /ebooks/id/{id}.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function deleteEBookById(int|string $id, array $options = []): bool
    {
        return $this->perform(new DeleteEBookByIdRequest($id, $options));
    }

    /**
     * Finds all ebooks: GET /ebooks.
     *
     * @param  array<string, mixed>  $options  Query options.
     * @return Collection<int, array<string, mixed>>
     */
    public function findEBooks(array $options = []): Collection
    {
        return $this->fetch(new FindEBooksRequest($options));
    }

    /**
     * Finds ebooks by id: GET /ebooks/id/{id}.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function findEBooksById(int|string $id, array $options = []): mixed
    {
        return $this->fetch(new FindEBooksByIdRequest($id, $options));
    }

    /**
     * Finds ebooks by name: GET /ebooks/name/{name}.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function findEBooksByName(string $name, array $options = []): mixed
    {
        return $this->fetch(new FindEBooksByNameRequest($name, $options));
    }

    /**
     * Display subsets of information for an ebook: GET /ebooks/id/{id}/subset/{subset}.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function findEbookssByIdSubset(int|string $id, string $subset, array $options = []): mixed
    {
        return $this->fetch(new FindEbookssByIdSubsetRequest($id, $subset, $options));
    }

    /**
     * Updates an existing ebook by id: PUT /ebooks/id/{id}.
     *
     * @param  array<string, mixed>|string  $record  The record as an array (written under <ebook>), or the XML itself.
     */
    public function updateEBookById(int|string $id, array|string $record = []): mixed
    {
        return $this->fetch(new UpdateEBookByIdRequest($id, $record));
    }
}
