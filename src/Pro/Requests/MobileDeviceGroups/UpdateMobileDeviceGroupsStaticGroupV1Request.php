<?php

namespace spkm\Jamf\Pro\Requests\MobileDeviceGroups;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\Jamf\Pro\Data\StaticGroupAssignment;
use spkm\Jamf\Requests\WriteRequest;
use spkm\Jamf\Support\Path;

/**
 * Update membership of a static group: PATCH /v1/mobile-device-groups/static-groups/{id}.
 *
 * @deprecated Jamf deprecated this endpoint on 2026-05-28.
 */
class UpdateMobileDeviceGroupsStaticGroupV1Request extends WriteRequest
{
    protected Method $method = Method::PATCH;

    protected string $responseShape = self::ONE;

    protected ?string $dto = StaticGroupAssignment::class;

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
        return '/v1/mobile-device-groups/static-groups/'.Path::segment((string) $this->id);
    }
}
