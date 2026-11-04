<?php

namespace spkm\Jamf\Pro\Resources;

use spkm\Jamf\Data\Data;
use spkm\Jamf\Pro\Data\SlasaAcceptance;
use spkm\Jamf\Pro\ProConnector;
use spkm\Jamf\Pro\Requests\Slasa\CreateSlasaV1Request;
use spkm\Jamf\Pro\Requests\Slasa\GetSlasaV1Request;
use spkm\Jamf\Resources\BaseResource;

/**
 * The slasa endpoints of the Jamf Pro API, from Jamf::slasa().
 *
 * @extends BaseResource<Data>
 */
class SlasaResource extends BaseResource
{
    public function __construct(ProConnector $connector)
    {
        parent::__construct($connector, null);
    }

    /**
     * Accept the SLASA: POST /v1/slasa.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function createSlasaV1(array $options = []): bool
    {
        return $this->perform(new CreateSlasaV1Request($options));
    }

    /**
     * Get the status of SLASA: GET /v1/slasa.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function getSlasaV1(array $options = []): ?SlasaAcceptance
    {
        return $this->fetch(new GetSlasaV1Request($options));
    }
}
