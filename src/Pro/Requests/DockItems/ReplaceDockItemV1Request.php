<?php

namespace spkm\Jamf\Pro\Requests\DockItems;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\Jamf\Requests\WriteRequest;
use spkm\Jamf\Support\Path;

/**
 * Replace the dockItem at the id with the supplied information: PUT /v1/dock-items/{id}.
 *
 * Replaces the dockItem at the id with the supplied information
 */
class ReplaceDockItemV1Request extends WriteRequest
{
    protected Method $method = Method::PUT;

    protected string $responseShape = self::TEXT;

    protected ?string $accept = 'text/plain';

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
        return '/v1/dock-items/'.Path::segment((string) $this->id);
    }
}
