<?php

namespace spkm\Jamf\Pro\Requests\JamfManagementFramework;

use spkm\Jamf\Pro\Data\RedeployJamfManagementFrameworkResponse;
use spkm\Jamf\Requests\ActionRequest;
use spkm\Jamf\Support\Path;

/**
 * Redeploy Jamf Management Framework: POST /v1/jamf-management-framework/redeploy/{id}.
 *
 * Redeploys the Jamf Management Framework for enrolled device
 */
class RedeployJamfManagementFrameworkV1Request extends ActionRequest
{
    protected string $responseShape = self::ONE;

    protected ?string $dto = RedeployJamfManagementFrameworkResponse::class;

    /**
     * @param  array<string, mixed>  $options  Query options.
     */
    public function __construct(protected int|string $id, array $options = [])
    {
        $this->options = $options;
    }

    public function resolveEndpoint(): string
    {
        return '/v1/jamf-management-framework/redeploy/'.Path::segment((string) $this->id);
    }
}
