<?php

namespace spkm\Jamf\Tests\Fixtures;

use spkm\Jamf\Requests\DeleteRequest;
use spkm\Jamf\Support\Path;

class ExampleDeleteRequest extends DeleteRequest
{
    public function __construct(protected int|string $id) {}

    public function resolveEndpoint(): string
    {
        return '/v1/examples/'.Path::segment((string) $this->id);
    }
}
