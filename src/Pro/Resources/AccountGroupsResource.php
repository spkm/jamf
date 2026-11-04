<?php

namespace spkm\Jamf\Pro\Resources;

use spkm\Jamf\Pro\Data\AccountGroupV1;
use spkm\Jamf\Pro\ProConnector;
use spkm\Jamf\Pro\Requests\AccountGroups\GetAccountGroupsV1Request;
use spkm\Jamf\Pro\Requests\AccountGroups\GetAccountGroupV1Request;
use spkm\Jamf\Query\Builder;
use spkm\Jamf\Query\Query;
use spkm\Jamf\Requests\JamfRequest;
use spkm\Jamf\Requests\ListRequest;
use spkm\Jamf\Resources\PagedResource;

/**
 * The account-groups endpoints of the Jamf Pro API, from Jamf::accountGroups().
 *
 * @extends Builder<AccountGroupV1>
 */
class AccountGroupsResource extends Builder
{
    public function __construct(ProConnector $connector)
    {
        parent::__construct($connector, AccountGroupV1::class);
    }

    protected function listRequest(Query $query): ListRequest
    {
        return new GetAccountGroupsV1Request($query);
    }

    protected function itemRequest(int|string $id): JamfRequest
    {
        return new GetAccountGroupV1Request($id);
    }

    /**
     * Gets the account group: GET /v1/account-groups/{id}.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function getAccountGroupV1(int|string $id, array $options = []): ?AccountGroupV1
    {
        return $this->fetch(new GetAccountGroupV1Request($id, $options));
    }

    /**
     * Get account groups: GET /v1/account-groups.
     *
     * A builder over the list: filter, sort, sections, get(), lazy() and the rest.
     *
     * @return PagedResource<AccountGroupV1>
     */
    public function getAccountGroupsV1(): PagedResource
    {
        return new PagedResource($this->pro(), AccountGroupV1::class, fn (Query $query) => new GetAccountGroupsV1Request($query));
    }

    private function pro(): ProConnector
    {
        $connector = $this->connector();

        return $connector instanceof ProConnector ? $connector : throw new \LogicException('A Jamf Pro resource needs a Jamf Pro connector.');
    }
}
