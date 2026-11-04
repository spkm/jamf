<?php

namespace spkm\Jamf\Pro\Requests\CloudIdp;

use JsonSerializable;
use spkm\Jamf\Pro\Data\GroupTestSearch;
use spkm\Jamf\Requests\WriteRequest;
use spkm\Jamf\Support\Path;

/**
 * Get group test search: POST /v1/cloud-idp/{id}/test-group.
 *
 * Do test search to ensure about configuration and mappings
 */
class TestCloudIdpGroupV1Request extends WriteRequest
{
    protected string $responseShape = self::LIST;

    protected ?string $dto = GroupTestSearch::class;

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
        return '/v1/cloud-idp/'.Path::segment((string) $this->id).'/test-group';
    }
}
