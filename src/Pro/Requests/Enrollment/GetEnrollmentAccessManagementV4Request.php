<?php

namespace spkm\Jamf\Pro\Requests\Enrollment;

use spkm\Jamf\Pro\Data\AccessManagementSetting;
use spkm\Jamf\Requests\GetRequest;

/**
 * Get Access Management settings: GET /v4/enrollment/access-management.
 */
class GetEnrollmentAccessManagementV4Request extends GetRequest
{
    protected ?string $dto = AccessManagementSetting::class;

    /**
     * @param  array<string, mixed>  $options  Query options.
     */
    public function __construct(array $options = [])
    {
        $this->options = $options;
    }

    public function resolveEndpoint(): string
    {
        return '/v4/enrollment/access-management';
    }
}
