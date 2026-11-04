<?php

namespace spkm\Jamf\Pro\Requests\SupervisionIdentitiesPreview;

use spkm\Jamf\Requests\GetRequest;
use spkm\Jamf\Support\Path;

/**
 * Download the Supervision Identity .p12 file: GET /v1/supervision-identities/{id}/download.
 */
class GetSupervisionIdentityDownloadV1Request extends GetRequest
{
    protected string $responseShape = self::TEXT;

    protected ?string $accept = 'application/octet-stream';

    /**
     * @param  array<string, mixed>  $options  Query options.
     */
    public function __construct(protected int|string $id, array $options = [])
    {
        $this->options = $options;
    }

    public function resolveEndpoint(): string
    {
        return '/v1/supervision-identities/'.Path::segment((string) $this->id).'/download';
    }
}
