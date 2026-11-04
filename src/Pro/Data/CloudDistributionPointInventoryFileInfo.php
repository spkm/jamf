<?php

namespace spkm\Jamf\Pro\Data;

use spkm\Jamf\Data\Data;

/**
 * A CloudDistributionPointInventoryFileInfo record from the Jamf Pro API.
 */
readonly class CloudDistributionPointInventoryFileInfo extends Data
{
    /**
     * @param  array<string, mixed>  $extra  Fields Jamf sent that the model has no property for.
     */
    public function __construct(
        /** A unique identifier for the cloud distribution point inventory file table. */
        public ?string $id = null,
        /** A unique identifier for the cloud distribution point inventory file and cloud distribution point tables.This ID is used to reference a specific inventory resource within the system. */
        public ?string $inventoryId = null,
        /** The type of the inventory file. This field indicates whether the file is related to a package, mobile device app, or an ebook. */
        public ?string $type = null,
        /** The name of the inventory file. This could be the name of a package, a mobile device app, or an ebook file, depending on the file type. The name should match the actual file or package name as stored... */
        public ?string $fileName = null,
        /** A unique identifier for each file type (package, ebook, or mobile device app). This ID is used to construct the URL for accessing or navigating to the specific resource related to the file type. */
        public ?string $fileObjectId = null,
        /** The category assigned to the inventory file (package, ebook, or mobile device app) during creation. This helps group and organize files based on their type or purpose, such as security software or... */
        public ?string $category = null,
        /** The current status of the inventory file, indicating the progress or outcome of the file's upload process.It reflects whether the file is ready for use, still being processed, or has encountered an... */
        public ?string $status = null,
        public array $extra = [],
    ) {}
}
