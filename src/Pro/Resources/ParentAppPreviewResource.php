<?php

namespace spkm\Jamf\Pro\Resources;

use JsonSerializable;
use spkm\Jamf\Pro\Data\ObjectHistory;
use spkm\Jamf\Pro\Data\ParentApp;
use spkm\Jamf\Pro\ProConnector;
use spkm\Jamf\Pro\Requests\ParentAppPreview\CreateParentAppHistoryV1Request;
use spkm\Jamf\Pro\Requests\ParentAppPreview\GetParentAppHistoryV1Request;
use spkm\Jamf\Pro\Requests\ParentAppPreview\GetParentAppV1Request;
use spkm\Jamf\Pro\Requests\ParentAppPreview\ReplaceParentAppV1Request;
use spkm\Jamf\Query\Builder;
use spkm\Jamf\Query\Query;
use spkm\Jamf\Requests\JamfRequest;
use spkm\Jamf\Requests\ListRequest;
use spkm\Jamf\Resources\PagedResource;

/**
 * The parent-app-preview endpoints of the Jamf Pro API, from Jamf::parentAppPreview().
 *
 * @extends Builder<ObjectHistory>
 */
class ParentAppPreviewResource extends Builder
{
    public function __construct(ProConnector $connector)
    {
        parent::__construct($connector, ObjectHistory::class);
    }

    protected function listRequest(Query $query): ListRequest
    {
        return new GetParentAppHistoryV1Request($query);
    }

    protected function createRequest(array $body): JamfRequest
    {
        return new CreateParentAppHistoryV1Request($body);
    }

    /**
     * Add Jamf Parent app settings history notes: POST /v1/parent-app/history.
     *
     * @param  array<mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options  Query options.
     */
    public function createParentAppHistoryV1(array|JsonSerializable $body, array $options = []): ?ObjectHistory
    {
        return $this->fetch(new CreateParentAppHistoryV1Request($body, $options));
    }

    /**
     * Get Jamf Parent app settings history: GET /v1/parent-app/history.
     *
     * A builder over the list: filter, sort, sections, get(), lazy() and the rest.
     *
     * @return PagedResource<ObjectHistory>
     */
    public function getParentAppHistoryV1(): PagedResource
    {
        return new PagedResource($this->pro(), ObjectHistory::class, fn (Query $query) => new GetParentAppHistoryV1Request($query));
    }

    /**
     * Get the current Jamf Parent app settings: GET /v1/parent-app.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function getParentAppV1(array $options = []): ?ParentApp
    {
        return $this->fetch(new GetParentAppV1Request($options));
    }

    /**
     * Update Jamf Parent app settings: PUT /v1/parent-app.
     *
     * @param  array<mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options  Query options.
     */
    public function replaceParentAppV1(array|JsonSerializable $body, array $options = []): ?ParentApp
    {
        return $this->fetch(new ReplaceParentAppV1Request($body, $options));
    }

    private function pro(): ProConnector
    {
        $connector = $this->connector();

        return $connector instanceof ProConnector ? $connector : throw new \LogicException('A Jamf Pro resource needs a Jamf Pro connector.');
    }
}
