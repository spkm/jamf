<?php

namespace spkm\Jamf\Pro\Requests\Mdm;

use JsonSerializable;
use spkm\Jamf\Pro\Data\RenewMdmProfileResponse;
use spkm\Jamf\Requests\WriteRequest;

/**
 * Renew MDM Profile: POST /v1/mdm/renew-profile.
 *
 * Renews the device's MDM Profile, including the device identity certificate within the MDM Profile.
 */
class RenewMdmProfileV1Request extends WriteRequest
{
    protected string $responseShape = self::ONE;

    protected ?string $dto = RenewMdmProfileResponse::class;

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
        return '/v1/mdm/renew-profile';
    }
}
