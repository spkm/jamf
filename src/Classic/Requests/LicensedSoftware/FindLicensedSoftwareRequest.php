<?php

namespace spkm\Jamf\Classic\Requests\LicensedSoftware;

use spkm\Jamf\Classic\Requests\ClassicGetRequest;

/**
 * Finds all licensed software: GET /licensedsoftware.
 */
class FindLicensedSoftwareRequest extends ClassicGetRequest
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
        return '/licensedsoftware';
    }
}
