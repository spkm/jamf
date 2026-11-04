<?php

namespace spkm\Jamf\Pro\Requests\Enrollment;

use spkm\Jamf\Requests\DeleteRequest;
use spkm\Jamf\Support\Path;

/**
 * Delete an LDAP group's access to user initiated Enrollment: DELETE /v3/enrollment/access-groups/{id}.
 *
 * Deletes an LDAP group's access to user initiated enrollment. The group "All LDAP Users" cannot be deleted, but it
 * can be modified to disallow User-Initiated Enrollment.
 */
class DeleteEnrollmentAccessGroupV3Request extends DeleteRequest
{
    /**
     * @param  array<string, mixed>  $options  Query options.
     */
    public function __construct(protected int|string $id, array $options = [])
    {
        $this->options = $options;
    }

    public function resolveEndpoint(): string
    {
        return '/v3/enrollment/access-groups/'.Path::segment((string) $this->id);
    }
}
