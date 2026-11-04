<?php

namespace spkm\Jamf\Pro\Data;

use spkm\Jamf\Data\Data;

/**
 * Response that contains information about connection configuration for Team Viewer
 */
readonly class ConnectionConfigurationResponse extends Data
{
    /**
     * @param  array<string, mixed>  $extra  Fields Jamf sent that the model has no property for.
     */
    public function __construct(
        /** An identifier of connection configuration for Team Viewer Remote Administration */
        public ?string $id = null,
        /** An identifier of a site which Team Viewer Remote Administration is configured on */
        public ?string $siteId = null,
        /** Name for Team Viewer Connection Configuration */
        public ?string $displayName = null,
        /** Describes if Team Viewer connection is enabled or disabled */
        public ?bool $enabled = null,
        /** Number of minutes before the session expires */
        public ?int $sessionTimeout = null,
        public array $extra = [],
    ) {}
}
