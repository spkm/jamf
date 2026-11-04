<?php

namespace spkm\Jamf\Pro\Requests\CloudDistributionPoint;

use spkm\Jamf\Pro\Data\CloudDistributionPointInventoryFileInfo;
use spkm\Jamf\Query\Query;
use spkm\Jamf\Requests\ListRequest;

/**
 * Get the cloud distribution point Inventory files details: GET /v1/cloud-distribution-point/files.
 *
 * Retrieves the details of the inventory files associated with a cloud distribution point.This includes information
 * about the files used for content distribution, such as their type, status, and categorization.The response provides
 * a comprehensive list of inventory files, which may include packages, ebooks, or mobile device apps, allowing users
 * to view the current state and metadata for each file in the distribution system.
 */
class GetCloudDistributionPointFilesV1Request extends ListRequest
{
    protected bool $filterable = true;

    protected bool $sortable = true;

    protected ?string $dto = CloudDistributionPointInventoryFileInfo::class;

    /**
     * @param  Query|array<string, mixed>  $query  The filter, sort, sections and paging, or the query parameters as an array.
     */
    public function __construct(Query|array $query = [])
    {
        parent::__construct($query);
    }

    public function resolveEndpoint(): string
    {
        return '/v1/cloud-distribution-point/files';
    }
}
