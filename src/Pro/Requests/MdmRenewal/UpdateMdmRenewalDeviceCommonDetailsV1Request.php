<?php

namespace spkm\Jamf\Pro\Requests\MdmRenewal;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\Jamf\Requests\WriteRequest;

/**
 * Update device common details (partial update): PATCH /v1/mdm-renewal/device-common-details.
 *
 * Partially updates existing device common details. The clientManagementId must be provided in the request body to
 * identify which record to update. Only updates fields that are explicitly provided in the request - missing fields
 * preserve their existing values. Only updates existing records; does not create new ones.
 */
class UpdateMdmRenewalDeviceCommonDetailsV1Request extends WriteRequest
{
    protected Method $method = Method::PATCH;

    protected string $responseShape = self::NONE;

    /**
     * @param  array<mixed>|JsonSerializable  $body  The record, as an array of Jamf's field names or a model.
     * @param  array<string, mixed>  $options  Query options.
     */
    public function __construct(array|JsonSerializable $body, array $options = [])
    {
        $this->record = $body;
        $this->options = $options;
    }

    public function resolveEndpoint(): string
    {
        return '/v1/mdm-renewal/device-common-details';
    }
}
