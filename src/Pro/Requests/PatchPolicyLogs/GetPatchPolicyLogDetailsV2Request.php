<?php

namespace spkm\Jamf\Pro\Requests\PatchPolicyLogs;

use spkm\Jamf\Pro\Data\PatchPolicyLogDetail;
use spkm\Jamf\Requests\GetRequest;
use spkm\Jamf\Support\Path;

/**
 * Return attempt details for a specific log: GET /v2/patch-policies/{id}/logs/{deviceId}/details.
 */
class GetPatchPolicyLogDetailsV2Request extends GetRequest
{
    protected string $responseShape = self::LIST;

    protected ?string $dto = PatchPolicyLogDetail::class;

    /**
     * @param  array<string, mixed>  $options  Query options.
     */
    public function __construct(protected int|string $id, protected int|string $deviceId, array $options = [])
    {
        $this->options = $options;
    }

    public function resolveEndpoint(): string
    {
        return '/v2/patch-policies/'.Path::segment((string) $this->id).'/logs/'.Path::segment((string) $this->deviceId).'/details';
    }
}
