<?php

namespace spkm\Jamf\Pro\Requests\EnrollmentCustomization;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\Jamf\Pro\Data\EnrollmentCustomizationV2;
use spkm\Jamf\Requests\WriteRequest;
use spkm\Jamf\Support\Path;

/**
 * Update an Enrollment Customization: PUT /v2/enrollment-customizations/{id}.
 *
 * Updates an Enrollment Customization
 */
class ReplaceEnrollmentCustomizationV2Request extends WriteRequest
{
    protected Method $method = Method::PUT;

    protected string $responseShape = self::ONE;

    protected ?string $dto = EnrollmentCustomizationV2::class;

    /**
     * @param  array<mixed>|JsonSerializable  $body  The record, as an array of Jamf's field names or a model.
     * @param  array<string, mixed>  $options  Query options.
     */
    public function __construct(protected int|string $id, array|JsonSerializable $body, array $options = [])
    {
        $this->record = $body;
        $this->options = $options;
    }

    public function resolveEndpoint(): string
    {
        return '/v2/enrollment-customizations/'.Path::segment((string) $this->id);
    }
}
