<?php

namespace spkm\Jamf\Pro\Requests\EnrollmentCustomizationPreview;

use spkm\Jamf\Pro\Data\EnrollmentCustomizationPanelList;
use spkm\Jamf\Requests\GetRequest;
use spkm\Jamf\Support\Path;

/**
 * Get all Panels for single Enrollment Customization: GET /v1/enrollment-customization/{id}/all.
 *
 * Get all panels for single enrollment customization
 */
class GetEnrollmentCustomizationAllV1Request extends GetRequest
{
    protected ?string $dto = EnrollmentCustomizationPanelList::class;

    /**
     * @param  array<string, mixed>  $options  Query options.
     */
    public function __construct(protected int|string $id, array $options = [])
    {
        $this->options = $options;
    }

    public function resolveEndpoint(): string
    {
        return '/v1/enrollment-customization/'.Path::segment((string) $this->id).'/all';
    }
}
