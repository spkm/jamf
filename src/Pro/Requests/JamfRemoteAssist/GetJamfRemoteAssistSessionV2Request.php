<?php

namespace spkm\Jamf\Pro\Requests\JamfRemoteAssist;

use spkm\Jamf\Pro\Data\SessionHistoryItem;
use spkm\Jamf\Query\Query;
use spkm\Jamf\Requests\ListRequest;

/**
 * Gets session history items: GET /v2/jamf-remote-assist/session.
 *
 * Returns tenants sessions history.
 */
class GetJamfRemoteAssistSessionV2Request extends ListRequest
{
    protected bool $filterable = true;

    protected bool $sortable = true;

    protected ?string $dto = SessionHistoryItem::class;

    /**
     * @param  Query|array<string, mixed>  $query  The filter, sort, sections and paging, or the query parameters as an array.
     */
    public function __construct(Query|array $query = [])
    {
        parent::__construct($query);
    }

    public function resolveEndpoint(): string
    {
        return '/v2/jamf-remote-assist/session';
    }
}
