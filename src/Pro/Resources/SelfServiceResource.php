<?php

namespace spkm\Jamf\Pro\Resources;

use JsonSerializable;
use spkm\Jamf\Pro\Data\HrefResponse;
use spkm\Jamf\Pro\Data\ObjectHistory;
use spkm\Jamf\Pro\Data\SelfServiceSettings;
use spkm\Jamf\Pro\ProConnector;
use spkm\Jamf\Pro\Requests\SelfService\CreateSelfServiceSettingsHistoryV1Request;
use spkm\Jamf\Pro\Requests\SelfService\GetSelfServiceSettingsHistoryV1Request;
use spkm\Jamf\Pro\Requests\SelfService\GetSelfServiceSettingsV1Request;
use spkm\Jamf\Pro\Requests\SelfService\ReplaceSelfServiceSettingsV1Request;
use spkm\Jamf\Query\Builder;
use spkm\Jamf\Query\Query;
use spkm\Jamf\Requests\JamfRequest;
use spkm\Jamf\Requests\ListRequest;
use spkm\Jamf\Resources\PagedResource;

/**
 * The self-service endpoints of the Jamf Pro API, from Jamf::selfService().
 *
 * @extends Builder<ObjectHistory>
 */
class SelfServiceResource extends Builder
{
    public function __construct(ProConnector $connector)
    {
        parent::__construct($connector, ObjectHistory::class);
    }

    protected function listRequest(Query $query): ListRequest
    {
        return new GetSelfServiceSettingsHistoryV1Request($query);
    }

    protected function createRequest(array $body): JamfRequest
    {
        return new CreateSelfServiceSettingsHistoryV1Request($body);
    }

    /**
     * Add Self Service settings history notes: POST /v1/self-service/settings/history.
     *
     * @param  array<mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options  Query options.
     */
    public function createSelfServiceSettingsHistoryV1(array|JsonSerializable $body, array $options = []): ?HrefResponse
    {
        return $this->fetch(new CreateSelfServiceSettingsHistoryV1Request($body, $options));
    }

    /**
     * Get a page of Self Service settings history: GET /v1/self-service/settings/history.
     *
     * A builder over the list: filter, sort, sections, get(), lazy() and the rest.
     *
     * @return PagedResource<ObjectHistory>
     */
    public function getSelfServiceSettingsHistoryV1(): PagedResource
    {
        return new PagedResource($this->pro(), ObjectHistory::class, fn (Query $query) => new GetSelfServiceSettingsHistoryV1Request($query));
    }

    /**
     * Get an object representation of Self Service settings: GET /v1/self-service/settings.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function getSelfServiceSettingsV1(array $options = []): ?SelfServiceSettings
    {
        return $this->fetch(new GetSelfServiceSettingsV1Request($options));
    }

    /**
     * Put an object representation of Self Service settings: PUT /v1/self-service/settings.
     *
     * @param  array<mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options  Query options.
     */
    public function replaceSelfServiceSettingsV1(array|JsonSerializable $body, array $options = []): ?SelfServiceSettings
    {
        return $this->fetch(new ReplaceSelfServiceSettingsV1Request($body, $options));
    }

    private function pro(): ProConnector
    {
        $connector = $this->connector();

        return $connector instanceof ProConnector ? $connector : throw new \LogicException('A Jamf Pro resource needs a Jamf Pro connector.');
    }
}
