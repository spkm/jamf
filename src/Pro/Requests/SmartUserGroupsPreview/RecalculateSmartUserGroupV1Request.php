<?php

namespace spkm\Jamf\Pro\Requests\SmartUserGroupsPreview;

use spkm\Jamf\Pro\Data\RecalculationResults;
use spkm\Jamf\Requests\ActionRequest;
use spkm\Jamf\Support\Path;

/**
 * Recalculate the smart group for the given id and then return the ids for the users in the smart group: POST /v1/smart-user-groups/{id}/recalculate.
 *
 * Recalculates the smart group for the given id and then returns the ids for the users in the smart group
 */
class RecalculateSmartUserGroupV1Request extends ActionRequest
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
        return '/v1/smart-user-groups/'.Path::segment((string) $this->id).'/recalculate';
    }
}
