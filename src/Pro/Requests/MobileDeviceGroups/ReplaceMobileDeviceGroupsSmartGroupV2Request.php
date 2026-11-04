<?php

namespace spkm\Jamf\Pro\Requests\MobileDeviceGroups;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\Jamf\Pro\Data\SmartGroupAssignmentV2;
use spkm\Jamf\Requests\WriteRequest;
use spkm\Jamf\Support\Path;

/**
 * Update a smart group: PUT /v2/mobile-device-groups/smart-groups/{id}.
 */
class ReplaceMobileDeviceGroupsSmartGroupV2Request extends WriteRequest
{
    protected Method $method = Method::PUT;

    protected string $responseShape = self::ONE;

    protected ?string $dto = SmartGroupAssignmentV2::class;

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
        return '/v2/mobile-device-groups/smart-groups/'.Path::segment((string) $this->id);
    }
}
