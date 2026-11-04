<?php

use spkm\Jamf\Pro\Data\AccessManagementSetting;
use spkm\Jamf\Pro\Data\Account;
use spkm\Jamf\Pro\Data\AccountDrivenUserEnrollmentSessionTokenSettings;
use spkm\Jamf\Pro\Data\AccountGroupV1;
use spkm\Jamf\Pro\Data\AccountPreferencesV5;
use spkm\Jamf\Pro\Data\AccountPreferencesV6;
use spkm\Jamf\Pro\Data\ActiveUsersCount;
use spkm\Jamf\Pro\Data\ActiveUserSession;
use spkm\Jamf\Pro\Data\AdcsDependency;
use spkm\Jamf\Pro\Data\AdcsSettingsResponse;
use spkm\Jamf\Pro\Data\AdvancedSearch;
use spkm\Jamf\Pro\Data\AdvancedSearchCriteriaChoices;
use spkm\Jamf\Pro\Data\AdvancedUserContentSearch;
use spkm\Jamf\Pro\Data\ApiIntegrationResponse;
use spkm\Jamf\Pro\Data\ApiRole;
use spkm\Jamf\Pro\Data\ApiRolePrivileges;
use spkm\Jamf\Pro\Data\ApnsClientPushStatus;
use spkm\Jamf\Pro\Data\ApnsPushEnableRequest;
use spkm\Jamf\Pro\Data\AppRequestFormInputField;
use spkm\Jamf\Pro\Data\AppRequestSettings;
use spkm\Jamf\Pro\Data\Authorization;
use spkm\Jamf\Pro\Data\AuthorizationV1;
use spkm\Jamf\Pro\Data\AuthToken;
use spkm\Jamf\Pro\Data\AuthTokenV1;
use spkm\Jamf\Pro\Data\AvailableOsUpdates;
use spkm\Jamf\Pro\Data\AvailableUpdates;
use spkm\Jamf\Pro\Data\AzureConfiguration;
use spkm\Jamf\Pro\Data\AzureMappings;
use spkm\Jamf\Pro\Data\AzureServerConfiguration;
use spkm\Jamf\Pro\Data\BlankPushResponse;
use spkm\Jamf\Pro\Data\BrandingImageUrl;
use spkm\Jamf\Pro\Data\Building;
use spkm\Jamf\Pro\Data\CacheSettings;
use spkm\Jamf\Pro\Data\Category;
use spkm\Jamf\Pro\Data\CertificateRecord;
use spkm\Jamf\Pro\Data\ClassicLdapMappings;
use spkm\Jamf\Pro\Data\ClientCheckInV3;
use spkm\Jamf\Pro\Data\CloudDistributionPoint;
use spkm\Jamf\Pro\Data\CloudDistributionPointInventoryFileInfo;
use spkm\Jamf\Pro\Data\CloudDistributionPointTestConnection;
use spkm\Jamf\Pro\Data\CloudDistributionPointUploadCapability;
use spkm\Jamf\Pro\Data\CloudIdPCommon;
use spkm\Jamf\Pro\Data\CloudIdPCommonResponse;
use spkm\Jamf\Pro\Data\CloudLdapConnectionPoolStatistics;
use spkm\Jamf\Pro\Data\CloudLdapConnectionStatus;
use spkm\Jamf\Pro\Data\CloudLdapKeystore;
use spkm\Jamf\Pro\Data\CloudLdapMappingsResponse;
use spkm\Jamf\Pro\Data\CloudLdapServerResponse;
use spkm\Jamf\Pro\Data\CloudResponse;
use spkm\Jamf\Pro\Data\ComputerExtensionAttributes;
use spkm\Jamf\Pro\Data\ComputerExtensionAttributeTemplates;
use spkm\Jamf\Pro\Data\ComputerGroup;
use spkm\Jamf\Pro\Data\ComputerInventory;
use spkm\Jamf\Pro\Data\ComputerInventoryCollectionSettings;
use spkm\Jamf\Pro\Data\ComputerInventoryCollectionSettingsV2;
use spkm\Jamf\Pro\Data\ComputerInventoryDeviceLockPinResponse;
use spkm\Jamf\Pro\Data\ComputerInventoryFileVault;
use spkm\Jamf\Pro\Data\ComputerInventoryRecoveryLockPasswordResponse;
use spkm\Jamf\Pro\Data\ComputerInventoryV2;
use spkm\Jamf\Pro\Data\ComputerInventoryV3;
use spkm\Jamf\Pro\Data\ComputerInventoryV4;
use spkm\Jamf\Pro\Data\ComputerOverview;
use spkm\Jamf\Pro\Data\ConnectionConfigurationResponse;
use spkm\Jamf\Pro\Data\ConnectionConfigurationStatusResponse;
use spkm\Jamf\Pro\Data\CountryCodes;
use spkm\Jamf\Pro\Data\Credentials;
use spkm\Jamf\Pro\Data\CsaTenantIdInfo;
use spkm\Jamf\Pro\Data\CsaToken;
use spkm\Jamf\Pro\Data\CurrentAuthorization;
use spkm\Jamf\Pro\Data\DashboardSetup;
use spkm\Jamf\Pro\Data\Department;
use spkm\Jamf\Pro\Data\DeploymentTask;
use spkm\Jamf\Pro\Data\DeviceCommonDetails;
use spkm\Jamf\Pro\Data\DeviceCommunicationSettings;
use spkm\Jamf\Pro\Data\DeviceComplianceInformation;
use spkm\Jamf\Pro\Data\DeviceEnrollmentDevice;
use spkm\Jamf\Pro\Data\DeviceEnrollmentDisownResponse;
use spkm\Jamf\Pro\Data\DeviceEnrollmentInstance;
use spkm\Jamf\Pro\Data\DeviceEnrollmentInstanceSyncStatus;
use spkm\Jamf\Pro\Data\DeviceGroup;
use spkm\Jamf\Pro\Data\DigicertConnectionStatus;
use spkm\Jamf\Pro\Data\DigicertDependency;
use spkm\Jamf\Pro\Data\DigiCertSettingResponse;
use spkm\Jamf\Pro\Data\DistributionPoint;
use spkm\Jamf\Pro\Data\DockItem;
use spkm\Jamf\Pro\Data\DownloadUrl;
use spkm\Jamf\Pro\Data\DssDeclarations;
use spkm\Jamf\Pro\Data\Ebook;
use spkm\Jamf\Pro\Data\EbookScope;
use spkm\Jamf\Pro\Data\EnrollmentAccessGroupPreview;
use spkm\Jamf\Pro\Data\EnrollmentCustomizationDependencies;
use spkm\Jamf\Pro\Data\EnrollmentCustomizationPanelList;
use spkm\Jamf\Pro\Data\EnrollmentCustomizationV2;
use spkm\Jamf\Pro\Data\EnrollmentProcessTextObject;
use spkm\Jamf\Pro\Data\EnrollmentSettingsV4;
use spkm\Jamf\Pro\Data\EraseDeviceComputerResponse;
use spkm\Jamf\Pro\Data\EraseDeviceMobileDeviceResponse;
use spkm\Jamf\Pro\Data\FileAttachmentV2;
use spkm\Jamf\Pro\Data\FileAttachmentV3;
use spkm\Jamf\Pro\Data\FileData;
use spkm\Jamf\Pro\Data\GetComputerPrestageV3;
use spkm\Jamf\Pro\Data\GetEnrollmentCustomizationPanel;
use spkm\Jamf\Pro\Data\GetEnrollmentCustomizationPanelLdapAuth;
use spkm\Jamf\Pro\Data\GetEnrollmentCustomizationPanelSsoAuth;
use spkm\Jamf\Pro\Data\GetEnrollmentCustomizationPanelText;
use spkm\Jamf\Pro\Data\GetMobileDevicePrestageV2;
use spkm\Jamf\Pro\Data\GetMobileDevicePrestageV3;
use spkm\Jamf\Pro\Data\GroupDtoV1;
use spkm\Jamf\Pro\Data\GroupTestSearch;
use spkm\Jamf\Pro\Data\GroupWithCriteriaDtoV1;
use spkm\Jamf\Pro\Data\GsxConnection;
use spkm\Jamf\Pro\Data\HealthStatus;
use spkm\Jamf\Pro\Data\HrefResponse;
use spkm\Jamf\Pro\Data\IconResponse;
use spkm\Jamf\Pro\Data\ImpactAlertNotificationSettingsV1;
use spkm\Jamf\Pro\Data\InventoryInformation;
use spkm\Jamf\Pro\Data\InventoryListMobileDevice;
use spkm\Jamf\Pro\Data\InventoryPreloadCsvValidationSuccess;
use spkm\Jamf\Pro\Data\InventoryPreloadExtensionAttributeColumn;
use spkm\Jamf\Pro\Data\InventoryPreloadRecordV2;
use spkm\Jamf\Pro\Data\IosBrandingConfiguration;
use spkm\Jamf\Pro\Data\JamfApplicationResponse;
use spkm\Jamf\Pro\Data\JamfPackageResponse;
use spkm\Jamf\Pro\Data\JamfProInformationV2;
use spkm\Jamf\Pro\Data\JamfProServerUrl;
use spkm\Jamf\Pro\Data\JamfProtectPlan;
use spkm\Jamf\Pro\Data\JamfProVersion;
use spkm\Jamf\Pro\Data\LanguageCode;
use spkm\Jamf\Pro\Data\LapsAccountManagementHistory;
use spkm\Jamf\Pro\Data\LapsHistory;
use spkm\Jamf\Pro\Data\LapsPasswordAndAuditsV2;
use spkm\Jamf\Pro\Data\LapsPasswordResponseV2;
use spkm\Jamf\Pro\Data\LapsPendingRotation;
use spkm\Jamf\Pro\Data\LapsSettingsResponseV2;
use spkm\Jamf\Pro\Data\LapsUserPasswordResponseV2;
use spkm\Jamf\Pro\Data\LapsUserV2;
use spkm\Jamf\Pro\Data\LastLoginResponse;
use spkm\Jamf\Pro\Data\LdapConfigurationResponse;
use spkm\Jamf\Pro\Data\LdapGroup;
use spkm\Jamf\Pro\Data\LdapServer;
use spkm\Jamf\Pro\Data\LinkedConnectProfile;
use spkm\Jamf\Pro\Data\Locale;
use spkm\Jamf\Pro\Data\LogFlushingTaskV1;
use spkm\Jamf\Pro\Data\LogFlushingV1;
use spkm\Jamf\Pro\Data\LoginContent;
use spkm\Jamf\Pro\Data\LoginContentPut;
use spkm\Jamf\Pro\Data\M2mTenantIdInfo;
use spkm\Jamf\Pro\Data\MacOsBrandingConfiguration;
use spkm\Jamf\Pro\Data\MacOsManagedSoftwareUpdateResponse;
use spkm\Jamf\Pro\Data\ManagedSoftwareUpdatePlan;
use spkm\Jamf\Pro\Data\ManagedSoftwareUpdatePlanEventStore;
use spkm\Jamf\Pro\Data\ManagedSoftwareUpdatePlanPostResponse;
use spkm\Jamf\Pro\Data\ManagedSoftwareUpdatePlanToggle;
use spkm\Jamf\Pro\Data\ManagedSoftwareUpdatePlanToggleStatusWrapper;
use spkm\Jamf\Pro\Data\ManagedSoftwareUpdateStatus;
use spkm\Jamf\Pro\Data\Markdown;
use spkm\Jamf\Pro\Data\MdmCommand;
use spkm\Jamf\Pro\Data\MdmRenewalErrorStrategiesResponse;
use spkm\Jamf\Pro\Data\MembershipTestSearchResponse;
use spkm\Jamf\Pro\Data\MobileDeviceDetailsGetV2;
use spkm\Jamf\Pro\Data\MobileDeviceDetailsV2;
use spkm\Jamf\Pro\Data\MobileDeviceExtensionAttributeResults;
use spkm\Jamf\Pro\Data\MobileDeviceExtensionAttributes;
use spkm\Jamf\Pro\Data\MobileDeviceGroup;
use spkm\Jamf\Pro\Data\MobileDeviceResponse;
use spkm\Jamf\Pro\Data\MobileDeviceV2;
use spkm\Jamf\Pro\Data\NotificationV1;
use spkm\Jamf\Pro\Data\OAuthClientCredentials;
use spkm\Jamf\Pro\Data\OAuthTokenResponse;
use spkm\Jamf\Pro\Data\OauthTokens;
use spkm\Jamf\Pro\Data\ObjectHistory;
use spkm\Jamf\Pro\Data\ObjectHistoryV1;
use spkm\Jamf\Pro\Data\OidcBrokerConfig;
use spkm\Jamf\Pro\Data\OidcDirectIdpLoginSkipUrl;
use spkm\Jamf\Pro\Data\OidcJwksResponse;
use spkm\Jamf\Pro\Data\OidcLoginDispatchResponse;
use spkm\Jamf\Pro\Data\OidcLoginDispatchResponseV2;
use spkm\Jamf\Pro\Data\OidcPublicFeaturesResponse;
use spkm\Jamf\Pro\Data\OnboardingConfiguration;
use spkm\Jamf\Pro\Data\OnboardingEligibleItem;
use spkm\Jamf\Pro\Data\Package;
use spkm\Jamf\Pro\Data\ParentApp;
use spkm\Jamf\Pro\Data\PatchPolicyDetail;
use spkm\Jamf\Pro\Data\PatchPolicyListView;
use spkm\Jamf\Pro\Data\PatchPolicyLogDetail;
use spkm\Jamf\Pro\Data\PatchPolicyLogEligibleRetryCount;
use spkm\Jamf\Pro\Data\PatchPolicyLogV2;
use spkm\Jamf\Pro\Data\PatchPolicyV2OnDashboard;
use spkm\Jamf\Pro\Data\PatchReportV3;
use spkm\Jamf\Pro\Data\PatchSoftwareTitleConfiguration;
use spkm\Jamf\Pro\Data\PatchSoftwareTitleConfigurationDependency;
use spkm\Jamf\Pro\Data\PatchSoftwareTitleDefinition;
use spkm\Jamf\Pro\Data\PatchSoftwareTitleExtensionAttributes;
use spkm\Jamf\Pro\Data\PatchSoftwareTitleReport;
use spkm\Jamf\Pro\Data\PatchSummary;
use spkm\Jamf\Pro\Data\PatchSummaryVersion;
use spkm\Jamf\Pro\Data\PolicyProperties;
use spkm\Jamf\Pro\Data\PolicyPropertiesV1;
use spkm\Jamf\Pro\Data\PrestageDependencies;
use spkm\Jamf\Pro\Data\PrestageFileAttachmentV2;
use spkm\Jamf\Pro\Data\PrestageFileAttachmentV3;
use spkm\Jamf\Pro\Data\PrestageScopeResponseV2;
use spkm\Jamf\Pro\Data\PrestageScopeV2;
use spkm\Jamf\Pro\Data\PrestageSyncStatusV2;
use spkm\Jamf\Pro\Data\ProtectSettingsResponse;
use spkm\Jamf\Pro\Data\RecalculationResults;
use spkm\Jamf\Pro\Data\RedeployJamfManagementFrameworkResponse;
use spkm\Jamf\Pro\Data\Reenrollment;
use spkm\Jamf\Pro\Data\RemoteAdministrationResponse;
use spkm\Jamf\Pro\Data\RemoveComputerMdmProfileResponse;
use spkm\Jamf\Pro\Data\RenewMdmProfileResponse;
use spkm\Jamf\Pro\Data\ReturnToServiceConfiguration;
use spkm\Jamf\Pro\Data\SchedulerJobs;
use spkm\Jamf\Pro\Data\SchedulerSummary;
use spkm\Jamf\Pro\Data\SchedulerTrigger;
use spkm\Jamf\Pro\Data\Script;
use spkm\Jamf\Pro\Data\SelfServicePlusSettings;
use spkm\Jamf\Pro\Data\SelfServiceSettings;
use spkm\Jamf\Pro\Data\Session;
use spkm\Jamf\Pro\Data\SessionDetails;
use spkm\Jamf\Pro\Data\SessionHistoryItem;
use spkm\Jamf\Pro\Data\SessionHistoryItemWithDetails;
use spkm\Jamf\Pro\Data\SessionStatus;
use spkm\Jamf\Pro\Data\SharedDeviceComplianceFeatureToggle;
use spkm\Jamf\Pro\Data\SiteObject;
use spkm\Jamf\Pro\Data\SlasaAcceptance;
use spkm\Jamf\Pro\Data\SmartComputerGroupSearch;
use spkm\Jamf\Pro\Data\SmartComputerGroupV2;
use spkm\Jamf\Pro\Data\SmartComputerGroupV3;
use spkm\Jamf\Pro\Data\SmartGroup;
use spkm\Jamf\Pro\Data\SmartGroupAssignment;
use spkm\Jamf\Pro\Data\SmartGroupAssignmentV2;
use spkm\Jamf\Pro\Data\SmartGroupDetail;
use spkm\Jamf\Pro\Data\SmartGroupDetailV2;
use spkm\Jamf\Pro\Data\SmartGroupMembership;
use spkm\Jamf\Pro\Data\SmtpAuthenticationTypeList;
use spkm\Jamf\Pro\Data\SmtpServerV2;
use spkm\Jamf\Pro\Data\SoftwareTitleConfigurationOnDashboard;
use spkm\Jamf\Pro\Data\SsoFailoverData;
use spkm\Jamf\Pro\Data\SsoKeystoreCertParseResponse;
use spkm\Jamf\Pro\Data\SsoKeystoreResponseWithDetails;
use spkm\Jamf\Pro\Data\SsoSettingsV3;
use spkm\Jamf\Pro\Data\StartupStatus;
use spkm\Jamf\Pro\Data\StaticComputerGroup;
use spkm\Jamf\Pro\Data\StaticComputerGroupAssignment;
use spkm\Jamf\Pro\Data\StaticComputerGroupSummary;
use spkm\Jamf\Pro\Data\StaticGroup;
use spkm\Jamf\Pro\Data\StaticGroupAssignment;
use spkm\Jamf\Pro\Data\StaticUserGroup;
use spkm\Jamf\Pro\Data\StatusItem;
use spkm\Jamf\Pro\Data\StatusItems;
use spkm\Jamf\Pro\Data\SupervisionIdentity;
use spkm\Jamf\Pro\Data\TeacherSettingsResponse;
use spkm\Jamf\Pro\Data\TimeZone;
use spkm\Jamf\Pro\Data\UnmanageMobileDeviceResponse;
use spkm\Jamf\Pro\Data\User;
use spkm\Jamf\Pro\Data\UserAccount;
use spkm\Jamf\Pro\Data\UserPreferencesSettings;
use spkm\Jamf\Pro\Data\UserTestSearch;
use spkm\Jamf\Pro\Data\V1Site;
use spkm\Jamf\Pro\Data\VenafiCaRecord;
use spkm\Jamf\Pro\Data\VenafiPkiPayloadRecord;
use spkm\Jamf\Pro\Data\VenafiServiceStatus;
use spkm\Jamf\Pro\Data\VerbosePackageDeploymentResponse;
use spkm\Jamf\Pro\Data\VolumePurchasingContent;
use spkm\Jamf\Pro\Data\VolumePurchasingLocation;
use spkm\Jamf\Pro\Data\VolumePurchasingLocationListView;
use spkm\Jamf\Pro\Data\VolumePurchasingSubscription;
use spkm\Jamf\Pro\Data\WellKnownSettingsResponse;
use spkm\Jamf\Pro\Requests\AccountGroups\GetAccountGroupsV1Request;
use spkm\Jamf\Pro\Requests\AccountGroups\GetAccountGroupV1Request;
use spkm\Jamf\Pro\Requests\Accounts\CreateAccountsV1Request;
use spkm\Jamf\Pro\Requests\Accounts\DeleteAccountV1Request;
use spkm\Jamf\Pro\Requests\Accounts\GetAccountsV1Request;
use spkm\Jamf\Pro\Requests\Accounts\GetAccountV1Request;
use spkm\Jamf\Pro\Requests\Accounts\ReplaceAccountV1Request;
use spkm\Jamf\Pro\Requests\ActivationCode\CreateActivationCodeHistoryV1Request;
use spkm\Jamf\Pro\Requests\ActivationCode\ExportActivationCodeHistoryV1Request;
use spkm\Jamf\Pro\Requests\ActivationCode\GetActivationCodeHistoryV1Request;
use spkm\Jamf\Pro\Requests\ActivationCode\ReplaceActivationCodeV1Request;
use spkm\Jamf\Pro\Requests\ActivationCode\UpdateActivationCodeOrganizationNameV1Request;
use spkm\Jamf\Pro\Requests\AdcsSettings\CreatePkiAdcSettingsHistoryV1Request;
use spkm\Jamf\Pro\Requests\AdcsSettings\CreatePkiAdcsSettingsV1Request;
use spkm\Jamf\Pro\Requests\AdcsSettings\DeletePkiAdcSettingsV1Request;
use spkm\Jamf\Pro\Requests\AdcsSettings\GetPkiAdcSettingsDependenciesV1Request;
use spkm\Jamf\Pro\Requests\AdcsSettings\GetPkiAdcSettingsHistoryV1Request;
use spkm\Jamf\Pro\Requests\AdcsSettings\GetPkiAdcSettingsV1Request;
use spkm\Jamf\Pro\Requests\AdcsSettings\UpdatePkiAdcSettingsV1Request;
use spkm\Jamf\Pro\Requests\AdcsSettings\ValidatePkiAdcsSettingsCertificateV1Request;
use spkm\Jamf\Pro\Requests\AdcsSettings\ValidatePkiAdcsSettingsClientCertificateV1Request;
use spkm\Jamf\Pro\Requests\AdvancedMobileDeviceSearches\CreateAdvancedMobileDeviceSearchesV1Request;
use spkm\Jamf\Pro\Requests\AdvancedMobileDeviceSearches\DeleteAdvancedMobileDeviceSearchV1Request;
use spkm\Jamf\Pro\Requests\AdvancedMobileDeviceSearches\DeleteMultipleAdvancedMobileDeviceSearchesV1Request;
use spkm\Jamf\Pro\Requests\AdvancedMobileDeviceSearches\GetAdvancedMobileDeviceSearchesChoicesV1Request;
use spkm\Jamf\Pro\Requests\AdvancedMobileDeviceSearches\GetAdvancedMobileDeviceSearchesV1Request;
use spkm\Jamf\Pro\Requests\AdvancedMobileDeviceSearches\GetAdvancedMobileDeviceSearchV1Request;
use spkm\Jamf\Pro\Requests\AdvancedMobileDeviceSearches\ReplaceAdvancedMobileDeviceSearchV1Request;
use spkm\Jamf\Pro\Requests\AdvancedUserContentSearches\CreateAdvancedUserContentSearchesV1Request;
use spkm\Jamf\Pro\Requests\AdvancedUserContentSearches\DeleteAdvancedUserContentSearchV1Request;
use spkm\Jamf\Pro\Requests\AdvancedUserContentSearches\GetAdvancedUserContentSearchesV1Request;
use spkm\Jamf\Pro\Requests\AdvancedUserContentSearches\GetAdvancedUserContentSearchV1Request;
use spkm\Jamf\Pro\Requests\AdvancedUserContentSearches\ReplaceAdvancedUserContentSearchV1Request;
use spkm\Jamf\Pro\Requests\ApiAuthentication\CreateAuthCurrentRequest;
use spkm\Jamf\Pro\Requests\ApiAuthentication\CreateAuthTokenV1Request;
use spkm\Jamf\Pro\Requests\ApiAuthentication\CreateOauthTokenV1Request;
use spkm\Jamf\Pro\Requests\ApiAuthentication\GetAuthRequest;
use spkm\Jamf\Pro\Requests\ApiAuthentication\GetAuthV1Request;
use spkm\Jamf\Pro\Requests\ApiAuthentication\InvalidateAuthTokenRequest;
use spkm\Jamf\Pro\Requests\ApiAuthentication\InvalidateAuthTokenV1Request;
use spkm\Jamf\Pro\Requests\ApiAuthentication\KeepAuthTokenAliveRequest;
use spkm\Jamf\Pro\Requests\ApiAuthentication\KeepAuthTokenAliveV1Request;
use spkm\Jamf\Pro\Requests\ApiIntegrations\CreateApiIntegrationClientCredentialsV1Request;
use spkm\Jamf\Pro\Requests\ApiIntegrations\CreateApiIntegrationsV1Request;
use spkm\Jamf\Pro\Requests\ApiIntegrations\DeleteApiIntegrationV1Request;
use spkm\Jamf\Pro\Requests\ApiIntegrations\GetApiIntegrationsV1Request;
use spkm\Jamf\Pro\Requests\ApiIntegrations\GetApiIntegrationV1Request;
use spkm\Jamf\Pro\Requests\ApiIntegrations\ReplaceApiIntegrationV1Request;
use spkm\Jamf\Pro\Requests\ApiRolePrivileges\GetApiRolePrivilegesSearchV1Request;
use spkm\Jamf\Pro\Requests\ApiRolePrivileges\GetApiRolePrivilegesV1Request;
use spkm\Jamf\Pro\Requests\ApiRoles\CreateApiRolesV1Request;
use spkm\Jamf\Pro\Requests\ApiRoles\DeleteApiRoleV1Request;
use spkm\Jamf\Pro\Requests\ApiRoles\GetApiRolesV1Request;
use spkm\Jamf\Pro\Requests\ApiRoles\GetApiRoleV1Request;
use spkm\Jamf\Pro\Requests\ApiRoles\ReplaceApiRoleV1Request;
use spkm\Jamf\Pro\Requests\ApnsClientPushStatus\EnableApnsClientPushStatusAllClientsV1Request;
use spkm\Jamf\Pro\Requests\ApnsClientPushStatus\EnableApnsClientPushStatusClientV1Request;
use spkm\Jamf\Pro\Requests\ApnsClientPushStatus\GetApnsClientPushStatusEnableAllClientsStatusV1Request;
use spkm\Jamf\Pro\Requests\ApnsClientPushStatus\GetApnsClientPushStatusV1Request;
use spkm\Jamf\Pro\Requests\AppRequestPreview\CreateAppRequestFormInputFieldsV1Request;
use spkm\Jamf\Pro\Requests\AppRequestPreview\DeleteAppRequestFormInputFieldV1Request;
use spkm\Jamf\Pro\Requests\AppRequestPreview\GetAppRequestFormInputFieldsV1Request;
use spkm\Jamf\Pro\Requests\AppRequestPreview\GetAppRequestFormInputFieldV1Request;
use spkm\Jamf\Pro\Requests\AppRequestPreview\GetAppRequestSettingsV1Request;
use spkm\Jamf\Pro\Requests\AppRequestPreview\ReplaceAppRequestFormInputFieldsV1Request;
use spkm\Jamf\Pro\Requests\AppRequestPreview\ReplaceAppRequestFormInputFieldV1Request;
use spkm\Jamf\Pro\Requests\AppRequestPreview\ReplaceAppRequestSettingsV1Request;
use spkm\Jamf\Pro\Requests\AppStoreCountryCodesPreview\GetAppStoreCountryCodesV1Request;
use spkm\Jamf\Pro\Requests\Branding\GetBrandingImagesDownloadV1Request;
use spkm\Jamf\Pro\Requests\Buildings\CreateBuildingHistoryV1Request;
use spkm\Jamf\Pro\Requests\Buildings\CreateBuildingsV1Request;
use spkm\Jamf\Pro\Requests\Buildings\DeleteBuildingV1Request;
use spkm\Jamf\Pro\Requests\Buildings\DeleteMultipleBuildingsV1Request;
use spkm\Jamf\Pro\Requests\Buildings\ExportBuildingHistoryV1Request;
use spkm\Jamf\Pro\Requests\Buildings\ExportBuildingsV1Request;
use spkm\Jamf\Pro\Requests\Buildings\GetBuildingHistoryV1Request;
use spkm\Jamf\Pro\Requests\Buildings\GetBuildingsV1Request;
use spkm\Jamf\Pro\Requests\Buildings\GetBuildingV1Request;
use spkm\Jamf\Pro\Requests\Buildings\ReplaceBuildingV1Request;
use spkm\Jamf\Pro\Requests\CacheSettings\GetCacheSettingsV1Request;
use spkm\Jamf\Pro\Requests\CacheSettings\ReplaceCacheSettingsV1Request;
use spkm\Jamf\Pro\Requests\Categories\CreateCategoriesV1Request;
use spkm\Jamf\Pro\Requests\Categories\CreateCategoryHistoryV1Request;
use spkm\Jamf\Pro\Requests\Categories\DeleteCategoryV1Request;
use spkm\Jamf\Pro\Requests\Categories\DeleteMultipleCategoriesV1Request;
use spkm\Jamf\Pro\Requests\Categories\GetCategoriesV1Request;
use spkm\Jamf\Pro\Requests\Categories\GetCategoryHistoryV1Request;
use spkm\Jamf\Pro\Requests\Categories\GetCategoryV1Request;
use spkm\Jamf\Pro\Requests\Categories\ReplaceCategoryV1Request;
use spkm\Jamf\Pro\Requests\CertificateAuthority\GetPkiCertificateAuthorityActiveDerV1Request;
use spkm\Jamf\Pro\Requests\CertificateAuthority\GetPkiCertificateAuthorityActivePemV1Request;
use spkm\Jamf\Pro\Requests\CertificateAuthority\GetPkiCertificateAuthorityActiveV1Request;
use spkm\Jamf\Pro\Requests\CertificateAuthority\GetPkiCertificateAuthorityDerV1Request;
use spkm\Jamf\Pro\Requests\CertificateAuthority\GetPkiCertificateAuthorityPemV1Request;
use spkm\Jamf\Pro\Requests\CertificateAuthority\GetPkiCertificateAuthorityV1Request;
use spkm\Jamf\Pro\Requests\ClassicLdap\GetClassicLdapV1Request;
use spkm\Jamf\Pro\Requests\ClientCheckIn\CreateCheckInHistoryV3Request;
use spkm\Jamf\Pro\Requests\ClientCheckIn\GetCheckInHistoryV3Request;
use spkm\Jamf\Pro\Requests\ClientCheckIn\GetCheckInV3Request;
use spkm\Jamf\Pro\Requests\ClientCheckIn\ReplaceCheckInV3Request;
use spkm\Jamf\Pro\Requests\CloudAzure\CreateCloudAzureV1Request;
use spkm\Jamf\Pro\Requests\CloudAzure\DeleteCloudAzureV1Request;
use spkm\Jamf\Pro\Requests\CloudAzure\GetCloudAzureDefaultsMappingsV1Request;
use spkm\Jamf\Pro\Requests\CloudAzure\GetCloudAzureDefaultsServerConfigurationV1Request;
use spkm\Jamf\Pro\Requests\CloudAzure\GetCloudAzureV1Request;
use spkm\Jamf\Pro\Requests\CloudAzure\ReplaceCloudAzureV1Request;
use spkm\Jamf\Pro\Requests\CloudDistributionPoint\CreateCloudDistributionPointFailUploadV1Request;
use spkm\Jamf\Pro\Requests\CloudDistributionPoint\CreateCloudDistributionPointHistoryV1Request;
use spkm\Jamf\Pro\Requests\CloudDistributionPoint\CreateCloudDistributionPointV1Request;
use spkm\Jamf\Pro\Requests\CloudDistributionPoint\DeleteCloudDistributionPointV1Request;
use spkm\Jamf\Pro\Requests\CloudDistributionPoint\GetCloudDistributionPointFilesV1Request;
use spkm\Jamf\Pro\Requests\CloudDistributionPoint\GetCloudDistributionPointHistoryV1Request;
use spkm\Jamf\Pro\Requests\CloudDistributionPoint\GetCloudDistributionPointTestConnectionV1Request;
use spkm\Jamf\Pro\Requests\CloudDistributionPoint\GetCloudDistributionPointUploadCapabilityV1Request;
use spkm\Jamf\Pro\Requests\CloudDistributionPoint\GetCloudDistributionPointV1Request;
use spkm\Jamf\Pro\Requests\CloudDistributionPoint\RefreshCloudDistributionPointInventoryV1Request;
use spkm\Jamf\Pro\Requests\CloudDistributionPoint\UpdateCloudDistributionPointV1Request;
use spkm\Jamf\Pro\Requests\CloudIdp\CreateCloudIdpHistoryV1Request;
use spkm\Jamf\Pro\Requests\CloudIdp\ExportCloudIdpV1Request;
use spkm\Jamf\Pro\Requests\CloudIdp\GetCloudIdpByIdV1Request;
use spkm\Jamf\Pro\Requests\CloudIdp\GetCloudIdpHistoryV1Request;
use spkm\Jamf\Pro\Requests\CloudIdp\GetCloudIdpV1Request;
use spkm\Jamf\Pro\Requests\CloudIdp\TestCloudIdpGroupV1Request;
use spkm\Jamf\Pro\Requests\CloudIdp\TestCloudIdpUserMembershipV1Request;
use spkm\Jamf\Pro\Requests\CloudIdp\TestCloudIdpUserV1Request;
use spkm\Jamf\Pro\Requests\CloudInformation\GetCloudInformationV1Request;
use spkm\Jamf\Pro\Requests\CloudLdap\CreateCloudLdapsV2Request;
use spkm\Jamf\Pro\Requests\CloudLdap\DeleteCloudLdapV2Request;
use spkm\Jamf\Pro\Requests\CloudLdap\GetCloudLdapConnectionBindV2Request;
use spkm\Jamf\Pro\Requests\CloudLdap\GetCloudLdapConnectionSearchV2Request;
use spkm\Jamf\Pro\Requests\CloudLdap\GetCloudLdapConnectionStatusV2Request;
use spkm\Jamf\Pro\Requests\CloudLdap\GetCloudLdapMappingsV2Request;
use spkm\Jamf\Pro\Requests\CloudLdap\GetCloudLdapsDefaultMappingsV2Request;
use spkm\Jamf\Pro\Requests\CloudLdap\GetCloudLdapsDefaultServerConfigurationV2Request;
use spkm\Jamf\Pro\Requests\CloudLdap\GetCloudLdapV2Request;
use spkm\Jamf\Pro\Requests\CloudLdap\ReplaceCloudLdapMappingsV2Request;
use spkm\Jamf\Pro\Requests\CloudLdap\ReplaceCloudLdapV2Request;
use spkm\Jamf\Pro\Requests\CloudLdap\VerifyLdapKeystoreV1Request;
use spkm\Jamf\Pro\Requests\ComputerExtensionAttributes\CreateComputerExtensionAttributeHistoryV1Request;
use spkm\Jamf\Pro\Requests\ComputerExtensionAttributes\CreateComputerExtensionAttributesV1Request;
use spkm\Jamf\Pro\Requests\ComputerExtensionAttributes\DeleteComputerExtensionAttributeV1Request;
use spkm\Jamf\Pro\Requests\ComputerExtensionAttributes\DeleteMultipleComputerExtensionAttributesV1Request;
use spkm\Jamf\Pro\Requests\ComputerExtensionAttributes\GetComputerExtensionAttributeDataDependencyV1Request;
use spkm\Jamf\Pro\Requests\ComputerExtensionAttributes\GetComputerExtensionAttributeDownloadV1Request;
use spkm\Jamf\Pro\Requests\ComputerExtensionAttributes\GetComputerExtensionAttributeHistoryV1Request;
use spkm\Jamf\Pro\Requests\ComputerExtensionAttributes\GetComputerExtensionAttributesTemplatesV1Request;
use spkm\Jamf\Pro\Requests\ComputerExtensionAttributes\GetComputerExtensionAttributesTemplateV1Request;
use spkm\Jamf\Pro\Requests\ComputerExtensionAttributes\GetComputerExtensionAttributesV1Request;
use spkm\Jamf\Pro\Requests\ComputerExtensionAttributes\GetComputerExtensionAttributeV1Request;
use spkm\Jamf\Pro\Requests\ComputerExtensionAttributes\ReplaceComputerExtensionAttributeV1Request;
use spkm\Jamf\Pro\Requests\ComputerExtensionAttributes\UploadComputerExtensionAttributesV1Request;
use spkm\Jamf\Pro\Requests\ComputerGroups\CreateComputerGroupsSmartGroupsV2Request;
use spkm\Jamf\Pro\Requests\ComputerGroups\CreateComputerGroupsSmartGroupsV3Request;
use spkm\Jamf\Pro\Requests\ComputerGroups\CreateComputerGroupsStaticGroupsV2Request;
use spkm\Jamf\Pro\Requests\ComputerGroups\CreateComputerGroupsStaticGroupsV3Request;
use spkm\Jamf\Pro\Requests\ComputerGroups\DeleteComputerGroupsSmartGroupV2Request;
use spkm\Jamf\Pro\Requests\ComputerGroups\DeleteComputerGroupsSmartGroupV3Request;
use spkm\Jamf\Pro\Requests\ComputerGroups\DeleteComputerGroupsStaticGroupV2Request;
use spkm\Jamf\Pro\Requests\ComputerGroups\DeleteComputerGroupsStaticGroupV3Request;
use spkm\Jamf\Pro\Requests\ComputerGroups\GetComputerGroupsSmartGroupMembershipV2Request;
use spkm\Jamf\Pro\Requests\ComputerGroups\GetComputerGroupsSmartGroupMembershipV3Request;
use spkm\Jamf\Pro\Requests\ComputerGroups\GetComputerGroupsSmartGroupsV2Request;
use spkm\Jamf\Pro\Requests\ComputerGroups\GetComputerGroupsSmartGroupsV3Request;
use spkm\Jamf\Pro\Requests\ComputerGroups\GetComputerGroupsSmartGroupV2Request;
use spkm\Jamf\Pro\Requests\ComputerGroups\GetComputerGroupsSmartGroupV3Request;
use spkm\Jamf\Pro\Requests\ComputerGroups\GetComputerGroupsStaticGroupsV2Request;
use spkm\Jamf\Pro\Requests\ComputerGroups\GetComputerGroupsStaticGroupsV3Request;
use spkm\Jamf\Pro\Requests\ComputerGroups\GetComputerGroupsStaticGroupV2Request;
use spkm\Jamf\Pro\Requests\ComputerGroups\GetComputerGroupsStaticGroupV3Request;
use spkm\Jamf\Pro\Requests\ComputerGroups\GetComputerGroupsV1Request;
use spkm\Jamf\Pro\Requests\ComputerGroups\ReplaceComputerGroupsSmartGroupV2Request;
use spkm\Jamf\Pro\Requests\ComputerGroups\ReplaceComputerGroupsSmartGroupV3Request;
use spkm\Jamf\Pro\Requests\ComputerGroups\ReplaceComputerGroupsStaticGroupV2Request;
use spkm\Jamf\Pro\Requests\ComputerGroups\ReplaceComputerGroupsStaticGroupV3Request;
use spkm\Jamf\Pro\Requests\ComputerInventory\CreateComputerInventoryAttachmentsV1Request;
use spkm\Jamf\Pro\Requests\ComputerInventory\CreateComputerInventoryAttachmentsV2Request;
use spkm\Jamf\Pro\Requests\ComputerInventory\CreateComputerInventoryAttachmentsV3Request;
use spkm\Jamf\Pro\Requests\ComputerInventory\CreateComputerInventoryAttachmentsV4Request;
use spkm\Jamf\Pro\Requests\ComputerInventory\CreateComputersInventoryV1Request;
use spkm\Jamf\Pro\Requests\ComputerInventory\CreateComputersInventoryV2Request;
use spkm\Jamf\Pro\Requests\ComputerInventory\CreateComputersInventoryV3Request;
use spkm\Jamf\Pro\Requests\ComputerInventory\CreateComputersInventoryV4Request;
use spkm\Jamf\Pro\Requests\ComputerInventory\DeleteComputerInventoryAttachmentV1Request;
use spkm\Jamf\Pro\Requests\ComputerInventory\DeleteComputerInventoryAttachmentV2Request;
use spkm\Jamf\Pro\Requests\ComputerInventory\DeleteComputerInventoryAttachmentV3Request;
use spkm\Jamf\Pro\Requests\ComputerInventory\DeleteComputerInventoryAttachmentV4Request;
use spkm\Jamf\Pro\Requests\ComputerInventory\DeleteComputerInventoryV1Request;
use spkm\Jamf\Pro\Requests\ComputerInventory\DeleteComputerInventoryV2Request;
use spkm\Jamf\Pro\Requests\ComputerInventory\DeleteComputerInventoryV3Request;
use spkm\Jamf\Pro\Requests\ComputerInventory\DeleteComputerInventoryV4Request;
use spkm\Jamf\Pro\Requests\ComputerInventory\EraseComputerInventoryV1Request;
use spkm\Jamf\Pro\Requests\ComputerInventory\EraseComputerInventoryV4Request;
use spkm\Jamf\Pro\Requests\ComputerInventory\GetComputerInventoryAttachmentV1Request;
use spkm\Jamf\Pro\Requests\ComputerInventory\GetComputerInventoryAttachmentV2Request;
use spkm\Jamf\Pro\Requests\ComputerInventory\GetComputerInventoryAttachmentV3Request;
use spkm\Jamf\Pro\Requests\ComputerInventory\GetComputerInventoryAttachmentV4Request;
use spkm\Jamf\Pro\Requests\ComputerInventory\GetComputerInventoryDetailV1Request;
use spkm\Jamf\Pro\Requests\ComputerInventory\GetComputerInventoryDetailV2Request;
use spkm\Jamf\Pro\Requests\ComputerInventory\GetComputerInventoryDetailV3Request;
use spkm\Jamf\Pro\Requests\ComputerInventory\GetComputerInventoryDetailV4Request;
use spkm\Jamf\Pro\Requests\ComputerInventory\GetComputerInventoryFilevaultV1Request;
use spkm\Jamf\Pro\Requests\ComputerInventory\GetComputerInventoryFilevaultV2Request;
use spkm\Jamf\Pro\Requests\ComputerInventory\GetComputerInventoryFilevaultV3Request;
use spkm\Jamf\Pro\Requests\ComputerInventory\GetComputerInventoryFilevaultV4Request;
use spkm\Jamf\Pro\Requests\ComputerInventory\GetComputerInventoryV1Request;
use spkm\Jamf\Pro\Requests\ComputerInventory\GetComputerInventoryV2Request;
use spkm\Jamf\Pro\Requests\ComputerInventory\GetComputerInventoryV3Request;
use spkm\Jamf\Pro\Requests\ComputerInventory\GetComputerInventoryV4Request;
use spkm\Jamf\Pro\Requests\ComputerInventory\GetComputerInventoryViewDeviceLockPinV1Request;
use spkm\Jamf\Pro\Requests\ComputerInventory\GetComputerInventoryViewDeviceLockPinV2Request;
use spkm\Jamf\Pro\Requests\ComputerInventory\GetComputerInventoryViewDeviceLockPinV3Request;
use spkm\Jamf\Pro\Requests\ComputerInventory\GetComputerInventoryViewDeviceLockPinV4Request;
use spkm\Jamf\Pro\Requests\ComputerInventory\GetComputerInventoryViewRecoveryLockPasswordV1Request;
use spkm\Jamf\Pro\Requests\ComputerInventory\GetComputerInventoryViewRecoveryLockPasswordV2Request;
use spkm\Jamf\Pro\Requests\ComputerInventory\GetComputerInventoryViewRecoveryLockPasswordV3Request;
use spkm\Jamf\Pro\Requests\ComputerInventory\GetComputerInventoryViewRecoveryLockPasswordV4Request;
use spkm\Jamf\Pro\Requests\ComputerInventory\GetComputersInventoryFilevaultV1Request;
use spkm\Jamf\Pro\Requests\ComputerInventory\GetComputersInventoryFilevaultV2Request;
use spkm\Jamf\Pro\Requests\ComputerInventory\GetComputersInventoryFilevaultV3Request;
use spkm\Jamf\Pro\Requests\ComputerInventory\GetComputersInventoryFilevaultV4Request;
use spkm\Jamf\Pro\Requests\ComputerInventory\GetComputersInventoryV1Request;
use spkm\Jamf\Pro\Requests\ComputerInventory\GetComputersInventoryV2Request;
use spkm\Jamf\Pro\Requests\ComputerInventory\GetComputersInventoryV3Request;
use spkm\Jamf\Pro\Requests\ComputerInventory\GetComputersInventoryV4Request;
use spkm\Jamf\Pro\Requests\ComputerInventory\RemoveComputerInventoryMdmProfileV1Request;
use spkm\Jamf\Pro\Requests\ComputerInventory\RemoveComputerInventoryMdmProfileV4Request;
use spkm\Jamf\Pro\Requests\ComputerInventory\UpdateComputerInventoryDetailV1Request;
use spkm\Jamf\Pro\Requests\ComputerInventory\UpdateComputerInventoryDetailV2Request;
use spkm\Jamf\Pro\Requests\ComputerInventory\UpdateComputerInventoryDetailV3Request;
use spkm\Jamf\Pro\Requests\ComputerInventory\UpdateComputerInventoryDetailV4Request;
use spkm\Jamf\Pro\Requests\ComputerInventoryCollectionSettings\CreateComputerInventoryCollectionSettingsCustomPathV1Request;
use spkm\Jamf\Pro\Requests\ComputerInventoryCollectionSettings\CreateComputerInventoryCollectionSettingsCustomPathV2Request;
use spkm\Jamf\Pro\Requests\ComputerInventoryCollectionSettings\DeleteComputerInventoryCollectionSettingsCustomPathV1Request;
use spkm\Jamf\Pro\Requests\ComputerInventoryCollectionSettings\DeleteComputerInventoryCollectionSettingsCustomPathV2Request;
use spkm\Jamf\Pro\Requests\ComputerInventoryCollectionSettings\GetComputerInventoryCollectionSettingsV1Request;
use spkm\Jamf\Pro\Requests\ComputerInventoryCollectionSettings\GetComputerInventoryCollectionSettingsV2Request;
use spkm\Jamf\Pro\Requests\ComputerInventoryCollectionSettings\UpdateComputerInventoryCollectionSettingsV1Request;
use spkm\Jamf\Pro\Requests\ComputerInventoryCollectionSettings\UpdateComputerInventoryCollectionSettingsV2Request;
use spkm\Jamf\Pro\Requests\ComputerPrestages\CreateComputerPrestageScopeV2Request;
use spkm\Jamf\Pro\Requests\ComputerPrestages\CreateComputerPrestagesV3Request;
use spkm\Jamf\Pro\Requests\ComputerPrestages\DeleteComputerPrestageV3Request;
use spkm\Jamf\Pro\Requests\ComputerPrestages\DeleteMultipleComputerPrestageScopeV2Request;
use spkm\Jamf\Pro\Requests\ComputerPrestages\GetComputerPrestageScopeV2Request;
use spkm\Jamf\Pro\Requests\ComputerPrestages\GetComputerPrestagesScopeV2Request;
use spkm\Jamf\Pro\Requests\ComputerPrestages\GetComputerPrestagesV3Request;
use spkm\Jamf\Pro\Requests\ComputerPrestages\GetComputerPrestageV3Request;
use spkm\Jamf\Pro\Requests\ComputerPrestages\ReplaceComputerPrestageScopeV2Request;
use spkm\Jamf\Pro\Requests\ComputerPrestages\ReplaceComputerPrestageV3Request;
use spkm\Jamf\Pro\Requests\ComputersPreview\GetComputersPreviewRequest;
use spkm\Jamf\Pro\Requests\ConditionalAccess\GetConditionalAccessDeviceComplianceFeatureToggleV1Request;
use spkm\Jamf\Pro\Requests\ConditionalAccess\GetConditionalAccessDeviceComplianceInformationComputerV1Request;
use spkm\Jamf\Pro\Requests\ConditionalAccess\GetConditionalAccessDeviceComplianceInformationMobileV1Request;
use spkm\Jamf\Pro\Requests\Csa\DeleteCsaTokenV1Request;
use spkm\Jamf\Pro\Requests\Csa\GetCsaTenantIdV1Request;
use spkm\Jamf\Pro\Requests\Csa\GetCsaTokenV1Request;
use spkm\Jamf\Pro\Requests\Dashboard\GetDashboardV1Request;
use spkm\Jamf\Pro\Requests\Dashboard\ToggleDashboardV1Request;
use spkm\Jamf\Pro\Requests\DeclarativeDeviceManagement\GetDdmStatusItemsV1Request;
use spkm\Jamf\Pro\Requests\DeclarativeDeviceManagement\GetDdmStatusItemV1Request;
use spkm\Jamf\Pro\Requests\DeclarativeDeviceManagement\GetDssDeclarationV1Request;
use spkm\Jamf\Pro\Requests\DeclarativeDeviceManagement\SyncDdmV1Request;
use spkm\Jamf\Pro\Requests\Departments\CreateDepartmentHistoryV1Request;
use spkm\Jamf\Pro\Requests\Departments\CreateDepartmentsV1Request;
use spkm\Jamf\Pro\Requests\Departments\DeleteDepartmentV1Request;
use spkm\Jamf\Pro\Requests\Departments\DeleteMultipleDepartmentsV1Request;
use spkm\Jamf\Pro\Requests\Departments\GetDepartmentHistoryV1Request;
use spkm\Jamf\Pro\Requests\Departments\GetDepartmentsV1Request;
use spkm\Jamf\Pro\Requests\Departments\GetDepartmentV1Request;
use spkm\Jamf\Pro\Requests\Departments\ReplaceDepartmentV1Request;
use spkm\Jamf\Pro\Requests\DeviceCommunicationSettings\CreateDeviceCommunicationSettingsHistoryV1Request;
use spkm\Jamf\Pro\Requests\DeviceCommunicationSettings\GetDeviceCommunicationSettingsHistoryV1Request;
use spkm\Jamf\Pro\Requests\DeviceCommunicationSettings\GetDeviceCommunicationSettingsV1Request;
use spkm\Jamf\Pro\Requests\DeviceCommunicationSettings\ReplaceDeviceCommunicationSettingsV1Request;
use spkm\Jamf\Pro\Requests\DeviceEnrollments\CreateDeviceEnrollmentHistoryV1Request;
use spkm\Jamf\Pro\Requests\DeviceEnrollments\DeleteDeviceEnrollmentV1Request;
use spkm\Jamf\Pro\Requests\DeviceEnrollments\DisownDeviceEnrollmentV1Request;
use spkm\Jamf\Pro\Requests\DeviceEnrollments\GetDeviceEnrollmentHistoryV1Request;
use spkm\Jamf\Pro\Requests\DeviceEnrollments\GetDeviceEnrollmentsPublicKeyV1Request;
use spkm\Jamf\Pro\Requests\DeviceEnrollments\GetDeviceEnrollmentsSyncsV1Request;
use spkm\Jamf\Pro\Requests\DeviceEnrollments\GetDeviceEnrollmentsV1Request;
use spkm\Jamf\Pro\Requests\DeviceEnrollments\GetDeviceEnrollmentSyncsLatestV1Request;
use spkm\Jamf\Pro\Requests\DeviceEnrollments\GetDeviceEnrollmentSyncsV1Request;
use spkm\Jamf\Pro\Requests\DeviceEnrollments\GetDeviceEnrollmentV1Request;
use spkm\Jamf\Pro\Requests\DeviceEnrollments\ReplaceDeviceEnrollmentUploadTokenV1Request;
use spkm\Jamf\Pro\Requests\DeviceEnrollments\ReplaceDeviceEnrollmentV1Request;
use spkm\Jamf\Pro\Requests\DeviceEnrollments\UploadDeviceEnrollmentsTokenV1Request;
use spkm\Jamf\Pro\Requests\DeviceEnrollmentsDevices\GetDeviceEnrollmentDevicesV1Request;
use spkm\Jamf\Pro\Requests\Devices\GetDeviceGroupsV1Request;
use spkm\Jamf\Pro\Requests\Digicert\CreatePkiDigicertTrustLifecycleManagerV1Request;
use spkm\Jamf\Pro\Requests\Digicert\DeletePkiDigicertTrustLifecycleManagerV1Request;
use spkm\Jamf\Pro\Requests\Digicert\GetPkiDigicertTrustLifecycleManagerConnectionStatusV1Request;
use spkm\Jamf\Pro\Requests\Digicert\GetPkiDigicertTrustLifecycleManagerDependenciesV1Request;
use spkm\Jamf\Pro\Requests\Digicert\GetPkiDigicertTrustLifecycleManagerPrivilegeCheckV1Request;
use spkm\Jamf\Pro\Requests\Digicert\GetPkiDigicertTrustLifecycleManagerV1Request;
use spkm\Jamf\Pro\Requests\Digicert\UpdatePkiDigicertTrustLifecycleManagerV1Request;
use spkm\Jamf\Pro\Requests\Digicert\ValidatePkiDigicertTrustLifecycleManagerClientCertificateV1Request;
use spkm\Jamf\Pro\Requests\DistributionPoint\CreateDistributionPointHistoryV1Request;
use spkm\Jamf\Pro\Requests\DistributionPoint\CreateDistributionPointsV1Request;
use spkm\Jamf\Pro\Requests\DistributionPoint\DeleteDistributionPointV1Request;
use spkm\Jamf\Pro\Requests\DistributionPoint\DeleteMultipleDistributionPointsV1Request;
use spkm\Jamf\Pro\Requests\DistributionPoint\GetDistributionPointHistoryV1Request;
use spkm\Jamf\Pro\Requests\DistributionPoint\GetDistributionPointsV1Request;
use spkm\Jamf\Pro\Requests\DistributionPoint\GetDistributionPointV1Request;
use spkm\Jamf\Pro\Requests\DistributionPoint\ReplaceDistributionPointV1Request;
use spkm\Jamf\Pro\Requests\DistributionPoint\UpdateDistributionPointV1Request;
use spkm\Jamf\Pro\Requests\DockItems\CreateDockItemsV1Request;
use spkm\Jamf\Pro\Requests\DockItems\DeleteDockItemV1Request;
use spkm\Jamf\Pro\Requests\DockItems\GetDockItemV1Request;
use spkm\Jamf\Pro\Requests\DockItems\ReplaceDockItemV1Request;
use spkm\Jamf\Pro\Requests\Ebooks\GetEbookScopeV1Request;
use spkm\Jamf\Pro\Requests\Ebooks\GetEbooksV1Request;
use spkm\Jamf\Pro\Requests\Ebooks\GetEbookV1Request;
use spkm\Jamf\Pro\Requests\Enrollment\CreateEnrollmentAccessGroupsV3Request;
use spkm\Jamf\Pro\Requests\Enrollment\CreateEnrollmentAccessManagementV4Request;
use spkm\Jamf\Pro\Requests\Enrollment\CreateEnrollmentHistoryV2Request;
use spkm\Jamf\Pro\Requests\Enrollment\DeleteEnrollmentAccessGroupV3Request;
use spkm\Jamf\Pro\Requests\Enrollment\DeleteEnrollmentLanguageV3Request;
use spkm\Jamf\Pro\Requests\Enrollment\DeleteMultipleEnrollmentLanguagesV3Request;
use spkm\Jamf\Pro\Requests\Enrollment\ExportEnrollmentHistoryV2Request;
use spkm\Jamf\Pro\Requests\Enrollment\GetAdueSessionTokenSettingsV1Request;
use spkm\Jamf\Pro\Requests\Enrollment\GetEnrollmentAccessGroupsV3Request;
use spkm\Jamf\Pro\Requests\Enrollment\GetEnrollmentAccessGroupV3Request;
use spkm\Jamf\Pro\Requests\Enrollment\GetEnrollmentAccessManagementV4Request;
use spkm\Jamf\Pro\Requests\Enrollment\GetEnrollmentFilteredLanguageCodesV3Request;
use spkm\Jamf\Pro\Requests\Enrollment\GetEnrollmentHistoryV2Request;
use spkm\Jamf\Pro\Requests\Enrollment\GetEnrollmentLanguageCodesV3Request;
use spkm\Jamf\Pro\Requests\Enrollment\GetEnrollmentLanguagesV3Request;
use spkm\Jamf\Pro\Requests\Enrollment\GetEnrollmentLanguageV3Request;
use spkm\Jamf\Pro\Requests\Enrollment\GetEnrollmentV4Request;
use spkm\Jamf\Pro\Requests\Enrollment\ReplaceAdueSessionTokenSettingsV1Request;
use spkm\Jamf\Pro\Requests\Enrollment\ReplaceEnrollmentAccessGroupV3Request;
use spkm\Jamf\Pro\Requests\Enrollment\ReplaceEnrollmentLanguageV3Request;
use spkm\Jamf\Pro\Requests\Enrollment\ReplaceEnrollmentV4Request;
use spkm\Jamf\Pro\Requests\EnrollmentCustomization\CreateEnrollmentCustomizationHistoryV2Request;
use spkm\Jamf\Pro\Requests\EnrollmentCustomization\CreateEnrollmentCustomizationsImagesV2Request;
use spkm\Jamf\Pro\Requests\EnrollmentCustomization\CreateEnrollmentCustomizationsV2Request;
use spkm\Jamf\Pro\Requests\EnrollmentCustomization\DeleteEnrollmentCustomizationV2Request;
use spkm\Jamf\Pro\Requests\EnrollmentCustomization\GetEnrollmentCustomizationHistoryV2Request;
use spkm\Jamf\Pro\Requests\EnrollmentCustomization\GetEnrollmentCustomizationPrestagesV2Request;
use spkm\Jamf\Pro\Requests\EnrollmentCustomization\GetEnrollmentCustomizationsImageV2Request;
use spkm\Jamf\Pro\Requests\EnrollmentCustomization\GetEnrollmentCustomizationsV2Request;
use spkm\Jamf\Pro\Requests\EnrollmentCustomization\GetEnrollmentCustomizationV2Request;
use spkm\Jamf\Pro\Requests\EnrollmentCustomization\ReplaceEnrollmentCustomizationV2Request;
use spkm\Jamf\Pro\Requests\EnrollmentCustomizationPreview\CreateEnrollmentCustomizationLdapV1Request;
use spkm\Jamf\Pro\Requests\EnrollmentCustomizationPreview\CreateEnrollmentCustomizationSsoV1Request;
use spkm\Jamf\Pro\Requests\EnrollmentCustomizationPreview\CreateEnrollmentCustomizationTextV1Request;
use spkm\Jamf\Pro\Requests\EnrollmentCustomizationPreview\DeleteEnrollmentCustomizationAllV1Request;
use spkm\Jamf\Pro\Requests\EnrollmentCustomizationPreview\DeleteEnrollmentCustomizationLdapV1Request;
use spkm\Jamf\Pro\Requests\EnrollmentCustomizationPreview\DeleteEnrollmentCustomizationSsoV1Request;
use spkm\Jamf\Pro\Requests\EnrollmentCustomizationPreview\DeleteEnrollmentCustomizationTextV1Request;
use spkm\Jamf\Pro\Requests\EnrollmentCustomizationPreview\GetEnrollmentCustomizationAllByPanelIdV1Request;
use spkm\Jamf\Pro\Requests\EnrollmentCustomizationPreview\GetEnrollmentCustomizationAllV1Request;
use spkm\Jamf\Pro\Requests\EnrollmentCustomizationPreview\GetEnrollmentCustomizationLdapV1Request;
use spkm\Jamf\Pro\Requests\EnrollmentCustomizationPreview\GetEnrollmentCustomizationSsoV1Request;
use spkm\Jamf\Pro\Requests\EnrollmentCustomizationPreview\GetEnrollmentCustomizationTextMarkdownV1Request;
use spkm\Jamf\Pro\Requests\EnrollmentCustomizationPreview\GetEnrollmentCustomizationTextV1Request;
use spkm\Jamf\Pro\Requests\EnrollmentCustomizationPreview\ParseEnrollmentCustomizationMarkdownV1Request;
use spkm\Jamf\Pro\Requests\EnrollmentCustomizationPreview\ReplaceEnrollmentCustomizationLdapV1Request;
use spkm\Jamf\Pro\Requests\EnrollmentCustomizationPreview\ReplaceEnrollmentCustomizationSsoV1Request;
use spkm\Jamf\Pro\Requests\EnrollmentCustomizationPreview\ReplaceEnrollmentCustomizationTextV1Request;
use spkm\Jamf\Pro\Requests\Groups\DeleteGroupV1Request;
use spkm\Jamf\Pro\Requests\Groups\DeleteGroupV2Request;
use spkm\Jamf\Pro\Requests\Groups\GetGroupsV1Request;
use spkm\Jamf\Pro\Requests\Groups\GetGroupsV2Request;
use spkm\Jamf\Pro\Requests\Groups\GetGroupV1Request;
use spkm\Jamf\Pro\Requests\Groups\GetGroupV2Request;
use spkm\Jamf\Pro\Requests\Groups\UpdateGroupV1Request;
use spkm\Jamf\Pro\Requests\Groups\UpdateGroupV2Request;
use spkm\Jamf\Pro\Requests\GsxConnection\CreateGsxConnectionHistoryV1Request;
use spkm\Jamf\Pro\Requests\GsxConnection\GetGsxConnectionHistoryV1Request;
use spkm\Jamf\Pro\Requests\GsxConnection\GetGsxConnectionV1Request;
use spkm\Jamf\Pro\Requests\GsxConnection\ReplaceGsxConnectionV1Request;
use spkm\Jamf\Pro\Requests\GsxConnection\TestGsxConnectionV1Request;
use spkm\Jamf\Pro\Requests\GsxConnection\UpdateGsxConnectionV1Request;
use spkm\Jamf\Pro\Requests\HealthCheck\GetHealthCheckV1Request;
use spkm\Jamf\Pro\Requests\HealthCheck\GetHealthStatusV1Request;
use spkm\Jamf\Pro\Requests\Icon\CreateIconV1Request;
use spkm\Jamf\Pro\Requests\Icon\GetIconDownloadV1Request;
use spkm\Jamf\Pro\Requests\Icon\GetIconV1Request;
use spkm\Jamf\Pro\Requests\ImpactAlertNotificationSettings\GetImpactAlertNotificationSettingsV1Request;
use spkm\Jamf\Pro\Requests\ImpactAlertNotificationSettings\ReplaceImpactAlertNotificationSettingsV1Request;
use spkm\Jamf\Pro\Requests\InventoryInformation\GetInventoryInformationV1Request;
use spkm\Jamf\Pro\Requests\InventoryPreload\CreateInventoryPreloadCsvV2Request;
use spkm\Jamf\Pro\Requests\InventoryPreload\CreateInventoryPreloadHistoryV2Request;
use spkm\Jamf\Pro\Requests\InventoryPreload\CreateInventoryPreloadRecordsV2Request;
use spkm\Jamf\Pro\Requests\InventoryPreload\DeleteInventoryPreloadRecordsAllV2Request;
use spkm\Jamf\Pro\Requests\InventoryPreload\DeleteInventoryPreloadRecordV2Request;
use spkm\Jamf\Pro\Requests\InventoryPreload\ExportInventoryPreloadV2Request;
use spkm\Jamf\Pro\Requests\InventoryPreload\GetInventoryPreloadCsvTemplateV2Request;
use spkm\Jamf\Pro\Requests\InventoryPreload\GetInventoryPreloadCsvV2Request;
use spkm\Jamf\Pro\Requests\InventoryPreload\GetInventoryPreloadEaColumnsV2Request;
use spkm\Jamf\Pro\Requests\InventoryPreload\GetInventoryPreloadHistoryV2Request;
use spkm\Jamf\Pro\Requests\InventoryPreload\GetInventoryPreloadRecordsV2Request;
use spkm\Jamf\Pro\Requests\InventoryPreload\GetInventoryPreloadRecordV2Request;
use spkm\Jamf\Pro\Requests\InventoryPreload\ReplaceInventoryPreloadRecordV2Request;
use spkm\Jamf\Pro\Requests\InventoryPreload\ValidateInventoryPreloadCsvV2Request;
use spkm\Jamf\Pro\Requests\JamfCloudDistributionService\CreateJcdsFilesV1Request;
use spkm\Jamf\Pro\Requests\JamfCloudDistributionService\DeleteJcdsFileV1Request;
use spkm\Jamf\Pro\Requests\JamfCloudDistributionService\GetJcdsFilesV1Request;
use spkm\Jamf\Pro\Requests\JamfCloudDistributionService\GetJcdsFileV1Request;
use spkm\Jamf\Pro\Requests\JamfCloudDistributionService\RefreshJcdsInventoryV1Request;
use spkm\Jamf\Pro\Requests\JamfCloudDistributionService\RenewJcdsCredentialsV1Request;
use spkm\Jamf\Pro\Requests\JamfConnect\CreateJamfConnectHistoryV1Request;
use spkm\Jamf\Pro\Requests\JamfConnect\GetJamfConnectConfigProfilesV1Request;
use spkm\Jamf\Pro\Requests\JamfConnect\GetJamfConnectDeploymentTasksV1Request;
use spkm\Jamf\Pro\Requests\JamfConnect\GetJamfConnectHistoryV1Request;
use spkm\Jamf\Pro\Requests\JamfConnect\GetJamfConnectV1Request;
use spkm\Jamf\Pro\Requests\JamfConnect\ReplaceJamfConnectConfigProfileV1Request;
use spkm\Jamf\Pro\Requests\JamfConnect\RetryJamfConnectDeploymentTasksV1Request;
use spkm\Jamf\Pro\Requests\JamfManagementFramework\RedeployJamfManagementFrameworkV1Request;
use spkm\Jamf\Pro\Requests\JamfPackage\GetJamfPackageV1Request;
use spkm\Jamf\Pro\Requests\JamfPackage\GetJamfPackageV2Request;
use spkm\Jamf\Pro\Requests\JamfProAccountPreferences\GetAccountPreferencesV2Request;
use spkm\Jamf\Pro\Requests\JamfProAccountPreferences\GetAccountPreferencesV3Request;
use spkm\Jamf\Pro\Requests\JamfProAccountPreferences\UpdateAccountPreferencesV2Request;
use spkm\Jamf\Pro\Requests\JamfProAccountPreferences\UpdateAccountPreferencesV3Request;
use spkm\Jamf\Pro\Requests\JamfProInformation\GetJamfProInformationV2Request;
use spkm\Jamf\Pro\Requests\JamfProInitialization\InitializeSystemDatabaseConnectionV1Request;
use spkm\Jamf\Pro\Requests\JamfProInitialization\InitializeSystemFedrampV1Request;
use spkm\Jamf\Pro\Requests\JamfProInitialization\InitializeSystemPlatformV1Request;
use spkm\Jamf\Pro\Requests\JamfProInitialization\InitializeSystemV1Request;
use spkm\Jamf\Pro\Requests\JamfProNotifications\DeleteNotificationsV1Request;
use spkm\Jamf\Pro\Requests\JamfProNotifications\DeleteNotificationV1Request;
use spkm\Jamf\Pro\Requests\JamfProNotifications\GetNotificationsV1Request;
use spkm\Jamf\Pro\Requests\JamfProServerUrlPreview\CreateJamfProServerUrlHistoryV1Request;
use spkm\Jamf\Pro\Requests\JamfProServerUrlPreview\GetJamfProServerUrlHistoryV1Request;
use spkm\Jamf\Pro\Requests\JamfProServerUrlPreview\GetJamfProServerUrlV1Request;
use spkm\Jamf\Pro\Requests\JamfProServerUrlPreview\ReplaceJamfProServerUrlV1Request;
use spkm\Jamf\Pro\Requests\JamfProtect\CreateJamfProtectHistoryV1Request;
use spkm\Jamf\Pro\Requests\JamfProtect\CreateJamfProtectRegisterV1Request;
use spkm\Jamf\Pro\Requests\JamfProtect\DeleteJamfProtectV1Request;
use spkm\Jamf\Pro\Requests\JamfProtect\GetJamfProtectDeploymentTasksV1Request;
use spkm\Jamf\Pro\Requests\JamfProtect\GetJamfProtectHistoryV1Request;
use spkm\Jamf\Pro\Requests\JamfProtect\GetJamfProtectPlansV1Request;
use spkm\Jamf\Pro\Requests\JamfProtect\GetJamfProtectV1Request;
use spkm\Jamf\Pro\Requests\JamfProtect\ReplaceJamfProtectV1Request;
use spkm\Jamf\Pro\Requests\JamfProtect\RetryJamfProtectDeploymentTasksV1Request;
use spkm\Jamf\Pro\Requests\JamfProtect\SyncJamfProtectPlansV1Request;
use spkm\Jamf\Pro\Requests\JamfProUserAccountSettings\DeleteUserPreferenceV1Request;
use spkm\Jamf\Pro\Requests\JamfProUserAccountSettings\GetUserPreferencesSettingsV1Request;
use spkm\Jamf\Pro\Requests\JamfProUserAccountSettings\GetUserPreferenceV1Request;
use spkm\Jamf\Pro\Requests\JamfProUserAccountSettings\ReplaceUserPreferenceV1Request;
use spkm\Jamf\Pro\Requests\JamfProVersion\GetJamfProVersionV1Request;
use spkm\Jamf\Pro\Requests\JamfRemoteAssist\ExportJamfRemoteAssistSessionV2Request;
use spkm\Jamf\Pro\Requests\JamfRemoteAssist\GetJamfRemoteAssistSessionByIdV1Request;
use spkm\Jamf\Pro\Requests\JamfRemoteAssist\GetJamfRemoteAssistSessionByIdV2Request;
use spkm\Jamf\Pro\Requests\JamfRemoteAssist\GetJamfRemoteAssistSessionV1Request;
use spkm\Jamf\Pro\Requests\JamfRemoteAssist\GetJamfRemoteAssistSessionV2Request;
use spkm\Jamf\Pro\Requests\LastLogin\GetLastLoginV1Request;
use spkm\Jamf\Pro\Requests\Ldap\GetLdapGroupsRequest;
use spkm\Jamf\Pro\Requests\Ldap\GetLdapGroupsV1Request;
use spkm\Jamf\Pro\Requests\Ldap\GetLdapLdapServersV1Request;
use spkm\Jamf\Pro\Requests\Ldap\GetLdapServersRequest;
use spkm\Jamf\Pro\Requests\Ldap\GetLdapServersV1Request;
use spkm\Jamf\Pro\Requests\LocalAdminPassword\GetLocalAdminPasswordAccountAuditByGuidV2Request;
use spkm\Jamf\Pro\Requests\LocalAdminPassword\GetLocalAdminPasswordAccountAuditV2Request;
use spkm\Jamf\Pro\Requests\LocalAdminPassword\GetLocalAdminPasswordAccountHistoryByGuidV2Request;
use spkm\Jamf\Pro\Requests\LocalAdminPassword\GetLocalAdminPasswordAccountHistoryV2Request;
use spkm\Jamf\Pro\Requests\LocalAdminPassword\GetLocalAdminPasswordAccountPasswordByGuidV2Request;
use spkm\Jamf\Pro\Requests\LocalAdminPassword\GetLocalAdminPasswordAccountPasswordV2Request;
use spkm\Jamf\Pro\Requests\LocalAdminPassword\GetLocalAdminPasswordAccountsV2Request;
use spkm\Jamf\Pro\Requests\LocalAdminPassword\GetLocalAdminPasswordHistoryV2Request;
use spkm\Jamf\Pro\Requests\LocalAdminPassword\GetLocalAdminPasswordPendingRotationsV2Request;
use spkm\Jamf\Pro\Requests\LocalAdminPassword\GetLocalAdminPasswordSettingsV2Request;
use spkm\Jamf\Pro\Requests\LocalAdminPassword\ReplaceLocalAdminPasswordSetPasswordV2Request;
use spkm\Jamf\Pro\Requests\LocalAdminPassword\ReplaceLocalAdminPasswordSettingsV2Request;
use spkm\Jamf\Pro\Requests\LocalesPreview\GetLocalesV1Request;
use spkm\Jamf\Pro\Requests\LogFlushing\CreateLogFlushingTaskV1Request;
use spkm\Jamf\Pro\Requests\LogFlushing\DeleteLogFlushingTaskV1Request;
use spkm\Jamf\Pro\Requests\LogFlushing\GetLogFlushingTaskByIdV1Request;
use spkm\Jamf\Pro\Requests\LogFlushing\GetLogFlushingTaskV1Request;
use spkm\Jamf\Pro\Requests\LogFlushing\GetLogFlushingV1Request;
use spkm\Jamf\Pro\Requests\LoginCustomization\GetLoginCustomizationV1Request;
use spkm\Jamf\Pro\Requests\LoginCustomization\ReplaceLoginCustomizationV1Request;
use spkm\Jamf\Pro\Requests\M2m\GetM2mTenantIdV1Request;
use spkm\Jamf\Pro\Requests\MacosManagedSoftwareUpdates\GetMacosManagedSoftwareUpdatesAvailableUpdatesV1Request;
use spkm\Jamf\Pro\Requests\MacosManagedSoftwareUpdates\SendMacosManagedSoftwareUpdatesUpdatesV1Request;
use spkm\Jamf\Pro\Requests\ManagedSoftwareUpdates\AbandonManagedSoftwareUpdatesPlansFeatureToggleV1Request;
use spkm\Jamf\Pro\Requests\ManagedSoftwareUpdates\CreateManagedSoftwareUpdatesPlansGroupV1Request;
use spkm\Jamf\Pro\Requests\ManagedSoftwareUpdates\CreateManagedSoftwareUpdatesPlansV1Request;
use spkm\Jamf\Pro\Requests\ManagedSoftwareUpdates\GetManagedSoftwareUpdatesAvailableUpdatesV1Request;
use spkm\Jamf\Pro\Requests\ManagedSoftwareUpdates\GetManagedSoftwareUpdatesPlanDeclarationsV1Request;
use spkm\Jamf\Pro\Requests\ManagedSoftwareUpdates\GetManagedSoftwareUpdatesPlanEventsV1Request;
use spkm\Jamf\Pro\Requests\ManagedSoftwareUpdates\GetManagedSoftwareUpdatesPlansFeatureToggleStatusV1Request;
use spkm\Jamf\Pro\Requests\ManagedSoftwareUpdates\GetManagedSoftwareUpdatesPlansFeatureToggleV1Request;
use spkm\Jamf\Pro\Requests\ManagedSoftwareUpdates\GetManagedSoftwareUpdatesPlansGroupV1Request;
use spkm\Jamf\Pro\Requests\ManagedSoftwareUpdates\GetManagedSoftwareUpdatesPlansV1Request;
use spkm\Jamf\Pro\Requests\ManagedSoftwareUpdates\GetManagedSoftwareUpdatesPlanV1Request;
use spkm\Jamf\Pro\Requests\ManagedSoftwareUpdates\GetManagedSoftwareUpdatesUpdateStatusesComputerGroupV1Request;
use spkm\Jamf\Pro\Requests\ManagedSoftwareUpdates\GetManagedSoftwareUpdatesUpdateStatusesComputerV1Request;
use spkm\Jamf\Pro\Requests\ManagedSoftwareUpdates\GetManagedSoftwareUpdatesUpdateStatusesMobileDeviceGroupV1Request;
use spkm\Jamf\Pro\Requests\ManagedSoftwareUpdates\GetManagedSoftwareUpdatesUpdateStatusesMobileDeviceV1Request;
use spkm\Jamf\Pro\Requests\ManagedSoftwareUpdates\GetManagedSoftwareUpdatesUpdateStatusesV1Request;
use spkm\Jamf\Pro\Requests\ManagedSoftwareUpdates\ReplaceManagedSoftwareUpdatesPlansFeatureToggleV1Request;
use spkm\Jamf\Pro\Requests\Mdm\CreateMdmBlankPushV2Request;
use spkm\Jamf\Pro\Requests\Mdm\CreateMdmCommandsV2Request;
use spkm\Jamf\Pro\Requests\Mdm\DeployPackageV1Request;
use spkm\Jamf\Pro\Requests\Mdm\GetMdmCommandsV1Request;
use spkm\Jamf\Pro\Requests\Mdm\GetMdmCommandsV2Request;
use spkm\Jamf\Pro\Requests\Mdm\RenewMdmProfileV1Request;
use spkm\Jamf\Pro\Requests\MdmRenewal\DeleteMdmRenewalRenewalStrategyV1Request;
use spkm\Jamf\Pro\Requests\MdmRenewal\GetMdmRenewalDeviceCommonDetailV1Request;
use spkm\Jamf\Pro\Requests\MdmRenewal\GetMdmRenewalRenewalStrategyV1Request;
use spkm\Jamf\Pro\Requests\MdmRenewal\UpdateMdmRenewalDeviceCommonDetailsV1Request;
use spkm\Jamf\Pro\Requests\MobileDeviceApps\ReinstallMobileDeviceAppsAppConfigV1Request;
use spkm\Jamf\Pro\Requests\MobileDeviceEnrollmentProfile\GetMobileDeviceEnrollmentProfileDownloadProfileV1Request;
use spkm\Jamf\Pro\Requests\MobileDeviceExtensionAttributes\CreateMobileDeviceExtensionAttributeHistoryV1Request;
use spkm\Jamf\Pro\Requests\MobileDeviceExtensionAttributes\CreateMobileDeviceExtensionAttributesV1Request;
use spkm\Jamf\Pro\Requests\MobileDeviceExtensionAttributes\DeleteMobileDeviceExtensionAttributeV1Request;
use spkm\Jamf\Pro\Requests\MobileDeviceExtensionAttributes\GetMobileDeviceExtensionAttributeDataDependencyV1Request;
use spkm\Jamf\Pro\Requests\MobileDeviceExtensionAttributes\GetMobileDeviceExtensionAttributeHistoryV1Request;
use spkm\Jamf\Pro\Requests\MobileDeviceExtensionAttributes\GetMobileDeviceExtensionAttributesV1Request;
use spkm\Jamf\Pro\Requests\MobileDeviceExtensionAttributes\GetMobileDeviceExtensionAttributeV1Request;
use spkm\Jamf\Pro\Requests\MobileDeviceExtensionAttributes\ReplaceMobileDeviceExtensionAttributeV1Request;
use spkm\Jamf\Pro\Requests\MobileDeviceExtensionAttributesPreview\GetDevicesExtensionAttributesRequest;
use spkm\Jamf\Pro\Requests\MobileDeviceGroups\CreateMobileDeviceGroupsSmartGroupsV1Request;
use spkm\Jamf\Pro\Requests\MobileDeviceGroups\CreateMobileDeviceGroupsSmartGroupsV2Request;
use spkm\Jamf\Pro\Requests\MobileDeviceGroups\CreateMobileDeviceGroupsStaticGroupsV1Request;
use spkm\Jamf\Pro\Requests\MobileDeviceGroups\CreateMobileDeviceGroupsStaticGroupsV2Request;
use spkm\Jamf\Pro\Requests\MobileDeviceGroups\DeleteMobileDeviceGroupsSmartGroupV1Request;
use spkm\Jamf\Pro\Requests\MobileDeviceGroups\DeleteMobileDeviceGroupsSmartGroupV2Request;
use spkm\Jamf\Pro\Requests\MobileDeviceGroups\DeleteMobileDeviceGroupsStaticGroupV1Request;
use spkm\Jamf\Pro\Requests\MobileDeviceGroups\DeleteMobileDeviceGroupsStaticGroupV2Request;
use spkm\Jamf\Pro\Requests\MobileDeviceGroups\EraseMobileDeviceGroupV1Request;
use spkm\Jamf\Pro\Requests\MobileDeviceGroups\EraseMobileDeviceGroupV2Request;
use spkm\Jamf\Pro\Requests\MobileDeviceGroups\GetMobileDeviceGroupsSmartGroupMembershipV1Request;
use spkm\Jamf\Pro\Requests\MobileDeviceGroups\GetMobileDeviceGroupsSmartGroupMembershipV2Request;
use spkm\Jamf\Pro\Requests\MobileDeviceGroups\GetMobileDeviceGroupsSmartGroupsV1Request;
use spkm\Jamf\Pro\Requests\MobileDeviceGroups\GetMobileDeviceGroupsSmartGroupsV2Request;
use spkm\Jamf\Pro\Requests\MobileDeviceGroups\GetMobileDeviceGroupsSmartGroupV1Request;
use spkm\Jamf\Pro\Requests\MobileDeviceGroups\GetMobileDeviceGroupsSmartGroupV2Request;
use spkm\Jamf\Pro\Requests\MobileDeviceGroups\GetMobileDeviceGroupsStaticGroupMembershipV1Request;
use spkm\Jamf\Pro\Requests\MobileDeviceGroups\GetMobileDeviceGroupsStaticGroupMembershipV2Request;
use spkm\Jamf\Pro\Requests\MobileDeviceGroups\GetMobileDeviceGroupsStaticGroupsV1Request;
use spkm\Jamf\Pro\Requests\MobileDeviceGroups\GetMobileDeviceGroupsStaticGroupsV2Request;
use spkm\Jamf\Pro\Requests\MobileDeviceGroups\GetMobileDeviceGroupsStaticGroupV1Request;
use spkm\Jamf\Pro\Requests\MobileDeviceGroups\GetMobileDeviceGroupsStaticGroupV2Request;
use spkm\Jamf\Pro\Requests\MobileDeviceGroups\GetMobileDeviceGroupsV1Request;
use spkm\Jamf\Pro\Requests\MobileDeviceGroups\GetMobileDeviceGroupsV2Request;
use spkm\Jamf\Pro\Requests\MobileDeviceGroups\ReplaceMobileDeviceGroupsSmartGroupV1Request;
use spkm\Jamf\Pro\Requests\MobileDeviceGroups\ReplaceMobileDeviceGroupsSmartGroupV2Request;
use spkm\Jamf\Pro\Requests\MobileDeviceGroups\UpdateMobileDeviceGroupsStaticGroupV1Request;
use spkm\Jamf\Pro\Requests\MobileDeviceGroups\UpdateMobileDeviceGroupsStaticGroupV2Request;
use spkm\Jamf\Pro\Requests\MobileDevicePrestages\CreateMobileDevicePrestageAttachmentsV2Request;
use spkm\Jamf\Pro\Requests\MobileDevicePrestages\CreateMobileDevicePrestageAttachmentsV3Request;
use spkm\Jamf\Pro\Requests\MobileDevicePrestages\CreateMobileDevicePrestageHistoryV2Request;
use spkm\Jamf\Pro\Requests\MobileDevicePrestages\CreateMobileDevicePrestageHistoryV3Request;
use spkm\Jamf\Pro\Requests\MobileDevicePrestages\CreateMobileDevicePrestageScopeV2Request;
use spkm\Jamf\Pro\Requests\MobileDevicePrestages\CreateMobileDevicePrestagesV2Request;
use spkm\Jamf\Pro\Requests\MobileDevicePrestages\CreateMobileDevicePrestagesV3Request;
use spkm\Jamf\Pro\Requests\MobileDevicePrestages\DeleteMobileDevicePrestageV2Request;
use spkm\Jamf\Pro\Requests\MobileDevicePrestages\DeleteMobileDevicePrestageV3Request;
use spkm\Jamf\Pro\Requests\MobileDevicePrestages\DeleteMultipleMobileDevicePrestageAttachmentsV2Request;
use spkm\Jamf\Pro\Requests\MobileDevicePrestages\DeleteMultipleMobileDevicePrestageAttachmentsV3Request;
use spkm\Jamf\Pro\Requests\MobileDevicePrestages\DeleteMultipleMobileDevicePrestageScopeV2Request;
use spkm\Jamf\Pro\Requests\MobileDevicePrestages\GetMobileDevicePrestageAttachmentsV2Request;
use spkm\Jamf\Pro\Requests\MobileDevicePrestages\GetMobileDevicePrestageAttachmentsV3Request;
use spkm\Jamf\Pro\Requests\MobileDevicePrestages\GetMobileDevicePrestageHistoryV2Request;
use spkm\Jamf\Pro\Requests\MobileDevicePrestages\GetMobileDevicePrestageHistoryV3Request;
use spkm\Jamf\Pro\Requests\MobileDevicePrestages\GetMobileDevicePrestageScopeV2Request;
use spkm\Jamf\Pro\Requests\MobileDevicePrestages\GetMobileDevicePrestagesScopeV2Request;
use spkm\Jamf\Pro\Requests\MobileDevicePrestages\GetMobileDevicePrestagesSyncsV2Request;
use spkm\Jamf\Pro\Requests\MobileDevicePrestages\GetMobileDevicePrestagesV2Request;
use spkm\Jamf\Pro\Requests\MobileDevicePrestages\GetMobileDevicePrestagesV3Request;
use spkm\Jamf\Pro\Requests\MobileDevicePrestages\GetMobileDevicePrestageSyncsLatestV2Request;
use spkm\Jamf\Pro\Requests\MobileDevicePrestages\GetMobileDevicePrestageSyncsV2Request;
use spkm\Jamf\Pro\Requests\MobileDevicePrestages\GetMobileDevicePrestageV2Request;
use spkm\Jamf\Pro\Requests\MobileDevicePrestages\GetMobileDevicePrestageV3Request;
use spkm\Jamf\Pro\Requests\MobileDevicePrestages\ReplaceMobileDevicePrestageScopeV2Request;
use spkm\Jamf\Pro\Requests\MobileDevicePrestages\ReplaceMobileDevicePrestageV2Request;
use spkm\Jamf\Pro\Requests\MobileDevicePrestages\ReplaceMobileDevicePrestageV3Request;
use spkm\Jamf\Pro\Requests\MobileDevices\EraseMobileDeviceV2Request;
use spkm\Jamf\Pro\Requests\MobileDevices\GetMobileDeviceDetailV2Request;
use spkm\Jamf\Pro\Requests\MobileDevices\GetMobileDevicePairedDevicesV2Request;
use spkm\Jamf\Pro\Requests\MobileDevices\GetMobileDevicesDetailV2Request;
use spkm\Jamf\Pro\Requests\MobileDevices\GetMobileDevicesV2Request;
use spkm\Jamf\Pro\Requests\MobileDevices\GetMobileDeviceV2Request;
use spkm\Jamf\Pro\Requests\MobileDevices\UnmanageMobileDeviceV2Request;
use spkm\Jamf\Pro\Requests\MobileDevices\UpdateMobileDeviceV2Request;
use spkm\Jamf\Pro\Requests\Oidc\DispatchOidcV1Request;
use spkm\Jamf\Pro\Requests\Oidc\DispatchOidcV2Request;
use spkm\Jamf\Pro\Requests\Oidc\GenerateOidcCertificateV1Request;
use spkm\Jamf\Pro\Requests\Oidc\GetOidcDirectIdpLoginUrlV1Request;
use spkm\Jamf\Pro\Requests\Oidc\GetOidcPublicFeaturesV1Request;
use spkm\Jamf\Pro\Requests\Oidc\GetOidcPublicKeyV1Request;
use spkm\Jamf\Pro\Requests\Onboarding\CreateOnboardingHistoryV1Request;
use spkm\Jamf\Pro\Requests\Onboarding\ExportOnboardingHistoryV1Request;
use spkm\Jamf\Pro\Requests\Onboarding\GetOnboardingEligibleAppsV1Request;
use spkm\Jamf\Pro\Requests\Onboarding\GetOnboardingEligibleConfigurationProfilesV1Request;
use spkm\Jamf\Pro\Requests\Onboarding\GetOnboardingEligiblePoliciesV1Request;
use spkm\Jamf\Pro\Requests\Onboarding\GetOnboardingHistoryV1Request;
use spkm\Jamf\Pro\Requests\Onboarding\GetOnboardingV1Request;
use spkm\Jamf\Pro\Requests\Onboarding\ReplaceOnboardingV1Request;
use spkm\Jamf\Pro\Requests\Packages\CreatePackageHistoryV1Request;
use spkm\Jamf\Pro\Requests\Packages\CreatePackageManifestV1Request;
use spkm\Jamf\Pro\Requests\Packages\CreatePackagesV1Request;
use spkm\Jamf\Pro\Requests\Packages\DeleteMultiplePackagesV1Request;
use spkm\Jamf\Pro\Requests\Packages\DeletePackageManifestV1Request;
use spkm\Jamf\Pro\Requests\Packages\DeletePackageV1Request;
use spkm\Jamf\Pro\Requests\Packages\ExportPackageHistoryV1Request;
use spkm\Jamf\Pro\Requests\Packages\ExportPackagesV1Request;
use spkm\Jamf\Pro\Requests\Packages\GetPackageHistoryV1Request;
use spkm\Jamf\Pro\Requests\Packages\GetPackagesV1Request;
use spkm\Jamf\Pro\Requests\Packages\GetPackageV1Request;
use spkm\Jamf\Pro\Requests\Packages\ReplacePackageV1Request;
use spkm\Jamf\Pro\Requests\Packages\UploadPackageV1Request;
use spkm\Jamf\Pro\Requests\ParentAppPreview\CreateParentAppHistoryV1Request;
use spkm\Jamf\Pro\Requests\ParentAppPreview\GetParentAppHistoryV1Request;
use spkm\Jamf\Pro\Requests\ParentAppPreview\GetParentAppV1Request;
use spkm\Jamf\Pro\Requests\ParentAppPreview\ReplaceParentAppV1Request;
use spkm\Jamf\Pro\Requests\PatchManagement\CreatePatchManagementAcceptDisclaimerV2Request;
use spkm\Jamf\Pro\Requests\PatchPolicies\CreatePatchPolicyDashboardV2Request;
use spkm\Jamf\Pro\Requests\PatchPolicies\DeletePatchPolicyDashboardV2Request;
use spkm\Jamf\Pro\Requests\PatchPolicies\GetPatchPoliciesPolicyDetailsV2Request;
use spkm\Jamf\Pro\Requests\PatchPolicies\GetPatchPoliciesV2Request;
use spkm\Jamf\Pro\Requests\PatchPolicies\GetPatchPolicyDashboardV2Request;
use spkm\Jamf\Pro\Requests\PatchPolicyLogs\GetPatchPolicyLogDetailsV2Request;
use spkm\Jamf\Pro\Requests\PatchPolicyLogs\GetPatchPolicyLogsEligibleRetryCountV2Request;
use spkm\Jamf\Pro\Requests\PatchPolicyLogs\GetPatchPolicyLogsV2Request;
use spkm\Jamf\Pro\Requests\PatchPolicyLogs\GetPatchPolicyLogV2Request;
use spkm\Jamf\Pro\Requests\PatchPolicyLogs\RetryPatchPolicyLogsAllV2Request;
use spkm\Jamf\Pro\Requests\PatchPolicyLogs\RetryPatchPolicyLogsV2Request;
use spkm\Jamf\Pro\Requests\PatchSoftwareTitleConfigurations\CreatePatchSoftwareTitleConfigurationDashboardV2Request;
use spkm\Jamf\Pro\Requests\PatchSoftwareTitleConfigurations\CreatePatchSoftwareTitleConfigurationDashboardV3Request;
use spkm\Jamf\Pro\Requests\PatchSoftwareTitleConfigurations\CreatePatchSoftwareTitleConfigurationHistoryV2Request;
use spkm\Jamf\Pro\Requests\PatchSoftwareTitleConfigurations\CreatePatchSoftwareTitleConfigurationHistoryV3Request;
use spkm\Jamf\Pro\Requests\PatchSoftwareTitleConfigurations\CreatePatchSoftwareTitleConfigurationsV2Request;
use spkm\Jamf\Pro\Requests\PatchSoftwareTitleConfigurations\CreatePatchSoftwareTitleConfigurationsV3Request;
use spkm\Jamf\Pro\Requests\PatchSoftwareTitleConfigurations\DeletePatchSoftwareTitleConfigurationDashboardV2Request;
use spkm\Jamf\Pro\Requests\PatchSoftwareTitleConfigurations\DeletePatchSoftwareTitleConfigurationDashboardV3Request;
use spkm\Jamf\Pro\Requests\PatchSoftwareTitleConfigurations\DeletePatchSoftwareTitleConfigurationV2Request;
use spkm\Jamf\Pro\Requests\PatchSoftwareTitleConfigurations\DeletePatchSoftwareTitleConfigurationV3Request;
use spkm\Jamf\Pro\Requests\PatchSoftwareTitleConfigurations\GetPatchSoftwareTitleConfigurationDashboardV2Request;
use spkm\Jamf\Pro\Requests\PatchSoftwareTitleConfigurations\GetPatchSoftwareTitleConfigurationDashboardV3Request;
use spkm\Jamf\Pro\Requests\PatchSoftwareTitleConfigurations\GetPatchSoftwareTitleConfigurationDefinitionsV2Request;
use spkm\Jamf\Pro\Requests\PatchSoftwareTitleConfigurations\GetPatchSoftwareTitleConfigurationDefinitionsV3Request;
use spkm\Jamf\Pro\Requests\PatchSoftwareTitleConfigurations\GetPatchSoftwareTitleConfigurationDependenciesV2Request;
use spkm\Jamf\Pro\Requests\PatchSoftwareTitleConfigurations\GetPatchSoftwareTitleConfigurationDependenciesV3Request;
use spkm\Jamf\Pro\Requests\PatchSoftwareTitleConfigurations\GetPatchSoftwareTitleConfigurationExportReportV2Request;
use spkm\Jamf\Pro\Requests\PatchSoftwareTitleConfigurations\GetPatchSoftwareTitleConfigurationExportReportV3Request;
use spkm\Jamf\Pro\Requests\PatchSoftwareTitleConfigurations\GetPatchSoftwareTitleConfigurationExtensionAttributesV2Request;
use spkm\Jamf\Pro\Requests\PatchSoftwareTitleConfigurations\GetPatchSoftwareTitleConfigurationExtensionAttributesV3Request;
use spkm\Jamf\Pro\Requests\PatchSoftwareTitleConfigurations\GetPatchSoftwareTitleConfigurationHistoryV2Request;
use spkm\Jamf\Pro\Requests\PatchSoftwareTitleConfigurations\GetPatchSoftwareTitleConfigurationHistoryV3Request;
use spkm\Jamf\Pro\Requests\PatchSoftwareTitleConfigurations\GetPatchSoftwareTitleConfigurationPatchReportV2Request;
use spkm\Jamf\Pro\Requests\PatchSoftwareTitleConfigurations\GetPatchSoftwareTitleConfigurationPatchReportV3Request;
use spkm\Jamf\Pro\Requests\PatchSoftwareTitleConfigurations\GetPatchSoftwareTitleConfigurationPatchSummaryV2Request;
use spkm\Jamf\Pro\Requests\PatchSoftwareTitleConfigurations\GetPatchSoftwareTitleConfigurationPatchSummaryV3Request;
use spkm\Jamf\Pro\Requests\PatchSoftwareTitleConfigurations\GetPatchSoftwareTitleConfigurationPatchSummaryVersionsV2Request;
use spkm\Jamf\Pro\Requests\PatchSoftwareTitleConfigurations\GetPatchSoftwareTitleConfigurationPatchSummaryVersionsV3Request;
use spkm\Jamf\Pro\Requests\PatchSoftwareTitleConfigurations\GetPatchSoftwareTitleConfigurationsV2Request;
use spkm\Jamf\Pro\Requests\PatchSoftwareTitleConfigurations\GetPatchSoftwareTitleConfigurationsV3Request;
use spkm\Jamf\Pro\Requests\PatchSoftwareTitleConfigurations\GetPatchSoftwareTitleConfigurationV2Request;
use spkm\Jamf\Pro\Requests\PatchSoftwareTitleConfigurations\GetPatchSoftwareTitleConfigurationV3Request;
use spkm\Jamf\Pro\Requests\PatchSoftwareTitleConfigurations\UpdatePatchSoftwareTitleConfigurationV2Request;
use spkm\Jamf\Pro\Requests\PatchSoftwareTitleConfigurations\UpdatePatchSoftwareTitleConfigurationV3Request;
use spkm\Jamf\Pro\Requests\PoliciesPreview\GetPolicyPropertiesV1Request;
use spkm\Jamf\Pro\Requests\PoliciesPreview\GetSettingsObjPolicyPropertiesRequest;
use spkm\Jamf\Pro\Requests\PoliciesPreview\ReplacePolicyPropertiesV1Request;
use spkm\Jamf\Pro\Requests\PoliciesPreview\ReplaceSettingsObjPolicyPropertiesRequest;
use spkm\Jamf\Pro\Requests\ReEnrollmentPreview\CreateReenrollmentHistoryV1Request;
use spkm\Jamf\Pro\Requests\ReEnrollmentPreview\ExportReenrollmentHistoryV1Request;
use spkm\Jamf\Pro\Requests\ReEnrollmentPreview\GetReenrollmentHistoryV1Request;
use spkm\Jamf\Pro\Requests\ReEnrollmentPreview\GetReenrollmentV1Request;
use spkm\Jamf\Pro\Requests\ReEnrollmentPreview\ReplaceReenrollmentV1Request;
use spkm\Jamf\Pro\Requests\RemoteAdministration\GetRemoteAdministrationConfigurationsPreviewRequest;
use spkm\Jamf\Pro\Requests\ReturnToService\CreateReturnToServiceV1Request;
use spkm\Jamf\Pro\Requests\ReturnToService\DeleteReturnToServiceV1Request;
use spkm\Jamf\Pro\Requests\ReturnToService\GetReturnToServiceByIdV1Request;
use spkm\Jamf\Pro\Requests\ReturnToService\GetReturnToServiceV1Request;
use spkm\Jamf\Pro\Requests\ReturnToService\ReplaceReturnToServiceV1Request;
use spkm\Jamf\Pro\Requests\Scheduler\GetSchedulerJobsV1Request;
use spkm\Jamf\Pro\Requests\Scheduler\GetSchedulerJobTriggersV1Request;
use spkm\Jamf\Pro\Requests\Scheduler\GetSchedulerSummaryV1Request;
use spkm\Jamf\Pro\Requests\Scripts\CreateScriptHistoryV1Request;
use spkm\Jamf\Pro\Requests\Scripts\CreateScriptsV1Request;
use spkm\Jamf\Pro\Requests\Scripts\DeleteScriptV1Request;
use spkm\Jamf\Pro\Requests\Scripts\GetScriptDownloadV1Request;
use spkm\Jamf\Pro\Requests\Scripts\GetScriptHistoryV1Request;
use spkm\Jamf\Pro\Requests\Scripts\GetScriptsV1Request;
use spkm\Jamf\Pro\Requests\Scripts\GetScriptV1Request;
use spkm\Jamf\Pro\Requests\Scripts\ReplaceScriptV1Request;
use spkm\Jamf\Pro\Requests\SelfService\CreateSelfServiceSettingsHistoryV1Request;
use spkm\Jamf\Pro\Requests\SelfService\GetSelfServiceSettingsHistoryV1Request;
use spkm\Jamf\Pro\Requests\SelfService\GetSelfServiceSettingsV1Request;
use spkm\Jamf\Pro\Requests\SelfService\ReplaceSelfServiceSettingsV1Request;
use spkm\Jamf\Pro\Requests\SelfServiceBrandingIos\CreateSelfServiceBrandingIosV1Request;
use spkm\Jamf\Pro\Requests\SelfServiceBrandingIos\DeleteSelfServiceBrandingIosV1Request;
use spkm\Jamf\Pro\Requests\SelfServiceBrandingIos\GetSelfServiceBrandingIosByIdV1Request;
use spkm\Jamf\Pro\Requests\SelfServiceBrandingIos\GetSelfServiceBrandingIosV1Request;
use spkm\Jamf\Pro\Requests\SelfServiceBrandingIos\ReplaceSelfServiceBrandingIosV1Request;
use spkm\Jamf\Pro\Requests\SelfServiceBrandingMacos\CreateSelfServiceBrandingMacosV1Request;
use spkm\Jamf\Pro\Requests\SelfServiceBrandingMacos\DeleteSelfServiceBrandingMacosV1Request;
use spkm\Jamf\Pro\Requests\SelfServiceBrandingMacos\GetSelfServiceBrandingMacosByIdV1Request;
use spkm\Jamf\Pro\Requests\SelfServiceBrandingMacos\GetSelfServiceBrandingMacosV1Request;
use spkm\Jamf\Pro\Requests\SelfServiceBrandingMacos\ReplaceSelfServiceBrandingMacosV1Request;
use spkm\Jamf\Pro\Requests\SelfServiceBrandingPreview\CreateSelfServiceBrandingImagesRequest;
use spkm\Jamf\Pro\Requests\SelfServicePlus\GetSelfServicePlusFeatureToggleEnabledV1Request;
use spkm\Jamf\Pro\Requests\SelfServicePlus\GetSelfServicePlusSettingsV1Request;
use spkm\Jamf\Pro\Requests\SelfServicePlus\ReplaceSelfServicePlusSettingsV1Request;
use spkm\Jamf\Pro\Requests\ServiceDiscoveryEnrollment\GetServiceDiscoveryEnrollmentWellKnownSettingsV1Request;
use spkm\Jamf\Pro\Requests\ServiceDiscoveryEnrollment\ReplaceServiceDiscoveryEnrollmentWellKnownSettingsV1Request;
use spkm\Jamf\Pro\Requests\Sites\GetSiteObjectsV1Request;
use spkm\Jamf\Pro\Requests\Sites\GetSitesV1Request;
use spkm\Jamf\Pro\Requests\Slasa\CreateSlasaV1Request;
use spkm\Jamf\Pro\Requests\Slasa\GetSlasaV1Request;
use spkm\Jamf\Pro\Requests\SmartComputerGroupsPreview\RecalculateComputerSmartGroupsV1Request;
use spkm\Jamf\Pro\Requests\SmartComputerGroupsPreview\RecalculateSmartComputerGroupV1Request;
use spkm\Jamf\Pro\Requests\SmartMobileDeviceGroupsPreview\RecalculateMobileDeviceSmartGroupsV1Request;
use spkm\Jamf\Pro\Requests\SmartMobileDeviceGroupsPreview\RecalculateSmartMobileDeviceGroupV1Request;
use spkm\Jamf\Pro\Requests\SmartUserGroupsPreview\RecalculateSmartUserGroupV1Request;
use spkm\Jamf\Pro\Requests\SmartUserGroupsPreview\RecalculateUserSmartGroupsV1Request;
use spkm\Jamf\Pro\Requests\SmtpServer\CreateSmtpServerHistoryV1Request;
use spkm\Jamf\Pro\Requests\SmtpServer\GetSmtpServerAllowedAuthTypesV2Request;
use spkm\Jamf\Pro\Requests\SmtpServer\GetSmtpServerHistoryV1Request;
use spkm\Jamf\Pro\Requests\SmtpServer\GetSmtpServerV2Request;
use spkm\Jamf\Pro\Requests\SmtpServer\ReplaceSmtpServerV2Request;
use spkm\Jamf\Pro\Requests\SmtpServer\TestSmtpServerV1Request;
use spkm\Jamf\Pro\Requests\SsoCertificate\CreateSsoCertV2Request;
use spkm\Jamf\Pro\Requests\SsoCertificate\DeleteSsoCertV2Request;
use spkm\Jamf\Pro\Requests\SsoCertificate\GetSsoCertDownloadV2Request;
use spkm\Jamf\Pro\Requests\SsoCertificate\GetSsoCertV2Request;
use spkm\Jamf\Pro\Requests\SsoCertificate\ParseSsoCertV2Request;
use spkm\Jamf\Pro\Requests\SsoCertificate\ReplaceSsoCertV2Request;
use spkm\Jamf\Pro\Requests\SsoFailover\GenerateSsoFailoverV1Request;
use spkm\Jamf\Pro\Requests\SsoFailover\GetSsoFailoverV1Request;
use spkm\Jamf\Pro\Requests\SsoOauthSessionTokens\GetOauth2SessionTokensV1Request;
use spkm\Jamf\Pro\Requests\SsoSettings\CreateSsoHistoryV3Request;
use spkm\Jamf\Pro\Requests\SsoSettings\DisableSsoV3Request;
use spkm\Jamf\Pro\Requests\SsoSettings\GetSsoDependenciesV3Request;
use spkm\Jamf\Pro\Requests\SsoSettings\GetSsoHistoryV3Request;
use spkm\Jamf\Pro\Requests\SsoSettings\GetSsoMetadataDownloadV3Request;
use spkm\Jamf\Pro\Requests\SsoSettings\GetSsoOidcBrokerConfigV3Request;
use spkm\Jamf\Pro\Requests\SsoSettings\GetSsoV3Request;
use spkm\Jamf\Pro\Requests\SsoSettings\ReplaceSsoOidcBrokerConfigV3Request;
use spkm\Jamf\Pro\Requests\SsoSettings\ReplaceSsoV3Request;
use spkm\Jamf\Pro\Requests\StartupStatus\GetStartupStatusRequest;
use spkm\Jamf\Pro\Requests\StaticUserGroupsPreview\GetStaticUserGroupsV1Request;
use spkm\Jamf\Pro\Requests\StaticUserGroupsPreview\GetStaticUserGroupV1Request;
use spkm\Jamf\Pro\Requests\SupervisionIdentitiesPreview\CreateSupervisionIdentitiesV1Request;
use spkm\Jamf\Pro\Requests\SupervisionIdentitiesPreview\DeleteSupervisionIdentityV1Request;
use spkm\Jamf\Pro\Requests\SupervisionIdentitiesPreview\GetSupervisionIdentitiesV1Request;
use spkm\Jamf\Pro\Requests\SupervisionIdentitiesPreview\GetSupervisionIdentityDownloadV1Request;
use spkm\Jamf\Pro\Requests\SupervisionIdentitiesPreview\GetSupervisionIdentityV1Request;
use spkm\Jamf\Pro\Requests\SupervisionIdentitiesPreview\ReplaceSupervisionIdentityV1Request;
use spkm\Jamf\Pro\Requests\SupervisionIdentitiesPreview\UploadSupervisionIdentitiesV1Request;
use spkm\Jamf\Pro\Requests\TeacherApp\CreateTeacherAppHistoryV1Request;
use spkm\Jamf\Pro\Requests\TeacherApp\GetTeacherAppHistoryV1Request;
use spkm\Jamf\Pro\Requests\TeacherApp\GetTeacherAppV1Request;
use spkm\Jamf\Pro\Requests\TeacherApp\ReplaceTeacherAppV1Request;
use spkm\Jamf\Pro\Requests\TeamViewerRemoteAdministration\CloseRemoteAdministrationConfigurationsTeamViewerSessionPreviewRequest;
use spkm\Jamf\Pro\Requests\TeamViewerRemoteAdministration\CreateRemoteAdministrationConfigurationsTeamViewerPreviewRequest;
use spkm\Jamf\Pro\Requests\TeamViewerRemoteAdministration\CreateRemoteAdministrationConfigurationsTeamViewerSessionsPreviewRequest;
use spkm\Jamf\Pro\Requests\TeamViewerRemoteAdministration\DeleteRemoteAdministrationConfigurationsTeamViewerPreviewRequest;
use spkm\Jamf\Pro\Requests\TeamViewerRemoteAdministration\GetRemoteAdministrationConfigurationsTeamViewerPreviewRequest;
use spkm\Jamf\Pro\Requests\TeamViewerRemoteAdministration\GetRemoteAdministrationConfigurationsTeamViewerSessionPreviewRequest;
use spkm\Jamf\Pro\Requests\TeamViewerRemoteAdministration\GetRemoteAdministrationConfigurationsTeamViewerSessionsPreviewRequest;
use spkm\Jamf\Pro\Requests\TeamViewerRemoteAdministration\GetRemoteAdministrationConfigurationsTeamViewerSessionStatusPreviewRequest;
use spkm\Jamf\Pro\Requests\TeamViewerRemoteAdministration\GetRemoteAdministrationConfigurationsTeamViewerStatusPreviewRequest;
use spkm\Jamf\Pro\Requests\TeamViewerRemoteAdministration\ResendRemoteAdministrationConfigurationsTeamViewerSessionNotificationPreviewRequest;
use spkm\Jamf\Pro\Requests\TeamViewerRemoteAdministration\UpdateRemoteAdministrationConfigurationsTeamViewerPreviewRequest;
use spkm\Jamf\Pro\Requests\TimeZonesPreview\GetTimeZonesV1Request;
use spkm\Jamf\Pro\Requests\TomcatSettingsPreview\IssueSettingsTomcatSslCertificateRequest;
use spkm\Jamf\Pro\Requests\User\ChangeUserPasswordV1Request;
use spkm\Jamf\Pro\Requests\Users\CreateUsersV1Request;
use spkm\Jamf\Pro\Requests\Users\DeleteUserV1Request;
use spkm\Jamf\Pro\Requests\Users\GetUsersV1Request;
use spkm\Jamf\Pro\Requests\Users\GetUserV1Request;
use spkm\Jamf\Pro\Requests\Users\ReplaceUserV1Request;
use spkm\Jamf\Pro\Requests\UserSessionPreview\CreateUserUpdateSessionRequest;
use spkm\Jamf\Pro\Requests\UserSessionPreview\GetUserRequest;
use spkm\Jamf\Pro\Requests\UserSessions\GetUserSessionsActiveV1Request;
use spkm\Jamf\Pro\Requests\UserSessions\GetUserSessionsCountV1Request;
use spkm\Jamf\Pro\Requests\VenafiPreview\CreatePkiVenafiHistoryV1Request;
use spkm\Jamf\Pro\Requests\VenafiPreview\CreatePkiVenafiProxyTrustStoreV1Request;
use spkm\Jamf\Pro\Requests\VenafiPreview\CreatePkiVenafiV1Request;
use spkm\Jamf\Pro\Requests\VenafiPreview\DeletePkiVenafiProxyTrustStoreV1Request;
use spkm\Jamf\Pro\Requests\VenafiPreview\DeletePkiVenafiV1Request;
use spkm\Jamf\Pro\Requests\VenafiPreview\GetPkiVenafiConnectionStatusV1Request;
use spkm\Jamf\Pro\Requests\VenafiPreview\GetPkiVenafiDependentProfilesV1Request;
use spkm\Jamf\Pro\Requests\VenafiPreview\GetPkiVenafiHistoryV1Request;
use spkm\Jamf\Pro\Requests\VenafiPreview\GetPkiVenafiJamfPublicKeyV1Request;
use spkm\Jamf\Pro\Requests\VenafiPreview\GetPkiVenafiProxyTrustStoreV1Request;
use spkm\Jamf\Pro\Requests\VenafiPreview\GetPkiVenafiV1Request;
use spkm\Jamf\Pro\Requests\VenafiPreview\RegeneratePkiVenafiJamfPublicKeyV1Request;
use spkm\Jamf\Pro\Requests\VenafiPreview\UpdatePkiVenafiV1Request;
use spkm\Jamf\Pro\Requests\VolumePurchasingLocations\CreateVolumePurchasingLocationHistoryV1Request;
use spkm\Jamf\Pro\Requests\VolumePurchasingLocations\CreateVolumePurchasingLocationsV1Request;
use spkm\Jamf\Pro\Requests\VolumePurchasingLocations\DeleteVolumePurchasingLocationV1Request;
use spkm\Jamf\Pro\Requests\VolumePurchasingLocations\GetVolumePurchasingLocationContentV1Request;
use spkm\Jamf\Pro\Requests\VolumePurchasingLocations\GetVolumePurchasingLocationHistoryV1Request;
use spkm\Jamf\Pro\Requests\VolumePurchasingLocations\GetVolumePurchasingLocationsV1Request;
use spkm\Jamf\Pro\Requests\VolumePurchasingLocations\GetVolumePurchasingLocationV1Request;
use spkm\Jamf\Pro\Requests\VolumePurchasingLocations\ReclaimVolumePurchasingLocationV1Request;
use spkm\Jamf\Pro\Requests\VolumePurchasingLocations\RevokeVolumePurchasingLocationLicensesV1Request;
use spkm\Jamf\Pro\Requests\VolumePurchasingLocations\UpdateVolumePurchasingLocationV1Request;
use spkm\Jamf\Pro\Requests\VolumePurchasingSubscriptions\CreateVolumePurchasingSubscriptionHistoryV1Request;
use spkm\Jamf\Pro\Requests\VolumePurchasingSubscriptions\CreateVolumePurchasingSubscriptionsV1Request;
use spkm\Jamf\Pro\Requests\VolumePurchasingSubscriptions\DeleteVolumePurchasingSubscriptionV1Request;
use spkm\Jamf\Pro\Requests\VolumePurchasingSubscriptions\GetVolumePurchasingSubscriptionHistoryV1Request;
use spkm\Jamf\Pro\Requests\VolumePurchasingSubscriptions\GetVolumePurchasingSubscriptionsV1Request;
use spkm\Jamf\Pro\Requests\VolumePurchasingSubscriptions\GetVolumePurchasingSubscriptionV1Request;
use spkm\Jamf\Pro\Requests\VolumePurchasingSubscriptions\ReplaceVolumePurchasingSubscriptionV1Request;

/*
| One row per request: class, constructor arguments, method, path, shape, model, whether it has a body, and
| whether it pages. Taken from Jamf's Jamf Pro API schema.
*/

return [
    'AccountGroups\\GetAccountGroupV1Request' => [GetAccountGroupV1Request::class, [7], 'GET', '/v1/account-groups/7', 'one', AccountGroupV1::class, false, false],
    'AccountGroups\\GetAccountGroupsV1Request' => [GetAccountGroupsV1Request::class, [], 'GET', '/v1/account-groups', 'list', AccountGroupV1::class, false, true],
    'Accounts\\CreateAccountsV1Request' => [CreateAccountsV1Request::class, [['name' => 'x']], 'POST', '/v1/accounts', 'one', UserAccount::class, true, false],
    'Accounts\\DeleteAccountV1Request' => [DeleteAccountV1Request::class, [7], 'DELETE', '/v1/accounts/7', 'none', null, false, false],
    'Accounts\\GetAccountV1Request' => [GetAccountV1Request::class, [7], 'GET', '/v1/accounts/7', 'one', UserAccount::class, false, false],
    'Accounts\\GetAccountsV1Request' => [GetAccountsV1Request::class, [], 'GET', '/v1/accounts', 'list', UserAccount::class, false, true],
    'Accounts\\ReplaceAccountV1Request' => [ReplaceAccountV1Request::class, [7, ['name' => 'x']], 'PUT', '/v1/accounts/7', 'one', UserAccount::class, true, false],
    'ActivationCode\\CreateActivationCodeHistoryV1Request' => [CreateActivationCodeHistoryV1Request::class, [['name' => 'x']], 'POST', '/v1/activation-code/history', 'one', ObjectHistory::class, true, false],
    'ActivationCode\\ExportActivationCodeHistoryV1Request' => [ExportActivationCodeHistoryV1Request::class, [], 'POST', '/v1/activation-code/history/export', 'text', null, true, false],
    'ActivationCode\\GetActivationCodeHistoryV1Request' => [GetActivationCodeHistoryV1Request::class, [], 'GET', '/v1/activation-code/history', 'list', ObjectHistory::class, false, true],
    'ActivationCode\\ReplaceActivationCodeV1Request' => [ReplaceActivationCodeV1Request::class, [], 'PUT', '/v1/activation-code', 'none', null, true, false],
    'ActivationCode\\UpdateActivationCodeOrganizationNameV1Request' => [UpdateActivationCodeOrganizationNameV1Request::class, [], 'PATCH', '/v1/activation-code/organization-name', 'none', null, true, false],
    'AdcsSettings\\CreatePkiAdcSettingsHistoryV1Request' => [CreatePkiAdcSettingsHistoryV1Request::class, [7, ['name' => 'x']], 'POST', '/v1/pki/adcs-settings/7/history', 'one', HrefResponse::class, true, false],
    'AdcsSettings\\CreatePkiAdcsSettingsV1Request' => [CreatePkiAdcsSettingsV1Request::class, [['name' => 'x']], 'POST', '/v1/pki/adcs-settings', 'text', null, true, false],
    'AdcsSettings\\DeletePkiAdcSettingsV1Request' => [DeletePkiAdcSettingsV1Request::class, [7], 'DELETE', '/v1/pki/adcs-settings/7', 'none', null, false, false],
    'AdcsSettings\\GetPkiAdcSettingsDependenciesV1Request' => [GetPkiAdcSettingsDependenciesV1Request::class, [7], 'GET', '/v1/pki/adcs-settings/7/dependencies', 'list', AdcsDependency::class, false, false],
    'AdcsSettings\\GetPkiAdcSettingsHistoryV1Request' => [GetPkiAdcSettingsHistoryV1Request::class, [7], 'GET', '/v1/pki/adcs-settings/7/history', 'list', ObjectHistory::class, false, true],
    'AdcsSettings\\GetPkiAdcSettingsV1Request' => [GetPkiAdcSettingsV1Request::class, [7], 'GET', '/v1/pki/adcs-settings/7', 'one', AdcsSettingsResponse::class, false, false],
    'AdcsSettings\\UpdatePkiAdcSettingsV1Request' => [UpdatePkiAdcSettingsV1Request::class, [7, ['name' => 'x']], 'PATCH', '/v1/pki/adcs-settings/7', 'none', null, true, false],
    'AdcsSettings\\ValidatePkiAdcsSettingsCertificateV1Request' => [ValidatePkiAdcsSettingsCertificateV1Request::class, [], 'POST', '/v1/pki/adcs-settings/validate-certificate', 'none', null, true, false],
    'AdcsSettings\\ValidatePkiAdcsSettingsClientCertificateV1Request' => [ValidatePkiAdcsSettingsClientCertificateV1Request::class, [], 'POST', '/v1/pki/adcs-settings/validate-client-certificate', 'none', null, true, false],
    'AdvancedMobileDeviceSearches\\CreateAdvancedMobileDeviceSearchesV1Request' => [CreateAdvancedMobileDeviceSearchesV1Request::class, [['name' => 'x']], 'POST', '/v1/advanced-mobile-device-searches', 'one', HrefResponse::class, true, false],
    'AdvancedMobileDeviceSearches\\DeleteAdvancedMobileDeviceSearchV1Request' => [DeleteAdvancedMobileDeviceSearchV1Request::class, [7], 'DELETE', '/v1/advanced-mobile-device-searches/7', 'none', null, false, false],
    'AdvancedMobileDeviceSearches\\DeleteMultipleAdvancedMobileDeviceSearchesV1Request' => [DeleteMultipleAdvancedMobileDeviceSearchesV1Request::class, [['name' => 'x']], 'POST', '/v1/advanced-mobile-device-searches/delete-multiple', 'none', null, true, false],
    'AdvancedMobileDeviceSearches\\GetAdvancedMobileDeviceSearchV1Request' => [GetAdvancedMobileDeviceSearchV1Request::class, [7], 'GET', '/v1/advanced-mobile-device-searches/7', 'one', AdvancedSearch::class, false, false],
    'AdvancedMobileDeviceSearches\\GetAdvancedMobileDeviceSearchesChoicesV1Request' => [GetAdvancedMobileDeviceSearchesChoicesV1Request::class, [], 'GET', '/v1/advanced-mobile-device-searches/choices', 'one', AdvancedSearchCriteriaChoices::class, false, false],
    'AdvancedMobileDeviceSearches\\GetAdvancedMobileDeviceSearchesV1Request' => [GetAdvancedMobileDeviceSearchesV1Request::class, [], 'GET', '/v1/advanced-mobile-device-searches', 'list', AdvancedSearch::class, false, false],
    'AdvancedMobileDeviceSearches\\ReplaceAdvancedMobileDeviceSearchV1Request' => [ReplaceAdvancedMobileDeviceSearchV1Request::class, [7, ['name' => 'x']], 'PUT', '/v1/advanced-mobile-device-searches/7', 'one', AdvancedSearch::class, true, false],
    'AdvancedUserContentSearches\\CreateAdvancedUserContentSearchesV1Request' => [CreateAdvancedUserContentSearchesV1Request::class, [['name' => 'x']], 'POST', '/v1/advanced-user-content-searches', 'one', HrefResponse::class, true, false],
    'AdvancedUserContentSearches\\DeleteAdvancedUserContentSearchV1Request' => [DeleteAdvancedUserContentSearchV1Request::class, [7], 'DELETE', '/v1/advanced-user-content-searches/7', 'none', null, false, false],
    'AdvancedUserContentSearches\\GetAdvancedUserContentSearchV1Request' => [GetAdvancedUserContentSearchV1Request::class, [7], 'GET', '/v1/advanced-user-content-searches/7', 'one', AdvancedUserContentSearch::class, false, false],
    'AdvancedUserContentSearches\\GetAdvancedUserContentSearchesV1Request' => [GetAdvancedUserContentSearchesV1Request::class, [], 'GET', '/v1/advanced-user-content-searches', 'list', AdvancedUserContentSearch::class, false, false],
    'AdvancedUserContentSearches\\ReplaceAdvancedUserContentSearchV1Request' => [ReplaceAdvancedUserContentSearchV1Request::class, [7, ['name' => 'x']], 'PUT', '/v1/advanced-user-content-searches/7', 'one', AdvancedUserContentSearch::class, true, false],
    'ApiAuthentication\\CreateAuthCurrentRequest' => [CreateAuthCurrentRequest::class, [], 'POST', '/auth/current', 'one', CurrentAuthorization::class, false, false],
    'ApiAuthentication\\CreateAuthTokenV1Request' => [CreateAuthTokenV1Request::class, ['client', 'secret'], 'POST', '/v1/auth/token', 'one', AuthTokenV1::class, false, false],
    'ApiAuthentication\\CreateOauthTokenV1Request' => [CreateOauthTokenV1Request::class, ['client', 'secret'], 'POST', '/v1/oauth/token', 'one', OAuthTokenResponse::class, true, false],
    'ApiAuthentication\\GetAuthRequest' => [GetAuthRequest::class, [], 'GET', '/auth', 'one', Authorization::class, false, false],
    'ApiAuthentication\\GetAuthV1Request' => [GetAuthV1Request::class, [], 'GET', '/v1/auth', 'one', AuthorizationV1::class, false, false],
    'ApiAuthentication\\InvalidateAuthTokenRequest' => [InvalidateAuthTokenRequest::class, [], 'POST', '/auth/invalidateToken', 'none', null, false, false],
    'ApiAuthentication\\InvalidateAuthTokenV1Request' => [InvalidateAuthTokenV1Request::class, [], 'POST', '/v1/auth/invalidate-token', 'none', null, false, false],
    'ApiAuthentication\\KeepAuthTokenAliveRequest' => [KeepAuthTokenAliveRequest::class, [], 'POST', '/auth/keepAlive', 'one', AuthToken::class, false, false],
    'ApiAuthentication\\KeepAuthTokenAliveV1Request' => [KeepAuthTokenAliveV1Request::class, [], 'POST', '/v1/auth/keep-alive', 'one', AuthTokenV1::class, false, false],
    'ApiIntegrations\\CreateApiIntegrationClientCredentialsV1Request' => [CreateApiIntegrationClientCredentialsV1Request::class, [7], 'POST', '/v1/api-integrations/7/client-credentials', 'one', OAuthClientCredentials::class, false, false],
    'ApiIntegrations\\CreateApiIntegrationsV1Request' => [CreateApiIntegrationsV1Request::class, [['name' => 'x']], 'POST', '/v1/api-integrations', 'one', ApiIntegrationResponse::class, true, false],
    'ApiIntegrations\\DeleteApiIntegrationV1Request' => [DeleteApiIntegrationV1Request::class, [7], 'DELETE', '/v1/api-integrations/7', 'none', null, false, false],
    'ApiIntegrations\\GetApiIntegrationV1Request' => [GetApiIntegrationV1Request::class, [7], 'GET', '/v1/api-integrations/7', 'one', ApiIntegrationResponse::class, false, false],
    'ApiIntegrations\\GetApiIntegrationsV1Request' => [GetApiIntegrationsV1Request::class, [], 'GET', '/v1/api-integrations', 'list', ApiIntegrationResponse::class, false, true],
    'ApiIntegrations\\ReplaceApiIntegrationV1Request' => [ReplaceApiIntegrationV1Request::class, [7, ['name' => 'x']], 'PUT', '/v1/api-integrations/7', 'one', ApiIntegrationResponse::class, true, false],
    'ApiRolePrivileges\\GetApiRolePrivilegesSearchV1Request' => [GetApiRolePrivilegesSearchV1Request::class, [], 'GET', '/v1/api-role-privileges/search', 'one', ApiRolePrivileges::class, false, false],
    'ApiRolePrivileges\\GetApiRolePrivilegesV1Request' => [GetApiRolePrivilegesV1Request::class, [], 'GET', '/v1/api-role-privileges', 'one', ApiRolePrivileges::class, false, false],
    'ApiRoles\\CreateApiRolesV1Request' => [CreateApiRolesV1Request::class, [['name' => 'x']], 'POST', '/v1/api-roles', 'one', ApiRole::class, true, false],
    'ApiRoles\\DeleteApiRoleV1Request' => [DeleteApiRoleV1Request::class, [7], 'DELETE', '/v1/api-roles/7', 'none', null, false, false],
    'ApiRoles\\GetApiRoleV1Request' => [GetApiRoleV1Request::class, [7], 'GET', '/v1/api-roles/7', 'one', ApiRole::class, false, false],
    'ApiRoles\\GetApiRolesV1Request' => [GetApiRolesV1Request::class, [], 'GET', '/v1/api-roles', 'list', ApiRole::class, false, true],
    'ApiRoles\\ReplaceApiRoleV1Request' => [ReplaceApiRoleV1Request::class, [7, ['name' => 'x']], 'PUT', '/v1/api-roles/7', 'one', ApiRole::class, true, false],
    'ApnsClientPushStatus\\EnableApnsClientPushStatusAllClientsV1Request' => [EnableApnsClientPushStatusAllClientsV1Request::class, [], 'POST', '/v1/apns-client-push-status/enable-all-clients', 'none', null, false, false],
    'ApnsClientPushStatus\\EnableApnsClientPushStatusClientV1Request' => [EnableApnsClientPushStatusClientV1Request::class, [['name' => 'x']], 'POST', '/v1/apns-client-push-status/enable-client', 'none', null, true, false],
    'ApnsClientPushStatus\\GetApnsClientPushStatusEnableAllClientsStatusV1Request' => [GetApnsClientPushStatusEnableAllClientsStatusV1Request::class, [], 'GET', '/v1/apns-client-push-status/enable-all-clients/status', 'one', ApnsPushEnableRequest::class, false, false],
    'ApnsClientPushStatus\\GetApnsClientPushStatusV1Request' => [GetApnsClientPushStatusV1Request::class, [], 'GET', '/v1/apns-client-push-status', 'list', ApnsClientPushStatus::class, false, true],
    'AppRequestPreview\\CreateAppRequestFormInputFieldsV1Request' => [CreateAppRequestFormInputFieldsV1Request::class, [['name' => 'x']], 'POST', '/v1/app-request/form-input-fields', 'one', AppRequestFormInputField::class, true, false],
    'AppRequestPreview\\DeleteAppRequestFormInputFieldV1Request' => [DeleteAppRequestFormInputFieldV1Request::class, [7], 'DELETE', '/v1/app-request/form-input-fields/7', 'none', null, false, false],
    'AppRequestPreview\\GetAppRequestFormInputFieldV1Request' => [GetAppRequestFormInputFieldV1Request::class, [7], 'GET', '/v1/app-request/form-input-fields/7', 'one', AppRequestFormInputField::class, false, false],
    'AppRequestPreview\\GetAppRequestFormInputFieldsV1Request' => [GetAppRequestFormInputFieldsV1Request::class, [], 'GET', '/v1/app-request/form-input-fields', 'list', AppRequestFormInputField::class, false, false],
    'AppRequestPreview\\GetAppRequestSettingsV1Request' => [GetAppRequestSettingsV1Request::class, [], 'GET', '/v1/app-request/settings', 'one', AppRequestSettings::class, false, false],
    'AppRequestPreview\\ReplaceAppRequestFormInputFieldV1Request' => [ReplaceAppRequestFormInputFieldV1Request::class, [7, ['name' => 'x']], 'PUT', '/v1/app-request/form-input-fields/7', 'one', AppRequestFormInputField::class, true, false],
    'AppRequestPreview\\ReplaceAppRequestFormInputFieldsV1Request' => [ReplaceAppRequestFormInputFieldsV1Request::class, [['name' => 'x']], 'PUT', '/v1/app-request/form-input-fields', 'list', AppRequestFormInputField::class, true, false],
    'AppRequestPreview\\ReplaceAppRequestSettingsV1Request' => [ReplaceAppRequestSettingsV1Request::class, [['name' => 'x']], 'PUT', '/v1/app-request/settings', 'one', AppRequestSettings::class, true, false],
    'AppStoreCountryCodesPreview\\GetAppStoreCountryCodesV1Request' => [GetAppStoreCountryCodesV1Request::class, [], 'GET', '/v1/app-store-country-codes', 'one', CountryCodes::class, false, false],
    'Branding\\GetBrandingImagesDownloadV1Request' => [GetBrandingImagesDownloadV1Request::class, [7], 'GET', '/v1/branding-images/download/7', 'text', null, false, false],
    'Buildings\\CreateBuildingHistoryV1Request' => [CreateBuildingHistoryV1Request::class, [7, ['name' => 'x']], 'POST', '/v1/buildings/7/history', 'one', ObjectHistory::class, true, false],
    'Buildings\\CreateBuildingsV1Request' => [CreateBuildingsV1Request::class, [['name' => 'x']], 'POST', '/v1/buildings', 'one', HrefResponse::class, true, false],
    'Buildings\\DeleteBuildingV1Request' => [DeleteBuildingV1Request::class, [7], 'DELETE', '/v1/buildings/7', 'none', null, false, false],
    'Buildings\\DeleteMultipleBuildingsV1Request' => [DeleteMultipleBuildingsV1Request::class, [['name' => 'x']], 'POST', '/v1/buildings/delete-multiple', 'none', null, true, false],
    'Buildings\\ExportBuildingHistoryV1Request' => [ExportBuildingHistoryV1Request::class, [7], 'POST', '/v1/buildings/7/history/export', 'text', null, true, false],
    'Buildings\\ExportBuildingsV1Request' => [ExportBuildingsV1Request::class, [], 'POST', '/v1/buildings/export', 'text', null, true, false],
    'Buildings\\GetBuildingHistoryV1Request' => [GetBuildingHistoryV1Request::class, [7], 'GET', '/v1/buildings/7/history', 'list', ObjectHistory::class, false, true],
    'Buildings\\GetBuildingV1Request' => [GetBuildingV1Request::class, [7], 'GET', '/v1/buildings/7', 'one', Building::class, false, false],
    'Buildings\\GetBuildingsV1Request' => [GetBuildingsV1Request::class, [], 'GET', '/v1/buildings', 'list', Building::class, false, true],
    'Buildings\\ReplaceBuildingV1Request' => [ReplaceBuildingV1Request::class, [7, ['name' => 'x']], 'PUT', '/v1/buildings/7', 'one', Building::class, true, false],
    'CacheSettings\\GetCacheSettingsV1Request' => [GetCacheSettingsV1Request::class, [], 'GET', '/v1/cache-settings', 'one', CacheSettings::class, false, false],
    'CacheSettings\\ReplaceCacheSettingsV1Request' => [ReplaceCacheSettingsV1Request::class, [['name' => 'x']], 'PUT', '/v1/cache-settings', 'one', CacheSettings::class, true, false],
    'Categories\\CreateCategoriesV1Request' => [CreateCategoriesV1Request::class, [['name' => 'x']], 'POST', '/v1/categories', 'one', HrefResponse::class, true, false],
    'Categories\\CreateCategoryHistoryV1Request' => [CreateCategoryHistoryV1Request::class, [7, ['name' => 'x']], 'POST', '/v1/categories/7/history', 'one', ObjectHistory::class, true, false],
    'Categories\\DeleteCategoryV1Request' => [DeleteCategoryV1Request::class, [7], 'DELETE', '/v1/categories/7', 'none', null, false, false],
    'Categories\\DeleteMultipleCategoriesV1Request' => [DeleteMultipleCategoriesV1Request::class, [['name' => 'x']], 'POST', '/v1/categories/delete-multiple', 'none', null, true, false],
    'Categories\\GetCategoriesV1Request' => [GetCategoriesV1Request::class, [], 'GET', '/v1/categories', 'list', Category::class, false, true],
    'Categories\\GetCategoryHistoryV1Request' => [GetCategoryHistoryV1Request::class, [7], 'GET', '/v1/categories/7/history', 'list', ObjectHistory::class, false, true],
    'Categories\\GetCategoryV1Request' => [GetCategoryV1Request::class, [7], 'GET', '/v1/categories/7', 'one', Category::class, false, false],
    'Categories\\ReplaceCategoryV1Request' => [ReplaceCategoryV1Request::class, [7, ['name' => 'x']], 'PUT', '/v1/categories/7', 'one', Category::class, true, false],
    'CertificateAuthority\\GetPkiCertificateAuthorityActiveDerV1Request' => [GetPkiCertificateAuthorityActiveDerV1Request::class, [], 'GET', '/v1/pki/certificate-authority/active/der', 'text', null, false, false],
    'CertificateAuthority\\GetPkiCertificateAuthorityActivePemV1Request' => [GetPkiCertificateAuthorityActivePemV1Request::class, [], 'GET', '/v1/pki/certificate-authority/active/pem', 'text', null, false, false],
    'CertificateAuthority\\GetPkiCertificateAuthorityActiveV1Request' => [GetPkiCertificateAuthorityActiveV1Request::class, [], 'GET', '/v1/pki/certificate-authority/active', 'one', CertificateRecord::class, false, false],
    'CertificateAuthority\\GetPkiCertificateAuthorityDerV1Request' => [GetPkiCertificateAuthorityDerV1Request::class, [7], 'GET', '/v1/pki/certificate-authority/7/der', 'text', null, false, false],
    'CertificateAuthority\\GetPkiCertificateAuthorityPemV1Request' => [GetPkiCertificateAuthorityPemV1Request::class, [7], 'GET', '/v1/pki/certificate-authority/7/pem', 'text', null, false, false],
    'CertificateAuthority\\GetPkiCertificateAuthorityV1Request' => [GetPkiCertificateAuthorityV1Request::class, [7], 'GET', '/v1/pki/certificate-authority/7', 'one', CertificateRecord::class, false, false],
    'ClassicLdap\\GetClassicLdapV1Request' => [GetClassicLdapV1Request::class, [7], 'GET', '/v1/classic-ldap/7', 'one', ClassicLdapMappings::class, false, false],
    'ClientCheckIn\\CreateCheckInHistoryV3Request' => [CreateCheckInHistoryV3Request::class, [['name' => 'x']], 'POST', '/v3/check-in/history', 'one', HrefResponse::class, true, false],
    'ClientCheckIn\\GetCheckInHistoryV3Request' => [GetCheckInHistoryV3Request::class, [], 'GET', '/v3/check-in/history', 'list', ObjectHistoryV1::class, false, true],
    'ClientCheckIn\\GetCheckInV3Request' => [GetCheckInV3Request::class, [], 'GET', '/v3/check-in', 'one', ClientCheckInV3::class, false, false],
    'ClientCheckIn\\ReplaceCheckInV3Request' => [ReplaceCheckInV3Request::class, [['name' => 'x']], 'PUT', '/v3/check-in', 'one', ClientCheckInV3::class, true, false],
    'CloudAzure\\CreateCloudAzureV1Request' => [CreateCloudAzureV1Request::class, [['name' => 'x']], 'POST', '/v1/cloud-azure', 'one', HrefResponse::class, true, false],
    'CloudAzure\\DeleteCloudAzureV1Request' => [DeleteCloudAzureV1Request::class, [7], 'DELETE', '/v1/cloud-azure/7', 'none', null, false, false],
    'CloudAzure\\GetCloudAzureDefaultsMappingsV1Request' => [GetCloudAzureDefaultsMappingsV1Request::class, [], 'GET', '/v1/cloud-azure/defaults/mappings', 'one', AzureMappings::class, false, false],
    'CloudAzure\\GetCloudAzureDefaultsServerConfigurationV1Request' => [GetCloudAzureDefaultsServerConfigurationV1Request::class, [], 'GET', '/v1/cloud-azure/defaults/server-configuration', 'one', AzureServerConfiguration::class, false, false],
    'CloudAzure\\GetCloudAzureV1Request' => [GetCloudAzureV1Request::class, [7], 'GET', '/v1/cloud-azure/7', 'one', AzureConfiguration::class, false, false],
    'CloudAzure\\ReplaceCloudAzureV1Request' => [ReplaceCloudAzureV1Request::class, [7, ['name' => 'x']], 'PUT', '/v1/cloud-azure/7', 'one', AzureConfiguration::class, true, false],
    'CloudDistributionPoint\\CreateCloudDistributionPointFailUploadV1Request' => [CreateCloudDistributionPointFailUploadV1Request::class, [7], 'POST', '/v1/cloud-distribution-point/fail-upload/7', 'none', null, false, false],
    'CloudDistributionPoint\\CreateCloudDistributionPointHistoryV1Request' => [CreateCloudDistributionPointHistoryV1Request::class, [['name' => 'x']], 'POST', '/v1/cloud-distribution-point/history', 'one', ObjectHistory::class, true, false],
    'CloudDistributionPoint\\CreateCloudDistributionPointV1Request' => [CreateCloudDistributionPointV1Request::class, [['name' => 'x']], 'POST', '/v1/cloud-distribution-point', 'one', CloudDistributionPoint::class, true, false],
    'CloudDistributionPoint\\DeleteCloudDistributionPointV1Request' => [DeleteCloudDistributionPointV1Request::class, [], 'DELETE', '/v1/cloud-distribution-point', 'none', null, false, false],
    'CloudDistributionPoint\\GetCloudDistributionPointFilesV1Request' => [GetCloudDistributionPointFilesV1Request::class, [], 'GET', '/v1/cloud-distribution-point/files', 'list', CloudDistributionPointInventoryFileInfo::class, false, true],
    'CloudDistributionPoint\\GetCloudDistributionPointHistoryV1Request' => [GetCloudDistributionPointHistoryV1Request::class, [], 'GET', '/v1/cloud-distribution-point/history', 'list', ObjectHistory::class, false, true],
    'CloudDistributionPoint\\GetCloudDistributionPointTestConnectionV1Request' => [GetCloudDistributionPointTestConnectionV1Request::class, [], 'GET', '/v1/cloud-distribution-point/test-connection', 'one', CloudDistributionPointTestConnection::class, false, false],
    'CloudDistributionPoint\\GetCloudDistributionPointUploadCapabilityV1Request' => [GetCloudDistributionPointUploadCapabilityV1Request::class, [], 'GET', '/v1/cloud-distribution-point/upload-capability', 'one', CloudDistributionPointUploadCapability::class, false, false],
    'CloudDistributionPoint\\GetCloudDistributionPointV1Request' => [GetCloudDistributionPointV1Request::class, [], 'GET', '/v1/cloud-distribution-point', 'one', CloudDistributionPoint::class, false, false],
    'CloudDistributionPoint\\RefreshCloudDistributionPointInventoryV1Request' => [RefreshCloudDistributionPointInventoryV1Request::class, [], 'POST', '/v1/cloud-distribution-point/refresh-inventory', 'none', null, false, false],
    'CloudDistributionPoint\\UpdateCloudDistributionPointV1Request' => [UpdateCloudDistributionPointV1Request::class, [['name' => 'x']], 'PATCH', '/v1/cloud-distribution-point', 'one', CloudDistributionPoint::class, true, false],
    'CloudIdp\\CreateCloudIdpHistoryV1Request' => [CreateCloudIdpHistoryV1Request::class, [7, ['name' => 'x']], 'POST', '/v1/cloud-idp/7/history', 'one', ObjectHistory::class, true, false],
    'CloudIdp\\ExportCloudIdpV1Request' => [ExportCloudIdpV1Request::class, [], 'POST', '/v1/cloud-idp/export', 'text', null, true, false],
    'CloudIdp\\GetCloudIdpByIdV1Request' => [GetCloudIdpByIdV1Request::class, [7], 'GET', '/v1/cloud-idp/7', 'one', CloudIdPCommon::class, false, false],
    'CloudIdp\\GetCloudIdpHistoryV1Request' => [GetCloudIdpHistoryV1Request::class, [7], 'GET', '/v1/cloud-idp/7/history', 'list', ObjectHistory::class, false, true],
    'CloudIdp\\GetCloudIdpV1Request' => [GetCloudIdpV1Request::class, [], 'GET', '/v1/cloud-idp', 'list', CloudIdPCommonResponse::class, false, true],
    'CloudIdp\\TestCloudIdpGroupV1Request' => [TestCloudIdpGroupV1Request::class, [7, ['name' => 'x']], 'POST', '/v1/cloud-idp/7/test-group', 'list', GroupTestSearch::class, true, false],
    'CloudIdp\\TestCloudIdpUserMembershipV1Request' => [TestCloudIdpUserMembershipV1Request::class, [7, ['name' => 'x']], 'POST', '/v1/cloud-idp/7/test-user-membership', 'one', MembershipTestSearchResponse::class, true, false],
    'CloudIdp\\TestCloudIdpUserV1Request' => [TestCloudIdpUserV1Request::class, [7, ['name' => 'x']], 'POST', '/v1/cloud-idp/7/test-user', 'list', UserTestSearch::class, true, false],
    'CloudInformation\\GetCloudInformationV1Request' => [GetCloudInformationV1Request::class, [], 'GET', '/v1/cloud-information', 'one', CloudResponse::class, false, false],
    'CloudLdap\\CreateCloudLdapsV2Request' => [CreateCloudLdapsV2Request::class, [['name' => 'x']], 'POST', '/v2/cloud-ldaps', 'one', HrefResponse::class, true, false],
    'CloudLdap\\DeleteCloudLdapV2Request' => [DeleteCloudLdapV2Request::class, [7], 'DELETE', '/v2/cloud-ldaps/7', 'none', null, false, false],
    'CloudLdap\\GetCloudLdapConnectionBindV2Request' => [GetCloudLdapConnectionBindV2Request::class, [7], 'GET', '/v2/cloud-ldaps/7/connection/bind', 'one', CloudLdapConnectionPoolStatistics::class, false, false],
    'CloudLdap\\GetCloudLdapConnectionSearchV2Request' => [GetCloudLdapConnectionSearchV2Request::class, [7], 'GET', '/v2/cloud-ldaps/7/connection/search', 'one', CloudLdapConnectionPoolStatistics::class, false, false],
    'CloudLdap\\GetCloudLdapConnectionStatusV2Request' => [GetCloudLdapConnectionStatusV2Request::class, [7], 'GET', '/v2/cloud-ldaps/7/connection/status', 'one', CloudLdapConnectionStatus::class, false, false],
    'CloudLdap\\GetCloudLdapMappingsV2Request' => [GetCloudLdapMappingsV2Request::class, [7], 'GET', '/v2/cloud-ldaps/7/mappings', 'one', CloudLdapMappingsResponse::class, false, false],
    'CloudLdap\\GetCloudLdapV2Request' => [GetCloudLdapV2Request::class, [7], 'GET', '/v2/cloud-ldaps/7', 'one', LdapConfigurationResponse::class, false, false],
    'CloudLdap\\GetCloudLdapsDefaultMappingsV2Request' => [GetCloudLdapsDefaultMappingsV2Request::class, ['abc'], 'GET', '/v2/cloud-ldaps/defaults/abc/mappings', 'one', CloudLdapMappingsResponse::class, false, false],
    'CloudLdap\\GetCloudLdapsDefaultServerConfigurationV2Request' => [GetCloudLdapsDefaultServerConfigurationV2Request::class, ['abc'], 'GET', '/v2/cloud-ldaps/defaults/abc/server-configuration', 'one', CloudLdapServerResponse::class, false, false],
    'CloudLdap\\ReplaceCloudLdapMappingsV2Request' => [ReplaceCloudLdapMappingsV2Request::class, [7, ['name' => 'x']], 'PUT', '/v2/cloud-ldaps/7/mappings', 'one', CloudLdapMappingsResponse::class, true, false],
    'CloudLdap\\ReplaceCloudLdapV2Request' => [ReplaceCloudLdapV2Request::class, [7, ['name' => 'x']], 'PUT', '/v2/cloud-ldaps/7', 'one', LdapConfigurationResponse::class, true, false],
    'CloudLdap\\VerifyLdapKeystoreV1Request' => [VerifyLdapKeystoreV1Request::class, [['name' => 'x']], 'POST', '/v1/ldap-keystore/verify', 'one', CloudLdapKeystore::class, true, false],
    'ComputerExtensionAttributes\\CreateComputerExtensionAttributeHistoryV1Request' => [CreateComputerExtensionAttributeHistoryV1Request::class, [7, ['name' => 'x']], 'POST', '/v1/computer-extension-attributes/7/history', 'one', ObjectHistory::class, true, false],
    'ComputerExtensionAttributes\\CreateComputerExtensionAttributesV1Request' => [CreateComputerExtensionAttributesV1Request::class, [['name' => 'x']], 'POST', '/v1/computer-extension-attributes', 'one', HrefResponse::class, true, false],
    'ComputerExtensionAttributes\\DeleteComputerExtensionAttributeV1Request' => [DeleteComputerExtensionAttributeV1Request::class, [7], 'DELETE', '/v1/computer-extension-attributes/7', 'none', null, false, false],
    'ComputerExtensionAttributes\\DeleteMultipleComputerExtensionAttributesV1Request' => [DeleteMultipleComputerExtensionAttributesV1Request::class, [['name' => 'x']], 'POST', '/v1/computer-extension-attributes/delete-multiple', 'none', null, true, false],
    'ComputerExtensionAttributes\\GetComputerExtensionAttributeDataDependencyV1Request' => [GetComputerExtensionAttributeDataDependencyV1Request::class, [7], 'GET', '/v1/computer-extension-attributes/7/data-dependency', 'list', null, false, false],
    'ComputerExtensionAttributes\\GetComputerExtensionAttributeDownloadV1Request' => [GetComputerExtensionAttributeDownloadV1Request::class, [7], 'GET', '/v1/computer-extension-attributes/7/download', 'text', null, false, false],
    'ComputerExtensionAttributes\\GetComputerExtensionAttributeHistoryV1Request' => [GetComputerExtensionAttributeHistoryV1Request::class, [7], 'GET', '/v1/computer-extension-attributes/7/history', 'list', ObjectHistory::class, false, true],
    'ComputerExtensionAttributes\\GetComputerExtensionAttributeV1Request' => [GetComputerExtensionAttributeV1Request::class, [7], 'GET', '/v1/computer-extension-attributes/7', 'one', ComputerExtensionAttributes::class, false, false],
    'ComputerExtensionAttributes\\GetComputerExtensionAttributesTemplateV1Request' => [GetComputerExtensionAttributesTemplateV1Request::class, [7], 'GET', '/v1/computer-extension-attributes/templates/7', 'one', ComputerExtensionAttributes::class, false, false],
    'ComputerExtensionAttributes\\GetComputerExtensionAttributesTemplatesV1Request' => [GetComputerExtensionAttributesTemplatesV1Request::class, [], 'GET', '/v1/computer-extension-attributes/templates', 'list', ComputerExtensionAttributeTemplates::class, false, true],
    'ComputerExtensionAttributes\\GetComputerExtensionAttributesV1Request' => [GetComputerExtensionAttributesV1Request::class, [], 'GET', '/v1/computer-extension-attributes', 'list', ComputerExtensionAttributes::class, false, true],
    'ComputerExtensionAttributes\\ReplaceComputerExtensionAttributeV1Request' => [ReplaceComputerExtensionAttributeV1Request::class, [7, ['name' => 'x']], 'PUT', '/v1/computer-extension-attributes/7', 'one', ComputerExtensionAttributes::class, true, false],
    'ComputerExtensionAttributes\\UploadComputerExtensionAttributesV1Request' => [UploadComputerExtensionAttributesV1Request::class, ['contents'], 'POST', '/v1/computer-extension-attributes/upload', 'one', ComputerExtensionAttributes::class, true, false],
    'ComputerGroups\\CreateComputerGroupsSmartGroupsV2Request' => [CreateComputerGroupsSmartGroupsV2Request::class, [['name' => 'x']], 'POST', '/v2/computer-groups/smart-groups', 'one', HrefResponse::class, true, false],
    'ComputerGroups\\CreateComputerGroupsSmartGroupsV3Request' => [CreateComputerGroupsSmartGroupsV3Request::class, [['name' => 'x']], 'POST', '/v3/computer-groups/smart-groups', 'one', HrefResponse::class, true, false],
    'ComputerGroups\\CreateComputerGroupsStaticGroupsV2Request' => [CreateComputerGroupsStaticGroupsV2Request::class, [['name' => 'x']], 'POST', '/v2/computer-groups/static-groups', 'one', HrefResponse::class, true, false],
    'ComputerGroups\\CreateComputerGroupsStaticGroupsV3Request' => [CreateComputerGroupsStaticGroupsV3Request::class, [['name' => 'x']], 'POST', '/v3/computer-groups/static-groups', 'one', HrefResponse::class, true, false],
    'ComputerGroups\\DeleteComputerGroupsSmartGroupV2Request' => [DeleteComputerGroupsSmartGroupV2Request::class, [7], 'DELETE', '/v2/computer-groups/smart-groups/7', 'none', null, false, false],
    'ComputerGroups\\DeleteComputerGroupsSmartGroupV3Request' => [DeleteComputerGroupsSmartGroupV3Request::class, [7], 'DELETE', '/v3/computer-groups/smart-groups/7', 'none', null, false, false],
    'ComputerGroups\\DeleteComputerGroupsStaticGroupV2Request' => [DeleteComputerGroupsStaticGroupV2Request::class, [7], 'DELETE', '/v2/computer-groups/static-groups/7', 'none', null, false, false],
    'ComputerGroups\\DeleteComputerGroupsStaticGroupV3Request' => [DeleteComputerGroupsStaticGroupV3Request::class, [7], 'DELETE', '/v3/computer-groups/static-groups/7', 'none', null, false, false],
    'ComputerGroups\\GetComputerGroupsSmartGroupMembershipV2Request' => [GetComputerGroupsSmartGroupMembershipV2Request::class, [7], 'GET', '/v2/computer-groups/smart-group-membership/7', 'one', SmartGroupMembership::class, false, false],
    'ComputerGroups\\GetComputerGroupsSmartGroupMembershipV3Request' => [GetComputerGroupsSmartGroupMembershipV3Request::class, [7], 'GET', '/v3/computer-groups/smart-group-membership/7', 'one', SmartGroupMembership::class, false, false],
    'ComputerGroups\\GetComputerGroupsSmartGroupV2Request' => [GetComputerGroupsSmartGroupV2Request::class, [7], 'GET', '/v2/computer-groups/smart-groups/7', 'one', SmartComputerGroupV2::class, false, false],
    'ComputerGroups\\GetComputerGroupsSmartGroupV3Request' => [GetComputerGroupsSmartGroupV3Request::class, [7], 'GET', '/v3/computer-groups/smart-groups/7', 'one', SmartComputerGroupV3::class, false, false],
    'ComputerGroups\\GetComputerGroupsSmartGroupsV2Request' => [GetComputerGroupsSmartGroupsV2Request::class, [], 'GET', '/v2/computer-groups/smart-groups', 'list', SmartComputerGroupSearch::class, false, true],
    'ComputerGroups\\GetComputerGroupsSmartGroupsV3Request' => [GetComputerGroupsSmartGroupsV3Request::class, [], 'GET', '/v3/computer-groups/smart-groups', 'list', SmartComputerGroupSearch::class, false, true],
    'ComputerGroups\\GetComputerGroupsStaticGroupV2Request' => [GetComputerGroupsStaticGroupV2Request::class, [7], 'GET', '/v2/computer-groups/static-groups/7', 'one', StaticComputerGroup::class, false, false],
    'ComputerGroups\\GetComputerGroupsStaticGroupV3Request' => [GetComputerGroupsStaticGroupV3Request::class, [7], 'GET', '/v3/computer-groups/static-groups/7', 'one', StaticComputerGroup::class, false, false],
    'ComputerGroups\\GetComputerGroupsStaticGroupsV2Request' => [GetComputerGroupsStaticGroupsV2Request::class, [], 'GET', '/v2/computer-groups/static-groups', 'list', StaticComputerGroupSummary::class, false, true],
    'ComputerGroups\\GetComputerGroupsStaticGroupsV3Request' => [GetComputerGroupsStaticGroupsV3Request::class, [], 'GET', '/v3/computer-groups/static-groups', 'list', StaticComputerGroupSummary::class, false, true],
    'ComputerGroups\\GetComputerGroupsV1Request' => [GetComputerGroupsV1Request::class, [], 'GET', '/v1/computer-groups', 'list', ComputerGroup::class, false, false],
    'ComputerGroups\\ReplaceComputerGroupsSmartGroupV2Request' => [ReplaceComputerGroupsSmartGroupV2Request::class, [7, ['name' => 'x']], 'PUT', '/v2/computer-groups/smart-groups/7', 'one', SmartComputerGroupV2::class, true, false],
    'ComputerGroups\\ReplaceComputerGroupsSmartGroupV3Request' => [ReplaceComputerGroupsSmartGroupV3Request::class, [7, ['name' => 'x']], 'PUT', '/v3/computer-groups/smart-groups/7', 'one', SmartComputerGroupV3::class, true, false],
    'ComputerGroups\\ReplaceComputerGroupsStaticGroupV2Request' => [ReplaceComputerGroupsStaticGroupV2Request::class, [7, ['name' => 'x']], 'PUT', '/v2/computer-groups/static-groups/7', 'one', StaticComputerGroupAssignment::class, true, false],
    'ComputerGroups\\ReplaceComputerGroupsStaticGroupV3Request' => [ReplaceComputerGroupsStaticGroupV3Request::class, [7, ['name' => 'x']], 'PUT', '/v3/computer-groups/static-groups/7', 'one', StaticComputerGroupAssignment::class, true, false],
    'ComputerInventory\\CreateComputerInventoryAttachmentsV1Request' => [CreateComputerInventoryAttachmentsV1Request::class, [7, 'contents'], 'POST', '/v1/computers-inventory/7/attachments', 'one', HrefResponse::class, true, false],
    'ComputerInventory\\CreateComputerInventoryAttachmentsV2Request' => [CreateComputerInventoryAttachmentsV2Request::class, [7, 'contents'], 'POST', '/v2/computers-inventory/7/attachments', 'one', HrefResponse::class, true, false],
    'ComputerInventory\\CreateComputerInventoryAttachmentsV3Request' => [CreateComputerInventoryAttachmentsV3Request::class, [7, 'contents'], 'POST', '/v3/computers-inventory/7/attachments', 'one', HrefResponse::class, true, false],
    'ComputerInventory\\CreateComputerInventoryAttachmentsV4Request' => [CreateComputerInventoryAttachmentsV4Request::class, [7, 'contents'], 'POST', '/v4/computers-inventory/7/attachments', 'one', HrefResponse::class, true, false],
    'ComputerInventory\\CreateComputersInventoryV1Request' => [CreateComputersInventoryV1Request::class, [['name' => 'x']], 'POST', '/v1/computers-inventory', 'one', HrefResponse::class, true, false],
    'ComputerInventory\\CreateComputersInventoryV2Request' => [CreateComputersInventoryV2Request::class, [['name' => 'x']], 'POST', '/v2/computers-inventory', 'one', HrefResponse::class, true, false],
    'ComputerInventory\\CreateComputersInventoryV3Request' => [CreateComputersInventoryV3Request::class, [['name' => 'x']], 'POST', '/v3/computers-inventory', 'one', HrefResponse::class, true, false],
    'ComputerInventory\\CreateComputersInventoryV4Request' => [CreateComputersInventoryV4Request::class, [['name' => 'x']], 'POST', '/v4/computers-inventory', 'one', HrefResponse::class, true, false],
    'ComputerInventory\\DeleteComputerInventoryAttachmentV1Request' => [DeleteComputerInventoryAttachmentV1Request::class, [7, 7], 'DELETE', '/v1/computers-inventory/7/attachments/7', 'none', null, false, false],
    'ComputerInventory\\DeleteComputerInventoryAttachmentV2Request' => [DeleteComputerInventoryAttachmentV2Request::class, [7, 7], 'DELETE', '/v2/computers-inventory/7/attachments/7', 'none', null, false, false],
    'ComputerInventory\\DeleteComputerInventoryAttachmentV3Request' => [DeleteComputerInventoryAttachmentV3Request::class, [7, 7], 'DELETE', '/v3/computers-inventory/7/attachments/7', 'none', null, false, false],
    'ComputerInventory\\DeleteComputerInventoryAttachmentV4Request' => [DeleteComputerInventoryAttachmentV4Request::class, [7, 7], 'DELETE', '/v4/computers-inventory/7/attachments/7', 'none', null, false, false],
    'ComputerInventory\\DeleteComputerInventoryV1Request' => [DeleteComputerInventoryV1Request::class, [7], 'DELETE', '/v1/computers-inventory/7', 'none', null, false, false],
    'ComputerInventory\\DeleteComputerInventoryV2Request' => [DeleteComputerInventoryV2Request::class, [7], 'DELETE', '/v2/computers-inventory/7', 'none', null, false, false],
    'ComputerInventory\\DeleteComputerInventoryV3Request' => [DeleteComputerInventoryV3Request::class, [7], 'DELETE', '/v3/computers-inventory/7', 'none', null, false, false],
    'ComputerInventory\\DeleteComputerInventoryV4Request' => [DeleteComputerInventoryV4Request::class, [7], 'DELETE', '/v4/computers-inventory/7', 'none', null, false, false],
    'ComputerInventory\\EraseComputerInventoryV1Request' => [EraseComputerInventoryV1Request::class, [7], 'POST', '/v1/computer-inventory/7/erase', 'one', EraseDeviceComputerResponse::class, true, false],
    'ComputerInventory\\EraseComputerInventoryV4Request' => [EraseComputerInventoryV4Request::class, [7], 'POST', '/v4/computers-inventory/7/erase', 'one', EraseDeviceComputerResponse::class, true, false],
    'ComputerInventory\\GetComputerInventoryAttachmentV1Request' => [GetComputerInventoryAttachmentV1Request::class, [7, 7], 'GET', '/v1/computers-inventory/7/attachments/7', 'text', null, false, false],
    'ComputerInventory\\GetComputerInventoryAttachmentV2Request' => [GetComputerInventoryAttachmentV2Request::class, [7, 7], 'GET', '/v2/computers-inventory/7/attachments/7', 'text', null, false, false],
    'ComputerInventory\\GetComputerInventoryAttachmentV3Request' => [GetComputerInventoryAttachmentV3Request::class, [7, 7], 'GET', '/v3/computers-inventory/7/attachments/7', 'text', null, false, false],
    'ComputerInventory\\GetComputerInventoryAttachmentV4Request' => [GetComputerInventoryAttachmentV4Request::class, [7, 7], 'GET', '/v4/computers-inventory/7/attachments/7', 'text', null, false, false],
    'ComputerInventory\\GetComputerInventoryDetailV1Request' => [GetComputerInventoryDetailV1Request::class, [7], 'GET', '/v1/computers-inventory-detail/7', 'one', ComputerInventory::class, false, false],
    'ComputerInventory\\GetComputerInventoryDetailV2Request' => [GetComputerInventoryDetailV2Request::class, [7], 'GET', '/v2/computers-inventory-detail/7', 'one', ComputerInventoryV2::class, false, false],
    'ComputerInventory\\GetComputerInventoryDetailV3Request' => [GetComputerInventoryDetailV3Request::class, [7], 'GET', '/v3/computers-inventory-detail/7', 'one', ComputerInventoryV3::class, false, false],
    'ComputerInventory\\GetComputerInventoryDetailV4Request' => [GetComputerInventoryDetailV4Request::class, [7], 'GET', '/v4/computers-inventory-detail/7', 'one', ComputerInventoryV4::class, false, false],
    'ComputerInventory\\GetComputerInventoryFilevaultV1Request' => [GetComputerInventoryFilevaultV1Request::class, [7], 'GET', '/v1/computers-inventory/7/filevault', 'one', ComputerInventoryFileVault::class, false, false],
    'ComputerInventory\\GetComputerInventoryFilevaultV2Request' => [GetComputerInventoryFilevaultV2Request::class, [7], 'GET', '/v2/computers-inventory/7/filevault', 'one', ComputerInventoryFileVault::class, false, false],
    'ComputerInventory\\GetComputerInventoryFilevaultV3Request' => [GetComputerInventoryFilevaultV3Request::class, [7], 'GET', '/v3/computers-inventory/7/filevault', 'one', ComputerInventoryFileVault::class, false, false],
    'ComputerInventory\\GetComputerInventoryFilevaultV4Request' => [GetComputerInventoryFilevaultV4Request::class, [7], 'GET', '/v4/computers-inventory/7/filevault', 'one', ComputerInventoryFileVault::class, false, false],
    'ComputerInventory\\GetComputerInventoryV1Request' => [GetComputerInventoryV1Request::class, [7], 'GET', '/v1/computers-inventory/7', 'one', ComputerInventory::class, false, false],
    'ComputerInventory\\GetComputerInventoryV2Request' => [GetComputerInventoryV2Request::class, [7], 'GET', '/v2/computers-inventory/7', 'one', ComputerInventoryV2::class, false, false],
    'ComputerInventory\\GetComputerInventoryV3Request' => [GetComputerInventoryV3Request::class, [7], 'GET', '/v3/computers-inventory/7', 'one', ComputerInventoryV3::class, false, false],
    'ComputerInventory\\GetComputerInventoryV4Request' => [GetComputerInventoryV4Request::class, [7], 'GET', '/v4/computers-inventory/7', 'one', ComputerInventoryV4::class, false, false],
    'ComputerInventory\\GetComputerInventoryViewDeviceLockPinV1Request' => [GetComputerInventoryViewDeviceLockPinV1Request::class, [7], 'GET', '/v1/computers-inventory/7/view-device-lock-pin', 'one', ComputerInventoryDeviceLockPinResponse::class, false, false],
    'ComputerInventory\\GetComputerInventoryViewDeviceLockPinV2Request' => [GetComputerInventoryViewDeviceLockPinV2Request::class, [7], 'GET', '/v2/computers-inventory/7/view-device-lock-pin', 'one', ComputerInventoryDeviceLockPinResponse::class, false, false],
    'ComputerInventory\\GetComputerInventoryViewDeviceLockPinV3Request' => [GetComputerInventoryViewDeviceLockPinV3Request::class, [7], 'GET', '/v3/computers-inventory/7/view-device-lock-pin', 'one', ComputerInventoryDeviceLockPinResponse::class, false, false],
    'ComputerInventory\\GetComputerInventoryViewDeviceLockPinV4Request' => [GetComputerInventoryViewDeviceLockPinV4Request::class, [7], 'GET', '/v4/computers-inventory/7/view-device-lock-pin', 'one', ComputerInventoryDeviceLockPinResponse::class, false, false],
    'ComputerInventory\\GetComputerInventoryViewRecoveryLockPasswordV1Request' => [GetComputerInventoryViewRecoveryLockPasswordV1Request::class, [7], 'GET', '/v1/computers-inventory/7/view-recovery-lock-password', 'one', ComputerInventoryRecoveryLockPasswordResponse::class, false, false],
    'ComputerInventory\\GetComputerInventoryViewRecoveryLockPasswordV2Request' => [GetComputerInventoryViewRecoveryLockPasswordV2Request::class, [7], 'GET', '/v2/computers-inventory/7/view-recovery-lock-password', 'one', ComputerInventoryRecoveryLockPasswordResponse::class, false, false],
    'ComputerInventory\\GetComputerInventoryViewRecoveryLockPasswordV3Request' => [GetComputerInventoryViewRecoveryLockPasswordV3Request::class, [7], 'GET', '/v3/computers-inventory/7/view-recovery-lock-password', 'one', ComputerInventoryRecoveryLockPasswordResponse::class, false, false],
    'ComputerInventory\\GetComputerInventoryViewRecoveryLockPasswordV4Request' => [GetComputerInventoryViewRecoveryLockPasswordV4Request::class, [7], 'GET', '/v4/computers-inventory/7/view-recovery-lock-password', 'one', ComputerInventoryRecoveryLockPasswordResponse::class, false, false],
    'ComputerInventory\\GetComputersInventoryFilevaultV1Request' => [GetComputersInventoryFilevaultV1Request::class, [], 'GET', '/v1/computers-inventory/filevault', 'list', ComputerInventoryFileVault::class, false, true],
    'ComputerInventory\\GetComputersInventoryFilevaultV2Request' => [GetComputersInventoryFilevaultV2Request::class, [], 'GET', '/v2/computers-inventory/filevault', 'list', ComputerInventoryFileVault::class, false, true],
    'ComputerInventory\\GetComputersInventoryFilevaultV3Request' => [GetComputersInventoryFilevaultV3Request::class, [], 'GET', '/v3/computers-inventory/filevault', 'list', ComputerInventoryFileVault::class, false, true],
    'ComputerInventory\\GetComputersInventoryFilevaultV4Request' => [GetComputersInventoryFilevaultV4Request::class, [], 'GET', '/v4/computers-inventory/filevault', 'list', ComputerInventoryFileVault::class, false, true],
    'ComputerInventory\\GetComputersInventoryV1Request' => [GetComputersInventoryV1Request::class, [], 'GET', '/v1/computers-inventory', 'list', ComputerInventory::class, false, true],
    'ComputerInventory\\GetComputersInventoryV2Request' => [GetComputersInventoryV2Request::class, [], 'GET', '/v2/computers-inventory', 'list', ComputerInventoryV2::class, false, true],
    'ComputerInventory\\GetComputersInventoryV3Request' => [GetComputersInventoryV3Request::class, [], 'GET', '/v3/computers-inventory', 'list', ComputerInventoryV3::class, false, true],
    'ComputerInventory\\GetComputersInventoryV4Request' => [GetComputersInventoryV4Request::class, [], 'GET', '/v4/computers-inventory', 'list', ComputerInventoryV4::class, false, true],
    'ComputerInventory\\RemoveComputerInventoryMdmProfileV1Request' => [RemoveComputerInventoryMdmProfileV1Request::class, [7], 'POST', '/v1/computer-inventory/7/remove-mdm-profile', 'one', RemoveComputerMdmProfileResponse::class, false, false],
    'ComputerInventory\\RemoveComputerInventoryMdmProfileV4Request' => [RemoveComputerInventoryMdmProfileV4Request::class, [7], 'POST', '/v4/computers-inventory/7/remove-mdm-profile', 'one', RemoveComputerMdmProfileResponse::class, false, false],
    'ComputerInventory\\UpdateComputerInventoryDetailV1Request' => [UpdateComputerInventoryDetailV1Request::class, [7, ['name' => 'x']], 'PATCH', '/v1/computers-inventory-detail/7', 'one', ComputerInventory::class, true, false],
    'ComputerInventory\\UpdateComputerInventoryDetailV2Request' => [UpdateComputerInventoryDetailV2Request::class, [7, ['name' => 'x']], 'PATCH', '/v2/computers-inventory-detail/7', 'none', null, true, false],
    'ComputerInventory\\UpdateComputerInventoryDetailV3Request' => [UpdateComputerInventoryDetailV3Request::class, [7, ['name' => 'x']], 'PATCH', '/v3/computers-inventory-detail/7', 'none', null, true, false],
    'ComputerInventory\\UpdateComputerInventoryDetailV4Request' => [UpdateComputerInventoryDetailV4Request::class, [7, ['name' => 'x']], 'PATCH', '/v4/computers-inventory-detail/7', 'none', null, true, false],
    'ComputerInventoryCollectionSettings\\CreateComputerInventoryCollectionSettingsCustomPathV1Request' => [CreateComputerInventoryCollectionSettingsCustomPathV1Request::class, [['name' => 'x']], 'POST', '/v1/computer-inventory-collection-settings/custom-path', 'one', HrefResponse::class, true, false],
    'ComputerInventoryCollectionSettings\\CreateComputerInventoryCollectionSettingsCustomPathV2Request' => [CreateComputerInventoryCollectionSettingsCustomPathV2Request::class, [['name' => 'x']], 'POST', '/v2/computer-inventory-collection-settings/custom-path', 'one', HrefResponse::class, true, false],
    'ComputerInventoryCollectionSettings\\DeleteComputerInventoryCollectionSettingsCustomPathV1Request' => [DeleteComputerInventoryCollectionSettingsCustomPathV1Request::class, [7], 'DELETE', '/v1/computer-inventory-collection-settings/custom-path/7', 'none', null, false, false],
    'ComputerInventoryCollectionSettings\\DeleteComputerInventoryCollectionSettingsCustomPathV2Request' => [DeleteComputerInventoryCollectionSettingsCustomPathV2Request::class, [7], 'DELETE', '/v2/computer-inventory-collection-settings/custom-path/7', 'none', null, false, false],
    'ComputerInventoryCollectionSettings\\GetComputerInventoryCollectionSettingsV1Request' => [GetComputerInventoryCollectionSettingsV1Request::class, [], 'GET', '/v1/computer-inventory-collection-settings', 'one', ComputerInventoryCollectionSettings::class, false, false],
    'ComputerInventoryCollectionSettings\\GetComputerInventoryCollectionSettingsV2Request' => [GetComputerInventoryCollectionSettingsV2Request::class, [], 'GET', '/v2/computer-inventory-collection-settings', 'one', ComputerInventoryCollectionSettingsV2::class, false, false],
    'ComputerInventoryCollectionSettings\\UpdateComputerInventoryCollectionSettingsV1Request' => [UpdateComputerInventoryCollectionSettingsV1Request::class, [['name' => 'x']], 'PATCH', '/v1/computer-inventory-collection-settings', 'one', ComputerInventoryCollectionSettings::class, true, false],
    'ComputerInventoryCollectionSettings\\UpdateComputerInventoryCollectionSettingsV2Request' => [UpdateComputerInventoryCollectionSettingsV2Request::class, [['name' => 'x']], 'PATCH', '/v2/computer-inventory-collection-settings', 'none', null, true, false],
    'ComputerPrestages\\CreateComputerPrestageScopeV2Request' => [CreateComputerPrestageScopeV2Request::class, [7, ['name' => 'x']], 'POST', '/v2/computer-prestages/7/scope', 'one', PrestageScopeResponseV2::class, true, false],
    'ComputerPrestages\\CreateComputerPrestagesV3Request' => [CreateComputerPrestagesV3Request::class, [['name' => 'x']], 'POST', '/v3/computer-prestages', 'one', HrefResponse::class, true, false],
    'ComputerPrestages\\DeleteComputerPrestageV3Request' => [DeleteComputerPrestageV3Request::class, [7], 'DELETE', '/v3/computer-prestages/7', 'none', null, false, false],
    'ComputerPrestages\\DeleteMultipleComputerPrestageScopeV2Request' => [DeleteMultipleComputerPrestageScopeV2Request::class, [7, ['name' => 'x']], 'POST', '/v2/computer-prestages/7/scope/delete-multiple', 'one', PrestageScopeResponseV2::class, true, false],
    'ComputerPrestages\\GetComputerPrestageScopeV2Request' => [GetComputerPrestageScopeV2Request::class, [7], 'GET', '/v2/computer-prestages/7/scope', 'one', PrestageScopeResponseV2::class, false, false],
    'ComputerPrestages\\GetComputerPrestageV3Request' => [GetComputerPrestageV3Request::class, [7], 'GET', '/v3/computer-prestages/7', 'one', GetComputerPrestageV3::class, false, false],
    'ComputerPrestages\\GetComputerPrestagesScopeV2Request' => [GetComputerPrestagesScopeV2Request::class, [], 'GET', '/v2/computer-prestages/scope', 'one', PrestageScopeV2::class, false, false],
    'ComputerPrestages\\GetComputerPrestagesV3Request' => [GetComputerPrestagesV3Request::class, [], 'GET', '/v3/computer-prestages', 'list', GetComputerPrestageV3::class, false, true],
    'ComputerPrestages\\ReplaceComputerPrestageScopeV2Request' => [ReplaceComputerPrestageScopeV2Request::class, [7, ['name' => 'x']], 'PUT', '/v2/computer-prestages/7/scope', 'one', PrestageScopeResponseV2::class, true, false],
    'ComputerPrestages\\ReplaceComputerPrestageV3Request' => [ReplaceComputerPrestageV3Request::class, [7, ['name' => 'x']], 'PUT', '/v3/computer-prestages/7', 'one', GetComputerPrestageV3::class, true, false],
    'ComputersPreview\\GetComputersPreviewRequest' => [GetComputersPreviewRequest::class, [], 'GET', '/preview/computers', 'list', ComputerOverview::class, false, true],
    'ConditionalAccess\\GetConditionalAccessDeviceComplianceFeatureToggleV1Request' => [GetConditionalAccessDeviceComplianceFeatureToggleV1Request::class, [], 'GET', '/v1/conditional-access/device-compliance/feature-toggle', 'one', SharedDeviceComplianceFeatureToggle::class, false, false],
    'ConditionalAccess\\GetConditionalAccessDeviceComplianceInformationComputerV1Request' => [GetConditionalAccessDeviceComplianceInformationComputerV1Request::class, [7], 'GET', '/v1/conditional-access/device-compliance-information/computer/7', 'list', DeviceComplianceInformation::class, false, false],
    'ConditionalAccess\\GetConditionalAccessDeviceComplianceInformationMobileV1Request' => [GetConditionalAccessDeviceComplianceInformationMobileV1Request::class, [7], 'GET', '/v1/conditional-access/device-compliance-information/mobile/7', 'list', DeviceComplianceInformation::class, false, false],
    'Csa\\DeleteCsaTokenV1Request' => [DeleteCsaTokenV1Request::class, [], 'DELETE', '/v1/csa/token', 'none', null, false, false],
    'Csa\\GetCsaTenantIdV1Request' => [GetCsaTenantIdV1Request::class, [], 'GET', '/v1/csa/tenant-id', 'one', CsaTenantIdInfo::class, false, false],
    'Csa\\GetCsaTokenV1Request' => [GetCsaTokenV1Request::class, [], 'GET', '/v1/csa/token', 'one', CsaToken::class, false, false],
    'Dashboard\\GetDashboardV1Request' => [GetDashboardV1Request::class, [], 'GET', '/v1/dashboard', 'one', DashboardSetup::class, false, false],
    'Dashboard\\ToggleDashboardV1Request' => [ToggleDashboardV1Request::class, [['name' => 'x']], 'POST', '/v1/dashboard/toggle', 'one', HrefResponse::class, true, false],
    'DeclarativeDeviceManagement\\GetDdmStatusItemV1Request' => [GetDdmStatusItemV1Request::class, [7, 'abc'], 'GET', '/v1/ddm/7/status-items/abc', 'one', StatusItem::class, false, false],
    'DeclarativeDeviceManagement\\GetDdmStatusItemsV1Request' => [GetDdmStatusItemsV1Request::class, [7], 'GET', '/v1/ddm/7/status-items', 'one', StatusItems::class, false, false],
    'DeclarativeDeviceManagement\\GetDssDeclarationV1Request' => [GetDssDeclarationV1Request::class, [7], 'GET', '/v1/dss-declarations/7', 'one', DssDeclarations::class, false, false],
    'DeclarativeDeviceManagement\\SyncDdmV1Request' => [SyncDdmV1Request::class, [7], 'POST', '/v1/ddm/7/sync', 'none', null, false, false],
    'Departments\\CreateDepartmentHistoryV1Request' => [CreateDepartmentHistoryV1Request::class, [7, ['name' => 'x']], 'POST', '/v1/departments/7/history', 'one', HrefResponse::class, true, false],
    'Departments\\CreateDepartmentsV1Request' => [CreateDepartmentsV1Request::class, [['name' => 'x']], 'POST', '/v1/departments', 'one', HrefResponse::class, true, false],
    'Departments\\DeleteDepartmentV1Request' => [DeleteDepartmentV1Request::class, [7], 'DELETE', '/v1/departments/7', 'none', null, false, false],
    'Departments\\DeleteMultipleDepartmentsV1Request' => [DeleteMultipleDepartmentsV1Request::class, [['name' => 'x']], 'POST', '/v1/departments/delete-multiple', 'none', null, true, false],
    'Departments\\GetDepartmentHistoryV1Request' => [GetDepartmentHistoryV1Request::class, [7], 'GET', '/v1/departments/7/history', 'list', ObjectHistory::class, false, true],
    'Departments\\GetDepartmentV1Request' => [GetDepartmentV1Request::class, [7], 'GET', '/v1/departments/7', 'one', Department::class, false, false],
    'Departments\\GetDepartmentsV1Request' => [GetDepartmentsV1Request::class, [], 'GET', '/v1/departments', 'list', Department::class, false, true],
    'Departments\\ReplaceDepartmentV1Request' => [ReplaceDepartmentV1Request::class, [7, ['name' => 'x']], 'PUT', '/v1/departments/7', 'one', Department::class, true, false],
    'DeviceCommunicationSettings\\CreateDeviceCommunicationSettingsHistoryV1Request' => [CreateDeviceCommunicationSettingsHistoryV1Request::class, [['name' => 'x']], 'POST', '/v1/device-communication-settings/history', 'one', ObjectHistory::class, true, false],
    'DeviceCommunicationSettings\\GetDeviceCommunicationSettingsHistoryV1Request' => [GetDeviceCommunicationSettingsHistoryV1Request::class, [], 'GET', '/v1/device-communication-settings/history', 'list', ObjectHistory::class, false, true],
    'DeviceCommunicationSettings\\GetDeviceCommunicationSettingsV1Request' => [GetDeviceCommunicationSettingsV1Request::class, [], 'GET', '/v1/device-communication-settings', 'one', DeviceCommunicationSettings::class, false, false],
    'DeviceCommunicationSettings\\ReplaceDeviceCommunicationSettingsV1Request' => [ReplaceDeviceCommunicationSettingsV1Request::class, [['name' => 'x']], 'PUT', '/v1/device-communication-settings', 'one', DeviceCommunicationSettings::class, true, false],
    'DeviceEnrollments\\CreateDeviceEnrollmentHistoryV1Request' => [CreateDeviceEnrollmentHistoryV1Request::class, [7, ['name' => 'x']], 'POST', '/v1/device-enrollments/7/history', 'one', HrefResponse::class, true, false],
    'DeviceEnrollments\\DeleteDeviceEnrollmentV1Request' => [DeleteDeviceEnrollmentV1Request::class, [7], 'DELETE', '/v1/device-enrollments/7', 'none', null, false, false],
    'DeviceEnrollments\\DisownDeviceEnrollmentV1Request' => [DisownDeviceEnrollmentV1Request::class, [7], 'POST', '/v1/device-enrollments/7/disown', 'one', DeviceEnrollmentDisownResponse::class, true, false],
    'DeviceEnrollments\\GetDeviceEnrollmentHistoryV1Request' => [GetDeviceEnrollmentHistoryV1Request::class, [7], 'GET', '/v1/device-enrollments/7/history', 'list', ObjectHistory::class, false, true],
    'DeviceEnrollments\\GetDeviceEnrollmentSyncsLatestV1Request' => [GetDeviceEnrollmentSyncsLatestV1Request::class, [7], 'GET', '/v1/device-enrollments/7/syncs/latest', 'one', DeviceEnrollmentInstanceSyncStatus::class, false, false],
    'DeviceEnrollments\\GetDeviceEnrollmentSyncsV1Request' => [GetDeviceEnrollmentSyncsV1Request::class, [7], 'GET', '/v1/device-enrollments/7/syncs', 'list', DeviceEnrollmentInstanceSyncStatus::class, false, false],
    'DeviceEnrollments\\GetDeviceEnrollmentV1Request' => [GetDeviceEnrollmentV1Request::class, [7], 'GET', '/v1/device-enrollments/7', 'one', DeviceEnrollmentInstance::class, false, false],
    'DeviceEnrollments\\GetDeviceEnrollmentsPublicKeyV1Request' => [GetDeviceEnrollmentsPublicKeyV1Request::class, [], 'GET', '/v1/device-enrollments/public-key', 'text', null, false, false],
    'DeviceEnrollments\\GetDeviceEnrollmentsSyncsV1Request' => [GetDeviceEnrollmentsSyncsV1Request::class, [], 'GET', '/v1/device-enrollments/syncs', 'list', DeviceEnrollmentInstanceSyncStatus::class, false, false],
    'DeviceEnrollments\\GetDeviceEnrollmentsV1Request' => [GetDeviceEnrollmentsV1Request::class, [], 'GET', '/v1/device-enrollments', 'list', DeviceEnrollmentInstance::class, false, true],
    'DeviceEnrollments\\ReplaceDeviceEnrollmentUploadTokenV1Request' => [ReplaceDeviceEnrollmentUploadTokenV1Request::class, [7, ['name' => 'x']], 'PUT', '/v1/device-enrollments/7/upload-token', 'one', DeviceEnrollmentInstance::class, true, false],
    'DeviceEnrollments\\ReplaceDeviceEnrollmentV1Request' => [ReplaceDeviceEnrollmentV1Request::class, [7, ['name' => 'x']], 'PUT', '/v1/device-enrollments/7', 'one', DeviceEnrollmentInstance::class, true, false],
    'DeviceEnrollments\\UploadDeviceEnrollmentsTokenV1Request' => [UploadDeviceEnrollmentsTokenV1Request::class, [['name' => 'x']], 'POST', '/v1/device-enrollments/upload-token', 'one', HrefResponse::class, true, false],
    'DeviceEnrollmentsDevices\\GetDeviceEnrollmentDevicesV1Request' => [GetDeviceEnrollmentDevicesV1Request::class, [7], 'GET', '/v1/device-enrollments/7/devices', 'list', DeviceEnrollmentDevice::class, false, false],
    'Devices\\GetDeviceGroupsV1Request' => [GetDeviceGroupsV1Request::class, [7], 'GET', '/v1/devices/7/groups', 'list', DeviceGroup::class, false, false],
    'Digicert\\CreatePkiDigicertTrustLifecycleManagerV1Request' => [CreatePkiDigicertTrustLifecycleManagerV1Request::class, [['name' => 'x']], 'POST', '/v1/pki/digicert/trust-lifecycle-manager', 'text', null, true, false],
    'Digicert\\DeletePkiDigicertTrustLifecycleManagerV1Request' => [DeletePkiDigicertTrustLifecycleManagerV1Request::class, [7], 'DELETE', '/v1/pki/digicert/trust-lifecycle-manager/7', 'none', null, false, false],
    'Digicert\\GetPkiDigicertTrustLifecycleManagerConnectionStatusV1Request' => [GetPkiDigicertTrustLifecycleManagerConnectionStatusV1Request::class, [7], 'GET', '/v1/pki/digicert/trust-lifecycle-manager/7/connection-status', 'one', DigicertConnectionStatus::class, false, false],
    'Digicert\\GetPkiDigicertTrustLifecycleManagerDependenciesV1Request' => [GetPkiDigicertTrustLifecycleManagerDependenciesV1Request::class, [7], 'GET', '/v1/pki/digicert/trust-lifecycle-manager/7/dependencies', 'list', DigicertDependency::class, false, false],
    'Digicert\\GetPkiDigicertTrustLifecycleManagerPrivilegeCheckV1Request' => [GetPkiDigicertTrustLifecycleManagerPrivilegeCheckV1Request::class, [7], 'GET', '/v1/pki/digicert/trust-lifecycle-manager/7/privilege-check', 'none', null, false, false],
    'Digicert\\GetPkiDigicertTrustLifecycleManagerV1Request' => [GetPkiDigicertTrustLifecycleManagerV1Request::class, [7], 'GET', '/v1/pki/digicert/trust-lifecycle-manager/7', 'one', DigiCertSettingResponse::class, false, false],
    'Digicert\\UpdatePkiDigicertTrustLifecycleManagerV1Request' => [UpdatePkiDigicertTrustLifecycleManagerV1Request::class, [7, ['name' => 'x']], 'PATCH', '/v1/pki/digicert/trust-lifecycle-manager/7', 'none', null, true, false],
    'Digicert\\ValidatePkiDigicertTrustLifecycleManagerClientCertificateV1Request' => [ValidatePkiDigicertTrustLifecycleManagerClientCertificateV1Request::class, [], 'POST', '/v1/pki/digicert/trust-lifecycle-manager/validate-client-certificate', 'none', null, true, false],
    'DistributionPoint\\CreateDistributionPointHistoryV1Request' => [CreateDistributionPointHistoryV1Request::class, [7, ['name' => 'x']], 'POST', '/v1/distribution-points/7/history', 'one', ObjectHistory::class, true, false],
    'DistributionPoint\\CreateDistributionPointsV1Request' => [CreateDistributionPointsV1Request::class, [['name' => 'x']], 'POST', '/v1/distribution-points', 'one', HrefResponse::class, true, false],
    'DistributionPoint\\DeleteDistributionPointV1Request' => [DeleteDistributionPointV1Request::class, [7], 'DELETE', '/v1/distribution-points/7', 'none', null, false, false],
    'DistributionPoint\\DeleteMultipleDistributionPointsV1Request' => [DeleteMultipleDistributionPointsV1Request::class, [['name' => 'x']], 'POST', '/v1/distribution-points/delete-multiple', 'none', null, true, false],
    'DistributionPoint\\GetDistributionPointHistoryV1Request' => [GetDistributionPointHistoryV1Request::class, [7], 'GET', '/v1/distribution-points/7/history', 'list', ObjectHistory::class, false, true],
    'DistributionPoint\\GetDistributionPointV1Request' => [GetDistributionPointV1Request::class, [7], 'GET', '/v1/distribution-points/7', 'one', DistributionPoint::class, false, false],
    'DistributionPoint\\GetDistributionPointsV1Request' => [GetDistributionPointsV1Request::class, [], 'GET', '/v1/distribution-points', 'list', DistributionPoint::class, false, true],
    'DistributionPoint\\ReplaceDistributionPointV1Request' => [ReplaceDistributionPointV1Request::class, [7, ['name' => 'x']], 'PUT', '/v1/distribution-points/7', 'one', DistributionPoint::class, true, false],
    'DistributionPoint\\UpdateDistributionPointV1Request' => [UpdateDistributionPointV1Request::class, [7, ['name' => 'x']], 'PATCH', '/v1/distribution-points/7', 'one', DistributionPoint::class, true, false],
    'DockItems\\CreateDockItemsV1Request' => [CreateDockItemsV1Request::class, [['name' => 'x']], 'POST', '/v1/dock-items', 'one', HrefResponse::class, true, false],
    'DockItems\\DeleteDockItemV1Request' => [DeleteDockItemV1Request::class, [7], 'DELETE', '/v1/dock-items/7', 'none', null, false, false],
    'DockItems\\GetDockItemV1Request' => [GetDockItemV1Request::class, [7], 'GET', '/v1/dock-items/7', 'one', DockItem::class, false, false],
    'DockItems\\ReplaceDockItemV1Request' => [ReplaceDockItemV1Request::class, [7, ['name' => 'x']], 'PUT', '/v1/dock-items/7', 'text', null, true, false],
    'Ebooks\\GetEbookScopeV1Request' => [GetEbookScopeV1Request::class, [7], 'GET', '/v1/ebooks/7/scope', 'one', EbookScope::class, false, false],
    'Ebooks\\GetEbookV1Request' => [GetEbookV1Request::class, [7], 'GET', '/v1/ebooks/7', 'one', Ebook::class, false, false],
    'Ebooks\\GetEbooksV1Request' => [GetEbooksV1Request::class, [], 'GET', '/v1/ebooks', 'list', Ebook::class, false, true],
    'Enrollment\\CreateEnrollmentAccessGroupsV3Request' => [CreateEnrollmentAccessGroupsV3Request::class, [['name' => 'x']], 'POST', '/v3/enrollment/access-groups', 'one', HrefResponse::class, true, false],
    'Enrollment\\CreateEnrollmentAccessManagementV4Request' => [CreateEnrollmentAccessManagementV4Request::class, [['name' => 'x']], 'POST', '/v4/enrollment/access-management', 'one', AccessManagementSetting::class, true, false],
    'Enrollment\\CreateEnrollmentHistoryV2Request' => [CreateEnrollmentHistoryV2Request::class, [['name' => 'x']], 'POST', '/v2/enrollment/history', 'one', HrefResponse::class, true, false],
    'Enrollment\\DeleteEnrollmentAccessGroupV3Request' => [DeleteEnrollmentAccessGroupV3Request::class, [7], 'DELETE', '/v3/enrollment/access-groups/7', 'none', null, false, false],
    'Enrollment\\DeleteEnrollmentLanguageV3Request' => [DeleteEnrollmentLanguageV3Request::class, [7], 'DELETE', '/v3/enrollment/languages/7', 'none', null, false, false],
    'Enrollment\\DeleteMultipleEnrollmentLanguagesV3Request' => [DeleteMultipleEnrollmentLanguagesV3Request::class, [['name' => 'x']], 'POST', '/v3/enrollment/languages/delete-multiple', 'none', null, true, false],
    'Enrollment\\ExportEnrollmentHistoryV2Request' => [ExportEnrollmentHistoryV2Request::class, [], 'POST', '/v2/enrollment/history/export', 'raw', null, true, false],
    'Enrollment\\GetAdueSessionTokenSettingsV1Request' => [GetAdueSessionTokenSettingsV1Request::class, [], 'GET', '/v1/adue-session-token-settings', 'one', AccountDrivenUserEnrollmentSessionTokenSettings::class, false, false],
    'Enrollment\\GetEnrollmentAccessGroupV3Request' => [GetEnrollmentAccessGroupV3Request::class, [7], 'GET', '/v3/enrollment/access-groups/7', 'one', EnrollmentAccessGroupPreview::class, false, false],
    'Enrollment\\GetEnrollmentAccessGroupsV3Request' => [GetEnrollmentAccessGroupsV3Request::class, [], 'GET', '/v3/enrollment/access-groups', 'list', EnrollmentAccessGroupPreview::class, false, true],
    'Enrollment\\GetEnrollmentAccessManagementV4Request' => [GetEnrollmentAccessManagementV4Request::class, [], 'GET', '/v4/enrollment/access-management', 'one', AccessManagementSetting::class, false, false],
    'Enrollment\\GetEnrollmentFilteredLanguageCodesV3Request' => [GetEnrollmentFilteredLanguageCodesV3Request::class, [], 'GET', '/v3/enrollment/filtered-language-codes', 'list', LanguageCode::class, false, false],
    'Enrollment\\GetEnrollmentHistoryV2Request' => [GetEnrollmentHistoryV2Request::class, [], 'GET', '/v2/enrollment/history', 'list', ObjectHistory::class, false, true],
    'Enrollment\\GetEnrollmentLanguageCodesV3Request' => [GetEnrollmentLanguageCodesV3Request::class, [], 'GET', '/v3/enrollment/language-codes', 'list', LanguageCode::class, false, false],
    'Enrollment\\GetEnrollmentLanguageV3Request' => [GetEnrollmentLanguageV3Request::class, [7], 'GET', '/v3/enrollment/languages/7', 'one', EnrollmentProcessTextObject::class, false, false],
    'Enrollment\\GetEnrollmentLanguagesV3Request' => [GetEnrollmentLanguagesV3Request::class, [], 'GET', '/v3/enrollment/languages', 'list', EnrollmentProcessTextObject::class, false, true],
    'Enrollment\\GetEnrollmentV4Request' => [GetEnrollmentV4Request::class, [], 'GET', '/v4/enrollment', 'one', EnrollmentSettingsV4::class, false, false],
    'Enrollment\\ReplaceAdueSessionTokenSettingsV1Request' => [ReplaceAdueSessionTokenSettingsV1Request::class, [['name' => 'x']], 'PUT', '/v1/adue-session-token-settings', 'one', AccountDrivenUserEnrollmentSessionTokenSettings::class, true, false],
    'Enrollment\\ReplaceEnrollmentAccessGroupV3Request' => [ReplaceEnrollmentAccessGroupV3Request::class, [7, ['name' => 'x']], 'PUT', '/v3/enrollment/access-groups/7', 'one', EnrollmentAccessGroupPreview::class, true, false],
    'Enrollment\\ReplaceEnrollmentLanguageV3Request' => [ReplaceEnrollmentLanguageV3Request::class, [7], 'PUT', '/v3/enrollment/languages/7', 'one', EnrollmentProcessTextObject::class, true, false],
    'Enrollment\\ReplaceEnrollmentV4Request' => [ReplaceEnrollmentV4Request::class, [['name' => 'x']], 'PUT', '/v4/enrollment', 'one', EnrollmentSettingsV4::class, true, false],
    'EnrollmentCustomization\\CreateEnrollmentCustomizationHistoryV2Request' => [CreateEnrollmentCustomizationHistoryV2Request::class, [7, ['name' => 'x']], 'POST', '/v2/enrollment-customizations/7/history', 'one', ObjectHistory::class, true, false],
    'EnrollmentCustomization\\CreateEnrollmentCustomizationsImagesV2Request' => [CreateEnrollmentCustomizationsImagesV2Request::class, ['contents'], 'POST', '/v2/enrollment-customizations/images', 'one', BrandingImageUrl::class, true, false],
    'EnrollmentCustomization\\CreateEnrollmentCustomizationsV2Request' => [CreateEnrollmentCustomizationsV2Request::class, [['name' => 'x']], 'POST', '/v2/enrollment-customizations', 'one', HrefResponse::class, true, false],
    'EnrollmentCustomization\\DeleteEnrollmentCustomizationV2Request' => [DeleteEnrollmentCustomizationV2Request::class, [7], 'DELETE', '/v2/enrollment-customizations/7', 'none', null, false, false],
    'EnrollmentCustomization\\GetEnrollmentCustomizationHistoryV2Request' => [GetEnrollmentCustomizationHistoryV2Request::class, [7], 'GET', '/v2/enrollment-customizations/7/history', 'list', ObjectHistory::class, false, true],
    'EnrollmentCustomization\\GetEnrollmentCustomizationPrestagesV2Request' => [GetEnrollmentCustomizationPrestagesV2Request::class, [7], 'GET', '/v2/enrollment-customizations/7/prestages', 'one', PrestageDependencies::class, false, false],
    'EnrollmentCustomization\\GetEnrollmentCustomizationV2Request' => [GetEnrollmentCustomizationV2Request::class, [7], 'GET', '/v2/enrollment-customizations/7', 'one', EnrollmentCustomizationV2::class, false, false],
    'EnrollmentCustomization\\GetEnrollmentCustomizationsImageV2Request' => [GetEnrollmentCustomizationsImageV2Request::class, [7], 'GET', '/v2/enrollment-customizations/images/7', 'text', null, false, false],
    'EnrollmentCustomization\\GetEnrollmentCustomizationsV2Request' => [GetEnrollmentCustomizationsV2Request::class, [], 'GET', '/v2/enrollment-customizations', 'list', EnrollmentCustomizationV2::class, false, true],
    'EnrollmentCustomization\\ReplaceEnrollmentCustomizationV2Request' => [ReplaceEnrollmentCustomizationV2Request::class, [7, ['name' => 'x']], 'PUT', '/v2/enrollment-customizations/7', 'one', EnrollmentCustomizationV2::class, true, false],
    'EnrollmentCustomizationPreview\\CreateEnrollmentCustomizationLdapV1Request' => [CreateEnrollmentCustomizationLdapV1Request::class, [7, ['name' => 'x']], 'POST', '/v1/enrollment-customization/7/ldap', 'one', GetEnrollmentCustomizationPanelLdapAuth::class, true, false],
    'EnrollmentCustomizationPreview\\CreateEnrollmentCustomizationSsoV1Request' => [CreateEnrollmentCustomizationSsoV1Request::class, [7, ['name' => 'x']], 'POST', '/v1/enrollment-customization/7/sso', 'one', GetEnrollmentCustomizationPanelSsoAuth::class, true, false],
    'EnrollmentCustomizationPreview\\CreateEnrollmentCustomizationTextV1Request' => [CreateEnrollmentCustomizationTextV1Request::class, [7, ['name' => 'x']], 'POST', '/v1/enrollment-customization/7/text', 'one', GetEnrollmentCustomizationPanelText::class, true, false],
    'EnrollmentCustomizationPreview\\DeleteEnrollmentCustomizationAllV1Request' => [DeleteEnrollmentCustomizationAllV1Request::class, [7, 7], 'DELETE', '/v1/enrollment-customization/7/all/7', 'none', null, false, false],
    'EnrollmentCustomizationPreview\\DeleteEnrollmentCustomizationLdapV1Request' => [DeleteEnrollmentCustomizationLdapV1Request::class, [7, 7], 'DELETE', '/v1/enrollment-customization/7/ldap/7', 'none', null, false, false],
    'EnrollmentCustomizationPreview\\DeleteEnrollmentCustomizationSsoV1Request' => [DeleteEnrollmentCustomizationSsoV1Request::class, [7, 7], 'DELETE', '/v1/enrollment-customization/7/sso/7', 'none', null, false, false],
    'EnrollmentCustomizationPreview\\DeleteEnrollmentCustomizationTextV1Request' => [DeleteEnrollmentCustomizationTextV1Request::class, [7, 7], 'DELETE', '/v1/enrollment-customization/7/text/7', 'none', null, false, false],
    'EnrollmentCustomizationPreview\\GetEnrollmentCustomizationAllByPanelIdV1Request' => [GetEnrollmentCustomizationAllByPanelIdV1Request::class, [7, 7], 'GET', '/v1/enrollment-customization/7/all/7', 'one', GetEnrollmentCustomizationPanel::class, false, false],
    'EnrollmentCustomizationPreview\\GetEnrollmentCustomizationAllV1Request' => [GetEnrollmentCustomizationAllV1Request::class, [7], 'GET', '/v1/enrollment-customization/7/all', 'one', EnrollmentCustomizationPanelList::class, false, false],
    'EnrollmentCustomizationPreview\\GetEnrollmentCustomizationLdapV1Request' => [GetEnrollmentCustomizationLdapV1Request::class, [7, 7], 'GET', '/v1/enrollment-customization/7/ldap/7', 'one', GetEnrollmentCustomizationPanelLdapAuth::class, false, false],
    'EnrollmentCustomizationPreview\\GetEnrollmentCustomizationSsoV1Request' => [GetEnrollmentCustomizationSsoV1Request::class, [7, 7], 'GET', '/v1/enrollment-customization/7/sso/7', 'one', GetEnrollmentCustomizationPanelSsoAuth::class, false, false],
    'EnrollmentCustomizationPreview\\GetEnrollmentCustomizationTextMarkdownV1Request' => [GetEnrollmentCustomizationTextMarkdownV1Request::class, [7, 7], 'GET', '/v1/enrollment-customization/7/text/7/markdown', 'one', Markdown::class, false, false],
    'EnrollmentCustomizationPreview\\GetEnrollmentCustomizationTextV1Request' => [GetEnrollmentCustomizationTextV1Request::class, [7, 7], 'GET', '/v1/enrollment-customization/7/text/7', 'one', GetEnrollmentCustomizationPanelText::class, false, false],
    'EnrollmentCustomizationPreview\\ParseEnrollmentCustomizationMarkdownV1Request' => [ParseEnrollmentCustomizationMarkdownV1Request::class, [['name' => 'x']], 'POST', '/v1/enrollment-customization/parse-markdown', 'one', Markdown::class, true, false],
    'EnrollmentCustomizationPreview\\ReplaceEnrollmentCustomizationLdapV1Request' => [ReplaceEnrollmentCustomizationLdapV1Request::class, [7, 7, ['name' => 'x']], 'PUT', '/v1/enrollment-customization/7/ldap/7', 'one', GetEnrollmentCustomizationPanelLdapAuth::class, true, false],
    'EnrollmentCustomizationPreview\\ReplaceEnrollmentCustomizationSsoV1Request' => [ReplaceEnrollmentCustomizationSsoV1Request::class, [7, 7, ['name' => 'x']], 'PUT', '/v1/enrollment-customization/7/sso/7', 'one', GetEnrollmentCustomizationPanelSsoAuth::class, true, false],
    'EnrollmentCustomizationPreview\\ReplaceEnrollmentCustomizationTextV1Request' => [ReplaceEnrollmentCustomizationTextV1Request::class, [7, 7, ['name' => 'x']], 'PUT', '/v1/enrollment-customization/7/text/7', 'one', GetEnrollmentCustomizationPanelText::class, true, false],
    'Groups\\DeleteGroupV1Request' => [DeleteGroupV1Request::class, [7], 'DELETE', '/v1/groups/7', 'none', null, false, false],
    'Groups\\DeleteGroupV2Request' => [DeleteGroupV2Request::class, [7], 'DELETE', '/v2/groups/7', 'none', null, false, false],
    'Groups\\GetGroupV1Request' => [GetGroupV1Request::class, [7], 'GET', '/v1/groups/7', 'one', GroupWithCriteriaDtoV1::class, false, false],
    'Groups\\GetGroupV2Request' => [GetGroupV2Request::class, [7], 'GET', '/v2/groups/7', 'one', GroupWithCriteriaDtoV1::class, false, false],
    'Groups\\GetGroupsV1Request' => [GetGroupsV1Request::class, [], 'GET', '/v1/groups', 'list', GroupDtoV1::class, false, true],
    'Groups\\GetGroupsV2Request' => [GetGroupsV2Request::class, [], 'GET', '/v2/groups', 'list', GroupDtoV1::class, false, true],
    'Groups\\UpdateGroupV1Request' => [UpdateGroupV1Request::class, [7, ['name' => 'x']], 'PATCH', '/v1/groups/7', 'none', null, true, false],
    'Groups\\UpdateGroupV2Request' => [UpdateGroupV2Request::class, [7, ['name' => 'x']], 'PATCH', '/v2/groups/7', 'none', null, true, false],
    'GsxConnection\\CreateGsxConnectionHistoryV1Request' => [CreateGsxConnectionHistoryV1Request::class, [['name' => 'x']], 'POST', '/v1/gsx-connection/history', 'one', HrefResponse::class, true, false],
    'GsxConnection\\GetGsxConnectionHistoryV1Request' => [GetGsxConnectionHistoryV1Request::class, [], 'GET', '/v1/gsx-connection/history', 'list', ObjectHistoryV1::class, false, true],
    'GsxConnection\\GetGsxConnectionV1Request' => [GetGsxConnectionV1Request::class, [], 'GET', '/v1/gsx-connection', 'one', GsxConnection::class, false, false],
    'GsxConnection\\ReplaceGsxConnectionV1Request' => [ReplaceGsxConnectionV1Request::class, [['name' => 'x']], 'PUT', '/v1/gsx-connection', 'one', GsxConnection::class, true, false],
    'GsxConnection\\TestGsxConnectionV1Request' => [TestGsxConnectionV1Request::class, [], 'POST', '/v1/gsx-connection/test', 'none', null, false, false],
    'GsxConnection\\UpdateGsxConnectionV1Request' => [UpdateGsxConnectionV1Request::class, [['name' => 'x']], 'PATCH', '/v1/gsx-connection', 'one', GsxConnection::class, true, false],
    'HealthCheck\\GetHealthCheckV1Request' => [GetHealthCheckV1Request::class, [], 'GET', '/v1/health-check', 'none', null, false, false],
    'HealthCheck\\GetHealthStatusV1Request' => [GetHealthStatusV1Request::class, [], 'GET', '/v1/health-status', 'one', HealthStatus::class, false, false],
    'Icon\\CreateIconV1Request' => [CreateIconV1Request::class, ['contents'], 'POST', '/v1/icon', 'one', IconResponse::class, true, false],
    'Icon\\GetIconDownloadV1Request' => [GetIconDownloadV1Request::class, [7], 'GET', '/v1/icon/download/7', 'text', null, false, false],
    'Icon\\GetIconV1Request' => [GetIconV1Request::class, [7], 'GET', '/v1/icon/7', 'one', IconResponse::class, false, false],
    'ImpactAlertNotificationSettings\\GetImpactAlertNotificationSettingsV1Request' => [GetImpactAlertNotificationSettingsV1Request::class, [], 'GET', '/v1/impact-alert-notification-settings', 'one', ImpactAlertNotificationSettingsV1::class, false, false],
    'ImpactAlertNotificationSettings\\ReplaceImpactAlertNotificationSettingsV1Request' => [ReplaceImpactAlertNotificationSettingsV1Request::class, [['name' => 'x']], 'PUT', '/v1/impact-alert-notification-settings', 'none', null, true, false],
    'InventoryInformation\\GetInventoryInformationV1Request' => [GetInventoryInformationV1Request::class, [], 'GET', '/v1/inventory-information', 'one', InventoryInformation::class, false, false],
    'InventoryPreload\\CreateInventoryPreloadCsvV2Request' => [CreateInventoryPreloadCsvV2Request::class, ['contents'], 'POST', '/v2/inventory-preload/csv', 'list', HrefResponse::class, true, false],
    'InventoryPreload\\CreateInventoryPreloadHistoryV2Request' => [CreateInventoryPreloadHistoryV2Request::class, [['name' => 'x']], 'POST', '/v2/inventory-preload/history', 'one', HrefResponse::class, true, false],
    'InventoryPreload\\CreateInventoryPreloadRecordsV2Request' => [CreateInventoryPreloadRecordsV2Request::class, [['name' => 'x']], 'POST', '/v2/inventory-preload/records', 'one', HrefResponse::class, true, false],
    'InventoryPreload\\DeleteInventoryPreloadRecordV2Request' => [DeleteInventoryPreloadRecordV2Request::class, [7], 'DELETE', '/v2/inventory-preload/records/7', 'none', null, false, false],
    'InventoryPreload\\DeleteInventoryPreloadRecordsAllV2Request' => [DeleteInventoryPreloadRecordsAllV2Request::class, [], 'POST', '/v2/inventory-preload/records/delete-all', 'none', null, false, false],
    'InventoryPreload\\ExportInventoryPreloadV2Request' => [ExportInventoryPreloadV2Request::class, [], 'POST', '/v2/inventory-preload/export', 'text', null, true, false],
    'InventoryPreload\\GetInventoryPreloadCsvTemplateV2Request' => [GetInventoryPreloadCsvTemplateV2Request::class, [], 'GET', '/v2/inventory-preload/csv-template', 'text', null, false, false],
    'InventoryPreload\\GetInventoryPreloadCsvV2Request' => [GetInventoryPreloadCsvV2Request::class, [], 'GET', '/v2/inventory-preload/csv', 'text', null, false, false],
    'InventoryPreload\\GetInventoryPreloadEaColumnsV2Request' => [GetInventoryPreloadEaColumnsV2Request::class, [], 'GET', '/v2/inventory-preload/ea-columns', 'list', InventoryPreloadExtensionAttributeColumn::class, false, false],
    'InventoryPreload\\GetInventoryPreloadHistoryV2Request' => [GetInventoryPreloadHistoryV2Request::class, [], 'GET', '/v2/inventory-preload/history', 'list', ObjectHistory::class, false, true],
    'InventoryPreload\\GetInventoryPreloadRecordV2Request' => [GetInventoryPreloadRecordV2Request::class, [7], 'GET', '/v2/inventory-preload/records/7', 'one', InventoryPreloadRecordV2::class, false, false],
    'InventoryPreload\\GetInventoryPreloadRecordsV2Request' => [GetInventoryPreloadRecordsV2Request::class, [], 'GET', '/v2/inventory-preload/records', 'list', InventoryPreloadRecordV2::class, false, true],
    'InventoryPreload\\ReplaceInventoryPreloadRecordV2Request' => [ReplaceInventoryPreloadRecordV2Request::class, [7, ['name' => 'x']], 'PUT', '/v2/inventory-preload/records/7', 'one', InventoryPreloadRecordV2::class, true, false],
    'InventoryPreload\\ValidateInventoryPreloadCsvV2Request' => [ValidateInventoryPreloadCsvV2Request::class, ['contents'], 'POST', '/v2/inventory-preload/csv-validate', 'one', InventoryPreloadCsvValidationSuccess::class, true, false],
    'JamfCloudDistributionService\\CreateJcdsFilesV1Request' => [CreateJcdsFilesV1Request::class, [], 'POST', '/v1/jcds/files', 'one', Credentials::class, false, false],
    'JamfCloudDistributionService\\DeleteJcdsFileV1Request' => [DeleteJcdsFileV1Request::class, ['abc'], 'DELETE', '/v1/jcds/files/abc', 'none', null, false, false],
    'JamfCloudDistributionService\\GetJcdsFileV1Request' => [GetJcdsFileV1Request::class, ['abc'], 'GET', '/v1/jcds/files/abc', 'one', DownloadUrl::class, false, false],
    'JamfCloudDistributionService\\GetJcdsFilesV1Request' => [GetJcdsFilesV1Request::class, [], 'GET', '/v1/jcds/files', 'list', FileData::class, false, false],
    'JamfCloudDistributionService\\RefreshJcdsInventoryV1Request' => [RefreshJcdsInventoryV1Request::class, [], 'POST', '/v1/jcds/refresh-inventory', 'none', null, false, false],
    'JamfCloudDistributionService\\RenewJcdsCredentialsV1Request' => [RenewJcdsCredentialsV1Request::class, [], 'POST', '/v1/jcds/renew-credentials', 'one', Credentials::class, false, false],
    'JamfConnect\\CreateJamfConnectHistoryV1Request' => [CreateJamfConnectHistoryV1Request::class, [['name' => 'x']], 'POST', '/v1/jamf-connect/history', 'one', HrefResponse::class, true, false],
    'JamfConnect\\GetJamfConnectConfigProfilesV1Request' => [GetJamfConnectConfigProfilesV1Request::class, [], 'GET', '/v1/jamf-connect/config-profiles', 'list', LinkedConnectProfile::class, false, true],
    'JamfConnect\\GetJamfConnectDeploymentTasksV1Request' => [GetJamfConnectDeploymentTasksV1Request::class, [7], 'GET', '/v1/jamf-connect/deployments/7/tasks', 'list', DeploymentTask::class, false, true],
    'JamfConnect\\GetJamfConnectHistoryV1Request' => [GetJamfConnectHistoryV1Request::class, [], 'GET', '/v1/jamf-connect/history', 'list', ObjectHistory::class, false, true],
    'JamfConnect\\GetJamfConnectV1Request' => [GetJamfConnectV1Request::class, [], 'GET', '/v1/jamf-connect', 'none', null, false, false],
    'JamfConnect\\ReplaceJamfConnectConfigProfileV1Request' => [ReplaceJamfConnectConfigProfileV1Request::class, [7], 'PUT', '/v1/jamf-connect/config-profiles/7', 'one', LinkedConnectProfile::class, true, false],
    'JamfConnect\\RetryJamfConnectDeploymentTasksV1Request' => [RetryJamfConnectDeploymentTasksV1Request::class, [7, ['name' => 'x']], 'POST', '/v1/jamf-connect/deployments/7/tasks/retry', 'none', null, true, false],
    'JamfManagementFramework\\RedeployJamfManagementFrameworkV1Request' => [RedeployJamfManagementFrameworkV1Request::class, [7], 'POST', '/v1/jamf-management-framework/redeploy/7', 'one', RedeployJamfManagementFrameworkResponse::class, false, false],
    'JamfPackage\\GetJamfPackageV1Request' => [GetJamfPackageV1Request::class, [], 'GET', '/v1/jamf-package', 'list', JamfPackageResponse::class, false, false],
    'JamfPackage\\GetJamfPackageV2Request' => [GetJamfPackageV2Request::class, [], 'GET', '/v2/jamf-package', 'one', JamfApplicationResponse::class, false, false],
    'JamfProAccountPreferences\\GetAccountPreferencesV2Request' => [GetAccountPreferencesV2Request::class, [], 'GET', '/v2/account-preferences', 'one', AccountPreferencesV5::class, false, false],
    'JamfProAccountPreferences\\GetAccountPreferencesV3Request' => [GetAccountPreferencesV3Request::class, [], 'GET', '/v3/account-preferences', 'one', AccountPreferencesV6::class, false, false],
    'JamfProAccountPreferences\\UpdateAccountPreferencesV2Request' => [UpdateAccountPreferencesV2Request::class, [], 'PATCH', '/v2/account-preferences', 'one', AccountPreferencesV5::class, true, false],
    'JamfProAccountPreferences\\UpdateAccountPreferencesV3Request' => [UpdateAccountPreferencesV3Request::class, [], 'PATCH', '/v3/account-preferences', 'none', null, true, false],
    'JamfProInformation\\GetJamfProInformationV2Request' => [GetJamfProInformationV2Request::class, [], 'GET', '/v2/jamf-pro-information', 'one', JamfProInformationV2::class, false, false],
    'JamfProInitialization\\InitializeSystemDatabaseConnectionV1Request' => [InitializeSystemDatabaseConnectionV1Request::class, [['name' => 'x']], 'POST', '/v1/system/initialize-database-connection', 'none', null, true, false],
    'JamfProInitialization\\InitializeSystemFedrampV1Request' => [InitializeSystemFedrampV1Request::class, [['name' => 'x']], 'POST', '/v1/system/fedramp-initialize', 'none', null, true, false],
    'JamfProInitialization\\InitializeSystemPlatformV1Request' => [InitializeSystemPlatformV1Request::class, [['name' => 'x']], 'POST', '/v1/system/platform-initialize', 'none', null, true, false],
    'JamfProInitialization\\InitializeSystemV1Request' => [InitializeSystemV1Request::class, [['name' => 'x']], 'POST', '/v1/system/initialize', 'none', null, true, false],
    'JamfProNotifications\\DeleteNotificationV1Request' => [DeleteNotificationV1Request::class, ['abc', 7], 'DELETE', '/v1/notifications/abc/7', 'none', null, false, false],
    'JamfProNotifications\\DeleteNotificationsV1Request' => [DeleteNotificationsV1Request::class, [], 'DELETE', '/v1/notifications', 'none', null, false, false],
    'JamfProNotifications\\GetNotificationsV1Request' => [GetNotificationsV1Request::class, [], 'GET', '/v1/notifications', 'list', NotificationV1::class, false, false],
    'JamfProServerUrlPreview\\CreateJamfProServerUrlHistoryV1Request' => [CreateJamfProServerUrlHistoryV1Request::class, [['name' => 'x']], 'POST', '/v1/jamf-pro-server-url/history', 'one', ObjectHistory::class, true, false],
    'JamfProServerUrlPreview\\GetJamfProServerUrlHistoryV1Request' => [GetJamfProServerUrlHistoryV1Request::class, [], 'GET', '/v1/jamf-pro-server-url/history', 'list', ObjectHistory::class, false, true],
    'JamfProServerUrlPreview\\GetJamfProServerUrlV1Request' => [GetJamfProServerUrlV1Request::class, [], 'GET', '/v1/jamf-pro-server-url', 'one', JamfProServerUrl::class, false, false],
    'JamfProServerUrlPreview\\ReplaceJamfProServerUrlV1Request' => [ReplaceJamfProServerUrlV1Request::class, [['name' => 'x']], 'PUT', '/v1/jamf-pro-server-url', 'one', JamfProServerUrl::class, true, false],
    'JamfProUserAccountSettings\\DeleteUserPreferenceV1Request' => [DeleteUserPreferenceV1Request::class, [7], 'DELETE', '/v1/user/preferences/7', 'none', null, false, false],
    'JamfProUserAccountSettings\\GetUserPreferenceV1Request' => [GetUserPreferenceV1Request::class, [7], 'GET', '/v1/user/preferences/7', 'raw', null, false, false],
    'JamfProUserAccountSettings\\GetUserPreferencesSettingsV1Request' => [GetUserPreferencesSettingsV1Request::class, [7], 'GET', '/v1/user/preferences/settings/7', 'one', UserPreferencesSettings::class, false, false],
    'JamfProUserAccountSettings\\ReplaceUserPreferenceV1Request' => [ReplaceUserPreferenceV1Request::class, [7], 'PUT', '/v1/user/preferences/7', 'raw', null, true, false],
    'JamfProVersion\\GetJamfProVersionV1Request' => [GetJamfProVersionV1Request::class, [], 'GET', '/v1/jamf-pro-version', 'one', JamfProVersion::class, false, false],
    'JamfProtect\\CreateJamfProtectHistoryV1Request' => [CreateJamfProtectHistoryV1Request::class, [['name' => 'x']], 'POST', '/v1/jamf-protect/history', 'one', HrefResponse::class, true, false],
    'JamfProtect\\CreateJamfProtectRegisterV1Request' => [CreateJamfProtectRegisterV1Request::class, [['name' => 'x']], 'POST', '/v1/jamf-protect/register', 'one', ProtectSettingsResponse::class, true, false],
    'JamfProtect\\DeleteJamfProtectV1Request' => [DeleteJamfProtectV1Request::class, [], 'DELETE', '/v1/jamf-protect', 'none', null, false, false],
    'JamfProtect\\GetJamfProtectDeploymentTasksV1Request' => [GetJamfProtectDeploymentTasksV1Request::class, [7], 'GET', '/v1/jamf-protect/deployments/7/tasks', 'list', DeploymentTask::class, false, true],
    'JamfProtect\\GetJamfProtectHistoryV1Request' => [GetJamfProtectHistoryV1Request::class, [], 'GET', '/v1/jamf-protect/history', 'list', ObjectHistory::class, false, true],
    'JamfProtect\\GetJamfProtectPlansV1Request' => [GetJamfProtectPlansV1Request::class, [], 'GET', '/v1/jamf-protect/plans', 'list', JamfProtectPlan::class, false, true],
    'JamfProtect\\GetJamfProtectV1Request' => [GetJamfProtectV1Request::class, [], 'GET', '/v1/jamf-protect', 'one', ProtectSettingsResponse::class, false, false],
    'JamfProtect\\ReplaceJamfProtectV1Request' => [ReplaceJamfProtectV1Request::class, [['name' => 'x']], 'PUT', '/v1/jamf-protect', 'one', ProtectSettingsResponse::class, true, false],
    'JamfProtect\\RetryJamfProtectDeploymentTasksV1Request' => [RetryJamfProtectDeploymentTasksV1Request::class, [7, ['name' => 'x']], 'POST', '/v1/jamf-protect/deployments/7/tasks/retry', 'none', null, true, false],
    'JamfProtect\\SyncJamfProtectPlansV1Request' => [SyncJamfProtectPlansV1Request::class, [], 'POST', '/v1/jamf-protect/plans/sync', 'none', null, false, false],
    'JamfRemoteAssist\\ExportJamfRemoteAssistSessionV2Request' => [ExportJamfRemoteAssistSessionV2Request::class, [], 'POST', '/v2/jamf-remote-assist/session/export', 'text', null, true, false],
    'JamfRemoteAssist\\GetJamfRemoteAssistSessionByIdV1Request' => [GetJamfRemoteAssistSessionByIdV1Request::class, [7], 'GET', '/v1/jamf-remote-assist/session/7', 'one', SessionHistoryItemWithDetails::class, false, false],
    'JamfRemoteAssist\\GetJamfRemoteAssistSessionByIdV2Request' => [GetJamfRemoteAssistSessionByIdV2Request::class, [7], 'GET', '/v2/jamf-remote-assist/session/7', 'one', SessionHistoryItemWithDetails::class, false, false],
    'JamfRemoteAssist\\GetJamfRemoteAssistSessionV1Request' => [GetJamfRemoteAssistSessionV1Request::class, [], 'GET', '/v1/jamf-remote-assist/session', 'list', SessionHistoryItem::class, false, false],
    'JamfRemoteAssist\\GetJamfRemoteAssistSessionV2Request' => [GetJamfRemoteAssistSessionV2Request::class, [], 'GET', '/v2/jamf-remote-assist/session', 'list', SessionHistoryItem::class, false, true],
    'LastLogin\\GetLastLoginV1Request' => [GetLastLoginV1Request::class, [], 'GET', '/v1/last-login', 'one', LastLoginResponse::class, false, false],
    'Ldap\\GetLdapGroupsRequest' => [GetLdapGroupsRequest::class, [], 'GET', '/ldap/groups', 'list', LdapGroup::class, false, false],
    'Ldap\\GetLdapGroupsV1Request' => [GetLdapGroupsV1Request::class, [], 'GET', '/v1/ldap/groups', 'list', LdapGroup::class, false, false],
    'Ldap\\GetLdapLdapServersV1Request' => [GetLdapLdapServersV1Request::class, [], 'GET', '/v1/ldap/ldap-servers', 'list', LdapServer::class, false, false],
    'Ldap\\GetLdapServersRequest' => [GetLdapServersRequest::class, [], 'GET', '/ldap/servers', 'list', LdapServer::class, false, false],
    'Ldap\\GetLdapServersV1Request' => [GetLdapServersV1Request::class, [], 'GET', '/v1/ldap/servers', 'list', LdapServer::class, false, false],
    'LocalAdminPassword\\GetLocalAdminPasswordAccountAuditByGuidV2Request' => [GetLocalAdminPasswordAccountAuditByGuidV2Request::class, [7, 'abc', 'abc'], 'GET', '/v2/local-admin-password/7/account/abc/abc/audit', 'list', LapsPasswordAndAuditsV2::class, false, false],
    'LocalAdminPassword\\GetLocalAdminPasswordAccountAuditV2Request' => [GetLocalAdminPasswordAccountAuditV2Request::class, [7, 'abc'], 'GET', '/v2/local-admin-password/7/account/abc/audit', 'list', LapsPasswordAndAuditsV2::class, false, false],
    'LocalAdminPassword\\GetLocalAdminPasswordAccountHistoryByGuidV2Request' => [GetLocalAdminPasswordAccountHistoryByGuidV2Request::class, [7, 'abc', 'abc'], 'GET', '/v2/local-admin-password/7/account/abc/abc/history', 'list', LapsHistory::class, false, false],
    'LocalAdminPassword\\GetLocalAdminPasswordAccountHistoryV2Request' => [GetLocalAdminPasswordAccountHistoryV2Request::class, [7, 'abc'], 'GET', '/v2/local-admin-password/7/account/abc/history', 'list', LapsHistory::class, false, false],
    'LocalAdminPassword\\GetLocalAdminPasswordAccountPasswordByGuidV2Request' => [GetLocalAdminPasswordAccountPasswordByGuidV2Request::class, [7, 'abc', 'abc'], 'GET', '/v2/local-admin-password/7/account/abc/abc/password', 'one', LapsPasswordResponseV2::class, false, false],
    'LocalAdminPassword\\GetLocalAdminPasswordAccountPasswordV2Request' => [GetLocalAdminPasswordAccountPasswordV2Request::class, [7, 'abc'], 'GET', '/v2/local-admin-password/7/account/abc/password', 'one', LapsPasswordResponseV2::class, false, false],
    'LocalAdminPassword\\GetLocalAdminPasswordAccountsV2Request' => [GetLocalAdminPasswordAccountsV2Request::class, [7], 'GET', '/v2/local-admin-password/7/accounts', 'list', LapsUserV2::class, false, false],
    'LocalAdminPassword\\GetLocalAdminPasswordHistoryV2Request' => [GetLocalAdminPasswordHistoryV2Request::class, [7], 'GET', '/v2/local-admin-password/7/history', 'list', LapsAccountManagementHistory::class, false, false],
    'LocalAdminPassword\\GetLocalAdminPasswordPendingRotationsV2Request' => [GetLocalAdminPasswordPendingRotationsV2Request::class, [], 'GET', '/v2/local-admin-password/pending-rotations', 'list', LapsPendingRotation::class, false, false],
    'LocalAdminPassword\\GetLocalAdminPasswordSettingsV2Request' => [GetLocalAdminPasswordSettingsV2Request::class, [], 'GET', '/v2/local-admin-password/settings', 'one', LapsSettingsResponseV2::class, false, false],
    'LocalAdminPassword\\ReplaceLocalAdminPasswordSetPasswordV2Request' => [ReplaceLocalAdminPasswordSetPasswordV2Request::class, [7, ['name' => 'x']], 'PUT', '/v2/local-admin-password/7/set-password', 'one', LapsUserPasswordResponseV2::class, true, false],
    'LocalAdminPassword\\ReplaceLocalAdminPasswordSettingsV2Request' => [ReplaceLocalAdminPasswordSettingsV2Request::class, [['name' => 'x']], 'PUT', '/v2/local-admin-password/settings', 'one', LapsSettingsResponseV2::class, true, false],
    'LocalesPreview\\GetLocalesV1Request' => [GetLocalesV1Request::class, [], 'GET', '/v1/locales', 'list', Locale::class, false, false],
    'LogFlushing\\CreateLogFlushingTaskV1Request' => [CreateLogFlushingTaskV1Request::class, [], 'POST', '/v1/log-flushing/task', 'one', HrefResponse::class, true, false],
    'LogFlushing\\DeleteLogFlushingTaskV1Request' => [DeleteLogFlushingTaskV1Request::class, [7], 'DELETE', '/v1/log-flushing/task/7', 'none', null, false, false],
    'LogFlushing\\GetLogFlushingTaskByIdV1Request' => [GetLogFlushingTaskByIdV1Request::class, [7], 'GET', '/v1/log-flushing/task/7', 'one', LogFlushingTaskV1::class, false, false],
    'LogFlushing\\GetLogFlushingTaskV1Request' => [GetLogFlushingTaskV1Request::class, [], 'GET', '/v1/log-flushing/task', 'list', LogFlushingTaskV1::class, false, false],
    'LogFlushing\\GetLogFlushingV1Request' => [GetLogFlushingV1Request::class, [], 'GET', '/v1/log-flushing', 'one', LogFlushingV1::class, false, false],
    'LoginCustomization\\GetLoginCustomizationV1Request' => [GetLoginCustomizationV1Request::class, [], 'GET', '/v1/login-customization', 'one', LoginContent::class, false, false],
    'LoginCustomization\\ReplaceLoginCustomizationV1Request' => [ReplaceLoginCustomizationV1Request::class, [['name' => 'x']], 'PUT', '/v1/login-customization', 'one', LoginContentPut::class, true, false],
    'M2m\\GetM2mTenantIdV1Request' => [GetM2mTenantIdV1Request::class, [], 'GET', '/v1/m2m/tenant-id', 'one', M2mTenantIdInfo::class, false, false],
    'MacosManagedSoftwareUpdates\\GetMacosManagedSoftwareUpdatesAvailableUpdatesV1Request' => [GetMacosManagedSoftwareUpdatesAvailableUpdatesV1Request::class, [], 'GET', '/v1/macos-managed-software-updates/available-updates', 'one', AvailableUpdates::class, false, false],
    'MacosManagedSoftwareUpdates\\SendMacosManagedSoftwareUpdatesUpdatesV1Request' => [SendMacosManagedSoftwareUpdatesUpdatesV1Request::class, [['name' => 'x']], 'POST', '/v1/macos-managed-software-updates/send-updates', 'one', MacOsManagedSoftwareUpdateResponse::class, true, false],
    'ManagedSoftwareUpdates\\AbandonManagedSoftwareUpdatesPlansFeatureToggleV1Request' => [AbandonManagedSoftwareUpdatesPlansFeatureToggleV1Request::class, [], 'POST', '/v1/managed-software-updates/plans/feature-toggle/abandon', 'none', null, false, false],
    'ManagedSoftwareUpdates\\CreateManagedSoftwareUpdatesPlansGroupV1Request' => [CreateManagedSoftwareUpdatesPlansGroupV1Request::class, [['name' => 'x']], 'POST', '/v1/managed-software-updates/plans/group', 'one', ManagedSoftwareUpdatePlanPostResponse::class, true, false],
    'ManagedSoftwareUpdates\\CreateManagedSoftwareUpdatesPlansV1Request' => [CreateManagedSoftwareUpdatesPlansV1Request::class, [['name' => 'x']], 'POST', '/v1/managed-software-updates/plans', 'one', ManagedSoftwareUpdatePlanPostResponse::class, true, false],
    'ManagedSoftwareUpdates\\GetManagedSoftwareUpdatesAvailableUpdatesV1Request' => [GetManagedSoftwareUpdatesAvailableUpdatesV1Request::class, [], 'GET', '/v1/managed-software-updates/available-updates', 'one', AvailableOsUpdates::class, false, false],
    'ManagedSoftwareUpdates\\GetManagedSoftwareUpdatesPlanDeclarationsV1Request' => [GetManagedSoftwareUpdatesPlanDeclarationsV1Request::class, [7], 'GET', '/v1/managed-software-updates/plans/7/declarations', 'one', DssDeclarations::class, false, false],
    'ManagedSoftwareUpdates\\GetManagedSoftwareUpdatesPlanEventsV1Request' => [GetManagedSoftwareUpdatesPlanEventsV1Request::class, [7], 'GET', '/v1/managed-software-updates/plans/7/events', 'one', ManagedSoftwareUpdatePlanEventStore::class, false, false],
    'ManagedSoftwareUpdates\\GetManagedSoftwareUpdatesPlanV1Request' => [GetManagedSoftwareUpdatesPlanV1Request::class, [7], 'GET', '/v1/managed-software-updates/plans/7', 'one', ManagedSoftwareUpdatePlan::class, false, false],
    'ManagedSoftwareUpdates\\GetManagedSoftwareUpdatesPlansFeatureToggleStatusV1Request' => [GetManagedSoftwareUpdatesPlansFeatureToggleStatusV1Request::class, [], 'GET', '/v1/managed-software-updates/plans/feature-toggle/status', 'one', ManagedSoftwareUpdatePlanToggleStatusWrapper::class, false, false],
    'ManagedSoftwareUpdates\\GetManagedSoftwareUpdatesPlansFeatureToggleV1Request' => [GetManagedSoftwareUpdatesPlansFeatureToggleV1Request::class, [], 'GET', '/v1/managed-software-updates/plans/feature-toggle', 'one', ManagedSoftwareUpdatePlanToggle::class, false, false],
    'ManagedSoftwareUpdates\\GetManagedSoftwareUpdatesPlansGroupV1Request' => [GetManagedSoftwareUpdatesPlansGroupV1Request::class, [7], 'GET', '/v1/managed-software-updates/plans/group/7', 'list', ManagedSoftwareUpdatePlan::class, false, false],
    'ManagedSoftwareUpdates\\GetManagedSoftwareUpdatesPlansV1Request' => [GetManagedSoftwareUpdatesPlansV1Request::class, [], 'GET', '/v1/managed-software-updates/plans', 'list', ManagedSoftwareUpdatePlan::class, false, true],
    'ManagedSoftwareUpdates\\GetManagedSoftwareUpdatesUpdateStatusesComputerGroupV1Request' => [GetManagedSoftwareUpdatesUpdateStatusesComputerGroupV1Request::class, [7], 'GET', '/v1/managed-software-updates/update-statuses/computer-groups/7', 'list', ManagedSoftwareUpdateStatus::class, false, false],
    'ManagedSoftwareUpdates\\GetManagedSoftwareUpdatesUpdateStatusesComputerV1Request' => [GetManagedSoftwareUpdatesUpdateStatusesComputerV1Request::class, [7], 'GET', '/v1/managed-software-updates/update-statuses/computers/7', 'list', ManagedSoftwareUpdateStatus::class, false, false],
    'ManagedSoftwareUpdates\\GetManagedSoftwareUpdatesUpdateStatusesMobileDeviceGroupV1Request' => [GetManagedSoftwareUpdatesUpdateStatusesMobileDeviceGroupV1Request::class, [7], 'GET', '/v1/managed-software-updates/update-statuses/mobile-device-groups/7', 'list', ManagedSoftwareUpdateStatus::class, false, false],
    'ManagedSoftwareUpdates\\GetManagedSoftwareUpdatesUpdateStatusesMobileDeviceV1Request' => [GetManagedSoftwareUpdatesUpdateStatusesMobileDeviceV1Request::class, [7], 'GET', '/v1/managed-software-updates/update-statuses/mobile-devices/7', 'list', ManagedSoftwareUpdateStatus::class, false, false],
    'ManagedSoftwareUpdates\\GetManagedSoftwareUpdatesUpdateStatusesV1Request' => [GetManagedSoftwareUpdatesUpdateStatusesV1Request::class, [], 'GET', '/v1/managed-software-updates/update-statuses', 'list', ManagedSoftwareUpdateStatus::class, false, false],
    'ManagedSoftwareUpdates\\ReplaceManagedSoftwareUpdatesPlansFeatureToggleV1Request' => [ReplaceManagedSoftwareUpdatesPlansFeatureToggleV1Request::class, [['name' => 'x']], 'PUT', '/v1/managed-software-updates/plans/feature-toggle', 'one', ManagedSoftwareUpdatePlanToggle::class, true, false],
    'Mdm\\CreateMdmBlankPushV2Request' => [CreateMdmBlankPushV2Request::class, [['name' => 'x']], 'POST', '/v2/mdm/blank-push', 'one', BlankPushResponse::class, true, false],
    'Mdm\\CreateMdmCommandsV2Request' => [CreateMdmCommandsV2Request::class, [], 'POST', '/v2/mdm/commands', 'list', HrefResponse::class, true, false],
    'Mdm\\DeployPackageV1Request' => [DeployPackageV1Request::class, [['name' => 'x']], 'POST', '/v1/deploy-package', 'one', VerbosePackageDeploymentResponse::class, true, false],
    'Mdm\\GetMdmCommandsV1Request' => [GetMdmCommandsV1Request::class, [], 'GET', '/v1/mdm/commands', 'list', MdmCommand::class, false, false],
    'Mdm\\GetMdmCommandsV2Request' => [GetMdmCommandsV2Request::class, [], 'GET', '/v2/mdm/commands', 'list', MdmCommand::class, false, true],
    'Mdm\\RenewMdmProfileV1Request' => [RenewMdmProfileV1Request::class, [['name' => 'x']], 'POST', '/v1/mdm/renew-profile', 'one', RenewMdmProfileResponse::class, true, false],
    'MdmRenewal\\DeleteMdmRenewalRenewalStrategyV1Request' => [DeleteMdmRenewalRenewalStrategyV1Request::class, [7], 'DELETE', '/v1/mdm-renewal/renewal-strategies/7', 'none', null, false, false],
    'MdmRenewal\\GetMdmRenewalDeviceCommonDetailV1Request' => [GetMdmRenewalDeviceCommonDetailV1Request::class, [7], 'GET', '/v1/mdm-renewal/device-common-details/7', 'one', DeviceCommonDetails::class, false, false],
    'MdmRenewal\\GetMdmRenewalRenewalStrategyV1Request' => [GetMdmRenewalRenewalStrategyV1Request::class, [7], 'GET', '/v1/mdm-renewal/renewal-strategies/7', 'list', MdmRenewalErrorStrategiesResponse::class, false, false],
    'MdmRenewal\\UpdateMdmRenewalDeviceCommonDetailsV1Request' => [UpdateMdmRenewalDeviceCommonDetailsV1Request::class, [['name' => 'x']], 'PATCH', '/v1/mdm-renewal/device-common-details', 'none', null, true, false],
    'MobileDeviceApps\\ReinstallMobileDeviceAppsAppConfigV1Request' => [ReinstallMobileDeviceAppsAppConfigV1Request::class, [['name' => 'x']], 'POST', '/v1/mobile-device-apps/reinstall-app-config', 'none', null, true, false],
    'MobileDeviceEnrollmentProfile\\GetMobileDeviceEnrollmentProfileDownloadProfileV1Request' => [GetMobileDeviceEnrollmentProfileDownloadProfileV1Request::class, [7], 'GET', '/v1/mobile-device-enrollment-profile/7/download-profile', 'text', null, false, false],
    'MobileDeviceExtensionAttributes\\CreateMobileDeviceExtensionAttributeHistoryV1Request' => [CreateMobileDeviceExtensionAttributeHistoryV1Request::class, [7, ['name' => 'x']], 'POST', '/v1/mobile-device-extension-attributes/7/history', 'one', ObjectHistory::class, true, false],
    'MobileDeviceExtensionAttributes\\CreateMobileDeviceExtensionAttributesV1Request' => [CreateMobileDeviceExtensionAttributesV1Request::class, [['name' => 'x']], 'POST', '/v1/mobile-device-extension-attributes', 'one', HrefResponse::class, true, false],
    'MobileDeviceExtensionAttributes\\DeleteMobileDeviceExtensionAttributeV1Request' => [DeleteMobileDeviceExtensionAttributeV1Request::class, [7], 'DELETE', '/v1/mobile-device-extension-attributes/7', 'none', null, false, false],
    'MobileDeviceExtensionAttributes\\GetMobileDeviceExtensionAttributeDataDependencyV1Request' => [GetMobileDeviceExtensionAttributeDataDependencyV1Request::class, [7], 'GET', '/v1/mobile-device-extension-attributes/7/data-dependency', 'list', null, false, false],
    'MobileDeviceExtensionAttributes\\GetMobileDeviceExtensionAttributeHistoryV1Request' => [GetMobileDeviceExtensionAttributeHistoryV1Request::class, [7], 'GET', '/v1/mobile-device-extension-attributes/7/history', 'list', ObjectHistory::class, false, true],
    'MobileDeviceExtensionAttributes\\GetMobileDeviceExtensionAttributeV1Request' => [GetMobileDeviceExtensionAttributeV1Request::class, [7], 'GET', '/v1/mobile-device-extension-attributes/7', 'one', MobileDeviceExtensionAttributes::class, false, false],
    'MobileDeviceExtensionAttributes\\GetMobileDeviceExtensionAttributesV1Request' => [GetMobileDeviceExtensionAttributesV1Request::class, [], 'GET', '/v1/mobile-device-extension-attributes', 'list', MobileDeviceExtensionAttributes::class, false, true],
    'MobileDeviceExtensionAttributes\\ReplaceMobileDeviceExtensionAttributeV1Request' => [ReplaceMobileDeviceExtensionAttributeV1Request::class, [7, ['name' => 'x']], 'PUT', '/v1/mobile-device-extension-attributes/7', 'one', MobileDeviceExtensionAttributes::class, true, false],
    'MobileDeviceExtensionAttributesPreview\\GetDevicesExtensionAttributesRequest' => [GetDevicesExtensionAttributesRequest::class, [], 'GET', '/devices/extensionAttributes', 'one', MobileDeviceExtensionAttributeResults::class, false, false],
    'MobileDeviceGroups\\CreateMobileDeviceGroupsSmartGroupsV1Request' => [CreateMobileDeviceGroupsSmartGroupsV1Request::class, [['name' => 'x']], 'POST', '/v1/mobile-device-groups/smart-groups', 'one', HrefResponse::class, true, false],
    'MobileDeviceGroups\\CreateMobileDeviceGroupsSmartGroupsV2Request' => [CreateMobileDeviceGroupsSmartGroupsV2Request::class, [['name' => 'x']], 'POST', '/v2/mobile-device-groups/smart-groups', 'one', HrefResponse::class, true, false],
    'MobileDeviceGroups\\CreateMobileDeviceGroupsStaticGroupsV1Request' => [CreateMobileDeviceGroupsStaticGroupsV1Request::class, [['name' => 'x']], 'POST', '/v1/mobile-device-groups/static-groups', 'one', HrefResponse::class, true, false],
    'MobileDeviceGroups\\CreateMobileDeviceGroupsStaticGroupsV2Request' => [CreateMobileDeviceGroupsStaticGroupsV2Request::class, [['name' => 'x']], 'POST', '/v2/mobile-device-groups/static-groups', 'one', HrefResponse::class, true, false],
    'MobileDeviceGroups\\DeleteMobileDeviceGroupsSmartGroupV1Request' => [DeleteMobileDeviceGroupsSmartGroupV1Request::class, [7], 'DELETE', '/v1/mobile-device-groups/smart-groups/7', 'none', null, false, false],
    'MobileDeviceGroups\\DeleteMobileDeviceGroupsSmartGroupV2Request' => [DeleteMobileDeviceGroupsSmartGroupV2Request::class, [7], 'DELETE', '/v2/mobile-device-groups/smart-groups/7', 'none', null, false, false],
    'MobileDeviceGroups\\DeleteMobileDeviceGroupsStaticGroupV1Request' => [DeleteMobileDeviceGroupsStaticGroupV1Request::class, [7], 'DELETE', '/v1/mobile-device-groups/static-groups/7', 'none', null, false, false],
    'MobileDeviceGroups\\DeleteMobileDeviceGroupsStaticGroupV2Request' => [DeleteMobileDeviceGroupsStaticGroupV2Request::class, [7], 'DELETE', '/v2/mobile-device-groups/static-groups/7', 'none', null, false, false],
    'MobileDeviceGroups\\EraseMobileDeviceGroupV1Request' => [EraseMobileDeviceGroupV1Request::class, [7, ['name' => 'x']], 'POST', '/v1/mobile-device-groups/7/erase', 'none', null, true, false],
    'MobileDeviceGroups\\EraseMobileDeviceGroupV2Request' => [EraseMobileDeviceGroupV2Request::class, [7, ['name' => 'x']], 'POST', '/v2/mobile-device-groups/7/erase', 'none', null, true, false],
    'MobileDeviceGroups\\GetMobileDeviceGroupsSmartGroupMembershipV1Request' => [GetMobileDeviceGroupsSmartGroupMembershipV1Request::class, [7], 'GET', '/v1/mobile-device-groups/smart-group-membership/7', 'list', InventoryListMobileDevice::class, false, true],
    'MobileDeviceGroups\\GetMobileDeviceGroupsSmartGroupMembershipV2Request' => [GetMobileDeviceGroupsSmartGroupMembershipV2Request::class, [7], 'GET', '/v2/mobile-device-groups/smart-group-membership/7', 'list', InventoryListMobileDevice::class, false, true],
    'MobileDeviceGroups\\GetMobileDeviceGroupsSmartGroupV1Request' => [GetMobileDeviceGroupsSmartGroupV1Request::class, [7], 'GET', '/v1/mobile-device-groups/smart-groups/7', 'one', SmartGroupDetail::class, false, false],
    'MobileDeviceGroups\\GetMobileDeviceGroupsSmartGroupV2Request' => [GetMobileDeviceGroupsSmartGroupV2Request::class, [7], 'GET', '/v2/mobile-device-groups/smart-groups/7', 'one', SmartGroupDetailV2::class, false, false],
    'MobileDeviceGroups\\GetMobileDeviceGroupsSmartGroupsV1Request' => [GetMobileDeviceGroupsSmartGroupsV1Request::class, [], 'GET', '/v1/mobile-device-groups/smart-groups', 'list', SmartGroup::class, false, true],
    'MobileDeviceGroups\\GetMobileDeviceGroupsSmartGroupsV2Request' => [GetMobileDeviceGroupsSmartGroupsV2Request::class, [], 'GET', '/v2/mobile-device-groups/smart-groups', 'list', SmartGroup::class, false, true],
    'MobileDeviceGroups\\GetMobileDeviceGroupsStaticGroupMembershipV1Request' => [GetMobileDeviceGroupsStaticGroupMembershipV1Request::class, [7], 'GET', '/v1/mobile-device-groups/static-group-membership/7', 'list', InventoryListMobileDevice::class, false, true],
    'MobileDeviceGroups\\GetMobileDeviceGroupsStaticGroupMembershipV2Request' => [GetMobileDeviceGroupsStaticGroupMembershipV2Request::class, [7], 'GET', '/v2/mobile-device-groups/static-group-membership/7', 'list', InventoryListMobileDevice::class, false, true],
    'MobileDeviceGroups\\GetMobileDeviceGroupsStaticGroupV1Request' => [GetMobileDeviceGroupsStaticGroupV1Request::class, [7], 'GET', '/v1/mobile-device-groups/static-groups/7', 'one', StaticGroup::class, false, false],
    'MobileDeviceGroups\\GetMobileDeviceGroupsStaticGroupV2Request' => [GetMobileDeviceGroupsStaticGroupV2Request::class, [7], 'GET', '/v2/mobile-device-groups/static-groups/7', 'one', StaticGroup::class, false, false],
    'MobileDeviceGroups\\GetMobileDeviceGroupsStaticGroupsV1Request' => [GetMobileDeviceGroupsStaticGroupsV1Request::class, [], 'GET', '/v1/mobile-device-groups/static-groups', 'list', StaticGroup::class, false, true],
    'MobileDeviceGroups\\GetMobileDeviceGroupsStaticGroupsV2Request' => [GetMobileDeviceGroupsStaticGroupsV2Request::class, [], 'GET', '/v2/mobile-device-groups/static-groups', 'list', StaticGroup::class, false, true],
    'MobileDeviceGroups\\GetMobileDeviceGroupsV1Request' => [GetMobileDeviceGroupsV1Request::class, [], 'GET', '/v1/mobile-device-groups', 'list', MobileDeviceGroup::class, false, false],
    'MobileDeviceGroups\\GetMobileDeviceGroupsV2Request' => [GetMobileDeviceGroupsV2Request::class, [], 'GET', '/v2/mobile-device-groups', 'list', MobileDeviceGroup::class, false, false],
    'MobileDeviceGroups\\ReplaceMobileDeviceGroupsSmartGroupV1Request' => [ReplaceMobileDeviceGroupsSmartGroupV1Request::class, [7, ['name' => 'x']], 'PUT', '/v1/mobile-device-groups/smart-groups/7', 'one', SmartGroupAssignment::class, true, false],
    'MobileDeviceGroups\\ReplaceMobileDeviceGroupsSmartGroupV2Request' => [ReplaceMobileDeviceGroupsSmartGroupV2Request::class, [7, ['name' => 'x']], 'PUT', '/v2/mobile-device-groups/smart-groups/7', 'one', SmartGroupAssignmentV2::class, true, false],
    'MobileDeviceGroups\\UpdateMobileDeviceGroupsStaticGroupV1Request' => [UpdateMobileDeviceGroupsStaticGroupV1Request::class, [7, ['name' => 'x']], 'PATCH', '/v1/mobile-device-groups/static-groups/7', 'one', StaticGroupAssignment::class, true, false],
    'MobileDeviceGroups\\UpdateMobileDeviceGroupsStaticGroupV2Request' => [UpdateMobileDeviceGroupsStaticGroupV2Request::class, [7, ['name' => 'x']], 'PATCH', '/v2/mobile-device-groups/static-groups/7', 'one', StaticGroupAssignment::class, true, false],
    'MobileDevicePrestages\\CreateMobileDevicePrestageAttachmentsV2Request' => [CreateMobileDevicePrestageAttachmentsV2Request::class, [7, 'contents'], 'POST', '/v2/mobile-device-prestages/7/attachments', 'one', PrestageFileAttachmentV2::class, true, false],
    'MobileDevicePrestages\\CreateMobileDevicePrestageAttachmentsV3Request' => [CreateMobileDevicePrestageAttachmentsV3Request::class, [7, 'contents'], 'POST', '/v3/mobile-device-prestages/7/attachments', 'one', PrestageFileAttachmentV3::class, true, false],
    'MobileDevicePrestages\\CreateMobileDevicePrestageHistoryV2Request' => [CreateMobileDevicePrestageHistoryV2Request::class, [7, ['name' => 'x']], 'POST', '/v2/mobile-device-prestages/7/history', 'one', HrefResponse::class, true, false],
    'MobileDevicePrestages\\CreateMobileDevicePrestageHistoryV3Request' => [CreateMobileDevicePrestageHistoryV3Request::class, [7, ['name' => 'x']], 'POST', '/v3/mobile-device-prestages/7/history', 'one', HrefResponse::class, true, false],
    'MobileDevicePrestages\\CreateMobileDevicePrestageScopeV2Request' => [CreateMobileDevicePrestageScopeV2Request::class, [7, ['name' => 'x']], 'POST', '/v2/mobile-device-prestages/7/scope', 'one', PrestageScopeResponseV2::class, true, false],
    'MobileDevicePrestages\\CreateMobileDevicePrestagesV2Request' => [CreateMobileDevicePrestagesV2Request::class, [['name' => 'x']], 'POST', '/v2/mobile-device-prestages', 'one', HrefResponse::class, true, false],
    'MobileDevicePrestages\\CreateMobileDevicePrestagesV3Request' => [CreateMobileDevicePrestagesV3Request::class, [['name' => 'x']], 'POST', '/v3/mobile-device-prestages', 'one', HrefResponse::class, true, false],
    'MobileDevicePrestages\\DeleteMobileDevicePrestageV2Request' => [DeleteMobileDevicePrestageV2Request::class, [7], 'DELETE', '/v2/mobile-device-prestages/7', 'none', null, false, false],
    'MobileDevicePrestages\\DeleteMobileDevicePrestageV3Request' => [DeleteMobileDevicePrestageV3Request::class, [7], 'DELETE', '/v3/mobile-device-prestages/7', 'none', null, false, false],
    'MobileDevicePrestages\\DeleteMultipleMobileDevicePrestageAttachmentsV2Request' => [DeleteMultipleMobileDevicePrestageAttachmentsV2Request::class, [7, ['name' => 'x']], 'POST', '/v2/mobile-device-prestages/7/attachments/delete-multiple', 'none', null, true, false],
    'MobileDevicePrestages\\DeleteMultipleMobileDevicePrestageAttachmentsV3Request' => [DeleteMultipleMobileDevicePrestageAttachmentsV3Request::class, [7, ['name' => 'x']], 'POST', '/v3/mobile-device-prestages/7/attachments/delete-multiple', 'none', null, true, false],
    'MobileDevicePrestages\\DeleteMultipleMobileDevicePrestageScopeV2Request' => [DeleteMultipleMobileDevicePrestageScopeV2Request::class, [7, ['name' => 'x']], 'POST', '/v2/mobile-device-prestages/7/scope/delete-multiple', 'one', PrestageScopeResponseV2::class, true, false],
    'MobileDevicePrestages\\GetMobileDevicePrestageAttachmentsV2Request' => [GetMobileDevicePrestageAttachmentsV2Request::class, [7], 'GET', '/v2/mobile-device-prestages/7/attachments', 'list', FileAttachmentV2::class, false, false],
    'MobileDevicePrestages\\GetMobileDevicePrestageAttachmentsV3Request' => [GetMobileDevicePrestageAttachmentsV3Request::class, [7], 'GET', '/v3/mobile-device-prestages/7/attachments', 'list', FileAttachmentV3::class, false, false],
    'MobileDevicePrestages\\GetMobileDevicePrestageHistoryV2Request' => [GetMobileDevicePrestageHistoryV2Request::class, [7], 'GET', '/v2/mobile-device-prestages/7/history', 'list', ObjectHistory::class, false, true],
    'MobileDevicePrestages\\GetMobileDevicePrestageHistoryV3Request' => [GetMobileDevicePrestageHistoryV3Request::class, [7], 'GET', '/v3/mobile-device-prestages/7/history', 'list', ObjectHistory::class, false, true],
    'MobileDevicePrestages\\GetMobileDevicePrestageScopeV2Request' => [GetMobileDevicePrestageScopeV2Request::class, [7], 'GET', '/v2/mobile-device-prestages/7/scope', 'one', PrestageScopeResponseV2::class, false, false],
    'MobileDevicePrestages\\GetMobileDevicePrestageSyncsLatestV2Request' => [GetMobileDevicePrestageSyncsLatestV2Request::class, [7], 'GET', '/v2/mobile-device-prestages/7/syncs/latest', 'one', PrestageSyncStatusV2::class, false, false],
    'MobileDevicePrestages\\GetMobileDevicePrestageSyncsV2Request' => [GetMobileDevicePrestageSyncsV2Request::class, [7], 'GET', '/v2/mobile-device-prestages/7/syncs', 'list', PrestageSyncStatusV2::class, false, false],
    'MobileDevicePrestages\\GetMobileDevicePrestageV2Request' => [GetMobileDevicePrestageV2Request::class, [7], 'GET', '/v2/mobile-device-prestages/7', 'one', GetMobileDevicePrestageV2::class, false, false],
    'MobileDevicePrestages\\GetMobileDevicePrestageV3Request' => [GetMobileDevicePrestageV3Request::class, [7], 'GET', '/v3/mobile-device-prestages/7', 'one', GetMobileDevicePrestageV3::class, false, false],
    'MobileDevicePrestages\\GetMobileDevicePrestagesScopeV2Request' => [GetMobileDevicePrestagesScopeV2Request::class, [], 'GET', '/v2/mobile-device-prestages/scope', 'one', PrestageScopeV2::class, false, false],
    'MobileDevicePrestages\\GetMobileDevicePrestagesSyncsV2Request' => [GetMobileDevicePrestagesSyncsV2Request::class, [], 'GET', '/v2/mobile-device-prestages/syncs', 'list', PrestageSyncStatusV2::class, false, false],
    'MobileDevicePrestages\\GetMobileDevicePrestagesV2Request' => [GetMobileDevicePrestagesV2Request::class, [], 'GET', '/v2/mobile-device-prestages', 'list', GetMobileDevicePrestageV2::class, false, true],
    'MobileDevicePrestages\\GetMobileDevicePrestagesV3Request' => [GetMobileDevicePrestagesV3Request::class, [], 'GET', '/v3/mobile-device-prestages', 'list', GetMobileDevicePrestageV3::class, false, true],
    'MobileDevicePrestages\\ReplaceMobileDevicePrestageScopeV2Request' => [ReplaceMobileDevicePrestageScopeV2Request::class, [7, ['name' => 'x']], 'PUT', '/v2/mobile-device-prestages/7/scope', 'one', PrestageScopeResponseV2::class, true, false],
    'MobileDevicePrestages\\ReplaceMobileDevicePrestageV2Request' => [ReplaceMobileDevicePrestageV2Request::class, [7, ['name' => 'x']], 'PUT', '/v2/mobile-device-prestages/7', 'one', GetMobileDevicePrestageV2::class, true, false],
    'MobileDevicePrestages\\ReplaceMobileDevicePrestageV3Request' => [ReplaceMobileDevicePrestageV3Request::class, [7, ['name' => 'x']], 'PUT', '/v3/mobile-device-prestages/7', 'one', GetMobileDevicePrestageV3::class, true, false],
    'MobileDevices\\EraseMobileDeviceV2Request' => [EraseMobileDeviceV2Request::class, [7], 'POST', '/v2/mobile-devices/7/erase', 'one', EraseDeviceMobileDeviceResponse::class, true, false],
    'MobileDevices\\GetMobileDeviceDetailV2Request' => [GetMobileDeviceDetailV2Request::class, [7], 'GET', '/v2/mobile-devices/7/detail', 'one', MobileDeviceDetailsGetV2::class, false, false],
    'MobileDevices\\GetMobileDevicePairedDevicesV2Request' => [GetMobileDevicePairedDevicesV2Request::class, [7], 'GET', '/v2/mobile-devices/7/paired-devices', 'list', MobileDeviceResponse::class, false, true],
    'MobileDevices\\GetMobileDeviceV2Request' => [GetMobileDeviceV2Request::class, [7], 'GET', '/v2/mobile-devices/7', 'one', MobileDeviceV2::class, false, false],
    'MobileDevices\\GetMobileDevicesDetailV2Request' => [GetMobileDevicesDetailV2Request::class, [], 'GET', '/v2/mobile-devices/detail', 'list', MobileDeviceResponse::class, false, true],
    'MobileDevices\\GetMobileDevicesV2Request' => [GetMobileDevicesV2Request::class, [], 'GET', '/v2/mobile-devices', 'list', MobileDeviceV2::class, false, true],
    'MobileDevices\\UnmanageMobileDeviceV2Request' => [UnmanageMobileDeviceV2Request::class, [7], 'POST', '/v2/mobile-devices/7/unmanage', 'one', UnmanageMobileDeviceResponse::class, false, false],
    'MobileDevices\\UpdateMobileDeviceV2Request' => [UpdateMobileDeviceV2Request::class, [7, ['name' => 'x']], 'PATCH', '/v2/mobile-devices/7', 'one', MobileDeviceDetailsV2::class, true, false],
    'Oidc\\DispatchOidcV1Request' => [DispatchOidcV1Request::class, [['name' => 'x']], 'POST', '/v1/oidc/dispatch', 'one', OidcLoginDispatchResponse::class, true, false],
    'Oidc\\DispatchOidcV2Request' => [DispatchOidcV2Request::class, [['name' => 'x']], 'POST', '/v2/oidc/dispatch', 'one', OidcLoginDispatchResponseV2::class, true, false],
    'Oidc\\GenerateOidcCertificateV1Request' => [GenerateOidcCertificateV1Request::class, [], 'POST', '/v1/oidc/generate-certificate', 'none', null, false, false],
    'Oidc\\GetOidcDirectIdpLoginUrlV1Request' => [GetOidcDirectIdpLoginUrlV1Request::class, [], 'GET', '/v1/oidc/direct-idp-login-url', 'one', OidcDirectIdpLoginSkipUrl::class, false, false],
    'Oidc\\GetOidcPublicFeaturesV1Request' => [GetOidcPublicFeaturesV1Request::class, [], 'GET', '/v1/oidc/public-features', 'one', OidcPublicFeaturesResponse::class, false, false],
    'Oidc\\GetOidcPublicKeyV1Request' => [GetOidcPublicKeyV1Request::class, [], 'GET', '/v1/oidc/public-key', 'one', OidcJwksResponse::class, false, false],
    'Onboarding\\CreateOnboardingHistoryV1Request' => [CreateOnboardingHistoryV1Request::class, [['name' => 'x']], 'POST', '/v1/onboarding/history', 'one', HrefResponse::class, true, false],
    'Onboarding\\ExportOnboardingHistoryV1Request' => [ExportOnboardingHistoryV1Request::class, [], 'POST', '/v1/onboarding/history/export', 'text', null, true, false],
    'Onboarding\\GetOnboardingEligibleAppsV1Request' => [GetOnboardingEligibleAppsV1Request::class, [], 'GET', '/v1/onboarding/eligible-apps', 'list', OnboardingEligibleItem::class, false, true],
    'Onboarding\\GetOnboardingEligibleConfigurationProfilesV1Request' => [GetOnboardingEligibleConfigurationProfilesV1Request::class, [], 'GET', '/v1/onboarding/eligible-configuration-profiles', 'list', OnboardingEligibleItem::class, false, true],
    'Onboarding\\GetOnboardingEligiblePoliciesV1Request' => [GetOnboardingEligiblePoliciesV1Request::class, [], 'GET', '/v1/onboarding/eligible-policies', 'list', OnboardingEligibleItem::class, false, true],
    'Onboarding\\GetOnboardingHistoryV1Request' => [GetOnboardingHistoryV1Request::class, [], 'GET', '/v1/onboarding/history', 'list', ObjectHistory::class, false, true],
    'Onboarding\\GetOnboardingV1Request' => [GetOnboardingV1Request::class, [], 'GET', '/v1/onboarding', 'one', OnboardingConfiguration::class, false, false],
    'Onboarding\\ReplaceOnboardingV1Request' => [ReplaceOnboardingV1Request::class, [['name' => 'x']], 'PUT', '/v1/onboarding', 'one', OnboardingConfiguration::class, true, false],
    'Packages\\CreatePackageHistoryV1Request' => [CreatePackageHistoryV1Request::class, [7, ['name' => 'x']], 'POST', '/v1/packages/7/history', 'one', ObjectHistory::class, true, false],
    'Packages\\CreatePackageManifestV1Request' => [CreatePackageManifestV1Request::class, [7, 'contents'], 'POST', '/v1/packages/7/manifest', 'one', Package::class, true, false],
    'Packages\\CreatePackagesV1Request' => [CreatePackagesV1Request::class, [['name' => 'x']], 'POST', '/v1/packages', 'one', HrefResponse::class, true, false],
    'Packages\\DeleteMultiplePackagesV1Request' => [DeleteMultiplePackagesV1Request::class, [['name' => 'x']], 'POST', '/v1/packages/delete-multiple', 'none', null, true, false],
    'Packages\\DeletePackageManifestV1Request' => [DeletePackageManifestV1Request::class, [7], 'DELETE', '/v1/packages/7/manifest', 'none', null, false, false],
    'Packages\\DeletePackageV1Request' => [DeletePackageV1Request::class, [7], 'DELETE', '/v1/packages/7', 'none', null, false, false],
    'Packages\\ExportPackageHistoryV1Request' => [ExportPackageHistoryV1Request::class, [7], 'POST', '/v1/packages/7/history/export', 'text', null, true, false],
    'Packages\\ExportPackagesV1Request' => [ExportPackagesV1Request::class, [], 'POST', '/v1/packages/export', 'text', null, true, false],
    'Packages\\GetPackageHistoryV1Request' => [GetPackageHistoryV1Request::class, [7], 'GET', '/v1/packages/7/history', 'list', ObjectHistory::class, false, true],
    'Packages\\GetPackageV1Request' => [GetPackageV1Request::class, [7], 'GET', '/v1/packages/7', 'one', Package::class, false, false],
    'Packages\\GetPackagesV1Request' => [GetPackagesV1Request::class, [], 'GET', '/v1/packages', 'list', Package::class, false, true],
    'Packages\\ReplacePackageV1Request' => [ReplacePackageV1Request::class, [7, ['name' => 'x']], 'PUT', '/v1/packages/7', 'one', Package::class, true, false],
    'Packages\\UploadPackageV1Request' => [UploadPackageV1Request::class, [7, 'contents'], 'POST', '/v1/packages/7/upload', 'one', HrefResponse::class, true, false],
    'ParentAppPreview\\CreateParentAppHistoryV1Request' => [CreateParentAppHistoryV1Request::class, [['name' => 'x']], 'POST', '/v1/parent-app/history', 'one', ObjectHistory::class, true, false],
    'ParentAppPreview\\GetParentAppHistoryV1Request' => [GetParentAppHistoryV1Request::class, [], 'GET', '/v1/parent-app/history', 'list', ObjectHistory::class, false, true],
    'ParentAppPreview\\GetParentAppV1Request' => [GetParentAppV1Request::class, [], 'GET', '/v1/parent-app', 'one', ParentApp::class, false, false],
    'ParentAppPreview\\ReplaceParentAppV1Request' => [ReplaceParentAppV1Request::class, [['name' => 'x']], 'PUT', '/v1/parent-app', 'one', ParentApp::class, true, false],
    'PatchManagement\\CreatePatchManagementAcceptDisclaimerV2Request' => [CreatePatchManagementAcceptDisclaimerV2Request::class, [], 'POST', '/v2/patch-management-accept-disclaimer', 'none', null, false, false],
    'PatchPolicies\\CreatePatchPolicyDashboardV2Request' => [CreatePatchPolicyDashboardV2Request::class, [7], 'POST', '/v2/patch-policies/7/dashboard', 'none', null, false, false],
    'PatchPolicies\\DeletePatchPolicyDashboardV2Request' => [DeletePatchPolicyDashboardV2Request::class, [7], 'DELETE', '/v2/patch-policies/7/dashboard', 'none', null, false, false],
    'PatchPolicies\\GetPatchPoliciesPolicyDetailsV2Request' => [GetPatchPoliciesPolicyDetailsV2Request::class, [], 'GET', '/v2/patch-policies/policy-details', 'list', PatchPolicyDetail::class, false, true],
    'PatchPolicies\\GetPatchPoliciesV2Request' => [GetPatchPoliciesV2Request::class, [], 'GET', '/v2/patch-policies', 'list', PatchPolicyListView::class, false, true],
    'PatchPolicies\\GetPatchPolicyDashboardV2Request' => [GetPatchPolicyDashboardV2Request::class, [7], 'GET', '/v2/patch-policies/7/dashboard', 'one', PatchPolicyV2OnDashboard::class, false, false],
    'PatchPolicyLogs\\GetPatchPolicyLogDetailsV2Request' => [GetPatchPolicyLogDetailsV2Request::class, [7, 7], 'GET', '/v2/patch-policies/7/logs/7/details', 'list', PatchPolicyLogDetail::class, false, false],
    'PatchPolicyLogs\\GetPatchPolicyLogV2Request' => [GetPatchPolicyLogV2Request::class, [7, 7], 'GET', '/v2/patch-policies/7/logs/7', 'one', PatchPolicyLogV2::class, false, false],
    'PatchPolicyLogs\\GetPatchPolicyLogsEligibleRetryCountV2Request' => [GetPatchPolicyLogsEligibleRetryCountV2Request::class, [7], 'GET', '/v2/patch-policies/7/logs/eligible-retry-count', 'one', PatchPolicyLogEligibleRetryCount::class, false, false],
    'PatchPolicyLogs\\GetPatchPolicyLogsV2Request' => [GetPatchPolicyLogsV2Request::class, [7], 'GET', '/v2/patch-policies/7/logs', 'list', PatchPolicyLogV2::class, false, true],
    'PatchPolicyLogs\\RetryPatchPolicyLogsAllV2Request' => [RetryPatchPolicyLogsAllV2Request::class, [7], 'POST', '/v2/patch-policies/7/logs/retry-all', 'none', null, false, false],
    'PatchPolicyLogs\\RetryPatchPolicyLogsV2Request' => [RetryPatchPolicyLogsV2Request::class, [7, ['name' => 'x']], 'POST', '/v2/patch-policies/7/logs/retry', 'none', null, true, false],
    'PatchSoftwareTitleConfigurations\\CreatePatchSoftwareTitleConfigurationDashboardV2Request' => [CreatePatchSoftwareTitleConfigurationDashboardV2Request::class, [7], 'POST', '/v2/patch-software-title-configurations/7/dashboard', 'none', null, false, false],
    'PatchSoftwareTitleConfigurations\\CreatePatchSoftwareTitleConfigurationDashboardV3Request' => [CreatePatchSoftwareTitleConfigurationDashboardV3Request::class, [7], 'POST', '/v3/patch-software-title-configurations/7/dashboard', 'none', null, false, false],
    'PatchSoftwareTitleConfigurations\\CreatePatchSoftwareTitleConfigurationHistoryV2Request' => [CreatePatchSoftwareTitleConfigurationHistoryV2Request::class, [7, ['name' => 'x']], 'POST', '/v2/patch-software-title-configurations/7/history', 'one', HrefResponse::class, true, false],
    'PatchSoftwareTitleConfigurations\\CreatePatchSoftwareTitleConfigurationHistoryV3Request' => [CreatePatchSoftwareTitleConfigurationHistoryV3Request::class, [7, ['name' => 'x']], 'POST', '/v3/patch-software-title-configurations/7/history', 'one', HrefResponse::class, true, false],
    'PatchSoftwareTitleConfigurations\\CreatePatchSoftwareTitleConfigurationsV2Request' => [CreatePatchSoftwareTitleConfigurationsV2Request::class, [['name' => 'x']], 'POST', '/v2/patch-software-title-configurations', 'one', HrefResponse::class, true, false],
    'PatchSoftwareTitleConfigurations\\CreatePatchSoftwareTitleConfigurationsV3Request' => [CreatePatchSoftwareTitleConfigurationsV3Request::class, [['name' => 'x']], 'POST', '/v3/patch-software-title-configurations', 'one', HrefResponse::class, true, false],
    'PatchSoftwareTitleConfigurations\\DeletePatchSoftwareTitleConfigurationDashboardV2Request' => [DeletePatchSoftwareTitleConfigurationDashboardV2Request::class, [7], 'DELETE', '/v2/patch-software-title-configurations/7/dashboard', 'none', null, false, false],
    'PatchSoftwareTitleConfigurations\\DeletePatchSoftwareTitleConfigurationDashboardV3Request' => [DeletePatchSoftwareTitleConfigurationDashboardV3Request::class, [7], 'DELETE', '/v3/patch-software-title-configurations/7/dashboard', 'none', null, false, false],
    'PatchSoftwareTitleConfigurations\\DeletePatchSoftwareTitleConfigurationV2Request' => [DeletePatchSoftwareTitleConfigurationV2Request::class, [7], 'DELETE', '/v2/patch-software-title-configurations/7', 'none', null, false, false],
    'PatchSoftwareTitleConfigurations\\DeletePatchSoftwareTitleConfigurationV3Request' => [DeletePatchSoftwareTitleConfigurationV3Request::class, [7], 'DELETE', '/v3/patch-software-title-configurations/7', 'none', null, false, false],
    'PatchSoftwareTitleConfigurations\\GetPatchSoftwareTitleConfigurationDashboardV2Request' => [GetPatchSoftwareTitleConfigurationDashboardV2Request::class, [7], 'GET', '/v2/patch-software-title-configurations/7/dashboard', 'one', SoftwareTitleConfigurationOnDashboard::class, false, false],
    'PatchSoftwareTitleConfigurations\\GetPatchSoftwareTitleConfigurationDashboardV3Request' => [GetPatchSoftwareTitleConfigurationDashboardV3Request::class, [7], 'GET', '/v3/patch-software-title-configurations/7/dashboard', 'one', SoftwareTitleConfigurationOnDashboard::class, false, false],
    'PatchSoftwareTitleConfigurations\\GetPatchSoftwareTitleConfigurationDefinitionsV2Request' => [GetPatchSoftwareTitleConfigurationDefinitionsV2Request::class, [7], 'GET', '/v2/patch-software-title-configurations/7/definitions', 'list', PatchSoftwareTitleDefinition::class, false, true],
    'PatchSoftwareTitleConfigurations\\GetPatchSoftwareTitleConfigurationDefinitionsV3Request' => [GetPatchSoftwareTitleConfigurationDefinitionsV3Request::class, [7], 'GET', '/v3/patch-software-title-configurations/7/definitions', 'list', PatchSoftwareTitleDefinition::class, false, true],
    'PatchSoftwareTitleConfigurations\\GetPatchSoftwareTitleConfigurationDependenciesV2Request' => [GetPatchSoftwareTitleConfigurationDependenciesV2Request::class, [7], 'GET', '/v2/patch-software-title-configurations/7/dependencies', 'list', PatchSoftwareTitleConfigurationDependency::class, false, false],
    'PatchSoftwareTitleConfigurations\\GetPatchSoftwareTitleConfigurationDependenciesV3Request' => [GetPatchSoftwareTitleConfigurationDependenciesV3Request::class, [7], 'GET', '/v3/patch-software-title-configurations/7/dependencies', 'list', PatchSoftwareTitleConfigurationDependency::class, false, false],
    'PatchSoftwareTitleConfigurations\\GetPatchSoftwareTitleConfigurationExportReportV2Request' => [GetPatchSoftwareTitleConfigurationExportReportV2Request::class, [7], 'GET', '/v2/patch-software-title-configurations/7/export-report', 'text', null, false, false],
    'PatchSoftwareTitleConfigurations\\GetPatchSoftwareTitleConfigurationExportReportV3Request' => [GetPatchSoftwareTitleConfigurationExportReportV3Request::class, [7], 'GET', '/v3/patch-software-title-configurations/7/export-report', 'text', null, false, false],
    'PatchSoftwareTitleConfigurations\\GetPatchSoftwareTitleConfigurationExtensionAttributesV2Request' => [GetPatchSoftwareTitleConfigurationExtensionAttributesV2Request::class, [7], 'GET', '/v2/patch-software-title-configurations/7/extension-attributes', 'list', PatchSoftwareTitleExtensionAttributes::class, false, false],
    'PatchSoftwareTitleConfigurations\\GetPatchSoftwareTitleConfigurationExtensionAttributesV3Request' => [GetPatchSoftwareTitleConfigurationExtensionAttributesV3Request::class, [7], 'GET', '/v3/patch-software-title-configurations/7/extension-attributes', 'list', PatchSoftwareTitleExtensionAttributes::class, false, false],
    'PatchSoftwareTitleConfigurations\\GetPatchSoftwareTitleConfigurationHistoryV2Request' => [GetPatchSoftwareTitleConfigurationHistoryV2Request::class, [7], 'GET', '/v2/patch-software-title-configurations/7/history', 'list', ObjectHistory::class, false, true],
    'PatchSoftwareTitleConfigurations\\GetPatchSoftwareTitleConfigurationHistoryV3Request' => [GetPatchSoftwareTitleConfigurationHistoryV3Request::class, [7], 'GET', '/v3/patch-software-title-configurations/7/history', 'list', ObjectHistory::class, false, true],
    'PatchSoftwareTitleConfigurations\\GetPatchSoftwareTitleConfigurationPatchReportV2Request' => [GetPatchSoftwareTitleConfigurationPatchReportV2Request::class, [7], 'GET', '/v2/patch-software-title-configurations/7/patch-report', 'list', PatchSoftwareTitleReport::class, false, true],
    'PatchSoftwareTitleConfigurations\\GetPatchSoftwareTitleConfigurationPatchReportV3Request' => [GetPatchSoftwareTitleConfigurationPatchReportV3Request::class, [7], 'GET', '/v3/patch-software-title-configurations/7/patch-report', 'list', PatchReportV3::class, false, true],
    'PatchSoftwareTitleConfigurations\\GetPatchSoftwareTitleConfigurationPatchSummaryV2Request' => [GetPatchSoftwareTitleConfigurationPatchSummaryV2Request::class, [7], 'GET', '/v2/patch-software-title-configurations/7/patch-summary', 'one', PatchSummary::class, false, false],
    'PatchSoftwareTitleConfigurations\\GetPatchSoftwareTitleConfigurationPatchSummaryV3Request' => [GetPatchSoftwareTitleConfigurationPatchSummaryV3Request::class, [7], 'GET', '/v3/patch-software-title-configurations/7/patch-summary', 'one', PatchSummary::class, false, false],
    'PatchSoftwareTitleConfigurations\\GetPatchSoftwareTitleConfigurationPatchSummaryVersionsV2Request' => [GetPatchSoftwareTitleConfigurationPatchSummaryVersionsV2Request::class, [7], 'GET', '/v2/patch-software-title-configurations/7/patch-summary/versions', 'list', PatchSummaryVersion::class, false, false],
    'PatchSoftwareTitleConfigurations\\GetPatchSoftwareTitleConfigurationPatchSummaryVersionsV3Request' => [GetPatchSoftwareTitleConfigurationPatchSummaryVersionsV3Request::class, [7], 'GET', '/v3/patch-software-title-configurations/7/patch-summary/versions', 'list', PatchSummaryVersion::class, false, false],
    'PatchSoftwareTitleConfigurations\\GetPatchSoftwareTitleConfigurationV2Request' => [GetPatchSoftwareTitleConfigurationV2Request::class, [7], 'GET', '/v2/patch-software-title-configurations/7', 'one', PatchSoftwareTitleConfiguration::class, false, false],
    'PatchSoftwareTitleConfigurations\\GetPatchSoftwareTitleConfigurationV3Request' => [GetPatchSoftwareTitleConfigurationV3Request::class, [7], 'GET', '/v3/patch-software-title-configurations/7', 'one', PatchSoftwareTitleConfiguration::class, false, false],
    'PatchSoftwareTitleConfigurations\\GetPatchSoftwareTitleConfigurationsV2Request' => [GetPatchSoftwareTitleConfigurationsV2Request::class, [], 'GET', '/v2/patch-software-title-configurations', 'list', PatchSoftwareTitleConfiguration::class, false, false],
    'PatchSoftwareTitleConfigurations\\GetPatchSoftwareTitleConfigurationsV3Request' => [GetPatchSoftwareTitleConfigurationsV3Request::class, [], 'GET', '/v3/patch-software-title-configurations', 'list', PatchSoftwareTitleConfiguration::class, false, false],
    'PatchSoftwareTitleConfigurations\\UpdatePatchSoftwareTitleConfigurationV2Request' => [UpdatePatchSoftwareTitleConfigurationV2Request::class, [7, ['name' => 'x']], 'PATCH', '/v2/patch-software-title-configurations/7', 'one', PatchSoftwareTitleConfiguration::class, true, false],
    'PatchSoftwareTitleConfigurations\\UpdatePatchSoftwareTitleConfigurationV3Request' => [UpdatePatchSoftwareTitleConfigurationV3Request::class, [7, ['name' => 'x']], 'PATCH', '/v3/patch-software-title-configurations/7', 'one', PatchSoftwareTitleConfiguration::class, true, false],
    'PoliciesPreview\\GetPolicyPropertiesV1Request' => [GetPolicyPropertiesV1Request::class, [], 'GET', '/v1/policy-properties', 'one', PolicyPropertiesV1::class, false, false],
    'PoliciesPreview\\GetSettingsObjPolicyPropertiesRequest' => [GetSettingsObjPolicyPropertiesRequest::class, [], 'GET', '/settings/obj/policyProperties', 'one', PolicyProperties::class, false, false],
    'PoliciesPreview\\ReplacePolicyPropertiesV1Request' => [ReplacePolicyPropertiesV1Request::class, [['name' => 'x']], 'PUT', '/v1/policy-properties', 'one', PolicyPropertiesV1::class, true, false],
    'PoliciesPreview\\ReplaceSettingsObjPolicyPropertiesRequest' => [ReplaceSettingsObjPolicyPropertiesRequest::class, [['name' => 'x']], 'PUT', '/settings/obj/policyProperties', 'one', PolicyProperties::class, true, false],
    'ReEnrollmentPreview\\CreateReenrollmentHistoryV1Request' => [CreateReenrollmentHistoryV1Request::class, [['name' => 'x']], 'POST', '/v1/reenrollment/history', 'one', ObjectHistory::class, true, false],
    'ReEnrollmentPreview\\ExportReenrollmentHistoryV1Request' => [ExportReenrollmentHistoryV1Request::class, [], 'POST', '/v1/reenrollment/history/export', 'raw', null, true, false],
    'ReEnrollmentPreview\\GetReenrollmentHistoryV1Request' => [GetReenrollmentHistoryV1Request::class, [], 'GET', '/v1/reenrollment/history', 'list', ObjectHistory::class, false, true],
    'ReEnrollmentPreview\\GetReenrollmentV1Request' => [GetReenrollmentV1Request::class, [], 'GET', '/v1/reenrollment', 'one', Reenrollment::class, false, false],
    'ReEnrollmentPreview\\ReplaceReenrollmentV1Request' => [ReplaceReenrollmentV1Request::class, [['name' => 'x']], 'PUT', '/v1/reenrollment', 'one', Reenrollment::class, true, false],
    'RemoteAdministration\\GetRemoteAdministrationConfigurationsPreviewRequest' => [GetRemoteAdministrationConfigurationsPreviewRequest::class, [], 'GET', '/preview/remote-administration-configurations', 'list', RemoteAdministrationResponse::class, false, true],
    'ReturnToService\\CreateReturnToServiceV1Request' => [CreateReturnToServiceV1Request::class, [['name' => 'x']], 'POST', '/v1/return-to-service', 'one', HrefResponse::class, true, false],
    'ReturnToService\\DeleteReturnToServiceV1Request' => [DeleteReturnToServiceV1Request::class, [7], 'DELETE', '/v1/return-to-service/7', 'none', null, false, false],
    'ReturnToService\\GetReturnToServiceByIdV1Request' => [GetReturnToServiceByIdV1Request::class, [7], 'GET', '/v1/return-to-service/7', 'one', ReturnToServiceConfiguration::class, false, false],
    'ReturnToService\\GetReturnToServiceV1Request' => [GetReturnToServiceV1Request::class, [], 'GET', '/v1/return-to-service', 'list', ReturnToServiceConfiguration::class, false, false],
    'ReturnToService\\ReplaceReturnToServiceV1Request' => [ReplaceReturnToServiceV1Request::class, [7, ['name' => 'x']], 'PUT', '/v1/return-to-service/7', 'one', ReturnToServiceConfiguration::class, true, false],
    'Scheduler\\GetSchedulerJobTriggersV1Request' => [GetSchedulerJobTriggersV1Request::class, ['abc'], 'GET', '/v1/scheduler/jobs/abc/triggers', 'list', SchedulerTrigger::class, false, true],
    'Scheduler\\GetSchedulerJobsV1Request' => [GetSchedulerJobsV1Request::class, [], 'GET', '/v1/scheduler/jobs', 'one', SchedulerJobs::class, false, false],
    'Scheduler\\GetSchedulerSummaryV1Request' => [GetSchedulerSummaryV1Request::class, [], 'GET', '/v1/scheduler/summary', 'one', SchedulerSummary::class, false, false],
    'Scripts\\CreateScriptHistoryV1Request' => [CreateScriptHistoryV1Request::class, [7, ['name' => 'x']], 'POST', '/v1/scripts/7/history', 'one', ObjectHistory::class, true, false],
    'Scripts\\CreateScriptsV1Request' => [CreateScriptsV1Request::class, [['name' => 'x']], 'POST', '/v1/scripts', 'one', HrefResponse::class, true, false],
    'Scripts\\DeleteScriptV1Request' => [DeleteScriptV1Request::class, [7], 'DELETE', '/v1/scripts/7', 'none', null, false, false],
    'Scripts\\GetScriptDownloadV1Request' => [GetScriptDownloadV1Request::class, [7], 'GET', '/v1/scripts/7/download', 'text', null, false, false],
    'Scripts\\GetScriptHistoryV1Request' => [GetScriptHistoryV1Request::class, [7], 'GET', '/v1/scripts/7/history', 'list', ObjectHistory::class, false, true],
    'Scripts\\GetScriptV1Request' => [GetScriptV1Request::class, [7], 'GET', '/v1/scripts/7', 'one', Script::class, false, false],
    'Scripts\\GetScriptsV1Request' => [GetScriptsV1Request::class, [], 'GET', '/v1/scripts', 'list', Script::class, false, true],
    'Scripts\\ReplaceScriptV1Request' => [ReplaceScriptV1Request::class, [7, ['name' => 'x']], 'PUT', '/v1/scripts/7', 'one', Script::class, true, false],
    'SelfService\\CreateSelfServiceSettingsHistoryV1Request' => [CreateSelfServiceSettingsHistoryV1Request::class, [['name' => 'x']], 'POST', '/v1/self-service/settings/history', 'one', HrefResponse::class, true, false],
    'SelfService\\GetSelfServiceSettingsHistoryV1Request' => [GetSelfServiceSettingsHistoryV1Request::class, [], 'GET', '/v1/self-service/settings/history', 'list', ObjectHistory::class, false, true],
    'SelfService\\GetSelfServiceSettingsV1Request' => [GetSelfServiceSettingsV1Request::class, [], 'GET', '/v1/self-service/settings', 'one', SelfServiceSettings::class, false, false],
    'SelfService\\ReplaceSelfServiceSettingsV1Request' => [ReplaceSelfServiceSettingsV1Request::class, [['name' => 'x']], 'PUT', '/v1/self-service/settings', 'one', SelfServiceSettings::class, true, false],
    'SelfServiceBrandingIos\\CreateSelfServiceBrandingIosV1Request' => [CreateSelfServiceBrandingIosV1Request::class, [], 'POST', '/v1/self-service/branding/ios', 'one', HrefResponse::class, true, false],
    'SelfServiceBrandingIos\\DeleteSelfServiceBrandingIosV1Request' => [DeleteSelfServiceBrandingIosV1Request::class, [7], 'DELETE', '/v1/self-service/branding/ios/7', 'none', null, false, false],
    'SelfServiceBrandingIos\\GetSelfServiceBrandingIosByIdV1Request' => [GetSelfServiceBrandingIosByIdV1Request::class, [7], 'GET', '/v1/self-service/branding/ios/7', 'one', IosBrandingConfiguration::class, false, false],
    'SelfServiceBrandingIos\\GetSelfServiceBrandingIosV1Request' => [GetSelfServiceBrandingIosV1Request::class, [], 'GET', '/v1/self-service/branding/ios', 'list', IosBrandingConfiguration::class, false, true],
    'SelfServiceBrandingIos\\ReplaceSelfServiceBrandingIosV1Request' => [ReplaceSelfServiceBrandingIosV1Request::class, [7], 'PUT', '/v1/self-service/branding/ios/7', 'one', IosBrandingConfiguration::class, true, false],
    'SelfServiceBrandingMacos\\CreateSelfServiceBrandingMacosV1Request' => [CreateSelfServiceBrandingMacosV1Request::class, [], 'POST', '/v1/self-service/branding/macos', 'one', HrefResponse::class, true, false],
    'SelfServiceBrandingMacos\\DeleteSelfServiceBrandingMacosV1Request' => [DeleteSelfServiceBrandingMacosV1Request::class, [7], 'DELETE', '/v1/self-service/branding/macos/7', 'none', null, false, false],
    'SelfServiceBrandingMacos\\GetSelfServiceBrandingMacosByIdV1Request' => [GetSelfServiceBrandingMacosByIdV1Request::class, [7], 'GET', '/v1/self-service/branding/macos/7', 'one', MacOsBrandingConfiguration::class, false, false],
    'SelfServiceBrandingMacos\\GetSelfServiceBrandingMacosV1Request' => [GetSelfServiceBrandingMacosV1Request::class, [], 'GET', '/v1/self-service/branding/macos', 'list', MacOsBrandingConfiguration::class, false, true],
    'SelfServiceBrandingMacos\\ReplaceSelfServiceBrandingMacosV1Request' => [ReplaceSelfServiceBrandingMacosV1Request::class, [7], 'PUT', '/v1/self-service/branding/macos/7', 'one', MacOsBrandingConfiguration::class, true, false],
    'SelfServiceBrandingPreview\\CreateSelfServiceBrandingImagesRequest' => [CreateSelfServiceBrandingImagesRequest::class, ['contents'], 'POST', '/self-service/branding/images', 'one', BrandingImageUrl::class, true, false],
    'SelfServicePlus\\GetSelfServicePlusFeatureToggleEnabledV1Request' => [GetSelfServicePlusFeatureToggleEnabledV1Request::class, [], 'GET', '/v1/self-service-plus/feature-toggle/enabled', 'none', null, false, false],
    'SelfServicePlus\\GetSelfServicePlusSettingsV1Request' => [GetSelfServicePlusSettingsV1Request::class, [], 'GET', '/v1/self-service-plus/settings', 'one', SelfServicePlusSettings::class, false, false],
    'SelfServicePlus\\ReplaceSelfServicePlusSettingsV1Request' => [ReplaceSelfServicePlusSettingsV1Request::class, [['name' => 'x']], 'PUT', '/v1/self-service-plus/settings', 'none', null, true, false],
    'ServiceDiscoveryEnrollment\\GetServiceDiscoveryEnrollmentWellKnownSettingsV1Request' => [GetServiceDiscoveryEnrollmentWellKnownSettingsV1Request::class, [], 'GET', '/v1/service-discovery-enrollment/well-known-settings', 'one', WellKnownSettingsResponse::class, false, false],
    'ServiceDiscoveryEnrollment\\ReplaceServiceDiscoveryEnrollmentWellKnownSettingsV1Request' => [ReplaceServiceDiscoveryEnrollmentWellKnownSettingsV1Request::class, [['name' => 'x']], 'PUT', '/v1/service-discovery-enrollment/well-known-settings', 'none', null, true, false],
    'Sites\\GetSiteObjectsV1Request' => [GetSiteObjectsV1Request::class, [7], 'GET', '/v1/sites/7/objects', 'list', SiteObject::class, false, true],
    'Sites\\GetSitesV1Request' => [GetSitesV1Request::class, [], 'GET', '/v1/sites', 'list', V1Site::class, false, false],
    'Slasa\\CreateSlasaV1Request' => [CreateSlasaV1Request::class, [], 'POST', '/v1/slasa', 'none', null, false, false],
    'Slasa\\GetSlasaV1Request' => [GetSlasaV1Request::class, [], 'GET', '/v1/slasa', 'one', SlasaAcceptance::class, false, false],
    'SmartComputerGroupsPreview\\RecalculateComputerSmartGroupsV1Request' => [RecalculateComputerSmartGroupsV1Request::class, [7], 'POST', '/v1/computers/7/recalculate-smart-groups', 'one', RecalculationResults::class, false, false],
    'SmartComputerGroupsPreview\\RecalculateSmartComputerGroupV1Request' => [RecalculateSmartComputerGroupV1Request::class, [7], 'POST', '/v1/smart-computer-groups/7/recalculate', 'one', RecalculationResults::class, false, false],
    'SmartMobileDeviceGroupsPreview\\RecalculateMobileDeviceSmartGroupsV1Request' => [RecalculateMobileDeviceSmartGroupsV1Request::class, [7], 'POST', '/v1/mobile-devices/7/recalculate-smart-groups', 'one', RecalculationResults::class, false, false],
    'SmartMobileDeviceGroupsPreview\\RecalculateSmartMobileDeviceGroupV1Request' => [RecalculateSmartMobileDeviceGroupV1Request::class, [7], 'POST', '/v1/smart-mobile-device-groups/7/recalculate', 'one', RecalculationResults::class, false, false],
    'SmartUserGroupsPreview\\RecalculateSmartUserGroupV1Request' => [RecalculateSmartUserGroupV1Request::class, [7], 'POST', '/v1/smart-user-groups/7/recalculate', 'one', RecalculationResults::class, false, false],
    'SmartUserGroupsPreview\\RecalculateUserSmartGroupsV1Request' => [RecalculateUserSmartGroupsV1Request::class, [7], 'POST', '/v1/users/7/recalculate-smart-groups', 'one', RecalculationResults::class, false, false],
    'SmtpServer\\CreateSmtpServerHistoryV1Request' => [CreateSmtpServerHistoryV1Request::class, [['name' => 'x']], 'POST', '/v1/smtp-server/history', 'one', HrefResponse::class, true, false],
    'SmtpServer\\GetSmtpServerAllowedAuthTypesV2Request' => [GetSmtpServerAllowedAuthTypesV2Request::class, [], 'GET', '/v2/smtp-server/allowed-auth-types', 'one', SmtpAuthenticationTypeList::class, false, false],
    'SmtpServer\\GetSmtpServerHistoryV1Request' => [GetSmtpServerHistoryV1Request::class, [], 'GET', '/v1/smtp-server/history', 'list', ObjectHistoryV1::class, false, true],
    'SmtpServer\\GetSmtpServerV2Request' => [GetSmtpServerV2Request::class, [], 'GET', '/v2/smtp-server', 'one', SmtpServerV2::class, false, false],
    'SmtpServer\\ReplaceSmtpServerV2Request' => [ReplaceSmtpServerV2Request::class, [['name' => 'x']], 'PUT', '/v2/smtp-server', 'one', SmtpServerV2::class, true, false],
    'SmtpServer\\TestSmtpServerV1Request' => [TestSmtpServerV1Request::class, [['name' => 'x']], 'POST', '/v1/smtp-server/test', 'none', null, true, false],
    'SsoCertificate\\CreateSsoCertV2Request' => [CreateSsoCertV2Request::class, [], 'POST', '/v2/sso/cert', 'one', SsoKeystoreResponseWithDetails::class, false, false],
    'SsoCertificate\\DeleteSsoCertV2Request' => [DeleteSsoCertV2Request::class, [], 'DELETE', '/v2/sso/cert', 'none', null, false, false],
    'SsoCertificate\\GetSsoCertDownloadV2Request' => [GetSsoCertDownloadV2Request::class, [], 'GET', '/v2/sso/cert/download', 'text', null, false, false],
    'SsoCertificate\\GetSsoCertV2Request' => [GetSsoCertV2Request::class, [], 'GET', '/v2/sso/cert', 'one', SsoKeystoreResponseWithDetails::class, false, false],
    'SsoCertificate\\ParseSsoCertV2Request' => [ParseSsoCertV2Request::class, [['name' => 'x']], 'POST', '/v2/sso/cert/parse', 'one', SsoKeystoreCertParseResponse::class, true, false],
    'SsoCertificate\\ReplaceSsoCertV2Request' => [ReplaceSsoCertV2Request::class, [['name' => 'x']], 'PUT', '/v2/sso/cert', 'one', SsoKeystoreResponseWithDetails::class, true, false],
    'SsoFailover\\GenerateSsoFailoverV1Request' => [GenerateSsoFailoverV1Request::class, [], 'POST', '/v1/sso/failover/generate', 'one', SsoFailoverData::class, false, false],
    'SsoFailover\\GetSsoFailoverV1Request' => [GetSsoFailoverV1Request::class, [], 'GET', '/v1/sso/failover', 'one', SsoFailoverData::class, false, false],
    'SsoOauthSessionTokens\\GetOauth2SessionTokensV1Request' => [GetOauth2SessionTokensV1Request::class, [], 'GET', '/v1/oauth2/session-tokens', 'one', OauthTokens::class, false, false],
    'SsoSettings\\CreateSsoHistoryV3Request' => [CreateSsoHistoryV3Request::class, [['name' => 'x']], 'POST', '/v3/sso/history', 'one', HrefResponse::class, true, false],
    'SsoSettings\\DisableSsoV3Request' => [DisableSsoV3Request::class, [], 'POST', '/v3/sso/disable', 'none', null, false, false],
    'SsoSettings\\GetSsoDependenciesV3Request' => [GetSsoDependenciesV3Request::class, [], 'GET', '/v3/sso/dependencies', 'one', EnrollmentCustomizationDependencies::class, false, false],
    'SsoSettings\\GetSsoHistoryV3Request' => [GetSsoHistoryV3Request::class, [], 'GET', '/v3/sso/history', 'list', ObjectHistory::class, false, true],
    'SsoSettings\\GetSsoMetadataDownloadV3Request' => [GetSsoMetadataDownloadV3Request::class, [], 'GET', '/v3/sso/metadata/download', 'text', null, false, false],
    'SsoSettings\\GetSsoOidcBrokerConfigV3Request' => [GetSsoOidcBrokerConfigV3Request::class, [], 'GET', '/v3/sso/oidc-broker-config', 'one', OidcBrokerConfig::class, false, false],
    'SsoSettings\\GetSsoV3Request' => [GetSsoV3Request::class, [], 'GET', '/v3/sso', 'one', SsoSettingsV3::class, false, false],
    'SsoSettings\\ReplaceSsoOidcBrokerConfigV3Request' => [ReplaceSsoOidcBrokerConfigV3Request::class, [['name' => 'x']], 'PUT', '/v3/sso/oidc-broker-config', 'none', null, true, false],
    'SsoSettings\\ReplaceSsoV3Request' => [ReplaceSsoV3Request::class, [], 'PUT', '/v3/sso', 'one', SsoSettingsV3::class, true, false],
    'StartupStatus\\GetStartupStatusRequest' => [GetStartupStatusRequest::class, [], 'GET', '/startup-status', 'one', StartupStatus::class, false, false],
    'StaticUserGroupsPreview\\GetStaticUserGroupV1Request' => [GetStaticUserGroupV1Request::class, [7], 'GET', '/v1/static-user-groups/7', 'one', StaticUserGroup::class, false, false],
    'StaticUserGroupsPreview\\GetStaticUserGroupsV1Request' => [GetStaticUserGroupsV1Request::class, [], 'GET', '/v1/static-user-groups', 'list', StaticUserGroup::class, false, false],
    'SupervisionIdentitiesPreview\\CreateSupervisionIdentitiesV1Request' => [CreateSupervisionIdentitiesV1Request::class, [['name' => 'x']], 'POST', '/v1/supervision-identities', 'one', SupervisionIdentity::class, true, false],
    'SupervisionIdentitiesPreview\\DeleteSupervisionIdentityV1Request' => [DeleteSupervisionIdentityV1Request::class, [7], 'DELETE', '/v1/supervision-identities/7', 'none', null, false, false],
    'SupervisionIdentitiesPreview\\GetSupervisionIdentitiesV1Request' => [GetSupervisionIdentitiesV1Request::class, [], 'GET', '/v1/supervision-identities', 'list', SupervisionIdentity::class, false, true],
    'SupervisionIdentitiesPreview\\GetSupervisionIdentityDownloadV1Request' => [GetSupervisionIdentityDownloadV1Request::class, [7], 'GET', '/v1/supervision-identities/7/download', 'text', null, false, false],
    'SupervisionIdentitiesPreview\\GetSupervisionIdentityV1Request' => [GetSupervisionIdentityV1Request::class, [7], 'GET', '/v1/supervision-identities/7', 'one', SupervisionIdentity::class, false, false],
    'SupervisionIdentitiesPreview\\ReplaceSupervisionIdentityV1Request' => [ReplaceSupervisionIdentityV1Request::class, [7, ['name' => 'x']], 'PUT', '/v1/supervision-identities/7', 'one', SupervisionIdentity::class, true, false],
    'SupervisionIdentitiesPreview\\UploadSupervisionIdentitiesV1Request' => [UploadSupervisionIdentitiesV1Request::class, [['name' => 'x']], 'POST', '/v1/supervision-identities/upload', 'one', SupervisionIdentity::class, true, false],
    'TeacherApp\\CreateTeacherAppHistoryV1Request' => [CreateTeacherAppHistoryV1Request::class, [['name' => 'x']], 'POST', '/v1/teacher-app/history', 'one', HrefResponse::class, true, false],
    'TeacherApp\\GetTeacherAppHistoryV1Request' => [GetTeacherAppHistoryV1Request::class, [], 'GET', '/v1/teacher-app/history', 'list', ObjectHistory::class, false, true],
    'TeacherApp\\GetTeacherAppV1Request' => [GetTeacherAppV1Request::class, [], 'GET', '/v1/teacher-app', 'one', TeacherSettingsResponse::class, false, false],
    'TeacherApp\\ReplaceTeacherAppV1Request' => [ReplaceTeacherAppV1Request::class, [['name' => 'x']], 'PUT', '/v1/teacher-app', 'one', TeacherSettingsResponse::class, true, false],
    'TeamViewerRemoteAdministration\\CloseRemoteAdministrationConfigurationsTeamViewerSessionPreviewRequest' => [CloseRemoteAdministrationConfigurationsTeamViewerSessionPreviewRequest::class, [7, 7], 'POST', '/preview/remote-administration-configurations/team-viewer/7/sessions/7/close', 'none', null, false, false],
    'TeamViewerRemoteAdministration\\CreateRemoteAdministrationConfigurationsTeamViewerPreviewRequest' => [CreateRemoteAdministrationConfigurationsTeamViewerPreviewRequest::class, [['name' => 'x']], 'POST', '/preview/remote-administration-configurations/team-viewer', 'one', HrefResponse::class, true, false],
    'TeamViewerRemoteAdministration\\CreateRemoteAdministrationConfigurationsTeamViewerSessionsPreviewRequest' => [CreateRemoteAdministrationConfigurationsTeamViewerSessionsPreviewRequest::class, [7, ['name' => 'x']], 'POST', '/preview/remote-administration-configurations/team-viewer/7/sessions', 'one', HrefResponse::class, true, false],
    'TeamViewerRemoteAdministration\\DeleteRemoteAdministrationConfigurationsTeamViewerPreviewRequest' => [DeleteRemoteAdministrationConfigurationsTeamViewerPreviewRequest::class, [7], 'DELETE', '/preview/remote-administration-configurations/team-viewer/7', 'none', null, false, false],
    'TeamViewerRemoteAdministration\\GetRemoteAdministrationConfigurationsTeamViewerPreviewRequest' => [GetRemoteAdministrationConfigurationsTeamViewerPreviewRequest::class, [7], 'GET', '/preview/remote-administration-configurations/team-viewer/7', 'one', ConnectionConfigurationResponse::class, false, false],
    'TeamViewerRemoteAdministration\\GetRemoteAdministrationConfigurationsTeamViewerSessionPreviewRequest' => [GetRemoteAdministrationConfigurationsTeamViewerSessionPreviewRequest::class, [7, 7], 'GET', '/preview/remote-administration-configurations/team-viewer/7/sessions/7', 'one', SessionDetails::class, false, false],
    'TeamViewerRemoteAdministration\\GetRemoteAdministrationConfigurationsTeamViewerSessionStatusPreviewRequest' => [GetRemoteAdministrationConfigurationsTeamViewerSessionStatusPreviewRequest::class, [7, 7], 'GET', '/preview/remote-administration-configurations/team-viewer/7/sessions/7/status', 'one', SessionStatus::class, false, false],
    'TeamViewerRemoteAdministration\\GetRemoteAdministrationConfigurationsTeamViewerSessionsPreviewRequest' => [GetRemoteAdministrationConfigurationsTeamViewerSessionsPreviewRequest::class, [7], 'GET', '/preview/remote-administration-configurations/team-viewer/7/sessions', 'list', SessionDetails::class, false, true],
    'TeamViewerRemoteAdministration\\GetRemoteAdministrationConfigurationsTeamViewerStatusPreviewRequest' => [GetRemoteAdministrationConfigurationsTeamViewerStatusPreviewRequest::class, [7], 'GET', '/preview/remote-administration-configurations/team-viewer/7/status', 'one', ConnectionConfigurationStatusResponse::class, false, false],
    'TeamViewerRemoteAdministration\\ResendRemoteAdministrationConfigurationsTeamViewerSessionNotificationPreviewRequest' => [ResendRemoteAdministrationConfigurationsTeamViewerSessionNotificationPreviewRequest::class, [7, 7], 'POST', '/preview/remote-administration-configurations/team-viewer/7/sessions/7/resend-notification', 'none', null, false, false],
    'TeamViewerRemoteAdministration\\UpdateRemoteAdministrationConfigurationsTeamViewerPreviewRequest' => [UpdateRemoteAdministrationConfigurationsTeamViewerPreviewRequest::class, [7, ['name' => 'x']], 'PATCH', '/preview/remote-administration-configurations/team-viewer/7', 'one', ConnectionConfigurationResponse::class, true, false],
    'TimeZonesPreview\\GetTimeZonesV1Request' => [GetTimeZonesV1Request::class, [], 'GET', '/v1/time-zones', 'list', TimeZone::class, false, false],
    'TomcatSettingsPreview\\IssueSettingsTomcatSslCertificateRequest' => [IssueSettingsTomcatSslCertificateRequest::class, [], 'POST', '/settings/issueTomcatSslCertificate', 'none', null, false, false],
    'User\\ChangeUserPasswordV1Request' => [ChangeUserPasswordV1Request::class, [['name' => 'x']], 'POST', '/v1/user/change-password', 'none', null, true, false],
    'UserSessionPreview\\CreateUserUpdateSessionRequest' => [CreateUserUpdateSessionRequest::class, [], 'POST', '/user/updateSession', 'one', Session::class, true, false],
    'UserSessionPreview\\GetUserRequest' => [GetUserRequest::class, [], 'GET', '/user', 'list', Account::class, false, false],
    'UserSessions\\GetUserSessionsActiveV1Request' => [GetUserSessionsActiveV1Request::class, [], 'GET', '/v1/user-sessions/active', 'list', ActiveUserSession::class, false, false],
    'UserSessions\\GetUserSessionsCountV1Request' => [GetUserSessionsCountV1Request::class, [], 'GET', '/v1/user-sessions/count', 'one', ActiveUsersCount::class, false, false],
    'Users\\CreateUsersV1Request' => [CreateUsersV1Request::class, [['name' => 'x']], 'POST', '/v1/users', 'one', HrefResponse::class, true, false],
    'Users\\DeleteUserV1Request' => [DeleteUserV1Request::class, [7], 'DELETE', '/v1/users/7', 'none', null, false, false],
    'Users\\GetUserV1Request' => [GetUserV1Request::class, [7], 'GET', '/v1/users/7', 'one', User::class, false, false],
    'Users\\GetUsersV1Request' => [GetUsersV1Request::class, [], 'GET', '/v1/users', 'list', User::class, false, true],
    'Users\\ReplaceUserV1Request' => [ReplaceUserV1Request::class, [7, ['name' => 'x']], 'PUT', '/v1/users/7', 'none', null, true, false],
    'VenafiPreview\\CreatePkiVenafiHistoryV1Request' => [CreatePkiVenafiHistoryV1Request::class, [7, ['name' => 'x']], 'POST', '/v1/pki/venafi/7/history', 'one', HrefResponse::class, true, false],
    'VenafiPreview\\CreatePkiVenafiProxyTrustStoreV1Request' => [CreatePkiVenafiProxyTrustStoreV1Request::class, [7, 'text'], 'POST', '/v1/pki/venafi/7/proxy-trust-store', 'none', null, true, false],
    'VenafiPreview\\CreatePkiVenafiV1Request' => [CreatePkiVenafiV1Request::class, [['name' => 'x']], 'POST', '/v1/pki/venafi', 'one', HrefResponse::class, true, false],
    'VenafiPreview\\DeletePkiVenafiProxyTrustStoreV1Request' => [DeletePkiVenafiProxyTrustStoreV1Request::class, [7], 'DELETE', '/v1/pki/venafi/7/proxy-trust-store', 'none', null, false, false],
    'VenafiPreview\\DeletePkiVenafiV1Request' => [DeletePkiVenafiV1Request::class, [7], 'DELETE', '/v1/pki/venafi/7', 'none', null, false, false],
    'VenafiPreview\\GetPkiVenafiConnectionStatusV1Request' => [GetPkiVenafiConnectionStatusV1Request::class, [7], 'GET', '/v1/pki/venafi/7/connection-status', 'one', VenafiServiceStatus::class, false, false],
    'VenafiPreview\\GetPkiVenafiDependentProfilesV1Request' => [GetPkiVenafiDependentProfilesV1Request::class, [7], 'GET', '/v1/pki/venafi/7/dependent-profiles', 'list', VenafiPkiPayloadRecord::class, false, false],
    'VenafiPreview\\GetPkiVenafiHistoryV1Request' => [GetPkiVenafiHistoryV1Request::class, [7], 'GET', '/v1/pki/venafi/7/history', 'list', ObjectHistory::class, false, true],
    'VenafiPreview\\GetPkiVenafiJamfPublicKeyV1Request' => [GetPkiVenafiJamfPublicKeyV1Request::class, [7], 'GET', '/v1/pki/venafi/7/jamf-public-key', 'text', null, false, false],
    'VenafiPreview\\GetPkiVenafiProxyTrustStoreV1Request' => [GetPkiVenafiProxyTrustStoreV1Request::class, [7], 'GET', '/v1/pki/venafi/7/proxy-trust-store', 'text', null, false, false],
    'VenafiPreview\\GetPkiVenafiV1Request' => [GetPkiVenafiV1Request::class, [7], 'GET', '/v1/pki/venafi/7', 'one', VenafiCaRecord::class, false, false],
    'VenafiPreview\\RegeneratePkiVenafiJamfPublicKeyV1Request' => [RegeneratePkiVenafiJamfPublicKeyV1Request::class, [7], 'POST', '/v1/pki/venafi/7/jamf-public-key/regenerate', 'none', null, false, false],
    'VenafiPreview\\UpdatePkiVenafiV1Request' => [UpdatePkiVenafiV1Request::class, [7, ['name' => 'x']], 'PATCH', '/v1/pki/venafi/7', 'one', VenafiCaRecord::class, true, false],
    'VolumePurchasingLocations\\CreateVolumePurchasingLocationHistoryV1Request' => [CreateVolumePurchasingLocationHistoryV1Request::class, [7, ['name' => 'x']], 'POST', '/v1/volume-purchasing-locations/7/history', 'one', ObjectHistory::class, true, false],
    'VolumePurchasingLocations\\CreateVolumePurchasingLocationsV1Request' => [CreateVolumePurchasingLocationsV1Request::class, [['name' => 'x']], 'POST', '/v1/volume-purchasing-locations', 'one', HrefResponse::class, true, false],
    'VolumePurchasingLocations\\DeleteVolumePurchasingLocationV1Request' => [DeleteVolumePurchasingLocationV1Request::class, [7], 'DELETE', '/v1/volume-purchasing-locations/7', 'none', null, false, false],
    'VolumePurchasingLocations\\GetVolumePurchasingLocationContentV1Request' => [GetVolumePurchasingLocationContentV1Request::class, [7], 'GET', '/v1/volume-purchasing-locations/7/content', 'list', VolumePurchasingContent::class, false, true],
    'VolumePurchasingLocations\\GetVolumePurchasingLocationHistoryV1Request' => [GetVolumePurchasingLocationHistoryV1Request::class, [7], 'GET', '/v1/volume-purchasing-locations/7/history', 'list', ObjectHistory::class, false, true],
    'VolumePurchasingLocations\\GetVolumePurchasingLocationV1Request' => [GetVolumePurchasingLocationV1Request::class, [7], 'GET', '/v1/volume-purchasing-locations/7', 'one', VolumePurchasingLocation::class, false, false],
    'VolumePurchasingLocations\\GetVolumePurchasingLocationsV1Request' => [GetVolumePurchasingLocationsV1Request::class, [], 'GET', '/v1/volume-purchasing-locations', 'list', VolumePurchasingLocationListView::class, false, true],
    'VolumePurchasingLocations\\ReclaimVolumePurchasingLocationV1Request' => [ReclaimVolumePurchasingLocationV1Request::class, [7], 'POST', '/v1/volume-purchasing-locations/7/reclaim', 'none', null, false, false],
    'VolumePurchasingLocations\\RevokeVolumePurchasingLocationLicensesV1Request' => [RevokeVolumePurchasingLocationLicensesV1Request::class, [7], 'POST', '/v1/volume-purchasing-locations/7/revoke-licenses', 'none', null, false, false],
    'VolumePurchasingLocations\\UpdateVolumePurchasingLocationV1Request' => [UpdateVolumePurchasingLocationV1Request::class, [7, ['name' => 'x']], 'PATCH', '/v1/volume-purchasing-locations/7', 'one', VolumePurchasingLocation::class, true, false],
    'VolumePurchasingSubscriptions\\CreateVolumePurchasingSubscriptionHistoryV1Request' => [CreateVolumePurchasingSubscriptionHistoryV1Request::class, [7, ['name' => 'x']], 'POST', '/v1/volume-purchasing-subscriptions/7/history', 'one', HrefResponse::class, true, false],
    'VolumePurchasingSubscriptions\\CreateVolumePurchasingSubscriptionsV1Request' => [CreateVolumePurchasingSubscriptionsV1Request::class, [['name' => 'x']], 'POST', '/v1/volume-purchasing-subscriptions', 'one', HrefResponse::class, true, false],
    'VolumePurchasingSubscriptions\\DeleteVolumePurchasingSubscriptionV1Request' => [DeleteVolumePurchasingSubscriptionV1Request::class, [7], 'DELETE', '/v1/volume-purchasing-subscriptions/7', 'none', null, false, false],
    'VolumePurchasingSubscriptions\\GetVolumePurchasingSubscriptionHistoryV1Request' => [GetVolumePurchasingSubscriptionHistoryV1Request::class, [7], 'GET', '/v1/volume-purchasing-subscriptions/7/history', 'list', ObjectHistory::class, false, true],
    'VolumePurchasingSubscriptions\\GetVolumePurchasingSubscriptionV1Request' => [GetVolumePurchasingSubscriptionV1Request::class, [7], 'GET', '/v1/volume-purchasing-subscriptions/7', 'one', VolumePurchasingSubscription::class, false, false],
    'VolumePurchasingSubscriptions\\GetVolumePurchasingSubscriptionsV1Request' => [GetVolumePurchasingSubscriptionsV1Request::class, [], 'GET', '/v1/volume-purchasing-subscriptions', 'list', VolumePurchasingSubscription::class, false, true],
    'VolumePurchasingSubscriptions\\ReplaceVolumePurchasingSubscriptionV1Request' => [ReplaceVolumePurchasingSubscriptionV1Request::class, [7, ['name' => 'x']], 'PUT', '/v1/volume-purchasing-subscriptions/7', 'one', VolumePurchasingSubscription::class, true, false],
];
