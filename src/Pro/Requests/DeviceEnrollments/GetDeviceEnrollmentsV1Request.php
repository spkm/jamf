<?php

namespace spkm\Jamf\Pro\Requests\DeviceEnrollments;

use spkm\Jamf\Pro\Data\DeviceEnrollmentInstance;
use spkm\Jamf\Query\Query;
use spkm\Jamf\Requests\ListRequest;

/**
 * Read all sorted and paged Device Enrollment instances: GET /v1/device-enrollments.
 *
 * Search for sorted and paged device enrollment instances
 */
class GetDeviceEnrollmentsV1Request extends ListRequest
{
    protected bool $sortable = true;

    protected ?string $dto = DeviceEnrollmentInstance::class;

    /**
     * @param  Query|array<string, mixed>  $query  The filter, sort, sections and paging, or the query parameters as an array.
     */
    public function __construct(Query|array $query = [])
    {
        parent::__construct($query);
    }

    public function resolveEndpoint(): string
    {
        return '/v1/device-enrollments';
    }
}
