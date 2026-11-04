<?php

namespace spkm\Jamf\Pro\Requests\AccountGroups;

use spkm\Jamf\Pro\Data\AccountGroupV1;
use spkm\Jamf\Requests\GetRequest;
use spkm\Jamf\Support\Path;

/**
 * Gets the account group: GET /v1/account-groups/{id}.
 */
class GetAccountGroupV1Request extends GetRequest
{
    protected ?string $dto = AccountGroupV1::class;

    /**
     * @param  array<string, mixed>  $options  Query options.
     */
    public function __construct(protected int|string $id, array $options = [])
    {
        $this->options = $options;
    }

    public function resolveEndpoint(): string
    {
        return '/v1/account-groups/'.Path::segment((string) $this->id);
    }
}
