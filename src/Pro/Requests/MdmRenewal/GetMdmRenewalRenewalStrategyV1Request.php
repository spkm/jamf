<?php

namespace spkm\Jamf\Pro\Requests\MdmRenewal;

use spkm\Jamf\Pro\Data\MdmRenewalErrorStrategiesResponse;
use spkm\Jamf\Requests\GetRequest;
use spkm\Jamf\Support\Path;

/**
 * Get MDM renewal errors and strategies for a client management ID: GET /v1/mdm-renewal/renewal-strategies/{clientManagementId}.
 *
 * Retrieves all MDM renewal errors and their associated renewal strategies for a specific client management ID
 */
class GetMdmRenewalRenewalStrategyV1Request extends GetRequest
{
    protected string $responseShape = self::LIST;

    protected ?string $dto = MdmRenewalErrorStrategiesResponse::class;

    /**
     * @param  array<string, mixed>  $options  Query options.
     */
    public function __construct(protected int|string $clientManagementId, array $options = [])
    {
        $this->options = $options;
    }

    public function resolveEndpoint(): string
    {
        return '/v1/mdm-renewal/renewal-strategies/'.Path::segment((string) $this->clientManagementId);
    }
}
