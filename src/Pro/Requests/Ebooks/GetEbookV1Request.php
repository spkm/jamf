<?php

namespace spkm\Jamf\Pro\Requests\Ebooks;

use spkm\Jamf\Pro\Data\Ebook;
use spkm\Jamf\Requests\GetRequest;
use spkm\Jamf\Support\Path;

/**
 * Get specified Ebook object: GET /v1/ebooks/{id}.
 *
 * Gets specified Ebook object
 */
class GetEbookV1Request extends GetRequest
{
    protected ?string $dto = Ebook::class;

    /**
     * @param  array<string, mixed>  $options  Query options.
     */
    public function __construct(protected int|string $id, array $options = [])
    {
        $this->options = $options;
    }

    public function resolveEndpoint(): string
    {
        return '/v1/ebooks/'.Path::segment((string) $this->id);
    }
}
