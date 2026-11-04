<?php

namespace spkm\Jamf\Pro\Requests\SelfServiceBrandingPreview;

use spkm\Jamf\Pro\Data\BrandingImageUrl;
use spkm\Jamf\Requests\UploadRequest;
use SplFileInfo;

/**
 * Upload an image: POST /self-service/branding/images.
 *
 * Uploads an image
 */
class CreateSelfServiceBrandingImagesRequest extends UploadRequest
{
    protected string $responseShape = self::ONE;

    protected ?string $dto = BrandingImageUrl::class;

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
        return '/self-service/branding/images';
    }
}
