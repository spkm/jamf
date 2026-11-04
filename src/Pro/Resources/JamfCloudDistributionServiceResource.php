<?php

namespace spkm\Jamf\Pro\Resources;

use Illuminate\Support\Collection;
use spkm\Jamf\Data\Data;
use spkm\Jamf\Pro\Data\Credentials;
use spkm\Jamf\Pro\Data\DownloadUrl;
use spkm\Jamf\Pro\Data\FileData;
use spkm\Jamf\Pro\ProConnector;
use spkm\Jamf\Pro\Requests\JamfCloudDistributionService\CreateJcdsFilesV1Request;
use spkm\Jamf\Pro\Requests\JamfCloudDistributionService\DeleteJcdsFileV1Request;
use spkm\Jamf\Pro\Requests\JamfCloudDistributionService\GetJcdsFilesV1Request;
use spkm\Jamf\Pro\Requests\JamfCloudDistributionService\GetJcdsFileV1Request;
use spkm\Jamf\Pro\Requests\JamfCloudDistributionService\RefreshJcdsInventoryV1Request;
use spkm\Jamf\Pro\Requests\JamfCloudDistributionService\RenewJcdsCredentialsV1Request;
use spkm\Jamf\Resources\BaseResource;

/**
 * The jamf-cloud-distribution-service endpoints of the Jamf Pro API, from Jamf::jamfCloudDistributionService().
 *
 * @extends BaseResource<Data>
 */
class JamfCloudDistributionServiceResource extends BaseResource
{
    public function __construct(ProConnector $connector)
    {
        parent::__construct($connector, null);
    }

    /**
     * Initiate an upload to the Jamf Cloud Distribution Service: POST /v1/jcds/files.
     *
     * @deprecated Jamf deprecated this endpoint on 2025-08-28.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function createJcdsFilesV1(array $options = []): ?Credentials
    {
        return $this->fetch(new CreateJcdsFilesV1Request($options));
    }

    /**
     * Delete a file from the Jamf Cloud Distribution Service: DELETE /v1/jcds/files/{fileName}.
     *
     * @deprecated Jamf deprecated this endpoint on 2025-08-28.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function deleteJcdsFileV1(string $fileName, array $options = []): bool
    {
        return $this->perform(new DeleteJcdsFileV1Request($fileName, $options));
    }

    /**
     * Retrieve a download URL for a specific file from the Jamf Cloud Distribution Service: GET
     * /v1/jcds/files/{fileName}.
     *
     * @deprecated Jamf deprecated this endpoint on 2025-08-28.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function getJcdsFileV1(string $fileName, array $options = []): ?DownloadUrl
    {
        return $this->fetch(new GetJcdsFileV1Request($fileName, $options));
    }

    /**
     * Retrieve a list of files and file metadata from the Jamf Cloud Distribution Service: GET /v1/jcds/files.
     *
     * @deprecated Jamf deprecated this endpoint on 2025-08-28.
     *
     * @param  array<string, mixed>  $options  Query options.
     * @return Collection<int, FileData>
     */
    public function getJcdsFilesV1(array $options = []): Collection
    {
        return $this->fetch(new GetJcdsFilesV1Request($options));
    }

    /**
     * Refreshes the inventory and status of uploads in Jamf Pro. This will update the status of uploads in the Jamf
     * Pro database and allow the uploads to be deployed: POST /v1/jcds/refresh-inventory.
     *
     * @deprecated Jamf deprecated this endpoint on 2025-08-28.
     *
     * @param  array<string, mixed>  $options  Query options Jamf documents: file-name.
     */
    public function refreshJcdsInventoryV1(array $options = []): bool
    {
        return $this->perform(new RefreshJcdsInventoryV1Request($options));
    }

    /**
     * Renew credentials for an upload to the Jamf Cloud Distribution Service: POST /v1/jcds/renew-credentials.
     *
     * @deprecated Jamf deprecated this endpoint on 2025-08-28.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function renewJcdsCredentialsV1(array $options = []): ?Credentials
    {
        return $this->fetch(new RenewJcdsCredentialsV1Request($options));
    }
}
