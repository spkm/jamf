<?php

namespace spkm\Jamf\Pro\Data;

use spkm\Jamf\Data\Data;

/**
 * Ldap Cloud Identity Provider conection pool statistics
 */
readonly class CloudLdapConnectionPoolStatistics extends Data
{
    /**
     * @param  array<string, mixed>  $extra  Fields Jamf sent that the model has no property for.
     */
    public function __construct(
        public ?int $numConnectionsClosedDefunct = null,
        public ?int $numConnectionsClosedExpired = null,
        public ?int $numConnectionsClosedUnneeded = null,
        public ?int $numFailedCheckouts = null,
        public ?int $numFailedConnectionAttempts = null,
        public ?int $numReleasedValid = null,
        public ?int $numSuccessfulCheckouts = null,
        public ?int $numSuccessfulCheckoutsNewConnection = null,
        public ?int $numSuccessfulConnectionAttempts = null,
        public ?int $maximumAvailableConnections = null,
        public ?int $numSuccessfulCheckoutsWithoutWaiting = null,
        public ?int $numSuccessfulCheckoutsAfterWaiting = null,
        public ?int $numAvailableConnections = null,
        public array $extra = [],
    ) {}
}
