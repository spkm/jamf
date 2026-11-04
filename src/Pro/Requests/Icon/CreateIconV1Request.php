<?php

namespace spkm\Jamf\Pro\Requests\Icon;

use spkm\Jamf\Pro\Data\IconResponse;
use spkm\Jamf\Requests\UploadRequest;
use SplFileInfo;

/**
 * Upload an icon: POST /v1/icon.
 *
 * Uploads an icon
 */
class CreateIconV1Request extends UploadRequest
{
    protected string $responseShape = self::ONE;

    protected ?string $dto = IconResponse::class;

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
        return '/v1/icon';
    }
}
