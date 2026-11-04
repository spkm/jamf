<?php

namespace spkm\Jamf\Pro\Requests\Enrollment;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\Jamf\Pro\Data\AccountDrivenUserEnrollmentSessionTokenSettings;
use spkm\Jamf\Requests\WriteRequest;

/**
 * Update Account Driven User Enrollment Session Token Settings: PUT /v1/adue-session-token-settings.
 *
 * Update the Account Driven User Enrollment Session Token Settings object.
 */
class ReplaceAdueSessionTokenSettingsV1Request extends WriteRequest
{
    protected Method $method = Method::PUT;

    protected string $responseShape = self::ONE;

    protected ?string $dto = AccountDrivenUserEnrollmentSessionTokenSettings::class;

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
        return '/v1/adue-session-token-settings';
    }
}
