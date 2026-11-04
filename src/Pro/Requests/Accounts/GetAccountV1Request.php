<?php

namespace spkm\Jamf\Pro\Requests\Accounts;

use spkm\Jamf\Pro\Data\UserAccount;
use spkm\Jamf\Requests\GetRequest;
use spkm\Jamf\Support\Path;

/**
 * Gets the user account: GET /v1/accounts/{id}.
 */
class GetAccountV1Request extends GetRequest
{
    protected ?string $dto = UserAccount::class;

    /**
     * @param  array<string, mixed>  $options  Query options.
     */
    public function __construct(protected int|string $id, array $options = [])
    {
        $this->options = $options;
    }

    public function resolveEndpoint(): string
    {
        return '/v1/accounts/'.Path::segment((string) $this->id);
    }
}
