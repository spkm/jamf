<?php

namespace spkm\Jamf\Pro\Data;

use spkm\Jamf\Data\Data;

/**
 * A MobileDeviceExtensionAttributes record from the Jamf Pro API.
 */
readonly class MobileDeviceExtensionAttributes extends Data
{
    /**
     * @param  list<string>|null  $popupMenuChoices
     * @param  array<string, mixed>  $extra  Fields Jamf sent that the model has no property for.
     */
    public function __construct(
        /** Unique Id for Mobile Device Extension Attribute. */
        public ?string $id = null,
        /** Display name for the extension attribute. */
        public ?string $name = null,
        /** Description for the extension attribute. */
        public ?string $description = null,
        /** Type of data being collected. */
        public ?string $dataType = null,
        /** Category in which to display the extension attribute in Jamf Pro. */
        public ?string $inventoryDisplayType = null,
        /** Extension attributes collect inventory data by using an input type.The type of the Input used to populate the extension attribute. */
        public ?string $inputType = null,
        /** When added with list of choices while creating mobile device extension attributes these Pop-up menu can be displayed in inventory information. User can choose a value from the pop-up menu list when... */
        public ?array $popupMenuChoices = null,
        /** Directory Service attribute use to populate the extension attribute. Required when inputType is "DIRECTORY_SERVICE_ATTRIBUTE_MAPPING" */
        public ?string $ldapAttributeMapping = null,
        /** Collect multiple values for this extension attribute. ldapExtensionAttributeAllowed is disabled by default, only for inputType 'DIRECTORY_SERVICE_ATTRIBUTE_MAPPING' it can be enabled. It's value... */
        public ?bool $ldapExtensionAttributeAllowed = null,
        public array $extra = [],
    ) {}
}
