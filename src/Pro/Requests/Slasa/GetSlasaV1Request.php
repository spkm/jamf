<?php

namespace spkm\Jamf\Pro\Requests\Slasa;

use spkm\Jamf\Pro\Data\SlasaAcceptance;
use spkm\Jamf\Requests\GetRequest;

/**
 * Get the status of SLASA: GET /v1/slasa.
 *
 * Get if SLASA has been accepted or not
 */
class GetSlasaV1Request extends GetRequest
{
    protected ?string $dto = SlasaAcceptance::class;

    /**
     * @param  array<string, mixed>  $options  Query options.
     */
    public function __construct(array $options = [])
    {
        $this->options = $options;
    }

    public function resolveEndpoint(): string
    {
        return '/v1/slasa';
    }
}
