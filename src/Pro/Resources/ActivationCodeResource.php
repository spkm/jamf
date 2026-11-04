<?php

namespace spkm\Jamf\Pro\Resources;

use JsonSerializable;
use spkm\Jamf\Pro\Data\ObjectHistory;
use spkm\Jamf\Pro\ProConnector;
use spkm\Jamf\Pro\Requests\ActivationCode\CreateActivationCodeHistoryV1Request;
use spkm\Jamf\Pro\Requests\ActivationCode\ExportActivationCodeHistoryV1Request;
use spkm\Jamf\Pro\Requests\ActivationCode\GetActivationCodeHistoryV1Request;
use spkm\Jamf\Pro\Requests\ActivationCode\ReplaceActivationCodeV1Request;
use spkm\Jamf\Pro\Requests\ActivationCode\UpdateActivationCodeOrganizationNameV1Request;
use spkm\Jamf\Query\Builder;
use spkm\Jamf\Query\Query;
use spkm\Jamf\Requests\JamfRequest;
use spkm\Jamf\Requests\ListRequest;
use spkm\Jamf\Resources\PagedResource;

/**
 * The activation-code endpoints of the Jamf Pro API, from Jamf::activationCode().
 *
 * @extends Builder<ObjectHistory>
 */
class ActivationCodeResource extends Builder
{
    public function __construct(ProConnector $connector)
    {
        parent::__construct($connector, ObjectHistory::class);
    }

    protected function listRequest(Query $query): ListRequest
    {
        return new GetActivationCodeHistoryV1Request($query);
    }

    protected function createRequest(array $body): JamfRequest
    {
        return new CreateActivationCodeHistoryV1Request($body);
    }

    /**
     * Add Activation Code object note: POST /v1/activation-code/history.
     *
     * @param  array<mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options  Query options.
     */
    public function createActivationCodeHistoryV1(array|JsonSerializable $body, array $options = []): ?ObjectHistory
    {
        return $this->fetch(new CreateActivationCodeHistoryV1Request($body, $options));
    }

    /**
     * Export history object collection in specified format for Activation Code: POST
     * /v1/activation-code/history/export.
     *
     * @param  array<mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options  Query options Jamf documents: export-fields, export-labels, page,
     *                                         page-size, sort, filter.
     */
    public function exportActivationCodeHistoryV1(array|JsonSerializable $body = [], array $options = []): ?string
    {
        return $this->fetch(new ExportActivationCodeHistoryV1Request($body, $options));
    }

    /**
     * Get Activation Code history object: GET /v1/activation-code/history.
     *
     * A builder over the list: filter, sort, sections, get(), lazy() and the rest.
     *
     * @return PagedResource<ObjectHistory>
     */
    public function getActivationCodeHistoryV1(): PagedResource
    {
        return new PagedResource($this->pro(), ObjectHistory::class, fn (Query $query) => new GetActivationCodeHistoryV1Request($query));
    }

    /**
     * Updates Activation Code: PUT /v1/activation-code.
     *
     * @param  array<mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options  Query options.
     */
    public function replaceActivationCodeV1(array|JsonSerializable $body = [], array $options = []): bool
    {
        return $this->perform(new ReplaceActivationCodeV1Request($body, $options));
    }

    /**
     * Updates Organization Name: PATCH /v1/activation-code/organization-name.
     *
     * @param  array<mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options  Query options.
     */
    public function updateActivationCodeOrganizationNameV1(array|JsonSerializable $body = [], array $options = []): bool
    {
        return $this->perform(new UpdateActivationCodeOrganizationNameV1Request($body, $options));
    }

    private function pro(): ProConnector
    {
        $connector = $this->connector();

        return $connector instanceof ProConnector ? $connector : throw new \LogicException('A Jamf Pro resource needs a Jamf Pro connector.');
    }
}
