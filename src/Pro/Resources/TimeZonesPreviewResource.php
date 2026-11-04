<?php

namespace spkm\Jamf\Pro\Resources;

use Illuminate\Support\Collection;
use spkm\Jamf\Data\Data;
use spkm\Jamf\Pro\Data\TimeZone;
use spkm\Jamf\Pro\ProConnector;
use spkm\Jamf\Pro\Requests\TimeZonesPreview\GetTimeZonesV1Request;
use spkm\Jamf\Resources\BaseResource;

/**
 * The time-zones-preview endpoints of the Jamf Pro API, from Jamf::timeZonesPreview().
 *
 * @extends BaseResource<Data>
 */
class TimeZonesPreviewResource extends BaseResource
{
    public function __construct(ProConnector $connector)
    {
        parent::__construct($connector, null);
    }

    /**
     * Return information about the currently supported Time Zones: GET /v1/time-zones.
     *
     * @param  array<string, mixed>  $options  Query options.
     * @return Collection<int, TimeZone>
     */
    public function getTimeZonesV1(array $options = []): Collection
    {
        return $this->fetch(new GetTimeZonesV1Request($options));
    }
}
