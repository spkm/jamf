<?php

use spkm\Jamf\Classic\Requests\Accounts\CreateGroupByIdRequest;
use spkm\Jamf\Classic\Requests\Accounts\CreateUserByIdRequest as AccountsCreateUserByIdRequest;
use spkm\Jamf\Classic\Requests\Accounts\DeleteGroupByIdRequest;
use spkm\Jamf\Classic\Requests\Accounts\DeleteUserByIdRequest as AccountsDeleteUserByIdRequest;
use spkm\Jamf\Classic\Requests\Accounts\FindAccountsRequest;
use spkm\Jamf\Classic\Requests\Accounts\FindGroupsByIdRequest;
use spkm\Jamf\Classic\Requests\Accounts\FindGroupsByNameRequest;
use spkm\Jamf\Classic\Requests\Accounts\FindUsersByIdRequest as AccountsFindUsersByIdRequest;
use spkm\Jamf\Classic\Requests\Accounts\FindUsersByNameRequest as AccountsFindUsersByNameRequest;
use spkm\Jamf\Classic\Requests\Accounts\UpdateGroupByIdRequest;
use spkm\Jamf\Classic\Requests\Accounts\UpdateUserByIdRequest as AccountsUpdateUserByIdRequest;
use spkm\Jamf\Classic\Requests\ActivationCode\FindactivationcodeRequest;
use spkm\Jamf\Classic\Requests\ActivationCode\UpdateActivationCodeRequest;
use spkm\Jamf\Classic\Requests\AdvancedComputerSearches\CreateAdvancedComputerSearchByIdRequest;
use spkm\Jamf\Classic\Requests\AdvancedComputerSearches\DeleteAdvancedComputerSearchByIdRequest;
use spkm\Jamf\Classic\Requests\AdvancedComputerSearches\FindAdvancedComputerSearchesByIdRequest;
use spkm\Jamf\Classic\Requests\AdvancedComputerSearches\FindAdvancedComputerSearchesRequest;
use spkm\Jamf\Classic\Requests\AdvancedComputerSearches\FindComputerSearchesByNameRequest;
use spkm\Jamf\Classic\Requests\AdvancedComputerSearches\UpdateAdvancedComputerSearchByIdRequest;
use spkm\Jamf\Classic\Requests\AdvancedMobileDeviceSearches\CreateAdvancedMobileDeviceSearchByIdRequest;
use spkm\Jamf\Classic\Requests\AdvancedMobileDeviceSearches\DeleteAdvancedMobileDeviceSearchByIdRequest;
use spkm\Jamf\Classic\Requests\AdvancedMobileDeviceSearches\FindAdvancedMobileDeviceSearchesByIdRequest;
use spkm\Jamf\Classic\Requests\AdvancedMobileDeviceSearches\FindAdvancedMobileDeviceSearchesRequest;
use spkm\Jamf\Classic\Requests\AdvancedMobileDeviceSearches\FindMobileDeviceSearchesByNameRequest;
use spkm\Jamf\Classic\Requests\AdvancedMobileDeviceSearches\UpdateAdvancedMobileDeviceSearchByIdRequest;
use spkm\Jamf\Classic\Requests\AdvancedUserSearches\CreateAdvancedUserSearchByIdRequest;
use spkm\Jamf\Classic\Requests\AdvancedUserSearches\DeleteAdvancedUserSearchByIdRequest;
use spkm\Jamf\Classic\Requests\AdvancedUserSearches\FindAdvancedUserSearchesByIdRequest;
use spkm\Jamf\Classic\Requests\AdvancedUserSearches\FindAdvancedUserSearchesRequest;
use spkm\Jamf\Classic\Requests\AdvancedUserSearches\FindUserSearchesByNameRequest;
use spkm\Jamf\Classic\Requests\AdvancedUserSearches\UpdateAdvancedUserSearchByIdRequest;
use spkm\Jamf\Classic\Requests\AllowedFileExtensions\CreateAllowedFileExtensionByIdRequest;
use spkm\Jamf\Classic\Requests\AllowedFileExtensions\DeleteAllowedFileExtensionByIdRequest;
use spkm\Jamf\Classic\Requests\AllowedFileExtensions\FindAllowedFileExtensionByIdRequest;
use spkm\Jamf\Classic\Requests\AllowedFileExtensions\FindAllowedFileExtensionByNameRequest;
use spkm\Jamf\Classic\Requests\AllowedFileExtensions\FindAllowedFileExtensionRequest;
use spkm\Jamf\Classic\Requests\Buildings\CreateBuildingByIdRequest;
use spkm\Jamf\Classic\Requests\Buildings\DeleteBuildingByIdRequest;
use spkm\Jamf\Classic\Requests\Buildings\FindBuildingsByIdRequest;
use spkm\Jamf\Classic\Requests\Buildings\FindBuildingsByNameRequest;
use spkm\Jamf\Classic\Requests\Buildings\FindBuildingsRequest;
use spkm\Jamf\Classic\Requests\Buildings\UpdateBuildingByIdRequest;
use spkm\Jamf\Classic\Requests\Categories\CreateCategoryByIdRequest;
use spkm\Jamf\Classic\Requests\Categories\DeleteCategoryByIdRequest;
use spkm\Jamf\Classic\Requests\Categories\FindCategoriesByIdRequest;
use spkm\Jamf\Classic\Requests\Categories\FindCategoriesByNameRequest;
use spkm\Jamf\Classic\Requests\Categories\FindCategoriesRequest;
use spkm\Jamf\Classic\Requests\Categories\UpdateCategoryByIdRequest;
use spkm\Jamf\Classic\Requests\Classes\CreateClassByIdRequest;
use spkm\Jamf\Classic\Requests\Classes\DeleteClassByIdRequest;
use spkm\Jamf\Classic\Requests\Classes\FindClassesByIdRequest;
use spkm\Jamf\Classic\Requests\Classes\FindClassesByNameRequest;
use spkm\Jamf\Classic\Requests\Classes\FindClassesRequest;
use spkm\Jamf\Classic\Requests\Classes\UpdateClassByIdRequest;
use spkm\Jamf\Classic\Requests\CommandFlush\CommandFlushRequest;
use spkm\Jamf\Classic\Requests\CommandFlush\CreateCommandFlushWithIdAndStatusRequest;
use spkm\Jamf\Classic\Requests\ComputerApplications\FindComputerApplicationByNameAndVersionRequest;
use spkm\Jamf\Classic\Requests\ComputerApplications\FindComputerApplicationsByNameAndVersionAndInventoryRequest;
use spkm\Jamf\Classic\Requests\ComputerApplications\FindComputerApplicationsByNameInventoryRequest;
use spkm\Jamf\Classic\Requests\ComputerApplications\FindComputerApplicationsByNameRequest;
use spkm\Jamf\Classic\Requests\ComputerApplicationUsage\FindComputerApplicationUsageByIdRequest;
use spkm\Jamf\Classic\Requests\ComputerApplicationUsage\FindComputerApplicationUsageByMacAddressRequest;
use spkm\Jamf\Classic\Requests\ComputerApplicationUsage\FindComputerApplicationUsageByNameRequest;
use spkm\Jamf\Classic\Requests\ComputerApplicationUsage\FindComputerApplicationUsageBySerialRequest;
use spkm\Jamf\Classic\Requests\ComputerApplicationUsage\FindComputerApplicationUsageByUDIDRequest;
use spkm\Jamf\Classic\Requests\ComputerCheckIn\FindComputerCheckinRequest;
use spkm\Jamf\Classic\Requests\ComputerCheckIn\UpdateComputerCheckinRequest;
use spkm\Jamf\Classic\Requests\ComputerCommands\CreateComputerCommandByCommandAndActionRequest;
use spkm\Jamf\Classic\Requests\ComputerCommands\CreateComputerCommandByCommandRequest;
use spkm\Jamf\Classic\Requests\ComputerCommands\CreateComputerCommandByCommandShortcut1Request;
use spkm\Jamf\Classic\Requests\ComputerCommands\FindComputerCommandsByNameRequest;
use spkm\Jamf\Classic\Requests\ComputerCommands\FindComputerCommandsByUuidRequest;
use spkm\Jamf\Classic\Requests\ComputerCommands\FindComputerCommandsRequest;
use spkm\Jamf\Classic\Requests\ComputerCommands\FindComputerCommandStatusByUuidRequest;
use spkm\Jamf\Classic\Requests\ComputerExtensionAttributes\CreateComputerextensionattributeByIdRequest;
use spkm\Jamf\Classic\Requests\ComputerExtensionAttributes\DeleteComputerextensionattributeByIdRequest;
use spkm\Jamf\Classic\Requests\ComputerExtensionAttributes\FindComputerextensionattributesByIdRequest;
use spkm\Jamf\Classic\Requests\ComputerExtensionAttributes\FindComputerextensionattributesByNameRequest;
use spkm\Jamf\Classic\Requests\ComputerExtensionAttributes\FindComputerextensionattributesRequest;
use spkm\Jamf\Classic\Requests\ComputerExtensionAttributes\UpdateComputerextensionattributeByIdRequest;
use spkm\Jamf\Classic\Requests\ComputerGroups\CreateComputerGroupByIdRequest;
use spkm\Jamf\Classic\Requests\ComputerGroups\DeleteComputerGroupByIdRequest;
use spkm\Jamf\Classic\Requests\ComputerGroups\FindComputerGroupsByIdRequest;
use spkm\Jamf\Classic\Requests\ComputerGroups\FindComputerGroupsByNameRequest;
use spkm\Jamf\Classic\Requests\ComputerGroups\FindComputerGroupsRequest;
use spkm\Jamf\Classic\Requests\ComputerGroups\UpdateComputerGroupByIdRequest;
use spkm\Jamf\Classic\Requests\ComputerHardwareSoftwareReports\FindComputerHardwareSoftwareReportsByIdRequest;
use spkm\Jamf\Classic\Requests\ComputerHardwareSoftwareReports\FindComputerHardwareSoftwareReportsByMacAddressRequest;
use spkm\Jamf\Classic\Requests\ComputerHardwareSoftwareReports\FindComputerHardwareSoftwareReportsByNameRequest;
use spkm\Jamf\Classic\Requests\ComputerHardwareSoftwareReports\FindComputerHardwareSoftwareReportsBySerialRequest;
use spkm\Jamf\Classic\Requests\ComputerHardwareSoftwareReports\FindComputerHardwareSoftwareReportsByUDIDRequest;
use spkm\Jamf\Classic\Requests\ComputerHardwareSoftwareReports\FindComputerHistoryByIdSubsetRequest as ComputerHardwareSoftwareReportsFindComputerHistoryByIdSubsetRequest;
use spkm\Jamf\Classic\Requests\ComputerHistory\FindComputerHistoryByIdRequest;
use spkm\Jamf\Classic\Requests\ComputerHistory\FindComputerHistoryByIdSubsetRequest as ComputerHistoryFindComputerHistoryByIdSubsetRequest;
use spkm\Jamf\Classic\Requests\ComputerHistory\FindComputerHistoryByMacAddressRequest;
use spkm\Jamf\Classic\Requests\ComputerHistory\FindComputerHistoryByNameRequest;
use spkm\Jamf\Classic\Requests\ComputerHistory\FindComputerHistoryBySerialNumberRequest;
use spkm\Jamf\Classic\Requests\ComputerHistory\FindComputerHistoryByUDIDRequest;
use spkm\Jamf\Classic\Requests\ComputerInventoryCollection\FindcomputerinventorycollectionRequest;
use spkm\Jamf\Classic\Requests\ComputerInventoryCollection\UpdateComputerInventoryCollectionRequest;
use spkm\Jamf\Classic\Requests\ComputerInvitations\CreateComputerInvitationByIdRequest;
use spkm\Jamf\Classic\Requests\ComputerInvitations\DeleteComputerInvitationByIdRequest;
use spkm\Jamf\Classic\Requests\ComputerInvitations\FindComputerInvitationsByIdRequest;
use spkm\Jamf\Classic\Requests\ComputerInvitations\FindComputerInvitationsByInvitationRequest;
use spkm\Jamf\Classic\Requests\ComputerInvitations\FindComputerInvitationsByNameRequest;
use spkm\Jamf\Classic\Requests\ComputerInvitations\FindComputerInvitationsRequest;
use spkm\Jamf\Classic\Requests\ComputerManagement\FindComputerManagementByIdPatchFilterRequest;
use spkm\Jamf\Classic\Requests\ComputerManagement\FindComputerManagementByIdRequest;
use spkm\Jamf\Classic\Requests\ComputerManagement\FindComputerManagementByIdSubsetRequest;
use spkm\Jamf\Classic\Requests\ComputerManagement\FindComputerManagementByIdUsernameRequest;
use spkm\Jamf\Classic\Requests\ComputerManagement\FindComputerManagementByIdUsernameSubsetRequest;
use spkm\Jamf\Classic\Requests\ComputerManagement\FindComputerManagementByMacAddressRequest;
use spkm\Jamf\Classic\Requests\ComputerManagement\FindComputerManagementByNameRequest;
use spkm\Jamf\Classic\Requests\ComputerManagement\FindComputerManagementBySerialNumberRequest;
use spkm\Jamf\Classic\Requests\ComputerManagement\FindComputerManagementByUDIDRequest;
use spkm\Jamf\Classic\Requests\ComputerReports\FindComputeReportsByIdRequest;
use spkm\Jamf\Classic\Requests\ComputerReports\FindComputeReportsByNameRequest;
use spkm\Jamf\Classic\Requests\ComputerReports\FindComputerReportsRequest;
use spkm\Jamf\Classic\Requests\Computers\CreateComputerByIdRequest;
use spkm\Jamf\Classic\Requests\Computers\DeleteComputerByIdRequest;
use spkm\Jamf\Classic\Requests\Computers\FindComputersBasicRequest;
use spkm\Jamf\Classic\Requests\Computers\FindComputersByIdRequest;
use spkm\Jamf\Classic\Requests\Computers\FindComputersByIdSubsetRequest;
use spkm\Jamf\Classic\Requests\Computers\FindComputersByMacAddressRequest;
use spkm\Jamf\Classic\Requests\Computers\FindComputersByNameRequest;
use spkm\Jamf\Classic\Requests\Computers\FindComputersBySerialNumberRequest;
use spkm\Jamf\Classic\Requests\Computers\FindComputersByUDIDRequest;
use spkm\Jamf\Classic\Requests\Computers\FindComputersRequest;
use spkm\Jamf\Classic\Requests\Computers\FlushComputerExtensionAttributeDataRequest;
use spkm\Jamf\Classic\Requests\Computers\MatchComputersNamesRequest;
use spkm\Jamf\Classic\Requests\Computers\MatchComputersRequest;
use spkm\Jamf\Classic\Requests\Computers\UpdateComputerByIdRequest;
use spkm\Jamf\Classic\Requests\Departments\CreateDepartmentByIdRequest;
use spkm\Jamf\Classic\Requests\Departments\DeleteDepartmentByIdRequest;
use spkm\Jamf\Classic\Requests\Departments\FindDepartmentsByIdRequest;
use spkm\Jamf\Classic\Requests\Departments\FindDepartmentsByNameRequest;
use spkm\Jamf\Classic\Requests\Departments\FindDepartmentsRequest;
use spkm\Jamf\Classic\Requests\Departments\UpdateDepartmentByIdRequest;
use spkm\Jamf\Classic\Requests\DirectoryBindings\CreateDirectoryBindingByIdRequest;
use spkm\Jamf\Classic\Requests\DirectoryBindings\DeleteDirectoryBindingByIdRequest;
use spkm\Jamf\Classic\Requests\DirectoryBindings\FindDirectoryBindingsByIdRequest;
use spkm\Jamf\Classic\Requests\DirectoryBindings\FindDirectoryBindingsByNameRequest;
use spkm\Jamf\Classic\Requests\DirectoryBindings\FindDirectoryBindingsRequest;
use spkm\Jamf\Classic\Requests\DirectoryBindings\UpdateDirectoryBindingByIdRequest;
use spkm\Jamf\Classic\Requests\DiskEncryptionConfigurations\CreateDiskEncryptionConfigurationByIdRequest;
use spkm\Jamf\Classic\Requests\DiskEncryptionConfigurations\DeleteDiskEncryptionConfigurationByIdRequest;
use spkm\Jamf\Classic\Requests\DiskEncryptionConfigurations\FindDiskEncryptionConfigurationsByIdRequest;
use spkm\Jamf\Classic\Requests\DiskEncryptionConfigurations\FindDiskEncryptionConfigurationsByNameRequest;
use spkm\Jamf\Classic\Requests\DiskEncryptionConfigurations\FindDiskEncryptionConfigurationsRequest;
use spkm\Jamf\Classic\Requests\DiskEncryptionConfigurations\UpdateDiskEncryptionConfigurationByIdRequest;
use spkm\Jamf\Classic\Requests\DistributionPoints\CreateDistributionPointByIdRequest;
use spkm\Jamf\Classic\Requests\DistributionPoints\DeleteDistributionPointByIdRequest;
use spkm\Jamf\Classic\Requests\DistributionPoints\FindDistributionPointsByIdRequest;
use spkm\Jamf\Classic\Requests\DistributionPoints\FindDistributionPointsByNameRequest;
use spkm\Jamf\Classic\Requests\DistributionPoints\FindDistributionPointsRequest;
use spkm\Jamf\Classic\Requests\DistributionPoints\UpdateDistributionPointByIdRequest;
use spkm\Jamf\Classic\Requests\DockItems\CreateDockItemByIdRequest;
use spkm\Jamf\Classic\Requests\DockItems\DeleteDockItemByIdRequest;
use spkm\Jamf\Classic\Requests\DockItems\FindDockItemsByIdRequest;
use spkm\Jamf\Classic\Requests\DockItems\FindDockItemsByNameRequest;
use spkm\Jamf\Classic\Requests\DockItems\FindDockItemsRequest;
use spkm\Jamf\Classic\Requests\DockItems\UpdateDockItemByIdRequest;
use spkm\Jamf\Classic\Requests\Ebooks\CreateEBookByIdRequest;
use spkm\Jamf\Classic\Requests\Ebooks\DeleteEBookByIdRequest;
use spkm\Jamf\Classic\Requests\Ebooks\FindEBooksByIdRequest;
use spkm\Jamf\Classic\Requests\Ebooks\FindEBooksByNameRequest;
use spkm\Jamf\Classic\Requests\Ebooks\FindEBooksRequest;
use spkm\Jamf\Classic\Requests\Ebooks\FindEbookssByIdSubsetRequest;
use spkm\Jamf\Classic\Requests\Ebooks\UpdateEBookByIdRequest;
use spkm\Jamf\Classic\Requests\FileUploads\UploadFilesRequest;
use spkm\Jamf\Classic\Requests\GsxConnection\FindGSXConnectionRequest;
use spkm\Jamf\Classic\Requests\GsxConnection\UpdateGSXConnectionRequest;
use spkm\Jamf\Classic\Requests\HealthcareListenerRules\CreateHealthCareListenerRuleByIdRequest;
use spkm\Jamf\Classic\Requests\HealthcareListenerRules\FindHealthcareListenerRuleRequest;
use spkm\Jamf\Classic\Requests\HealthcareListenerRules\FindHealthcareListenerRulesByIdRequest;
use spkm\Jamf\Classic\Requests\HealthcareListenerRules\UpdateHealthCareListenerRuleByIdRequest;
use spkm\Jamf\Classic\Requests\HealthcareListeners\FindHealthcareListenerRequest;
use spkm\Jamf\Classic\Requests\HealthcareListeners\FindHealthcareListenersByIdRequest;
use spkm\Jamf\Classic\Requests\HealthcareListeners\UpdateHealthCareListenerByIdRequest;
use spkm\Jamf\Classic\Requests\IBeacons\CreateIBeaconByIdRequest;
use spkm\Jamf\Classic\Requests\IBeacons\DeleteIBeaconByIdRequest;
use spkm\Jamf\Classic\Requests\IBeacons\FindIBeaconsByIdRequest;
use spkm\Jamf\Classic\Requests\IBeacons\FindIBeaconsByNameRequest;
use spkm\Jamf\Classic\Requests\IBeacons\FindIBeaconsRequest;
use spkm\Jamf\Classic\Requests\IBeacons\UpdateIBeaconByIdRequest;
use spkm\Jamf\Classic\Requests\InfrastructureManagers\FindInfrastructureManagerByIdRequest;
use spkm\Jamf\Classic\Requests\InfrastructureManagers\FindInfrastructureManagerRequest;
use spkm\Jamf\Classic\Requests\InfrastructureManagers\UpdateInfrastructureManagerByIdRequest;
use spkm\Jamf\Classic\Requests\JsonWebTokenConfigurations\CreateJsonWebTokenConfigurationByIdRequest;
use spkm\Jamf\Classic\Requests\JsonWebTokenConfigurations\DeleteJsonWebTokenConfigurationByIdRequest;
use spkm\Jamf\Classic\Requests\JsonWebTokenConfigurations\FindJsonWebTokenConfigurationByIdRequest;
use spkm\Jamf\Classic\Requests\JsonWebTokenConfigurations\FindJsonWebTokenConfigurationsRequest;
use spkm\Jamf\Classic\Requests\JsonWebTokenConfigurations\UpdateJsonWebTokenConfigurationByIdRequest;
use spkm\Jamf\Classic\Requests\JssUser\FindjssuserRequest;
use spkm\Jamf\Classic\Requests\LdapServers\CreateLDAPServerByIdRequest;
use spkm\Jamf\Classic\Requests\LdapServers\DeleteLDAPServerByIdRequest;
use spkm\Jamf\Classic\Requests\LdapServers\FindLDAPServerGroupRequest;
use spkm\Jamf\Classic\Requests\LdapServers\FindLDAPServerGroupUserRequest;
use spkm\Jamf\Classic\Requests\LdapServers\FindLDAPServersByIdRequest;
use spkm\Jamf\Classic\Requests\LdapServers\FindLDAPServersByNameRequest;
use spkm\Jamf\Classic\Requests\LdapServers\FindLDAPServersRequest;
use spkm\Jamf\Classic\Requests\LdapServers\FindLDAPServerUserRequest;
use spkm\Jamf\Classic\Requests\LdapServers\UpdateLDAPServerByIdRequest;
use spkm\Jamf\Classic\Requests\LicensedSoftware\CreateLicensedSoftwareByIdRequest;
use spkm\Jamf\Classic\Requests\LicensedSoftware\DeleteLicensedSoftwareByIdRequest;
use spkm\Jamf\Classic\Requests\LicensedSoftware\FindLicensedSoftwareByIdRequest;
use spkm\Jamf\Classic\Requests\LicensedSoftware\FindLicensedSoftwareByNameRequest;
use spkm\Jamf\Classic\Requests\LicensedSoftware\FindLicensedSoftwareRequest;
use spkm\Jamf\Classic\Requests\LicensedSoftware\UpdateLicensedSoftwareByIdRequest;
use spkm\Jamf\Classic\Requests\LogFlush\CreateLogFlushForIntervalRequest;
use spkm\Jamf\Classic\Requests\LogFlush\CreateLogFlushWithIdAndIntervalRequest;
use spkm\Jamf\Classic\Requests\LogFlush\LogFlushRequest;
use spkm\Jamf\Classic\Requests\MacApplications\CreateMacappByIdRequest;
use spkm\Jamf\Classic\Requests\MacApplications\DeleteMacappByIdRequest;
use spkm\Jamf\Classic\Requests\MacApplications\FindMacappsByIdRequest;
use spkm\Jamf\Classic\Requests\MacApplications\FindMacappsByIdSubsetRequest;
use spkm\Jamf\Classic\Requests\MacApplications\FindMacappsByNameRequest;
use spkm\Jamf\Classic\Requests\MacApplications\FindMacappsRequest;
use spkm\Jamf\Classic\Requests\MacApplications\UpdateMacappByIdRequest;
use spkm\Jamf\Classic\Requests\MobileDeviceApplications\CreateMobileDeviceApplicationByIdRequest;
use spkm\Jamf\Classic\Requests\MobileDeviceApplications\DeleteMobileDeviceApplicationByIdRequest;
use spkm\Jamf\Classic\Requests\MobileDeviceApplications\FindMobileDeviceApplicationsByBundleIDandVersionRequest;
use spkm\Jamf\Classic\Requests\MobileDeviceApplications\FindMobileDeviceApplicationsByBundleIDRequest;
use spkm\Jamf\Classic\Requests\MobileDeviceApplications\FindMobileDeviceApplicationsByIdRequest;
use spkm\Jamf\Classic\Requests\MobileDeviceApplications\FindMobileDeviceApplicationsByNameRequest;
use spkm\Jamf\Classic\Requests\MobileDeviceApplications\FindMobileDeviceApplicationsRequest;
use spkm\Jamf\Classic\Requests\MobileDeviceApplications\FindMobileDeviceAppsByIdSubsetRequest;
use spkm\Jamf\Classic\Requests\MobileDeviceApplications\UpdateMobileDeviceApplicationByIdRequest;
use spkm\Jamf\Classic\Requests\MobileDeviceCommands\CreateMobileDeviceCommandByCommandRequest;
use spkm\Jamf\Classic\Requests\MobileDeviceCommands\CreateMobileDeviceCommandRequest;
use spkm\Jamf\Classic\Requests\MobileDeviceCommands\CreateMobileDeviceCommandURLRequest;
use spkm\Jamf\Classic\Requests\MobileDeviceCommands\CreateMobileDeviceNameCommandURLRequest;
use spkm\Jamf\Classic\Requests\MobileDeviceCommands\CreateMobileScheduleOSUpdateCommandURLRequest;
use spkm\Jamf\Classic\Requests\MobileDeviceCommands\CreateMobileScheduleOSUpdateCommandWithProductVersionURLRequest;
use spkm\Jamf\Classic\Requests\MobileDeviceCommands\FindMobileDeviceCommandsByCommandRequest;
use spkm\Jamf\Classic\Requests\MobileDeviceCommands\FindMobileDeviceCommandsByNameRequest;
use spkm\Jamf\Classic\Requests\MobileDeviceCommands\FindMobileDeviceCommandsByUuidRequest;
use spkm\Jamf\Classic\Requests\MobileDeviceCommands\FindMobileDeviceCommandsRequest;
use spkm\Jamf\Classic\Requests\MobileDeviceConfigurationProfiles\CreateMobileDeviceConfigurationProfileByIdRequest;
use spkm\Jamf\Classic\Requests\MobileDeviceConfigurationProfiles\DeleteMobileDeviceConfigurationProfileByIdRequest;
use spkm\Jamf\Classic\Requests\MobileDeviceConfigurationProfiles\FindMobileDeviceConfigurationProfilesByIdRequest;
use spkm\Jamf\Classic\Requests\MobileDeviceConfigurationProfiles\FindMobileDeviceConfigurationProfilesByIdSubsetRequest;
use spkm\Jamf\Classic\Requests\MobileDeviceConfigurationProfiles\FindMobileDeviceConfigurationProfilesByNameRequest;
use spkm\Jamf\Classic\Requests\MobileDeviceConfigurationProfiles\FindMobileDeviceConfigurationProfilesRequest;
use spkm\Jamf\Classic\Requests\MobileDeviceConfigurationProfiles\UpdateMobileDeviceConfigurationProfileByIdRequest;
use spkm\Jamf\Classic\Requests\MobileDeviceEnrollmentProfiles\CreateMobileDeviceEnrollmentProfilesByIdRequest;
use spkm\Jamf\Classic\Requests\MobileDeviceEnrollmentProfiles\DeleteMobileDeviceEnrollmentProfileByIdRequest;
use spkm\Jamf\Classic\Requests\MobileDeviceEnrollmentProfiles\FindMobileDeviceEnrollmentProfilesByIdRequest;
use spkm\Jamf\Classic\Requests\MobileDeviceEnrollmentProfiles\FindMobileDeviceEnrollmentProfilesByIdSubsetRequest;
use spkm\Jamf\Classic\Requests\MobileDeviceEnrollmentProfiles\FindMobileDeviceEnrollmentProfilesByInvitationRequest;
use spkm\Jamf\Classic\Requests\MobileDeviceEnrollmentProfiles\FindMobileDeviceEnrollmentProfilesByNameRequest;
use spkm\Jamf\Classic\Requests\MobileDeviceEnrollmentProfiles\FindMobileDeviceEnrollmentProfilesRequest;
use spkm\Jamf\Classic\Requests\MobileDeviceEnrollmentProfiles\UpdateMobileDeviceEnrollmentProfileByIdRequest;
use spkm\Jamf\Classic\Requests\MobileDeviceExtensionAttributes\CreateMobiledeviceextensionattributeByIdRequest;
use spkm\Jamf\Classic\Requests\MobileDeviceExtensionAttributes\DeleteMobiledeviceextensionattributeByIdRequest;
use spkm\Jamf\Classic\Requests\MobileDeviceExtensionAttributes\FindMobiledeviceextensionattributesByIdRequest;
use spkm\Jamf\Classic\Requests\MobileDeviceExtensionAttributes\FindMobiledeviceextensionattributesByNameRequest;
use spkm\Jamf\Classic\Requests\MobileDeviceExtensionAttributes\FindMobiledeviceextensionattributesRequest;
use spkm\Jamf\Classic\Requests\MobileDeviceExtensionAttributes\UpdateMobiledeviceextensionattributeByIdRequest;
use spkm\Jamf\Classic\Requests\MobileDeviceGroups\CreateMobileDeviceGroupByIdRequest;
use spkm\Jamf\Classic\Requests\MobileDeviceGroups\DeleteMobileDeviceGroupByIdRequest;
use spkm\Jamf\Classic\Requests\MobileDeviceGroups\FindMobileDeviceGroupsByIdRequest;
use spkm\Jamf\Classic\Requests\MobileDeviceGroups\FindMobileDeviceGroupsByNameRequest;
use spkm\Jamf\Classic\Requests\MobileDeviceGroups\FindMobileDeviceGroupsRequest;
use spkm\Jamf\Classic\Requests\MobileDeviceGroups\UpdateMobileDeviceGroupByIdRequest;
use spkm\Jamf\Classic\Requests\MobileDeviceHistory\FindMobileDeviceHistoryByIdRequest;
use spkm\Jamf\Classic\Requests\MobileDeviceHistory\FindMobileDeviceHistoryByIdSubsetRequest;
use spkm\Jamf\Classic\Requests\MobileDeviceHistory\FindMobileDeviceHistoryByMacAddressRequest;
use spkm\Jamf\Classic\Requests\MobileDeviceHistory\FindMobileDeviceHistoryByNameRequest;
use spkm\Jamf\Classic\Requests\MobileDeviceHistory\FindMobileDeviceHistoryBySerialNumberRequest;
use spkm\Jamf\Classic\Requests\MobileDeviceHistory\FindMobileDeviceHistoryByUDIDRequest;
use spkm\Jamf\Classic\Requests\MobileDeviceInvitations\CreateMobileDeviceInvitationByIdRequest;
use spkm\Jamf\Classic\Requests\MobileDeviceInvitations\DeleteMobileDeviceInvitationByIdRequest;
use spkm\Jamf\Classic\Requests\MobileDeviceInvitations\FindMobileDeviceInvitationsByIdRequest;
use spkm\Jamf\Classic\Requests\MobileDeviceInvitations\FindMobileDeviceInvitationsByInvitationRequest;
use spkm\Jamf\Classic\Requests\MobileDeviceInvitations\FindMobileDeviceInvitationsRequest;
use spkm\Jamf\Classic\Requests\MobileDeviceProvisioningProfiles\CreateMobileDeviceProvisioningProfileByIdRequest;
use spkm\Jamf\Classic\Requests\MobileDeviceProvisioningProfiles\DeleteMobileDeviceProvisioningProfileByIdRequest;
use spkm\Jamf\Classic\Requests\MobileDeviceProvisioningProfiles\FindMobileDeviceProvisioningProfileByIdSubsetRequest;
use spkm\Jamf\Classic\Requests\MobileDeviceProvisioningProfiles\FindMobileDeviceProvisioningProfilesByIdRequest;
use spkm\Jamf\Classic\Requests\MobileDeviceProvisioningProfiles\FindMobileDeviceProvisioningProfilesByNameRequest;
use spkm\Jamf\Classic\Requests\MobileDeviceProvisioningProfiles\FindMobileDeviceProvisioningProfilesByUUIDRequest;
use spkm\Jamf\Classic\Requests\MobileDeviceProvisioningProfiles\FindMobileDeviceProvisioningProfilesRequest;
use spkm\Jamf\Classic\Requests\MobileDeviceProvisioningProfiles\UpdateMobileDeviceProvisioningProfileByIdRequest;
use spkm\Jamf\Classic\Requests\MobileDevices\CreateMobileDeviceByIdRequest;
use spkm\Jamf\Classic\Requests\MobileDevices\DeleteMobileDeviceByIdRequest;
use spkm\Jamf\Classic\Requests\MobileDevices\FindMobileDevicesByIdRequest;
use spkm\Jamf\Classic\Requests\MobileDevices\FindMobileDevicesByIdSubsetRequest;
use spkm\Jamf\Classic\Requests\MobileDevices\FindMobileDevicesByMacAddressRequest;
use spkm\Jamf\Classic\Requests\MobileDevices\FindMobileDevicesByNameRequest;
use spkm\Jamf\Classic\Requests\MobileDevices\FindMobileDevicesBySerialNumberRequest;
use spkm\Jamf\Classic\Requests\MobileDevices\FindMobileDevicesByUDIDRequest;
use spkm\Jamf\Classic\Requests\MobileDevices\FindMobileDevicesRequest;
use spkm\Jamf\Classic\Requests\MobileDevices\MatchMobileDevicesRequest;
use spkm\Jamf\Classic\Requests\MobileDevices\UpdateMobileDeviceByIdRequest;
use spkm\Jamf\Classic\Requests\NetworkSegments\CreateNetworkSegmentByIdRequest;
use spkm\Jamf\Classic\Requests\NetworkSegments\DeleteNetworkSegmentByIdRequest;
use spkm\Jamf\Classic\Requests\NetworkSegments\FindNetworkSegmentsByIdRequest;
use spkm\Jamf\Classic\Requests\NetworkSegments\FindNetworkSegmentsByNameRequest;
use spkm\Jamf\Classic\Requests\NetworkSegments\FindNetworkSegmentsRequest;
use spkm\Jamf\Classic\Requests\NetworkSegments\UpdateNetworkSegmentByIdRequest;
use spkm\Jamf\Classic\Requests\OsxConfigurationProfiles\CreateOsxConfigurationProfileByIdRequest;
use spkm\Jamf\Classic\Requests\OsxConfigurationProfiles\DeleteOsxConfigurationProfileByIdRequest;
use spkm\Jamf\Classic\Requests\OsxConfigurationProfiles\FindOsxConfigurationProfilesByIdRequest;
use spkm\Jamf\Classic\Requests\OsxConfigurationProfiles\FindOsxConfigurationProfilesByIdSubsetRequest;
use spkm\Jamf\Classic\Requests\OsxConfigurationProfiles\FindOsxConfigurationProfilesByNameRequest;
use spkm\Jamf\Classic\Requests\OsxConfigurationProfiles\FindOsxConfigurationProfilesRequest;
use spkm\Jamf\Classic\Requests\OsxConfigurationProfiles\UpdateOsxConfigurationProfileByIdRequest;
use spkm\Jamf\Classic\Requests\Packages\CreatePackageByIdRequest;
use spkm\Jamf\Classic\Requests\Packages\DeletePackageByIdRequest;
use spkm\Jamf\Classic\Requests\Packages\FindPackagesByIdRequest;
use spkm\Jamf\Classic\Requests\Packages\FindPackagesByNameRequest;
use spkm\Jamf\Classic\Requests\Packages\FindPackagesRequest;
use spkm\Jamf\Classic\Requests\Packages\UpdatePackageByIdRequest;
use spkm\Jamf\Classic\Requests\PatchAvailableTitles\FindAvailableTitlesBySourceIdRequest;
use spkm\Jamf\Classic\Requests\Patches\CreatePatchesByIdRequest;
use spkm\Jamf\Classic\Requests\Patches\DeleteSoftwareTitlesByIdRequest;
use spkm\Jamf\Classic\Requests\Patches\FindComputersByTitleVersionRequest as PatchesFindComputersByTitleVersionRequest;
use spkm\Jamf\Classic\Requests\Patches\FindPatchesByIdRequest;
use spkm\Jamf\Classic\Requests\Patches\FindPatchesByNameRequest;
use spkm\Jamf\Classic\Requests\Patches\FindPatchesRequest;
use spkm\Jamf\Classic\Requests\Patches\UpdateSoftwareTitlesByIdRequest;
use spkm\Jamf\Classic\Requests\PatchExternalSources\CreatePatchExternalSourcesByIdRequest;
use spkm\Jamf\Classic\Requests\PatchExternalSources\FindPatchExternalSourcesByIdRequest;
use spkm\Jamf\Classic\Requests\PatchExternalSources\FindPatchExternalSourcesByNameRequest;
use spkm\Jamf\Classic\Requests\PatchExternalSources\FindPatchExternalSourcesRequest;
use spkm\Jamf\Classic\Requests\PatchExternalSources\UpdatePatchExternalSourcesByIdRequest;
use spkm\Jamf\Classic\Requests\PatchInternalSources\FindPatchInternalSourcesByIdRequest;
use spkm\Jamf\Classic\Requests\PatchInternalSources\FindPatchInternalSourcesByNameRequest;
use spkm\Jamf\Classic\Requests\PatchInternalSources\FindPatchInternalSourcesRequest;
use spkm\Jamf\Classic\Requests\PatchPolicies\CreatePatchPolicyBySoftwareTitleConfigIdRequest;
use spkm\Jamf\Classic\Requests\PatchPolicies\DeletePatchPolicyByIdRequest;
use spkm\Jamf\Classic\Requests\PatchPolicies\FindPatchPoliciesByIdSubsetRequest;
use spkm\Jamf\Classic\Requests\PatchPolicies\FindPatchPoliciesBySoftwareTitleConfigIdRequest;
use spkm\Jamf\Classic\Requests\PatchPolicies\FindPatchPoliciesRequest;
use spkm\Jamf\Classic\Requests\PatchPolicies\FindPatchPolicyByIdRequest;
use spkm\Jamf\Classic\Requests\PatchPolicies\UpdatePatchPolicyByIdRequest;
use spkm\Jamf\Classic\Requests\PatchReports\FindComputersByTitleVersionRequest as PatchReportsFindComputersByTitleVersionRequest;
use spkm\Jamf\Classic\Requests\PatchReports\FindPatchReportsByPatchSoftwareTitleIdRequest;
use spkm\Jamf\Classic\Requests\PatchSoftwareTitles\CreatePatchSoftwareTitleByIdRequest;
use spkm\Jamf\Classic\Requests\PatchSoftwareTitles\DeletePatchSoftwareTitlesByIdRequest;
use spkm\Jamf\Classic\Requests\PatchSoftwareTitles\FindPatchSoftwareTitlesByIdRequest;
use spkm\Jamf\Classic\Requests\PatchSoftwareTitles\FindPatchSoftwareTitlesRequest;
use spkm\Jamf\Classic\Requests\PatchSoftwareTitles\UpdatePatchSoftwareTitlesByIdRequest;
use spkm\Jamf\Classic\Requests\Peripherals\CreatePeripheralByIdRequest;
use spkm\Jamf\Classic\Requests\Peripherals\DeletePeripheralByIdRequest as PeripheralsDeletePeripheralByIdRequest;
use spkm\Jamf\Classic\Requests\Peripherals\FindPeripheralsByIdRequest;
use spkm\Jamf\Classic\Requests\Peripherals\FindPeripheralsByIdSubsetRequest;
use spkm\Jamf\Classic\Requests\Peripherals\FindPeripheralsRequest;
use spkm\Jamf\Classic\Requests\Peripherals\UpdatePeripheralByIdRequest;
use spkm\Jamf\Classic\Requests\PeripheralTypes\CreatePeripheralTypeByIdRequest;
use spkm\Jamf\Classic\Requests\PeripheralTypes\DeletePeripheralByIdRequest as PeripheralTypesDeletePeripheralByIdRequest;
use spkm\Jamf\Classic\Requests\PeripheralTypes\FindPeripheralTypesByIdRequest;
use spkm\Jamf\Classic\Requests\PeripheralTypes\FindPeripheralTypesRequest;
use spkm\Jamf\Classic\Requests\PeripheralTypes\UpdatePeripheralTypeByIdRequest;
use spkm\Jamf\Classic\Requests\Policies\CreatePolicyByIdRequest;
use spkm\Jamf\Classic\Requests\Policies\DeletePolicyByIdRequest;
use spkm\Jamf\Classic\Requests\Policies\FindPoliciesByCategoryRequest;
use spkm\Jamf\Classic\Requests\Policies\FindPoliciesByIdRequest;
use spkm\Jamf\Classic\Requests\Policies\FindPoliciesByIdSubsetRequest;
use spkm\Jamf\Classic\Requests\Policies\FindPoliciesByNameRequest;
use spkm\Jamf\Classic\Requests\Policies\FindPoliciesByTypeRequest;
use spkm\Jamf\Classic\Requests\Policies\FindPoliciesRequest;
use spkm\Jamf\Classic\Requests\Policies\UpdatePolicyByIdRequest;
use spkm\Jamf\Classic\Requests\Printers\CreatePrinterByIdRequest;
use spkm\Jamf\Classic\Requests\Printers\DeletePrinterByIdRequest;
use spkm\Jamf\Classic\Requests\Printers\FindPrintersByIdRequest;
use spkm\Jamf\Classic\Requests\Printers\FindPrintersByNameRequest;
use spkm\Jamf\Classic\Requests\Printers\FindPrintersRequest;
use spkm\Jamf\Classic\Requests\Printers\UpdatePrinterByIdRequest;
use spkm\Jamf\Classic\Requests\RemovableMacAddresses\CreateRemovableMacAddressByIdRequest;
use spkm\Jamf\Classic\Requests\RemovableMacAddresses\DeleteRemovableMacAddressByIdRequest;
use spkm\Jamf\Classic\Requests\RemovableMacAddresses\FindRemovableMacAddressesByIdRequest;
use spkm\Jamf\Classic\Requests\RemovableMacAddresses\FindRemovableMacAddressesByNameRequest;
use spkm\Jamf\Classic\Requests\RemovableMacAddresses\FindRemovableMacAddressesRequest;
use spkm\Jamf\Classic\Requests\RemovableMacAddresses\UpdateRemovableMacAddressByIdRequest;
use spkm\Jamf\Classic\Requests\RestrictedSoftware\CreateRestrictedSoftwareByIdRequest;
use spkm\Jamf\Classic\Requests\RestrictedSoftware\DeleteRestrictedSoftwareByIdRequest;
use spkm\Jamf\Classic\Requests\RestrictedSoftware\FindRestrictedSoftwareByIdRequest;
use spkm\Jamf\Classic\Requests\RestrictedSoftware\FindRestrictedSoftwareByNameRequest;
use spkm\Jamf\Classic\Requests\RestrictedSoftware\FindRestrictedSoftwareRequest;
use spkm\Jamf\Classic\Requests\RestrictedSoftware\UpdateRestrictedSoftwareByIdRequest;
use spkm\Jamf\Classic\Requests\SavedSearches\FindSavedSearchesByIdRequest;
use spkm\Jamf\Classic\Requests\SavedSearches\FindSavedSearchesByNameRequest;
use spkm\Jamf\Classic\Requests\SavedSearches\FindSavedSearchesRequest;
use spkm\Jamf\Classic\Requests\Scripts\CreateScriptByIdRequest;
use spkm\Jamf\Classic\Requests\Scripts\DeleteScriptByIdRequest;
use spkm\Jamf\Classic\Requests\Scripts\FindScriptsByIdRequest;
use spkm\Jamf\Classic\Requests\Scripts\FindScriptsByNameRequest;
use spkm\Jamf\Classic\Requests\Scripts\FindScriptsRequest;
use spkm\Jamf\Classic\Requests\Scripts\UpdateScriptByIdRequest;
use spkm\Jamf\Classic\Requests\Sites\CreateSiteByIdRequest;
use spkm\Jamf\Classic\Requests\Sites\DeleteSiteByIdRequest;
use spkm\Jamf\Classic\Requests\Sites\FindSitesByIdRequest;
use spkm\Jamf\Classic\Requests\Sites\FindSitesByNameRequest;
use spkm\Jamf\Classic\Requests\Sites\FindSitesRequest;
use spkm\Jamf\Classic\Requests\Sites\UpdateSiteByIdRequest;
use spkm\Jamf\Classic\Requests\SmtpServer\FindSMTPServerRequest;
use spkm\Jamf\Classic\Requests\SmtpServer\UpdateSMTPServerRequest;
use spkm\Jamf\Classic\Requests\SoftwareUpdateServers\CreateSoftwareUpdateServerByIdRequest;
use spkm\Jamf\Classic\Requests\SoftwareUpdateServers\DeleteSoftwareUpdateServerByIdRequest;
use spkm\Jamf\Classic\Requests\SoftwareUpdateServers\FindSoftwareUpdateServersByIdRequest;
use spkm\Jamf\Classic\Requests\SoftwareUpdateServers\FindSoftwareUpdateServersByNameRequest;
use spkm\Jamf\Classic\Requests\SoftwareUpdateServers\FindSoftwareUpdateServersRequest;
use spkm\Jamf\Classic\Requests\SoftwareUpdateServers\UpdateSoftwareUpdateServerByIdRequest;
use spkm\Jamf\Classic\Requests\UserExtensionAttributes\CreateUserextensionattributeByIdRequest;
use spkm\Jamf\Classic\Requests\UserExtensionAttributes\DeleteUserextensionattributeByIdRequest;
use spkm\Jamf\Classic\Requests\UserExtensionAttributes\FindUserextensionattributesByIdRequest;
use spkm\Jamf\Classic\Requests\UserExtensionAttributes\FindUserextensionattributesByNameRequest;
use spkm\Jamf\Classic\Requests\UserExtensionAttributes\FindUserextensionattributesRequest;
use spkm\Jamf\Classic\Requests\UserExtensionAttributes\UpdateUserextensionattributeByIdRequest;
use spkm\Jamf\Classic\Requests\UserGroups\CreateUserGroupsByIdRequest;
use spkm\Jamf\Classic\Requests\UserGroups\DeleteUserGroupsByIdRequest;
use spkm\Jamf\Classic\Requests\UserGroups\FindUserGroupsByIdRequest;
use spkm\Jamf\Classic\Requests\UserGroups\FindUserGroupsByNameRequest;
use spkm\Jamf\Classic\Requests\UserGroups\FindUserGroupsRequest;
use spkm\Jamf\Classic\Requests\UserGroups\UpdateUserGroupsByIdRequest;
use spkm\Jamf\Classic\Requests\Users\CreateUserByIdRequest as UsersCreateUserByIdRequest;
use spkm\Jamf\Classic\Requests\Users\DeleteUserByIdRequest as UsersDeleteUserByIdRequest;
use spkm\Jamf\Classic\Requests\Users\FindUsersByEmailAddressRequest;
use spkm\Jamf\Classic\Requests\Users\FindUsersByIdRequest as UsersFindUsersByIdRequest;
use spkm\Jamf\Classic\Requests\Users\FindUsersByNameRequest as UsersFindUsersByNameRequest;
use spkm\Jamf\Classic\Requests\Users\FindUsersRequest;
use spkm\Jamf\Classic\Requests\Users\UpdateUserByIdRequest as UsersUpdateUserByIdRequest;
use spkm\Jamf\Classic\Requests\VppAccounts\CreateAccountByIdRequest;
use spkm\Jamf\Classic\Requests\VppAccounts\DeleteAccountByIdRequest;
use spkm\Jamf\Classic\Requests\VppAccounts\FindAccountByIdRequest;
use spkm\Jamf\Classic\Requests\VppAccounts\FindVPPAdminAccountRequest;
use spkm\Jamf\Classic\Requests\VppAccounts\UpdateAccountByIdRequest;
use spkm\Jamf\Classic\Requests\VppAssignments\CreateAssignmentByIdRequest;
use spkm\Jamf\Classic\Requests\VppAssignments\DeleteAssignmentByIdRequest;
use spkm\Jamf\Classic\Requests\VppAssignments\FindAssignmentByIdRequest;
use spkm\Jamf\Classic\Requests\VppAssignments\FindVPPAdminAssignmentRequest;
use spkm\Jamf\Classic\Requests\VppAssignments\UpdateAssignmentByIdRequest;
use spkm\Jamf\Classic\Requests\VppInvitations\CreateInvitationByIdRequest;
use spkm\Jamf\Classic\Requests\VppInvitations\DeleteInvitationByIdRequest;
use spkm\Jamf\Classic\Requests\VppInvitations\FindInvitationByIdRequest;
use spkm\Jamf\Classic\Requests\VppInvitations\FindInvitationsByIdSubsetRequest;
use spkm\Jamf\Classic\Requests\VppInvitations\FindVPPAdminInvitationRequest;
use spkm\Jamf\Classic\Requests\VppInvitations\UpdateInvitationByIdRequest;
use spkm\Jamf\Classic\Requests\Webhooks\CreateWebhookByIdRequest;
use spkm\Jamf\Classic\Requests\Webhooks\DeleteWebhookByIdRequest;
use spkm\Jamf\Classic\Requests\Webhooks\FindWebhooksByIdRequest;
use spkm\Jamf\Classic\Requests\Webhooks\FindWebhooksByNameRequest;
use spkm\Jamf\Classic\Requests\Webhooks\FindWebhooksRequest;
use spkm\Jamf\Classic\Requests\Webhooks\UpdateWebhookByIdRequest;

/*
| One row per request: class, constructor arguments, method, path, shape, model, whether it has a body, and
| whether it pages. Taken from Jamf's Classic API schema.
*/

return [
    'Accounts\\CreateGroupByIdRequest' => [CreateGroupByIdRequest::class, [7], 'POST', '/accounts/groupid/7', 'one', null, true, false],
    'Accounts\\CreateUserByIdRequest' => [AccountsCreateUserByIdRequest::class, [7], 'POST', '/accounts/userid/7', 'one', null, true, false],
    'Accounts\\DeleteGroupByIdRequest' => [DeleteGroupByIdRequest::class, [7], 'DELETE', '/accounts/groupid/7', 'none', null, false, false],
    'Accounts\\DeleteUserByIdRequest' => [AccountsDeleteUserByIdRequest::class, [7], 'DELETE', '/accounts/userid/7', 'none', null, false, false],
    'Accounts\\FindAccountsRequest' => [FindAccountsRequest::class, [], 'GET', '/accounts', 'list', null, false, false],
    'Accounts\\FindGroupsByIdRequest' => [FindGroupsByIdRequest::class, [7], 'GET', '/accounts/groupid/7', 'one', null, false, false],
    'Accounts\\FindGroupsByNameRequest' => [FindGroupsByNameRequest::class, ['abc'], 'GET', '/accounts/groupname/abc', 'one', null, false, false],
    'Accounts\\FindUsersByIdRequest' => [AccountsFindUsersByIdRequest::class, [7], 'GET', '/accounts/userid/7', 'one', null, false, false],
    'Accounts\\FindUsersByNameRequest' => [AccountsFindUsersByNameRequest::class, ['abc'], 'GET', '/accounts/username/abc', 'one', null, false, false],
    'Accounts\\UpdateGroupByIdRequest' => [UpdateGroupByIdRequest::class, [7], 'PUT', '/accounts/groupid/7', 'one', null, true, false],
    'Accounts\\UpdateUserByIdRequest' => [AccountsUpdateUserByIdRequest::class, [7], 'PUT', '/accounts/userid/7', 'one', null, true, false],
    'ActivationCode\\FindactivationcodeRequest' => [FindactivationcodeRequest::class, [], 'GET', '/activationcode', 'list', null, false, false],
    'ActivationCode\\UpdateActivationCodeRequest' => [UpdateActivationCodeRequest::class, [], 'PUT', '/activationcode', 'one', null, true, false],
    'AdvancedComputerSearches\\CreateAdvancedComputerSearchByIdRequest' => [CreateAdvancedComputerSearchByIdRequest::class, [7], 'POST', '/advancedcomputersearches/id/7', 'one', null, true, false],
    'AdvancedComputerSearches\\DeleteAdvancedComputerSearchByIdRequest' => [DeleteAdvancedComputerSearchByIdRequest::class, [7], 'DELETE', '/advancedcomputersearches/id/7', 'none', null, false, false],
    'AdvancedComputerSearches\\FindAdvancedComputerSearchesRequest' => [FindAdvancedComputerSearchesRequest::class, [], 'GET', '/advancedcomputersearches', 'list', null, false, false],
    'AdvancedComputerSearches\\FindAdvancedComputerSearchesByIdRequest' => [FindAdvancedComputerSearchesByIdRequest::class, [7], 'GET', '/advancedcomputersearches/id/7', 'one', null, false, false],
    'AdvancedComputerSearches\\FindComputerSearchesByNameRequest' => [FindComputerSearchesByNameRequest::class, ['abc'], 'GET', '/advancedcomputersearches/name/abc', 'one', null, false, false],
    'AdvancedComputerSearches\\UpdateAdvancedComputerSearchByIdRequest' => [UpdateAdvancedComputerSearchByIdRequest::class, [7], 'PUT', '/advancedcomputersearches/id/7', 'one', null, true, false],
    'AdvancedMobileDeviceSearches\\CreateAdvancedMobileDeviceSearchByIdRequest' => [CreateAdvancedMobileDeviceSearchByIdRequest::class, [7], 'POST', '/advancedmobiledevicesearches/id/7', 'one', null, true, false],
    'AdvancedMobileDeviceSearches\\DeleteAdvancedMobileDeviceSearchByIdRequest' => [DeleteAdvancedMobileDeviceSearchByIdRequest::class, [7], 'DELETE', '/advancedmobiledevicesearches/id/7', 'none', null, false, false],
    'AdvancedMobileDeviceSearches\\FindAdvancedMobileDeviceSearchesRequest' => [FindAdvancedMobileDeviceSearchesRequest::class, [], 'GET', '/advancedmobiledevicesearches', 'list', null, false, false],
    'AdvancedMobileDeviceSearches\\FindAdvancedMobileDeviceSearchesByIdRequest' => [FindAdvancedMobileDeviceSearchesByIdRequest::class, [7], 'GET', '/advancedmobiledevicesearches/id/7', 'one', null, false, false],
    'AdvancedMobileDeviceSearches\\FindMobileDeviceSearchesByNameRequest' => [FindMobileDeviceSearchesByNameRequest::class, ['abc'], 'GET', '/advancedmobiledevicesearches/name/abc', 'one', null, false, false],
    'AdvancedMobileDeviceSearches\\UpdateAdvancedMobileDeviceSearchByIdRequest' => [UpdateAdvancedMobileDeviceSearchByIdRequest::class, [7], 'PUT', '/advancedmobiledevicesearches/id/7', 'one', null, true, false],
    'AdvancedUserSearches\\CreateAdvancedUserSearchByIdRequest' => [CreateAdvancedUserSearchByIdRequest::class, [7], 'POST', '/advancedusersearches/id/7', 'one', null, true, false],
    'AdvancedUserSearches\\DeleteAdvancedUserSearchByIdRequest' => [DeleteAdvancedUserSearchByIdRequest::class, [7], 'DELETE', '/advancedusersearches/id/7', 'none', null, false, false],
    'AdvancedUserSearches\\FindAdvancedUserSearchesRequest' => [FindAdvancedUserSearchesRequest::class, [], 'GET', '/advancedusersearches', 'list', null, false, false],
    'AdvancedUserSearches\\FindAdvancedUserSearchesByIdRequest' => [FindAdvancedUserSearchesByIdRequest::class, [7], 'GET', '/advancedusersearches/id/7', 'one', null, false, false],
    'AdvancedUserSearches\\FindUserSearchesByNameRequest' => [FindUserSearchesByNameRequest::class, ['abc'], 'GET', '/advancedusersearches/name/abc', 'one', null, false, false],
    'AdvancedUserSearches\\UpdateAdvancedUserSearchByIdRequest' => [UpdateAdvancedUserSearchByIdRequest::class, [7], 'PUT', '/advancedusersearches/id/7', 'one', null, true, false],
    'AllowedFileExtensions\\CreateAllowedFileExtensionByIdRequest' => [CreateAllowedFileExtensionByIdRequest::class, [7], 'POST', '/allowedfileextensions/id/7', 'one', null, true, false],
    'AllowedFileExtensions\\DeleteAllowedFileExtensionByIdRequest' => [DeleteAllowedFileExtensionByIdRequest::class, [7], 'DELETE', '/allowedfileextensions/id/7', 'none', null, false, false],
    'AllowedFileExtensions\\FindAllowedFileExtensionRequest' => [FindAllowedFileExtensionRequest::class, [], 'GET', '/allowedfileextensions', 'list', null, false, false],
    'AllowedFileExtensions\\FindAllowedFileExtensionByIdRequest' => [FindAllowedFileExtensionByIdRequest::class, [7], 'GET', '/allowedfileextensions/id/7', 'one', null, false, false],
    'AllowedFileExtensions\\FindAllowedFileExtensionByNameRequest' => [FindAllowedFileExtensionByNameRequest::class, ['abc'], 'GET', '/allowedfileextensions/extension/abc', 'one', null, false, false],
    'Buildings\\CreateBuildingByIdRequest' => [CreateBuildingByIdRequest::class, [7], 'POST', '/buildings/id/7', 'one', null, true, false],
    'Buildings\\DeleteBuildingByIdRequest' => [DeleteBuildingByIdRequest::class, [7], 'DELETE', '/buildings/id/7', 'none', null, false, false],
    'Buildings\\FindBuildingsRequest' => [FindBuildingsRequest::class, [], 'GET', '/buildings', 'list', null, false, false],
    'Buildings\\FindBuildingsByIdRequest' => [FindBuildingsByIdRequest::class, [7], 'GET', '/buildings/id/7', 'one', null, false, false],
    'Buildings\\FindBuildingsByNameRequest' => [FindBuildingsByNameRequest::class, ['abc'], 'GET', '/buildings/name/abc', 'one', null, false, false],
    'Buildings\\UpdateBuildingByIdRequest' => [UpdateBuildingByIdRequest::class, [7], 'PUT', '/buildings/id/7', 'one', null, true, false],
    'Categories\\CreateCategoryByIdRequest' => [CreateCategoryByIdRequest::class, [7], 'POST', '/categories/id/7', 'one', null, true, false],
    'Categories\\DeleteCategoryByIdRequest' => [DeleteCategoryByIdRequest::class, [7], 'DELETE', '/categories/id/7', 'none', null, false, false],
    'Categories\\FindCategoriesRequest' => [FindCategoriesRequest::class, [], 'GET', '/categories', 'list', null, false, false],
    'Categories\\FindCategoriesByIdRequest' => [FindCategoriesByIdRequest::class, [7], 'GET', '/categories/id/7', 'one', null, false, false],
    'Categories\\FindCategoriesByNameRequest' => [FindCategoriesByNameRequest::class, ['abc'], 'GET', '/categories/name/abc', 'one', null, false, false],
    'Categories\\UpdateCategoryByIdRequest' => [UpdateCategoryByIdRequest::class, [7], 'PUT', '/categories/id/7', 'one', null, true, false],
    'Classes\\CreateClassByIdRequest' => [CreateClassByIdRequest::class, [7], 'POST', '/classes/id/7', 'one', null, true, false],
    'Classes\\DeleteClassByIdRequest' => [DeleteClassByIdRequest::class, [7], 'DELETE', '/classes/id/7', 'none', null, false, false],
    'Classes\\FindClassesRequest' => [FindClassesRequest::class, [], 'GET', '/classes', 'list', null, false, false],
    'Classes\\FindClassesByIdRequest' => [FindClassesByIdRequest::class, [7], 'GET', '/classes/id/7', 'one', null, false, false],
    'Classes\\FindClassesByNameRequest' => [FindClassesByNameRequest::class, ['abc'], 'GET', '/classes/name/abc', 'one', null, false, false],
    'Classes\\UpdateClassByIdRequest' => [UpdateClassByIdRequest::class, [7], 'PUT', '/classes/id/7', 'one', null, true, false],
    'CommandFlush\\CommandFlushRequest' => [CommandFlushRequest::class, [], 'DELETE', '/commandflush', 'none', null, false, false],
    'CommandFlush\\CreateCommandFlushWithIdAndStatusRequest' => [CreateCommandFlushWithIdAndStatusRequest::class, ['abc', 7, 'abc'], 'DELETE', '/commandflush/abc/id/7/status/abc', 'none', null, false, false],
    'ComputerApplicationUsage\\FindComputerApplicationUsageByIdRequest' => [FindComputerApplicationUsageByIdRequest::class, [7, 'abc', 'abc'], 'GET', '/computerapplicationusage/id/7/abc_abc', 'one', null, false, false],
    'ComputerApplicationUsage\\FindComputerApplicationUsageByMacAddressRequest' => [FindComputerApplicationUsageByMacAddressRequest::class, ['abc', 'abc', 'abc'], 'GET', '/computerapplicationusage/macaddress/abc/abc_abc', 'one', null, false, false],
    'ComputerApplicationUsage\\FindComputerApplicationUsageByNameRequest' => [FindComputerApplicationUsageByNameRequest::class, ['abc', 'abc', 'abc'], 'GET', '/computerapplicationusage/name/abc/abc_abc', 'one', null, false, false],
    'ComputerApplicationUsage\\FindComputerApplicationUsageBySerialRequest' => [FindComputerApplicationUsageBySerialRequest::class, ['abc', 'abc', 'abc'], 'GET', '/computerapplicationusage/serialnumber/abc/abc_abc', 'one', null, false, false],
    'ComputerApplicationUsage\\FindComputerApplicationUsageByUDIDRequest' => [FindComputerApplicationUsageByUDIDRequest::class, ['abc', 'abc', 'abc'], 'GET', '/computerapplicationusage/udid/abc/abc_abc', 'one', null, false, false],
    'ComputerApplications\\FindComputerApplicationByNameAndVersionRequest' => [FindComputerApplicationByNameAndVersionRequest::class, ['abc', 'abc'], 'GET', '/computerapplications/application/abc/version/abc', 'one', null, false, false],
    'ComputerApplications\\FindComputerApplicationsByNameRequest' => [FindComputerApplicationsByNameRequest::class, ['abc'], 'GET', '/computerapplications/application/abc', 'one', null, false, false],
    'ComputerApplications\\FindComputerApplicationsByNameAndVersionAndInventoryRequest' => [FindComputerApplicationsByNameAndVersionAndInventoryRequest::class, ['abc', 'abc', 'abc'], 'GET', '/computerapplications/application/abc/version/abc/inventory/abc', 'one', null, false, false],
    'ComputerApplications\\FindComputerApplicationsByNameInventoryRequest' => [FindComputerApplicationsByNameInventoryRequest::class, ['abc', 'abc'], 'GET', '/computerapplications/application/abc/inventory/abc', 'one', null, false, false],
    'ComputerCheckIn\\FindComputerCheckinRequest' => [FindComputerCheckinRequest::class, [], 'GET', '/computercheckin', 'list', null, false, false],
    'ComputerCheckIn\\UpdateComputerCheckinRequest' => [UpdateComputerCheckinRequest::class, [], 'PUT', '/computercheckin', 'one', null, true, false],
    'ComputerCommands\\CreateComputerCommandByCommandRequest' => [CreateComputerCommandByCommandRequest::class, ['abc'], 'POST', '/computercommands/command/abc', 'one', null, true, false],
    'ComputerCommands\\CreateComputerCommandByCommandAndActionRequest' => [CreateComputerCommandByCommandAndActionRequest::class, ['abc', 'abc', 7], 'POST', '/computercommands/command/abc/action/abc/id/7', 'one', null, true, false],
    'ComputerCommands\\CreateComputerCommandByCommandShortcut1Request' => [CreateComputerCommandByCommandShortcut1Request::class, ['abc', 7], 'POST', '/computercommands/command/abc/id/7', 'one', null, true, false],
    'ComputerCommands\\FindComputerCommandStatusByUuidRequest' => [FindComputerCommandStatusByUuidRequest::class, ['abc'], 'GET', '/computercommands/status/abc', 'one', null, false, false],
    'ComputerCommands\\FindComputerCommandsRequest' => [FindComputerCommandsRequest::class, [], 'GET', '/computercommands', 'list', null, false, false],
    'ComputerCommands\\FindComputerCommandsByNameRequest' => [FindComputerCommandsByNameRequest::class, ['abc'], 'GET', '/computercommands/name/abc', 'one', null, false, false],
    'ComputerCommands\\FindComputerCommandsByUuidRequest' => [FindComputerCommandsByUuidRequest::class, ['abc'], 'GET', '/computercommands/uuid/abc', 'one', null, false, false],
    'ComputerExtensionAttributes\\CreateComputerextensionattributeByIdRequest' => [CreateComputerextensionattributeByIdRequest::class, [7], 'POST', '/computerextensionattributes/id/7', 'one', null, true, false],
    'ComputerExtensionAttributes\\DeleteComputerextensionattributeByIdRequest' => [DeleteComputerextensionattributeByIdRequest::class, [7], 'DELETE', '/computerextensionattributes/id/7', 'none', null, false, false],
    'ComputerExtensionAttributes\\FindComputerextensionattributesRequest' => [FindComputerextensionattributesRequest::class, [], 'GET', '/computerextensionattributes', 'list', null, false, false],
    'ComputerExtensionAttributes\\FindComputerextensionattributesByIdRequest' => [FindComputerextensionattributesByIdRequest::class, [7], 'GET', '/computerextensionattributes/id/7', 'one', null, false, false],
    'ComputerExtensionAttributes\\FindComputerextensionattributesByNameRequest' => [FindComputerextensionattributesByNameRequest::class, ['abc'], 'GET', '/computerextensionattributes/name/abc', 'one', null, false, false],
    'ComputerExtensionAttributes\\UpdateComputerextensionattributeByIdRequest' => [UpdateComputerextensionattributeByIdRequest::class, [7], 'PUT', '/computerextensionattributes/id/7', 'one', null, true, false],
    'ComputerGroups\\CreateComputerGroupByIdRequest' => [CreateComputerGroupByIdRequest::class, [7], 'POST', '/computergroups/id/7', 'one', null, true, false],
    'ComputerGroups\\DeleteComputerGroupByIdRequest' => [DeleteComputerGroupByIdRequest::class, [7], 'DELETE', '/computergroups/id/7', 'none', null, false, false],
    'ComputerGroups\\FindComputerGroupsRequest' => [FindComputerGroupsRequest::class, [], 'GET', '/computergroups', 'list', null, false, false],
    'ComputerGroups\\FindComputerGroupsByIdRequest' => [FindComputerGroupsByIdRequest::class, [7], 'GET', '/computergroups/id/7', 'one', null, false, false],
    'ComputerGroups\\FindComputerGroupsByNameRequest' => [FindComputerGroupsByNameRequest::class, ['abc'], 'GET', '/computergroups/name/abc', 'one', null, false, false],
    'ComputerGroups\\UpdateComputerGroupByIdRequest' => [UpdateComputerGroupByIdRequest::class, [7], 'PUT', '/computergroups/id/7', 'one', null, true, false],
    'ComputerHardwareSoftwareReports\\FindComputerHardwareSoftwareReportsByIdRequest' => [FindComputerHardwareSoftwareReportsByIdRequest::class, [7, 'abc', 'abc'], 'GET', '/computerhardwaresoftwarereports/id/7/abc_abc', 'one', null, false, false],
    'ComputerHardwareSoftwareReports\\FindComputerHardwareSoftwareReportsByMacAddressRequest' => [FindComputerHardwareSoftwareReportsByMacAddressRequest::class, ['abc', 'abc', 'abc'], 'GET', '/computerhardwaresoftwarereports/macaddress/abc/abc_abc', 'one', null, false, false],
    'ComputerHardwareSoftwareReports\\FindComputerHardwareSoftwareReportsByNameRequest' => [FindComputerHardwareSoftwareReportsByNameRequest::class, ['abc', 'abc', 'abc'], 'GET', '/computerhardwaresoftwarereports/name/abc/abc_abc', 'one', null, false, false],
    'ComputerHardwareSoftwareReports\\FindComputerHardwareSoftwareReportsBySerialRequest' => [FindComputerHardwareSoftwareReportsBySerialRequest::class, ['abc', 'abc', 'abc'], 'GET', '/computerhardwaresoftwarereports/serialnumber/abc/abc_abc', 'one', null, false, false],
    'ComputerHardwareSoftwareReports\\FindComputerHardwareSoftwareReportsByUDIDRequest' => [FindComputerHardwareSoftwareReportsByUDIDRequest::class, ['abc', 'abc', 'abc'], 'GET', '/computerhardwaresoftwarereports/udid/abc/abc_abc', 'one', null, false, false],
    'ComputerHardwareSoftwareReports\\FindComputerHistoryByIdSubsetRequest' => [ComputerHardwareSoftwareReportsFindComputerHistoryByIdSubsetRequest::class, [7, 'abc', 'abc', 'abc'], 'GET', '/computerhardwaresoftwarereports/id/7/abc_abc/subset/abc', 'one', null, false, false],
    'ComputerHistory\\FindComputerHistoryByIdRequest' => [FindComputerHistoryByIdRequest::class, [7], 'GET', '/computerhistory/id/7', 'one', null, false, false],
    'ComputerHistory\\FindComputerHistoryByIdSubsetRequest' => [ComputerHistoryFindComputerHistoryByIdSubsetRequest::class, [7, 'abc'], 'GET', '/computerhistory/id/7/subset/abc', 'one', null, false, false],
    'ComputerHistory\\FindComputerHistoryByMacAddressRequest' => [FindComputerHistoryByMacAddressRequest::class, ['abc'], 'GET', '/computerhistory/macaddress/abc', 'one', null, false, false],
    'ComputerHistory\\FindComputerHistoryByNameRequest' => [FindComputerHistoryByNameRequest::class, ['abc'], 'GET', '/computerhistory/name/abc', 'one', null, false, false],
    'ComputerHistory\\FindComputerHistoryBySerialNumberRequest' => [FindComputerHistoryBySerialNumberRequest::class, ['abc'], 'GET', '/computerhistory/serialnumber/abc', 'one', null, false, false],
    'ComputerHistory\\FindComputerHistoryByUDIDRequest' => [FindComputerHistoryByUDIDRequest::class, ['abc'], 'GET', '/computerhistory/udid/abc', 'one', null, false, false],
    'ComputerInventoryCollection\\FindcomputerinventorycollectionRequest' => [FindcomputerinventorycollectionRequest::class, [], 'GET', '/computerinventorycollection', 'list', null, false, false],
    'ComputerInventoryCollection\\UpdateComputerInventoryCollectionRequest' => [UpdateComputerInventoryCollectionRequest::class, [], 'PUT', '/computerinventorycollection', 'one', null, true, false],
    'ComputerInvitations\\CreateComputerInvitationByIdRequest' => [CreateComputerInvitationByIdRequest::class, [7], 'POST', '/computerinvitations/id/7', 'one', null, true, false],
    'ComputerInvitations\\DeleteComputerInvitationByIdRequest' => [DeleteComputerInvitationByIdRequest::class, [7], 'DELETE', '/computerinvitations/id/7', 'none', null, false, false],
    'ComputerInvitations\\FindComputerInvitationsRequest' => [FindComputerInvitationsRequest::class, [], 'GET', '/computerinvitations', 'list', null, false, false],
    'ComputerInvitations\\FindComputerInvitationsByIdRequest' => [FindComputerInvitationsByIdRequest::class, [7], 'GET', '/computerinvitations/id/7', 'one', null, false, false],
    'ComputerInvitations\\FindComputerInvitationsByInvitationRequest' => [FindComputerInvitationsByInvitationRequest::class, ['abc'], 'GET', '/computerinvitations/invitation/abc', 'one', null, false, false],
    'ComputerInvitations\\FindComputerInvitationsByNameRequest' => [FindComputerInvitationsByNameRequest::class, ['abc'], 'GET', '/computerinvitations/name/abc', 'one', null, false, false],
    'ComputerManagement\\FindComputerManagementByIdRequest' => [FindComputerManagementByIdRequest::class, [7], 'GET', '/computermanagement/id/7', 'one', null, false, false],
    'ComputerManagement\\FindComputerManagementByIdPatchFilterRequest' => [FindComputerManagementByIdPatchFilterRequest::class, [7, 'abc'], 'GET', '/computermanagement/id/7/patchfilter/abc', 'one', null, false, false],
    'ComputerManagement\\FindComputerManagementByIdSubsetRequest' => [FindComputerManagementByIdSubsetRequest::class, [7, 'abc'], 'GET', '/computermanagement/id/7/subset/abc', 'one', null, false, false],
    'ComputerManagement\\FindComputerManagementByIdUsernameRequest' => [FindComputerManagementByIdUsernameRequest::class, [7, 'abc'], 'GET', '/computermanagement/id/7/username/abc', 'one', null, false, false],
    'ComputerManagement\\FindComputerManagementByIdUsernameSubsetRequest' => [FindComputerManagementByIdUsernameSubsetRequest::class, [7, 'abc', 'abc'], 'GET', '/computermanagement/id/7/username/abc/subset/abc', 'one', null, false, false],
    'ComputerManagement\\FindComputerManagementByMacAddressRequest' => [FindComputerManagementByMacAddressRequest::class, ['abc'], 'GET', '/computermanagement/macaddress/abc', 'one', null, false, false],
    'ComputerManagement\\FindComputerManagementByNameRequest' => [FindComputerManagementByNameRequest::class, ['abc'], 'GET', '/computermanagement/name/abc', 'one', null, false, false],
    'ComputerManagement\\FindComputerManagementBySerialNumberRequest' => [FindComputerManagementBySerialNumberRequest::class, ['abc'], 'GET', '/computermanagement/serialnumber/abc', 'one', null, false, false],
    'ComputerManagement\\FindComputerManagementByUDIDRequest' => [FindComputerManagementByUDIDRequest::class, ['abc'], 'GET', '/computermanagement/udid/abc', 'one', null, false, false],
    'ComputerReports\\FindComputeReportsByIdRequest' => [FindComputeReportsByIdRequest::class, [7], 'GET', '/computerreports/id/7', 'one', null, false, false],
    'ComputerReports\\FindComputeReportsByNameRequest' => [FindComputeReportsByNameRequest::class, ['abc'], 'GET', '/computerreports/name/abc', 'one', null, false, false],
    'ComputerReports\\FindComputerReportsRequest' => [FindComputerReportsRequest::class, [], 'GET', '/computerreports', 'list', null, false, false],
    'Computers\\CreateComputerByIdRequest' => [CreateComputerByIdRequest::class, [7], 'POST', '/computers/id/7', 'one', null, true, false],
    'Computers\\DeleteComputerByIdRequest' => [DeleteComputerByIdRequest::class, [7], 'DELETE', '/computers/id/7', 'none', null, false, false],
    'Computers\\FindComputersRequest' => [FindComputersRequest::class, [], 'GET', '/computers', 'list', null, false, false],
    'Computers\\FindComputersBasicRequest' => [FindComputersBasicRequest::class, [], 'GET', '/computers/subset/basic', 'one', null, false, false],
    'Computers\\FindComputersByIdRequest' => [FindComputersByIdRequest::class, [7], 'GET', '/computers/id/7', 'one', null, false, false],
    'Computers\\FindComputersByIdSubsetRequest' => [FindComputersByIdSubsetRequest::class, [7, 'abc'], 'GET', '/computers/id/7/subset/abc', 'one', null, false, false],
    'Computers\\FindComputersByMacAddressRequest' => [FindComputersByMacAddressRequest::class, ['abc'], 'GET', '/computers/macaddress/abc', 'one', null, false, false],
    'Computers\\FindComputersByNameRequest' => [FindComputersByNameRequest::class, ['abc'], 'GET', '/computers/name/abc', 'one', null, false, false],
    'Computers\\FindComputersBySerialNumberRequest' => [FindComputersBySerialNumberRequest::class, ['abc'], 'GET', '/computers/serialnumber/abc', 'one', null, false, false],
    'Computers\\FindComputersByUDIDRequest' => [FindComputersByUDIDRequest::class, ['abc'], 'GET', '/computers/udid/abc', 'one', null, false, false],
    'Computers\\FlushComputerExtensionAttributeDataRequest' => [FlushComputerExtensionAttributeDataRequest::class, [7], 'DELETE', '/computers/extensionattributedataflush/id/7', 'none', null, false, false],
    'Computers\\MatchComputersRequest' => [MatchComputersRequest::class, ['abc'], 'GET', '/computers/match/abc', 'list', null, false, false],
    'Computers\\MatchComputersNamesRequest' => [MatchComputersNamesRequest::class, ['abc'], 'GET', '/computers/match/name/abc', 'list', null, false, false],
    'Computers\\UpdateComputerByIdRequest' => [UpdateComputerByIdRequest::class, [7], 'PUT', '/computers/id/7', 'one', null, true, false],
    'Departments\\CreateDepartmentByIdRequest' => [CreateDepartmentByIdRequest::class, [7], 'POST', '/departments/id/7', 'one', null, true, false],
    'Departments\\DeleteDepartmentByIdRequest' => [DeleteDepartmentByIdRequest::class, [7], 'DELETE', '/departments/id/7', 'none', null, false, false],
    'Departments\\FindDepartmentsRequest' => [FindDepartmentsRequest::class, [], 'GET', '/departments', 'list', null, false, false],
    'Departments\\FindDepartmentsByIdRequest' => [FindDepartmentsByIdRequest::class, [7], 'GET', '/departments/id/7', 'one', null, false, false],
    'Departments\\FindDepartmentsByNameRequest' => [FindDepartmentsByNameRequest::class, ['abc'], 'GET', '/departments/name/abc', 'one', null, false, false],
    'Departments\\UpdateDepartmentByIdRequest' => [UpdateDepartmentByIdRequest::class, [7], 'PUT', '/departments/id/7', 'one', null, true, false],
    'DirectoryBindings\\CreateDirectoryBindingByIdRequest' => [CreateDirectoryBindingByIdRequest::class, [7], 'POST', '/directorybindings/id/7', 'one', null, true, false],
    'DirectoryBindings\\DeleteDirectoryBindingByIdRequest' => [DeleteDirectoryBindingByIdRequest::class, [7], 'DELETE', '/directorybindings/id/7', 'none', null, false, false],
    'DirectoryBindings\\FindDirectoryBindingsRequest' => [FindDirectoryBindingsRequest::class, [], 'GET', '/directorybindings', 'list', null, false, false],
    'DirectoryBindings\\FindDirectoryBindingsByIdRequest' => [FindDirectoryBindingsByIdRequest::class, [7], 'GET', '/directorybindings/id/7', 'one', null, false, false],
    'DirectoryBindings\\FindDirectoryBindingsByNameRequest' => [FindDirectoryBindingsByNameRequest::class, ['abc'], 'GET', '/directorybindings/name/abc', 'one', null, false, false],
    'DirectoryBindings\\UpdateDirectoryBindingByIdRequest' => [UpdateDirectoryBindingByIdRequest::class, [7], 'PUT', '/directorybindings/id/7', 'one', null, true, false],
    'DiskEncryptionConfigurations\\CreateDiskEncryptionConfigurationByIdRequest' => [CreateDiskEncryptionConfigurationByIdRequest::class, [7], 'POST', '/diskencryptionconfigurations/id/7', 'one', null, true, false],
    'DiskEncryptionConfigurations\\DeleteDiskEncryptionConfigurationByIdRequest' => [DeleteDiskEncryptionConfigurationByIdRequest::class, [7], 'DELETE', '/diskencryptionconfigurations/id/7', 'none', null, false, false],
    'DiskEncryptionConfigurations\\FindDiskEncryptionConfigurationsRequest' => [FindDiskEncryptionConfigurationsRequest::class, [], 'GET', '/diskencryptionconfigurations', 'list', null, false, false],
    'DiskEncryptionConfigurations\\FindDiskEncryptionConfigurationsByIdRequest' => [FindDiskEncryptionConfigurationsByIdRequest::class, [7], 'GET', '/diskencryptionconfigurations/id/7', 'one', null, false, false],
    'DiskEncryptionConfigurations\\FindDiskEncryptionConfigurationsByNameRequest' => [FindDiskEncryptionConfigurationsByNameRequest::class, ['abc'], 'GET', '/diskencryptionconfigurations/name/abc', 'one', null, false, false],
    'DiskEncryptionConfigurations\\UpdateDiskEncryptionConfigurationByIdRequest' => [UpdateDiskEncryptionConfigurationByIdRequest::class, [7], 'PUT', '/diskencryptionconfigurations/id/7', 'one', null, true, false],
    'DistributionPoints\\CreateDistributionPointByIdRequest' => [CreateDistributionPointByIdRequest::class, [7], 'POST', '/distributionpoints/id/7', 'one', null, true, false],
    'DistributionPoints\\DeleteDistributionPointByIdRequest' => [DeleteDistributionPointByIdRequest::class, [7], 'DELETE', '/distributionpoints/id/7', 'none', null, false, false],
    'DistributionPoints\\FindDistributionPointsRequest' => [FindDistributionPointsRequest::class, [], 'GET', '/distributionpoints', 'list', null, false, false],
    'DistributionPoints\\FindDistributionPointsByIdRequest' => [FindDistributionPointsByIdRequest::class, [7], 'GET', '/distributionpoints/id/7', 'one', null, false, false],
    'DistributionPoints\\FindDistributionPointsByNameRequest' => [FindDistributionPointsByNameRequest::class, ['abc'], 'GET', '/distributionpoints/name/abc', 'one', null, false, false],
    'DistributionPoints\\UpdateDistributionPointByIdRequest' => [UpdateDistributionPointByIdRequest::class, [7], 'PUT', '/distributionpoints/id/7', 'one', null, true, false],
    'DockItems\\CreateDockItemByIdRequest' => [CreateDockItemByIdRequest::class, [7], 'POST', '/dockitems/id/7', 'one', null, true, false],
    'DockItems\\DeleteDockItemByIdRequest' => [DeleteDockItemByIdRequest::class, [7], 'DELETE', '/dockitems/id/7', 'none', null, false, false],
    'DockItems\\FindDockItemsRequest' => [FindDockItemsRequest::class, [], 'GET', '/dockitems', 'list', null, false, false],
    'DockItems\\FindDockItemsByIdRequest' => [FindDockItemsByIdRequest::class, [7], 'GET', '/dockitems/id/7', 'one', null, false, false],
    'DockItems\\FindDockItemsByNameRequest' => [FindDockItemsByNameRequest::class, ['abc'], 'GET', '/dockitems/name/abc', 'one', null, false, false],
    'DockItems\\UpdateDockItemByIdRequest' => [UpdateDockItemByIdRequest::class, [7], 'PUT', '/dockitems/id/7', 'one', null, true, false],
    'Ebooks\\CreateEBookByIdRequest' => [CreateEBookByIdRequest::class, [7], 'POST', '/ebooks/id/7', 'one', null, true, false],
    'Ebooks\\DeleteEBookByIdRequest' => [DeleteEBookByIdRequest::class, [7], 'DELETE', '/ebooks/id/7', 'none', null, false, false],
    'Ebooks\\FindEBooksRequest' => [FindEBooksRequest::class, [], 'GET', '/ebooks', 'list', null, false, false],
    'Ebooks\\FindEBooksByIdRequest' => [FindEBooksByIdRequest::class, [7], 'GET', '/ebooks/id/7', 'one', null, false, false],
    'Ebooks\\FindEBooksByNameRequest' => [FindEBooksByNameRequest::class, ['abc'], 'GET', '/ebooks/name/abc', 'one', null, false, false],
    'Ebooks\\FindEbookssByIdSubsetRequest' => [FindEbookssByIdSubsetRequest::class, [7, 'abc'], 'GET', '/ebooks/id/7/subset/abc', 'one', null, false, false],
    'Ebooks\\UpdateEBookByIdRequest' => [UpdateEBookByIdRequest::class, [7], 'PUT', '/ebooks/id/7', 'one', null, true, false],
    'FileUploads\\UploadFilesRequest' => [UploadFilesRequest::class, ['abc', 'abc', 7, 'contents'], 'POST', '/fileuploads/abc/abc/7', 'none', null, true, false],
    'GsxConnection\\FindGSXConnectionRequest' => [FindGSXConnectionRequest::class, [], 'GET', '/gsxconnection', 'list', null, false, false],
    'GsxConnection\\UpdateGSXConnectionRequest' => [UpdateGSXConnectionRequest::class, [], 'PUT', '/gsxconnection', 'one', null, true, false],
    'HealthcareListenerRules\\CreateHealthCareListenerRuleByIdRequest' => [CreateHealthCareListenerRuleByIdRequest::class, [7], 'POST', '/healthcarelistenerrule/id/7', 'one', null, true, false],
    'HealthcareListenerRules\\FindHealthcareListenerRuleRequest' => [FindHealthcareListenerRuleRequest::class, [], 'GET', '/healthcarelistenerrule', 'list', null, false, false],
    'HealthcareListenerRules\\FindHealthcareListenerRulesByIdRequest' => [FindHealthcareListenerRulesByIdRequest::class, [7], 'GET', '/healthcarelistenerrule/id/7', 'one', null, false, false],
    'HealthcareListenerRules\\UpdateHealthCareListenerRuleByIdRequest' => [UpdateHealthCareListenerRuleByIdRequest::class, [7], 'PUT', '/healthcarelistenerrule/id/7', 'one', null, true, false],
    'HealthcareListeners\\FindHealthcareListenerRequest' => [FindHealthcareListenerRequest::class, [], 'GET', '/healthcarelistener', 'list', null, false, false],
    'HealthcareListeners\\FindHealthcareListenersByIdRequest' => [FindHealthcareListenersByIdRequest::class, [7], 'GET', '/healthcarelistener/id/7', 'one', null, false, false],
    'HealthcareListeners\\UpdateHealthCareListenerByIdRequest' => [UpdateHealthCareListenerByIdRequest::class, [7], 'PUT', '/healthcarelistener/id/7', 'one', null, true, false],
    'IBeacons\\CreateIBeaconByIdRequest' => [CreateIBeaconByIdRequest::class, [7], 'POST', '/ibeacons/id/7', 'one', null, true, false],
    'IBeacons\\DeleteIBeaconByIdRequest' => [DeleteIBeaconByIdRequest::class, [7], 'DELETE', '/ibeacons/id/7', 'none', null, false, false],
    'IBeacons\\FindIBeaconsRequest' => [FindIBeaconsRequest::class, [], 'GET', '/ibeacons', 'list', null, false, false],
    'IBeacons\\FindIBeaconsByIdRequest' => [FindIBeaconsByIdRequest::class, [7], 'GET', '/ibeacons/id/7', 'one', null, false, false],
    'IBeacons\\FindIBeaconsByNameRequest' => [FindIBeaconsByNameRequest::class, ['abc'], 'GET', '/ibeacons/name/abc', 'one', null, false, false],
    'IBeacons\\UpdateIBeaconByIdRequest' => [UpdateIBeaconByIdRequest::class, [7], 'PUT', '/ibeacons/id/7', 'one', null, true, false],
    'InfrastructureManagers\\FindInfrastructureManagerRequest' => [FindInfrastructureManagerRequest::class, [], 'GET', '/infrastructuremanager', 'list', null, false, false],
    'InfrastructureManagers\\FindInfrastructureManagerByIdRequest' => [FindInfrastructureManagerByIdRequest::class, [7], 'GET', '/infrastructuremanager/id/7', 'one', null, false, false],
    'InfrastructureManagers\\UpdateInfrastructureManagerByIdRequest' => [UpdateInfrastructureManagerByIdRequest::class, [7], 'PUT', '/infrastructuremanager/id/7', 'one', null, true, false],
    'JsonWebTokenConfigurations\\CreateJsonWebTokenConfigurationByIdRequest' => [CreateJsonWebTokenConfigurationByIdRequest::class, [7], 'POST', '/jsonwebtokenconfigurations/id/7', 'one', null, true, false],
    'JsonWebTokenConfigurations\\DeleteJsonWebTokenConfigurationByIdRequest' => [DeleteJsonWebTokenConfigurationByIdRequest::class, [7], 'DELETE', '/jsonwebtokenconfigurations/id/7', 'none', null, false, false],
    'JsonWebTokenConfigurations\\FindJsonWebTokenConfigurationByIdRequest' => [FindJsonWebTokenConfigurationByIdRequest::class, [7], 'GET', '/jsonwebtokenconfigurations/id/7', 'one', null, false, false],
    'JsonWebTokenConfigurations\\FindJsonWebTokenConfigurationsRequest' => [FindJsonWebTokenConfigurationsRequest::class, [], 'GET', '/jsonwebtokenconfigurations', 'list', null, false, false],
    'JsonWebTokenConfigurations\\UpdateJsonWebTokenConfigurationByIdRequest' => [UpdateJsonWebTokenConfigurationByIdRequest::class, [7], 'PUT', '/jsonwebtokenconfigurations/id/7', 'one', null, true, false],
    'JssUser\\FindjssuserRequest' => [FindjssuserRequest::class, [], 'GET', '/jssuser', 'list', null, false, false],
    'LdapServers\\CreateLDAPServerByIdRequest' => [CreateLDAPServerByIdRequest::class, [7], 'POST', '/ldapservers/id/7', 'one', null, true, false],
    'LdapServers\\DeleteLDAPServerByIdRequest' => [DeleteLDAPServerByIdRequest::class, [7], 'DELETE', '/ldapservers/id/7', 'none', null, false, false],
    'LdapServers\\FindLDAPServerGroupRequest' => [FindLDAPServerGroupRequest::class, [7, 'abc'], 'GET', '/ldapservers/id/7/group/abc', 'one', null, false, false],
    'LdapServers\\FindLDAPServerGroupUserRequest' => [FindLDAPServerGroupUserRequest::class, [7, 'abc', 'abc'], 'GET', '/ldapservers/id/7/group/abc/user/abc', 'one', null, false, false],
    'LdapServers\\FindLDAPServerUserRequest' => [FindLDAPServerUserRequest::class, [7, 'abc'], 'GET', '/ldapservers/id/7/user/abc', 'one', null, false, false],
    'LdapServers\\FindLDAPServersRequest' => [FindLDAPServersRequest::class, [], 'GET', '/ldapservers', 'list', null, false, false],
    'LdapServers\\FindLDAPServersByIdRequest' => [FindLDAPServersByIdRequest::class, [7], 'GET', '/ldapservers/id/7', 'one', null, false, false],
    'LdapServers\\FindLDAPServersByNameRequest' => [FindLDAPServersByNameRequest::class, ['abc'], 'GET', '/ldapservers/name/abc', 'one', null, false, false],
    'LdapServers\\UpdateLDAPServerByIdRequest' => [UpdateLDAPServerByIdRequest::class, [7], 'PUT', '/ldapservers/id/7', 'one', null, true, false],
    'LicensedSoftware\\CreateLicensedSoftwareByIdRequest' => [CreateLicensedSoftwareByIdRequest::class, [7], 'POST', '/licensedsoftware/id/7', 'one', null, true, false],
    'LicensedSoftware\\DeleteLicensedSoftwareByIdRequest' => [DeleteLicensedSoftwareByIdRequest::class, [7], 'DELETE', '/licensedsoftware/id/7', 'none', null, false, false],
    'LicensedSoftware\\FindLicensedSoftwareRequest' => [FindLicensedSoftwareRequest::class, [], 'GET', '/licensedsoftware', 'list', null, false, false],
    'LicensedSoftware\\FindLicensedSoftwareByIdRequest' => [FindLicensedSoftwareByIdRequest::class, [7], 'GET', '/licensedsoftware/id/7', 'one', null, false, false],
    'LicensedSoftware\\FindLicensedSoftwareByNameRequest' => [FindLicensedSoftwareByNameRequest::class, ['abc'], 'GET', '/licensedsoftware/name/abc', 'one', null, false, false],
    'LicensedSoftware\\UpdateLicensedSoftwareByIdRequest' => [UpdateLicensedSoftwareByIdRequest::class, [7], 'PUT', '/licensedsoftware/id/7', 'one', null, true, false],
    'LogFlush\\CreateLogFlushForIntervalRequest' => [CreateLogFlushForIntervalRequest::class, ['abc', 'abc'], 'DELETE', '/logflush/abc/interval/abc', 'none', null, false, false],
    'LogFlush\\CreateLogFlushWithIdAndIntervalRequest' => [CreateLogFlushWithIdAndIntervalRequest::class, ['abc', 7, 'abc'], 'DELETE', '/logflush/abc/id/7/interval/abc', 'none', null, false, false],
    'LogFlush\\LogFlushRequest' => [LogFlushRequest::class, [], 'DELETE', '/logflush', 'none', null, false, false],
    'MacApplications\\CreateMacappByIdRequest' => [CreateMacappByIdRequest::class, [7], 'POST', '/macapplications/id/7', 'one', null, true, false],
    'MacApplications\\DeleteMacappByIdRequest' => [DeleteMacappByIdRequest::class, [7], 'DELETE', '/macapplications/id/7', 'none', null, false, false],
    'MacApplications\\FindMacappsRequest' => [FindMacappsRequest::class, [], 'GET', '/macapplications', 'list', null, false, false],
    'MacApplications\\FindMacappsByIdRequest' => [FindMacappsByIdRequest::class, [7], 'GET', '/macapplications/id/7', 'one', null, false, false],
    'MacApplications\\FindMacappsByIdSubsetRequest' => [FindMacappsByIdSubsetRequest::class, [7, 'abc'], 'GET', '/macapplications/id/7/subset/abc', 'one', null, false, false],
    'MacApplications\\FindMacappsByNameRequest' => [FindMacappsByNameRequest::class, ['abc'], 'GET', '/macapplications/name/abc', 'one', null, false, false],
    'MacApplications\\UpdateMacappByIdRequest' => [UpdateMacappByIdRequest::class, [7], 'PUT', '/macapplications/id/7', 'one', null, true, false],
    'MobileDeviceApplications\\CreateMobileDeviceApplicationByIdRequest' => [CreateMobileDeviceApplicationByIdRequest::class, [7], 'POST', '/mobiledeviceapplications/id/7', 'one', null, true, false],
    'MobileDeviceApplications\\DeleteMobileDeviceApplicationByIdRequest' => [DeleteMobileDeviceApplicationByIdRequest::class, [7], 'DELETE', '/mobiledeviceapplications/id/7', 'none', null, false, false],
    'MobileDeviceApplications\\FindMobileDeviceApplicationsRequest' => [FindMobileDeviceApplicationsRequest::class, [], 'GET', '/mobiledeviceapplications', 'list', null, false, false],
    'MobileDeviceApplications\\FindMobileDeviceApplicationsByBundleIDRequest' => [FindMobileDeviceApplicationsByBundleIDRequest::class, ['abc'], 'GET', '/mobiledeviceapplications/bundleid/abc', 'one', null, false, false],
    'MobileDeviceApplications\\FindMobileDeviceApplicationsByBundleIDandVersionRequest' => [FindMobileDeviceApplicationsByBundleIDandVersionRequest::class, ['abc', 'abc'], 'GET', '/mobiledeviceapplications/bundleid/abc/version/abc', 'one', null, false, false],
    'MobileDeviceApplications\\FindMobileDeviceApplicationsByIdRequest' => [FindMobileDeviceApplicationsByIdRequest::class, [7], 'GET', '/mobiledeviceapplications/id/7', 'one', null, false, false],
    'MobileDeviceApplications\\FindMobileDeviceApplicationsByNameRequest' => [FindMobileDeviceApplicationsByNameRequest::class, ['abc'], 'GET', '/mobiledeviceapplications/name/abc', 'one', null, false, false],
    'MobileDeviceApplications\\FindMobileDeviceAppsByIdSubsetRequest' => [FindMobileDeviceAppsByIdSubsetRequest::class, [7, 'abc'], 'GET', '/mobiledeviceapplications/id/7/subset/abc', 'one', null, false, false],
    'MobileDeviceApplications\\UpdateMobileDeviceApplicationByIdRequest' => [UpdateMobileDeviceApplicationByIdRequest::class, [7], 'PUT', '/mobiledeviceapplications/id/7', 'one', null, true, false],
    'MobileDeviceCommands\\CreateMobileDeviceCommandRequest' => [CreateMobileDeviceCommandRequest::class, [], 'POST', '/mobiledevicecommands/command', 'one', null, true, false],
    'MobileDeviceCommands\\CreateMobileDeviceCommandByCommandRequest' => [CreateMobileDeviceCommandByCommandRequest::class, ['abc'], 'POST', '/mobiledevicecommands/command/abc', 'one', null, true, false],
    'MobileDeviceCommands\\CreateMobileDeviceCommandURLRequest' => [CreateMobileDeviceCommandURLRequest::class, ['abc', 'abc'], 'POST', '/mobiledevicecommands/command/abc/id/abc', 'one', null, true, false],
    'MobileDeviceCommands\\CreateMobileDeviceNameCommandURLRequest' => [CreateMobileDeviceNameCommandURLRequest::class, ['abc', 'abc'], 'POST', '/mobiledevicecommands/command/DeviceName/abc/id/abc', 'one', null, true, false],
    'MobileDeviceCommands\\CreateMobileScheduleOSUpdateCommandURLRequest' => [CreateMobileScheduleOSUpdateCommandURLRequest::class, ['abc', 'abc'], 'POST', '/mobiledevicecommands/command/ScheduleOSUpdate/abc/id/abc', 'one', null, true, false],
    'MobileDeviceCommands\\CreateMobileScheduleOSUpdateCommandWithProductVersionURLRequest' => [CreateMobileScheduleOSUpdateCommandWithProductVersionURLRequest::class, ['abc', 'abc', 'abc'], 'POST', '/mobiledevicecommands/command/ScheduleOSUpdate/abc/abc/id/abc', 'one', null, true, false],
    'MobileDeviceCommands\\FindMobileDeviceCommandsRequest' => [FindMobileDeviceCommandsRequest::class, [], 'GET', '/mobiledevicecommands', 'list', null, false, false],
    'MobileDeviceCommands\\FindMobileDeviceCommandsByCommandRequest' => [FindMobileDeviceCommandsByCommandRequest::class, ['abc'], 'GET', '/mobiledevicecommands/command/abc', 'one', null, false, false],
    'MobileDeviceCommands\\FindMobileDeviceCommandsByNameRequest' => [FindMobileDeviceCommandsByNameRequest::class, ['abc'], 'GET', '/mobiledevicecommands/name/abc', 'one', null, false, false],
    'MobileDeviceCommands\\FindMobileDeviceCommandsByUuidRequest' => [FindMobileDeviceCommandsByUuidRequest::class, ['abc'], 'GET', '/mobiledevicecommands/uuid/abc', 'one', null, false, false],
    'MobileDeviceConfigurationProfiles\\CreateMobileDeviceConfigurationProfileByIdRequest' => [CreateMobileDeviceConfigurationProfileByIdRequest::class, [7], 'POST', '/mobiledeviceconfigurationprofiles/id/7', 'one', null, true, false],
    'MobileDeviceConfigurationProfiles\\DeleteMobileDeviceConfigurationProfileByIdRequest' => [DeleteMobileDeviceConfigurationProfileByIdRequest::class, [7], 'DELETE', '/mobiledeviceconfigurationprofiles/id/7', 'none', null, false, false],
    'MobileDeviceConfigurationProfiles\\FindMobileDeviceConfigurationProfilesRequest' => [FindMobileDeviceConfigurationProfilesRequest::class, [], 'GET', '/mobiledeviceconfigurationprofiles', 'list', null, false, false],
    'MobileDeviceConfigurationProfiles\\FindMobileDeviceConfigurationProfilesByIdRequest' => [FindMobileDeviceConfigurationProfilesByIdRequest::class, [7], 'GET', '/mobiledeviceconfigurationprofiles/id/7', 'one', null, false, false],
    'MobileDeviceConfigurationProfiles\\FindMobileDeviceConfigurationProfilesByIdSubsetRequest' => [FindMobileDeviceConfigurationProfilesByIdSubsetRequest::class, [7, 'abc'], 'GET', '/mobiledeviceconfigurationprofiles/id/7/subset/abc', 'one', null, false, false],
    'MobileDeviceConfigurationProfiles\\FindMobileDeviceConfigurationProfilesByNameRequest' => [FindMobileDeviceConfigurationProfilesByNameRequest::class, ['abc'], 'GET', '/mobiledeviceconfigurationprofiles/name/abc', 'one', null, false, false],
    'MobileDeviceConfigurationProfiles\\UpdateMobileDeviceConfigurationProfileByIdRequest' => [UpdateMobileDeviceConfigurationProfileByIdRequest::class, [7], 'PUT', '/mobiledeviceconfigurationprofiles/id/7', 'one', null, true, false],
    'MobileDeviceEnrollmentProfiles\\CreateMobileDeviceEnrollmentProfilesByIdRequest' => [CreateMobileDeviceEnrollmentProfilesByIdRequest::class, [7], 'POST', '/mobiledeviceenrollmentprofiles/id/7', 'one', null, true, false],
    'MobileDeviceEnrollmentProfiles\\DeleteMobileDeviceEnrollmentProfileByIdRequest' => [DeleteMobileDeviceEnrollmentProfileByIdRequest::class, [7], 'DELETE', '/mobiledeviceenrollmentprofiles/id/7', 'none', null, false, false],
    'MobileDeviceEnrollmentProfiles\\FindMobileDeviceEnrollmentProfilesRequest' => [FindMobileDeviceEnrollmentProfilesRequest::class, [], 'GET', '/mobiledeviceenrollmentprofiles', 'list', null, false, false],
    'MobileDeviceEnrollmentProfiles\\FindMobileDeviceEnrollmentProfilesByIdRequest' => [FindMobileDeviceEnrollmentProfilesByIdRequest::class, [7], 'GET', '/mobiledeviceenrollmentprofiles/id/7', 'one', null, false, false],
    'MobileDeviceEnrollmentProfiles\\FindMobileDeviceEnrollmentProfilesByIdSubsetRequest' => [FindMobileDeviceEnrollmentProfilesByIdSubsetRequest::class, [7, 'abc'], 'GET', '/mobiledeviceenrollmentprofiles/id/7/subset/abc', 'one', null, false, false],
    'MobileDeviceEnrollmentProfiles\\FindMobileDeviceEnrollmentProfilesByInvitationRequest' => [FindMobileDeviceEnrollmentProfilesByInvitationRequest::class, ['abc'], 'GET', '/mobiledeviceenrollmentprofiles/name/abc', 'one', null, false, false],
    'MobileDeviceEnrollmentProfiles\\FindMobileDeviceEnrollmentProfilesByNameRequest' => [FindMobileDeviceEnrollmentProfilesByNameRequest::class, ['abc'], 'GET', '/mobiledeviceenrollmentprofiles/invitation/abc', 'one', null, false, false],
    'MobileDeviceEnrollmentProfiles\\UpdateMobileDeviceEnrollmentProfileByIdRequest' => [UpdateMobileDeviceEnrollmentProfileByIdRequest::class, [7], 'PUT', '/mobiledeviceenrollmentprofiles/id/7', 'one', null, true, false],
    'MobileDeviceExtensionAttributes\\CreateMobiledeviceextensionattributeByIdRequest' => [CreateMobiledeviceextensionattributeByIdRequest::class, [7], 'POST', '/mobiledeviceextensionattributes/id/7', 'one', null, true, false],
    'MobileDeviceExtensionAttributes\\DeleteMobiledeviceextensionattributeByIdRequest' => [DeleteMobiledeviceextensionattributeByIdRequest::class, [7], 'DELETE', '/mobiledeviceextensionattributes/id/7', 'none', null, false, false],
    'MobileDeviceExtensionAttributes\\FindMobiledeviceextensionattributesRequest' => [FindMobiledeviceextensionattributesRequest::class, [], 'GET', '/mobiledeviceextensionattributes', 'list', null, false, false],
    'MobileDeviceExtensionAttributes\\FindMobiledeviceextensionattributesByIdRequest' => [FindMobiledeviceextensionattributesByIdRequest::class, [7], 'GET', '/mobiledeviceextensionattributes/id/7', 'one', null, false, false],
    'MobileDeviceExtensionAttributes\\FindMobiledeviceextensionattributesByNameRequest' => [FindMobiledeviceextensionattributesByNameRequest::class, ['abc'], 'GET', '/mobiledeviceextensionattributes/name/abc', 'one', null, false, false],
    'MobileDeviceExtensionAttributes\\UpdateMobiledeviceextensionattributeByIdRequest' => [UpdateMobiledeviceextensionattributeByIdRequest::class, [7], 'PUT', '/mobiledeviceextensionattributes/id/7', 'one', null, true, false],
    'MobileDeviceGroups\\CreateMobileDeviceGroupByIdRequest' => [CreateMobileDeviceGroupByIdRequest::class, [7], 'POST', '/mobiledevicegroups/id/7', 'one', null, true, false],
    'MobileDeviceGroups\\DeleteMobileDeviceGroupByIdRequest' => [DeleteMobileDeviceGroupByIdRequest::class, [7], 'DELETE', '/mobiledevicegroups/id/7', 'none', null, false, false],
    'MobileDeviceGroups\\FindMobileDeviceGroupsRequest' => [FindMobileDeviceGroupsRequest::class, [], 'GET', '/mobiledevicegroups', 'list', null, false, false],
    'MobileDeviceGroups\\FindMobileDeviceGroupsByIdRequest' => [FindMobileDeviceGroupsByIdRequest::class, [7], 'GET', '/mobiledevicegroups/id/7', 'one', null, false, false],
    'MobileDeviceGroups\\FindMobileDeviceGroupsByNameRequest' => [FindMobileDeviceGroupsByNameRequest::class, ['abc'], 'GET', '/mobiledevicegroups/name/abc', 'one', null, false, false],
    'MobileDeviceGroups\\UpdateMobileDeviceGroupByIdRequest' => [UpdateMobileDeviceGroupByIdRequest::class, [7], 'PUT', '/mobiledevicegroups/id/7', 'one', null, true, false],
    'MobileDeviceHistory\\FindMobileDeviceHistoryByIdRequest' => [FindMobileDeviceHistoryByIdRequest::class, [7], 'GET', '/mobiledevicehistory/id/7', 'one', null, false, false],
    'MobileDeviceHistory\\FindMobileDeviceHistoryByIdSubsetRequest' => [FindMobileDeviceHistoryByIdSubsetRequest::class, [7, 'abc'], 'GET', '/mobiledevicehistory/id/7/subset/abc', 'one', null, false, false],
    'MobileDeviceHistory\\FindMobileDeviceHistoryByMacAddressRequest' => [FindMobileDeviceHistoryByMacAddressRequest::class, ['abc'], 'GET', '/mobiledevicehistory/macaddress/abc', 'one', null, false, false],
    'MobileDeviceHistory\\FindMobileDeviceHistoryByNameRequest' => [FindMobileDeviceHistoryByNameRequest::class, ['abc'], 'GET', '/mobiledevicehistory/name/abc', 'one', null, false, false],
    'MobileDeviceHistory\\FindMobileDeviceHistoryBySerialNumberRequest' => [FindMobileDeviceHistoryBySerialNumberRequest::class, ['abc'], 'GET', '/mobiledevicehistory/serialnumber/abc', 'one', null, false, false],
    'MobileDeviceHistory\\FindMobileDeviceHistoryByUDIDRequest' => [FindMobileDeviceHistoryByUDIDRequest::class, ['abc'], 'GET', '/mobiledevicehistory/udid/abc', 'one', null, false, false],
    'MobileDeviceInvitations\\CreateMobileDeviceInvitationByIdRequest' => [CreateMobileDeviceInvitationByIdRequest::class, [7], 'POST', '/mobiledeviceinvitations/id/7', 'one', null, true, false],
    'MobileDeviceInvitations\\DeleteMobileDeviceInvitationByIdRequest' => [DeleteMobileDeviceInvitationByIdRequest::class, [7], 'DELETE', '/mobiledeviceinvitations/id/7', 'none', null, false, false],
    'MobileDeviceInvitations\\FindMobileDeviceInvitationsRequest' => [FindMobileDeviceInvitationsRequest::class, [], 'GET', '/mobiledeviceinvitations', 'list', null, false, false],
    'MobileDeviceInvitations\\FindMobileDeviceInvitationsByIdRequest' => [FindMobileDeviceInvitationsByIdRequest::class, [7], 'GET', '/mobiledeviceinvitations/id/7', 'one', null, false, false],
    'MobileDeviceInvitations\\FindMobileDeviceInvitationsByInvitationRequest' => [FindMobileDeviceInvitationsByInvitationRequest::class, ['abc'], 'GET', '/mobiledeviceinvitations/invitation/abc', 'one', null, false, false],
    'MobileDeviceProvisioningProfiles\\CreateMobileDeviceProvisioningProfileByIdRequest' => [CreateMobileDeviceProvisioningProfileByIdRequest::class, [7], 'POST', '/mobiledeviceprovisioningprofiles/id/7', 'one', null, true, false],
    'MobileDeviceProvisioningProfiles\\DeleteMobileDeviceProvisioningProfileByIdRequest' => [DeleteMobileDeviceProvisioningProfileByIdRequest::class, [7], 'DELETE', '/mobiledeviceprovisioningprofiles/id/7', 'none', null, false, false],
    'MobileDeviceProvisioningProfiles\\FindMobileDeviceProvisioningProfileByIdSubsetRequest' => [FindMobileDeviceProvisioningProfileByIdSubsetRequest::class, [7, 'abc'], 'GET', '/mobiledeviceprovisioningprofiles/id/7/subset/abc', 'one', null, false, false],
    'MobileDeviceProvisioningProfiles\\FindMobileDeviceProvisioningProfilesRequest' => [FindMobileDeviceProvisioningProfilesRequest::class, [], 'GET', '/mobiledeviceprovisioningprofiles', 'list', null, false, false],
    'MobileDeviceProvisioningProfiles\\FindMobileDeviceProvisioningProfilesByIdRequest' => [FindMobileDeviceProvisioningProfilesByIdRequest::class, [7], 'GET', '/mobiledeviceprovisioningprofiles/id/7', 'one', null, false, false],
    'MobileDeviceProvisioningProfiles\\FindMobileDeviceProvisioningProfilesByNameRequest' => [FindMobileDeviceProvisioningProfilesByNameRequest::class, ['abc'], 'GET', '/mobiledeviceprovisioningprofiles/name/abc', 'one', null, false, false],
    'MobileDeviceProvisioningProfiles\\FindMobileDeviceProvisioningProfilesByUUIDRequest' => [FindMobileDeviceProvisioningProfilesByUUIDRequest::class, ['abc'], 'GET', '/mobiledeviceprovisioningprofiles/uuid/abc', 'one', null, false, false],
    'MobileDeviceProvisioningProfiles\\UpdateMobileDeviceProvisioningProfileByIdRequest' => [UpdateMobileDeviceProvisioningProfileByIdRequest::class, [7], 'PUT', '/mobiledeviceprovisioningprofiles/id/7', 'one', null, true, false],
    'MobileDevices\\CreateMobileDeviceByIdRequest' => [CreateMobileDeviceByIdRequest::class, [7], 'POST', '/mobiledevices/id/7', 'one', null, true, false],
    'MobileDevices\\DeleteMobileDeviceByIdRequest' => [DeleteMobileDeviceByIdRequest::class, [7], 'DELETE', '/mobiledevices/id/7', 'none', null, false, false],
    'MobileDevices\\FindMobileDevicesRequest' => [FindMobileDevicesRequest::class, [], 'GET', '/mobiledevices', 'list', null, false, false],
    'MobileDevices\\FindMobileDevicesByIdRequest' => [FindMobileDevicesByIdRequest::class, [7], 'GET', '/mobiledevices/id/7', 'one', null, false, false],
    'MobileDevices\\FindMobileDevicesByIdSubsetRequest' => [FindMobileDevicesByIdSubsetRequest::class, [7, 'abc'], 'GET', '/mobiledevices/id/7/subset/abc', 'one', null, false, false],
    'MobileDevices\\FindMobileDevicesByMacAddressRequest' => [FindMobileDevicesByMacAddressRequest::class, ['abc'], 'GET', '/mobiledevices/macaddress/abc', 'one', null, false, false],
    'MobileDevices\\FindMobileDevicesByNameRequest' => [FindMobileDevicesByNameRequest::class, ['abc'], 'GET', '/mobiledevices/name/abc', 'one', null, false, false],
    'MobileDevices\\FindMobileDevicesBySerialNumberRequest' => [FindMobileDevicesBySerialNumberRequest::class, ['abc'], 'GET', '/mobiledevices/serialnumber/abc', 'one', null, false, false],
    'MobileDevices\\FindMobileDevicesByUDIDRequest' => [FindMobileDevicesByUDIDRequest::class, ['abc'], 'GET', '/mobiledevices/udid/abc', 'one', null, false, false],
    'MobileDevices\\MatchMobileDevicesRequest' => [MatchMobileDevicesRequest::class, ['abc'], 'GET', '/mobiledevices/match/abc', 'list', null, false, false],
    'MobileDevices\\UpdateMobileDeviceByIdRequest' => [UpdateMobileDeviceByIdRequest::class, [7], 'PUT', '/mobiledevices/id/7', 'one', null, true, false],
    'NetworkSegments\\CreateNetworkSegmentByIdRequest' => [CreateNetworkSegmentByIdRequest::class, [7], 'POST', '/networksegments/id/7', 'one', null, true, false],
    'NetworkSegments\\DeleteNetworkSegmentByIdRequest' => [DeleteNetworkSegmentByIdRequest::class, [7], 'DELETE', '/networksegments/id/7', 'none', null, false, false],
    'NetworkSegments\\FindNetworkSegmentsRequest' => [FindNetworkSegmentsRequest::class, [], 'GET', '/networksegments', 'list', null, false, false],
    'NetworkSegments\\FindNetworkSegmentsByIdRequest' => [FindNetworkSegmentsByIdRequest::class, [7], 'GET', '/networksegments/id/7', 'one', null, false, false],
    'NetworkSegments\\FindNetworkSegmentsByNameRequest' => [FindNetworkSegmentsByNameRequest::class, ['abc'], 'GET', '/networksegments/name/abc', 'one', null, false, false],
    'NetworkSegments\\UpdateNetworkSegmentByIdRequest' => [UpdateNetworkSegmentByIdRequest::class, [7], 'PUT', '/networksegments/id/7', 'one', null, true, false],
    'OsxConfigurationProfiles\\CreateOsxConfigurationProfileByIdRequest' => [CreateOsxConfigurationProfileByIdRequest::class, [7], 'POST', '/osxconfigurationprofiles/id/7', 'one', null, true, false],
    'OsxConfigurationProfiles\\DeleteOsxConfigurationProfileByIdRequest' => [DeleteOsxConfigurationProfileByIdRequest::class, [7], 'DELETE', '/osxconfigurationprofiles/id/7', 'none', null, false, false],
    'OsxConfigurationProfiles\\FindOsxConfigurationProfilesRequest' => [FindOsxConfigurationProfilesRequest::class, [], 'GET', '/osxconfigurationprofiles', 'list', null, false, false],
    'OsxConfigurationProfiles\\FindOsxConfigurationProfilesByIdRequest' => [FindOsxConfigurationProfilesByIdRequest::class, [7], 'GET', '/osxconfigurationprofiles/id/7', 'one', null, false, false],
    'OsxConfigurationProfiles\\FindOsxConfigurationProfilesByIdSubsetRequest' => [FindOsxConfigurationProfilesByIdSubsetRequest::class, [7, 'abc'], 'GET', '/osxconfigurationprofiles/id/7/subset/abc', 'one', null, false, false],
    'OsxConfigurationProfiles\\FindOsxConfigurationProfilesByNameRequest' => [FindOsxConfigurationProfilesByNameRequest::class, ['abc'], 'GET', '/osxconfigurationprofiles/name/abc', 'one', null, false, false],
    'OsxConfigurationProfiles\\UpdateOsxConfigurationProfileByIdRequest' => [UpdateOsxConfigurationProfileByIdRequest::class, [7], 'PUT', '/osxconfigurationprofiles/id/7', 'one', null, true, false],
    'Packages\\CreatePackageByIdRequest' => [CreatePackageByIdRequest::class, [7], 'POST', '/packages/id/7', 'one', null, true, false],
    'Packages\\DeletePackageByIdRequest' => [DeletePackageByIdRequest::class, [7], 'DELETE', '/packages/id/7', 'none', null, false, false],
    'Packages\\FindPackagesRequest' => [FindPackagesRequest::class, [], 'GET', '/packages', 'list', null, false, false],
    'Packages\\FindPackagesByIdRequest' => [FindPackagesByIdRequest::class, [7], 'GET', '/packages/id/7', 'one', null, false, false],
    'Packages\\FindPackagesByNameRequest' => [FindPackagesByNameRequest::class, ['abc'], 'GET', '/packages/name/abc', 'one', null, false, false],
    'Packages\\UpdatePackageByIdRequest' => [UpdatePackageByIdRequest::class, [7], 'PUT', '/packages/id/7', 'one', null, true, false],
    'PatchAvailableTitles\\FindAvailableTitlesBySourceIdRequest' => [FindAvailableTitlesBySourceIdRequest::class, [7], 'GET', '/patchavailabletitles/sourceid/7', 'one', null, false, false],
    'PatchExternalSources\\CreatePatchExternalSourcesByIdRequest' => [CreatePatchExternalSourcesByIdRequest::class, [7], 'POST', '/patchexternalsources/id/7', 'one', null, true, false],
    'PatchExternalSources\\FindPatchExternalSourcesRequest' => [FindPatchExternalSourcesRequest::class, [], 'GET', '/patchexternalsources', 'list', null, false, false],
    'PatchExternalSources\\FindPatchExternalSourcesByIdRequest' => [FindPatchExternalSourcesByIdRequest::class, [7], 'GET', '/patchexternalsources/id/7', 'one', null, false, false],
    'PatchExternalSources\\FindPatchExternalSourcesByNameRequest' => [FindPatchExternalSourcesByNameRequest::class, ['abc'], 'GET', '/patchexternalsources/name/abc', 'one', null, false, false],
    'PatchExternalSources\\UpdatePatchExternalSourcesByIdRequest' => [UpdatePatchExternalSourcesByIdRequest::class, [7], 'PUT', '/patchexternalsources/id/7', 'one', null, true, false],
    'PatchInternalSources\\FindPatchInternalSourcesRequest' => [FindPatchInternalSourcesRequest::class, [], 'GET', '/patchinternalsources', 'list', null, false, false],
    'PatchInternalSources\\FindPatchInternalSourcesByIdRequest' => [FindPatchInternalSourcesByIdRequest::class, [7], 'GET', '/patchinternalsources/id/7', 'one', null, false, false],
    'PatchInternalSources\\FindPatchInternalSourcesByNameRequest' => [FindPatchInternalSourcesByNameRequest::class, ['abc'], 'GET', '/patchinternalsources/name/abc', 'one', null, false, false],
    'PatchPolicies\\CreatePatchPolicyBySoftwareTitleConfigIdRequest' => [CreatePatchPolicyBySoftwareTitleConfigIdRequest::class, [7], 'POST', '/patchpolicies/softwaretitleconfig/id/7', 'one', null, true, false],
    'PatchPolicies\\DeletePatchPolicyByIdRequest' => [DeletePatchPolicyByIdRequest::class, [7], 'DELETE', '/patchpolicies/id/7', 'none', null, false, false],
    'PatchPolicies\\FindPatchPoliciesRequest' => [FindPatchPoliciesRequest::class, [], 'GET', '/patchpolicies', 'list', null, false, false],
    'PatchPolicies\\FindPatchPoliciesByIdSubsetRequest' => [FindPatchPoliciesByIdSubsetRequest::class, [7, 'abc'], 'GET', '/patchpolicies/id/7/subset/abc', 'one', null, false, false],
    'PatchPolicies\\FindPatchPoliciesBySoftwareTitleConfigIdRequest' => [FindPatchPoliciesBySoftwareTitleConfigIdRequest::class, ['abc'], 'GET', '/patchpolicies/softwaretitleconfig/id/abc', 'one', null, false, false],
    'PatchPolicies\\FindPatchPolicyByIdRequest' => [FindPatchPolicyByIdRequest::class, [7], 'GET', '/patchpolicies/id/7', 'one', null, false, false],
    'PatchPolicies\\UpdatePatchPolicyByIdRequest' => [UpdatePatchPolicyByIdRequest::class, [7], 'PUT', '/patchpolicies/id/7', 'one', null, true, false],
    'PatchReports\\FindComputersByTitleVersionRequest' => [PatchReportsFindComputersByTitleVersionRequest::class, [7, 'abc'], 'GET', '/patchreports/patchsoftwaretitleid/7/version/abc', 'one', null, false, false],
    'PatchReports\\FindPatchReportsByPatchSoftwareTitleIdRequest' => [FindPatchReportsByPatchSoftwareTitleIdRequest::class, [7], 'GET', '/patchreports/patchsoftwaretitleid/7', 'one', null, false, false],
    'PatchSoftwareTitles\\CreatePatchSoftwareTitleByIdRequest' => [CreatePatchSoftwareTitleByIdRequest::class, [7], 'POST', '/patchsoftwaretitles/id/7', 'one', null, true, false],
    'PatchSoftwareTitles\\DeletePatchSoftwareTitlesByIdRequest' => [DeletePatchSoftwareTitlesByIdRequest::class, [7], 'DELETE', '/patchsoftwaretitles/id/7', 'none', null, false, false],
    'PatchSoftwareTitles\\FindPatchSoftwareTitlesRequest' => [FindPatchSoftwareTitlesRequest::class, [], 'GET', '/patchsoftwaretitles', 'list', null, false, false],
    'PatchSoftwareTitles\\FindPatchSoftwareTitlesByIdRequest' => [FindPatchSoftwareTitlesByIdRequest::class, [7], 'GET', '/patchsoftwaretitles/id/7', 'one', null, false, false],
    'PatchSoftwareTitles\\UpdatePatchSoftwareTitlesByIdRequest' => [UpdatePatchSoftwareTitlesByIdRequest::class, [7], 'PUT', '/patchsoftwaretitles/id/7', 'one', null, true, false],
    'Patches\\CreatePatchesByIdRequest' => [CreatePatchesByIdRequest::class, [7], 'POST', '/patches/id/7', 'one', null, true, false],
    'Patches\\DeleteSoftwareTitlesByIdRequest' => [DeleteSoftwareTitlesByIdRequest::class, [7], 'DELETE', '/patches/id/7', 'none', null, false, false],
    'Patches\\FindComputersByTitleVersionRequest' => [PatchesFindComputersByTitleVersionRequest::class, [7, 'abc'], 'GET', '/patches/id/7/version/abc', 'one', null, false, false],
    'Patches\\FindPatchesRequest' => [FindPatchesRequest::class, [], 'GET', '/patches', 'list', null, false, false],
    'Patches\\FindPatchesByIdRequest' => [FindPatchesByIdRequest::class, [7], 'GET', '/patches/id/7', 'one', null, false, false],
    'Patches\\FindPatchesByNameRequest' => [FindPatchesByNameRequest::class, ['abc'], 'GET', '/patches/name/abc', 'one', null, false, false],
    'Patches\\UpdateSoftwareTitlesByIdRequest' => [UpdateSoftwareTitlesByIdRequest::class, [7], 'PUT', '/patches/id/7', 'one', null, true, false],
    'PeripheralTypes\\CreatePeripheralTypeByIdRequest' => [CreatePeripheralTypeByIdRequest::class, [7], 'POST', '/peripheraltypes/id/7', 'one', null, true, false],
    'PeripheralTypes\\DeletePeripheralByIdRequest' => [PeripheralTypesDeletePeripheralByIdRequest::class, [7], 'DELETE', '/peripheraltypes/id/7', 'none', null, false, false],
    'PeripheralTypes\\FindPeripheralTypesRequest' => [FindPeripheralTypesRequest::class, [], 'GET', '/peripheraltypes', 'list', null, false, false],
    'PeripheralTypes\\FindPeripheralTypesByIdRequest' => [FindPeripheralTypesByIdRequest::class, [7], 'GET', '/peripheraltypes/id/7', 'one', null, false, false],
    'PeripheralTypes\\UpdatePeripheralTypeByIdRequest' => [UpdatePeripheralTypeByIdRequest::class, [7], 'PUT', '/peripheraltypes/id/7', 'one', null, true, false],
    'Peripherals\\CreatePeripheralByIdRequest' => [CreatePeripheralByIdRequest::class, [7], 'POST', '/peripherals/id/7', 'one', null, true, false],
    'Peripherals\\DeletePeripheralByIdRequest' => [PeripheralsDeletePeripheralByIdRequest::class, [7], 'DELETE', '/peripherals/id/7', 'none', null, false, false],
    'Peripherals\\FindPeripheralsRequest' => [FindPeripheralsRequest::class, [], 'GET', '/peripherals', 'list', null, false, false],
    'Peripherals\\FindPeripheralsByIdRequest' => [FindPeripheralsByIdRequest::class, [7], 'GET', '/peripherals/id/7', 'one', null, false, false],
    'Peripherals\\FindPeripheralsByIdSubsetRequest' => [FindPeripheralsByIdSubsetRequest::class, [7, 'abc'], 'GET', '/peripherals/id/7/subset/abc', 'one', null, false, false],
    'Peripherals\\UpdatePeripheralByIdRequest' => [UpdatePeripheralByIdRequest::class, [7], 'PUT', '/peripherals/id/7', 'one', null, true, false],
    'Policies\\CreatePolicyByIdRequest' => [CreatePolicyByIdRequest::class, [7], 'POST', '/policies/id/7', 'one', null, true, false],
    'Policies\\DeletePolicyByIdRequest' => [DeletePolicyByIdRequest::class, [7], 'DELETE', '/policies/id/7', 'none', null, false, false],
    'Policies\\FindPoliciesRequest' => [FindPoliciesRequest::class, [], 'GET', '/policies', 'list', null, false, false],
    'Policies\\FindPoliciesByCategoryRequest' => [FindPoliciesByCategoryRequest::class, ['abc'], 'GET', '/policies/category/abc', 'one', null, false, false],
    'Policies\\FindPoliciesByIdRequest' => [FindPoliciesByIdRequest::class, [7], 'GET', '/policies/id/7', 'one', null, false, false],
    'Policies\\FindPoliciesByIdSubsetRequest' => [FindPoliciesByIdSubsetRequest::class, [7, 'abc'], 'GET', '/policies/id/7/subset/abc', 'one', null, false, false],
    'Policies\\FindPoliciesByNameRequest' => [FindPoliciesByNameRequest::class, ['abc'], 'GET', '/policies/name/abc', 'one', null, false, false],
    'Policies\\FindPoliciesByTypeRequest' => [FindPoliciesByTypeRequest::class, ['abc'], 'GET', '/policies/createdBy/abc', 'one', null, false, false],
    'Policies\\UpdatePolicyByIdRequest' => [UpdatePolicyByIdRequest::class, [7], 'PUT', '/policies/id/7', 'one', null, true, false],
    'Printers\\CreatePrinterByIdRequest' => [CreatePrinterByIdRequest::class, [7], 'POST', '/printers/id/7', 'one', null, true, false],
    'Printers\\DeletePrinterByIdRequest' => [DeletePrinterByIdRequest::class, [7], 'DELETE', '/printers/id/7', 'none', null, false, false],
    'Printers\\FindPrintersRequest' => [FindPrintersRequest::class, [], 'GET', '/printers', 'list', null, false, false],
    'Printers\\FindPrintersByIdRequest' => [FindPrintersByIdRequest::class, [7], 'GET', '/printers/id/7', 'one', null, false, false],
    'Printers\\FindPrintersByNameRequest' => [FindPrintersByNameRequest::class, ['abc'], 'GET', '/printers/name/abc', 'one', null, false, false],
    'Printers\\UpdatePrinterByIdRequest' => [UpdatePrinterByIdRequest::class, [7], 'PUT', '/printers/id/7', 'one', null, true, false],
    'RemovableMacAddresses\\CreateRemovableMacAddressByIdRequest' => [CreateRemovableMacAddressByIdRequest::class, [7], 'POST', '/removablemacaddresses/id/7', 'one', null, true, false],
    'RemovableMacAddresses\\DeleteRemovableMacAddressByIdRequest' => [DeleteRemovableMacAddressByIdRequest::class, [7], 'DELETE', '/removablemacaddresses/id/7', 'none', null, false, false],
    'RemovableMacAddresses\\FindRemovableMacAddressesRequest' => [FindRemovableMacAddressesRequest::class, [], 'GET', '/removablemacaddresses', 'list', null, false, false],
    'RemovableMacAddresses\\FindRemovableMacAddressesByIdRequest' => [FindRemovableMacAddressesByIdRequest::class, [7], 'GET', '/removablemacaddresses/id/7', 'one', null, false, false],
    'RemovableMacAddresses\\FindRemovableMacAddressesByNameRequest' => [FindRemovableMacAddressesByNameRequest::class, ['abc'], 'GET', '/removablemacaddresses/name/abc', 'one', null, false, false],
    'RemovableMacAddresses\\UpdateRemovableMacAddressByIdRequest' => [UpdateRemovableMacAddressByIdRequest::class, [7], 'PUT', '/removablemacaddresses/id/7', 'one', null, true, false],
    'RestrictedSoftware\\CreateRestrictedSoftwareByIdRequest' => [CreateRestrictedSoftwareByIdRequest::class, [7], 'POST', '/restrictedsoftware/id/7', 'one', null, true, false],
    'RestrictedSoftware\\DeleteRestrictedSoftwareByIdRequest' => [DeleteRestrictedSoftwareByIdRequest::class, [7], 'DELETE', '/restrictedsoftware/id/7', 'none', null, false, false],
    'RestrictedSoftware\\FindRestrictedSoftwareRequest' => [FindRestrictedSoftwareRequest::class, [], 'GET', '/restrictedsoftware', 'list', null, false, false],
    'RestrictedSoftware\\FindRestrictedSoftwareByIdRequest' => [FindRestrictedSoftwareByIdRequest::class, [7], 'GET', '/restrictedsoftware/id/7', 'one', null, false, false],
    'RestrictedSoftware\\FindRestrictedSoftwareByNameRequest' => [FindRestrictedSoftwareByNameRequest::class, ['abc'], 'GET', '/restrictedsoftware/name/abc', 'one', null, false, false],
    'RestrictedSoftware\\UpdateRestrictedSoftwareByIdRequest' => [UpdateRestrictedSoftwareByIdRequest::class, [7], 'PUT', '/restrictedsoftware/id/7', 'one', null, true, false],
    'SavedSearches\\FindSavedSearchesRequest' => [FindSavedSearchesRequest::class, [], 'GET', '/savedsearches', 'list', null, false, false],
    'SavedSearches\\FindSavedSearchesByIdRequest' => [FindSavedSearchesByIdRequest::class, [7], 'GET', '/savedsearches/id/7', 'one', null, false, false],
    'SavedSearches\\FindSavedSearchesByNameRequest' => [FindSavedSearchesByNameRequest::class, ['abc'], 'GET', '/savedsearches/name/abc', 'one', null, false, false],
    'Scripts\\CreateScriptByIdRequest' => [CreateScriptByIdRequest::class, [7], 'POST', '/scripts/id/7', 'one', null, true, false],
    'Scripts\\DeleteScriptByIdRequest' => [DeleteScriptByIdRequest::class, [7], 'DELETE', '/scripts/id/7', 'none', null, false, false],
    'Scripts\\FindScriptsRequest' => [FindScriptsRequest::class, [], 'GET', '/scripts', 'list', null, false, false],
    'Scripts\\FindScriptsByIdRequest' => [FindScriptsByIdRequest::class, [7], 'GET', '/scripts/id/7', 'one', null, false, false],
    'Scripts\\FindScriptsByNameRequest' => [FindScriptsByNameRequest::class, ['abc'], 'GET', '/scripts/name/abc', 'one', null, false, false],
    'Scripts\\UpdateScriptByIdRequest' => [UpdateScriptByIdRequest::class, [7], 'PUT', '/scripts/id/7', 'one', null, true, false],
    'Sites\\CreateSiteByIdRequest' => [CreateSiteByIdRequest::class, [7], 'POST', '/sites/id/7', 'one', null, true, false],
    'Sites\\DeleteSiteByIdRequest' => [DeleteSiteByIdRequest::class, [7], 'DELETE', '/sites/id/7', 'none', null, false, false],
    'Sites\\FindSitesRequest' => [FindSitesRequest::class, [], 'GET', '/sites', 'list', null, false, false],
    'Sites\\FindSitesByIdRequest' => [FindSitesByIdRequest::class, [7], 'GET', '/sites/id/7', 'one', null, false, false],
    'Sites\\FindSitesByNameRequest' => [FindSitesByNameRequest::class, ['abc'], 'GET', '/sites/name/abc', 'one', null, false, false],
    'Sites\\UpdateSiteByIdRequest' => [UpdateSiteByIdRequest::class, [7], 'PUT', '/sites/id/7', 'one', null, true, false],
    'SmtpServer\\FindSMTPServerRequest' => [FindSMTPServerRequest::class, [], 'GET', '/smtpserver', 'list', null, false, false],
    'SmtpServer\\UpdateSMTPServerRequest' => [UpdateSMTPServerRequest::class, [], 'PUT', '/smtpserver', 'one', null, true, false],
    'SoftwareUpdateServers\\CreateSoftwareUpdateServerByIdRequest' => [CreateSoftwareUpdateServerByIdRequest::class, [7], 'POST', '/softwareupdateservers/id/7', 'one', null, true, false],
    'SoftwareUpdateServers\\DeleteSoftwareUpdateServerByIdRequest' => [DeleteSoftwareUpdateServerByIdRequest::class, [7], 'DELETE', '/softwareupdateservers/id/7', 'none', null, false, false],
    'SoftwareUpdateServers\\FindSoftwareUpdateServersRequest' => [FindSoftwareUpdateServersRequest::class, [], 'GET', '/softwareupdateservers', 'list', null, false, false],
    'SoftwareUpdateServers\\FindSoftwareUpdateServersByIdRequest' => [FindSoftwareUpdateServersByIdRequest::class, [7], 'GET', '/softwareupdateservers/id/7', 'one', null, false, false],
    'SoftwareUpdateServers\\FindSoftwareUpdateServersByNameRequest' => [FindSoftwareUpdateServersByNameRequest::class, ['abc'], 'GET', '/softwareupdateservers/name/abc', 'one', null, false, false],
    'SoftwareUpdateServers\\UpdateSoftwareUpdateServerByIdRequest' => [UpdateSoftwareUpdateServerByIdRequest::class, [7], 'PUT', '/softwareupdateservers/id/7', 'one', null, true, false],
    'UserExtensionAttributes\\CreateUserextensionattributeByIdRequest' => [CreateUserextensionattributeByIdRequest::class, [7], 'POST', '/userextensionattributes/id/7', 'one', null, true, false],
    'UserExtensionAttributes\\DeleteUserextensionattributeByIdRequest' => [DeleteUserextensionattributeByIdRequest::class, [7], 'DELETE', '/userextensionattributes/id/7', 'none', null, false, false],
    'UserExtensionAttributes\\FindUserextensionattributesRequest' => [FindUserextensionattributesRequest::class, [], 'GET', '/userextensionattributes', 'list', null, false, false],
    'UserExtensionAttributes\\FindUserextensionattributesByIdRequest' => [FindUserextensionattributesByIdRequest::class, [7], 'GET', '/userextensionattributes/id/7', 'one', null, false, false],
    'UserExtensionAttributes\\FindUserextensionattributesByNameRequest' => [FindUserextensionattributesByNameRequest::class, ['abc'], 'GET', '/userextensionattributes/name/abc', 'one', null, false, false],
    'UserExtensionAttributes\\UpdateUserextensionattributeByIdRequest' => [UpdateUserextensionattributeByIdRequest::class, [7], 'PUT', '/userextensionattributes/id/7', 'one', null, true, false],
    'UserGroups\\CreateUserGroupsByIdRequest' => [CreateUserGroupsByIdRequest::class, [7], 'POST', '/usergroups/id/7', 'one', null, true, false],
    'UserGroups\\DeleteUserGroupsByIdRequest' => [DeleteUserGroupsByIdRequest::class, [7], 'DELETE', '/usergroups/id/7', 'none', null, false, false],
    'UserGroups\\FindUserGroupsRequest' => [FindUserGroupsRequest::class, [], 'GET', '/usergroups', 'list', null, false, false],
    'UserGroups\\FindUserGroupsByIdRequest' => [FindUserGroupsByIdRequest::class, [7], 'GET', '/usergroups/id/7', 'one', null, false, false],
    'UserGroups\\FindUserGroupsByNameRequest' => [FindUserGroupsByNameRequest::class, ['abc'], 'GET', '/usergroups/name/abc', 'one', null, false, false],
    'UserGroups\\UpdateUserGroupsByIdRequest' => [UpdateUserGroupsByIdRequest::class, [7], 'PUT', '/usergroups/id/7', 'one', null, true, false],
    'Users\\CreateUserByIdRequest' => [UsersCreateUserByIdRequest::class, [7], 'POST', '/users/id/7', 'one', null, true, false],
    'Users\\DeleteUserByIdRequest' => [UsersDeleteUserByIdRequest::class, [7], 'DELETE', '/users/id/7', 'none', null, false, false],
    'Users\\FindUsersRequest' => [FindUsersRequest::class, [], 'GET', '/users', 'list', null, false, false],
    'Users\\FindUsersByEmailAddressRequest' => [FindUsersByEmailAddressRequest::class, ['abc'], 'GET', '/users/email/abc', 'one', null, false, false],
    'Users\\FindUsersByIdRequest' => [UsersFindUsersByIdRequest::class, [7], 'GET', '/users/id/7', 'one', null, false, false],
    'Users\\FindUsersByNameRequest' => [UsersFindUsersByNameRequest::class, ['abc'], 'GET', '/users/name/abc', 'one', null, false, false],
    'Users\\UpdateUserByIdRequest' => [UsersUpdateUserByIdRequest::class, [7], 'PUT', '/users/id/7', 'one', null, true, false],
    'VppAccounts\\CreateAccountByIdRequest' => [CreateAccountByIdRequest::class, [7], 'POST', '/vppaccounts/id/7', 'one', null, true, false],
    'VppAccounts\\DeleteAccountByIdRequest' => [DeleteAccountByIdRequest::class, [7], 'DELETE', '/vppaccounts/id/7', 'none', null, false, false],
    'VppAccounts\\FindAccountByIdRequest' => [FindAccountByIdRequest::class, [7], 'GET', '/vppaccounts/id/7', 'one', null, false, false],
    'VppAccounts\\FindVPPAdminAccountRequest' => [FindVPPAdminAccountRequest::class, [], 'GET', '/vppaccounts', 'list', null, false, false],
    'VppAccounts\\UpdateAccountByIdRequest' => [UpdateAccountByIdRequest::class, [7], 'PUT', '/vppaccounts/id/7', 'one', null, true, false],
    'VppAssignments\\CreateAssignmentByIdRequest' => [CreateAssignmentByIdRequest::class, [7], 'POST', '/vppassignments/id/7', 'one', null, true, false],
    'VppAssignments\\DeleteAssignmentByIdRequest' => [DeleteAssignmentByIdRequest::class, [7], 'DELETE', '/vppassignments/id/7', 'none', null, false, false],
    'VppAssignments\\FindAssignmentByIdRequest' => [FindAssignmentByIdRequest::class, [7], 'GET', '/vppassignments/id/7', 'one', null, false, false],
    'VppAssignments\\FindVPPAdminAssignmentRequest' => [FindVPPAdminAssignmentRequest::class, [], 'GET', '/vppassignments', 'list', null, false, false],
    'VppAssignments\\UpdateAssignmentByIdRequest' => [UpdateAssignmentByIdRequest::class, [7], 'PUT', '/vppassignments/id/7', 'one', null, true, false],
    'VppInvitations\\CreateInvitationByIdRequest' => [CreateInvitationByIdRequest::class, [7], 'POST', '/vppinvitations/id/7', 'one', null, true, false],
    'VppInvitations\\DeleteInvitationByIdRequest' => [DeleteInvitationByIdRequest::class, [7], 'DELETE', '/vppinvitations/id/7', 'none', null, false, false],
    'VppInvitations\\FindInvitationByIdRequest' => [FindInvitationByIdRequest::class, [7], 'GET', '/vppinvitations/id/7', 'one', null, false, false],
    'VppInvitations\\FindInvitationsByIdSubsetRequest' => [FindInvitationsByIdSubsetRequest::class, [7, 'abc'], 'GET', '/vppinvitations/id/7/subset/abc', 'one', null, false, false],
    'VppInvitations\\FindVPPAdminInvitationRequest' => [FindVPPAdminInvitationRequest::class, [], 'GET', '/vppinvitations', 'list', null, false, false],
    'VppInvitations\\UpdateInvitationByIdRequest' => [UpdateInvitationByIdRequest::class, [7], 'PUT', '/vppinvitations/id/7', 'one', null, true, false],
    'Webhooks\\CreateWebhookByIdRequest' => [CreateWebhookByIdRequest::class, [7], 'POST', '/webhooks/id/7', 'one', null, true, false],
    'Webhooks\\DeleteWebhookByIdRequest' => [DeleteWebhookByIdRequest::class, [7], 'DELETE', '/webhooks/id/7', 'none', null, false, false],
    'Webhooks\\FindWebhooksRequest' => [FindWebhooksRequest::class, [], 'GET', '/webhooks', 'list', null, false, false],
    'Webhooks\\FindWebhooksByIdRequest' => [FindWebhooksByIdRequest::class, [7], 'GET', '/webhooks/id/7', 'one', null, false, false],
    'Webhooks\\FindWebhooksByNameRequest' => [FindWebhooksByNameRequest::class, ['abc'], 'GET', '/webhooks/name/abc', 'one', null, false, false],
    'Webhooks\\UpdateWebhookByIdRequest' => [UpdateWebhookByIdRequest::class, [7], 'PUT', '/webhooks/id/7', 'one', null, true, false],
];
