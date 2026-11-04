<?php

namespace spkm\Jamf\Pro\Requests\Enrollment;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\Jamf\Pro\Data\EnrollmentSettingsV4;
use spkm\Jamf\Requests\WriteRequest;

/**
 * Update Enrollment object: PUT /v4/enrollment.
 *
 * Update enrollment object. Regarding the `developerCertificateIdentity`, if this object is omitted, the certificate
 * will not be deleted from Jamf Pro. The `identityKeystore` is the entire cert file as a base64 encoded string. The
 * `md5Sum` field is not required in the PUT request, but is calculated and returned in the response.
 */
class ReplaceEnrollmentV4Request extends WriteRequest
{
    protected Method $method = Method::PUT;

    protected string $responseShape = self::ONE;

    protected ?string $dto = EnrollmentSettingsV4::class;

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
        return '/v4/enrollment';
    }
}
