<?php

namespace spkm\Jamf\Pro\Requests\SupervisionIdentitiesPreview;

use JsonSerializable;
use spkm\Jamf\Pro\Data\SupervisionIdentity;
use spkm\Jamf\Requests\WriteRequest;

/**
 * Upload the Supervision Identity .p12 file: POST /v1/supervision-identities/upload.
 *
 * Uploads the Supervision Identity .p12 file
 */
class UploadSupervisionIdentitiesV1Request extends WriteRequest
{
    protected string $responseShape = self::ONE;

    protected ?string $dto = SupervisionIdentity::class;

    /**
     * @param  array<mixed>|JsonSerializable  $body  The record, as an array of Jamf's field names or a model.
     * @param  array<string, mixed>  $options  Query options.
     */
    public function __construct(array|JsonSerializable $body, array $options = [])
    {
        $this->record = $body;
        $this->options = $options;
    }

    public function resolveEndpoint(): string
    {
        return '/v1/supervision-identities/upload';
    }
}
