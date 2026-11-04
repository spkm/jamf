<?php

namespace spkm\Jamf\Classic\Resources;

use spkm\Jamf\Classic\ClassicConnector;
use spkm\Jamf\Classic\Requests\FileUploads\UploadFilesRequest;
use spkm\Jamf\Resources\BaseResource;
use SplFileInfo;

/**
 * The fileuploads endpoints of the Classic API, from Jamf::classic()->fileUploads().
 *
 * @extends BaseResource<never>
 */
class FileUploadsResource extends BaseResource
{
    public function __construct(ClassicConnector $connector)
    {
        parent::__construct($connector, null);
    }

    /**
     * Creates file attachments in Jamf Pro: POST /fileuploads/{resource}/{idType}/{id}.
     *
     * @param  string|resource|SplFileInfo  $file  The file: its contents, a stream, or a file on disk.
     */
    public function uploadFiles(string $resource, string $idType, int|string $id, mixed $file, ?string $filename = null): bool
    {
        return $this->perform(new UploadFilesRequest($resource, $idType, $id, $file, $filename));
    }
}
