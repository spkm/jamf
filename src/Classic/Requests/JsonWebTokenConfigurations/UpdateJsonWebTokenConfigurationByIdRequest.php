<?php

namespace spkm\Jamf\Classic\Requests\JsonWebTokenConfigurations;

use Saloon\Enums\Method;
use spkm\Jamf\Classic\Requests\ClassicWriteRequest;
use spkm\Jamf\Support\Path;

/**
 * Updates an existing JSON Web Token configuration by id: PUT /jsonwebtokenconfigurations/id/{id}.
 */
class UpdateJsonWebTokenConfigurationByIdRequest extends ClassicWriteRequest
{
    protected Method $method = Method::PUT;

    protected string $root = 'json_web_token_configuration';

    /**
     * @param  array<string, mixed>|string  $record  The record as an array of Jamf's field names (written as XML under <json_web_token_configuration>), or the XML itself.
     */
    public function __construct(protected int|string $id, array|string $record = [])
    {
        $this->record = $record;
    }

    public function resolveEndpoint(): string
    {
        return '/jsonwebtokenconfigurations/id/'.Path::segment((string) $this->id);
    }
}
