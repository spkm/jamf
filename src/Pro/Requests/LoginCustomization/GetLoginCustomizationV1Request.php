<?php

namespace spkm\Jamf\Pro\Requests\LoginCustomization;

use spkm\Jamf\Pro\Data\LoginContent;
use spkm\Jamf\Requests\GetRequest;

/**
 * Get current login disclaimer settings: GET /v1/login-customization.
 *
 * Returns knob whether disclaimer is enabled and if saved, its contents.
 */
class GetLoginCustomizationV1Request extends GetRequest
{
    protected ?string $dto = LoginContent::class;

    /**
     * @param  array<string, mixed>  $options  Query options.
     */
    public function __construct(array $options = [])
    {
        $this->options = $options;
    }

    public function resolveEndpoint(): string
    {
        return '/v1/login-customization';
    }
}
