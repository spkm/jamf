<?php

namespace spkm\Jamf\Pro\Requests\JamfCloudDistributionService;

use spkm\Jamf\Pro\Data\DownloadUrl;
use spkm\Jamf\Requests\GetRequest;
use spkm\Jamf\Support\Path;

/**
 * Retrieve a download URL for a specific file from the Jamf Cloud Distribution Service: GET /v1/jcds/files/{fileName}.
 *
 * @deprecated Jamf deprecated this endpoint on 2025-08-28.
 */
class GetJcdsFileV1Request extends GetRequest
{
    protected ?string $dto = DownloadUrl::class;

    /**
     * @param  array<string, mixed>  $options  Query options.
     */
    public function __construct(protected string $fileName, array $options = [])
    {
        $this->options = $options;
    }

    public function resolveEndpoint(): string
    {
        return '/v1/jcds/files/'.Path::segment((string) $this->fileName);
    }
}
