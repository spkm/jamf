<?php

namespace spkm\Jamf\Classic\Requests\ComputerCheckIn;

use spkm\Jamf\Classic\Requests\ClassicGetRequest;

/**
 * Finds the Jamf Pro computer checkin information: GET /computercheckin.
 */
class FindComputerCheckinRequest extends ClassicGetRequest
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
        return '/computercheckin';
    }
}
