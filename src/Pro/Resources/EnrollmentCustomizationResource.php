<?php

namespace spkm\Jamf\Pro\Resources;

use JsonSerializable;
use spkm\Jamf\Pro\Data\BrandingImageUrl;
use spkm\Jamf\Pro\Data\EnrollmentCustomizationV2;
use spkm\Jamf\Pro\Data\HrefResponse;
use spkm\Jamf\Pro\Data\ObjectHistory;
use spkm\Jamf\Pro\Data\PrestageDependencies;
use spkm\Jamf\Pro\ProConnector;
use spkm\Jamf\Pro\Requests\EnrollmentCustomization\CreateEnrollmentCustomizationHistoryV2Request;
use spkm\Jamf\Pro\Requests\EnrollmentCustomization\CreateEnrollmentCustomizationsImagesV2Request;
use spkm\Jamf\Pro\Requests\EnrollmentCustomization\CreateEnrollmentCustomizationsV2Request;
use spkm\Jamf\Pro\Requests\EnrollmentCustomization\DeleteEnrollmentCustomizationV2Request;
use spkm\Jamf\Pro\Requests\EnrollmentCustomization\GetEnrollmentCustomizationHistoryV2Request;
use spkm\Jamf\Pro\Requests\EnrollmentCustomization\GetEnrollmentCustomizationPrestagesV2Request;
use spkm\Jamf\Pro\Requests\EnrollmentCustomization\GetEnrollmentCustomizationsImageV2Request;
use spkm\Jamf\Pro\Requests\EnrollmentCustomization\GetEnrollmentCustomizationsV2Request;
use spkm\Jamf\Pro\Requests\EnrollmentCustomization\GetEnrollmentCustomizationV2Request;
use spkm\Jamf\Pro\Requests\EnrollmentCustomization\ReplaceEnrollmentCustomizationV2Request;
use spkm\Jamf\Query\Builder;
use spkm\Jamf\Query\Query;
use spkm\Jamf\Requests\JamfRequest;
use spkm\Jamf\Requests\ListRequest;
use spkm\Jamf\Resources\PagedResource;
use SplFileInfo;

/**
 * The enrollment-customization endpoints of the Jamf Pro API, from Jamf::enrollmentCustomization().
 *
 * @extends Builder<EnrollmentCustomizationV2>
 */
class EnrollmentCustomizationResource extends Builder
{
    public function __construct(ProConnector $connector)
    {
        parent::__construct($connector, EnrollmentCustomizationV2::class);
    }

    protected function listRequest(Query $query): ListRequest
    {
        return new GetEnrollmentCustomizationsV2Request($query);
    }

    protected function itemRequest(int|string $id): JamfRequest
    {
        return new GetEnrollmentCustomizationV2Request($id);
    }

    protected function createRequest(array $body): JamfRequest
    {
        return new CreateEnrollmentCustomizationsV2Request($body);
    }

    protected function updateRequest(int|string $id, array $body): JamfRequest
    {
        return new ReplaceEnrollmentCustomizationV2Request($id, $body);
    }

    protected function deleteRequest(int|string $id): JamfRequest
    {
        return new DeleteEnrollmentCustomizationV2Request($id);
    }

    /**
     * Add Enrollment Customization history object notes: POST /v2/enrollment-customizations/{id}/history.
     *
     * @param  array<mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options  Query options.
     */
    public function createEnrollmentCustomizationHistoryV2(int|string $id, array|JsonSerializable $body, array $options = []): ?ObjectHistory
    {
        return $this->fetch(new CreateEnrollmentCustomizationHistoryV2Request($id, $body, $options));
    }

    /**
     * Upload an image: POST /v2/enrollment-customizations/images.
     *
     * @param  string|resource|SplFileInfo  $file  The file: its contents, a stream, or a file on disk.
     * @param  array<string, mixed>  $options  Query options.
     */
    public function createEnrollmentCustomizationsImagesV2(mixed $file, ?string $filename = null, array $options = []): ?BrandingImageUrl
    {
        return $this->fetch(new CreateEnrollmentCustomizationsImagesV2Request($file, $filename, $options));
    }

    /**
     * Create an Enrollment Customization: POST /v2/enrollment-customizations.
     *
     * @param  array<mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options  Query options.
     */
    public function createEnrollmentCustomizationsV2(array|JsonSerializable $body, array $options = []): ?HrefResponse
    {
        return $this->fetch(new CreateEnrollmentCustomizationsV2Request($body, $options));
    }

    /**
     * Delete an Enrollment Customization with the supplied id: DELETE /v2/enrollment-customizations/{id}.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function deleteEnrollmentCustomizationV2(int|string $id, array $options = []): bool
    {
        return $this->perform(new DeleteEnrollmentCustomizationV2Request($id, $options));
    }

    /**
     * Get sorted and paged Enrollment Customization history objects: GET /v2/enrollment-customizations/{id}/history.
     *
     * A builder over the list: filter, sort, sections, get(), lazy() and the rest.
     *
     * @return PagedResource<ObjectHistory>
     */
    public function getEnrollmentCustomizationHistoryV2(int|string $id): PagedResource
    {
        return new PagedResource($this->pro(), ObjectHistory::class, fn (Query $query) => new GetEnrollmentCustomizationHistoryV2Request($id, $query));
    }

    /**
     * Retrieve the list of Prestages using this Enrollment Customization: GET
     * /v2/enrollment-customizations/{id}/prestages.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function getEnrollmentCustomizationPrestagesV2(int|string $id, array $options = []): ?PrestageDependencies
    {
        return $this->fetch(new GetEnrollmentCustomizationPrestagesV2Request($id, $options));
    }

    /**
     * Retrieve an Enrollment Customization with the supplied id: GET /v2/enrollment-customizations/{id}.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function getEnrollmentCustomizationV2(int|string $id, array $options = []): ?EnrollmentCustomizationV2
    {
        return $this->fetch(new GetEnrollmentCustomizationV2Request($id, $options));
    }

    /**
     * Download an enrollment customization image: GET /v2/enrollment-customizations/images/{id}.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function getEnrollmentCustomizationsImageV2(int|string $id, array $options = []): ?string
    {
        return $this->fetch(new GetEnrollmentCustomizationsImageV2Request($id, $options));
    }

    /**
     * Retrieve sorted and paged Enrollment Customizations: GET /v2/enrollment-customizations.
     *
     * A builder over the list: filter, sort, sections, get(), lazy() and the rest.
     *
     * @return PagedResource<EnrollmentCustomizationV2>
     */
    public function getEnrollmentCustomizationsV2(): PagedResource
    {
        return new PagedResource($this->pro(), EnrollmentCustomizationV2::class, fn (Query $query) => new GetEnrollmentCustomizationsV2Request($query));
    }

    /**
     * Update an Enrollment Customization: PUT /v2/enrollment-customizations/{id}.
     *
     * @param  array<mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options  Query options.
     */
    public function replaceEnrollmentCustomizationV2(int|string $id, array|JsonSerializable $body, array $options = []): ?EnrollmentCustomizationV2
    {
        return $this->fetch(new ReplaceEnrollmentCustomizationV2Request($id, $body, $options));
    }

    private function pro(): ProConnector
    {
        $connector = $this->connector();

        return $connector instanceof ProConnector ? $connector : throw new \LogicException('A Jamf Pro resource needs a Jamf Pro connector.');
    }
}
