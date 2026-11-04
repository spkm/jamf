<?php

namespace spkm\Jamf\Pro\Requests\PatchPolicyLogs;

use spkm\Jamf\Pro\Data\PatchPolicyLogV2;
use spkm\Jamf\Requests\GetRequest;
use spkm\Jamf\Support\Path;

/**
 * Retrieves a single Patch Policy Log: GET /v2/patch-policies/{id}/logs/{deviceId}.
 */
class GetPatchPolicyLogV2Request extends GetRequest
{
    protected ?string $dto = PatchPolicyLogV2::class;

    /**
     * @param  array<string, mixed>  $options  Query options.
     */
    public function __construct(protected int|string $id, protected int|string $deviceId, array $options = [])
    {
        $this->options = $options;
    }

    public function resolveEndpoint(): string
    {
        return '/v2/patch-policies/'.Path::segment((string) $this->id).'/logs/'.Path::segment((string) $this->deviceId);
    }
}
