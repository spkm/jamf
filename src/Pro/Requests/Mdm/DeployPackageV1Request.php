<?php

namespace spkm\Jamf\Pro\Requests\Mdm;

use JsonSerializable;
use spkm\Jamf\Pro\Data\VerbosePackageDeploymentResponse;
use spkm\Jamf\Requests\WriteRequest;

/**
 * Deploy packages using MDM: POST /v1/deploy-package.
 *
 * Deploys packages to macOS devices using the InstallEnterpriseApplication MDM command.
 */
class DeployPackageV1Request extends WriteRequest
{
    protected string $responseShape = self::ONE;

    protected ?string $dto = VerbosePackageDeploymentResponse::class;

    /**
     * @param  array<mixed>|JsonSerializable  $body  The record, as an array of Jamf's field names or a model.
     * @param  array<string, mixed>  $options  Query options Jamf documents: verbose.
     */
    public function __construct(array|JsonSerializable $body, array $options = [])
    {
        $this->record = $body;
        $this->options = $options;
    }

    public function resolveEndpoint(): string
    {
        return '/v1/deploy-package';
    }
}
