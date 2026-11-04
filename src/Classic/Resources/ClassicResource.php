<?php

namespace spkm\Jamf\Classic\Resources;

use Illuminate\Support\Collection;
use LogicException;
use spkm\Jamf\Classic\ClassicConnector;
use spkm\Jamf\Classic\Requests\ClassicRequest;
use spkm\Jamf\Exceptions\NotFoundException;
use spkm\Jamf\Resources\BaseResource;

/**
 * One Classic API collection: its list (each record's id and name), a record by id, and creating, updating and
 * deleting records. Records are arrays of Jamf's field names; a record to write is an array (written as XML under
 * the element naming its kind) or the XML itself. The Classic API neither filters nor pages its lists.
 *
 * @extends BaseResource<never>
 */
abstract class ClassicResource extends BaseResource
{
    public function __construct(ClassicConnector $connector)
    {
        parent::__construct($connector, null);
    }

    abstract protected function listRequest(): ClassicRequest;

    protected function itemRequest(int|string $id): ?ClassicRequest
    {
        return null;
    }

    /**
     * @param  array<string, mixed>|string  $record
     */
    protected function createRequest(array|string $record): ?ClassicRequest
    {
        return null;
    }

    /**
     * @param  array<string, mixed>|string  $record
     */
    protected function updateRequest(int|string $id, array|string $record): ?ClassicRequest
    {
        return null;
    }

    protected function deleteRequest(int|string $id): ?ClassicRequest
    {
        return null;
    }

    /**
     * Every record in the collection, as Jamf lists them (usually an id and a name each).
     *
     * @return Collection<int, array<string, mixed>>
     */
    public function get(): Collection
    {
        $records = $this->fetch($this->listRequest());

        return $records instanceof Collection ? $records : collect($records === null ? [] : [$records]);
    }

    /**
     * @return Collection<int, array<string, mixed>>
     */
    public function all(): Collection
    {
        return $this->get();
    }

    public function count(): int
    {
        return $this->get()->count();
    }

    /**
     * The record with the given id, or null when Jamf has none.
     *
     * @return array<string, mixed>|null
     */
    public function find(int|string $id): ?array
    {
        $record = $this->fetchOrNull($this->itemRequest($id) ?? $this->undocumented('find'));

        return is_array($record) ? $record : null;
    }

    /**
     * @return array<string, mixed>
     */
    public function findOrFail(int|string $id): array
    {
        $request = $this->itemRequest($id) ?? $this->undocumented('find');
        $record = $this->fetch($request);

        return is_array($record) ? $record : throw new NotFoundException($this->connector->send($request));
    }

    /**
     * Create a record. Jamf answers with its id, as ['id' => '42'].
     *
     * @param  array<string, mixed>|string  $record
     * @return array<string, mixed>|null
     */
    public function create(array|string $record): ?array
    {
        $answer = $this->fetch($this->createRequest($record) ?? $this->undocumented('create'));

        return is_array($answer) ? $answer : null;
    }

    /**
     * Change a record: only the fields given are changed. Jamf answers with its id.
     *
     * @param  array<string, mixed>|string  $record
     * @return array<string, mixed>|null
     */
    public function update(int|string $id, array|string $record): ?array
    {
        $answer = $this->fetch($this->updateRequest($id, $record) ?? $this->undocumented('update'));

        return is_array($answer) ? $answer : null;
    }

    public function delete(int|string $id): bool
    {
        $this->fetch($this->deleteRequest($id) ?? $this->undocumented('delete'));

        return true;
    }

    private function undocumented(string $action): never
    {
        throw new LogicException("Jamf's Classic API documents no way to $action these records.");
    }
}
