<?php

namespace spkm\Jamf\Pro\Resources;

use JsonSerializable;
use spkm\Jamf\Pro\Data\UserAccount;
use spkm\Jamf\Pro\ProConnector;
use spkm\Jamf\Pro\Requests\Accounts\CreateAccountsV1Request;
use spkm\Jamf\Pro\Requests\Accounts\DeleteAccountV1Request;
use spkm\Jamf\Pro\Requests\Accounts\GetAccountsV1Request;
use spkm\Jamf\Pro\Requests\Accounts\GetAccountV1Request;
use spkm\Jamf\Pro\Requests\Accounts\ReplaceAccountV1Request;
use spkm\Jamf\Query\Builder;
use spkm\Jamf\Query\Query;
use spkm\Jamf\Requests\JamfRequest;
use spkm\Jamf\Requests\ListRequest;
use spkm\Jamf\Resources\PagedResource;

/**
 * The accounts endpoints of the Jamf Pro API, from Jamf::accounts().
 *
 * @extends Builder<UserAccount>
 */
class AccountsResource extends Builder
{
    public function __construct(ProConnector $connector)
    {
        parent::__construct($connector, UserAccount::class);
    }

    protected function listRequest(Query $query): ListRequest
    {
        return new GetAccountsV1Request($query);
    }

    protected function itemRequest(int|string $id): JamfRequest
    {
        return new GetAccountV1Request($id);
    }

    protected function createRequest(array $body): JamfRequest
    {
        return new CreateAccountsV1Request($body);
    }

    protected function updateRequest(int|string $id, array $body): JamfRequest
    {
        return new ReplaceAccountV1Request($id, $body);
    }

    protected function deleteRequest(int|string $id): JamfRequest
    {
        return new DeleteAccountV1Request($id);
    }

    /**
     * Adds new account: POST /v1/accounts.
     *
     * @param  array<mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options  Query options.
     */
    public function createAccountsV1(array|JsonSerializable $body, array $options = []): ?UserAccount
    {
        return $this->fetch(new CreateAccountsV1Request($body, $options));
    }

    /**
     * Deletes the user account: DELETE /v1/accounts/{id}.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function deleteAccountV1(int|string $id, array $options = []): bool
    {
        return $this->perform(new DeleteAccountV1Request($id, $options));
    }

    /**
     * Gets the user account: GET /v1/accounts/{id}.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function getAccountV1(int|string $id, array $options = []): ?UserAccount
    {
        return $this->fetch(new GetAccountV1Request($id, $options));
    }

    /**
     * Get user accounts: GET /v1/accounts.
     *
     * A builder over the list: filter, sort, sections, get(), lazy() and the rest.
     *
     * @return PagedResource<UserAccount>
     */
    public function getAccountsV1(): PagedResource
    {
        return new PagedResource($this->pro(), UserAccount::class, fn (Query $query) => new GetAccountsV1Request($query));
    }

    /**
     * Updates the user account: PUT /v1/accounts/{id}.
     *
     * @param  array<mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options  Query options.
     */
    public function replaceAccountV1(int|string $id, array|JsonSerializable $body, array $options = []): ?UserAccount
    {
        return $this->fetch(new ReplaceAccountV1Request($id, $body, $options));
    }

    private function pro(): ProConnector
    {
        $connector = $this->connector();

        return $connector instanceof ProConnector ? $connector : throw new \LogicException('A Jamf Pro resource needs a Jamf Pro connector.');
    }
}
