<?php

namespace spkm\Jamf\Pro\Requests\ComputerInventory;

use spkm\Jamf\Pro\Data\ComputerInventoryDeviceLockPinResponse;
use spkm\Jamf\Requests\GetRequest;
use spkm\Jamf\Support\Path;

/**
 * Return a computer's Device Lock PIN: GET /v4/computers-inventory/{id}/view-device-lock-pin.
 */
class GetComputerInventoryViewDeviceLockPinV4Request extends GetRequest
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
        return '/v4/computers-inventory/'.Path::segment((string) $this->id).'/view-device-lock-pin';
    }
}
