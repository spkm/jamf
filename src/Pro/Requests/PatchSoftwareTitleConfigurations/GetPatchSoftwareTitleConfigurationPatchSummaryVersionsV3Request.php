<?php

namespace spkm\Jamf\Pro\Requests\PatchSoftwareTitleConfigurations;

use spkm\Jamf\Pro\Data\PatchSummaryVersion;
use spkm\Jamf\Requests\GetRequest;
use spkm\Jamf\Support\Path;

/**
 * Returns patch versions: GET /v3/patch-software-title-configurations/{id}/patch-summary/versions.
 */
class GetPatchSoftwareTitleConfigurationPatchSummaryVersionsV3Request extends GetRequest
{
    protected string $responseShape = self::LIST;

    protected ?string $dto = PatchSummaryVersion::class;

    /**
     * @param  array<string, mixed>  $options  Query options.
     */
    public function __construct(protected int|string $id, array $options = [])
    {
        $this->options = $options;
    }

    public function resolveEndpoint(): string
    {
        return '/v3/patch-software-title-configurations/'.Path::segment((string) $this->id).'/patch-summary/versions';
    }
}
