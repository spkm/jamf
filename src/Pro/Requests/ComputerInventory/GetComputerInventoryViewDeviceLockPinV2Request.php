<?php

namespace spkm\Jamf\Pro\Requests\ComputerInventory;

use spkm\Jamf\Pro\Data\ComputerInventoryDeviceLockPinResponse;
use spkm\Jamf\Requests\GetRequest;
use spkm\Jamf\Support\Path;

/**
 * Return a computer's Device Lock PIN: GET /v2/computers-inventory/{id}/view-device-lock-pin.
 *
 * @deprecated Jamf deprecated this endpoint on 2025-11-06.
 */
class GetComputerInventoryViewDeviceLockPinV2Request extends GetRequest
{
    protected ?string $dto = ComputerInventoryDeviceLockPinResponse::class;

    /**
     * @param  array<string, mixed>  $options  Query options.
     */
    public function __construct(protected int|string $id, array $options = [])
    {
        $this->options = $options;
    }

    public function resolveEndpoint(): string
    {
        return '/v2/computers-inventory/'.Path::segment((string) $this->id).'/view-device-lock-pin';
    }
}
