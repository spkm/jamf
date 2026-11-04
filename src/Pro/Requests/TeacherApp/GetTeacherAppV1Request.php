<?php

namespace spkm\Jamf\Pro\Requests\TeacherApp;

use spkm\Jamf\Pro\Data\TeacherSettingsResponse;
use spkm\Jamf\Requests\GetRequest;

/**
 * Get the Jamf Teacher settings that you have access to see: GET /v1/teacher-app.
 */
class GetTeacherAppV1Request extends GetRequest
{
    protected ?string $dto = TeacherSettingsResponse::class;

    /**
     * @param  array<string, mixed>  $options  Query options.
     */
    public function __construct(array $options = [])
    {
        $this->options = $options;
    }

    public function resolveEndpoint(): string
    {
        return '/v1/teacher-app';
    }
}
