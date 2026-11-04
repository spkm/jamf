<?php

namespace spkm\Jamf\Pro\Requests\Scripts;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\Jamf\Pro\Data\Script;
use spkm\Jamf\Requests\WriteRequest;
use spkm\Jamf\Support\Path;

/**
 * Replace the script at the id with the supplied information: PUT /v1/scripts/{id}.
 *
 * Replaces the script at the id with the supplied information
 */
class ReplaceScriptV1Request extends WriteRequest
{
    protected Method $method = Method::PUT;

    protected string $responseShape = self::ONE;

    protected ?string $dto = Script::class;

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
        return '/v1/scripts/'.Path::segment((string) $this->id);
    }
}
