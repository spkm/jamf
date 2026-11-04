<?php

namespace spkm\Jamf\Pro\Requests\MdmRenewal;

use spkm\Jamf\Requests\DeleteRequest;
use spkm\Jamf\Support\Path;

/**
 * Delete MDM renewal strategies for a client management ID: DELETE /v1/mdm-renewal/renewal-strategies/{clientManagementId}.
 *
 * Deletes all MDM renewal strategies and errors associated with the specified client management ID
 */
class DeleteMdmRenewalRenewalStrategyV1Request extends DeleteRequest
{
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
