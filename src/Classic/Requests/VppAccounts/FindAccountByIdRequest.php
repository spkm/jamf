<?php

namespace spkm\Jamf\Classic\Requests\VppAccounts;

use spkm\Jamf\Classic\Requests\ClassicGetRequest;
use spkm\Jamf\Support\Path;

/**
 * Finds VPP Account by id: GET /vppaccounts/id/{id}.
 */
class FindAccountByIdRequest extends ClassicGetRequest
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
        return '/vppaccounts/id/'.Path::segment((string) $this->id);
    }
}
