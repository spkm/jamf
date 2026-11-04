<?php

namespace spkm\Jamf\Pro\Requests\Enrollment;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\Jamf\Pro\Data\EnrollmentAccessGroupPreview;
use spkm\Jamf\Requests\WriteRequest;
use spkm\Jamf\Support\Path;

/**
 * Modify the configured LDAP groups configured for User-Initiated Enrollment. Only exiting Access Groups can be updated: PUT /v3/enrollment/access-groups/{id}.
 */
class ReplaceEnrollmentAccessGroupV3Request extends WriteRequest
{
    protected Method $method = Method::PUT;

    protected string $responseShape = self::ONE;

    protected ?string $dto = EnrollmentAccessGroupPreview::class;

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
        return '/v3/enrollment/access-groups/'.Path::segment((string) $this->id);
    }
}
