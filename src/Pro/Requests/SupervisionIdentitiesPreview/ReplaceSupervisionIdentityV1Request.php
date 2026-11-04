<?php

namespace spkm\Jamf\Pro\Requests\SupervisionIdentitiesPreview;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\Jamf\Pro\Data\SupervisionIdentity;
use spkm\Jamf\Requests\WriteRequest;
use spkm\Jamf\Support\Path;

/**
 * Update a Supervision Identity with the supplied information: PUT /v1/supervision-identities/{id}.
 *
 * Updates a Supervision Identity with the supplied information
 */
class ReplaceSupervisionIdentityV1Request extends WriteRequest
{
    protected Method $method = Method::PUT;

    protected string $responseShape = self::ONE;

    protected ?string $dto = SupervisionIdentity::class;

    /**
     * @param  array<mixed>|JsonSerializable  $body  The record, as an array of Jamf's field names or a model.
     * @param  array<string, mixed>  $options  Query options.
     */
    public function __construct(protected int|string $id, array|JsonSerializable $body, array $options = [])
    {
        $this->record = $body;
        $this->options = $options;
    }

    public function resolveEndpoint(): string
    {
        return '/v1/supervision-identities/'.Path::segment((string) $this->id);
    }
}
