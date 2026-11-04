<?php

namespace spkm\Jamf\Pro\Data;

use spkm\Jamf\Data\Data;

/**
 * A LogFlushingTaskV1 record from the Jamf Pro API.
 */
readonly class LogFlushingTaskV1 extends Data
{
    /**
     * @param  array<string, mixed>  $extra  Fields Jamf sent that the model has no property for.
     */
    public function __construct(
        /** The unique identifier of the log flushing task */
        public ?string $id = null,
        /** The qualifier of the retention policy */
        public ?string $qualifier = null,
        /** The period beyond which data will be flushed */
        public ?int $retentionPeriod = null,
        /** The unit of the retention period (eg: DAY, WEEK, MONTH, YEAR) */
        public ?string $retentionPeriodUnit = null,
        /** The state of the task (eg: RUNNING, SUCCESS, FAILED, CANCELLED) */
        public ?string $state = null,
        public array $extra = [],
    ) {}
}
