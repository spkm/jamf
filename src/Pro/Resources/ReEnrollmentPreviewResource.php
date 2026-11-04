<?php

namespace spkm\Jamf\Pro\Resources;

use JsonSerializable;
use spkm\Jamf\Pro\Data\ObjectHistory;
use spkm\Jamf\Pro\Data\Reenrollment;
use spkm\Jamf\Pro\ProConnector;
use spkm\Jamf\Pro\Requests\ReEnrollmentPreview\CreateReenrollmentHistoryV1Request;
use spkm\Jamf\Pro\Requests\ReEnrollmentPreview\ExportReenrollmentHistoryV1Request;
use spkm\Jamf\Pro\Requests\ReEnrollmentPreview\GetReenrollmentHistoryV1Request;
use spkm\Jamf\Pro\Requests\ReEnrollmentPreview\GetReenrollmentV1Request;
use spkm\Jamf\Pro\Requests\ReEnrollmentPreview\ReplaceReenrollmentV1Request;
use spkm\Jamf\Query\Builder;
use spkm\Jamf\Query\Query;
use spkm\Jamf\Requests\JamfRequest;
use spkm\Jamf\Requests\ListRequest;
use spkm\Jamf\Resources\PagedResource;

/**
 * The re-enrollment-preview endpoints of the Jamf Pro API, from Jamf::reEnrollmentPreview().
 *
 * @extends Builder<ObjectHistory>
 */
class ReEnrollmentPreviewResource extends Builder
{
    public function __construct(ProConnector $connector)
    {
        parent::__construct($connector, ObjectHistory::class);
    }

    protected function listRequest(Query $query): ListRequest
    {
        return new GetReenrollmentHistoryV1Request($query);
    }

    protected function createRequest(array $body): JamfRequest
    {
        return new CreateReenrollmentHistoryV1Request($body);
    }

    /**
     * Add specified Re-enrollment history object notes: POST /v1/reenrollment/history.
     *
     * @param  array<mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options  Query options.
     */
    public function createReenrollmentHistoryV1(array|JsonSerializable $body, array $options = []): ?ObjectHistory
    {
        return $this->fetch(new CreateReenrollmentHistoryV1Request($body, $options));
    }

    /**
     * Export reenrollment history collection: POST /v1/reenrollment/history/export.
     *
     * @param  array<mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options  Query options Jamf documents: export-fields, export-labels, page,
     *                                         page-size, sort, filter.
     */
    public function exportReenrollmentHistoryV1(array|JsonSerializable $body = [], array $options = []): mixed
    {
        return $this->fetch(new ExportReenrollmentHistoryV1Request($body, $options));
    }

    /**
     * Get Re-enrollment history object: GET /v1/reenrollment/history.
     *
     * A builder over the list: filter, sort, sections, get(), lazy() and the rest.
     *
     * @return PagedResource<ObjectHistory>
     */
    public function getReenrollmentHistoryV1(): PagedResource
    {
        return new PagedResource($this->pro(), ObjectHistory::class, fn (Query $query) => new GetReenrollmentHistoryV1Request($query));
    }

    /**
     * Get Re-enrollment object: GET /v1/reenrollment.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function getReenrollmentV1(array $options = []): ?Reenrollment
    {
        return $this->fetch(new GetReenrollmentV1Request($options));
    }

    /**
     * Update the Re-enrollment object: PUT /v1/reenrollment.
     *
     * @param  array<mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options  Query options.
     */
    public function replaceReenrollmentV1(array|JsonSerializable $body, array $options = []): ?Reenrollment
    {
        return $this->fetch(new ReplaceReenrollmentV1Request($body, $options));
    }

    private function pro(): ProConnector
    {
        $connector = $this->connector();

        return $connector instanceof ProConnector ? $connector : throw new \LogicException('A Jamf Pro resource needs a Jamf Pro connector.');
    }
}
