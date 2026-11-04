<?php

namespace spkm\Jamf\Pro\Requests\EnrollmentCustomization;

use spkm\Jamf\Pro\Data\PrestageDependencies;
use spkm\Jamf\Requests\GetRequest;
use spkm\Jamf\Support\Path;

/**
 * Retrieve the list of Prestages using this Enrollment Customization: GET /v2/enrollment-customizations/{id}/prestages.
 *
 * Retrieves the list of Prestages using this Enrollment Customization
 */
class GetEnrollmentCustomizationPrestagesV2Request extends GetRequest
{
    protected ?string $dto = PrestageDependencies::class;

    /**
     * @param  array<string, mixed>  $options  Query options.
     */
    public function __construct(protected int|string $id, array $options = [])
    {
        $this->options = $options;
    }

    public function resolveEndpoint(): string
    {
        return '/v2/enrollment-customizations/'.Path::segment((string) $this->id).'/prestages';
    }
}
