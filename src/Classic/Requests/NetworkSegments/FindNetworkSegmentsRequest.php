<?php

namespace spkm\Jamf\Classic\Requests\NetworkSegments;

use spkm\Jamf\Classic\Requests\ClassicGetRequest;

/**
 * Finds all network segments: GET /networksegments.
 */
class FindNetworkSegmentsRequest extends ClassicGetRequest
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
        return '/networksegments';
    }
}
