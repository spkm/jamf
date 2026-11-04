<?php

namespace spkm\Jamf\Pro\Requests\Icon;

use spkm\Jamf\Pro\Data\IconResponse;
use spkm\Jamf\Requests\GetRequest;
use spkm\Jamf\Support\Path;

/**
 * Get an icon: GET /v1/icon/{id}.
 */
class GetIconV1Request extends GetRequest
{
    protected ?string $dto = IconResponse::class;

    /**
     * @param  array<string, mixed>  $options  Query options.
     */
    public function __construct(protected int|string $id, array $options = [])
    {
        $this->options = $options;
    }

    public function resolveEndpoint(): string
    {
        return '/v1/icon/'.Path::segment((string) $this->id);
    }
}
