<?php

namespace spkm\Jamf\Pro\Requests\JamfCloudDistributionService;

use spkm\Jamf\Pro\Data\FileData;
use spkm\Jamf\Requests\GetRequest;

/**
 * Retrieve a list of files and file metadata from the Jamf Cloud Distribution Service: GET /v1/jcds/files.
 *
 * @deprecated Jamf deprecated this endpoint on 2025-08-28.
 */
class GetJcdsFilesV1Request extends GetRequest
{
    protected string $responseShape = self::LIST;

    protected ?string $dto = FileData::class;

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
