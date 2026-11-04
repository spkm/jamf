<?php

namespace spkm\Jamf\Pro\Requests\Enrollment;

use spkm\Jamf\Pro\Data\LanguageCode;
use spkm\Jamf\Requests\GetRequest;

/**
 * Retrieve the list of languages and corresponding ISO 639-1 Codes: GET /v3/enrollment/language-codes.
 *
 * Retrieves the list of languages and corresponding ISO 639-1 Codes.
 */
class GetEnrollmentLanguageCodesV3Request extends GetRequest
{
    protected string $responseShape = self::LIST;

    protected ?string $dto = LanguageCode::class;

    /**
     * @param  array<string, mixed>  $options  Query options.
     */
    public function __construct(array $options = [])
    {
        $this->options = $options;
    }

    public function resolveEndpoint(): string
    {
        return '/v3/enrollment/language-codes';
    }
}
