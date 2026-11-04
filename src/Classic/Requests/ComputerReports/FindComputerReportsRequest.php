<?php

namespace spkm\Jamf\Classic\Requests\ComputerReports;

use spkm\Jamf\Classic\Requests\ClassicGetRequest;

/**
 * Finds all computer reports: GET /computerreports.
 */
class FindComputerReportsRequest extends ClassicGetRequest
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
        return '/computerreports';
    }
}
