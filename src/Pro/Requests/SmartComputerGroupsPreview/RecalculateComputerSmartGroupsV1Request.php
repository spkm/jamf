<?php

namespace spkm\Jamf\Pro\Requests\SmartComputerGroupsPreview;

use spkm\Jamf\Pro\Data\RecalculationResults;
use spkm\Jamf\Requests\ActionRequest;
use spkm\Jamf\Support\Path;

/**
 * Recalculate a smart group for the given id: POST /v1/computers/{id}/recalculate-smart-groups.
 *
 * Recalculates a smart group for the given id and then returns the count of smart groups the computer falls into
 */
class RecalculateComputerSmartGroupsV1Request extends ActionRequest
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
        return '/v1/computers/'.Path::segment((string) $this->id).'/recalculate-smart-groups';
    }
}
