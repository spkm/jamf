<?php

namespace spkm\Jamf\Pro\Requests\ComputerExtensionAttributes;

use spkm\Jamf\Pro\Data\ComputerExtensionAttributeTemplates;
use spkm\Jamf\Query\Query;
use spkm\Jamf\Requests\ListRequest;

/**
 * Retrieve All Computer Extension Attributes Templates: GET /v1/computer-extension-attributes/templates.
 *
 * Retrieves All Computer Extension Attributes Templates.
 */
class GetComputerExtensionAttributesTemplatesV1Request extends ListRequest
{
    protected bool $filterable = true;

    protected bool $sortable = true;

    protected ?string $dto = ComputerExtensionAttributeTemplates::class;

    /**
     * @param  Query|array<string, mixed>  $query  The filter, sort, sections and paging, or the query parameters as an array.
     */
    public function __construct(Query|array $query = [])
    {
        parent::__construct($query);
    }

    public function resolveEndpoint(): string
    {
        return '/v1/computer-extension-attributes/templates';
    }
}
