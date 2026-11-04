<?php

namespace spkm\Jamf\Pro\Resources;

use spkm\Jamf\Pro\Data\RemoteAdministrationResponse;
use spkm\Jamf\Pro\ProConnector;
use spkm\Jamf\Pro\Requests\RemoteAdministration\GetRemoteAdministrationConfigurationsPreviewRequest;
use spkm\Jamf\Query\Builder;
use spkm\Jamf\Query\Query;
use spkm\Jamf\Requests\ListRequest;
use spkm\Jamf\Resources\PagedResource;

/**
 * The remote-administration endpoints of the Jamf Pro API, from Jamf::remoteAdministration().
 *
 * @extends Builder<RemoteAdministrationResponse>
 */
class RemoteAdministrationResource extends Builder
{
    public function __construct(ProConnector $connector)
    {
        parent::__construct($connector, RemoteAdministrationResponse::class);
    }

    protected function listRequest(Query $query): ListRequest
    {
        return new GetRemoteAdministrationConfigurationsPreviewRequest($query);
    }

    /**
     * Get information about all remote administration configurations: GET
     * /preview/remote-administration-configurations.
     *
     * A builder over the list: filter, sort, sections, get(), lazy() and the rest.
     *
     * @return PagedResource<RemoteAdministrationResponse>
     */
    public function getRemoteAdministrationConfigurationsPreview(): PagedResource
    {
        return new PagedResource($this->pro(), RemoteAdministrationResponse::class, fn (Query $query) => new GetRemoteAdministrationConfigurationsPreviewRequest($query));
    }

    private function pro(): ProConnector
    {
        $connector = $this->connector();

        return $connector instanceof ProConnector ? $connector : throw new \LogicException('A Jamf Pro resource needs a Jamf Pro connector.');
    }
}
