<?php

namespace spkm\Jamf\Pro\Requests\SmartUserGroupsPreview;

use spkm\Jamf\Pro\Data\RecalculationResults;
use spkm\Jamf\Requests\ActionRequest;
use spkm\Jamf\Support\Path;

/**
 * Recalculate a smart group for the given user id and then return the count of smart groups the user falls into: POST /v1/users/{id}/recalculate-smart-groups.
 *
 * Recalculates a smart group for the given user id and then returns the count of smart groups the user falls into
 */
class RecalculateUserSmartGroupsV1Request extends ActionRequest
{
    protected string $responseShape = self::ONE;

    protected ?string $dto = RecalculationResults::class;

    /**
     * @param  array<string, mixed>  $options  Query options.
     */
    public function __construct(protected int|string $id, array $options = [])
    {
        $this->options = $options;
    }

    public function resolveEndpoint(): string
    {
        return '/v1/users/'.Path::segment((string) $this->id).'/recalculate-smart-groups';
    }
}
