<?php

namespace spkm\Jamf\Pro\Requests\CloudLdap;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\Jamf\Pro\Data\CloudLdapMappingsResponse;
use spkm\Jamf\Requests\WriteRequest;
use spkm\Jamf\Support\Path;

/**
 * Update Cloud Identity Provider mappings configuration: PUT /v2/cloud-ldaps/{id}/mappings.
 */
class ReplaceCloudLdapMappingsV2Request extends WriteRequest
{
    protected Method $method = Method::PUT;

    protected string $responseShape = self::ONE;

    protected ?string $dto = CloudLdapMappingsResponse::class;

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
        return '/v2/cloud-ldaps/'.Path::segment((string) $this->id).'/mappings';
    }
}
