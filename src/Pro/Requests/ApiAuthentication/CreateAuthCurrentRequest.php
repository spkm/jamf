<?php

namespace spkm\Jamf\Pro\Requests\ApiAuthentication;

use spkm\Jamf\Pro\Data\CurrentAuthorization;
use spkm\Jamf\Requests\ActionRequest;

/**
 * Get the authorization details associated with the current API token: POST /auth/current.
 *
 * @deprecated Jamf deprecated this endpoint on 2020-06-01.
 */
class CreateAuthCurrentRequest extends ActionRequest
{
    protected string $responseShape = self::ONE;

    protected ?string $dto = CurrentAuthorization::class;

    /**
     * @param  array<string, mixed>  $options  Query options.
     */
    public function __construct(array $options = [])
    {
        $this->options = $options;
    }

    public function resolveEndpoint(): string
    {
        return '/auth/current';
    }
}
