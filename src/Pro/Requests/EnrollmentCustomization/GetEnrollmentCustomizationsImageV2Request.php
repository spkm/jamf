<?php

namespace spkm\Jamf\Pro\Requests\EnrollmentCustomization;

use spkm\Jamf\Requests\GetRequest;
use spkm\Jamf\Support\Path;

/**
 * Download an enrollment customization image: GET /v2/enrollment-customizations/images/{id}.
 */
class GetEnrollmentCustomizationsImageV2Request extends GetRequest
{
    protected string $responseShape = self::TEXT;

    protected ?string $accept = 'image/*';

    /**
     * @param  array<string, mixed>  $options  Query options.
     */
    public function __construct(protected int|string $id, array $options = [])
    {
        $this->options = $options;
    }

    public function resolveEndpoint(): string
    {
        return '/v2/enrollment-customizations/images/'.Path::segment((string) $this->id);
    }
}
