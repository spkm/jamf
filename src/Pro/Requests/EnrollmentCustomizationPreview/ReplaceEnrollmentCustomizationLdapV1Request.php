<?php

namespace spkm\Jamf\Pro\Requests\EnrollmentCustomizationPreview;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\Jamf\Pro\Data\GetEnrollmentCustomizationPanelLdapAuth;
use spkm\Jamf\Requests\WriteRequest;
use spkm\Jamf\Support\Path;

/**
 * Update a single LDAP Panel for a single Enrollment Customization: PUT /v1/enrollment-customization/{id}/ldap/{panel-id}.
 *
 * Update a single LDAP panel for a single enrollment customization. If multiple LDAP access groups are defined with
 * the same name and id, only one will be saved.
 */
class ReplaceEnrollmentCustomizationLdapV1Request extends WriteRequest
{
    protected Method $method = Method::PUT;

    protected string $responseShape = self::ONE;

    protected ?string $dto = GetEnrollmentCustomizationPanelLdapAuth::class;

    /**
     * @param  array<mixed>|JsonSerializable  $body  The record, as an array of Jamf's field names or a model.
     * @param  array<string, mixed>  $options  Query options.
     */
    public function __construct(protected int|string $id, protected int|string $panelId, array|JsonSerializable $body, array $options = [])
    {
        $this->record = $body;
        $this->options = $options;
    }

    public function resolveEndpoint(): string
    {
        return '/v1/enrollment-customization/'.Path::segment((string) $this->id).'/ldap/'.Path::segment((string) $this->panelId);
    }
}
