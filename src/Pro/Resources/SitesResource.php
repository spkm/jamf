<?php

namespace spkm\Jamf\Pro\Resources;

use Illuminate\Support\Collection;
use spkm\Jamf\Data\Data;
use spkm\Jamf\Pro\Data\SiteObject;
use spkm\Jamf\Pro\Data\V1Site;
use spkm\Jamf\Pro\ProConnector;
use spkm\Jamf\Pro\Requests\Sites\GetSiteObjectsV1Request;
use spkm\Jamf\Pro\Requests\Sites\GetSitesV1Request;
use spkm\Jamf\Query\Query;
use spkm\Jamf\Resources\BaseResource;
use spkm\Jamf\Resources\PagedResource;

/**
 * The sites endpoints of the Jamf Pro API, from Jamf::sites().
 *
 * @extends BaseResource<Data>
 */
class SitesResource extends BaseResource
{
    public function __construct(ProConnector $connector)
    {
        parent::__construct($connector, null);
    }

    /**
     * Find and filter site objects for a site ID: GET /v1/sites/{id}/objects.
     *
     * A builder over the list: filter, sort, sections, get(), lazy() and the rest.
     *
     * @return PagedResource<SiteObject>
     */
    public function getSiteObjectsV1(int|string $id): PagedResource
    {
        return new PagedResource($this->pro(), SiteObject::class, fn (Query $query) => new GetSiteObjectsV1Request($id, $query));
    }

    /**
     * Find all sites: GET /v1/sites.
     *
     * @param  array<string, mixed>  $options  Query options.
     * @return Collection<int, V1Site>
     */
    public function getSitesV1(array $options = []): Collection
    {
        return $this->fetch(new GetSitesV1Request($options));
    }

    private function pro(): ProConnector
    {
        $connector = $this->connector();

        return $connector instanceof ProConnector ? $connector : throw new \LogicException('A Jamf Pro resource needs a Jamf Pro connector.');
    }
}
