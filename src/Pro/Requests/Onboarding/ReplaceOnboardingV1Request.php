<?php

namespace spkm\Jamf\Pro\Requests\Onboarding;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\Jamf\Pro\Data\OnboardingConfiguration;
use spkm\Jamf\Requests\WriteRequest;

/**
 * Update the onboarding configuration: PUT /v1/onboarding.
 */
class ReplaceOnboardingV1Request extends WriteRequest
{
    protected Method $method = Method::PUT;

    protected string $responseShape = self::ONE;

    protected ?string $dto = OnboardingConfiguration::class;

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
        return '/v1/onboarding';
    }
}
