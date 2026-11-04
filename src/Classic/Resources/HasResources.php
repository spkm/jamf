<?php

namespace spkm\Jamf\Classic\Resources;

/**
 * A resource for every group of endpoints in the Classic API, on the Classic connector (Jamf::classic()).
 */
trait HasResources
{
    /**
     * The accounts endpoints (/JSSResource/accounts).
     */
    public function accounts(): AccountsResource
    {
        return new AccountsResource($this);
    }

    /**
     * The activationcode endpoints (/JSSResource/activationcode).
     */
    public function activationCode(): ActivationCodeResource
    {
        return new ActivationCodeResource($this);
    }

    /**
     * The advancedcomputersearches endpoints (/JSSResource/advancedcomputersearches).
     */
    public function advancedComputerSearches(): AdvancedComputerSearchesResource
    {
        return new AdvancedComputerSearchesResource($this);
    }

    /**
     * The advancedmobiledevicesearches endpoints (/JSSResource/advancedmobiledevicesearches).
     */
    public function advancedMobileDeviceSearches(): AdvancedMobileDeviceSearchesResource
    {
        return new AdvancedMobileDeviceSearchesResource($this);
    }

    /**
     * The advancedusersearches endpoints (/JSSResource/advancedusersearches).
     */
    public function advancedUserSearches(): AdvancedUserSearchesResource
    {
        return new AdvancedUserSearchesResource($this);
    }

    /**
     * The allowedfileextensions endpoints (/JSSResource/allowedfileextensions).
     */
    public function allowedFileExtensions(): AllowedFileExtensionsResource
    {
        return new AllowedFileExtensionsResource($this);
    }

    /**
     * The buildings endpoints (/JSSResource/buildings).
     */
    public function buildings(): BuildingsResource
    {
        return new BuildingsResource($this);
    }

    /**
     * The categories endpoints (/JSSResource/categories).
     */
    public function categories(): CategoriesResource
    {
        return new CategoriesResource($this);
    }

    /**
     * The classes endpoints (/JSSResource/classes).
     */
    public function classes(): ClassesResource
    {
        return new ClassesResource($this);
    }

    /**
     * The commandflush endpoints (/JSSResource/commandflush).
     */
    public function commandFlush(): CommandFlushResource
    {
        return new CommandFlushResource($this);
    }

    /**
     * The computerapplicationusage endpoints (/JSSResource/computerapplicationusage).
     */
    public function computerApplicationUsage(): ComputerApplicationUsageResource
    {
        return new ComputerApplicationUsageResource($this);
    }

    /**
     * The computerapplications endpoints (/JSSResource/computerapplications).
     */
    public function computerApplications(): ComputerApplicationsResource
    {
        return new ComputerApplicationsResource($this);
    }

    /**
     * The computercheckin endpoints (/JSSResource/computercheckin).
     */
    public function computerCheckIn(): ComputerCheckInResource
    {
        return new ComputerCheckInResource($this);
    }

    /**
     * The computercommands endpoints (/JSSResource/computercommands).
     */
    public function computerCommands(): ComputerCommandsResource
    {
        return new ComputerCommandsResource($this);
    }

    /**
     * The computerextensionattributes endpoints (/JSSResource/computerextensionattributes).
     */
    public function computerExtensionAttributes(): ComputerExtensionAttributesResource
    {
        return new ComputerExtensionAttributesResource($this);
    }

    /**
     * The computergroups endpoints (/JSSResource/computergroups).
     */
    public function computerGroups(): ComputerGroupsResource
    {
        return new ComputerGroupsResource($this);
    }

    /**
     * The computerhardwaresoftwarereports endpoints (/JSSResource/computerhardwaresoftwarereports).
     */
    public function computerHardwareSoftwareReports(): ComputerHardwareSoftwareReportsResource
    {
        return new ComputerHardwareSoftwareReportsResource($this);
    }

    /**
     * The computerhistory endpoints (/JSSResource/computerhistory).
     */
    public function computerHistory(): ComputerHistoryResource
    {
        return new ComputerHistoryResource($this);
    }

    /**
     * The computerinventorycollection endpoints (/JSSResource/computerinventorycollection).
     */
    public function computerInventoryCollection(): ComputerInventoryCollectionResource
    {
        return new ComputerInventoryCollectionResource($this);
    }

    /**
     * The computerinvitations endpoints (/JSSResource/computerinvitations).
     */
    public function computerInvitations(): ComputerInvitationsResource
    {
        return new ComputerInvitationsResource($this);
    }

    /**
     * The computermanagement endpoints (/JSSResource/computermanagement).
     */
    public function computerManagement(): ComputerManagementResource
    {
        return new ComputerManagementResource($this);
    }

    /**
     * The computerreports endpoints (/JSSResource/computerreports).
     */
    public function computerReports(): ComputerReportsResource
    {
        return new ComputerReportsResource($this);
    }

    /**
     * The computers endpoints (/JSSResource/computers).
     */
    public function computers(): ComputersResource
    {
        return new ComputersResource($this);
    }

    /**
     * The departments endpoints (/JSSResource/departments).
     */
    public function departments(): DepartmentsResource
    {
        return new DepartmentsResource($this);
    }

    /**
     * The directorybindings endpoints (/JSSResource/directorybindings).
     */
    public function directoryBindings(): DirectoryBindingsResource
    {
        return new DirectoryBindingsResource($this);
    }

    /**
     * The diskencryptionconfigurations endpoints (/JSSResource/diskencryptionconfigurations).
     */
    public function diskEncryptionConfigurations(): DiskEncryptionConfigurationsResource
    {
        return new DiskEncryptionConfigurationsResource($this);
    }

    /**
     * The distributionpoints endpoints (/JSSResource/distributionpoints).
     */
    public function distributionPoints(): DistributionPointsResource
    {
        return new DistributionPointsResource($this);
    }

    /**
     * The dockitems endpoints (/JSSResource/dockitems).
     */
    public function dockItems(): DockItemsResource
    {
        return new DockItemsResource($this);
    }

    /**
     * The ebooks endpoints (/JSSResource/ebooks).
     */
    public function ebooks(): EbooksResource
    {
        return new EbooksResource($this);
    }

    /**
     * The fileuploads endpoints (/JSSResource/fileuploads).
     */
    public function fileUploads(): FileUploadsResource
    {
        return new FileUploadsResource($this);
    }

    /**
     * The gsxconnection endpoints (/JSSResource/gsxconnection).
     */
    public function gsxConnection(): GsxConnectionResource
    {
        return new GsxConnectionResource($this);
    }

    /**
     * The healthcarelistenerrule endpoints (/JSSResource/healthcarelistenerrule).
     */
    public function healthcareListenerRules(): HealthcareListenerRulesResource
    {
        return new HealthcareListenerRulesResource($this);
    }

    /**
     * The healthcarelistener endpoints (/JSSResource/healthcarelistener).
     */
    public function healthcareListeners(): HealthcareListenersResource
    {
        return new HealthcareListenersResource($this);
    }

    /**
     * The ibeacons endpoints (/JSSResource/ibeacons).
     */
    public function ibeacons(): IBeaconsResource
    {
        return new IBeaconsResource($this);
    }

    /**
     * The infrastructuremanager endpoints (/JSSResource/infrastructuremanager).
     */
    public function infrastructureManagers(): InfrastructureManagersResource
    {
        return new InfrastructureManagersResource($this);
    }

    /**
     * The jsonwebtokenconfigurations endpoints (/JSSResource/jsonwebtokenconfigurations).
     */
    public function jsonWebTokenConfigurations(): JsonWebTokenConfigurationsResource
    {
        return new JsonWebTokenConfigurationsResource($this);
    }

    /**
     * The jssuser endpoints (/JSSResource/jssuser).
     */
    public function jssUser(): JssUserResource
    {
        return new JssUserResource($this);
    }

    /**
     * The ldapservers endpoints (/JSSResource/ldapservers).
     */
    public function ldapServers(): LdapServersResource
    {
        return new LdapServersResource($this);
    }

    /**
     * The licensedsoftware endpoints (/JSSResource/licensedsoftware).
     */
    public function licensedSoftware(): LicensedSoftwareResource
    {
        return new LicensedSoftwareResource($this);
    }

    /**
     * The logflush endpoints (/JSSResource/logflush).
     */
    public function logFlush(): LogFlushResource
    {
        return new LogFlushResource($this);
    }

    /**
     * The macapplications endpoints (/JSSResource/macapplications).
     */
    public function macApplications(): MacApplicationsResource
    {
        return new MacApplicationsResource($this);
    }

    /**
     * The mobiledeviceapplications endpoints (/JSSResource/mobiledeviceapplications).
     */
    public function mobileDeviceApplications(): MobileDeviceApplicationsResource
    {
        return new MobileDeviceApplicationsResource($this);
    }

    /**
     * The mobiledevicecommands endpoints (/JSSResource/mobiledevicecommands).
     */
    public function mobileDeviceCommands(): MobileDeviceCommandsResource
    {
        return new MobileDeviceCommandsResource($this);
    }

    /**
     * The mobiledeviceconfigurationprofiles endpoints (/JSSResource/mobiledeviceconfigurationprofiles).
     */
    public function mobileDeviceConfigurationProfiles(): MobileDeviceConfigurationProfilesResource
    {
        return new MobileDeviceConfigurationProfilesResource($this);
    }

    /**
     * The mobiledeviceenrollmentprofiles endpoints (/JSSResource/mobiledeviceenrollmentprofiles).
     */
    public function mobileDeviceEnrollmentProfiles(): MobileDeviceEnrollmentProfilesResource
    {
        return new MobileDeviceEnrollmentProfilesResource($this);
    }

    /**
     * The mobiledeviceextensionattributes endpoints (/JSSResource/mobiledeviceextensionattributes).
     */
    public function mobileDeviceExtensionAttributes(): MobileDeviceExtensionAttributesResource
    {
        return new MobileDeviceExtensionAttributesResource($this);
    }

    /**
     * The mobiledevicegroups endpoints (/JSSResource/mobiledevicegroups).
     */
    public function mobileDeviceGroups(): MobileDeviceGroupsResource
    {
        return new MobileDeviceGroupsResource($this);
    }

    /**
     * The mobiledevicehistory endpoints (/JSSResource/mobiledevicehistory).
     */
    public function mobileDeviceHistory(): MobileDeviceHistoryResource
    {
        return new MobileDeviceHistoryResource($this);
    }

    /**
     * The mobiledeviceinvitations endpoints (/JSSResource/mobiledeviceinvitations).
     */
    public function mobileDeviceInvitations(): MobileDeviceInvitationsResource
    {
        return new MobileDeviceInvitationsResource($this);
    }

    /**
     * The mobiledeviceprovisioningprofiles endpoints (/JSSResource/mobiledeviceprovisioningprofiles).
     */
    public function mobileDeviceProvisioningProfiles(): MobileDeviceProvisioningProfilesResource
    {
        return new MobileDeviceProvisioningProfilesResource($this);
    }

    /**
     * The mobiledevices endpoints (/JSSResource/mobiledevices).
     */
    public function mobileDevices(): MobileDevicesResource
    {
        return new MobileDevicesResource($this);
    }

    /**
     * The networksegments endpoints (/JSSResource/networksegments).
     */
    public function networkSegments(): NetworkSegmentsResource
    {
        return new NetworkSegmentsResource($this);
    }

    /**
     * The osxconfigurationprofiles endpoints (/JSSResource/osxconfigurationprofiles).
     */
    public function osxConfigurationProfiles(): OsxConfigurationProfilesResource
    {
        return new OsxConfigurationProfilesResource($this);
    }

    /**
     * The packages endpoints (/JSSResource/packages).
     */
    public function packages(): PackagesResource
    {
        return new PackagesResource($this);
    }

    /**
     * The patchavailabletitles endpoints (/JSSResource/patchavailabletitles).
     */
    public function patchAvailableTitles(): PatchAvailableTitlesResource
    {
        return new PatchAvailableTitlesResource($this);
    }

    /**
     * The patchexternalsources endpoints (/JSSResource/patchexternalsources).
     */
    public function patchExternalSources(): PatchExternalSourcesResource
    {
        return new PatchExternalSourcesResource($this);
    }

    /**
     * The patchinternalsources endpoints (/JSSResource/patchinternalsources).
     */
    public function patchInternalSources(): PatchInternalSourcesResource
    {
        return new PatchInternalSourcesResource($this);
    }

    /**
     * The patchpolicies endpoints (/JSSResource/patchpolicies).
     */
    public function patchPolicies(): PatchPoliciesResource
    {
        return new PatchPoliciesResource($this);
    }

    /**
     * The patchreports endpoints (/JSSResource/patchreports).
     */
    public function patchReports(): PatchReportsResource
    {
        return new PatchReportsResource($this);
    }

    /**
     * The patchsoftwaretitles endpoints (/JSSResource/patchsoftwaretitles).
     */
    public function patchSoftwareTitles(): PatchSoftwareTitlesResource
    {
        return new PatchSoftwareTitlesResource($this);
    }

    /**
     * The patches endpoints (/JSSResource/patches).
     */
    public function patches(): PatchesResource
    {
        return new PatchesResource($this);
    }

    /**
     * The peripheraltypes endpoints (/JSSResource/peripheraltypes).
     */
    public function peripheralTypes(): PeripheralTypesResource
    {
        return new PeripheralTypesResource($this);
    }

    /**
     * The peripherals endpoints (/JSSResource/peripherals).
     */
    public function peripherals(): PeripheralsResource
    {
        return new PeripheralsResource($this);
    }

    /**
     * The policies endpoints (/JSSResource/policies).
     */
    public function policies(): PoliciesResource
    {
        return new PoliciesResource($this);
    }

    /**
     * The printers endpoints (/JSSResource/printers).
     */
    public function printers(): PrintersResource
    {
        return new PrintersResource($this);
    }

    /**
     * The removablemacaddresses endpoints (/JSSResource/removablemacaddresses).
     */
    public function removableMacAddresses(): RemovableMacAddressesResource
    {
        return new RemovableMacAddressesResource($this);
    }

    /**
     * The restrictedsoftware endpoints (/JSSResource/restrictedsoftware).
     */
    public function restrictedSoftware(): RestrictedSoftwareResource
    {
        return new RestrictedSoftwareResource($this);
    }

    /**
     * The savedsearches endpoints (/JSSResource/savedsearches).
     */
    public function savedSearches(): SavedSearchesResource
    {
        return new SavedSearchesResource($this);
    }

    /**
     * The scripts endpoints (/JSSResource/scripts).
     */
    public function scripts(): ScriptsResource
    {
        return new ScriptsResource($this);
    }

    /**
     * The sites endpoints (/JSSResource/sites).
     */
    public function sites(): SitesResource
    {
        return new SitesResource($this);
    }

    /**
     * The smtpserver endpoints (/JSSResource/smtpserver).
     */
    public function smtpServer(): SmtpServerResource
    {
        return new SmtpServerResource($this);
    }

    /**
     * The softwareupdateservers endpoints (/JSSResource/softwareupdateservers).
     */
    public function softwareUpdateServers(): SoftwareUpdateServersResource
    {
        return new SoftwareUpdateServersResource($this);
    }

    /**
     * The userextensionattributes endpoints (/JSSResource/userextensionattributes).
     */
    public function userExtensionAttributes(): UserExtensionAttributesResource
    {
        return new UserExtensionAttributesResource($this);
    }

    /**
     * The usergroups endpoints (/JSSResource/usergroups).
     */
    public function userGroups(): UserGroupsResource
    {
        return new UserGroupsResource($this);
    }

    /**
     * The users endpoints (/JSSResource/users).
     */
    public function users(): UsersResource
    {
        return new UsersResource($this);
    }

    /**
     * The vppaccounts endpoints (/JSSResource/vppaccounts).
     */
    public function vppAccounts(): VppAccountsResource
    {
        return new VppAccountsResource($this);
    }

    /**
     * The vppassignments endpoints (/JSSResource/vppassignments).
     */
    public function vppAssignments(): VppAssignmentsResource
    {
        return new VppAssignmentsResource($this);
    }

    /**
     * The vppinvitations endpoints (/JSSResource/vppinvitations).
     */
    public function vppInvitations(): VppInvitationsResource
    {
        return new VppInvitationsResource($this);
    }

    /**
     * The webhooks endpoints (/JSSResource/webhooks).
     */
    public function webhooks(): WebhooksResource
    {
        return new WebhooksResource($this);
    }
}
