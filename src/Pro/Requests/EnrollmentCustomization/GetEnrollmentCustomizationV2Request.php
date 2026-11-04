<?php

namespace spkm\Jamf\Pro\Requests\EnrollmentCustomization;

use spkm\Jamf\Pro\Data\EnrollmentCustomizationV2;
use spkm\Jamf\Requests\GetRequest;
use spkm\Jamf\Support\Path;

/**
 * Retrieve an Enrollment Customization with the supplied id: GET /v2/enrollment-customizations/{id}.
 *
 * Retrieves an Enrollment Customization with the supplied id
 */
class GetEnrollmentCustomizationV2Request extends GetRequest
{
    protected ?string $dto = EnrollmentCustomizationV2::class;

    /**
     * @param  array<string, mixed>  $options  Query options.
     */
    public function __construct(protected int|string $id, array $options = [])
    {
        $this->options = $options;
    }

    public function resolveEndpoint(): string
    {
        return '/v2/enrollment-customizations/'.Path::segment((string) $this->id);
    }
}
