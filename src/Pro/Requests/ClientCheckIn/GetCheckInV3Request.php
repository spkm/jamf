<?php

namespace spkm\Jamf\Pro\Requests\ClientCheckIn;

use spkm\Jamf\Pro\Data\ClientCheckInV3;
use spkm\Jamf\Requests\GetRequest;

/**
 * Get Client Check-In settings: GET /v3/check-in.
 *
 * Gets `Client Check-In` object.
 */
class GetCheckInV3Request extends GetRequest
{
    protected ?string $dto = ClientCheckInV3::class;

    /**
     * @param  array<string, mixed>  $options  Query options.
     */
    public function __construct(array $options = [])
    {
        $this->options = $options;
    }

    public function resolveEndpoint(): string
    {
        return '/v3/check-in';
    }
}
