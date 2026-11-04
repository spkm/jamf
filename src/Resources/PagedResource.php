<?php

namespace spkm\Jamf\Resources;

use Closure;
use spkm\Jamf\Data\Data;
use spkm\Jamf\Pro\ProConnector;
use spkm\Jamf\Query\Builder;
use spkm\Jamf\Query\Query;
use spkm\Jamf\Requests\ListRequest;

/**
 * A builder over one paged Jamf Pro list, such as a record's history or the inventory details of every mobile
 * device: where(), orderBy(), sections(), get(), lazy() and the rest, without the create, update and delete of a
 * resource's own collection.
 *
 * @template TData of Data
 *
 * @extends Builder<TData>
 */
class PagedResource extends Builder
{
    /**
     * @param  class-string<TData>|null  $dataClass
     * @param  Closure(Query): ListRequest  $request  Builds the list request for a query.
     */
    public function __construct(ProConnector $connector, ?string $dataClass, protected Closure $request)
    {
        parent::__construct($connector, $dataClass);
    }

    protected function listRequest(Query $query): ListRequest
    {
        return ($this->request)($query);
    }
}
