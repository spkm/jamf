<?php

namespace spkm\Jamf\Pro\Data;

use spkm\Jamf\Data\Data;

/**
 * object representation of Self Service settings regarding user interaction
 */
readonly class SelfServiceInteractionSettings extends Data
{
    /**
     * @param  array<string, mixed>  $extra  Fields Jamf sent that the model has no property for.
     */
    public function __construct(
        /** global Self Service setting for if notifications are on or off */
        public ?bool $notificationsEnabled = null,
        /** whether users should be notified they need to approve organization's MDM profile */
        public ?bool $alertUserApprovedMdm = null,
        /** the default landing page in Self Service */
        public ?string $defaultLandingPage = null,
        /** id for the default home category in Self Service */
        public ?int $defaultHomeCategoryId = null,
        /** renamed string for bookmarks if the admin wishes */
        public ?string $bookmarksName = null,
        public array $extra = [],
    ) {}
}
