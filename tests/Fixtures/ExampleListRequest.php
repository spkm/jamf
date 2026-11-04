<?php

namespace spkm\Jamf\Tests\Fixtures;

use spkm\Jamf\Requests\ListRequest;

class ExampleListRequest extends ListRequest
{
    protected bool $filterable = true;

    protected bool $sortable = true;

    protected bool $sectioned = true;

    protected ?string $dto = ExampleData::class;

    public function resolveEndpoint(): string
    {
        return '/v1/examples';
    }
}
