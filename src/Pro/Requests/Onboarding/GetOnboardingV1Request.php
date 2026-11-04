<?php

namespace spkm\Jamf\Pro\Requests\Onboarding;

use spkm\Jamf\Pro\Data\OnboardingConfiguration;
use spkm\Jamf\Requests\GetRequest;

/**
 * Get the current onboarding settings configuration: GET /v1/onboarding.
 */
class GetOnboardingV1Request extends GetRequest
{
    protected ?string $dto = OnboardingConfiguration::class;

    /**
     * @param  array<string, mixed>  $options  Query options.
     */
    public function __construct(array $options = [])
    {
        $this->options = $options;
    }

    public function resolveEndpoint(): string
    {
        return '/v1/onboarding';
    }
}
