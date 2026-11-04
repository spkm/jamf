<?php

namespace spkm\Jamf\Pro\Requests\Accounts;

use JsonSerializable;
use spkm\Jamf\Pro\Data\UserAccount;
use spkm\Jamf\Requests\WriteRequest;

/**
 * Adds new account: POST /v1/accounts.
 *
 * Adds the user account provided. The requesting account cannot grant a privilege level, access level or site it does
 * not itself hold.
 */
class CreateAccountsV1Request extends WriteRequest
{
    protected string $responseShape = self::ONE;

    protected ?string $dto = UserAccount::class;

    /**
     * @param  array<mixed>|JsonSerializable  $body  The record, as an array of Jamf's field names or a model.
     * @param  array<string, mixed>  $options  Query options.
     */
    public function __construct(array|JsonSerializable $body, array $options = [])
    {
        $this->record = $body;
        $this->options = $options;
    }

    public function resolveEndpoint(): string
    {
        return '/v1/accounts';
    }
}
