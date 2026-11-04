<?php

namespace spkm\Jamf\Pro\Requests\VenafiPreview;

use spkm\Jamf\Pro\Data\VenafiServiceStatus;
use spkm\Jamf\Requests\GetRequest;
use spkm\Jamf\Support\Path;

/**
 * Tests the communication between Jamf Pro and a Jamf Pro PKI Proxy Server: GET /v1/pki/venafi/{id}/connection-status.
 */
class GetPkiVenafiConnectionStatusV1Request extends GetRequest
{
    protected ?string $dto = VenafiServiceStatus::class;

    /**
     * @param  array<string, mixed>  $options  Query options.
     */
    public function __construct(protected int|string $id, array $options = [])
    {
        $this->options = $options;
    }

    public function resolveEndpoint(): string
    {
        return '/v1/pki/venafi/'.Path::segment((string) $this->id).'/connection-status';
    }
}
