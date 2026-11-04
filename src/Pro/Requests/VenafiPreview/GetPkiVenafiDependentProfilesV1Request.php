<?php

namespace spkm\Jamf\Pro\Requests\VenafiPreview;

use spkm\Jamf\Pro\Data\VenafiPkiPayloadRecord;
use spkm\Jamf\Requests\GetRequest;
use spkm\Jamf\Support\Path;

/**
 * Get configuration profile data using specified Venafi CA object: GET /v1/pki/venafi/{id}/dependent-profiles.
 */
class GetPkiVenafiDependentProfilesV1Request extends GetRequest
{
    protected string $responseShape = self::LIST;

    protected ?string $dto = VenafiPkiPayloadRecord::class;

    /**
     * @param  array<string, mixed>  $options  Query options.
     */
    public function __construct(protected int|string $id, array $options = [])
    {
        $this->options = $options;
    }

    public function resolveEndpoint(): string
    {
        return '/v1/pki/venafi/'.Path::segment((string) $this->id).'/dependent-profiles';
    }
}
