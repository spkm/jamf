<?php

namespace spkm\Jamf\Pro\Requests\ComputerExtensionAttributes;

use spkm\Jamf\Requests\GetRequest;
use spkm\Jamf\Support\Path;

/**
 * Get smart group/advance search dependent objects for a specified computer extension attribute: GET /v1/computer-extension-attributes/{id}/data-dependency.
 */
class GetComputerExtensionAttributeDataDependencyV1Request extends GetRequest
{
    protected string $responseShape = self::LIST;

    /**
     * @param  array<string, mixed>  $options  Query options.
     */
    public function __construct(protected int|string $id, array $options = [])
    {
        $this->options = $options;
    }

    public function resolveEndpoint(): string
    {
        return '/v1/computer-extension-attributes/'.Path::segment((string) $this->id).'/data-dependency';
    }
}
