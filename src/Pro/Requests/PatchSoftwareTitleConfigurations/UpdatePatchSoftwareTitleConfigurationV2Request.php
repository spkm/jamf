<?php

namespace spkm\Jamf\Pro\Requests\PatchSoftwareTitleConfigurations;

use JsonSerializable;
use spkm\Jamf\Pro\Data\PatchSoftwareTitleConfiguration;
use spkm\Jamf\Requests\MergePatchRequest;
use spkm\Jamf\Support\Path;

/**
 * Update Patch Software Title Configurations: PATCH /v2/patch-software-title-configurations/{id}.
 *
 * Updates Patch Software Title Configurations
 *
 * @deprecated Jamf deprecated this endpoint on 2026-07-14.
 */
class UpdatePatchSoftwareTitleConfigurationV2Request extends MergePatchRequest
{
    protected string $responseShape = self::ONE;

    protected ?string $dto = PatchSoftwareTitleConfiguration::class;

    /**
     * @param  array<mixed>|JsonSerializable  $body  The record, as an array of Jamf's field names or a model.
     * @param  array<string, mixed>  $options  Query options.
     */
    public function __construct(protected int|string $id, array|JsonSerializable $body, array $options = [])
    {
        $this->record = $body;
        $this->options = $options;
    }

    public function resolveEndpoint(): string
    {
        return '/v2/patch-software-title-configurations/'.Path::segment((string) $this->id);
    }
}
