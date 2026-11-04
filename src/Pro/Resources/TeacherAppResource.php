<?php

namespace spkm\Jamf\Pro\Resources;

use JsonSerializable;
use spkm\Jamf\Pro\Data\HrefResponse;
use spkm\Jamf\Pro\Data\ObjectHistory;
use spkm\Jamf\Pro\Data\TeacherSettingsResponse;
use spkm\Jamf\Pro\ProConnector;
use spkm\Jamf\Pro\Requests\TeacherApp\CreateTeacherAppHistoryV1Request;
use spkm\Jamf\Pro\Requests\TeacherApp\GetTeacherAppHistoryV1Request;
use spkm\Jamf\Pro\Requests\TeacherApp\GetTeacherAppV1Request;
use spkm\Jamf\Pro\Requests\TeacherApp\ReplaceTeacherAppV1Request;
use spkm\Jamf\Query\Builder;
use spkm\Jamf\Query\Query;
use spkm\Jamf\Requests\JamfRequest;
use spkm\Jamf\Requests\ListRequest;
use spkm\Jamf\Resources\PagedResource;

/**
 * The teacher-app endpoints of the Jamf Pro API, from Jamf::teacherApp().
 *
 * @extends Builder<ObjectHistory>
 */
class TeacherAppResource extends Builder
{
    public function __construct(ProConnector $connector)
    {
        parent::__construct($connector, ObjectHistory::class);
    }

    protected function listRequest(Query $query): ListRequest
    {
        return new GetTeacherAppHistoryV1Request($query);
    }

    protected function createRequest(array $body): JamfRequest
    {
        return new CreateTeacherAppHistoryV1Request($body);
    }

    /**
     * Add Jamf Teacher app settings history notes: POST /v1/teacher-app/history.
     *
     * @param  array<mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options  Query options.
     */
    public function createTeacherAppHistoryV1(array|JsonSerializable $body, array $options = []): ?HrefResponse
    {
        return $this->fetch(new CreateTeacherAppHistoryV1Request($body, $options));
    }

    /**
     * Get Jamf Teacher app settings history: GET /v1/teacher-app/history.
     *
     * A builder over the list: filter, sort, sections, get(), lazy() and the rest.
     *
     * @return PagedResource<ObjectHistory>
     */
    public function getTeacherAppHistoryV1(): PagedResource
    {
        return new PagedResource($this->pro(), ObjectHistory::class, fn (Query $query) => new GetTeacherAppHistoryV1Request($query));
    }

    /**
     * Get the Jamf Teacher settings that you have access to see: GET /v1/teacher-app.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function getTeacherAppV1(array $options = []): ?TeacherSettingsResponse
    {
        return $this->fetch(new GetTeacherAppV1Request($options));
    }

    /**
     * Update a Jamf Teacher settings object: PUT /v1/teacher-app.
     *
     * @param  array<mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options  Query options.
     */
    public function replaceTeacherAppV1(array|JsonSerializable $body, array $options = []): ?TeacherSettingsResponse
    {
        return $this->fetch(new ReplaceTeacherAppV1Request($body, $options));
    }

    private function pro(): ProConnector
    {
        $connector = $this->connector();

        return $connector instanceof ProConnector ? $connector : throw new \LogicException('A Jamf Pro resource needs a Jamf Pro connector.');
    }
}
