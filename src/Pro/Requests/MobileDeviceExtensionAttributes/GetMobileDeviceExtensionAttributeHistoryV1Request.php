<?php

namespace spkm\Jamf\Pro\Requests\MobileDeviceExtensionAttributes;

use spkm\Jamf\Pro\Data\ObjectHistory;
use spkm\Jamf\Query\Query;
use spkm\Jamf\Requests\ListRequest;
use spkm\Jamf\Support\Path;

/**
 * Get specified Mobile Device Extension Attribute History object: GET /v1/mobile-device-extension-attributes/{id}/history.
 *
 * Get specified Mobile Device Extension Attribute history object
 */
class GetMobileDeviceExtensionAttributeHistoryV1Request extends ListRequest
{
    protected bool $filterable = true;

    protected bool $sortable = true;

    protected ?string $dto = ObjectHistory::class;

    /**
     * @param  Query|array<string, mixed>  $query  The filter, sort, sections and paging, or the query parameters as an array.
     */
    public function __construct(protected int|string $id, Query|array $query = [])
    {
        parent::__construct($query);
    }

    public function resolveEndpoint(): string
    {
        return '/v1/mobile-device-extension-attributes/'.Path::segment((string) $this->id).'/history';
    }
}
