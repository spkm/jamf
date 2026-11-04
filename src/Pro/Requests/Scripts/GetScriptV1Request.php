<?php

namespace spkm\Jamf\Pro\Requests\Scripts;

use spkm\Jamf\Pro\Data\Script;
use spkm\Jamf\Requests\GetRequest;
use spkm\Jamf\Support\Path;

/**
 * Retrieve a full script object: GET /v1/scripts/{id}.
 *
 * Retrieves a full script object
 */
class GetScriptV1Request extends GetRequest
{
    protected ?string $dto = Script::class;

    /**
     * @param  array<string, mixed>  $options  Query options.
     */
    public function __construct(protected int|string $id, array $options = [])
    {
        $this->options = $options;
    }

    public function resolveEndpoint(): string
    {
        return '/v1/scripts/'.Path::segment((string) $this->id);
    }
}
