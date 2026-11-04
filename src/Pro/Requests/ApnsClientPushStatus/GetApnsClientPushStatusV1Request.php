<?php

namespace spkm\Jamf\Pro\Requests\ApnsClientPushStatus;

use spkm\Jamf\Pro\Data\ApnsClientPushStatus;
use spkm\Jamf\Query\Query;
use spkm\Jamf\Requests\ListRequest;

/**
 * Search for clients with push notifications disabled: GET /v1/apns-client-push-status.
 *
 * Retrieve a paginated, sortable, and filterable list of MDM clients that have push notifications disabled. The
 * endpoint queries the mdm_client table and returns information about when push was disabled and links to the device
 * records.
 */
class GetApnsClientPushStatusV1Request extends ListRequest
{
    protected bool $filterable = true;

    protected bool $sortable = true;

    protected ?string $dto = ApnsClientPushStatus::class;

    /**
     * @param  Query|array<string, mixed>  $query  The filter, sort, sections and paging, or the query parameters as an array.
     */
    public function __construct(Query|array $query = [])
    {
        parent::__construct($query);
    }

    public function resolveEndpoint(): string
    {
        return '/v1/apns-client-push-status';
    }
}
