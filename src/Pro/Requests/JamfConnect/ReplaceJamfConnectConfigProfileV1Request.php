<?php

namespace spkm\Jamf\Pro\Requests\JamfConnect;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\Jamf\Pro\Data\LinkedConnectProfile;
use spkm\Jamf\Requests\WriteRequest;
use spkm\Jamf\Support\Path;

/**
 * Update the way the Jamf Connect app gets updated on computers within scope of the associated configuration profile: PUT /v1/jamf-connect/config-profiles/{id}.
 */
class ReplaceJamfConnectConfigProfileV1Request extends WriteRequest
{
    protected Method $method = Method::PUT;

    protected string $responseShape = self::ONE;

    protected ?string $dto = LinkedConnectProfile::class;

    /**
     * @param  array<mixed>|JsonSerializable  $body  The record, as an array of Jamf's field names or a model.
     * @param  array<string, mixed>  $options  Query options.
     */
    public function __construct(protected int|string $id, array|JsonSerializable $body = [], array $options = [])
    {
        $this->record = $body;
        $this->options = $options;
    }

    public function resolveEndpoint(): string
    {
        return '/v1/jamf-connect/config-profiles/'.Path::segment((string) $this->id);
    }
}
