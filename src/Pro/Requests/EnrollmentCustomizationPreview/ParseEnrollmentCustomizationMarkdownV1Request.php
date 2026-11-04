<?php

namespace spkm\Jamf\Pro\Requests\EnrollmentCustomizationPreview;

use JsonSerializable;
use spkm\Jamf\Pro\Data\Markdown;
use spkm\Jamf\Requests\WriteRequest;

/**
 * Parse the given string as markdown text and return Html output: POST /v1/enrollment-customization/parse-markdown.
 */
class ParseEnrollmentCustomizationMarkdownV1Request extends WriteRequest
{
    protected string $responseShape = self::ONE;

    protected ?string $dto = Markdown::class;

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
        return '/v1/enrollment-customization/parse-markdown';
    }
}
