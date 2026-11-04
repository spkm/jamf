<?php

namespace spkm\Jamf\Pro\Requests\MobileDevicePrestages;

use spkm\Jamf\Pro\Data\PrestageFileAttachmentV3;
use spkm\Jamf\Requests\UploadRequest;
use spkm\Jamf\Support\Path;
use SplFileInfo;

/**
 * Add an attachment to a Mobile Device Prestage: POST /v3/mobile-device-prestages/{id}/attachments.
 *
 * Add an attachment to a Mobile Device prestage
 */
class CreateMobileDevicePrestageAttachmentsV3Request extends UploadRequest
{
    protected string $responseShape = self::ONE;

    protected ?string $dto = PrestageFileAttachmentV3::class;

    /**
     * @param  string|resource|SplFileInfo  $file  The file: its contents, a stream, or a file on disk.
     * @param  array<string, mixed>  $options  Query options.
     */
    public function __construct(protected int|string $id, mixed $file, ?string $filename = null, array $options = [])
    {
        $this->file = $file;
        $this->filename = $filename;
        $this->options = $options;
    }

    public function resolveEndpoint(): string
    {
        return '/v3/mobile-device-prestages/'.Path::segment((string) $this->id).'/attachments';
    }
}
