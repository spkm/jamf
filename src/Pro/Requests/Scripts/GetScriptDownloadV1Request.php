<?php

namespace spkm\Jamf\Pro\Requests\Scripts;

use spkm\Jamf\Requests\GetRequest;
use spkm\Jamf\Support\Path;

/**
 * Download a text file of the Script contents: GET /v1/scripts/{id}/download.
 *
 * Download a text file of the script contents
 */
class GetScriptDownloadV1Request extends GetRequest
{
    protected string $responseShape = self::TEXT;

    protected ?string $accept = 'text/plain';

    /**
     * @param  array<string, mixed>  $options  Query options.
     */
    public function __construct(protected int|string $id, array $options = [])
    {
        $this->options = $options;
    }

    public function resolveEndpoint(): string
    {
        return '/v1/scripts/'.Path::segment((string) $this->id).'/download';
    }
}
