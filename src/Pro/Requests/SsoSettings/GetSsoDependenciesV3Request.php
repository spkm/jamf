<?php

namespace spkm\Jamf\Pro\Requests\SsoSettings;

use spkm\Jamf\Pro\Data\EnrollmentCustomizationDependencies;
use spkm\Jamf\Requests\GetRequest;

/**
 * Retrieve the list of Enrollment Customizations using SSO: GET /v3/sso/dependencies.
 *
 * Retrieves the list of Enrollment Customizations using SSO
 */
class GetSsoDependenciesV3Request extends GetRequest
{
    protected ?string $dto = EnrollmentCustomizationDependencies::class;

    /**
     * @param  array<string, mixed>  $options  Query options.
     */
    public function __construct(array $options = [])
    {
        $this->options = $options;
    }

    public function resolveEndpoint(): string
    {
        return '/v3/sso/dependencies';
    }
}
