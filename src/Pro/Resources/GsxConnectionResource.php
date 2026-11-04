<?php

namespace spkm\Jamf\Pro\Resources;

use JsonSerializable;
use spkm\Jamf\Pro\Data\GsxConnection;
use spkm\Jamf\Pro\Data\HrefResponse;
use spkm\Jamf\Pro\Data\ObjectHistoryV1;
use spkm\Jamf\Pro\ProConnector;
use spkm\Jamf\Pro\Requests\GsxConnection\CreateGsxConnectionHistoryV1Request;
use spkm\Jamf\Pro\Requests\GsxConnection\GetGsxConnectionHistoryV1Request;
use spkm\Jamf\Pro\Requests\GsxConnection\GetGsxConnectionV1Request;
use spkm\Jamf\Pro\Requests\GsxConnection\ReplaceGsxConnectionV1Request;
use spkm\Jamf\Pro\Requests\GsxConnection\TestGsxConnectionV1Request;
use spkm\Jamf\Pro\Requests\GsxConnection\UpdateGsxConnectionV1Request;
use spkm\Jamf\Query\Builder;
use spkm\Jamf\Query\Query;
use spkm\Jamf\Requests\JamfRequest;
use spkm\Jamf\Requests\ListRequest;
use spkm\Jamf\Resources\PagedResource;

/**
 * The gsx-connection endpoints of the Jamf Pro API, from Jamf::gsxConnection().
 *
 * @extends Builder<ObjectHistoryV1>
 */
class GsxConnectionResource extends Builder
{
    public function __construct(ProConnector $connector)
    {
        parent::__construct($connector, ObjectHistoryV1::class);
    }

    protected function listRequest(Query $query): ListRequest
    {
        return new GetGsxConnectionHistoryV1Request($query);
    }

    protected function createRequest(array $body): JamfRequest
    {
        return new CreateGsxConnectionHistoryV1Request($body);
    }

    /**
     * Add specified GSX Connection history object notes: POST /v1/gsx-connection/history.
     *
     * @param  array<mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options  Query options.
     */
    public function createGsxConnectionHistoryV1(array|JsonSerializable $body, array $options = []): ?HrefResponse
    {
        return $this->fetch(new CreateGsxConnectionHistoryV1Request($body, $options));
    }

    /**
     * Get specified GSX Connection History object: GET /v1/gsx-connection/history.
     *
     * A builder over the list: filter, sort, sections, get(), lazy() and the rest.
     *
     * @return PagedResource<ObjectHistoryV1>
     */
    public function getGsxConnectionHistoryV1(): PagedResource
    {
        return new PagedResource($this->pro(), ObjectHistoryV1::class, fn (Query $query) => new GetGsxConnectionHistoryV1Request($query));
    }

    /**
     * Finds the Jamf Pro GSX Connection information: GET /v1/gsx-connection.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function getGsxConnectionV1(array $options = []): ?GsxConnection
    {
        return $this->fetch(new GetGsxConnectionV1Request($options));
    }

    /**
     * Updates Jamf Pro GSX Connection information: PUT /v1/gsx-connection.
     *
     * @param  array<mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options  Query options.
     */
    public function replaceGsxConnectionV1(array|JsonSerializable $body, array $options = []): ?GsxConnection
    {
        return $this->fetch(new ReplaceGsxConnectionV1Request($body, $options));
    }

    /**
     * Test functionality of an GSX Connection: POST /v1/gsx-connection/test.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function testGsxConnectionV1(array $options = []): bool
    {
        return $this->perform(new TestGsxConnectionV1Request($options));
    }

    /**
     * Updates Jamf Pro GSX Connection information: PATCH /v1/gsx-connection.
     *
     * @param  array<mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options  Query options.
     */
    public function updateGsxConnectionV1(array|JsonSerializable $body, array $options = []): ?GsxConnection
    {
        return $this->fetch(new UpdateGsxConnectionV1Request($body, $options));
    }

    private function pro(): ProConnector
    {
        $connector = $this->connector();

        return $connector instanceof ProConnector ? $connector : throw new \LogicException('A Jamf Pro resource needs a Jamf Pro connector.');
    }
}
