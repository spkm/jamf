<?php

namespace spkm\Jamf\Pro\Requests\PatchSoftwareTitleConfigurations;

use spkm\Jamf\Pro\Data\PatchSoftwareTitleExtensionAttributes;
use spkm\Jamf\Requests\GetRequest;
use spkm\Jamf\Support\Path;

/**
 * Retrieve Software Title Extension Attributes with the supplied id: GET /v2/patch-software-title-configurations/{id}/extension-attributes.
 *
 * Retrieves software title extension attributes with the supplied id
 *
 * @deprecated Jamf deprecated this endpoint on 2026-07-14.
 */
class GetPatchSoftwareTitleConfigurationExtensionAttributesV2Request extends GetRequest
{
    protected string $responseShape = self::LIST;

    protected ?string $dto = PatchSoftwareTitleExtensionAttributes::class;

    /**
     * @param  array<string, mixed>  $options  Query options.
     */
    public function __construct(protected int|string $id, array $options = [])
    {
        $this->options = $options;
    }

    public function resolveEndpoint(): string
    {
        return '/v2/patch-software-title-configurations/'.Path::segment((string) $this->id).'/extension-attributes';
    }
}
