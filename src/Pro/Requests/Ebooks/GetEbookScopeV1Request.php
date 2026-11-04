<?php

namespace spkm\Jamf\Pro\Requests\Ebooks;

use spkm\Jamf\Pro\Data\EbookScope;
use spkm\Jamf\Requests\GetRequest;
use spkm\Jamf\Support\Path;

/**
 * Get specified scope of Ebook object: GET /v1/ebooks/{id}/scope.
 *
 * Gets specified scope of Ebook object
 */
class GetEbookScopeV1Request extends GetRequest
{
    protected ?string $dto = EbookScope::class;

    /**
     * @param  array<string, mixed>  $options  Query options.
     */
    public function __construct(protected int|string $id, array $options = [])
    {
        $this->options = $options;
    }

    public function resolveEndpoint(): string
    {
        return '/v1/ebooks/'.Path::segment((string) $this->id).'/scope';
    }
}
