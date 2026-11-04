<?php

namespace spkm\Jamf\Pro\Data;

use spkm\Jamf\Data\Data;

/**
 * A DistributionPoint record from the Jamf Pro API.
 */
readonly class DistributionPoint extends Data
{
    protected const HIDDEN = ['sshPassword', 'readWritePassword', 'readOnlyPassword', 'httpsPassword'];

    /**
     * @param  array<string, mixed>  $extra  Fields Jamf sent that the model has no property for.
     */
    public function __construct(
        public ?string $id = null,
        public ?string $name = null,
        public ?string $serverName = null,
        public ?bool $principal = null,
        public ?string $backupDistributionPointId = null,
        public ?string $sshUsername = null,
        public ?string $sshPassword = null,
        public ?string $localPathToShare = null,
        /** Specify the type of connection , Either of fileSharingConnectionType (or) https connection type needs to be enabled using httpsEnabled for a distribution point to be created. */
        public ?string $fileSharingConnectionType = null,
        /** Required if fileSharingConnectionType is either AFP (or) SMB */
        public ?string $shareName = null,
        public ?string $workgroup = null,
        /** Required if fileSharingConnectionType is either AFP (or) SMB */
        public ?int $port = null,
        /** Required if fileSharingConnectionType is either AFP (or) SMB */
        public ?string $readWriteUsername = null,
        /** Required if fileSharingConnectionType is either AFP (or) SMB */
        public ?string $readWritePassword = null,
        /** Required if fileSharingConnectionType is either AFP (or) SMB */
        public ?string $readOnlyUsername = null,
        /** Required if fileSharingConnectionType is either AFP (or) SMB */
        public ?string $readOnlyPassword = null,
        /** Allow downloads over HTTPS - requires installation of a valid SSL certificate */
        public ?bool $httpsEnabled = null,
        /** Port number of the server - required if HTTPS enabled */
        public ?int $httpsPort = null,
        /** Path to the share (e.g. if the share is accessible at http://192.168.10.10/JamfShare, the context is "JamfShare") - required if HTTPS enabled */
        public ?string $httpsContext = null,
        /** Type of authentication required to download files from the distribution point - required if HTTPS enabled */
        public ?string $httpsSecurityType = null,
        /** Required if httpsSecurityType is USERNAME_PASSWORD */
        public ?string $httpsUsername = null,
        /** Required if httpsSecurityType is USERNAME_PASSWORD */
        public ?string $httpsPassword = null,
        /** This is used to configure load balancing on the backup distribution point. Cannot be enabled when the backup distribution point configured is cloud. */
        public ?bool $enableLoadBalancing = null,
        public array $extra = [],
    ) {}
}
