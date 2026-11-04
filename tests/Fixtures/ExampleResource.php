<?php

namespace spkm\Jamf\Tests\Fixtures;

use spkm\Jamf\Pro\ProConnector;
use spkm\Jamf\Query\Builder;
use spkm\Jamf\Query\Query;
use spkm\Jamf\Requests\JamfRequest;
use spkm\Jamf\Requests\ListRequest;

/**
 * @extends Builder<ExampleData>
 */
class ExampleResource extends Builder
{
    public function __construct(ProConnector $connector)
    {
        parent::__construct($connector, ExampleData::class);
    }

    protected function listRequest(Query $query): ListRequest
    {
        return new ExampleListRequest($query);
    }

    protected function itemRequest(int|string $id): JamfRequest
    {
        return new ExampleItemRequest($id);
    }

    protected function createRequest(array $body): JamfRequest
    {
        return new ExampleCreateRequest($body);
    }

    protected function updateRequest(int|string $id, array $body): JamfRequest
    {
        return new ExampleUpdateRequest($id, $body);
    }

    protected function deleteRequest(int|string $id): JamfRequest
    {
        return new ExampleDeleteRequest($id);
    }
}
