<?php

namespace spkm\Jamf\Classic\Requests\Accounts;

use spkm\Jamf\Classic\Requests\ClassicGetRequest;

/**
 * Finds all accounts: GET /accounts.
 */
class FindAccountsRequest extends ClassicGetRequest
{
    protected string $responseShape = self::LIST;

    /**
     * @param  array<string, mixed>  $options  Query options.
     */
    public function __construct(array $options = [])
    {
        $this->options = $options;
    }

    public function resolveEndpoint(): string
    {
        return '/accounts';
    }
}
