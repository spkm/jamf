<?php

namespace spkm\Jamf\Pro\Requests\Enrollment;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\Jamf\Pro\Data\EnrollmentProcessTextObject;
use spkm\Jamf\Requests\WriteRequest;
use spkm\Jamf\Support\Path;

/**
 * Edit Enrollment messaging for a language: PUT /v3/enrollment/languages/{languageId}.
 *
 * Edit enrollment messaging for a language.
 */
class ReplaceEnrollmentLanguageV3Request extends WriteRequest
{
    protected Method $method = Method::PUT;

    protected string $responseShape = self::ONE;

    protected ?string $dto = EnrollmentProcessTextObject::class;

    /**
     * @param  array<mixed>|JsonSerializable  $body  The record, as an array of Jamf's field names or a model.
     * @param  array<string, mixed>  $options  Query options.
     */
    public function __construct(protected int|string $languageId, array|JsonSerializable $body = [], array $options = [])
    {
        $this->record = $body;
        $this->options = $options;
    }

    public function resolveEndpoint(): string
    {
        return '/v3/enrollment/languages/'.Path::segment((string) $this->languageId);
    }
}
