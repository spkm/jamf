<?php

namespace spkm\Jamf\Classic\Requests\VppAccounts;

use spkm\Jamf\Classic\Requests\ClassicGetRequest;

/**
 * Finds all VPP Accounts: GET /vppaccounts.
 */
class FindVPPAdminAccountRequest extends ClassicGetRequest
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
        return '/vppaccounts';
    }
}
