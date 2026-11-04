<?php

namespace spkm\Jamf\Pro\Requests\EnrollmentCustomizationPreview;

use spkm\Jamf\Requests\DeleteRequest;
use spkm\Jamf\Support\Path;

/**
 * Delete an LDAP single panel from an Enrollment Customization: DELETE /v1/enrollment-customization/{id}/ldap/{panel-id}.
 *
 * Delete an LDAP single Panel from an Enrollment Customization
 */
class DeleteEnrollmentCustomizationLdapV1Request extends DeleteRequest
{
    /**
     * @param  array<string, mixed>  $options  Query options.
     */
    public function __construct(protected int|string $id, protected int|string $panelId, array $options = [])
    {
        $this->options = $options;
    }

    public function resolveEndpoint(): string
    {
        return '/v1/enrollment-customization/'.Path::segment((string) $this->id).'/ldap/'.Path::segment((string) $this->panelId);
    }
}
