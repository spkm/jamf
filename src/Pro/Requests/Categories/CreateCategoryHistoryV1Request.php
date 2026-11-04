<?php

namespace spkm\Jamf\Pro\Requests\Categories;

use JsonSerializable;
use spkm\Jamf\Pro\Data\ObjectHistory;
use spkm\Jamf\Requests\WriteRequest;
use spkm\Jamf\Support\Path;

/**
 * Add specified Category history object notes: POST /v1/categories/{id}/history.
 *
 * Adds specified Category history object notes
 */
class CreateCategoryHistoryV1Request extends WriteRequest
{
    protected string $responseShape = self::ONE;

    protected ?string $dto = ObjectHistory::class;

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
        return '/v1/categories/'.Path::segment((string) $this->id).'/history';
    }
}
