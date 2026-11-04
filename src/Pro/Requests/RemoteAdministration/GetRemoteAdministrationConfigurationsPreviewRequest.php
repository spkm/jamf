<?php

namespace spkm\Jamf\Pro\Requests\RemoteAdministration;

use spkm\Jamf\Pro\Data\RemoteAdministrationResponse;
use spkm\Jamf\Query\Query;
use spkm\Jamf\Requests\ListRequest;

/**
 * Get information about all remote administration configurations: GET /preview/remote-administration-configurations.
 *
 * Remote administration feature creates a secure screen-sharing experience between Jamf Pro administrators and their
 * end-users.
 */
class GetRemoteAdministrationConfigurationsPreviewRequest extends ListRequest
{
    protected ?string $dto = RemoteAdministrationResponse::class;

    /**
     * @param  Query|array<string, mixed>  $query  The filter, sort, sections and paging, or the query parameters as an array.
     */
    public function __construct(Query|array $query = [])
    {
        parent::__construct($query);
    }

    public function resolveEndpoint(): string
    {
        return '/preview/remote-administration-configurations';
    }
}
