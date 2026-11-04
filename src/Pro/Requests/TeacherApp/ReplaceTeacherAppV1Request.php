<?php

namespace spkm\Jamf\Pro\Requests\TeacherApp;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\Jamf\Pro\Data\TeacherSettingsResponse;
use spkm\Jamf\Requests\WriteRequest;

/**
 * Update a Jamf Teacher settings object: PUT /v1/teacher-app.
 */
class ReplaceTeacherAppV1Request extends WriteRequest
{
    protected Method $method = Method::PUT;

    protected string $responseShape = self::ONE;

    protected ?string $dto = TeacherSettingsResponse::class;

    /**
     * @param  array<mixed>|JsonSerializable  $body  The record, as an array of Jamf's field names or a model.
     * @param  array<string, mixed>  $options  Query options.
     */
    public function __construct(array|JsonSerializable $body, array $options = [])
    {
        $this->record = $body;
        $this->options = $options;
    }

    public function resolveEndpoint(): string
    {
        return '/v1/teacher-app';
    }
}
