<?php

namespace spkm\Jamf\Classic\Requests\MobileDevices;

use spkm\Jamf\Classic\Requests\ClassicGetRequest;
use spkm\Jamf\Support\Path;

/**
 * Searches for mobile devices that match the provided parameter: GET /mobiledevices/match/{match}.
 *
 * GET mobile devices with a value equal to the {match} parameter.
 */
class MatchMobileDevicesRequest extends ClassicGetRequest
{
    protected string $responseShape = self::LIST;

    /**
     * @param  array<string, mixed>  $options  Query options.
     */
    public function __construct(protected string $match, array $options = [])
    {
        $this->options = $options;
    }

    public function resolveEndpoint(): string
    {
        return '/mobiledevices/match/'.Path::segment((string) $this->match);
    }
}
