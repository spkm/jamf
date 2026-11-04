<?php

namespace spkm\Jamf\Pro\Requests\Icon;

use spkm\Jamf\Requests\GetRequest;
use spkm\Jamf\Support\Path;

/**
 * Download a self service icon: GET /v1/icon/download/{id}.
 */
class GetIconDownloadV1Request extends GetRequest
{
    protected string $responseShape = self::TEXT;

    protected ?string $accept = 'image/*';

    /**
     * @param  array<string, mixed>  $options  Query options Jamf documents: res, scale.
     */
    public function __construct(protected int|string $id, array $options = [])
    {
        $this->options = $options;
    }

    public function resolveEndpoint(): string
    {
        return '/v1/icon/download/'.Path::segment((string) $this->id);
    }
}
