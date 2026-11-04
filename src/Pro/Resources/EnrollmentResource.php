<?php

namespace spkm\Jamf\Pro\Resources;

use Illuminate\Support\Collection;
use JsonSerializable;
use spkm\Jamf\Pro\Data\AccessManagementSetting;
use spkm\Jamf\Pro\Data\AccountDrivenUserEnrollmentSessionTokenSettings;
use spkm\Jamf\Pro\Data\EnrollmentAccessGroupPreview;
use spkm\Jamf\Pro\Data\EnrollmentProcessTextObject;
use spkm\Jamf\Pro\Data\EnrollmentSettingsV4;
use spkm\Jamf\Pro\Data\HrefResponse;
use spkm\Jamf\Pro\Data\LanguageCode;
use spkm\Jamf\Pro\Data\ObjectHistory;
use spkm\Jamf\Pro\ProConnector;
use spkm\Jamf\Pro\Requests\Enrollment\CreateEnrollmentAccessGroupsV3Request;
use spkm\Jamf\Pro\Requests\Enrollment\CreateEnrollmentAccessManagementV4Request;
use spkm\Jamf\Pro\Requests\Enrollment\CreateEnrollmentHistoryV2Request;
use spkm\Jamf\Pro\Requests\Enrollment\DeleteEnrollmentAccessGroupV3Request;
use spkm\Jamf\Pro\Requests\Enrollment\DeleteEnrollmentLanguageV3Request;
use spkm\Jamf\Pro\Requests\Enrollment\DeleteMultipleEnrollmentLanguagesV3Request;
use spkm\Jamf\Pro\Requests\Enrollment\ExportEnrollmentHistoryV2Request;
use spkm\Jamf\Pro\Requests\Enrollment\GetAdueSessionTokenSettingsV1Request;
use spkm\Jamf\Pro\Requests\Enrollment\GetEnrollmentAccessGroupsV3Request;
use spkm\Jamf\Pro\Requests\Enrollment\GetEnrollmentAccessGroupV3Request;
use spkm\Jamf\Pro\Requests\Enrollment\GetEnrollmentAccessManagementV4Request;
use spkm\Jamf\Pro\Requests\Enrollment\GetEnrollmentFilteredLanguageCodesV3Request;
use spkm\Jamf\Pro\Requests\Enrollment\GetEnrollmentHistoryV2Request;
use spkm\Jamf\Pro\Requests\Enrollment\GetEnrollmentLanguageCodesV3Request;
use spkm\Jamf\Pro\Requests\Enrollment\GetEnrollmentLanguagesV3Request;
use spkm\Jamf\Pro\Requests\Enrollment\GetEnrollmentLanguageV3Request;
use spkm\Jamf\Pro\Requests\Enrollment\GetEnrollmentV4Request;
use spkm\Jamf\Pro\Requests\Enrollment\ReplaceAdueSessionTokenSettingsV1Request;
use spkm\Jamf\Pro\Requests\Enrollment\ReplaceEnrollmentAccessGroupV3Request;
use spkm\Jamf\Pro\Requests\Enrollment\ReplaceEnrollmentLanguageV3Request;
use spkm\Jamf\Pro\Requests\Enrollment\ReplaceEnrollmentV4Request;
use spkm\Jamf\Query\Builder;
use spkm\Jamf\Query\Query;
use spkm\Jamf\Requests\JamfRequest;
use spkm\Jamf\Requests\ListRequest;
use spkm\Jamf\Resources\PagedResource;

/**
 * The enrollment endpoints of the Jamf Pro API, from Jamf::enrollment().
 *
 * @extends Builder<EnrollmentProcessTextObject>
 */
class EnrollmentResource extends Builder
{
    public function __construct(ProConnector $connector)
    {
        parent::__construct($connector, EnrollmentProcessTextObject::class);
    }

    protected function listRequest(Query $query): ListRequest
    {
        return new GetEnrollmentLanguagesV3Request($query);
    }

    protected function itemRequest(int|string $id): JamfRequest
    {
        return new GetEnrollmentLanguageV3Request($id);
    }

    protected function updateRequest(int|string $id, array $body): JamfRequest
    {
        return new ReplaceEnrollmentLanguageV3Request($id, $body);
    }

    protected function deleteRequest(int|string $id): JamfRequest
    {
        return new DeleteEnrollmentLanguageV3Request($id);
    }

    /**
     * Add the configured LDAP group for User-Initiated Enrollment: POST /v3/enrollment/access-groups.
     *
     * @param  array<mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options  Query options.
     */
    public function createEnrollmentAccessGroupsV3(array|JsonSerializable $body, array $options = []): ?HrefResponse
    {
        return $this->fetch(new CreateEnrollmentAccessGroupsV3Request($body, $options));
    }

    /**
     * Configure Access Management settings: POST /v4/enrollment/access-management.
     *
     * @param  array<mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options  Query options.
     */
    public function createEnrollmentAccessManagementV4(array|JsonSerializable $body, array $options = []): ?AccessManagementSetting
    {
        return $this->fetch(new CreateEnrollmentAccessManagementV4Request($body, $options));
    }

    /**
     * Add Enrollment history object notes: POST /v2/enrollment/history.
     *
     * @param  array<mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options  Query options.
     */
    public function createEnrollmentHistoryV2(array|JsonSerializable $body, array $options = []): ?HrefResponse
    {
        return $this->fetch(new CreateEnrollmentHistoryV2Request($body, $options));
    }

    /**
     * Delete an LDAP group's access to user initiated Enrollment: DELETE /v3/enrollment/access-groups/{id}.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function deleteEnrollmentAccessGroupV3(int|string $id, array $options = []): bool
    {
        return $this->perform(new DeleteEnrollmentAccessGroupV3Request($id, $options));
    }

    /**
     * Delete the Enrollment messaging for a language: DELETE /v3/enrollment/languages/{languageId}.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function deleteEnrollmentLanguageV3(int|string $languageId, array $options = []): bool
    {
        return $this->perform(new DeleteEnrollmentLanguageV3Request($languageId, $options));
    }

    /**
     * Delete multiple configured languages from User-Initiated Enrollment settings: POST
     * /v3/enrollment/languages/delete-multiple.
     *
     * @param  array<mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options  Query options.
     */
    public function deleteMultipleEnrollmentLanguagesV3(array|JsonSerializable $body, array $options = []): bool
    {
        return $this->perform(new DeleteMultipleEnrollmentLanguagesV3Request($body, $options));
    }

    /**
     * Export enrollment history collection: POST /v2/enrollment/history/export.
     *
     * @param  array<mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options  Query options Jamf documents: export-fields, export-labels, page,
     *                                         page-size, sort, filter.
     */
    public function exportEnrollmentHistoryV2(array|JsonSerializable $body = [], array $options = []): mixed
    {
        return $this->fetch(new ExportEnrollmentHistoryV2Request($body, $options));
    }

    /**
     * Retrieve the Account Driven User Enrollment Session Token Settings: GET /v1/adue-session-token-settings.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function getAdueSessionTokenSettingsV1(array $options = []): ?AccountDrivenUserEnrollmentSessionTokenSettings
    {
        return $this->fetch(new GetAdueSessionTokenSettingsV1Request($options));
    }

    /**
     * Retrieve the configured LDAP groups configured for User-Initiated Enrollment: GET
     * /v3/enrollment/access-groups/{id}.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function getEnrollmentAccessGroupV3(int|string $id, array $options = []): ?EnrollmentAccessGroupPreview
    {
        return $this->fetch(new GetEnrollmentAccessGroupV3Request($id, $options));
    }

    /**
     * Retrieve the configured LDAP groups configured for User-Initiated Enrollment: GET /v3/enrollment/access-groups.
     *
     * A builder over the list: filter, sort, sections, get(), lazy() and the rest.
     *
     * @return PagedResource<EnrollmentAccessGroupPreview>
     */
    public function getEnrollmentAccessGroupsV3(): PagedResource
    {
        return new PagedResource($this->pro(), EnrollmentAccessGroupPreview::class, fn (Query $query) => new GetEnrollmentAccessGroupsV3Request($query));
    }

    /**
     * Get Access Management settings: GET /v4/enrollment/access-management.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function getEnrollmentAccessManagementV4(array $options = []): ?AccessManagementSetting
    {
        return $this->fetch(new GetEnrollmentAccessManagementV4Request($options));
    }

    /**
     * Retrieve the list of languages and corresponding ISO 639-1 Codes but only those not already added to
     * Enrollment: GET /v3/enrollment/filtered-language-codes.
     *
     * @param  array<string, mixed>  $options  Query options.
     * @return Collection<int, LanguageCode>
     */
    public function getEnrollmentFilteredLanguageCodesV3(array $options = []): Collection
    {
        return $this->fetch(new GetEnrollmentFilteredLanguageCodesV3Request($options));
    }

    /**
     * Get sorted and paged Enrollment history object: GET /v2/enrollment/history.
     *
     * A builder over the list: filter, sort, sections, get(), lazy() and the rest.
     *
     * @return PagedResource<ObjectHistory>
     */
    public function getEnrollmentHistoryV2(): PagedResource
    {
        return new PagedResource($this->pro(), ObjectHistory::class, fn (Query $query) => new GetEnrollmentHistoryV2Request($query));
    }

    /**
     * Retrieve the list of languages and corresponding ISO 639-1 Codes: GET /v3/enrollment/language-codes.
     *
     * @param  array<string, mixed>  $options  Query options.
     * @return Collection<int, LanguageCode>
     */
    public function getEnrollmentLanguageCodesV3(array $options = []): Collection
    {
        return $this->fetch(new GetEnrollmentLanguageCodesV3Request($options));
    }

    /**
     * Retrieve the Enrollment messaging for a language: GET /v3/enrollment/languages/{languageId}.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function getEnrollmentLanguageV3(int|string $languageId, array $options = []): ?EnrollmentProcessTextObject
    {
        return $this->fetch(new GetEnrollmentLanguageV3Request($languageId, $options));
    }

    /**
     * Get an array of the language codes that have Enrollment messaging: GET /v3/enrollment/languages.
     *
     * A builder over the list: filter, sort, sections, get(), lazy() and the rest.
     *
     * @return PagedResource<EnrollmentProcessTextObject>
     */
    public function getEnrollmentLanguagesV3(): PagedResource
    {
        return new PagedResource($this->pro(), EnrollmentProcessTextObject::class, fn (Query $query) => new GetEnrollmentLanguagesV3Request($query));
    }

    /**
     * Get Enrollment object and Re-enrollment settings: GET /v4/enrollment.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function getEnrollmentV4(array $options = []): ?EnrollmentSettingsV4
    {
        return $this->fetch(new GetEnrollmentV4Request($options));
    }

    /**
     * Update Account Driven User Enrollment Session Token Settings: PUT /v1/adue-session-token-settings.
     *
     * @param  array<mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options  Query options.
     */
    public function replaceAdueSessionTokenSettingsV1(array|JsonSerializable $body, array $options = []): ?AccountDrivenUserEnrollmentSessionTokenSettings
    {
        return $this->fetch(new ReplaceAdueSessionTokenSettingsV1Request($body, $options));
    }

    /**
     * Modify the configured LDAP groups configured for User-Initiated Enrollment. Only exiting Access Groups can be
     * updated: PUT /v3/enrollment/access-groups/{id}.
     *
     * @param  array<mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options  Query options.
     */
    public function replaceEnrollmentAccessGroupV3(int|string $id, array|JsonSerializable $body, array $options = []): ?EnrollmentAccessGroupPreview
    {
        return $this->fetch(new ReplaceEnrollmentAccessGroupV3Request($id, $body, $options));
    }

    /**
     * Edit Enrollment messaging for a language: PUT /v3/enrollment/languages/{languageId}.
     *
     * @param  array<mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options  Query options.
     */
    public function replaceEnrollmentLanguageV3(int|string $languageId, array|JsonSerializable $body = [], array $options = []): ?EnrollmentProcessTextObject
    {
        return $this->fetch(new ReplaceEnrollmentLanguageV3Request($languageId, $body, $options));
    }

    /**
     * Update Enrollment object: PUT /v4/enrollment.
     *
     * @param  array<mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options  Query options.
     */
    public function replaceEnrollmentV4(array|JsonSerializable $body, array $options = []): ?EnrollmentSettingsV4
    {
        return $this->fetch(new ReplaceEnrollmentV4Request($body, $options));
    }

    private function pro(): ProConnector
    {
        $connector = $this->connector();

        return $connector instanceof ProConnector ? $connector : throw new \LogicException('A Jamf Pro resource needs a Jamf Pro connector.');
    }
}
