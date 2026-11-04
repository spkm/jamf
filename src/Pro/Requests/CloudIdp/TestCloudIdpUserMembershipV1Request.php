<?php

namespace spkm\Jamf\Pro\Requests\CloudIdp;

use JsonSerializable;
use spkm\Jamf\Pro\Data\MembershipTestSearchResponse;
use spkm\Jamf\Requests\WriteRequest;
use spkm\Jamf\Support\Path;

/**
 * Get membership test search: POST /v1/cloud-idp/{id}/test-user-membership.
 *
 * Do test search to ensure about configuration and mappings
 */
class TestCloudIdpUserMembershipV1Request extends WriteRequest
{
    protected string $responseShape = self::ONE;

    protected ?string $dto = MembershipTestSearchResponse::class;

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
        return '/v1/cloud-idp/'.Path::segment((string) $this->id).'/test-user-membership';
    }
}
