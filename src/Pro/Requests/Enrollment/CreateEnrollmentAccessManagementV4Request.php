<?php

namespace spkm\Jamf\Pro\Requests\Enrollment;

use JsonSerializable;
use spkm\Jamf\Pro\Data\AccessManagementSetting;
use spkm\Jamf\Requests\WriteRequest;

/**
 * Configure Access Management settings: POST /v4/enrollment/access-management.
 */
class CreateEnrollmentAccessManagementV4Request extends WriteRequest
{
    protected string $responseShape = self::ONE;

    protected ?string $dto = AccessManagementSetting::class;

    /**
     * @param  array<mixed>|JsonSerializable  $body  The record, as an array of Jamf's field names or a model.
     * @param  array<string, mixed>  $options  Query options.
     */
    public function __construct(array|JsonSerializable $body, array $options = [])
    {
        $this->record = $body;
        $this->options = $options;
    }

    public function resolveEndpoint(): string
    {
        return '/v4/enrollment/access-management';
    }
}
