<?php

namespace spkm\Jamf\Pro\Requests\Ldap;

use spkm\Jamf\Pro\Data\LdapGroup;
use spkm\Jamf\Requests\GetRequest;

/**
 * Retrieve the configured access groups that contain the text in the search param: GET /v1/ldap/groups.
 *
 * Retrieves the configured access groups that contain the text in the searchParam.
 */
class GetLdapGroupsV1Request extends GetRequest
{
    protected string $responseShape = self::LIST;

    protected ?string $dto = LdapGroup::class;

    /**
     * @param  array<string, mixed>  $options  Query options Jamf documents: q.
     */
    public function __construct(array $options = [])
    {
        $this->options = $options;
    }

    public function resolveEndpoint(): string
    {
        return '/v1/ldap/groups';
    }
}
