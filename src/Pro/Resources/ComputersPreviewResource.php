<?php

namespace spkm\Jamf\Pro\Resources;

use spkm\Jamf\Pro\Data\ComputerOverview;
use spkm\Jamf\Pro\ProConnector;
use spkm\Jamf\Pro\Requests\ComputersPreview\GetComputersPreviewRequest;
use spkm\Jamf\Query\Builder;
use spkm\Jamf\Query\Query;
use spkm\Jamf\Requests\ListRequest;
use spkm\Jamf\Resources\PagedResource;

/**
 * The computers-preview endpoints of the Jamf Pro API, from Jamf::computersPreview().
 *
 * @extends Builder<ComputerOverview>
 */
class ComputersPreviewResource extends Builder
{
    public function __construct(ProConnector $connector)
    {
        parent::__construct($connector, ComputerOverview::class);
    }

    protected function listRequest(Query $query): ListRequest
    {
        return new GetComputersPreviewRequest($query);
    }

    /**
     * Return a list of Computers: GET /preview/computers.
     *
     * A builder over the list: filter, sort, sections, get(), lazy() and the rest.
     *
     * @return PagedResource<ComputerOverview>
     */
    public function getComputersPreview(): PagedResource
    {
        return new PagedResource($this->pro(), ComputerOverview::class, fn (Query $query) => new GetComputersPreviewRequest($query));
    }

    private function pro(): ProConnector
    {
        $connector = $this->connector();

        return $connector instanceof ProConnector ? $connector : throw new \LogicException('A Jamf Pro resource needs a Jamf Pro connector.');
    }
}
