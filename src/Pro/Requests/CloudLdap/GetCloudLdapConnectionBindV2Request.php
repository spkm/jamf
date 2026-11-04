<?php

namespace spkm\Jamf\Pro\Requests\CloudLdap;

use spkm\Jamf\Pro\Data\CloudLdapConnectionPoolStatistics;
use spkm\Jamf\Requests\GetRequest;
use spkm\Jamf\Support\Path;

/**
 * Get bind connection pool statistics: GET /v2/cloud-ldaps/{id}/connection/bind.
 *
 * Get all search connection pool for chosen Cloud Identity Provider. numConnectionsClosedDefunct - The number of
 * connections that have been closed as defunct. numConnectionsClosedExpired - The number of connections that have
 * been closed because they were expired. numConnectionsClosedUnneeded - The number of connections that have been
 * closed because they were no longer needed. numFailedCheckouts - The number of failed attempts to check out a
 * connection from the pool. numFailedConnectionAttempts - The number of failed attempts to create a connection for
 * use in the pool. numReleasedValid - The...
 */
class GetCloudLdapConnectionBindV2Request extends GetRequest
{
    protected ?string $dto = CloudLdapConnectionPoolStatistics::class;

    /**
     * @param  array<string, mixed>  $options  Query options.
     */
    public function __construct(protected int|string $id, array $options = [])
    {
        $this->options = $options;
    }

    public function resolveEndpoint(): string
    {
        return '/v2/cloud-ldaps/'.Path::segment((string) $this->id).'/connection/bind';
    }
}
