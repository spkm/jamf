<?php

namespace spkm\Jamf\Pro\Requests\Accounts;

use spkm\Jamf\Requests\DeleteRequest;
use spkm\Jamf\Support\Path;

/**
 * Deletes the user account: DELETE /v1/accounts/{id}.
 */
class DeleteAccountV1Request extends DeleteRequest
{
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
