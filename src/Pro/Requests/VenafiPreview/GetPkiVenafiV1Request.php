<?php

namespace spkm\Jamf\Pro\Requests\VenafiPreview;

use spkm\Jamf\Pro\Data\VenafiCaRecord;
use spkm\Jamf\Requests\GetRequest;
use spkm\Jamf\Support\Path;

/**
 * Retrieve a Venafi PKI configuration from Jamf Pro: GET /v1/pki/venafi/{id}.
 */
class GetPkiVenafiV1Request extends GetRequest
{
    protected ?string $dto = VenafiCaRecord::class;

    /**
     * @param  array<string, mixed>  $options  Query options.
     */
    public function __construct(protected int|string $id, array $options = [])
    {
        $this->options = $options;
    }

    public function resolveEndpoint(): string
    {
        return '/v1/pki/venafi/'.Path::segment((string) $this->id);
    }
}
