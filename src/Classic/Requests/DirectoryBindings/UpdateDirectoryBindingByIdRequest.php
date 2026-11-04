<?php

namespace spkm\Jamf\Classic\Requests\DirectoryBindings;

use Saloon\Enums\Method;
use spkm\Jamf\Classic\Requests\ClassicWriteRequest;
use spkm\Jamf\Support\Path;

/**
 * Updates an existing directory binding by id: PUT /directorybindings/id/{id}.
 */
class UpdateDirectoryBindingByIdRequest extends ClassicWriteRequest
{
    protected Method $method = Method::PUT;

    protected string $root = 'directory_binding';

    /**
     * @param  array<string, mixed>|string  $record  The record as an array of Jamf's field names (written as XML under <directory_binding>), or the XML itself.
     */
    public function __construct(protected int|string $id, array|string $record = [])
    {
        $this->record = $record;
    }

    public function resolveEndpoint(): string
    {
        return '/directorybindings/id/'.Path::segment((string) $this->id);
    }
}
