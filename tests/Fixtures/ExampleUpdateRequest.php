<?php

namespace spkm\Jamf\Tests\Fixtures;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\Jamf\Requests\WriteRequest;
use spkm\Jamf\Support\Path;

class ExampleUpdateRequest extends WriteRequest
{
    protected Method $method = Method::PATCH;

    protected string $responseShape = self::ONE;

    protected ?string $dto = ExampleData::class;

    /**
     * @param  array<mixed>|JsonSerializable  $body
     */
    public function __construct(protected int|string $id, array|JsonSerializable $body = [])
    {
        $this->record = $body;
    }

    public function resolveEndpoint(): string
    {
        return '/v1/examples/'.Path::segment((string) $this->id);
    }
}
