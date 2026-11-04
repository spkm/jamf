<?php

namespace spkm\Jamf\Pro\Requests\AdvancedMobileDeviceSearches;

use spkm\Jamf\Pro\Data\AdvancedSearchCriteriaChoices;
use spkm\Jamf\Requests\GetRequest;

/**
 * Get Mobile Device Advanced Search criteria choices: GET /v1/advanced-mobile-device-searches/choices.
 *
 * Gets Mobile Device Advanced Search criteria choices. A list of potentially valid choices can be found by navigating
 * to the Criteria page of the Advanced Mobile Device Search creation process. A few are "App Name", "Building", and
 * "Display Name".
 */
class GetAdvancedMobileDeviceSearchesChoicesV1Request extends GetRequest
{
    protected ?string $dto = AdvancedSearchCriteriaChoices::class;

    /**
     * @param  array<string, mixed>  $options  Query options Jamf documents: criteria (required), site, contains.
     */
    public function __construct(array $options = [])
    {
        $this->options = $options;
    }

    public function resolveEndpoint(): string
    {
        return '/v1/advanced-mobile-device-searches/choices';
    }
}
