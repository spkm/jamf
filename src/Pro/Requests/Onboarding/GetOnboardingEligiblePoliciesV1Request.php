<?php

namespace spkm\Jamf\Pro\Requests\Onboarding;

use spkm\Jamf\Pro\Data\OnboardingEligibleItem;
use spkm\Jamf\Query\Query;
use spkm\Jamf\Requests\ListRequest;

/**
 * Retrieves a list of policies that are eligible to be used in an onboarding configuration: GET /v1/onboarding/eligible-policies.
 */
class GetOnboardingEligiblePoliciesV1Request extends ListRequest
{
    protected bool $sortable = true;

    protected ?string $dto = OnboardingEligibleItem::class;

    /**
     * @param  Query|array<string, mixed>  $query  The filter, sort, sections and paging, or the query parameters as an array.
     */
    public function __construct(Query|array $query = [])
    {
        parent::__construct($query);
    }

    public function resolveEndpoint(): string
    {
        return '/v1/onboarding/eligible-policies';
    }
}
