<?php

namespace spkm\Jamf\Pro\Requests\ComputerExtensionAttributes;

use spkm\Jamf\Pro\Data\ComputerExtensionAttributes;
use spkm\Jamf\Requests\UploadRequest;
use SplFileInfo;

/**
 * Upload Computer Extension Attribute: POST /v1/computer-extension-attributes/upload.
 *
 * Uploads a Computer Extension Attribute.
 */
class UploadComputerExtensionAttributesV1Request extends UploadRequest
{
    protected string $responseShape = self::ONE;

    protected ?string $dto = ComputerExtensionAttributes::class;

    /**
     * @param  string|resource|SplFileInfo  $file  The file: its contents, a stream, or a file on disk.
     * @param  array<string, mixed>  $options  Query options.
     */
    public function __construct(mixed $file, ?string $filename = null, array $options = [])
    {
        $this->file = $file;
        $this->filename = $filename;
        $this->options = $options;
    }

    public function resolveEndpoint(): string
    {
        return '/v1/computer-extension-attributes/upload';
    }
}
