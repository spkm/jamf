<?php

namespace spkm\Jamf\Classic\Requests\GsxConnection;

use spkm\Jamf\Classic\Requests\ClassicGetRequest;

/**
 * Finds the Jamf Pro GSX connection information: GET /gsxconnection.
 */
class FindGSXConnectionRequest extends ClassicGetRequest
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
        return '/gsxconnection';
    }
}
