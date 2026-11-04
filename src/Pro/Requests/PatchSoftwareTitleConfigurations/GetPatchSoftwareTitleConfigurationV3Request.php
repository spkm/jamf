<?php

namespace spkm\Jamf\Pro\Requests\PatchSoftwareTitleConfigurations;

use spkm\Jamf\Pro\Data\PatchSoftwareTitleConfiguration;
use spkm\Jamf\Requests\GetRequest;
use spkm\Jamf\Support\Path;

/**
 * Retrieve Patch Software Title Configurations with the supplied id: GET /v3/patch-software-title-configurations/{id}.
 *
 * Retrieves Patch Software Title Configurations with the supplied id
 */
class GetPatchSoftwareTitleConfigurationV3Request extends GetRequest
{
    protected ?string $dto = PatchSoftwareTitleConfiguration::class;

    /**
     * @param  array<string, mixed>  $options  Query options.
     */
    public function __construct(protected int|string $id, array $options = [])
    {
        $this->options = $options;
    }

    public function resolveEndpoint(): string
    {
        return '/v3/patch-software-title-configurations/'.Path::segment((string) $this->id);
    }
}
