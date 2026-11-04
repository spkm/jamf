<?php

namespace spkm\Jamf\Tests\Fixtures;

use spkm\Jamf\Requests\ListRequest;

class ExampleUnfilteredListRequest extends ListRequest
{
    protected ?string $dto = ExampleData::class;

    public function resolveEndpoint(): string
    {
        return '/v1/plain-examples';
    }
}
