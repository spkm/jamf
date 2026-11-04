<?php

namespace spkm\Jamf\Pro\Requests\PatchSoftwareTitleConfigurations;

use spkm\Jamf\Pro\Data\PatchSoftwareTitleConfiguration;
use spkm\Jamf\Requests\GetRequest;

/**
 * Retrieve Patch Software Title Configurations: GET /v2/patch-software-title-configurations.
 *
 * Retrieves patch software title configurations
 *
 * @deprecated Jamf deprecated this endpoint on 2026-07-14.
 */
class GetPatchSoftwareTitleConfigurationsV2Request extends GetRequest
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
        return '/v2/patch-software-title-configurations';
    }
}
