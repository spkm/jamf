<?php

namespace spkm\Jamf\Pro\Data;

use spkm\Jamf\Data\Data;

/**
 * A ManagedSoftwareUpdatePlanToggleStatus record from the Jamf Pro API.
 */
readonly class ManagedSoftwareUpdatePlanToggleStatus extends Data
{
    /**
     * @param  array<string, mixed>  $extra  Fields Jamf sent that the model has no property for.
     */
    public function __construct(
        /** The local server time when the toggle was initiated. Null if state is NEVER_RAN */
        public ?string $startTime = null,
        /** The local server time when the toggle was completed. Null if state is NEVER_RAN */
        public ?string $endTime = null,
        /** Duration in seconds between the start time and end time. "Now" is used when end time is null. Null if state is NEVER_RAN */
        public ?int $elapsedTime = null,
        /** The current state of the toggle */
        public ?string $state = null,
        /** The total number of records that will be deleted */
        public ?int $totalRecords = null,
        /** The total number of records that have been deleted */
        public ?int $processedRecords = null,
        /** The percentage between total and completed records. */
        public ?float $percentComplete = null,
        /** Pretty print of total, processed, and percentage complete */
        public ?string $formattedPercentComplete = null,
        /** Troubleshooting - The exit status code from the toggle processing job. "Unknown" will return when the toggle is running. */
        public ?string $exitState = null,
        /** Troubleshooting - The exit message of the toggle job if it encounters an exception while running. Nominal return is an empty string */
        public ?string $exitMessage = null,
        public array $extra = [],
    ) {}
}
