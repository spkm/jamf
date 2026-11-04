<?php

namespace spkm\Jamf\Pro\Requests\ComputerExtensionAttributes;

use spkm\Jamf\Pro\Data\ComputerExtensionAttributes;
use spkm\Jamf\Query\Query;
use spkm\Jamf\Requests\ListRequest;

/**
 * Retrieve Computer Extension Attributes: GET /v1/computer-extension-attributes.
 *
 * Retrieves All Computer Extension Attributes Configuration.
 */
class GetComputerExtensionAttributesV1Request extends ListRequest
{
    protected bool $filterable = true;

    protected bool $sortable = true;

    protected ?string $dto = ComputerExtensionAttributes::class;

    /**
     * @param  Query|array<string, mixed>  $query  The filter, sort, sections and paging, or the query parameters as an array.
     */
    public function __construct(Query|array $query = [])
    {
        parent::__construct($query);
    }

    public function resolveEndpoint(): string
    {
        return '/v1/computer-extension-attributes';
    }
}
