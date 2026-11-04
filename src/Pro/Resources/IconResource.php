<?php

namespace spkm\Jamf\Pro\Resources;

use spkm\Jamf\Data\Data;
use spkm\Jamf\Pro\Data\IconResponse;
use spkm\Jamf\Pro\ProConnector;
use spkm\Jamf\Pro\Requests\Icon\CreateIconV1Request;
use spkm\Jamf\Pro\Requests\Icon\GetIconDownloadV1Request;
use spkm\Jamf\Pro\Requests\Icon\GetIconV1Request;
use spkm\Jamf\Resources\BaseResource;
use SplFileInfo;

/**
 * The icon endpoints of the Jamf Pro API, from Jamf::icon().
 *
 * @extends BaseResource<Data>
 */
class IconResource extends BaseResource
{
    public function __construct(ProConnector $connector)
    {
        parent::__construct($connector, null);
    }

    /**
     * Upload an icon: POST /v1/icon.
     *
     * @param  string|resource|SplFileInfo  $file  The file: its contents, a stream, or a file on disk.
     * @param  array<string, mixed>  $options  Query options.
     */
    public function createIconV1(mixed $file, ?string $filename = null, array $options = []): ?IconResponse
    {
        return $this->fetch(new CreateIconV1Request($file, $filename, $options));
    }

    /**
     * Download a self service icon: GET /v1/icon/download/{id}.
     *
     * @param  array<string, mixed>  $options  Query options Jamf documents: res, scale.
     */
    public function getIconDownloadV1(int|string $id, array $options = []): ?string
    {
        return $this->fetch(new GetIconDownloadV1Request($id, $options));
    }

    /**
     * Get an icon: GET /v1/icon/{id}.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function getIconV1(int|string $id, array $options = []): ?IconResponse
    {
        return $this->fetch(new GetIconV1Request($id, $options));
    }
}
