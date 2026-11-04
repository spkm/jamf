<?php

namespace spkm\Jamf\Pro\Data;

use Illuminate\Support\Collection;
use spkm\Jamf\Data\Data;

/**
 * A SessionHistoryItemDetails record from the Jamf Pro API.
 */
readonly class SessionHistoryItemDetails extends Data
{
    protected const LISTS = ['fileTransferItemList' => FileTransferItem::class];

    /**
     * @param  Collection<int, FileTransferItem>|null  $fileTransferItemList
     * @param  array<string, mixed>  $extra  Fields Jamf sent that the model has no property for.
     */
    public function __construct(
        public ?Collection $fileTransferItemList = null,
        public array $extra = [],
    ) {}
}
