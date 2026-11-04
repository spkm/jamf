<?php

namespace spkm\Jamf\Pro\Requests\ComputerExtensionAttributes;

use spkm\Jamf\Requests\GetRequest;
use spkm\Jamf\Support\Path;

/**
 * Download the specified Computer Extension Attribute: GET /v1/computer-extension-attributes/{id}/download.
 *
 * Retrieves the specified Computer Extension Attribute in XML format based on the provided unique ID.
 */
class GetComputerExtensionAttributeDownloadV1Request extends GetRequest
{
    protected string $responseShape = self::TEXT;

    protected ?string $accept = 'application/xml';

    /**
     * @param  array<string, mixed>  $options  Query options.
     */
    public function __construct(protected int|string $id, array $options = [])
    {
        $this->options = $options;
    }

    public function resolveEndpoint(): string
    {
        return '/v1/computer-extension-attributes/'.Path::segment((string) $this->id).'/download';
    }
}
