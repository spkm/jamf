<?php

namespace spkm\Jamf\Pro\Resources;

use Illuminate\Support\Collection;
use JsonSerializable;
use spkm\Jamf\Pro\Data\SessionHistoryItem;
use spkm\Jamf\Pro\Data\SessionHistoryItemWithDetails;
use spkm\Jamf\Pro\ProConnector;
use spkm\Jamf\Pro\Requests\JamfRemoteAssist\ExportJamfRemoteAssistSessionV2Request;
use spkm\Jamf\Pro\Requests\JamfRemoteAssist\GetJamfRemoteAssistSessionByIdV1Request;
use spkm\Jamf\Pro\Requests\JamfRemoteAssist\GetJamfRemoteAssistSessionByIdV2Request;
use spkm\Jamf\Pro\Requests\JamfRemoteAssist\GetJamfRemoteAssistSessionV1Request;
use spkm\Jamf\Pro\Requests\JamfRemoteAssist\GetJamfRemoteAssistSessionV2Request;
use spkm\Jamf\Query\Builder;
use spkm\Jamf\Query\Query;
use spkm\Jamf\Requests\JamfRequest;
use spkm\Jamf\Requests\ListRequest;
use spkm\Jamf\Resources\PagedResource;

/**
 * The jamf-remote-assist endpoints of the Jamf Pro API, from Jamf::jamfRemoteAssist().
 *
 * @extends Builder<SessionHistoryItem>
 */
class JamfRemoteAssistResource extends Builder
{
    public function __construct(ProConnector $connector)
    {
        parent::__construct($connector, SessionHistoryItem::class);
    }

    protected function listRequest(Query $query): ListRequest
    {
        return new GetJamfRemoteAssistSessionV2Request($query);
    }

    protected function itemRequest(int|string $id): JamfRequest
    {
        return new GetJamfRemoteAssistSessionByIdV2Request($id);
    }

    /**
     * Export Jamf Remote Assist sessions history: POST /v2/jamf-remote-assist/session/export.
     *
     * @param  array<mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options  Query options.
     */
    public function exportJamfRemoteAssistSessionV2(array|JsonSerializable $body = [], array $options = []): ?string
    {
        return $this->fetch(new ExportJamfRemoteAssistSessionV2Request($body, $options));
    }

    /**
     * Gets single session history item: GET /v1/jamf-remote-assist/session/{id}.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function getJamfRemoteAssistSessionByIdV1(int|string $id, array $options = []): ?SessionHistoryItemWithDetails
    {
        return $this->fetch(new GetJamfRemoteAssistSessionByIdV1Request($id, $options));
    }

    /**
     * Gets single session history item: GET /v2/jamf-remote-assist/session/{id}.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function getJamfRemoteAssistSessionByIdV2(int|string $id, array $options = []): ?SessionHistoryItemWithDetails
    {
        return $this->fetch(new GetJamfRemoteAssistSessionByIdV2Request($id, $options));
    }

    /**
     * Gets session history items: GET /v1/jamf-remote-assist/session.
     *
     * @param  array<string, mixed>  $options  Query options.
     * @return Collection<int, SessionHistoryItem>
     */
    public function getJamfRemoteAssistSessionV1(array $options = []): Collection
    {
        return $this->fetch(new GetJamfRemoteAssistSessionV1Request($options));
    }

    /**
     * Gets session history items: GET /v2/jamf-remote-assist/session.
     *
     * A builder over the list: filter, sort, sections, get(), lazy() and the rest.
     *
     * @return PagedResource<SessionHistoryItem>
     */
    public function getJamfRemoteAssistSessionV2(): PagedResource
    {
        return new PagedResource($this->pro(), SessionHistoryItem::class, fn (Query $query) => new GetJamfRemoteAssistSessionV2Request($query));
    }

    private function pro(): ProConnector
    {
        $connector = $this->connector();

        return $connector instanceof ProConnector ? $connector : throw new \LogicException('A Jamf Pro resource needs a Jamf Pro connector.');
    }
}
