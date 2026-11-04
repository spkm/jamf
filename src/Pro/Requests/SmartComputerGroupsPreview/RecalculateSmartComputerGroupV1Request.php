<?php

namespace spkm\Jamf\Pro\Requests\SmartComputerGroupsPreview;

use spkm\Jamf\Pro\Data\RecalculationResults;
use spkm\Jamf\Requests\ActionRequest;
use spkm\Jamf\Support\Path;

/**
 * Recalculate the smart group for the given id: POST /v1/smart-computer-groups/{id}/recalculate.
 *
 * Recalculates the smart group for the given id and then returns the ids for the computers in the smart group
 */
class RecalculateSmartComputerGroupV1Request extends ActionRequest
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
        return '/v1/smart-computer-groups/'.Path::segment((string) $this->id).'/recalculate';
    }
}
