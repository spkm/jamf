<?php

namespace spkm\Jamf\Pro\Data;

use spkm\Jamf\Data\Data;

/**
 * A ComputerExtensionAttributeTemplates record from the Jamf Pro API.
 */
readonly class ComputerExtensionAttributeTemplates extends Data
{
    /**
     * @param  array<string, mixed>  $extra  Fields Jamf sent that the model has no property for.
     */
    public function __construct(
        /** Unique Id for Computer Extension Attribute Template. */
        public ?string $templateId = null,
        /** Template display name of the extension attribute. */
        public ?string $templateName = null,
        /** Template category name of the extension attribute. */
        public ?string $templateCategoryName = null,
        public array $extra = [],
    ) {}
}
