<?php

namespace spkm\Jamf\Pro\Requests\PatchSoftwareTitleConfigurations;

use spkm\Jamf\Pro\Data\PatchSoftwareTitleConfigurationDependency;
use spkm\Jamf\Requests\GetRequest;
use spkm\Jamf\Support\Path;

/**
 * Retrieve list of Patch Software Title Configuration Dependencies: GET /v2/patch-software-title-configurations/{id}/dependencies.
 *
 * @deprecated Jamf deprecated this endpoint on 2026-07-14.
 */
class GetPatchSoftwareTitleConfigurationDependenciesV2Request extends GetRequest
{
    protected string $responseShape = self::LIST;

    protected ?string $dto = PatchSoftwareTitleConfigurationDependency::class;

    /**
     * @param  array<string, mixed>  $options  Query options.
     */
    public function __construct(protected int|string $id, array $options = [])
    {
        $this->options = $options;
    }

    public function resolveEndpoint(): string
    {
        return '/v2/patch-software-title-configurations/'.Path::segment((string) $this->id).'/dependencies';
    }
}
