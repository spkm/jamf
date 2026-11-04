<?php

namespace spkm\Jamf\Pro\Requests\Enrollment;

use spkm\Jamf\Pro\Data\AccountDrivenUserEnrollmentSessionTokenSettings;
use spkm\Jamf\Requests\GetRequest;

/**
 * Retrieve the Account Driven User Enrollment Session Token Settings: GET /v1/adue-session-token-settings.
 */
class GetAdueSessionTokenSettingsV1Request extends GetRequest
{
    protected ?string $dto = AccountDrivenUserEnrollmentSessionTokenSettings::class;

    /**
     * @param  array<string, mixed>  $options  Query options.
     */
    public function __construct(array $options = [])
    {
        $this->options = $options;
    }

    public function resolveEndpoint(): string
    {
        return '/v1/adue-session-token-settings';
    }
}
