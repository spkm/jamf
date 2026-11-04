<?php

namespace spkm\Jamf\Pro\Requests\MobileDevicePrestages;

use spkm\Jamf\Pro\Data\FileAttachmentV3;
use spkm\Jamf\Requests\GetRequest;
use spkm\Jamf\Support\Path;

/**
 * Get attachments for a Mobile Device Prestage: GET /v3/mobile-device-prestages/{id}/attachments.
 */
class GetMobileDevicePrestageAttachmentsV3Request extends GetRequest
{
    protected string $responseShape = self::LIST;

    protected ?string $dto = FileAttachmentV3::class;

    /**
     * @param  array<string, mixed>  $options  Query options.
     */
    public function __construct(protected int|string $id, array $options = [])
    {
        $this->options = $options;
    }

    public function resolveEndpoint(): string
    {
        return '/v3/mobile-device-prestages/'.Path::segment((string) $this->id).'/attachments';
    }
}
