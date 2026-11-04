<?php

namespace spkm\Jamf\Pro\Requests\TimeZonesPreview;

use spkm\Jamf\Pro\Data\TimeZone;
use spkm\Jamf\Requests\GetRequest;

/**
 * Return information about the currently supported Time Zones: GET /v1/time-zones.
 *
 * Returns information about the currently supported time zones
 */
class GetTimeZonesV1Request extends GetRequest
{
    protected string $responseShape = self::LIST;

    protected ?string $dto = TimeZone::class;

    /**
     * @param  array<string, mixed>  $options  Query options.
     */
    public function __construct(array $options = [])
    {
        $this->options = $options;
    }

    public function resolveEndpoint(): string
    {
        return '/v1/time-zones';
    }
}
