<?php

namespace spkm\Jamf\Tests\Fixtures;

use spkm\Jamf\Requests\GetRequest;
use spkm\Jamf\Support\Path;

class ExampleItemRequest extends GetRequest
{
    protected ?string $dto = ExampleData::class;

    public function __construct(protected int|string $id) {}

    public function resolveEndpoint(): string
    {
        return '/v1/examples/'.Path::segment((string) $this->id);
    }
}
