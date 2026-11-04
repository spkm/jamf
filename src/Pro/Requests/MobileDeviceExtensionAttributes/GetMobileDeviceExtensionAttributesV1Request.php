<?php

namespace spkm\Jamf\Pro\Requests\MobileDeviceExtensionAttributes;

use spkm\Jamf\Pro\Data\MobileDeviceExtensionAttributes;
use spkm\Jamf\Query\Query;
use spkm\Jamf\Requests\ListRequest;

/**
 * Retrieve Mobile Device Extension Attributes: GET /v1/mobile-device-extension-attributes.
 *
 * Retrieves all mobile device extension attributes configuration.
 */
class GetMobileDeviceExtensionAttributesV1Request extends ListRequest
{
    protected bool $filterable = true;

    protected bool $sortable = true;

    protected ?string $dto = MobileDeviceExtensionAttributes::class;

    /**
     * @param  Query|array<string, mixed>  $query  The filter, sort, sections and paging, or the query parameters as an array.
     */
    public function __construct(Query|array $query = [])
    {
        parent::__construct($query);
    }

    public function resolveEndpoint(): string
    {
        return '/v1/mobile-device-extension-attributes';
    }
}
