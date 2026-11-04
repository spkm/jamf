<?php

namespace spkm\Jamf\Pro\Resources;

use JsonSerializable;
use spkm\Jamf\Pro\Data\HrefResponse;
use spkm\Jamf\Pro\Data\ObjectHistory;
use spkm\Jamf\Pro\Data\OnboardingConfiguration;
use spkm\Jamf\Pro\Data\OnboardingEligibleItem;
use spkm\Jamf\Pro\ProConnector;
use spkm\Jamf\Pro\Requests\Onboarding\CreateOnboardingHistoryV1Request;
use spkm\Jamf\Pro\Requests\Onboarding\ExportOnboardingHistoryV1Request;
use spkm\Jamf\Pro\Requests\Onboarding\GetOnboardingEligibleAppsV1Request;
use spkm\Jamf\Pro\Requests\Onboarding\GetOnboardingEligibleConfigurationProfilesV1Request;
use spkm\Jamf\Pro\Requests\Onboarding\GetOnboardingEligiblePoliciesV1Request;
use spkm\Jamf\Pro\Requests\Onboarding\GetOnboardingHistoryV1Request;
use spkm\Jamf\Pro\Requests\Onboarding\GetOnboardingV1Request;
use spkm\Jamf\Pro\Requests\Onboarding\ReplaceOnboardingV1Request;
use spkm\Jamf\Query\Builder;
use spkm\Jamf\Query\Query;
use spkm\Jamf\Requests\JamfRequest;
use spkm\Jamf\Requests\ListRequest;
use spkm\Jamf\Resources\PagedResource;

/**
 * The onboarding endpoints of the Jamf Pro API, from Jamf::onboarding().
 *
 * @extends Builder<ObjectHistory>
 */
class OnboardingResource extends Builder
{
    public function __construct(ProConnector $connector)
    {
        parent::__construct($connector, ObjectHistory::class);
    }

    protected function listRequest(Query $query): ListRequest
    {
        return new GetOnboardingHistoryV1Request($query);
    }

    protected function createRequest(array $body): JamfRequest
    {
        return new CreateOnboardingHistoryV1Request($body);
    }

    /**
     * Add Onboarding history object notes: POST /v1/onboarding/history.
     *
     * @param  array<mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options  Query options.
     */
    public function createOnboardingHistoryV1(array|JsonSerializable $body, array $options = []): ?HrefResponse
    {
        return $this->fetch(new CreateOnboardingHistoryV1Request($body, $options));
    }

    /**
     * Export history object collection in specified format for Onboarding: POST /v1/onboarding/history/export.
     *
     * @param  array<mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options  Query options Jamf documents: export-fields, export-labels, page,
     *                                         page-size, sort, filter.
     */
    public function exportOnboardingHistoryV1(array|JsonSerializable $body = [], array $options = []): ?string
    {
        return $this->fetch(new ExportOnboardingHistoryV1Request($body, $options));
    }

    /**
     * Retrieves a list of applications that are eligible to be used in an onboarding configuration: GET
     * /v1/onboarding/eligible-apps.
     *
     * A builder over the list: filter, sort, sections, get(), lazy() and the rest.
     *
     * @return PagedResource<OnboardingEligibleItem>
     */
    public function getOnboardingEligibleAppsV1(): PagedResource
    {
        return new PagedResource($this->pro(), OnboardingEligibleItem::class, fn (Query $query) => new GetOnboardingEligibleAppsV1Request($query));
    }

    /**
     * Retrieves a list of configuration profiles that are eligible to be used in an onboarding configuration: GET
     * /v1/onboarding/eligible-configuration-profiles.
     *
     * A builder over the list: filter, sort, sections, get(), lazy() and the rest.
     *
     * @return PagedResource<OnboardingEligibleItem>
     */
    public function getOnboardingEligibleConfigurationProfilesV1(): PagedResource
    {
        return new PagedResource($this->pro(), OnboardingEligibleItem::class, fn (Query $query) => new GetOnboardingEligibleConfigurationProfilesV1Request($query));
    }

    /**
     * Retrieves a list of policies that are eligible to be used in an onboarding configuration: GET
     * /v1/onboarding/eligible-policies.
     *
     * A builder over the list: filter, sort, sections, get(), lazy() and the rest.
     *
     * @return PagedResource<OnboardingEligibleItem>
     */
    public function getOnboardingEligiblePoliciesV1(): PagedResource
    {
        return new PagedResource($this->pro(), OnboardingEligibleItem::class, fn (Query $query) => new GetOnboardingEligiblePoliciesV1Request($query));
    }

    /**
     * Get Onboarding history object: GET /v1/onboarding/history.
     *
     * A builder over the list: filter, sort, sections, get(), lazy() and the rest.
     *
     * @return PagedResource<ObjectHistory>
     */
    public function getOnboardingHistoryV1(): PagedResource
    {
        return new PagedResource($this->pro(), ObjectHistory::class, fn (Query $query) => new GetOnboardingHistoryV1Request($query));
    }

    /**
     * Get the current onboarding settings configuration: GET /v1/onboarding.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function getOnboardingV1(array $options = []): ?OnboardingConfiguration
    {
        return $this->fetch(new GetOnboardingV1Request($options));
    }

    /**
     * Update the onboarding configuration: PUT /v1/onboarding.
     *
     * @param  array<mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options  Query options.
     */
    public function replaceOnboardingV1(array|JsonSerializable $body, array $options = []): ?OnboardingConfiguration
    {
        return $this->fetch(new ReplaceOnboardingV1Request($body, $options));
    }

    private function pro(): ProConnector
    {
        $connector = $this->connector();

        return $connector instanceof ProConnector ? $connector : throw new \LogicException('A Jamf Pro resource needs a Jamf Pro connector.');
    }
}
