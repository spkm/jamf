<?php

namespace spkm\Jamf\Pro\Resources;

use JsonSerializable;
use spkm\Jamf\Pro\Data\ClientCheckInV3;
use spkm\Jamf\Pro\Data\HrefResponse;
use spkm\Jamf\Pro\Data\ObjectHistoryV1;
use spkm\Jamf\Pro\ProConnector;
use spkm\Jamf\Pro\Requests\ClientCheckIn\CreateCheckInHistoryV3Request;
use spkm\Jamf\Pro\Requests\ClientCheckIn\GetCheckInHistoryV3Request;
use spkm\Jamf\Pro\Requests\ClientCheckIn\GetCheckInV3Request;
use spkm\Jamf\Pro\Requests\ClientCheckIn\ReplaceCheckInV3Request;
use spkm\Jamf\Query\Builder;
use spkm\Jamf\Query\Query;
use spkm\Jamf\Requests\JamfRequest;
use spkm\Jamf\Requests\ListRequest;
use spkm\Jamf\Resources\PagedResource;

/**
 * The client-check-in endpoints of the Jamf Pro API, from Jamf::clientCheckIn().
 *
 * @extends Builder<ObjectHistoryV1>
 */
class ClientCheckInResource extends Builder
{
    public function __construct(ProConnector $connector)
    {
        parent::__construct($connector, ObjectHistoryV1::class);
    }

    protected function listRequest(Query $query): ListRequest
    {
        return new GetCheckInHistoryV3Request($query);
    }

    protected function createRequest(array $body): JamfRequest
    {
        return new CreateCheckInHistoryV3Request($body);
    }

    /**
     * Add a Note to Client Check-In History: POST /v3/check-in/history.
     *
     * @param  array<mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options  Query options.
     */
    public function createCheckInHistoryV3(array|JsonSerializable $body, array $options = []): ?HrefResponse
    {
        return $this->fetch(new CreateCheckInHistoryV3Request($body, $options));
    }

    /**
     * Get Client Check-In history object: GET /v3/check-in/history.
     *
     * A builder over the list: filter, sort, sections, get(), lazy() and the rest.
     *
     * @return PagedResource<ObjectHistoryV1>
     */
    public function getCheckInHistoryV3(): PagedResource
    {
        return new PagedResource($this->pro(), ObjectHistoryV1::class, fn (Query $query) => new GetCheckInHistoryV3Request($query));
    }

    /**
     * Get Client Check-In settings: GET /v3/check-in.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function getCheckInV3(array $options = []): ?ClientCheckInV3
    {
        return $this->fetch(new GetCheckInV3Request($options));
    }

    /**
     * Update Client Check-In object: PUT /v3/check-in.
     *
     * @param  array<mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options  Query options.
     */
    public function replaceCheckInV3(array|JsonSerializable $body, array $options = []): ?ClientCheckInV3
    {
        return $this->fetch(new ReplaceCheckInV3Request($body, $options));
    }

    private function pro(): ProConnector
    {
        $connector = $this->connector();

        return $connector instanceof ProConnector ? $connector : throw new \LogicException('A Jamf Pro resource needs a Jamf Pro connector.');
    }
}
