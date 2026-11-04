<?php

namespace spkm\Jamf\Pro\Requests\JamfCloudDistributionService;

use spkm\Jamf\Requests\DeleteRequest;
use spkm\Jamf\Support\Path;

/**
 * Delete a file from the Jamf Cloud Distribution Service: DELETE /v1/jcds/files/{fileName}.
 *
 * Delete a file by filename from the Jamf Cloud Distribution Service.
 *
 * @deprecated Jamf deprecated this endpoint on 2025-08-28.
 */
class DeleteJcdsFileV1Request extends DeleteRequest
{
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
