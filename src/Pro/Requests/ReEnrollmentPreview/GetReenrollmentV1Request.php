<?php

namespace spkm\Jamf\Pro\Requests\ReEnrollmentPreview;

use spkm\Jamf\Pro\Data\Reenrollment;
use spkm\Jamf\Requests\GetRequest;

/**
 * Get Re-enrollment object: GET /v1/reenrollment.
 *
 * Gets Re-enrollment object
 */
class GetReenrollmentV1Request extends GetRequest
{
    protected ?string $dto = Reenrollment::class;

    /**
     * @param  array<string, mixed>  $options  Query options.
     */
    public function __construct(array $options = [])
    {
        $this->options = $options;
    }

    public function resolveEndpoint(): string
    {
        return '/v1/reenrollment';
    }
}
