<?php

namespace spkm\Jamf\Classic\Requests\AdvancedUserSearches;

use spkm\Jamf\Classic\Requests\ClassicWriteRequest;
use spkm\Jamf\Support\Path;

/**
 * Creates a new advanced user search by id: POST /advancedusersearches/id/{id}.
 */
class CreateAdvancedUserSearchByIdRequest extends ClassicWriteRequest
{
    protected string $root = 'advanced_user_search';

    /**
     * @param  array<string, mixed>|string  $record  The record as an array of Jamf's field names (written as XML under <advanced_user_search>), or the XML itself.
     */
    public function __construct(protected int|string $id, array|string $record = [])
    {
        $this->record = $record;
    }

    public function resolveEndpoint(): string
    {
        return '/advancedusersearches/id/'.Path::segment((string) $this->id);
    }
}
