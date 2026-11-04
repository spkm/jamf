<?php

namespace spkm\Jamf\Pro\Resources;

use JsonSerializable;
use spkm\Jamf\Pro\Data\HrefResponse;
use spkm\Jamf\Pro\Data\ObjectHistory;
use spkm\Jamf\Pro\Data\Script;
use spkm\Jamf\Pro\ProConnector;
use spkm\Jamf\Pro\Requests\Scripts\CreateScriptHistoryV1Request;
use spkm\Jamf\Pro\Requests\Scripts\CreateScriptsV1Request;
use spkm\Jamf\Pro\Requests\Scripts\DeleteScriptV1Request;
use spkm\Jamf\Pro\Requests\Scripts\GetScriptDownloadV1Request;
use spkm\Jamf\Pro\Requests\Scripts\GetScriptHistoryV1Request;
use spkm\Jamf\Pro\Requests\Scripts\GetScriptsV1Request;
use spkm\Jamf\Pro\Requests\Scripts\GetScriptV1Request;
use spkm\Jamf\Pro\Requests\Scripts\ReplaceScriptV1Request;
use spkm\Jamf\Query\Builder;
use spkm\Jamf\Query\Query;
use spkm\Jamf\Requests\JamfRequest;
use spkm\Jamf\Requests\ListRequest;
use spkm\Jamf\Resources\PagedResource;

/**
 * The scripts endpoints of the Jamf Pro API, from Jamf::scripts().
 *
 * @extends Builder<Script>
 */
class ScriptsResource extends Builder
{
    public function __construct(ProConnector $connector)
    {
        parent::__construct($connector, Script::class);
    }

    protected function listRequest(Query $query): ListRequest
    {
        return new GetScriptsV1Request($query);
    }

    protected function itemRequest(int|string $id): JamfRequest
    {
        return new GetScriptV1Request($id);
    }

    protected function createRequest(array $body): JamfRequest
    {
        return new CreateScriptsV1Request($body);
    }

    protected function updateRequest(int|string $id, array $body): JamfRequest
    {
        return new ReplaceScriptV1Request($id, $body);
    }

    protected function deleteRequest(int|string $id): JamfRequest
    {
        return new DeleteScriptV1Request($id);
    }

    /**
     * Add specified Script history object notes: POST /v1/scripts/{id}/history.
     *
     * @param  array<mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options  Query options.
     */
    public function createScriptHistoryV1(int|string $id, array|JsonSerializable $body, array $options = []): ?ObjectHistory
    {
        return $this->fetch(new CreateScriptHistoryV1Request($id, $body, $options));
    }

    /**
     * Create a Script: POST /v1/scripts.
     *
     * @param  array<mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options  Query options.
     */
    public function createScriptsV1(array|JsonSerializable $body, array $options = []): ?HrefResponse
    {
        return $this->fetch(new CreateScriptsV1Request($body, $options));
    }

    /**
     * Delete a Script at the specified id: DELETE /v1/scripts/{id}.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function deleteScriptV1(int|string $id, array $options = []): bool
    {
        return $this->perform(new DeleteScriptV1Request($id, $options));
    }

    /**
     * Download a text file of the Script contents: GET /v1/scripts/{id}/download.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function getScriptDownloadV1(int|string $id, array $options = []): ?string
    {
        return $this->fetch(new GetScriptDownloadV1Request($id, $options));
    }

    /**
     * Get specified Script history object: GET /v1/scripts/{id}/history.
     *
     * A builder over the list: filter, sort, sections, get(), lazy() and the rest.
     *
     * @return PagedResource<ObjectHistory>
     */
    public function getScriptHistoryV1(int|string $id): PagedResource
    {
        return new PagedResource($this->pro(), ObjectHistory::class, fn (Query $query) => new GetScriptHistoryV1Request($id, $query));
    }

    /**
     * Retrieve a full script object: GET /v1/scripts/{id}.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function getScriptV1(int|string $id, array $options = []): ?Script
    {
        return $this->fetch(new GetScriptV1Request($id, $options));
    }

    /**
     * Search for sorted and paged Scripts: GET /v1/scripts.
     *
     * A builder over the list: filter, sort, sections, get(), lazy() and the rest.
     *
     * @return PagedResource<Script>
     */
    public function getScriptsV1(): PagedResource
    {
        return new PagedResource($this->pro(), Script::class, fn (Query $query) => new GetScriptsV1Request($query));
    }

    /**
     * Replace the script at the id with the supplied information: PUT /v1/scripts/{id}.
     *
     * @param  array<mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options  Query options.
     */
    public function replaceScriptV1(int|string $id, array|JsonSerializable $body, array $options = []): ?Script
    {
        return $this->fetch(new ReplaceScriptV1Request($id, $body, $options));
    }

    private function pro(): ProConnector
    {
        $connector = $this->connector();

        return $connector instanceof ProConnector ? $connector : throw new \LogicException('A Jamf Pro resource needs a Jamf Pro connector.');
    }
}
