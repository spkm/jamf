<?php

namespace spkm\Jamf\Pro\Requests\JamfCloudDistributionService;

use spkm\Jamf\Pro\Data\Credentials;
use spkm\Jamf\Requests\ActionRequest;

/**
 * Initiate an upload to the Jamf Cloud Distribution Service: POST /v1/jcds/files.
 *
 * Creates a temporary record and returns the credentials and information needed for uploading the file to the Jamf
 * Cloud Distribution Service.
 *
 * @deprecated Jamf deprecated this endpoint on 2025-08-28.
 */
class CreateJcdsFilesV1Request extends ActionRequest
{
    protected string $responseShape = self::ONE;

    protected ?string $dto = Credentials::class;

    /**
     * @param  array<string, mixed>  $options  Query options.
     */
    public function __construct(array $options = [])
    {
        $this->options = $options;
    }

    public function resolveEndpoint(): string
    {
        return '/v1/jcds/files';
    }
}
