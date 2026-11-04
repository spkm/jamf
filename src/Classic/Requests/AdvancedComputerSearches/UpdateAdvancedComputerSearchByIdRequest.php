<?php

namespace spkm\Jamf\Classic\Requests\AdvancedComputerSearches;

use Saloon\Enums\Method;
use spkm\Jamf\Classic\Requests\ClassicWriteRequest;
use spkm\Jamf\Support\Path;

/**
 * Updates an existing advanced computer search by id: PUT /advancedcomputersearches/id/{id}.
 */
class UpdateAdvancedComputerSearchByIdRequest extends ClassicWriteRequest
{
    protected Method $method = Method::PUT;

    protected string $root = 'advanced_computer_search';

    /**
     * @param  array<string, mixed>|string  $record  The record as an array of Jamf's field names (written as XML under <advanced_computer_search>), or the XML itself.
     */
    public function __construct(protected int|string $id, array|string $record = [])
    {
        $this->record = $record;
    }

    public function resolveEndpoint(): string
    {
        return '/advancedcomputersearches/id/'.Path::segment((string) $this->id);
    }
}
