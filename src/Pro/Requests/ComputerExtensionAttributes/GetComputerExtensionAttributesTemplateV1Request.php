<?php

namespace spkm\Jamf\Pro\Requests\ComputerExtensionAttributes;

use spkm\Jamf\Pro\Data\ComputerExtensionAttributes;
use spkm\Jamf\Requests\GetRequest;
use spkm\Jamf\Support\Path;

/**
 * Get specified Computer Extension Attribute Template object: GET /v1/computer-extension-attributes/templates/{id}.
 *
 * Gets specified Computer Extension Attribute Template object.
 */
class GetComputerExtensionAttributesTemplateV1Request extends GetRequest
{
    protected ?string $dto = ComputerExtensionAttributes::class;

    /**
     * @param  array<string, mixed>  $options  Query options.
     */
    public function __construct(protected int|string $id, array $options = [])
    {
        $this->options = $options;
    }

    public function resolveEndpoint(): string
    {
        return '/v1/computer-extension-attributes/templates/'.Path::segment((string) $this->id);
    }
}
