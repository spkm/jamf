<?php

namespace spkm\Jamf\Pro\Requests\PatchSoftwareTitleConfigurations;

use spkm\Jamf\Pro\Data\PatchSoftwareTitleConfiguration;
use spkm\Jamf\Requests\GetRequest;

/**
 * Retrieve Patch Software Title Configurations: GET /v3/patch-software-title-configurations.
 *
 * Retrieves patch software title configurations
 */
class GetPatchSoftwareTitleConfigurationsV3Request extends GetRequest
{
    protected string $responseShape = self::LIST;

    protected ?string $dto = PatchSoftwareTitleConfiguration::class;

    /**
     * @param  array<string, mixed>  $options  Query options.
     */
    public function __construct(array $options = [])
    {
        $this->options = $options;
    }

    public function resolveEndpoint(): string
    {
        return '/v3/patch-software-title-configurations';
    }
}
