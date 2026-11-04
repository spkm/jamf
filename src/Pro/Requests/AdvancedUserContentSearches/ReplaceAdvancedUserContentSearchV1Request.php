<?php

namespace spkm\Jamf\Pro\Requests\AdvancedUserContentSearches;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\Jamf\Pro\Data\AdvancedUserContentSearch;
use spkm\Jamf\Requests\WriteRequest;
use spkm\Jamf\Support\Path;

/**
 * Get Specified Advanced User Content Search object: PUT /v1/advanced-user-content-searches/{id}.
 *
 * Gets Specified Advanced User Content Search Object
 */
class ReplaceAdvancedUserContentSearchV1Request extends WriteRequest
{
    protected Method $method = Method::PUT;

    protected string $responseShape = self::ONE;

    protected ?string $dto = AdvancedUserContentSearch::class;

    /**
     * @param  array<mixed>|JsonSerializable  $body  The record, as an array of Jamf's field names or a model.
     * @param  array<string, mixed>  $options  Query options.
     */
    public function __construct(protected int|string $id, array|JsonSerializable $body, array $options = [])
    {
        $this->record = $body;
        $this->options = $options;
    }

    public function resolveEndpoint(): string
    {
        return '/v1/advanced-user-content-searches/'.Path::segment((string) $this->id);
    }
}
