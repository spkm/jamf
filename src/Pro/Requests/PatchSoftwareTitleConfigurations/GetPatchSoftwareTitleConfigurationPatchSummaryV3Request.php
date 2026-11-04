<?php

namespace spkm\Jamf\Pro\Requests\PatchSoftwareTitleConfigurations;

use spkm\Jamf\Pro\Data\PatchSummary;
use spkm\Jamf\Requests\GetRequest;
use spkm\Jamf\Support\Path;

/**
 * Return Active Patch Summary: GET /v3/patch-software-title-configurations/{id}/patch-summary.
 *
 * Returns active patch summary.
 */
class GetPatchSoftwareTitleConfigurationPatchSummaryV3Request extends GetRequest
{
    protected ?string $dto = PatchSummary::class;

    /**
     * @param  array<string, mixed>  $options  Query options.
     */
    public function __construct(protected int|string $id, array $options = [])
    {
        $this->options = $options;
    }

    public function resolveEndpoint(): string
    {
        return '/v3/patch-software-title-configurations/'.Path::segment((string) $this->id).'/patch-summary';
    }
}
