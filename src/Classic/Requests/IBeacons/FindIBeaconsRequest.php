<?php

namespace spkm\Jamf\Classic\Requests\IBeacons;

use spkm\Jamf\Classic\Requests\ClassicGetRequest;

/**
 * Finds all iBeacon regions: GET /ibeacons.
 */
class FindIBeaconsRequest extends ClassicGetRequest
{
    protected string $responseShape = self::LIST;

    /**
     * @param  array<string, mixed>  $options  Query options.
     */
    public function __construct(array $options = [])
    {
        $this->options = $options;
    }

    public function resolveEndpoint(): string
    {
        return '/ibeacons';
    }
}
