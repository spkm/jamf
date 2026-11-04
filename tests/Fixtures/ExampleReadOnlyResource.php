<?php

namespace spkm\Jamf\Tests\Fixtures;

use spkm\Jamf\Pro\ProConnector;
use spkm\Jamf\Query\Builder;
use spkm\Jamf\Query\Query;
use spkm\Jamf\Requests\ListRequest;

/**
 * A collection Jamf only lists, without filtering or sorting it.
 *
 * @extends Builder<ExampleData>
 */
class ExampleReadOnlyResource extends Builder
{
    public function __construct(ProConnector $connector)
    {
        parent::__construct($connector, ExampleData::class);
    }

    protected function listRequest(Query $query): ListRequest
    {
        return new ExampleUnfilteredListRequest($query);
    }
}
