# Endpoints

Every call the package makes to Jamf: all 803 operations in the Jamf Pro API and all 446 in the Classic API, as Jamf's own schemas described them on 2026-11-04 (the Jamf Pro API's at `/api/schema`, the Classic API's at `/classicapi/doc/swagger.json`).

Jamf Pro API resources are reached from the facade, `Jamf::{resource}()`; Classic API resources from `Jamf::classic()->{resource}()`. Each resource has a method for every request in its group, named as the request is (without `Request`) and taking the same arguments. Requests are plain Saloon classes under `spkm\Jamf\Pro\Requests\{Group}` and `spkm\Jamf\Classic\Requests\{Group}`, for `Jamf::send()` and `Jamf::classic()->send()`. Endpoints Jamf has deprecated are marked so, and their classes carry `@deprecated`.

## Contents

### Jamf Pro API

- [`accountGroups()`](#pro-account-groups) (2)
- [`accounts()`](#pro-accounts) (5)
- [`activationCode()`](#pro-activation-code) (5)
- [`adcsSettings()`](#pro-adcs-settings) (9)
- [`advancedMobileDeviceSearches()`](#pro-advanced-mobile-device-searches) (7)
- [`advancedUserContentSearches()`](#pro-advanced-user-content-searches) (5)
- [`apiAuthentication()`](#pro-api-authentication) (9)
- [`apiIntegrations()`](#pro-api-integrations) (6)
- [`apiRolePrivileges()`](#pro-api-role-privileges) (2)
- [`apiRoles()`](#pro-api-roles) (5)
- [`apnsClientPushStatus()`](#pro-apns-client-push-status) (4)
- [`appRequestPreview()`](#pro-app-request-preview) (8)
- [`appStoreCountryCodesPreview()`](#pro-app-store-country-codes-preview) (1)
- [`branding()`](#pro-branding) (1)
- [`buildings()`](#pro-buildings) (10)
- [`cacheSettings()`](#pro-cache-settings) (2)
- [`categories()`](#pro-categories) (8)
- [`certificateAuthority()`](#pro-certificate-authority) (6)
- [`classicLdap()`](#pro-classic-ldap) (1)
- [`clientCheckIn()`](#pro-client-check-in) (4)
- [`cloudAzure()`](#pro-cloud-azure) (6)
- [`cloudDistributionPoint()`](#pro-cloud-distribution-point) (11)
- [`cloudIdp()`](#pro-cloud-idp) (8)
- [`cloudInformation()`](#pro-cloud-information) (1)
- [`cloudLdap()`](#pro-cloud-ldap) (12)
- [`computerExtensionAttributes()`](#pro-computer-extension-attributes) (13)
- [`computerGroups()`](#pro-computer-groups) (23)
- [`computerInventory()`](#pro-computer-inventory) (56)
- [`computerInventoryCollectionSettings()`](#pro-computer-inventory-collection-settings) (8)
- [`computerPrestages()`](#pro-computer-prestages) (10)
- [`computersPreview()`](#pro-computers-preview) (1)
- [`conditionalAccess()`](#pro-conditional-access) (3)
- [`csa()`](#pro-csa) (3)
- [`dashboard()`](#pro-dashboard) (2)
- [`declarativeDeviceManagement()`](#pro-declarative-device-management) (4)
- [`departments()`](#pro-departments) (8)
- [`deviceCommunicationSettings()`](#pro-device-communication-settings) (4)
- [`deviceEnrollments()`](#pro-device-enrollments) (13)
- [`deviceEnrollmentsDevices()`](#pro-device-enrollments-devices) (1)
- [`devices()`](#pro-devices) (1)
- [`digicert()`](#pro-digicert) (8)
- [`distributionPoint()`](#pro-distribution-point) (9)
- [`dockItems()`](#pro-dock-items) (4)
- [`ebooks()`](#pro-ebooks) (3)
- [`enrollment()`](#pro-enrollment) (21)
- [`enrollmentCustomization()`](#pro-enrollment-customization) (10)
- [`enrollmentCustomizationPreview()`](#pro-enrollment-customization-preview) (17)
- [`groups()`](#pro-groups) (8)
- [`gsxConnection()`](#pro-gsx-connection) (6)
- [`healthCheck()`](#pro-health-check) (2)
- [`icon()`](#pro-icon) (3)
- [`impactAlertNotificationSettings()`](#pro-impact-alert-notification-settings) (2)
- [`inventoryInformation()`](#pro-inventory-information) (1)
- [`inventoryPreload()`](#pro-inventory-preload) (14)
- [`jamfCloudDistributionService()`](#pro-jamf-cloud-distribution-service) (6)
- [`jamfConnect()`](#pro-jamf-connect) (7)
- [`jamfManagementFramework()`](#pro-jamf-management-framework) (1)
- [`jamfPackage()`](#pro-jamf-package) (2)
- [`jamfProAccountPreferences()`](#pro-jamf-pro-account-preferences) (4)
- [`jamfProInformation()`](#pro-jamf-pro-information) (1)
- [`jamfProInitialization()`](#pro-jamf-pro-initialization) (4)
- [`jamfProNotifications()`](#pro-jamf-pro-notifications) (3)
- [`jamfProServerUrlPreview()`](#pro-jamf-pro-server-url-preview) (4)
- [`jamfProUserAccountSettings()`](#pro-jamf-pro-user-account-settings) (4)
- [`jamfProVersion()`](#pro-jamf-pro-version) (1)
- [`jamfProtect()`](#pro-jamf-protect) (10)
- [`jamfRemoteAssist()`](#pro-jamf-remote-assist) (5)
- [`lastLogin()`](#pro-last-login) (1)
- [`ldap()`](#pro-ldap) (5)
- [`localAdminPassword()`](#pro-local-admin-password) (12)
- [`localesPreview()`](#pro-locales-preview) (1)
- [`logFlushing()`](#pro-log-flushing) (5)
- [`loginCustomization()`](#pro-login-customization) (2)
- [`m2m()`](#pro-m2m) (1)
- [`macosManagedSoftwareUpdates()`](#pro-macos-managed-software-updates) (2)
- [`managedSoftwareUpdates()`](#pro-managed-software-updates) (17)
- [`mdm()`](#pro-mdm) (6)
- [`mdmRenewal()`](#pro-mdm-renewal) (4)
- [`mobileDeviceApps()`](#pro-mobile-device-apps) (1)
- [`mobileDeviceEnrollmentProfile()`](#pro-mobile-device-enrollment-profile) (1)
- [`mobileDeviceExtensionAttributes()`](#pro-mobile-device-extension-attributes) (8)
- [`mobileDeviceExtensionAttributesPreview()`](#pro-mobile-device-extension-attributes-preview) (1)
- [`mobileDeviceGroups()`](#pro-mobile-device-groups) (28)
- [`mobileDevicePrestages()`](#pro-mobile-device-prestages) (28)
- [`mobileDevices()`](#pro-mobile-devices) (8)
- [`oidc()`](#pro-oidc) (6)
- [`onboarding()`](#pro-onboarding) (8)
- [`packages()`](#pro-packages) (13)
- [`parentAppPreview()`](#pro-parent-app-preview) (4)
- [`patchManagement()`](#pro-patch-management) (1)
- [`patchPolicies()`](#pro-patch-policies) (5)
- [`patchPolicyLogs()`](#pro-patch-policy-logs) (6)
- [`patchSoftwareTitleConfigurations()`](#pro-patch-software-title-configurations) (34)
- [`policiesPreview()`](#pro-policies-preview) (4)
- [`reEnrollmentPreview()`](#pro-re-enrollment-preview) (5)
- [`remoteAdministration()`](#pro-remote-administration) (1)
- [`returnToService()`](#pro-return-to-service) (5)
- [`scheduler()`](#pro-scheduler) (3)
- [`scripts()`](#pro-scripts) (8)
- [`selfService()`](#pro-self-service) (4)
- [`selfServiceBrandingIos()`](#pro-self-service-branding-ios) (5)
- [`selfServiceBrandingMacos()`](#pro-self-service-branding-macos) (5)
- [`selfServiceBrandingPreview()`](#pro-self-service-branding-preview) (1)
- [`selfServicePlus()`](#pro-self-service-plus) (3)
- [`serviceDiscoveryEnrollment()`](#pro-service-discovery-enrollment) (2)
- [`sites()`](#pro-sites) (2)
- [`slasa()`](#pro-slasa) (2)
- [`smartComputerGroupsPreview()`](#pro-smart-computer-groups-preview) (2)
- [`smartMobileDeviceGroupsPreview()`](#pro-smart-mobile-device-groups-preview) (2)
- [`smartUserGroupsPreview()`](#pro-smart-user-groups-preview) (2)
- [`smtpServer()`](#pro-smtp-server) (6)
- [`ssoCertificate()`](#pro-sso-certificate) (6)
- [`ssoFailover()`](#pro-sso-failover) (2)
- [`ssoOauthSessionTokens()`](#pro-sso-oauth-session-tokens) (1)
- [`ssoSettings()`](#pro-sso-settings) (9)
- [`startupStatus()`](#pro-startup-status) (1)
- [`staticUserGroupsPreview()`](#pro-static-user-groups-preview) (2)
- [`supervisionIdentitiesPreview()`](#pro-supervision-identities-preview) (7)
- [`teacherApp()`](#pro-teacher-app) (4)
- [`teamViewerRemoteAdministration()`](#pro-team-viewer-remote-administration) (11)
- [`timeZonesPreview()`](#pro-time-zones-preview) (1)
- [`tomcatSettingsPreview()`](#pro-tomcat-settings-preview) (1)
- [`user()`](#pro-user) (1)
- [`userSessionPreview()`](#pro-user-session-preview) (2)
- [`userSessions()`](#pro-user-sessions) (2)
- [`users()`](#pro-users) (5)
- [`venafiPreview()`](#pro-venafi-preview) (13)
- [`volumePurchasingLocations()`](#pro-volume-purchasing-locations) (10)
- [`volumePurchasingSubscriptions()`](#pro-volume-purchasing-subscriptions) (7)

### Classic API

- [`classic()->accounts()`](#classic-accounts) (11)
- [`classic()->activationCode()`](#classic-activationcode) (2)
- [`classic()->advancedComputerSearches()`](#classic-advancedcomputersearches) (6)
- [`classic()->advancedMobileDeviceSearches()`](#classic-advancedmobiledevicesearches) (6)
- [`classic()->advancedUserSearches()`](#classic-advancedusersearches) (6)
- [`classic()->allowedFileExtensions()`](#classic-allowedfileextensions) (5)
- [`classic()->buildings()`](#classic-buildings) (6)
- [`classic()->categories()`](#classic-categories) (6)
- [`classic()->classes()`](#classic-classes) (6)
- [`classic()->commandFlush()`](#classic-commandflush) (2)
- [`classic()->computerApplicationUsage()`](#classic-computerapplicationusage) (5)
- [`classic()->computerApplications()`](#classic-computerapplications) (4)
- [`classic()->computerCheckIn()`](#classic-computercheckin) (2)
- [`classic()->computerCommands()`](#classic-computercommands) (7)
- [`classic()->computerExtensionAttributes()`](#classic-computerextensionattributes) (6)
- [`classic()->computerGroups()`](#classic-computergroups) (6)
- [`classic()->computerHardwareSoftwareReports()`](#classic-computerhardwaresoftwarereports) (6)
- [`classic()->computerHistory()`](#classic-computerhistory) (6)
- [`classic()->computerInventoryCollection()`](#classic-computerinventorycollection) (2)
- [`classic()->computerInvitations()`](#classic-computerinvitations) (6)
- [`classic()->computerManagement()`](#classic-computermanagement) (9)
- [`classic()->computerReports()`](#classic-computerreports) (3)
- [`classic()->computers()`](#classic-computers) (14)
- [`classic()->departments()`](#classic-departments) (6)
- [`classic()->directoryBindings()`](#classic-directorybindings) (6)
- [`classic()->diskEncryptionConfigurations()`](#classic-diskencryptionconfigurations) (6)
- [`classic()->distributionPoints()`](#classic-distributionpoints) (6)
- [`classic()->dockItems()`](#classic-dockitems) (6)
- [`classic()->ebooks()`](#classic-ebooks) (7)
- [`classic()->fileUploads()`](#classic-fileuploads) (1)
- [`classic()->gsxConnection()`](#classic-gsxconnection) (2)
- [`classic()->healthcareListenerRules()`](#classic-healthcarelistenerrule) (4)
- [`classic()->healthcareListeners()`](#classic-healthcarelistener) (3)
- [`classic()->ibeacons()`](#classic-ibeacons) (6)
- [`classic()->infrastructureManagers()`](#classic-infrastructuremanager) (3)
- [`classic()->jsonWebTokenConfigurations()`](#classic-jsonwebtokenconfigurations) (5)
- [`classic()->jssUser()`](#classic-jssuser) (1)
- [`classic()->ldapServers()`](#classic-ldapservers) (9)
- [`classic()->licensedSoftware()`](#classic-licensedsoftware) (6)
- [`classic()->logFlush()`](#classic-logflush) (3)
- [`classic()->macApplications()`](#classic-macapplications) (7)
- [`classic()->mobileDeviceApplications()`](#classic-mobiledeviceapplications) (9)
- [`classic()->mobileDeviceCommands()`](#classic-mobiledevicecommands) (10)
- [`classic()->mobileDeviceConfigurationProfiles()`](#classic-mobiledeviceconfigurationprofiles) (7)
- [`classic()->mobileDeviceEnrollmentProfiles()`](#classic-mobiledeviceenrollmentprofiles) (8)
- [`classic()->mobileDeviceExtensionAttributes()`](#classic-mobiledeviceextensionattributes) (6)
- [`classic()->mobileDeviceGroups()`](#classic-mobiledevicegroups) (6)
- [`classic()->mobileDeviceHistory()`](#classic-mobiledevicehistory) (6)
- [`classic()->mobileDeviceInvitations()`](#classic-mobiledeviceinvitations) (5)
- [`classic()->mobileDeviceProvisioningProfiles()`](#classic-mobiledeviceprovisioningprofiles) (8)
- [`classic()->mobileDevices()`](#classic-mobiledevices) (11)
- [`classic()->networkSegments()`](#classic-networksegments) (6)
- [`classic()->osxConfigurationProfiles()`](#classic-osxconfigurationprofiles) (7)
- [`classic()->packages()`](#classic-packages) (6)
- [`classic()->patchAvailableTitles()`](#classic-patchavailabletitles) (1)
- [`classic()->patchExternalSources()`](#classic-patchexternalsources) (5)
- [`classic()->patchInternalSources()`](#classic-patchinternalsources) (3)
- [`classic()->patchPolicies()`](#classic-patchpolicies) (7)
- [`classic()->patchReports()`](#classic-patchreports) (2)
- [`classic()->patchSoftwareTitles()`](#classic-patchsoftwaretitles) (5)
- [`classic()->patches()`](#classic-patches) (7)
- [`classic()->peripheralTypes()`](#classic-peripheraltypes) (5)
- [`classic()->peripherals()`](#classic-peripherals) (6)
- [`classic()->policies()`](#classic-policies) (9)
- [`classic()->printers()`](#classic-printers) (6)
- [`classic()->removableMacAddresses()`](#classic-removablemacaddresses) (6)
- [`classic()->restrictedSoftware()`](#classic-restrictedsoftware) (6)
- [`classic()->savedSearches()`](#classic-savedsearches) (3)
- [`classic()->scripts()`](#classic-scripts) (6)
- [`classic()->sites()`](#classic-sites) (6)
- [`classic()->smtpServer()`](#classic-smtpserver) (2)
- [`classic()->softwareUpdateServers()`](#classic-softwareupdateservers) (6)
- [`classic()->userExtensionAttributes()`](#classic-userextensionattributes) (6)
- [`classic()->userGroups()`](#classic-usergroups) (6)
- [`classic()->users()`](#classic-users) (7)
- [`classic()->vppAccounts()`](#classic-vppaccounts) (5)
- [`classic()->vppAssignments()`](#classic-vppassignments) (5)
- [`classic()->vppInvitations()`](#classic-vppinvitations) (6)
- [`classic()->webhooks()`](#classic-webhooks) (6)

## Jamf Pro API

<a id="pro-account-groups"></a>
### account-groups

`Jamf::accountGroups()`

As a builder over `GET /v1/account-groups` (`AccountGroupV1` records): `where()`, `orderBy()`, `get()`, `first()`, `count()`, `all()`, `lazy()`, `paginate()`, `find($id)`.

| Request | Method | Path | Returns |
|---|---|---|---|
| `AccountGroups\GetAccountGroupsV1Request` | GET | `/v1/account-groups` | a builder over `AccountGroupV1` records |
| `AccountGroups\GetAccountGroupV1Request` | GET | `/v1/account-groups/{id}` | `AccountGroupV1` |

<a id="pro-accounts"></a>
### accounts

`Jamf::accounts()`

As a builder over `GET /v1/accounts` (`UserAccount` records): `where()`, `orderBy()`, `get()`, `first()`, `count()`, `all()`, `lazy()`, `paginate()`, `find($id)`, `create()`, `update()`, `delete()`.

| Request | Method | Path | Returns |
|---|---|---|---|
| `Accounts\GetAccountsV1Request` | GET | `/v1/accounts` | a builder over `UserAccount` records |
| `Accounts\CreateAccountsV1Request` | POST | `/v1/accounts` | `UserAccount` |
| `Accounts\GetAccountV1Request` | GET | `/v1/accounts/{id}` | `UserAccount` |
| `Accounts\ReplaceAccountV1Request` | PUT | `/v1/accounts/{id}` | `UserAccount` |
| `Accounts\DeleteAccountV1Request` | DELETE | `/v1/accounts/{id}` | true |

<a id="pro-activation-code"></a>
### activation-code

`Jamf::activationCode()`

As a builder over `GET /v1/activation-code/history` (`ObjectHistory` records): `where()`, `orderBy()`, `get()`, `first()`, `count()`, `all()`, `lazy()`, `paginate()`, `create()`.

| Request | Method | Path | Returns |
|---|---|---|---|
| `ActivationCode\ReplaceActivationCodeV1Request` | PUT | `/v1/activation-code` | true |
| `ActivationCode\GetActivationCodeHistoryV1Request` | GET | `/v1/activation-code/history` | a builder over `ObjectHistory` records |
| `ActivationCode\CreateActivationCodeHistoryV1Request` | POST | `/v1/activation-code/history` | `ObjectHistory` |
| `ActivationCode\ExportActivationCodeHistoryV1Request` | POST | `/v1/activation-code/history/export` | the body as text (text/csv) |
| `ActivationCode\UpdateActivationCodeOrganizationNameV1Request` | PATCH | `/v1/activation-code/organization-name` | true |

<a id="pro-adcs-settings"></a>
### adcs-settings

`Jamf::adcsSettings()`

| Request | Method | Path | Returns |
|---|---|---|---|
| `AdcsSettings\CreatePkiAdcsSettingsV1Request` | POST | `/v1/pki/adcs-settings` | the body as text |
| `AdcsSettings\ValidatePkiAdcsSettingsCertificateV1Request` | POST | `/v1/pki/adcs-settings/validate-certificate` | true |
| `AdcsSettings\ValidatePkiAdcsSettingsClientCertificateV1Request` | POST | `/v1/pki/adcs-settings/validate-client-certificate` | true |
| `AdcsSettings\GetPkiAdcSettingsV1Request` | GET | `/v1/pki/adcs-settings/{id}` | `AdcsSettingsResponse` |
| `AdcsSettings\UpdatePkiAdcSettingsV1Request` | PATCH | `/v1/pki/adcs-settings/{id}` | true |
| `AdcsSettings\DeletePkiAdcSettingsV1Request` | DELETE | `/v1/pki/adcs-settings/{id}` | true |
| `AdcsSettings\GetPkiAdcSettingsDependenciesV1Request` | GET | `/v1/pki/adcs-settings/{id}/dependencies` | Collection of `AdcsDependency` |
| `AdcsSettings\GetPkiAdcSettingsHistoryV1Request` | GET | `/v1/pki/adcs-settings/{id}/history` | a builder over `ObjectHistory` records |
| `AdcsSettings\CreatePkiAdcSettingsHistoryV1Request` | POST | `/v1/pki/adcs-settings/{id}/history` | `HrefResponse` |

<a id="pro-advanced-mobile-device-searches"></a>
### advanced-mobile-device-searches

`Jamf::advancedMobileDeviceSearches()`

| Request | Method | Path | Returns |
|---|---|---|---|
| `AdvancedMobileDeviceSearches\GetAdvancedMobileDeviceSearchesV1Request` | GET | `/v1/advanced-mobile-device-searches` | Collection of `AdvancedSearch` |
| `AdvancedMobileDeviceSearches\CreateAdvancedMobileDeviceSearchesV1Request` | POST | `/v1/advanced-mobile-device-searches` | `HrefResponse` |
| `AdvancedMobileDeviceSearches\GetAdvancedMobileDeviceSearchesChoicesV1Request` | GET | `/v1/advanced-mobile-device-searches/choices` | `AdvancedSearchCriteriaChoices` |
| `AdvancedMobileDeviceSearches\DeleteMultipleAdvancedMobileDeviceSearchesV1Request` | POST | `/v1/advanced-mobile-device-searches/delete-multiple` | true |
| `AdvancedMobileDeviceSearches\GetAdvancedMobileDeviceSearchV1Request` | GET | `/v1/advanced-mobile-device-searches/{id}` | `AdvancedSearch` |
| `AdvancedMobileDeviceSearches\ReplaceAdvancedMobileDeviceSearchV1Request` | PUT | `/v1/advanced-mobile-device-searches/{id}` | `AdvancedSearch` |
| `AdvancedMobileDeviceSearches\DeleteAdvancedMobileDeviceSearchV1Request` | DELETE | `/v1/advanced-mobile-device-searches/{id}` | true |

<a id="pro-advanced-user-content-searches"></a>
### advanced-user-content-searches

`Jamf::advancedUserContentSearches()`

| Request | Method | Path | Returns |
|---|---|---|---|
| `AdvancedUserContentSearches\GetAdvancedUserContentSearchesV1Request` | GET | `/v1/advanced-user-content-searches` | Collection of `AdvancedUserContentSearch` |
| `AdvancedUserContentSearches\CreateAdvancedUserContentSearchesV1Request` | POST | `/v1/advanced-user-content-searches` | `HrefResponse` |
| `AdvancedUserContentSearches\GetAdvancedUserContentSearchV1Request` | GET | `/v1/advanced-user-content-searches/{id}` | `AdvancedUserContentSearch` |
| `AdvancedUserContentSearches\ReplaceAdvancedUserContentSearchV1Request` | PUT | `/v1/advanced-user-content-searches/{id}` | `AdvancedUserContentSearch` |
| `AdvancedUserContentSearches\DeleteAdvancedUserContentSearchV1Request` | DELETE | `/v1/advanced-user-content-searches/{id}` | true |

<a id="pro-api-authentication"></a>
### api-authentication

`Jamf::apiAuthentication()`

| Request | Method | Path | Returns |
|---|---|---|---|
| `ApiAuthentication\GetAuthRequest` (deprecated) | GET | `/auth` | `Authorization` |
| `ApiAuthentication\CreateAuthCurrentRequest` (deprecated) | POST | `/auth/current` | `CurrentAuthorization` |
| `ApiAuthentication\InvalidateAuthTokenRequest` (deprecated) | POST | `/auth/invalidateToken` | true |
| `ApiAuthentication\KeepAuthTokenAliveRequest` (deprecated) | POST | `/auth/keepAlive` | `AuthToken` |
| `ApiAuthentication\GetAuthV1Request` | GET | `/v1/auth` | `AuthorizationV1` |
| `ApiAuthentication\InvalidateAuthTokenV1Request` | POST | `/v1/auth/invalidate-token` | true |
| `ApiAuthentication\KeepAuthTokenAliveV1Request` | POST | `/v1/auth/keep-alive` | `AuthTokenV1` |
| `ApiAuthentication\CreateAuthTokenV1Request` | POST | `/v1/auth/token` | `AuthTokenV1` |
| `ApiAuthentication\CreateOauthTokenV1Request` | POST | `/v1/oauth/token` | `OAuthTokenResponse` |

<a id="pro-api-integrations"></a>
### api-integrations

`Jamf::apiIntegrations()`

As a builder over `GET /v1/api-integrations` (`ApiIntegrationResponse` records): `where()`, `orderBy()`, `get()`, `first()`, `count()`, `all()`, `lazy()`, `paginate()`, `find($id)`, `create()`, `update()`, `delete()`.

| Request | Method | Path | Returns |
|---|---|---|---|
| `ApiIntegrations\GetApiIntegrationsV1Request` | GET | `/v1/api-integrations` | a builder over `ApiIntegrationResponse` records |
| `ApiIntegrations\CreateApiIntegrationsV1Request` | POST | `/v1/api-integrations` | `ApiIntegrationResponse` |
| `ApiIntegrations\GetApiIntegrationV1Request` | GET | `/v1/api-integrations/{id}` | `ApiIntegrationResponse` |
| `ApiIntegrations\ReplaceApiIntegrationV1Request` | PUT | `/v1/api-integrations/{id}` | `ApiIntegrationResponse` |
| `ApiIntegrations\DeleteApiIntegrationV1Request` | DELETE | `/v1/api-integrations/{id}` | true |
| `ApiIntegrations\CreateApiIntegrationClientCredentialsV1Request` | POST | `/v1/api-integrations/{id}/client-credentials` | `OAuthClientCredentials` |

<a id="pro-api-role-privileges"></a>
### api-role-privileges

`Jamf::apiRolePrivileges()`

| Request | Method | Path | Returns |
|---|---|---|---|
| `ApiRolePrivileges\GetApiRolePrivilegesV1Request` | GET | `/v1/api-role-privileges` | `ApiRolePrivileges` |
| `ApiRolePrivileges\GetApiRolePrivilegesSearchV1Request` | GET | `/v1/api-role-privileges/search` | `ApiRolePrivileges` |

<a id="pro-api-roles"></a>
### api-roles

`Jamf::apiRoles()`

As a builder over `GET /v1/api-roles` (`ApiRole` records): `where()`, `orderBy()`, `get()`, `first()`, `count()`, `all()`, `lazy()`, `paginate()`, `find($id)`, `create()`, `update()`, `delete()`.

| Request | Method | Path | Returns |
|---|---|---|---|
| `ApiRoles\GetApiRolesV1Request` | GET | `/v1/api-roles` | a builder over `ApiRole` records |
| `ApiRoles\CreateApiRolesV1Request` | POST | `/v1/api-roles` | `ApiRole` |
| `ApiRoles\GetApiRoleV1Request` | GET | `/v1/api-roles/{id}` | `ApiRole` |
| `ApiRoles\ReplaceApiRoleV1Request` | PUT | `/v1/api-roles/{id}` | `ApiRole` |
| `ApiRoles\DeleteApiRoleV1Request` | DELETE | `/v1/api-roles/{id}` | true |

<a id="pro-apns-client-push-status"></a>
### apns-client-push-status

`Jamf::apnsClientPushStatus()`

As a builder over `GET /v1/apns-client-push-status` (`ApnsClientPushStatus` records): `where()`, `orderBy()`, `get()`, `first()`, `count()`, `all()`, `lazy()`, `paginate()`.

| Request | Method | Path | Returns |
|---|---|---|---|
| `ApnsClientPushStatus\GetApnsClientPushStatusV1Request` | GET | `/v1/apns-client-push-status` | a builder over `ApnsClientPushStatus` records |
| `ApnsClientPushStatus\EnableApnsClientPushStatusAllClientsV1Request` | POST | `/v1/apns-client-push-status/enable-all-clients` | true |
| `ApnsClientPushStatus\GetApnsClientPushStatusEnableAllClientsStatusV1Request` | GET | `/v1/apns-client-push-status/enable-all-clients/status` | `ApnsPushEnableRequest` |
| `ApnsClientPushStatus\EnableApnsClientPushStatusClientV1Request` | POST | `/v1/apns-client-push-status/enable-client` | true |

<a id="pro-app-request-preview"></a>
### app-request-preview

`Jamf::appRequestPreview()`

| Request | Method | Path | Returns |
|---|---|---|---|
| `AppRequestPreview\GetAppRequestFormInputFieldsV1Request` | GET | `/v1/app-request/form-input-fields` | Collection of `AppRequestFormInputField` |
| `AppRequestPreview\CreateAppRequestFormInputFieldsV1Request` | POST | `/v1/app-request/form-input-fields` | `AppRequestFormInputField` |
| `AppRequestPreview\ReplaceAppRequestFormInputFieldsV1Request` | PUT | `/v1/app-request/form-input-fields` | Collection of `AppRequestFormInputField` |
| `AppRequestPreview\GetAppRequestFormInputFieldV1Request` | GET | `/v1/app-request/form-input-fields/{id}` | `AppRequestFormInputField` |
| `AppRequestPreview\ReplaceAppRequestFormInputFieldV1Request` | PUT | `/v1/app-request/form-input-fields/{id}` | `AppRequestFormInputField` |
| `AppRequestPreview\DeleteAppRequestFormInputFieldV1Request` | DELETE | `/v1/app-request/form-input-fields/{id}` | true |
| `AppRequestPreview\GetAppRequestSettingsV1Request` | GET | `/v1/app-request/settings` | `AppRequestSettings` |
| `AppRequestPreview\ReplaceAppRequestSettingsV1Request` | PUT | `/v1/app-request/settings` | `AppRequestSettings` |

<a id="pro-app-store-country-codes-preview"></a>
### app-store-country-codes-preview

`Jamf::appStoreCountryCodesPreview()`

| Request | Method | Path | Returns |
|---|---|---|---|
| `AppStoreCountryCodesPreview\GetAppStoreCountryCodesV1Request` | GET | `/v1/app-store-country-codes` | `CountryCodes` |

<a id="pro-branding"></a>
### branding

`Jamf::branding()`

| Request | Method | Path | Returns |
|---|---|---|---|
| `Branding\GetBrandingImagesDownloadV1Request` | GET | `/v1/branding-images/download/{id}` | the body as text (image/*) |

<a id="pro-buildings"></a>
### buildings

`Jamf::buildings()`

As a builder over `GET /v1/buildings` (`Building` records): `where()`, `orderBy()`, `get()`, `first()`, `count()`, `all()`, `lazy()`, `paginate()`, `find($id)`, `create()`, `update()`, `delete()`.

| Request | Method | Path | Returns |
|---|---|---|---|
| `Buildings\GetBuildingsV1Request` | GET | `/v1/buildings` | a builder over `Building` records |
| `Buildings\CreateBuildingsV1Request` | POST | `/v1/buildings` | `HrefResponse` |
| `Buildings\DeleteMultipleBuildingsV1Request` | POST | `/v1/buildings/delete-multiple` | true |
| `Buildings\ExportBuildingsV1Request` | POST | `/v1/buildings/export` | the body as text (text/csv) |
| `Buildings\GetBuildingV1Request` | GET | `/v1/buildings/{id}` | `Building` |
| `Buildings\ReplaceBuildingV1Request` | PUT | `/v1/buildings/{id}` | `Building` |
| `Buildings\DeleteBuildingV1Request` | DELETE | `/v1/buildings/{id}` | true |
| `Buildings\GetBuildingHistoryV1Request` | GET | `/v1/buildings/{id}/history` | a builder over `ObjectHistory` records |
| `Buildings\CreateBuildingHistoryV1Request` | POST | `/v1/buildings/{id}/history` | `ObjectHistory` |
| `Buildings\ExportBuildingHistoryV1Request` | POST | `/v1/buildings/{id}/history/export` | the body as text (text/csv) |

<a id="pro-cache-settings"></a>
### cache-settings

`Jamf::cacheSettings()`

| Request | Method | Path | Returns |
|---|---|---|---|
| `CacheSettings\GetCacheSettingsV1Request` | GET | `/v1/cache-settings` | `CacheSettings` |
| `CacheSettings\ReplaceCacheSettingsV1Request` | PUT | `/v1/cache-settings` | `CacheSettings` |

<a id="pro-categories"></a>
### categories

`Jamf::categories()`

As a builder over `GET /v1/categories` (`Category` records): `where()`, `orderBy()`, `get()`, `first()`, `count()`, `all()`, `lazy()`, `paginate()`, `find($id)`, `create()`, `update()`, `delete()`.

| Request | Method | Path | Returns |
|---|---|---|---|
| `Categories\GetCategoriesV1Request` | GET | `/v1/categories` | a builder over `Category` records |
| `Categories\CreateCategoriesV1Request` | POST | `/v1/categories` | `HrefResponse` |
| `Categories\DeleteMultipleCategoriesV1Request` | POST | `/v1/categories/delete-multiple` | true |
| `Categories\GetCategoryV1Request` | GET | `/v1/categories/{id}` | `Category` |
| `Categories\ReplaceCategoryV1Request` | PUT | `/v1/categories/{id}` | `Category` |
| `Categories\DeleteCategoryV1Request` | DELETE | `/v1/categories/{id}` | true |
| `Categories\GetCategoryHistoryV1Request` | GET | `/v1/categories/{id}/history` | a builder over `ObjectHistory` records |
| `Categories\CreateCategoryHistoryV1Request` | POST | `/v1/categories/{id}/history` | `ObjectHistory` |

<a id="pro-certificate-authority"></a>
### certificate-authority

`Jamf::certificateAuthority()`

| Request | Method | Path | Returns |
|---|---|---|---|
| `CertificateAuthority\GetPkiCertificateAuthorityActiveV1Request` | GET | `/v1/pki/certificate-authority/active` | `CertificateRecord` |
| `CertificateAuthority\GetPkiCertificateAuthorityActiveDerV1Request` | GET | `/v1/pki/certificate-authority/active/der` | the body as text (application/pkix-cert) |
| `CertificateAuthority\GetPkiCertificateAuthorityActivePemV1Request` | GET | `/v1/pki/certificate-authority/active/pem` | the body as text (application/pem-certificate-chain) |
| `CertificateAuthority\GetPkiCertificateAuthorityV1Request` | GET | `/v1/pki/certificate-authority/{id}` | `CertificateRecord` |
| `CertificateAuthority\GetPkiCertificateAuthorityDerV1Request` | GET | `/v1/pki/certificate-authority/{id}/der` | the body as text (application/pkix-cert) |
| `CertificateAuthority\GetPkiCertificateAuthorityPemV1Request` | GET | `/v1/pki/certificate-authority/{id}/pem` | the body as text (application/pem-certificate-chain) |

<a id="pro-classic-ldap"></a>
### classic-ldap

`Jamf::classicLdap()`

| Request | Method | Path | Returns |
|---|---|---|---|
| `ClassicLdap\GetClassicLdapV1Request` | GET | `/v1/classic-ldap/{id}` | `ClassicLdapMappings` |

<a id="pro-client-check-in"></a>
### client-check-in

`Jamf::clientCheckIn()`

As a builder over `GET /v3/check-in/history` (`ObjectHistoryV1` records): `where()`, `orderBy()`, `get()`, `first()`, `count()`, `all()`, `lazy()`, `paginate()`, `create()`.

| Request | Method | Path | Returns |
|---|---|---|---|
| `ClientCheckIn\GetCheckInV3Request` | GET | `/v3/check-in` | `ClientCheckInV3` |
| `ClientCheckIn\ReplaceCheckInV3Request` | PUT | `/v3/check-in` | `ClientCheckInV3` |
| `ClientCheckIn\GetCheckInHistoryV3Request` | GET | `/v3/check-in/history` | a builder over `ObjectHistoryV1` records |
| `ClientCheckIn\CreateCheckInHistoryV3Request` | POST | `/v3/check-in/history` | `HrefResponse` |

<a id="pro-cloud-azure"></a>
### cloud-azure

`Jamf::cloudAzure()`

| Request | Method | Path | Returns |
|---|---|---|---|
| `CloudAzure\CreateCloudAzureV1Request` | POST | `/v1/cloud-azure` | `HrefResponse` |
| `CloudAzure\GetCloudAzureDefaultsMappingsV1Request` (deprecated) | GET | `/v1/cloud-azure/defaults/mappings` | `AzureMappings` |
| `CloudAzure\GetCloudAzureDefaultsServerConfigurationV1Request` | GET | `/v1/cloud-azure/defaults/server-configuration` | `AzureServerConfiguration` |
| `CloudAzure\GetCloudAzureV1Request` | GET | `/v1/cloud-azure/{id}` | `AzureConfiguration` |
| `CloudAzure\ReplaceCloudAzureV1Request` | PUT | `/v1/cloud-azure/{id}` | `AzureConfiguration` |
| `CloudAzure\DeleteCloudAzureV1Request` | DELETE | `/v1/cloud-azure/{id}` | true |

<a id="pro-cloud-distribution-point"></a>
### cloud-distribution-point

`Jamf::cloudDistributionPoint()`

As a builder over `GET /v1/cloud-distribution-point/files` (`CloudDistributionPointInventoryFileInfo` records): `where()`, `orderBy()`, `get()`, `first()`, `count()`, `all()`, `lazy()`, `paginate()`.

| Request | Method | Path | Returns |
|---|---|---|---|
| `CloudDistributionPoint\GetCloudDistributionPointV1Request` | GET | `/v1/cloud-distribution-point` | `CloudDistributionPoint` |
| `CloudDistributionPoint\CreateCloudDistributionPointV1Request` | POST | `/v1/cloud-distribution-point` | `CloudDistributionPoint` |
| `CloudDistributionPoint\UpdateCloudDistributionPointV1Request` | PATCH | `/v1/cloud-distribution-point` | `CloudDistributionPoint` |
| `CloudDistributionPoint\DeleteCloudDistributionPointV1Request` | DELETE | `/v1/cloud-distribution-point` | true |
| `CloudDistributionPoint\CreateCloudDistributionPointFailUploadV1Request` | POST | `/v1/cloud-distribution-point/fail-upload/{id}` | true |
| `CloudDistributionPoint\GetCloudDistributionPointFilesV1Request` | GET | `/v1/cloud-distribution-point/files` | a builder over `CloudDistributionPointInventoryFileInfo` records |
| `CloudDistributionPoint\GetCloudDistributionPointHistoryV1Request` | GET | `/v1/cloud-distribution-point/history` | a builder over `ObjectHistory` records |
| `CloudDistributionPoint\CreateCloudDistributionPointHistoryV1Request` | POST | `/v1/cloud-distribution-point/history` | `ObjectHistory` |
| `CloudDistributionPoint\RefreshCloudDistributionPointInventoryV1Request` | POST | `/v1/cloud-distribution-point/refresh-inventory` | true |
| `CloudDistributionPoint\GetCloudDistributionPointTestConnectionV1Request` | GET | `/v1/cloud-distribution-point/test-connection` | `CloudDistributionPointTestConnection` |
| `CloudDistributionPoint\GetCloudDistributionPointUploadCapabilityV1Request` | GET | `/v1/cloud-distribution-point/upload-capability` | `CloudDistributionPointUploadCapability` |

<a id="pro-cloud-idp"></a>
### cloud-idp

`Jamf::cloudIdp()`

As a builder over `GET /v1/cloud-idp` (`CloudIdPCommonResponse` records): `orderBy()`, `get()`, `first()`, `count()`, `all()`, `lazy()`, `paginate()`, `find($id)`.

| Request | Method | Path | Returns |
|---|---|---|---|
| `CloudIdp\GetCloudIdpV1Request` | GET | `/v1/cloud-idp` | a builder over `CloudIdPCommonResponse` records |
| `CloudIdp\ExportCloudIdpV1Request` | POST | `/v1/cloud-idp/export` | the body as text (text/csv) |
| `CloudIdp\GetCloudIdpByIdV1Request` | GET | `/v1/cloud-idp/{id}` | `CloudIdPCommon` |
| `CloudIdp\GetCloudIdpHistoryV1Request` | GET | `/v1/cloud-idp/{id}/history` | a builder over `ObjectHistory` records |
| `CloudIdp\CreateCloudIdpHistoryV1Request` | POST | `/v1/cloud-idp/{id}/history` | `ObjectHistory` |
| `CloudIdp\TestCloudIdpGroupV1Request` | POST | `/v1/cloud-idp/{id}/test-group` | Collection of `GroupTestSearch` |
| `CloudIdp\TestCloudIdpUserV1Request` | POST | `/v1/cloud-idp/{id}/test-user` | Collection of `UserTestSearch` |
| `CloudIdp\TestCloudIdpUserMembershipV1Request` | POST | `/v1/cloud-idp/{id}/test-user-membership` | `MembershipTestSearchResponse` |

<a id="pro-cloud-information"></a>
### cloud-information

`Jamf::cloudInformation()`

| Request | Method | Path | Returns |
|---|---|---|---|
| `CloudInformation\GetCloudInformationV1Request` | GET | `/v1/cloud-information` | `CloudResponse` |

<a id="pro-cloud-ldap"></a>
### cloud-ldap

`Jamf::cloudLdap()`

| Request | Method | Path | Returns |
|---|---|---|---|
| `CloudLdap\VerifyLdapKeystoreV1Request` | POST | `/v1/ldap-keystore/verify` | `CloudLdapKeystore` |
| `CloudLdap\CreateCloudLdapsV2Request` | POST | `/v2/cloud-ldaps` | `HrefResponse` |
| `CloudLdap\GetCloudLdapsDefaultMappingsV2Request` | GET | `/v2/cloud-ldaps/defaults/{provider}/mappings` | `CloudLdapMappingsResponse` |
| `CloudLdap\GetCloudLdapsDefaultServerConfigurationV2Request` | GET | `/v2/cloud-ldaps/defaults/{provider}/server-configuration` | `CloudLdapServerResponse` |
| `CloudLdap\GetCloudLdapV2Request` | GET | `/v2/cloud-ldaps/{id}` | `LdapConfigurationResponse` |
| `CloudLdap\ReplaceCloudLdapV2Request` | PUT | `/v2/cloud-ldaps/{id}` | `LdapConfigurationResponse` |
| `CloudLdap\DeleteCloudLdapV2Request` | DELETE | `/v2/cloud-ldaps/{id}` | true |
| `CloudLdap\GetCloudLdapConnectionBindV2Request` | GET | `/v2/cloud-ldaps/{id}/connection/bind` | `CloudLdapConnectionPoolStatistics` |
| `CloudLdap\GetCloudLdapConnectionSearchV2Request` | GET | `/v2/cloud-ldaps/{id}/connection/search` | `CloudLdapConnectionPoolStatistics` |
| `CloudLdap\GetCloudLdapConnectionStatusV2Request` | GET | `/v2/cloud-ldaps/{id}/connection/status` | `CloudLdapConnectionStatus` |
| `CloudLdap\GetCloudLdapMappingsV2Request` | GET | `/v2/cloud-ldaps/{id}/mappings` | `CloudLdapMappingsResponse` |
| `CloudLdap\ReplaceCloudLdapMappingsV2Request` | PUT | `/v2/cloud-ldaps/{id}/mappings` | `CloudLdapMappingsResponse` |

<a id="pro-computer-extension-attributes"></a>
### computer-extension-attributes

`Jamf::computerExtensionAttributes()`

As a builder over `GET /v1/computer-extension-attributes` (`ComputerExtensionAttributes` records): `where()`, `orderBy()`, `get()`, `first()`, `count()`, `all()`, `lazy()`, `paginate()`, `find($id)`, `create()`, `update()`, `delete()`.

| Request | Method | Path | Returns |
|---|---|---|---|
| `ComputerExtensionAttributes\GetComputerExtensionAttributesV1Request` | GET | `/v1/computer-extension-attributes` | a builder over `ComputerExtensionAttributes` records |
| `ComputerExtensionAttributes\CreateComputerExtensionAttributesV1Request` | POST | `/v1/computer-extension-attributes` | `HrefResponse` |
| `ComputerExtensionAttributes\DeleteMultipleComputerExtensionAttributesV1Request` | POST | `/v1/computer-extension-attributes/delete-multiple` | true |
| `ComputerExtensionAttributes\GetComputerExtensionAttributesTemplatesV1Request` | GET | `/v1/computer-extension-attributes/templates` | a builder over `ComputerExtensionAttributeTemplates` records |
| `ComputerExtensionAttributes\GetComputerExtensionAttributesTemplateV1Request` | GET | `/v1/computer-extension-attributes/templates/{id}` | `ComputerExtensionAttributes` |
| `ComputerExtensionAttributes\UploadComputerExtensionAttributesV1Request` | POST | `/v1/computer-extension-attributes/upload` | `ComputerExtensionAttributes` |
| `ComputerExtensionAttributes\GetComputerExtensionAttributeV1Request` | GET | `/v1/computer-extension-attributes/{id}` | `ComputerExtensionAttributes` |
| `ComputerExtensionAttributes\ReplaceComputerExtensionAttributeV1Request` | PUT | `/v1/computer-extension-attributes/{id}` | `ComputerExtensionAttributes` |
| `ComputerExtensionAttributes\DeleteComputerExtensionAttributeV1Request` | DELETE | `/v1/computer-extension-attributes/{id}` | true |
| `ComputerExtensionAttributes\GetComputerExtensionAttributeDataDependencyV1Request` | GET | `/v1/computer-extension-attributes/{id}/data-dependency` | Collection of arrays |
| `ComputerExtensionAttributes\GetComputerExtensionAttributeDownloadV1Request` | GET | `/v1/computer-extension-attributes/{id}/download` | the body as text (application/xml) |
| `ComputerExtensionAttributes\GetComputerExtensionAttributeHistoryV1Request` | GET | `/v1/computer-extension-attributes/{id}/history` | a builder over `ObjectHistory` records |
| `ComputerExtensionAttributes\CreateComputerExtensionAttributeHistoryV1Request` | POST | `/v1/computer-extension-attributes/{id}/history` | `ObjectHistory` |

<a id="pro-computer-groups"></a>
### computer-groups

`Jamf::computerGroups()`

As a builder over `GET /v3/computer-groups/smart-groups` (`SmartComputerGroupSearch` records): `where()`, `orderBy()`, `get()`, `first()`, `count()`, `all()`, `lazy()`, `paginate()`, `find($id)`, `create()`, `update()`, `delete()`.

| Request | Method | Path | Returns |
|---|---|---|---|
| `ComputerGroups\GetComputerGroupsV1Request` | GET | `/v1/computer-groups` | Collection of `ComputerGroup` |
| `ComputerGroups\GetComputerGroupsSmartGroupMembershipV2Request` (deprecated) | GET | `/v2/computer-groups/smart-group-membership/{id}` | `SmartGroupMembership` |
| `ComputerGroups\GetComputerGroupsSmartGroupsV2Request` (deprecated) | GET | `/v2/computer-groups/smart-groups` | a builder over `SmartComputerGroupSearch` records |
| `ComputerGroups\CreateComputerGroupsSmartGroupsV2Request` (deprecated) | POST | `/v2/computer-groups/smart-groups` | `HrefResponse` |
| `ComputerGroups\GetComputerGroupsSmartGroupV2Request` (deprecated) | GET | `/v2/computer-groups/smart-groups/{id}` | `SmartComputerGroupV2` |
| `ComputerGroups\ReplaceComputerGroupsSmartGroupV2Request` (deprecated) | PUT | `/v2/computer-groups/smart-groups/{id}` | `SmartComputerGroupV2` |
| `ComputerGroups\DeleteComputerGroupsSmartGroupV2Request` (deprecated) | DELETE | `/v2/computer-groups/smart-groups/{id}` | true |
| `ComputerGroups\GetComputerGroupsStaticGroupsV2Request` (deprecated) | GET | `/v2/computer-groups/static-groups` | a builder over `StaticComputerGroupSummary` records |
| `ComputerGroups\CreateComputerGroupsStaticGroupsV2Request` (deprecated) | POST | `/v2/computer-groups/static-groups` | `HrefResponse` |
| `ComputerGroups\GetComputerGroupsStaticGroupV2Request` (deprecated) | GET | `/v2/computer-groups/static-groups/{id}` | `StaticComputerGroup` |
| `ComputerGroups\ReplaceComputerGroupsStaticGroupV2Request` (deprecated) | PUT | `/v2/computer-groups/static-groups/{id}` | `StaticComputerGroupAssignment` |
| `ComputerGroups\DeleteComputerGroupsStaticGroupV2Request` (deprecated) | DELETE | `/v2/computer-groups/static-groups/{id}` | true |
| `ComputerGroups\GetComputerGroupsSmartGroupMembershipV3Request` | GET | `/v3/computer-groups/smart-group-membership/{id}` | `SmartGroupMembership` |
| `ComputerGroups\GetComputerGroupsSmartGroupsV3Request` | GET | `/v3/computer-groups/smart-groups` | a builder over `SmartComputerGroupSearch` records |
| `ComputerGroups\CreateComputerGroupsSmartGroupsV3Request` | POST | `/v3/computer-groups/smart-groups` | `HrefResponse` |
| `ComputerGroups\GetComputerGroupsSmartGroupV3Request` | GET | `/v3/computer-groups/smart-groups/{id}` | `SmartComputerGroupV3` |
| `ComputerGroups\ReplaceComputerGroupsSmartGroupV3Request` | PUT | `/v3/computer-groups/smart-groups/{id}` | `SmartComputerGroupV3` |
| `ComputerGroups\DeleteComputerGroupsSmartGroupV3Request` | DELETE | `/v3/computer-groups/smart-groups/{id}` | true |
| `ComputerGroups\GetComputerGroupsStaticGroupsV3Request` | GET | `/v3/computer-groups/static-groups` | a builder over `StaticComputerGroupSummary` records |
| `ComputerGroups\CreateComputerGroupsStaticGroupsV3Request` | POST | `/v3/computer-groups/static-groups` | `HrefResponse` |
| `ComputerGroups\GetComputerGroupsStaticGroupV3Request` | GET | `/v3/computer-groups/static-groups/{id}` | `StaticComputerGroup` |
| `ComputerGroups\ReplaceComputerGroupsStaticGroupV3Request` | PUT | `/v3/computer-groups/static-groups/{id}` | `StaticComputerGroupAssignment` |
| `ComputerGroups\DeleteComputerGroupsStaticGroupV3Request` | DELETE | `/v3/computer-groups/static-groups/{id}` | true |

<a id="pro-computer-inventory"></a>
### computer-inventory

`Jamf::computerInventory()`

As a builder over `GET /v4/computers-inventory` (`ComputerInventoryV4` records): `where()`, `orderBy()`, `sections()`, `get()`, `first()`, `count()`, `all()`, `lazy()`, `paginate()`, `find($id)`, `create()`, `delete()`.

| Request | Method | Path | Returns |
|---|---|---|---|
| `ComputerInventory\EraseComputerInventoryV1Request` (deprecated) | POST | `/v1/computer-inventory/{id}/erase` | `EraseDeviceComputerResponse` |
| `ComputerInventory\RemoveComputerInventoryMdmProfileV1Request` (deprecated) | POST | `/v1/computer-inventory/{id}/remove-mdm-profile` | `RemoveComputerMdmProfileResponse` |
| `ComputerInventory\GetComputersInventoryV1Request` (deprecated) | GET | `/v1/computers-inventory` | a builder over `ComputerInventory` records |
| `ComputerInventory\CreateComputersInventoryV1Request` (deprecated) | POST | `/v1/computers-inventory` | `HrefResponse` |
| `ComputerInventory\GetComputerInventoryDetailV1Request` (deprecated) | GET | `/v1/computers-inventory-detail/{id}` | `ComputerInventory` |
| `ComputerInventory\UpdateComputerInventoryDetailV1Request` (deprecated) | PATCH | `/v1/computers-inventory-detail/{id}` | `ComputerInventory` |
| `ComputerInventory\GetComputersInventoryFilevaultV1Request` (deprecated) | GET | `/v1/computers-inventory/filevault` | a builder over `ComputerInventoryFileVault` records |
| `ComputerInventory\GetComputerInventoryV1Request` (deprecated) | GET | `/v1/computers-inventory/{id}` | `ComputerInventory` |
| `ComputerInventory\DeleteComputerInventoryV1Request` (deprecated) | DELETE | `/v1/computers-inventory/{id}` | true |
| `ComputerInventory\CreateComputerInventoryAttachmentsV1Request` (deprecated) | POST | `/v1/computers-inventory/{id}/attachments` | `HrefResponse` |
| `ComputerInventory\GetComputerInventoryAttachmentV1Request` (deprecated) | GET | `/v1/computers-inventory/{id}/attachments/{attachmentId}` | the body as text (text/plain) |
| `ComputerInventory\DeleteComputerInventoryAttachmentV1Request` (deprecated) | DELETE | `/v1/computers-inventory/{id}/attachments/{attachmentId}` | true |
| `ComputerInventory\GetComputerInventoryFilevaultV1Request` (deprecated) | GET | `/v1/computers-inventory/{id}/filevault` | `ComputerInventoryFileVault` |
| `ComputerInventory\GetComputerInventoryViewDeviceLockPinV1Request` (deprecated) | GET | `/v1/computers-inventory/{id}/view-device-lock-pin` | `ComputerInventoryDeviceLockPinResponse` |
| `ComputerInventory\GetComputerInventoryViewRecoveryLockPasswordV1Request` (deprecated) | GET | `/v1/computers-inventory/{id}/view-recovery-lock-password` | `ComputerInventoryRecoveryLockPasswordResponse` |
| `ComputerInventory\GetComputersInventoryV2Request` (deprecated) | GET | `/v2/computers-inventory` | a builder over `ComputerInventoryV2` records |
| `ComputerInventory\CreateComputersInventoryV2Request` (deprecated) | POST | `/v2/computers-inventory` | `HrefResponse` |
| `ComputerInventory\GetComputerInventoryDetailV2Request` (deprecated) | GET | `/v2/computers-inventory-detail/{id}` | `ComputerInventoryV2` |
| `ComputerInventory\UpdateComputerInventoryDetailV2Request` (deprecated) | PATCH | `/v2/computers-inventory-detail/{id}` | true |
| `ComputerInventory\GetComputersInventoryFilevaultV2Request` (deprecated) | GET | `/v2/computers-inventory/filevault` | a builder over `ComputerInventoryFileVault` records |
| `ComputerInventory\GetComputerInventoryV2Request` (deprecated) | GET | `/v2/computers-inventory/{id}` | `ComputerInventoryV2` |
| `ComputerInventory\DeleteComputerInventoryV2Request` (deprecated) | DELETE | `/v2/computers-inventory/{id}` | true |
| `ComputerInventory\CreateComputerInventoryAttachmentsV2Request` (deprecated) | POST | `/v2/computers-inventory/{id}/attachments` | `HrefResponse` |
| `ComputerInventory\GetComputerInventoryAttachmentV2Request` (deprecated) | GET | `/v2/computers-inventory/{id}/attachments/{attachmentId}` | the body as text (text/plain) |
| `ComputerInventory\DeleteComputerInventoryAttachmentV2Request` (deprecated) | DELETE | `/v2/computers-inventory/{id}/attachments/{attachmentId}` | true |
| `ComputerInventory\GetComputerInventoryFilevaultV2Request` (deprecated) | GET | `/v2/computers-inventory/{id}/filevault` | `ComputerInventoryFileVault` |
| `ComputerInventory\GetComputerInventoryViewDeviceLockPinV2Request` (deprecated) | GET | `/v2/computers-inventory/{id}/view-device-lock-pin` | `ComputerInventoryDeviceLockPinResponse` |
| `ComputerInventory\GetComputerInventoryViewRecoveryLockPasswordV2Request` (deprecated) | GET | `/v2/computers-inventory/{id}/view-recovery-lock-password` | `ComputerInventoryRecoveryLockPasswordResponse` |
| `ComputerInventory\GetComputersInventoryV3Request` (deprecated) | GET | `/v3/computers-inventory` | a builder over `ComputerInventoryV3` records |
| `ComputerInventory\CreateComputersInventoryV3Request` (deprecated) | POST | `/v3/computers-inventory` | `HrefResponse` |
| `ComputerInventory\GetComputerInventoryDetailV3Request` (deprecated) | GET | `/v3/computers-inventory-detail/{id}` | `ComputerInventoryV3` |
| `ComputerInventory\UpdateComputerInventoryDetailV3Request` (deprecated) | PATCH | `/v3/computers-inventory-detail/{id}` | true |
| `ComputerInventory\GetComputersInventoryFilevaultV3Request` (deprecated) | GET | `/v3/computers-inventory/filevault` | a builder over `ComputerInventoryFileVault` records |
| `ComputerInventory\GetComputerInventoryV3Request` (deprecated) | GET | `/v3/computers-inventory/{id}` | `ComputerInventoryV3` |
| `ComputerInventory\DeleteComputerInventoryV3Request` (deprecated) | DELETE | `/v3/computers-inventory/{id}` | true |
| `ComputerInventory\CreateComputerInventoryAttachmentsV3Request` (deprecated) | POST | `/v3/computers-inventory/{id}/attachments` | `HrefResponse` |
| `ComputerInventory\GetComputerInventoryAttachmentV3Request` (deprecated) | GET | `/v3/computers-inventory/{id}/attachments/{attachmentId}` | the body as text (text/plain) |
| `ComputerInventory\DeleteComputerInventoryAttachmentV3Request` (deprecated) | DELETE | `/v3/computers-inventory/{id}/attachments/{attachmentId}` | true |
| `ComputerInventory\GetComputerInventoryFilevaultV3Request` (deprecated) | GET | `/v3/computers-inventory/{id}/filevault` | `ComputerInventoryFileVault` |
| `ComputerInventory\GetComputerInventoryViewDeviceLockPinV3Request` (deprecated) | GET | `/v3/computers-inventory/{id}/view-device-lock-pin` | `ComputerInventoryDeviceLockPinResponse` |
| `ComputerInventory\GetComputerInventoryViewRecoveryLockPasswordV3Request` (deprecated) | GET | `/v3/computers-inventory/{id}/view-recovery-lock-password` | `ComputerInventoryRecoveryLockPasswordResponse` |
| `ComputerInventory\GetComputersInventoryV4Request` | GET | `/v4/computers-inventory` | a builder over `ComputerInventoryV4` records |
| `ComputerInventory\CreateComputersInventoryV4Request` | POST | `/v4/computers-inventory` | `HrefResponse` |
| `ComputerInventory\GetComputerInventoryDetailV4Request` | GET | `/v4/computers-inventory-detail/{id}` | `ComputerInventoryV4` |
| `ComputerInventory\UpdateComputerInventoryDetailV4Request` | PATCH | `/v4/computers-inventory-detail/{id}` | true |
| `ComputerInventory\GetComputersInventoryFilevaultV4Request` | GET | `/v4/computers-inventory/filevault` | a builder over `ComputerInventoryFileVault` records |
| `ComputerInventory\GetComputerInventoryV4Request` | GET | `/v4/computers-inventory/{id}` | `ComputerInventoryV4` |
| `ComputerInventory\DeleteComputerInventoryV4Request` | DELETE | `/v4/computers-inventory/{id}` | true |
| `ComputerInventory\CreateComputerInventoryAttachmentsV4Request` | POST | `/v4/computers-inventory/{id}/attachments` | `HrefResponse` |
| `ComputerInventory\GetComputerInventoryAttachmentV4Request` | GET | `/v4/computers-inventory/{id}/attachments/{attachmentId}` | the body as text (text/plain) |
| `ComputerInventory\DeleteComputerInventoryAttachmentV4Request` | DELETE | `/v4/computers-inventory/{id}/attachments/{attachmentId}` | true |
| `ComputerInventory\EraseComputerInventoryV4Request` | POST | `/v4/computers-inventory/{id}/erase` | `EraseDeviceComputerResponse` |
| `ComputerInventory\GetComputerInventoryFilevaultV4Request` | GET | `/v4/computers-inventory/{id}/filevault` | `ComputerInventoryFileVault` |
| `ComputerInventory\RemoveComputerInventoryMdmProfileV4Request` | POST | `/v4/computers-inventory/{id}/remove-mdm-profile` | `RemoveComputerMdmProfileResponse` |
| `ComputerInventory\GetComputerInventoryViewDeviceLockPinV4Request` | GET | `/v4/computers-inventory/{id}/view-device-lock-pin` | `ComputerInventoryDeviceLockPinResponse` |
| `ComputerInventory\GetComputerInventoryViewRecoveryLockPasswordV4Request` | GET | `/v4/computers-inventory/{id}/view-recovery-lock-password` | `ComputerInventoryRecoveryLockPasswordResponse` |

<a id="pro-computer-inventory-collection-settings"></a>
### computer-inventory-collection-settings

`Jamf::computerInventoryCollectionSettings()`

| Request | Method | Path | Returns |
|---|---|---|---|
| `ComputerInventoryCollectionSettings\GetComputerInventoryCollectionSettingsV1Request` (deprecated) | GET | `/v1/computer-inventory-collection-settings` | `ComputerInventoryCollectionSettings` |
| `ComputerInventoryCollectionSettings\UpdateComputerInventoryCollectionSettingsV1Request` (deprecated) | PATCH | `/v1/computer-inventory-collection-settings` | `ComputerInventoryCollectionSettings` |
| `ComputerInventoryCollectionSettings\CreateComputerInventoryCollectionSettingsCustomPathV1Request` (deprecated) | POST | `/v1/computer-inventory-collection-settings/custom-path` | `HrefResponse` |
| `ComputerInventoryCollectionSettings\DeleteComputerInventoryCollectionSettingsCustomPathV1Request` (deprecated) | DELETE | `/v1/computer-inventory-collection-settings/custom-path/{id}` | true |
| `ComputerInventoryCollectionSettings\GetComputerInventoryCollectionSettingsV2Request` | GET | `/v2/computer-inventory-collection-settings` | `ComputerInventoryCollectionSettingsV2` |
| `ComputerInventoryCollectionSettings\UpdateComputerInventoryCollectionSettingsV2Request` | PATCH | `/v2/computer-inventory-collection-settings` | true |
| `ComputerInventoryCollectionSettings\CreateComputerInventoryCollectionSettingsCustomPathV2Request` | POST | `/v2/computer-inventory-collection-settings/custom-path` | `HrefResponse` |
| `ComputerInventoryCollectionSettings\DeleteComputerInventoryCollectionSettingsCustomPathV2Request` | DELETE | `/v2/computer-inventory-collection-settings/custom-path/{id}` | true |

<a id="pro-computer-prestages"></a>
### computer-prestages

`Jamf::computerPrestages()`

As a builder over `GET /v3/computer-prestages` (`GetComputerPrestageV3` records): `orderBy()`, `get()`, `first()`, `count()`, `all()`, `lazy()`, `paginate()`, `find($id)`, `create()`, `update()`, `delete()`.

| Request | Method | Path | Returns |
|---|---|---|---|
| `ComputerPrestages\GetComputerPrestagesScopeV2Request` | GET | `/v2/computer-prestages/scope` | `PrestageScopeV2` |
| `ComputerPrestages\GetComputerPrestageScopeV2Request` | GET | `/v2/computer-prestages/{id}/scope` | `PrestageScopeResponseV2` |
| `ComputerPrestages\CreateComputerPrestageScopeV2Request` | POST | `/v2/computer-prestages/{id}/scope` | `PrestageScopeResponseV2` |
| `ComputerPrestages\ReplaceComputerPrestageScopeV2Request` | PUT | `/v2/computer-prestages/{id}/scope` | `PrestageScopeResponseV2` |
| `ComputerPrestages\DeleteMultipleComputerPrestageScopeV2Request` | POST | `/v2/computer-prestages/{id}/scope/delete-multiple` | `PrestageScopeResponseV2` |
| `ComputerPrestages\GetComputerPrestagesV3Request` | GET | `/v3/computer-prestages` | a builder over `GetComputerPrestageV3` records |
| `ComputerPrestages\CreateComputerPrestagesV3Request` | POST | `/v3/computer-prestages` | `HrefResponse` |
| `ComputerPrestages\GetComputerPrestageV3Request` | GET | `/v3/computer-prestages/{id}` | `GetComputerPrestageV3` |
| `ComputerPrestages\ReplaceComputerPrestageV3Request` | PUT | `/v3/computer-prestages/{id}` | `GetComputerPrestageV3` |
| `ComputerPrestages\DeleteComputerPrestageV3Request` | DELETE | `/v3/computer-prestages/{id}` | true |

<a id="pro-computers-preview"></a>
### computers-preview

`Jamf::computersPreview()`

As a builder over `GET /preview/computers` (`ComputerOverview` records): `orderBy()`, `get()`, `first()`, `count()`, `all()`, `lazy()`, `paginate()`.

| Request | Method | Path | Returns |
|---|---|---|---|
| `ComputersPreview\GetComputersPreviewRequest` | GET | `/preview/computers` | a builder over `ComputerOverview` records |

<a id="pro-conditional-access"></a>
### conditional-access

`Jamf::conditionalAccess()`

| Request | Method | Path | Returns |
|---|---|---|---|
| `ConditionalAccess\GetConditionalAccessDeviceComplianceInformationComputerV1Request` | GET | `/v1/conditional-access/device-compliance-information/computer/{deviceId}` | Collection of `DeviceComplianceInformation` |
| `ConditionalAccess\GetConditionalAccessDeviceComplianceInformationMobileV1Request` | GET | `/v1/conditional-access/device-compliance-information/mobile/{deviceId}` | Collection of `DeviceComplianceInformation` |
| `ConditionalAccess\GetConditionalAccessDeviceComplianceFeatureToggleV1Request` | GET | `/v1/conditional-access/device-compliance/feature-toggle` | `SharedDeviceComplianceFeatureToggle` |

<a id="pro-csa"></a>
### csa

`Jamf::csa()`

| Request | Method | Path | Returns |
|---|---|---|---|
| `Csa\GetCsaTenantIdV1Request` | GET | `/v1/csa/tenant-id` | `CsaTenantIdInfo` |
| `Csa\GetCsaTokenV1Request` | GET | `/v1/csa/token` | `CsaToken` |
| `Csa\DeleteCsaTokenV1Request` | DELETE | `/v1/csa/token` | true |

<a id="pro-dashboard"></a>
### dashboard

`Jamf::dashboard()`

| Request | Method | Path | Returns |
|---|---|---|---|
| `Dashboard\GetDashboardV1Request` | GET | `/v1/dashboard` | `DashboardSetup` |
| `Dashboard\ToggleDashboardV1Request` | POST | `/v1/dashboard/toggle` | `HrefResponse` |

<a id="pro-declarative-device-management"></a>
### declarative-device-management

`Jamf::declarativeDeviceManagement()`

| Request | Method | Path | Returns |
|---|---|---|---|
| `DeclarativeDeviceManagement\GetDdmStatusItemsV1Request` | GET | `/v1/ddm/{clientManagementId}/status-items` | `StatusItems` |
| `DeclarativeDeviceManagement\GetDdmStatusItemV1Request` | GET | `/v1/ddm/{clientManagementId}/status-items/{key}` | `StatusItem` |
| `DeclarativeDeviceManagement\SyncDdmV1Request` | POST | `/v1/ddm/{clientManagementId}/sync` | true |
| `DeclarativeDeviceManagement\GetDssDeclarationV1Request` | GET | `/v1/dss-declarations/{declarationId}` | `DssDeclarations` |

<a id="pro-departments"></a>
### departments

`Jamf::departments()`

As a builder over `GET /v1/departments` (`Department` records): `where()`, `orderBy()`, `get()`, `first()`, `count()`, `all()`, `lazy()`, `paginate()`, `find($id)`, `create()`, `update()`, `delete()`.

| Request | Method | Path | Returns |
|---|---|---|---|
| `Departments\GetDepartmentsV1Request` | GET | `/v1/departments` | a builder over `Department` records |
| `Departments\CreateDepartmentsV1Request` | POST | `/v1/departments` | `HrefResponse` |
| `Departments\DeleteMultipleDepartmentsV1Request` | POST | `/v1/departments/delete-multiple` | true |
| `Departments\GetDepartmentV1Request` | GET | `/v1/departments/{id}` | `Department` |
| `Departments\ReplaceDepartmentV1Request` | PUT | `/v1/departments/{id}` | `Department` |
| `Departments\DeleteDepartmentV1Request` | DELETE | `/v1/departments/{id}` | true |
| `Departments\GetDepartmentHistoryV1Request` | GET | `/v1/departments/{id}/history` | a builder over `ObjectHistory` records |
| `Departments\CreateDepartmentHistoryV1Request` | POST | `/v1/departments/{id}/history` | `HrefResponse` |

<a id="pro-device-communication-settings"></a>
### device-communication-settings

`Jamf::deviceCommunicationSettings()`

As a builder over `GET /v1/device-communication-settings/history` (`ObjectHistory` records): `where()`, `orderBy()`, `get()`, `first()`, `count()`, `all()`, `lazy()`, `paginate()`, `create()`.

| Request | Method | Path | Returns |
|---|---|---|---|
| `DeviceCommunicationSettings\GetDeviceCommunicationSettingsV1Request` | GET | `/v1/device-communication-settings` | `DeviceCommunicationSettings` |
| `DeviceCommunicationSettings\ReplaceDeviceCommunicationSettingsV1Request` | PUT | `/v1/device-communication-settings` | `DeviceCommunicationSettings` |
| `DeviceCommunicationSettings\GetDeviceCommunicationSettingsHistoryV1Request` | GET | `/v1/device-communication-settings/history` | a builder over `ObjectHistory` records |
| `DeviceCommunicationSettings\CreateDeviceCommunicationSettingsHistoryV1Request` | POST | `/v1/device-communication-settings/history` | `ObjectHistory` |

<a id="pro-device-enrollments"></a>
### device-enrollments

`Jamf::deviceEnrollments()`

As a builder over `GET /v1/device-enrollments` (`DeviceEnrollmentInstance` records): `orderBy()`, `get()`, `first()`, `count()`, `all()`, `lazy()`, `paginate()`, `find($id)`, `update()`, `delete()`.

| Request | Method | Path | Returns |
|---|---|---|---|
| `DeviceEnrollments\GetDeviceEnrollmentsV1Request` | GET | `/v1/device-enrollments` | a builder over `DeviceEnrollmentInstance` records |
| `DeviceEnrollments\GetDeviceEnrollmentsPublicKeyV1Request` | GET | `/v1/device-enrollments/public-key` | the body as text (application/x-pem-file) |
| `DeviceEnrollments\GetDeviceEnrollmentsSyncsV1Request` | GET | `/v1/device-enrollments/syncs` | Collection of `DeviceEnrollmentInstanceSyncStatus` |
| `DeviceEnrollments\UploadDeviceEnrollmentsTokenV1Request` | POST | `/v1/device-enrollments/upload-token` | `HrefResponse` |
| `DeviceEnrollments\GetDeviceEnrollmentV1Request` | GET | `/v1/device-enrollments/{id}` | `DeviceEnrollmentInstance` |
| `DeviceEnrollments\ReplaceDeviceEnrollmentV1Request` | PUT | `/v1/device-enrollments/{id}` | `DeviceEnrollmentInstance` |
| `DeviceEnrollments\DeleteDeviceEnrollmentV1Request` | DELETE | `/v1/device-enrollments/{id}` | true |
| `DeviceEnrollments\DisownDeviceEnrollmentV1Request` | POST | `/v1/device-enrollments/{id}/disown` | `DeviceEnrollmentDisownResponse` |
| `DeviceEnrollments\GetDeviceEnrollmentHistoryV1Request` | GET | `/v1/device-enrollments/{id}/history` | a builder over `ObjectHistory` records |
| `DeviceEnrollments\CreateDeviceEnrollmentHistoryV1Request` | POST | `/v1/device-enrollments/{id}/history` | `HrefResponse` |
| `DeviceEnrollments\GetDeviceEnrollmentSyncsV1Request` | GET | `/v1/device-enrollments/{id}/syncs` | Collection of `DeviceEnrollmentInstanceSyncStatus` |
| `DeviceEnrollments\GetDeviceEnrollmentSyncsLatestV1Request` | GET | `/v1/device-enrollments/{id}/syncs/latest` | `DeviceEnrollmentInstanceSyncStatus` |
| `DeviceEnrollments\ReplaceDeviceEnrollmentUploadTokenV1Request` | PUT | `/v1/device-enrollments/{id}/upload-token` | `DeviceEnrollmentInstance` |

<a id="pro-device-enrollments-devices"></a>
### device-enrollments-devices

`Jamf::deviceEnrollmentsDevices()`

| Request | Method | Path | Returns |
|---|---|---|---|
| `DeviceEnrollmentsDevices\GetDeviceEnrollmentDevicesV1Request` | GET | `/v1/device-enrollments/{id}/devices` | Collection of `DeviceEnrollmentDevice` |

<a id="pro-devices"></a>
### devices

`Jamf::devices()`

| Request | Method | Path | Returns |
|---|---|---|---|
| `Devices\GetDeviceGroupsV1Request` | GET | `/v1/devices/{id}/groups` | Collection of `DeviceGroup` |

<a id="pro-digicert"></a>
### digicert

`Jamf::digicert()`

| Request | Method | Path | Returns |
|---|---|---|---|
| `Digicert\CreatePkiDigicertTrustLifecycleManagerV1Request` | POST | `/v1/pki/digicert/trust-lifecycle-manager` | the body as text |
| `Digicert\ValidatePkiDigicertTrustLifecycleManagerClientCertificateV1Request` | POST | `/v1/pki/digicert/trust-lifecycle-manager/validate-client-certificate` | true |
| `Digicert\GetPkiDigicertTrustLifecycleManagerV1Request` | GET | `/v1/pki/digicert/trust-lifecycle-manager/{id}` | `DigiCertSettingResponse` |
| `Digicert\UpdatePkiDigicertTrustLifecycleManagerV1Request` | PATCH | `/v1/pki/digicert/trust-lifecycle-manager/{id}` | true |
| `Digicert\DeletePkiDigicertTrustLifecycleManagerV1Request` | DELETE | `/v1/pki/digicert/trust-lifecycle-manager/{id}` | true |
| `Digicert\GetPkiDigicertTrustLifecycleManagerConnectionStatusV1Request` | GET | `/v1/pki/digicert/trust-lifecycle-manager/{id}/connection-status` | `DigicertConnectionStatus` |
| `Digicert\GetPkiDigicertTrustLifecycleManagerDependenciesV1Request` | GET | `/v1/pki/digicert/trust-lifecycle-manager/{id}/dependencies` | Collection of `DigicertDependency` |
| `Digicert\GetPkiDigicertTrustLifecycleManagerPrivilegeCheckV1Request` | GET | `/v1/pki/digicert/trust-lifecycle-manager/{id}/privilege-check` | true |

<a id="pro-distribution-point"></a>
### distribution-point

`Jamf::distributionPoint()`

As a builder over `GET /v1/distribution-points` (`DistributionPoint` records): `where()`, `orderBy()`, `get()`, `first()`, `count()`, `all()`, `lazy()`, `paginate()`, `find($id)`, `create()`, `update()`, `delete()`.

| Request | Method | Path | Returns |
|---|---|---|---|
| `DistributionPoint\GetDistributionPointsV1Request` | GET | `/v1/distribution-points` | a builder over `DistributionPoint` records |
| `DistributionPoint\CreateDistributionPointsV1Request` | POST | `/v1/distribution-points` | `HrefResponse` |
| `DistributionPoint\DeleteMultipleDistributionPointsV1Request` | POST | `/v1/distribution-points/delete-multiple` | true |
| `DistributionPoint\GetDistributionPointV1Request` | GET | `/v1/distribution-points/{id}` | `DistributionPoint` |
| `DistributionPoint\ReplaceDistributionPointV1Request` | PUT | `/v1/distribution-points/{id}` | `DistributionPoint` |
| `DistributionPoint\UpdateDistributionPointV1Request` | PATCH | `/v1/distribution-points/{id}` | `DistributionPoint` |
| `DistributionPoint\DeleteDistributionPointV1Request` | DELETE | `/v1/distribution-points/{id}` | true |
| `DistributionPoint\GetDistributionPointHistoryV1Request` | GET | `/v1/distribution-points/{id}/history` | a builder over `ObjectHistory` records |
| `DistributionPoint\CreateDistributionPointHistoryV1Request` | POST | `/v1/distribution-points/{id}/history` | `ObjectHistory` |

<a id="pro-dock-items"></a>
### dock-items

`Jamf::dockItems()`

| Request | Method | Path | Returns |
|---|---|---|---|
| `DockItems\CreateDockItemsV1Request` | POST | `/v1/dock-items` | `HrefResponse` |
| `DockItems\GetDockItemV1Request` | GET | `/v1/dock-items/{id}` | `DockItem` |
| `DockItems\ReplaceDockItemV1Request` | PUT | `/v1/dock-items/{id}` | the body as text (text/plain) |
| `DockItems\DeleteDockItemV1Request` | DELETE | `/v1/dock-items/{id}` | true |

<a id="pro-ebooks"></a>
### ebooks

`Jamf::ebooks()`

As a builder over `GET /v1/ebooks` (`Ebook` records): `orderBy()`, `get()`, `first()`, `count()`, `all()`, `lazy()`, `paginate()`, `find($id)`.

| Request | Method | Path | Returns |
|---|---|---|---|
| `Ebooks\GetEbooksV1Request` | GET | `/v1/ebooks` | a builder over `Ebook` records |
| `Ebooks\GetEbookV1Request` | GET | `/v1/ebooks/{id}` | `Ebook` |
| `Ebooks\GetEbookScopeV1Request` | GET | `/v1/ebooks/{id}/scope` | `EbookScope` |

<a id="pro-enrollment"></a>
### enrollment

`Jamf::enrollment()`

As a builder over `GET /v3/enrollment/languages` (`EnrollmentProcessTextObject` records): `orderBy()`, `get()`, `first()`, `count()`, `all()`, `lazy()`, `paginate()`, `find($id)`, `update()`, `delete()`.

| Request | Method | Path | Returns |
|---|---|---|---|
| `Enrollment\GetAdueSessionTokenSettingsV1Request` | GET | `/v1/adue-session-token-settings` | `AccountDrivenUserEnrollmentSessionTokenSettings` |
| `Enrollment\ReplaceAdueSessionTokenSettingsV1Request` | PUT | `/v1/adue-session-token-settings` | `AccountDrivenUserEnrollmentSessionTokenSettings` |
| `Enrollment\GetEnrollmentHistoryV2Request` | GET | `/v2/enrollment/history` | a builder over `ObjectHistory` records |
| `Enrollment\CreateEnrollmentHistoryV2Request` | POST | `/v2/enrollment/history` | `HrefResponse` |
| `Enrollment\ExportEnrollmentHistoryV2Request` | POST | `/v2/enrollment/history/export` | the decoded body |
| `Enrollment\GetEnrollmentAccessGroupsV3Request` | GET | `/v3/enrollment/access-groups` | a builder over `EnrollmentAccessGroupPreview` records |
| `Enrollment\CreateEnrollmentAccessGroupsV3Request` | POST | `/v3/enrollment/access-groups` | `HrefResponse` |
| `Enrollment\GetEnrollmentAccessGroupV3Request` | GET | `/v3/enrollment/access-groups/{id}` | `EnrollmentAccessGroupPreview` |
| `Enrollment\ReplaceEnrollmentAccessGroupV3Request` | PUT | `/v3/enrollment/access-groups/{id}` | `EnrollmentAccessGroupPreview` |
| `Enrollment\DeleteEnrollmentAccessGroupV3Request` | DELETE | `/v3/enrollment/access-groups/{id}` | true |
| `Enrollment\GetEnrollmentFilteredLanguageCodesV3Request` | GET | `/v3/enrollment/filtered-language-codes` | Collection of `LanguageCode` |
| `Enrollment\GetEnrollmentLanguageCodesV3Request` | GET | `/v3/enrollment/language-codes` | Collection of `LanguageCode` |
| `Enrollment\GetEnrollmentLanguagesV3Request` | GET | `/v3/enrollment/languages` | a builder over `EnrollmentProcessTextObject` records |
| `Enrollment\DeleteMultipleEnrollmentLanguagesV3Request` | POST | `/v3/enrollment/languages/delete-multiple` | true |
| `Enrollment\GetEnrollmentLanguageV3Request` | GET | `/v3/enrollment/languages/{languageId}` | `EnrollmentProcessTextObject` |
| `Enrollment\ReplaceEnrollmentLanguageV3Request` | PUT | `/v3/enrollment/languages/{languageId}` | `EnrollmentProcessTextObject` |
| `Enrollment\DeleteEnrollmentLanguageV3Request` | DELETE | `/v3/enrollment/languages/{languageId}` | true |
| `Enrollment\GetEnrollmentV4Request` | GET | `/v4/enrollment` | `EnrollmentSettingsV4` |
| `Enrollment\ReplaceEnrollmentV4Request` | PUT | `/v4/enrollment` | `EnrollmentSettingsV4` |
| `Enrollment\GetEnrollmentAccessManagementV4Request` | GET | `/v4/enrollment/access-management` | `AccessManagementSetting` |
| `Enrollment\CreateEnrollmentAccessManagementV4Request` | POST | `/v4/enrollment/access-management` | `AccessManagementSetting` |

<a id="pro-enrollment-customization"></a>
### enrollment-customization

`Jamf::enrollmentCustomization()`

As a builder over `GET /v2/enrollment-customizations` (`EnrollmentCustomizationV2` records): `orderBy()`, `get()`, `first()`, `count()`, `all()`, `lazy()`, `paginate()`, `find($id)`, `create()`, `update()`, `delete()`.

| Request | Method | Path | Returns |
|---|---|---|---|
| `EnrollmentCustomization\GetEnrollmentCustomizationsV2Request` | GET | `/v2/enrollment-customizations` | a builder over `EnrollmentCustomizationV2` records |
| `EnrollmentCustomization\CreateEnrollmentCustomizationsV2Request` | POST | `/v2/enrollment-customizations` | `HrefResponse` |
| `EnrollmentCustomization\CreateEnrollmentCustomizationsImagesV2Request` | POST | `/v2/enrollment-customizations/images` | `BrandingImageUrl` |
| `EnrollmentCustomization\GetEnrollmentCustomizationsImageV2Request` | GET | `/v2/enrollment-customizations/images/{id}` | the body as text (image/*) |
| `EnrollmentCustomization\GetEnrollmentCustomizationV2Request` | GET | `/v2/enrollment-customizations/{id}` | `EnrollmentCustomizationV2` |
| `EnrollmentCustomization\ReplaceEnrollmentCustomizationV2Request` | PUT | `/v2/enrollment-customizations/{id}` | `EnrollmentCustomizationV2` |
| `EnrollmentCustomization\DeleteEnrollmentCustomizationV2Request` | DELETE | `/v2/enrollment-customizations/{id}` | true |
| `EnrollmentCustomization\GetEnrollmentCustomizationHistoryV2Request` | GET | `/v2/enrollment-customizations/{id}/history` | a builder over `ObjectHistory` records |
| `EnrollmentCustomization\CreateEnrollmentCustomizationHistoryV2Request` | POST | `/v2/enrollment-customizations/{id}/history` | `ObjectHistory` |
| `EnrollmentCustomization\GetEnrollmentCustomizationPrestagesV2Request` | GET | `/v2/enrollment-customizations/{id}/prestages` | `PrestageDependencies` |

<a id="pro-enrollment-customization-preview"></a>
### enrollment-customization-preview

`Jamf::enrollmentCustomizationPreview()`

| Request | Method | Path | Returns |
|---|---|---|---|
| `EnrollmentCustomizationPreview\ParseEnrollmentCustomizationMarkdownV1Request` | POST | `/v1/enrollment-customization/parse-markdown` | `Markdown` |
| `EnrollmentCustomizationPreview\GetEnrollmentCustomizationAllV1Request` | GET | `/v1/enrollment-customization/{id}/all` | `EnrollmentCustomizationPanelList` |
| `EnrollmentCustomizationPreview\GetEnrollmentCustomizationAllByPanelIdV1Request` | GET | `/v1/enrollment-customization/{id}/all/{panel-id}` | `GetEnrollmentCustomizationPanel` |
| `EnrollmentCustomizationPreview\DeleteEnrollmentCustomizationAllV1Request` | DELETE | `/v1/enrollment-customization/{id}/all/{panel-id}` | true |
| `EnrollmentCustomizationPreview\CreateEnrollmentCustomizationLdapV1Request` | POST | `/v1/enrollment-customization/{id}/ldap` | `GetEnrollmentCustomizationPanelLdapAuth` |
| `EnrollmentCustomizationPreview\GetEnrollmentCustomizationLdapV1Request` | GET | `/v1/enrollment-customization/{id}/ldap/{panel-id}` | `GetEnrollmentCustomizationPanelLdapAuth` |
| `EnrollmentCustomizationPreview\ReplaceEnrollmentCustomizationLdapV1Request` | PUT | `/v1/enrollment-customization/{id}/ldap/{panel-id}` | `GetEnrollmentCustomizationPanelLdapAuth` |
| `EnrollmentCustomizationPreview\DeleteEnrollmentCustomizationLdapV1Request` | DELETE | `/v1/enrollment-customization/{id}/ldap/{panel-id}` | true |
| `EnrollmentCustomizationPreview\CreateEnrollmentCustomizationSsoV1Request` | POST | `/v1/enrollment-customization/{id}/sso` | `GetEnrollmentCustomizationPanelSsoAuth` |
| `EnrollmentCustomizationPreview\GetEnrollmentCustomizationSsoV1Request` | GET | `/v1/enrollment-customization/{id}/sso/{panel-id}` | `GetEnrollmentCustomizationPanelSsoAuth` |
| `EnrollmentCustomizationPreview\ReplaceEnrollmentCustomizationSsoV1Request` | PUT | `/v1/enrollment-customization/{id}/sso/{panel-id}` | `GetEnrollmentCustomizationPanelSsoAuth` |
| `EnrollmentCustomizationPreview\DeleteEnrollmentCustomizationSsoV1Request` | DELETE | `/v1/enrollment-customization/{id}/sso/{panel-id}` | true |
| `EnrollmentCustomizationPreview\CreateEnrollmentCustomizationTextV1Request` | POST | `/v1/enrollment-customization/{id}/text` | `GetEnrollmentCustomizationPanelText` |
| `EnrollmentCustomizationPreview\GetEnrollmentCustomizationTextV1Request` | GET | `/v1/enrollment-customization/{id}/text/{panel-id}` | `GetEnrollmentCustomizationPanelText` |
| `EnrollmentCustomizationPreview\ReplaceEnrollmentCustomizationTextV1Request` | PUT | `/v1/enrollment-customization/{id}/text/{panel-id}` | `GetEnrollmentCustomizationPanelText` |
| `EnrollmentCustomizationPreview\DeleteEnrollmentCustomizationTextV1Request` | DELETE | `/v1/enrollment-customization/{id}/text/{panel-id}` | true |
| `EnrollmentCustomizationPreview\GetEnrollmentCustomizationTextMarkdownV1Request` | GET | `/v1/enrollment-customization/{id}/text/{panel-id}/markdown` | `Markdown` |

<a id="pro-groups"></a>
### groups

`Jamf::groups()`

As a builder over `GET /v2/groups` (`GroupDtoV1` records): `where()`, `orderBy()`, `get()`, `first()`, `count()`, `all()`, `lazy()`, `paginate()`, `find($id)`, `update()`, `delete()`.

| Request | Method | Path | Returns |
|---|---|---|---|
| `Groups\GetGroupsV1Request` (deprecated) | GET | `/v1/groups` | a builder over `GroupDtoV1` records |
| `Groups\GetGroupV1Request` (deprecated) | GET | `/v1/groups/{id}` | `GroupWithCriteriaDtoV1` |
| `Groups\UpdateGroupV1Request` (deprecated) | PATCH | `/v1/groups/{id}` | true |
| `Groups\DeleteGroupV1Request` (deprecated) | DELETE | `/v1/groups/{id}` | true |
| `Groups\GetGroupsV2Request` | GET | `/v2/groups` | a builder over `GroupDtoV1` records |
| `Groups\GetGroupV2Request` | GET | `/v2/groups/{id}` | `GroupWithCriteriaDtoV1` |
| `Groups\UpdateGroupV2Request` | PATCH | `/v2/groups/{id}` | true |
| `Groups\DeleteGroupV2Request` | DELETE | `/v2/groups/{id}` | true |

<a id="pro-gsx-connection"></a>
### gsx-connection

`Jamf::gsxConnection()`

As a builder over `GET /v1/gsx-connection/history` (`ObjectHistoryV1` records): `where()`, `orderBy()`, `get()`, `first()`, `count()`, `all()`, `lazy()`, `paginate()`, `create()`.

| Request | Method | Path | Returns |
|---|---|---|---|
| `GsxConnection\GetGsxConnectionV1Request` | GET | `/v1/gsx-connection` | `GsxConnection` |
| `GsxConnection\ReplaceGsxConnectionV1Request` | PUT | `/v1/gsx-connection` | `GsxConnection` |
| `GsxConnection\UpdateGsxConnectionV1Request` | PATCH | `/v1/gsx-connection` | `GsxConnection` |
| `GsxConnection\GetGsxConnectionHistoryV1Request` | GET | `/v1/gsx-connection/history` | a builder over `ObjectHistoryV1` records |
| `GsxConnection\CreateGsxConnectionHistoryV1Request` | POST | `/v1/gsx-connection/history` | `HrefResponse` |
| `GsxConnection\TestGsxConnectionV1Request` | POST | `/v1/gsx-connection/test` | true |

<a id="pro-health-check"></a>
### health-check

`Jamf::healthCheck()`

| Request | Method | Path | Returns |
|---|---|---|---|
| `HealthCheck\GetHealthCheckV1Request` | GET | `/v1/health-check` | true |
| `HealthCheck\GetHealthStatusV1Request` | GET | `/v1/health-status` | `HealthStatus` |

<a id="pro-icon"></a>
### icon

`Jamf::icon()`

| Request | Method | Path | Returns |
|---|---|---|---|
| `Icon\CreateIconV1Request` | POST | `/v1/icon` | `IconResponse` |
| `Icon\GetIconDownloadV1Request` | GET | `/v1/icon/download/{id}` | the body as text (image/*) |
| `Icon\GetIconV1Request` | GET | `/v1/icon/{id}` | `IconResponse` |

<a id="pro-impact-alert-notification-settings"></a>
### impact-alert-notification-settings

`Jamf::impactAlertNotificationSettings()`

| Request | Method | Path | Returns |
|---|---|---|---|
| `ImpactAlertNotificationSettings\GetImpactAlertNotificationSettingsV1Request` | GET | `/v1/impact-alert-notification-settings` | `ImpactAlertNotificationSettingsV1` |
| `ImpactAlertNotificationSettings\ReplaceImpactAlertNotificationSettingsV1Request` | PUT | `/v1/impact-alert-notification-settings` | true |

<a id="pro-inventory-information"></a>
### inventory-information

`Jamf::inventoryInformation()`

| Request | Method | Path | Returns |
|---|---|---|---|
| `InventoryInformation\GetInventoryInformationV1Request` | GET | `/v1/inventory-information` | `InventoryInformation` |

<a id="pro-inventory-preload"></a>
### inventory-preload

`Jamf::inventoryPreload()`

As a builder over `GET /v2/inventory-preload/history` (`ObjectHistory` records): `where()`, `orderBy()`, `get()`, `first()`, `count()`, `all()`, `lazy()`, `paginate()`, `create()`.

| Request | Method | Path | Returns |
|---|---|---|---|
| `InventoryPreload\GetInventoryPreloadCsvV2Request` | GET | `/v2/inventory-preload/csv` | the body as text (text/csv) |
| `InventoryPreload\CreateInventoryPreloadCsvV2Request` | POST | `/v2/inventory-preload/csv` | Collection of `HrefResponse` |
| `InventoryPreload\GetInventoryPreloadCsvTemplateV2Request` | GET | `/v2/inventory-preload/csv-template` | the body as text (text/csv) |
| `InventoryPreload\ValidateInventoryPreloadCsvV2Request` | POST | `/v2/inventory-preload/csv-validate` | `InventoryPreloadCsvValidationSuccess` |
| `InventoryPreload\GetInventoryPreloadEaColumnsV2Request` | GET | `/v2/inventory-preload/ea-columns` | Collection of `InventoryPreloadExtensionAttributeColumn` |
| `InventoryPreload\ExportInventoryPreloadV2Request` | POST | `/v2/inventory-preload/export` | the body as text (text/csv) |
| `InventoryPreload\GetInventoryPreloadHistoryV2Request` | GET | `/v2/inventory-preload/history` | a builder over `ObjectHistory` records |
| `InventoryPreload\CreateInventoryPreloadHistoryV2Request` | POST | `/v2/inventory-preload/history` | `HrefResponse` |
| `InventoryPreload\GetInventoryPreloadRecordsV2Request` | GET | `/v2/inventory-preload/records` | a builder over `InventoryPreloadRecordV2` records |
| `InventoryPreload\CreateInventoryPreloadRecordsV2Request` | POST | `/v2/inventory-preload/records` | `HrefResponse` |
| `InventoryPreload\DeleteInventoryPreloadRecordsAllV2Request` | POST | `/v2/inventory-preload/records/delete-all` | true |
| `InventoryPreload\GetInventoryPreloadRecordV2Request` | GET | `/v2/inventory-preload/records/{id}` | `InventoryPreloadRecordV2` |
| `InventoryPreload\ReplaceInventoryPreloadRecordV2Request` | PUT | `/v2/inventory-preload/records/{id}` | `InventoryPreloadRecordV2` |
| `InventoryPreload\DeleteInventoryPreloadRecordV2Request` | DELETE | `/v2/inventory-preload/records/{id}` | true |

<a id="pro-jamf-cloud-distribution-service"></a>
### jamf-cloud-distribution-service

`Jamf::jamfCloudDistributionService()`

| Request | Method | Path | Returns |
|---|---|---|---|
| `JamfCloudDistributionService\GetJcdsFilesV1Request` (deprecated) | GET | `/v1/jcds/files` | Collection of `FileData` |
| `JamfCloudDistributionService\CreateJcdsFilesV1Request` (deprecated) | POST | `/v1/jcds/files` | `Credentials` |
| `JamfCloudDistributionService\GetJcdsFileV1Request` (deprecated) | GET | `/v1/jcds/files/{fileName}` | `DownloadUrl` |
| `JamfCloudDistributionService\DeleteJcdsFileV1Request` (deprecated) | DELETE | `/v1/jcds/files/{fileName}` | true |
| `JamfCloudDistributionService\RefreshJcdsInventoryV1Request` (deprecated) | POST | `/v1/jcds/refresh-inventory` | true |
| `JamfCloudDistributionService\RenewJcdsCredentialsV1Request` (deprecated) | POST | `/v1/jcds/renew-credentials` | `Credentials` |

<a id="pro-jamf-connect"></a>
### jamf-connect

`Jamf::jamfConnect()`

As a builder over `GET /v1/jamf-connect/history` (`ObjectHistory` records): `where()`, `orderBy()`, `get()`, `first()`, `count()`, `all()`, `lazy()`, `paginate()`, `create()`.

| Request | Method | Path | Returns |
|---|---|---|---|
| `JamfConnect\GetJamfConnectV1Request` | GET | `/v1/jamf-connect` | true |
| `JamfConnect\GetJamfConnectConfigProfilesV1Request` | GET | `/v1/jamf-connect/config-profiles` | a builder over `LinkedConnectProfile` records |
| `JamfConnect\ReplaceJamfConnectConfigProfileV1Request` | PUT | `/v1/jamf-connect/config-profiles/{id}` | `LinkedConnectProfile` |
| `JamfConnect\GetJamfConnectDeploymentTasksV1Request` | GET | `/v1/jamf-connect/deployments/{id}/tasks` | a builder over `DeploymentTask` records |
| `JamfConnect\RetryJamfConnectDeploymentTasksV1Request` | POST | `/v1/jamf-connect/deployments/{id}/tasks/retry` | true |
| `JamfConnect\GetJamfConnectHistoryV1Request` | GET | `/v1/jamf-connect/history` | a builder over `ObjectHistory` records |
| `JamfConnect\CreateJamfConnectHistoryV1Request` | POST | `/v1/jamf-connect/history` | `HrefResponse` |

<a id="pro-jamf-management-framework"></a>
### jamf-management-framework

`Jamf::jamfManagementFramework()`

| Request | Method | Path | Returns |
|---|---|---|---|
| `JamfManagementFramework\RedeployJamfManagementFrameworkV1Request` | POST | `/v1/jamf-management-framework/redeploy/{id}` | `RedeployJamfManagementFrameworkResponse` |

<a id="pro-jamf-package"></a>
### jamf-package

`Jamf::jamfPackage()`

| Request | Method | Path | Returns |
|---|---|---|---|
| `JamfPackage\GetJamfPackageV1Request` | GET | `/v1/jamf-package` | Collection of `JamfPackageResponse` |
| `JamfPackage\GetJamfPackageV2Request` | GET | `/v2/jamf-package` | `JamfApplicationResponse` |

<a id="pro-jamf-pro-account-preferences"></a>
### jamf-pro-account-preferences

`Jamf::jamfProAccountPreferences()`

| Request | Method | Path | Returns |
|---|---|---|---|
| `JamfProAccountPreferences\GetAccountPreferencesV2Request` (deprecated) | GET | `/v2/account-preferences` | `AccountPreferencesV5` |
| `JamfProAccountPreferences\UpdateAccountPreferencesV2Request` (deprecated) | PATCH | `/v2/account-preferences` | `AccountPreferencesV5` |
| `JamfProAccountPreferences\GetAccountPreferencesV3Request` | GET | `/v3/account-preferences` | `AccountPreferencesV6` |
| `JamfProAccountPreferences\UpdateAccountPreferencesV3Request` | PATCH | `/v3/account-preferences` | true |

<a id="pro-jamf-pro-information"></a>
### jamf-pro-information

`Jamf::jamfProInformation()`

| Request | Method | Path | Returns |
|---|---|---|---|
| `JamfProInformation\GetJamfProInformationV2Request` | GET | `/v2/jamf-pro-information` | `JamfProInformationV2` |

<a id="pro-jamf-pro-initialization"></a>
### jamf-pro-initialization

`Jamf::jamfProInitialization()`

| Request | Method | Path | Returns |
|---|---|---|---|
| `JamfProInitialization\InitializeSystemFedrampV1Request` | POST | `/v1/system/fedramp-initialize` | true |
| `JamfProInitialization\InitializeSystemV1Request` | POST | `/v1/system/initialize` | true |
| `JamfProInitialization\InitializeSystemDatabaseConnectionV1Request` | POST | `/v1/system/initialize-database-connection` | true |
| `JamfProInitialization\InitializeSystemPlatformV1Request` | POST | `/v1/system/platform-initialize` | true |

<a id="pro-jamf-pro-notifications"></a>
### jamf-pro-notifications

`Jamf::jamfProNotifications()`

| Request | Method | Path | Returns |
|---|---|---|---|
| `JamfProNotifications\GetNotificationsV1Request` | GET | `/v1/notifications` | Collection of `NotificationV1` |
| `JamfProNotifications\DeleteNotificationsV1Request` | DELETE | `/v1/notifications` | true |
| `JamfProNotifications\DeleteNotificationV1Request` | DELETE | `/v1/notifications/{type}/{id}` | true |

<a id="pro-jamf-pro-server-url-preview"></a>
### jamf-pro-server-url-preview

`Jamf::jamfProServerUrlPreview()`

As a builder over `GET /v1/jamf-pro-server-url/history` (`ObjectHistory` records): `orderBy()`, `get()`, `first()`, `count()`, `all()`, `lazy()`, `paginate()`, `create()`.

| Request | Method | Path | Returns |
|---|---|---|---|
| `JamfProServerUrlPreview\GetJamfProServerUrlV1Request` | GET | `/v1/jamf-pro-server-url` | `JamfProServerUrl` |
| `JamfProServerUrlPreview\ReplaceJamfProServerUrlV1Request` | PUT | `/v1/jamf-pro-server-url` | `JamfProServerUrl` |
| `JamfProServerUrlPreview\GetJamfProServerUrlHistoryV1Request` | GET | `/v1/jamf-pro-server-url/history` | a builder over `ObjectHistory` records |
| `JamfProServerUrlPreview\CreateJamfProServerUrlHistoryV1Request` | POST | `/v1/jamf-pro-server-url/history` | `ObjectHistory` |

<a id="pro-jamf-pro-user-account-settings"></a>
### jamf-pro-user-account-settings

`Jamf::jamfProUserAccountSettings()`

| Request | Method | Path | Returns |
|---|---|---|---|
| `JamfProUserAccountSettings\GetUserPreferencesSettingsV1Request` | GET | `/v1/user/preferences/settings/{keyId}` | `UserPreferencesSettings` |
| `JamfProUserAccountSettings\GetUserPreferenceV1Request` | GET | `/v1/user/preferences/{keyId}` | the decoded body |
| `JamfProUserAccountSettings\ReplaceUserPreferenceV1Request` | PUT | `/v1/user/preferences/{keyId}` | the decoded body |
| `JamfProUserAccountSettings\DeleteUserPreferenceV1Request` | DELETE | `/v1/user/preferences/{keyId}` | true |

<a id="pro-jamf-pro-version"></a>
### jamf-pro-version

`Jamf::jamfProVersion()`

| Request | Method | Path | Returns |
|---|---|---|---|
| `JamfProVersion\GetJamfProVersionV1Request` | GET | `/v1/jamf-pro-version` | `JamfProVersion` |

<a id="pro-jamf-protect"></a>
### jamf-protect

`Jamf::jamfProtect()`

As a builder over `GET /v1/jamf-protect/plans` (`JamfProtectPlan` records): `where()`, `orderBy()`, `get()`, `first()`, `count()`, `all()`, `lazy()`, `paginate()`.

| Request | Method | Path | Returns |
|---|---|---|---|
| `JamfProtect\GetJamfProtectV1Request` | GET | `/v1/jamf-protect` | `ProtectSettingsResponse` |
| `JamfProtect\ReplaceJamfProtectV1Request` | PUT | `/v1/jamf-protect` | `ProtectSettingsResponse` |
| `JamfProtect\DeleteJamfProtectV1Request` | DELETE | `/v1/jamf-protect` | true |
| `JamfProtect\GetJamfProtectDeploymentTasksV1Request` | GET | `/v1/jamf-protect/deployments/{id}/tasks` | a builder over `DeploymentTask` records |
| `JamfProtect\RetryJamfProtectDeploymentTasksV1Request` | POST | `/v1/jamf-protect/deployments/{id}/tasks/retry` | true |
| `JamfProtect\GetJamfProtectHistoryV1Request` | GET | `/v1/jamf-protect/history` | a builder over `ObjectHistory` records |
| `JamfProtect\CreateJamfProtectHistoryV1Request` | POST | `/v1/jamf-protect/history` | `HrefResponse` |
| `JamfProtect\GetJamfProtectPlansV1Request` | GET | `/v1/jamf-protect/plans` | a builder over `JamfProtectPlan` records |
| `JamfProtect\SyncJamfProtectPlansV1Request` | POST | `/v1/jamf-protect/plans/sync` | true |
| `JamfProtect\CreateJamfProtectRegisterV1Request` | POST | `/v1/jamf-protect/register` | `ProtectSettingsResponse` |

<a id="pro-jamf-remote-assist"></a>
### jamf-remote-assist

`Jamf::jamfRemoteAssist()`

As a builder over `GET /v2/jamf-remote-assist/session` (`SessionHistoryItem` records): `where()`, `orderBy()`, `get()`, `first()`, `count()`, `all()`, `lazy()`, `paginate()`, `find($id)`.

| Request | Method | Path | Returns |
|---|---|---|---|
| `JamfRemoteAssist\GetJamfRemoteAssistSessionV1Request` | GET | `/v1/jamf-remote-assist/session` | Collection of `SessionHistoryItem` |
| `JamfRemoteAssist\GetJamfRemoteAssistSessionByIdV1Request` | GET | `/v1/jamf-remote-assist/session/{id}` | `SessionHistoryItemWithDetails` |
| `JamfRemoteAssist\GetJamfRemoteAssistSessionV2Request` | GET | `/v2/jamf-remote-assist/session` | a builder over `SessionHistoryItem` records |
| `JamfRemoteAssist\ExportJamfRemoteAssistSessionV2Request` | POST | `/v2/jamf-remote-assist/session/export` | the body as text (text/csv) |
| `JamfRemoteAssist\GetJamfRemoteAssistSessionByIdV2Request` | GET | `/v2/jamf-remote-assist/session/{id}` | `SessionHistoryItemWithDetails` |

<a id="pro-last-login"></a>
### last-login

`Jamf::lastLogin()`

| Request | Method | Path | Returns |
|---|---|---|---|
| `LastLogin\GetLastLoginV1Request` | GET | `/v1/last-login` | `LastLoginResponse` |

<a id="pro-ldap"></a>
### ldap

`Jamf::ldap()`

| Request | Method | Path | Returns |
|---|---|---|---|
| `Ldap\GetLdapGroupsRequest` | GET | `/ldap/groups` | Collection of `LdapGroup` |
| `Ldap\GetLdapServersRequest` | GET | `/ldap/servers` | Collection of `LdapServer` |
| `Ldap\GetLdapGroupsV1Request` | GET | `/v1/ldap/groups` | Collection of `LdapGroup` |
| `Ldap\GetLdapLdapServersV1Request` | GET | `/v1/ldap/ldap-servers` | Collection of `LdapServer` |
| `Ldap\GetLdapServersV1Request` | GET | `/v1/ldap/servers` | Collection of `LdapServer` |

<a id="pro-local-admin-password"></a>
### local-admin-password

`Jamf::localAdminPassword()`

| Request | Method | Path | Returns |
|---|---|---|---|
| `LocalAdminPassword\GetLocalAdminPasswordPendingRotationsV2Request` | GET | `/v2/local-admin-password/pending-rotations` | Collection of `LapsPendingRotation` |
| `LocalAdminPassword\GetLocalAdminPasswordSettingsV2Request` | GET | `/v2/local-admin-password/settings` | `LapsSettingsResponseV2` |
| `LocalAdminPassword\ReplaceLocalAdminPasswordSettingsV2Request` | PUT | `/v2/local-admin-password/settings` | `LapsSettingsResponseV2` |
| `LocalAdminPassword\GetLocalAdminPasswordAccountAuditV2Request` | GET | `/v2/local-admin-password/{clientManagementId}/account/{username}/audit` | Collection of `LapsPasswordAndAuditsV2` |
| `LocalAdminPassword\GetLocalAdminPasswordAccountHistoryV2Request` | GET | `/v2/local-admin-password/{clientManagementId}/account/{username}/history` | Collection of `LapsHistory` |
| `LocalAdminPassword\GetLocalAdminPasswordAccountPasswordV2Request` | GET | `/v2/local-admin-password/{clientManagementId}/account/{username}/password` | `LapsPasswordResponseV2` |
| `LocalAdminPassword\GetLocalAdminPasswordAccountAuditByGuidV2Request` | GET | `/v2/local-admin-password/{clientManagementId}/account/{username}/{guid}/audit` | Collection of `LapsPasswordAndAuditsV2` |
| `LocalAdminPassword\GetLocalAdminPasswordAccountHistoryByGuidV2Request` | GET | `/v2/local-admin-password/{clientManagementId}/account/{username}/{guid}/history` | Collection of `LapsHistory` |
| `LocalAdminPassword\GetLocalAdminPasswordAccountPasswordByGuidV2Request` | GET | `/v2/local-admin-password/{clientManagementId}/account/{username}/{guid}/password` | `LapsPasswordResponseV2` |
| `LocalAdminPassword\GetLocalAdminPasswordAccountsV2Request` | GET | `/v2/local-admin-password/{clientManagementId}/accounts` | Collection of `LapsUserV2` |
| `LocalAdminPassword\GetLocalAdminPasswordHistoryV2Request` | GET | `/v2/local-admin-password/{clientManagementId}/history` | Collection of `LapsAccountManagementHistory` |
| `LocalAdminPassword\ReplaceLocalAdminPasswordSetPasswordV2Request` | PUT | `/v2/local-admin-password/{clientManagementId}/set-password` | `LapsUserPasswordResponseV2` |

<a id="pro-locales-preview"></a>
### locales-preview

`Jamf::localesPreview()`

| Request | Method | Path | Returns |
|---|---|---|---|
| `LocalesPreview\GetLocalesV1Request` | GET | `/v1/locales` | Collection of `Locale` |

<a id="pro-log-flushing"></a>
### log-flushing

`Jamf::logFlushing()`

| Request | Method | Path | Returns |
|---|---|---|---|
| `LogFlushing\GetLogFlushingV1Request` | GET | `/v1/log-flushing` | `LogFlushingV1` |
| `LogFlushing\GetLogFlushingTaskV1Request` | GET | `/v1/log-flushing/task` | Collection of `LogFlushingTaskV1` |
| `LogFlushing\CreateLogFlushingTaskV1Request` | POST | `/v1/log-flushing/task` | `HrefResponse` |
| `LogFlushing\GetLogFlushingTaskByIdV1Request` | GET | `/v1/log-flushing/task/{id}` | `LogFlushingTaskV1` |
| `LogFlushing\DeleteLogFlushingTaskV1Request` | DELETE | `/v1/log-flushing/task/{id}` | true |

<a id="pro-login-customization"></a>
### login-customization

`Jamf::loginCustomization()`

| Request | Method | Path | Returns |
|---|---|---|---|
| `LoginCustomization\GetLoginCustomizationV1Request` | GET | `/v1/login-customization` | `LoginContent` |
| `LoginCustomization\ReplaceLoginCustomizationV1Request` | PUT | `/v1/login-customization` | `LoginContentPut` |

<a id="pro-m2m"></a>
### m2m

`Jamf::m2m()`

| Request | Method | Path | Returns |
|---|---|---|---|
| `M2m\GetM2mTenantIdV1Request` | GET | `/v1/m2m/tenant-id` | `M2mTenantIdInfo` |

<a id="pro-macos-managed-software-updates"></a>
### macos-managed-software-updates

`Jamf::macosManagedSoftwareUpdates()`

| Request | Method | Path | Returns |
|---|---|---|---|
| `MacosManagedSoftwareUpdates\GetMacosManagedSoftwareUpdatesAvailableUpdatesV1Request` (deprecated) | GET | `/v1/macos-managed-software-updates/available-updates` | `AvailableUpdates` |
| `MacosManagedSoftwareUpdates\SendMacosManagedSoftwareUpdatesUpdatesV1Request` (deprecated) | POST | `/v1/macos-managed-software-updates/send-updates` | `MacOsManagedSoftwareUpdateResponse` |

<a id="pro-managed-software-updates"></a>
### managed-software-updates

`Jamf::managedSoftwareUpdates()`

As a builder over `GET /v1/managed-software-updates/plans` (`ManagedSoftwareUpdatePlan` records): `where()`, `orderBy()`, `get()`, `first()`, `count()`, `all()`, `lazy()`, `paginate()`, `find($id)`, `create()`.

| Request | Method | Path | Returns |
|---|---|---|---|
| `ManagedSoftwareUpdates\GetManagedSoftwareUpdatesAvailableUpdatesV1Request` | GET | `/v1/managed-software-updates/available-updates` | `AvailableOsUpdates` |
| `ManagedSoftwareUpdates\GetManagedSoftwareUpdatesPlansV1Request` | GET | `/v1/managed-software-updates/plans` | a builder over `ManagedSoftwareUpdatePlan` records |
| `ManagedSoftwareUpdates\CreateManagedSoftwareUpdatesPlansV1Request` | POST | `/v1/managed-software-updates/plans` | `ManagedSoftwareUpdatePlanPostResponse` |
| `ManagedSoftwareUpdates\GetManagedSoftwareUpdatesPlansFeatureToggleV1Request` | GET | `/v1/managed-software-updates/plans/feature-toggle` | `ManagedSoftwareUpdatePlanToggle` |
| `ManagedSoftwareUpdates\ReplaceManagedSoftwareUpdatesPlansFeatureToggleV1Request` | PUT | `/v1/managed-software-updates/plans/feature-toggle` | `ManagedSoftwareUpdatePlanToggle` |
| `ManagedSoftwareUpdates\AbandonManagedSoftwareUpdatesPlansFeatureToggleV1Request` | POST | `/v1/managed-software-updates/plans/feature-toggle/abandon` | true |
| `ManagedSoftwareUpdates\GetManagedSoftwareUpdatesPlansFeatureToggleStatusV1Request` | GET | `/v1/managed-software-updates/plans/feature-toggle/status` | `ManagedSoftwareUpdatePlanToggleStatusWrapper` |
| `ManagedSoftwareUpdates\CreateManagedSoftwareUpdatesPlansGroupV1Request` | POST | `/v1/managed-software-updates/plans/group` | `ManagedSoftwareUpdatePlanPostResponse` |
| `ManagedSoftwareUpdates\GetManagedSoftwareUpdatesPlansGroupV1Request` | GET | `/v1/managed-software-updates/plans/group/{id}` | Collection of `ManagedSoftwareUpdatePlan` |
| `ManagedSoftwareUpdates\GetManagedSoftwareUpdatesPlanV1Request` | GET | `/v1/managed-software-updates/plans/{id}` | `ManagedSoftwareUpdatePlan` |
| `ManagedSoftwareUpdates\GetManagedSoftwareUpdatesPlanDeclarationsV1Request` | GET | `/v1/managed-software-updates/plans/{id}/declarations` | `DssDeclarations` |
| `ManagedSoftwareUpdates\GetManagedSoftwareUpdatesPlanEventsV1Request` | GET | `/v1/managed-software-updates/plans/{id}/events` | `ManagedSoftwareUpdatePlanEventStore` |
| `ManagedSoftwareUpdates\GetManagedSoftwareUpdatesUpdateStatusesV1Request` | GET | `/v1/managed-software-updates/update-statuses` | Collection of `ManagedSoftwareUpdateStatus` |
| `ManagedSoftwareUpdates\GetManagedSoftwareUpdatesUpdateStatusesComputerGroupV1Request` | GET | `/v1/managed-software-updates/update-statuses/computer-groups/{id}` | Collection of `ManagedSoftwareUpdateStatus` |
| `ManagedSoftwareUpdates\GetManagedSoftwareUpdatesUpdateStatusesComputerV1Request` | GET | `/v1/managed-software-updates/update-statuses/computers/{id}` | Collection of `ManagedSoftwareUpdateStatus` |
| `ManagedSoftwareUpdates\GetManagedSoftwareUpdatesUpdateStatusesMobileDeviceGroupV1Request` | GET | `/v1/managed-software-updates/update-statuses/mobile-device-groups/{id}` | Collection of `ManagedSoftwareUpdateStatus` |
| `ManagedSoftwareUpdates\GetManagedSoftwareUpdatesUpdateStatusesMobileDeviceV1Request` | GET | `/v1/managed-software-updates/update-statuses/mobile-devices/{id}` | Collection of `ManagedSoftwareUpdateStatus` |

<a id="pro-mdm"></a>
### mdm

`Jamf::mdm()`

As a builder over `GET /v2/mdm/commands` (`MdmCommand` records): `where()`, `orderBy()`, `get()`, `first()`, `count()`, `all()`, `lazy()`, `paginate()`, `create()`.

| Request | Method | Path | Returns |
|---|---|---|---|
| `Mdm\DeployPackageV1Request` | POST | `/v1/deploy-package` | `VerbosePackageDeploymentResponse` |
| `Mdm\GetMdmCommandsV1Request` (deprecated) | GET | `/v1/mdm/commands` | Collection of `MdmCommand` |
| `Mdm\RenewMdmProfileV1Request` | POST | `/v1/mdm/renew-profile` | `RenewMdmProfileResponse` |
| `Mdm\CreateMdmBlankPushV2Request` | POST | `/v2/mdm/blank-push` | `BlankPushResponse` |
| `Mdm\GetMdmCommandsV2Request` | GET | `/v2/mdm/commands` | a builder over `MdmCommand` records |
| `Mdm\CreateMdmCommandsV2Request` | POST | `/v2/mdm/commands` | Collection of `HrefResponse` |

<a id="pro-mdm-renewal"></a>
### mdm-renewal

`Jamf::mdmRenewal()`

| Request | Method | Path | Returns |
|---|---|---|---|
| `MdmRenewal\UpdateMdmRenewalDeviceCommonDetailsV1Request` | PATCH | `/v1/mdm-renewal/device-common-details` | true |
| `MdmRenewal\GetMdmRenewalDeviceCommonDetailV1Request` | GET | `/v1/mdm-renewal/device-common-details/{clientManagementId}` | `DeviceCommonDetails` |
| `MdmRenewal\GetMdmRenewalRenewalStrategyV1Request` | GET | `/v1/mdm-renewal/renewal-strategies/{clientManagementId}` | Collection of `MdmRenewalErrorStrategiesResponse` |
| `MdmRenewal\DeleteMdmRenewalRenewalStrategyV1Request` | DELETE | `/v1/mdm-renewal/renewal-strategies/{clientManagementId}` | true |

<a id="pro-mobile-device-apps"></a>
### mobile-device-apps

`Jamf::mobileDeviceApps()`

| Request | Method | Path | Returns |
|---|---|---|---|
| `MobileDeviceApps\ReinstallMobileDeviceAppsAppConfigV1Request` | POST | `/v1/mobile-device-apps/reinstall-app-config` | true |

<a id="pro-mobile-device-enrollment-profile"></a>
### mobile-device-enrollment-profile

`Jamf::mobileDeviceEnrollmentProfile()`

| Request | Method | Path | Returns |
|---|---|---|---|
| `MobileDeviceEnrollmentProfile\GetMobileDeviceEnrollmentProfileDownloadProfileV1Request` | GET | `/v1/mobile-device-enrollment-profile/{id}/download-profile` | the body as text (application/x-apple-aspen-config) |

<a id="pro-mobile-device-extension-attributes"></a>
### mobile-device-extension-attributes

`Jamf::mobileDeviceExtensionAttributes()`

As a builder over `GET /v1/mobile-device-extension-attributes` (`MobileDeviceExtensionAttributes` records): `where()`, `orderBy()`, `get()`, `first()`, `count()`, `all()`, `lazy()`, `paginate()`, `find($id)`, `create()`, `update()`, `delete()`.

| Request | Method | Path | Returns |
|---|---|---|---|
| `MobileDeviceExtensionAttributes\GetMobileDeviceExtensionAttributesV1Request` | GET | `/v1/mobile-device-extension-attributes` | a builder over `MobileDeviceExtensionAttributes` records |
| `MobileDeviceExtensionAttributes\CreateMobileDeviceExtensionAttributesV1Request` | POST | `/v1/mobile-device-extension-attributes` | `HrefResponse` |
| `MobileDeviceExtensionAttributes\GetMobileDeviceExtensionAttributeV1Request` | GET | `/v1/mobile-device-extension-attributes/{id}` | `MobileDeviceExtensionAttributes` |
| `MobileDeviceExtensionAttributes\ReplaceMobileDeviceExtensionAttributeV1Request` | PUT | `/v1/mobile-device-extension-attributes/{id}` | `MobileDeviceExtensionAttributes` |
| `MobileDeviceExtensionAttributes\DeleteMobileDeviceExtensionAttributeV1Request` | DELETE | `/v1/mobile-device-extension-attributes/{id}` | true |
| `MobileDeviceExtensionAttributes\GetMobileDeviceExtensionAttributeDataDependencyV1Request` | GET | `/v1/mobile-device-extension-attributes/{id}/data-dependency` | Collection of arrays |
| `MobileDeviceExtensionAttributes\GetMobileDeviceExtensionAttributeHistoryV1Request` | GET | `/v1/mobile-device-extension-attributes/{id}/history` | a builder over `ObjectHistory` records |
| `MobileDeviceExtensionAttributes\CreateMobileDeviceExtensionAttributeHistoryV1Request` | POST | `/v1/mobile-device-extension-attributes/{id}/history` | `ObjectHistory` |

<a id="pro-mobile-device-extension-attributes-preview"></a>
### mobile-device-extension-attributes-preview

`Jamf::mobileDeviceExtensionAttributesPreview()`

| Request | Method | Path | Returns |
|---|---|---|---|
| `MobileDeviceExtensionAttributesPreview\GetDevicesExtensionAttributesRequest` | GET | `/devices/extensionAttributes` | `MobileDeviceExtensionAttributeResults` |

<a id="pro-mobile-device-groups"></a>
### mobile-device-groups

`Jamf::mobileDeviceGroups()`

As a builder over `GET /v2/mobile-device-groups/smart-groups` (`SmartGroup` records): `where()`, `orderBy()`, `get()`, `first()`, `count()`, `all()`, `lazy()`, `paginate()`, `find($id)`, `create()`, `update()`, `delete()`.

| Request | Method | Path | Returns |
|---|---|---|---|
| `MobileDeviceGroups\GetMobileDeviceGroupsV1Request` (deprecated) | GET | `/v1/mobile-device-groups` | Collection of `MobileDeviceGroup` |
| `MobileDeviceGroups\GetMobileDeviceGroupsSmartGroupMembershipV1Request` (deprecated) | GET | `/v1/mobile-device-groups/smart-group-membership/{id}` | a builder over `InventoryListMobileDevice` records |
| `MobileDeviceGroups\GetMobileDeviceGroupsSmartGroupsV1Request` (deprecated) | GET | `/v1/mobile-device-groups/smart-groups` | a builder over `SmartGroup` records |
| `MobileDeviceGroups\CreateMobileDeviceGroupsSmartGroupsV1Request` (deprecated) | POST | `/v1/mobile-device-groups/smart-groups` | `HrefResponse` |
| `MobileDeviceGroups\GetMobileDeviceGroupsSmartGroupV1Request` (deprecated) | GET | `/v1/mobile-device-groups/smart-groups/{id}` | `SmartGroupDetail` |
| `MobileDeviceGroups\ReplaceMobileDeviceGroupsSmartGroupV1Request` (deprecated) | PUT | `/v1/mobile-device-groups/smart-groups/{id}` | `SmartGroupAssignment` |
| `MobileDeviceGroups\DeleteMobileDeviceGroupsSmartGroupV1Request` (deprecated) | DELETE | `/v1/mobile-device-groups/smart-groups/{id}` | true |
| `MobileDeviceGroups\GetMobileDeviceGroupsStaticGroupMembershipV1Request` (deprecated) | GET | `/v1/mobile-device-groups/static-group-membership/{id}` | a builder over `InventoryListMobileDevice` records |
| `MobileDeviceGroups\GetMobileDeviceGroupsStaticGroupsV1Request` (deprecated) | GET | `/v1/mobile-device-groups/static-groups` | a builder over `StaticGroup` records |
| `MobileDeviceGroups\CreateMobileDeviceGroupsStaticGroupsV1Request` (deprecated) | POST | `/v1/mobile-device-groups/static-groups` | `HrefResponse` |
| `MobileDeviceGroups\GetMobileDeviceGroupsStaticGroupV1Request` (deprecated) | GET | `/v1/mobile-device-groups/static-groups/{id}` | `StaticGroup` |
| `MobileDeviceGroups\UpdateMobileDeviceGroupsStaticGroupV1Request` (deprecated) | PATCH | `/v1/mobile-device-groups/static-groups/{id}` | `StaticGroupAssignment` |
| `MobileDeviceGroups\DeleteMobileDeviceGroupsStaticGroupV1Request` (deprecated) | DELETE | `/v1/mobile-device-groups/static-groups/{id}` | true |
| `MobileDeviceGroups\EraseMobileDeviceGroupV1Request` (deprecated) | POST | `/v1/mobile-device-groups/{id}/erase` | true |
| `MobileDeviceGroups\GetMobileDeviceGroupsV2Request` | GET | `/v2/mobile-device-groups` | Collection of `MobileDeviceGroup` |
| `MobileDeviceGroups\GetMobileDeviceGroupsSmartGroupMembershipV2Request` | GET | `/v2/mobile-device-groups/smart-group-membership/{id}` | a builder over `InventoryListMobileDevice` records |
| `MobileDeviceGroups\GetMobileDeviceGroupsSmartGroupsV2Request` | GET | `/v2/mobile-device-groups/smart-groups` | a builder over `SmartGroup` records |
| `MobileDeviceGroups\CreateMobileDeviceGroupsSmartGroupsV2Request` | POST | `/v2/mobile-device-groups/smart-groups` | `HrefResponse` |
| `MobileDeviceGroups\GetMobileDeviceGroupsSmartGroupV2Request` | GET | `/v2/mobile-device-groups/smart-groups/{id}` | `SmartGroupDetailV2` |
| `MobileDeviceGroups\ReplaceMobileDeviceGroupsSmartGroupV2Request` | PUT | `/v2/mobile-device-groups/smart-groups/{id}` | `SmartGroupAssignmentV2` |
| `MobileDeviceGroups\DeleteMobileDeviceGroupsSmartGroupV2Request` | DELETE | `/v2/mobile-device-groups/smart-groups/{id}` | true |
| `MobileDeviceGroups\GetMobileDeviceGroupsStaticGroupMembershipV2Request` | GET | `/v2/mobile-device-groups/static-group-membership/{id}` | a builder over `InventoryListMobileDevice` records |
| `MobileDeviceGroups\GetMobileDeviceGroupsStaticGroupsV2Request` | GET | `/v2/mobile-device-groups/static-groups` | a builder over `StaticGroup` records |
| `MobileDeviceGroups\CreateMobileDeviceGroupsStaticGroupsV2Request` | POST | `/v2/mobile-device-groups/static-groups` | `HrefResponse` |
| `MobileDeviceGroups\GetMobileDeviceGroupsStaticGroupV2Request` | GET | `/v2/mobile-device-groups/static-groups/{id}` | `StaticGroup` |
| `MobileDeviceGroups\UpdateMobileDeviceGroupsStaticGroupV2Request` | PATCH | `/v2/mobile-device-groups/static-groups/{id}` | `StaticGroupAssignment` |
| `MobileDeviceGroups\DeleteMobileDeviceGroupsStaticGroupV2Request` | DELETE | `/v2/mobile-device-groups/static-groups/{id}` | true |
| `MobileDeviceGroups\EraseMobileDeviceGroupV2Request` | POST | `/v2/mobile-device-groups/{id}/erase` | true |

<a id="pro-mobile-device-prestages"></a>
### mobile-device-prestages

`Jamf::mobileDevicePrestages()`

As a builder over `GET /v3/mobile-device-prestages` (`GetMobileDevicePrestageV3` records): `orderBy()`, `get()`, `first()`, `count()`, `all()`, `lazy()`, `paginate()`, `find($id)`, `create()`, `update()`, `delete()`.

| Request | Method | Path | Returns |
|---|---|---|---|
| `MobileDevicePrestages\GetMobileDevicePrestagesV2Request` (deprecated) | GET | `/v2/mobile-device-prestages` | a builder over `GetMobileDevicePrestageV2` records |
| `MobileDevicePrestages\CreateMobileDevicePrestagesV2Request` (deprecated) | POST | `/v2/mobile-device-prestages` | `HrefResponse` |
| `MobileDevicePrestages\GetMobileDevicePrestagesScopeV2Request` | GET | `/v2/mobile-device-prestages/scope` | `PrestageScopeV2` |
| `MobileDevicePrestages\GetMobileDevicePrestagesSyncsV2Request` | GET | `/v2/mobile-device-prestages/syncs` | Collection of `PrestageSyncStatusV2` |
| `MobileDevicePrestages\GetMobileDevicePrestageV2Request` (deprecated) | GET | `/v2/mobile-device-prestages/{id}` | `GetMobileDevicePrestageV2` |
| `MobileDevicePrestages\ReplaceMobileDevicePrestageV2Request` (deprecated) | PUT | `/v2/mobile-device-prestages/{id}` | `GetMobileDevicePrestageV2` |
| `MobileDevicePrestages\DeleteMobileDevicePrestageV2Request` (deprecated) | DELETE | `/v2/mobile-device-prestages/{id}` | true |
| `MobileDevicePrestages\GetMobileDevicePrestageAttachmentsV2Request` (deprecated) | GET | `/v2/mobile-device-prestages/{id}/attachments` | Collection of `FileAttachmentV2` |
| `MobileDevicePrestages\CreateMobileDevicePrestageAttachmentsV2Request` (deprecated) | POST | `/v2/mobile-device-prestages/{id}/attachments` | `PrestageFileAttachmentV2` |
| `MobileDevicePrestages\DeleteMultipleMobileDevicePrestageAttachmentsV2Request` (deprecated) | POST | `/v2/mobile-device-prestages/{id}/attachments/delete-multiple` | true |
| `MobileDevicePrestages\GetMobileDevicePrestageHistoryV2Request` (deprecated) | GET | `/v2/mobile-device-prestages/{id}/history` | a builder over `ObjectHistory` records |
| `MobileDevicePrestages\CreateMobileDevicePrestageHistoryV2Request` (deprecated) | POST | `/v2/mobile-device-prestages/{id}/history` | `HrefResponse` |
| `MobileDevicePrestages\GetMobileDevicePrestageScopeV2Request` | GET | `/v2/mobile-device-prestages/{id}/scope` | `PrestageScopeResponseV2` |
| `MobileDevicePrestages\CreateMobileDevicePrestageScopeV2Request` | POST | `/v2/mobile-device-prestages/{id}/scope` | `PrestageScopeResponseV2` |
| `MobileDevicePrestages\ReplaceMobileDevicePrestageScopeV2Request` | PUT | `/v2/mobile-device-prestages/{id}/scope` | `PrestageScopeResponseV2` |
| `MobileDevicePrestages\DeleteMultipleMobileDevicePrestageScopeV2Request` | POST | `/v2/mobile-device-prestages/{id}/scope/delete-multiple` | `PrestageScopeResponseV2` |
| `MobileDevicePrestages\GetMobileDevicePrestageSyncsV2Request` | GET | `/v2/mobile-device-prestages/{id}/syncs` | Collection of `PrestageSyncStatusV2` |
| `MobileDevicePrestages\GetMobileDevicePrestageSyncsLatestV2Request` | GET | `/v2/mobile-device-prestages/{id}/syncs/latest` | `PrestageSyncStatusV2` |
| `MobileDevicePrestages\GetMobileDevicePrestagesV3Request` | GET | `/v3/mobile-device-prestages` | a builder over `GetMobileDevicePrestageV3` records |
| `MobileDevicePrestages\CreateMobileDevicePrestagesV3Request` | POST | `/v3/mobile-device-prestages` | `HrefResponse` |
| `MobileDevicePrestages\GetMobileDevicePrestageV3Request` | GET | `/v3/mobile-device-prestages/{id}` | `GetMobileDevicePrestageV3` |
| `MobileDevicePrestages\ReplaceMobileDevicePrestageV3Request` | PUT | `/v3/mobile-device-prestages/{id}` | `GetMobileDevicePrestageV3` |
| `MobileDevicePrestages\DeleteMobileDevicePrestageV3Request` | DELETE | `/v3/mobile-device-prestages/{id}` | true |
| `MobileDevicePrestages\GetMobileDevicePrestageAttachmentsV3Request` | GET | `/v3/mobile-device-prestages/{id}/attachments` | Collection of `FileAttachmentV3` |
| `MobileDevicePrestages\CreateMobileDevicePrestageAttachmentsV3Request` | POST | `/v3/mobile-device-prestages/{id}/attachments` | `PrestageFileAttachmentV3` |
| `MobileDevicePrestages\DeleteMultipleMobileDevicePrestageAttachmentsV3Request` | POST | `/v3/mobile-device-prestages/{id}/attachments/delete-multiple` | true |
| `MobileDevicePrestages\GetMobileDevicePrestageHistoryV3Request` | GET | `/v3/mobile-device-prestages/{id}/history` | a builder over `ObjectHistory` records |
| `MobileDevicePrestages\CreateMobileDevicePrestageHistoryV3Request` | POST | `/v3/mobile-device-prestages/{id}/history` | `HrefResponse` |

<a id="pro-mobile-devices"></a>
### mobile-devices

`Jamf::mobileDevices()`

As a builder over `GET /v2/mobile-devices` (`MobileDeviceV2` records): `orderBy()`, `get()`, `first()`, `count()`, `all()`, `lazy()`, `paginate()`, `find($id)`, `update()`.

| Request | Method | Path | Returns |
|---|---|---|---|
| `MobileDevices\GetMobileDevicesV2Request` | GET | `/v2/mobile-devices` | a builder over `MobileDeviceV2` records |
| `MobileDevices\GetMobileDevicesDetailV2Request` | GET | `/v2/mobile-devices/detail` | a builder over `MobileDeviceResponse` records |
| `MobileDevices\GetMobileDeviceV2Request` | GET | `/v2/mobile-devices/{id}` | `MobileDeviceV2` |
| `MobileDevices\UpdateMobileDeviceV2Request` | PATCH | `/v2/mobile-devices/{id}` | `MobileDeviceDetailsV2` |
| `MobileDevices\GetMobileDeviceDetailV2Request` | GET | `/v2/mobile-devices/{id}/detail` | `MobileDeviceDetailsGetV2` |
| `MobileDevices\EraseMobileDeviceV2Request` | POST | `/v2/mobile-devices/{id}/erase` | `EraseDeviceMobileDeviceResponse` |
| `MobileDevices\GetMobileDevicePairedDevicesV2Request` | GET | `/v2/mobile-devices/{id}/paired-devices` | a builder over `MobileDeviceResponse` records |
| `MobileDevices\UnmanageMobileDeviceV2Request` | POST | `/v2/mobile-devices/{id}/unmanage` | `UnmanageMobileDeviceResponse` |

<a id="pro-oidc"></a>
### oidc

`Jamf::oidc()`

| Request | Method | Path | Returns |
|---|---|---|---|
| `Oidc\GetOidcDirectIdpLoginUrlV1Request` | GET | `/v1/oidc/direct-idp-login-url` | `OidcDirectIdpLoginSkipUrl` |
| `Oidc\DispatchOidcV1Request` (deprecated) | POST | `/v1/oidc/dispatch` | `OidcLoginDispatchResponse` |
| `Oidc\GenerateOidcCertificateV1Request` | POST | `/v1/oidc/generate-certificate` | true |
| `Oidc\GetOidcPublicFeaturesV1Request` | GET | `/v1/oidc/public-features` | `OidcPublicFeaturesResponse` |
| `Oidc\GetOidcPublicKeyV1Request` | GET | `/v1/oidc/public-key` | `OidcJwksResponse` |
| `Oidc\DispatchOidcV2Request` | POST | `/v2/oidc/dispatch` | `OidcLoginDispatchResponseV2` |

<a id="pro-onboarding"></a>
### onboarding

`Jamf::onboarding()`

As a builder over `GET /v1/onboarding/history` (`ObjectHistory` records): `where()`, `orderBy()`, `get()`, `first()`, `count()`, `all()`, `lazy()`, `paginate()`, `create()`.

| Request | Method | Path | Returns |
|---|---|---|---|
| `Onboarding\GetOnboardingV1Request` | GET | `/v1/onboarding` | `OnboardingConfiguration` |
| `Onboarding\ReplaceOnboardingV1Request` | PUT | `/v1/onboarding` | `OnboardingConfiguration` |
| `Onboarding\GetOnboardingEligibleAppsV1Request` | GET | `/v1/onboarding/eligible-apps` | a builder over `OnboardingEligibleItem` records |
| `Onboarding\GetOnboardingEligibleConfigurationProfilesV1Request` | GET | `/v1/onboarding/eligible-configuration-profiles` | a builder over `OnboardingEligibleItem` records |
| `Onboarding\GetOnboardingEligiblePoliciesV1Request` | GET | `/v1/onboarding/eligible-policies` | a builder over `OnboardingEligibleItem` records |
| `Onboarding\GetOnboardingHistoryV1Request` | GET | `/v1/onboarding/history` | a builder over `ObjectHistory` records |
| `Onboarding\CreateOnboardingHistoryV1Request` | POST | `/v1/onboarding/history` | `HrefResponse` |
| `Onboarding\ExportOnboardingHistoryV1Request` | POST | `/v1/onboarding/history/export` | the body as text (text/csv) |

<a id="pro-packages"></a>
### packages

`Jamf::packages()`

As a builder over `GET /v1/packages` (`Package` records): `where()`, `orderBy()`, `get()`, `first()`, `count()`, `all()`, `lazy()`, `paginate()`, `find($id)`, `create()`, `update()`, `delete()`.

| Request | Method | Path | Returns |
|---|---|---|---|
| `Packages\GetPackagesV1Request` | GET | `/v1/packages` | a builder over `Package` records |
| `Packages\CreatePackagesV1Request` | POST | `/v1/packages` | `HrefResponse` |
| `Packages\DeleteMultiplePackagesV1Request` | POST | `/v1/packages/delete-multiple` | true |
| `Packages\ExportPackagesV1Request` | POST | `/v1/packages/export` | the body as text (text/csv) |
| `Packages\GetPackageV1Request` | GET | `/v1/packages/{id}` | `Package` |
| `Packages\ReplacePackageV1Request` | PUT | `/v1/packages/{id}` | `Package` |
| `Packages\DeletePackageV1Request` | DELETE | `/v1/packages/{id}` | true |
| `Packages\GetPackageHistoryV1Request` | GET | `/v1/packages/{id}/history` | a builder over `ObjectHistory` records |
| `Packages\CreatePackageHistoryV1Request` | POST | `/v1/packages/{id}/history` | `ObjectHistory` |
| `Packages\ExportPackageHistoryV1Request` | POST | `/v1/packages/{id}/history/export` | the body as text (text/csv) |
| `Packages\CreatePackageManifestV1Request` | POST | `/v1/packages/{id}/manifest` | `Package` |
| `Packages\DeletePackageManifestV1Request` | DELETE | `/v1/packages/{id}/manifest` | true |
| `Packages\UploadPackageV1Request` | POST | `/v1/packages/{id}/upload` | `HrefResponse` |

<a id="pro-parent-app-preview"></a>
### parent-app-preview

`Jamf::parentAppPreview()`

As a builder over `GET /v1/parent-app/history` (`ObjectHistory` records): `where()`, `orderBy()`, `get()`, `first()`, `count()`, `all()`, `lazy()`, `paginate()`, `create()`.

| Request | Method | Path | Returns |
|---|---|---|---|
| `ParentAppPreview\GetParentAppV1Request` | GET | `/v1/parent-app` | `ParentApp` |
| `ParentAppPreview\ReplaceParentAppV1Request` | PUT | `/v1/parent-app` | `ParentApp` |
| `ParentAppPreview\GetParentAppHistoryV1Request` | GET | `/v1/parent-app/history` | a builder over `ObjectHistory` records |
| `ParentAppPreview\CreateParentAppHistoryV1Request` | POST | `/v1/parent-app/history` | `ObjectHistory` |

<a id="pro-patch-management"></a>
### patch-management

`Jamf::patchManagement()`

| Request | Method | Path | Returns |
|---|---|---|---|
| `PatchManagement\CreatePatchManagementAcceptDisclaimerV2Request` | POST | `/v2/patch-management-accept-disclaimer` | true |

<a id="pro-patch-policies"></a>
### patch-policies

`Jamf::patchPolicies()`

As a builder over `GET /v2/patch-policies` (`PatchPolicyListView` records): `where()`, `orderBy()`, `get()`, `first()`, `count()`, `all()`, `lazy()`, `paginate()`.

| Request | Method | Path | Returns |
|---|---|---|---|
| `PatchPolicies\GetPatchPoliciesV2Request` | GET | `/v2/patch-policies` | a builder over `PatchPolicyListView` records |
| `PatchPolicies\GetPatchPoliciesPolicyDetailsV2Request` | GET | `/v2/patch-policies/policy-details` | a builder over `PatchPolicyDetail` records |
| `PatchPolicies\GetPatchPolicyDashboardV2Request` | GET | `/v2/patch-policies/{id}/dashboard` | `PatchPolicyV2OnDashboard` |
| `PatchPolicies\CreatePatchPolicyDashboardV2Request` | POST | `/v2/patch-policies/{id}/dashboard` | true |
| `PatchPolicies\DeletePatchPolicyDashboardV2Request` | DELETE | `/v2/patch-policies/{id}/dashboard` | true |

<a id="pro-patch-policy-logs"></a>
### patch-policy-logs

`Jamf::patchPolicyLogs()`

| Request | Method | Path | Returns |
|---|---|---|---|
| `PatchPolicyLogs\GetPatchPolicyLogsV2Request` | GET | `/v2/patch-policies/{id}/logs` | a builder over `PatchPolicyLogV2` records |
| `PatchPolicyLogs\GetPatchPolicyLogsEligibleRetryCountV2Request` | GET | `/v2/patch-policies/{id}/logs/eligible-retry-count` | `PatchPolicyLogEligibleRetryCount` |
| `PatchPolicyLogs\RetryPatchPolicyLogsV2Request` | POST | `/v2/patch-policies/{id}/logs/retry` | true |
| `PatchPolicyLogs\RetryPatchPolicyLogsAllV2Request` | POST | `/v2/patch-policies/{id}/logs/retry-all` | true |
| `PatchPolicyLogs\GetPatchPolicyLogV2Request` | GET | `/v2/patch-policies/{id}/logs/{deviceId}` | `PatchPolicyLogV2` |
| `PatchPolicyLogs\GetPatchPolicyLogDetailsV2Request` | GET | `/v2/patch-policies/{id}/logs/{deviceId}/details` | Collection of `PatchPolicyLogDetail` |

<a id="pro-patch-software-title-configurations"></a>
### patch-software-title-configurations

`Jamf::patchSoftwareTitleConfigurations()`

| Request | Method | Path | Returns |
|---|---|---|---|
| `PatchSoftwareTitleConfigurations\GetPatchSoftwareTitleConfigurationsV2Request` (deprecated) | GET | `/v2/patch-software-title-configurations` | Collection of `PatchSoftwareTitleConfiguration` |
| `PatchSoftwareTitleConfigurations\CreatePatchSoftwareTitleConfigurationsV2Request` (deprecated) | POST | `/v2/patch-software-title-configurations` | `HrefResponse` |
| `PatchSoftwareTitleConfigurations\GetPatchSoftwareTitleConfigurationV2Request` (deprecated) | GET | `/v2/patch-software-title-configurations/{id}` | `PatchSoftwareTitleConfiguration` |
| `PatchSoftwareTitleConfigurations\UpdatePatchSoftwareTitleConfigurationV2Request` (deprecated) | PATCH | `/v2/patch-software-title-configurations/{id}` | `PatchSoftwareTitleConfiguration` |
| `PatchSoftwareTitleConfigurations\DeletePatchSoftwareTitleConfigurationV2Request` (deprecated) | DELETE | `/v2/patch-software-title-configurations/{id}` | true |
| `PatchSoftwareTitleConfigurations\GetPatchSoftwareTitleConfigurationDashboardV2Request` (deprecated) | GET | `/v2/patch-software-title-configurations/{id}/dashboard` | `SoftwareTitleConfigurationOnDashboard` |
| `PatchSoftwareTitleConfigurations\CreatePatchSoftwareTitleConfigurationDashboardV2Request` (deprecated) | POST | `/v2/patch-software-title-configurations/{id}/dashboard` | true |
| `PatchSoftwareTitleConfigurations\DeletePatchSoftwareTitleConfigurationDashboardV2Request` (deprecated) | DELETE | `/v2/patch-software-title-configurations/{id}/dashboard` | true |
| `PatchSoftwareTitleConfigurations\GetPatchSoftwareTitleConfigurationDefinitionsV2Request` (deprecated) | GET | `/v2/patch-software-title-configurations/{id}/definitions` | a builder over `PatchSoftwareTitleDefinition` records |
| `PatchSoftwareTitleConfigurations\GetPatchSoftwareTitleConfigurationDependenciesV2Request` (deprecated) | GET | `/v2/patch-software-title-configurations/{id}/dependencies` | Collection of `PatchSoftwareTitleConfigurationDependency` |
| `PatchSoftwareTitleConfigurations\GetPatchSoftwareTitleConfigurationExportReportV2Request` (deprecated) | GET | `/v2/patch-software-title-configurations/{id}/export-report` | the body as text (text/csv) |
| `PatchSoftwareTitleConfigurations\GetPatchSoftwareTitleConfigurationExtensionAttributesV2Request` (deprecated) | GET | `/v2/patch-software-title-configurations/{id}/extension-attributes` | Collection of `PatchSoftwareTitleExtensionAttributes` |
| `PatchSoftwareTitleConfigurations\GetPatchSoftwareTitleConfigurationHistoryV2Request` (deprecated) | GET | `/v2/patch-software-title-configurations/{id}/history` | a builder over `ObjectHistory` records |
| `PatchSoftwareTitleConfigurations\CreatePatchSoftwareTitleConfigurationHistoryV2Request` (deprecated) | POST | `/v2/patch-software-title-configurations/{id}/history` | `HrefResponse` |
| `PatchSoftwareTitleConfigurations\GetPatchSoftwareTitleConfigurationPatchReportV2Request` (deprecated) | GET | `/v2/patch-software-title-configurations/{id}/patch-report` | a builder over `PatchSoftwareTitleReport` records |
| `PatchSoftwareTitleConfigurations\GetPatchSoftwareTitleConfigurationPatchSummaryV2Request` (deprecated) | GET | `/v2/patch-software-title-configurations/{id}/patch-summary` | `PatchSummary` |
| `PatchSoftwareTitleConfigurations\GetPatchSoftwareTitleConfigurationPatchSummaryVersionsV2Request` (deprecated) | GET | `/v2/patch-software-title-configurations/{id}/patch-summary/versions` | Collection of `PatchSummaryVersion` |
| `PatchSoftwareTitleConfigurations\GetPatchSoftwareTitleConfigurationsV3Request` | GET | `/v3/patch-software-title-configurations` | Collection of `PatchSoftwareTitleConfiguration` |
| `PatchSoftwareTitleConfigurations\CreatePatchSoftwareTitleConfigurationsV3Request` | POST | `/v3/patch-software-title-configurations` | `HrefResponse` |
| `PatchSoftwareTitleConfigurations\GetPatchSoftwareTitleConfigurationV3Request` | GET | `/v3/patch-software-title-configurations/{id}` | `PatchSoftwareTitleConfiguration` |
| `PatchSoftwareTitleConfigurations\UpdatePatchSoftwareTitleConfigurationV3Request` | PATCH | `/v3/patch-software-title-configurations/{id}` | `PatchSoftwareTitleConfiguration` |
| `PatchSoftwareTitleConfigurations\DeletePatchSoftwareTitleConfigurationV3Request` | DELETE | `/v3/patch-software-title-configurations/{id}` | true |
| `PatchSoftwareTitleConfigurations\GetPatchSoftwareTitleConfigurationDashboardV3Request` | GET | `/v3/patch-software-title-configurations/{id}/dashboard` | `SoftwareTitleConfigurationOnDashboard` |
| `PatchSoftwareTitleConfigurations\CreatePatchSoftwareTitleConfigurationDashboardV3Request` | POST | `/v3/patch-software-title-configurations/{id}/dashboard` | true |
| `PatchSoftwareTitleConfigurations\DeletePatchSoftwareTitleConfigurationDashboardV3Request` | DELETE | `/v3/patch-software-title-configurations/{id}/dashboard` | true |
| `PatchSoftwareTitleConfigurations\GetPatchSoftwareTitleConfigurationDefinitionsV3Request` | GET | `/v3/patch-software-title-configurations/{id}/definitions` | a builder over `PatchSoftwareTitleDefinition` records |
| `PatchSoftwareTitleConfigurations\GetPatchSoftwareTitleConfigurationDependenciesV3Request` | GET | `/v3/patch-software-title-configurations/{id}/dependencies` | Collection of `PatchSoftwareTitleConfigurationDependency` |
| `PatchSoftwareTitleConfigurations\GetPatchSoftwareTitleConfigurationExportReportV3Request` | GET | `/v3/patch-software-title-configurations/{id}/export-report` | the body as text (text/csv) |
| `PatchSoftwareTitleConfigurations\GetPatchSoftwareTitleConfigurationExtensionAttributesV3Request` | GET | `/v3/patch-software-title-configurations/{id}/extension-attributes` | Collection of `PatchSoftwareTitleExtensionAttributes` |
| `PatchSoftwareTitleConfigurations\GetPatchSoftwareTitleConfigurationHistoryV3Request` | GET | `/v3/patch-software-title-configurations/{id}/history` | a builder over `ObjectHistory` records |
| `PatchSoftwareTitleConfigurations\CreatePatchSoftwareTitleConfigurationHistoryV3Request` | POST | `/v3/patch-software-title-configurations/{id}/history` | `HrefResponse` |
| `PatchSoftwareTitleConfigurations\GetPatchSoftwareTitleConfigurationPatchReportV3Request` | GET | `/v3/patch-software-title-configurations/{id}/patch-report` | a builder over `PatchReportV3` records |
| `PatchSoftwareTitleConfigurations\GetPatchSoftwareTitleConfigurationPatchSummaryV3Request` | GET | `/v3/patch-software-title-configurations/{id}/patch-summary` | `PatchSummary` |
| `PatchSoftwareTitleConfigurations\GetPatchSoftwareTitleConfigurationPatchSummaryVersionsV3Request` | GET | `/v3/patch-software-title-configurations/{id}/patch-summary/versions` | Collection of `PatchSummaryVersion` |

<a id="pro-policies-preview"></a>
### policies-preview

`Jamf::policiesPreview()`

| Request | Method | Path | Returns |
|---|---|---|---|
| `PoliciesPreview\GetSettingsObjPolicyPropertiesRequest` (deprecated) | GET | `/settings/obj/policyProperties` | `PolicyProperties` |
| `PoliciesPreview\ReplaceSettingsObjPolicyPropertiesRequest` (deprecated) | PUT | `/settings/obj/policyProperties` | `PolicyProperties` |
| `PoliciesPreview\GetPolicyPropertiesV1Request` | GET | `/v1/policy-properties` | `PolicyPropertiesV1` |
| `PoliciesPreview\ReplacePolicyPropertiesV1Request` | PUT | `/v1/policy-properties` | `PolicyPropertiesV1` |

<a id="pro-re-enrollment-preview"></a>
### re-enrollment-preview

`Jamf::reEnrollmentPreview()`

As a builder over `GET /v1/reenrollment/history` (`ObjectHistory` records): `orderBy()`, `get()`, `first()`, `count()`, `all()`, `lazy()`, `paginate()`, `create()`.

| Request | Method | Path | Returns |
|---|---|---|---|
| `ReEnrollmentPreview\GetReenrollmentV1Request` | GET | `/v1/reenrollment` | `Reenrollment` |
| `ReEnrollmentPreview\ReplaceReenrollmentV1Request` | PUT | `/v1/reenrollment` | `Reenrollment` |
| `ReEnrollmentPreview\GetReenrollmentHistoryV1Request` | GET | `/v1/reenrollment/history` | a builder over `ObjectHistory` records |
| `ReEnrollmentPreview\CreateReenrollmentHistoryV1Request` | POST | `/v1/reenrollment/history` | `ObjectHistory` |
| `ReEnrollmentPreview\ExportReenrollmentHistoryV1Request` | POST | `/v1/reenrollment/history/export` | the decoded body |

<a id="pro-remote-administration"></a>
### remote-administration

`Jamf::remoteAdministration()`

As a builder over `GET /preview/remote-administration-configurations` (`RemoteAdministrationResponse` records): `get()`, `first()`, `count()`, `all()`, `lazy()`, `paginate()`.

| Request | Method | Path | Returns |
|---|---|---|---|
| `RemoteAdministration\GetRemoteAdministrationConfigurationsPreviewRequest` | GET | `/preview/remote-administration-configurations` | a builder over `RemoteAdministrationResponse` records |

<a id="pro-return-to-service"></a>
### return-to-service

`Jamf::returnToService()`

| Request | Method | Path | Returns |
|---|---|---|---|
| `ReturnToService\GetReturnToServiceV1Request` | GET | `/v1/return-to-service` | Collection of `ReturnToServiceConfiguration` |
| `ReturnToService\CreateReturnToServiceV1Request` | POST | `/v1/return-to-service` | `HrefResponse` |
| `ReturnToService\GetReturnToServiceByIdV1Request` | GET | `/v1/return-to-service/{id}` | `ReturnToServiceConfiguration` |
| `ReturnToService\ReplaceReturnToServiceV1Request` | PUT | `/v1/return-to-service/{id}` | `ReturnToServiceConfiguration` |
| `ReturnToService\DeleteReturnToServiceV1Request` | DELETE | `/v1/return-to-service/{id}` | true |

<a id="pro-scheduler"></a>
### scheduler

`Jamf::scheduler()`

| Request | Method | Path | Returns |
|---|---|---|---|
| `Scheduler\GetSchedulerJobsV1Request` | GET | `/v1/scheduler/jobs` | `SchedulerJobs` |
| `Scheduler\GetSchedulerJobTriggersV1Request` | GET | `/v1/scheduler/jobs/{jobKey}/triggers` | a builder over `SchedulerTrigger` records |
| `Scheduler\GetSchedulerSummaryV1Request` | GET | `/v1/scheduler/summary` | `SchedulerSummary` |

<a id="pro-scripts"></a>
### scripts

`Jamf::scripts()`

As a builder over `GET /v1/scripts` (`Script` records): `where()`, `orderBy()`, `get()`, `first()`, `count()`, `all()`, `lazy()`, `paginate()`, `find($id)`, `create()`, `update()`, `delete()`.

| Request | Method | Path | Returns |
|---|---|---|---|
| `Scripts\GetScriptsV1Request` | GET | `/v1/scripts` | a builder over `Script` records |
| `Scripts\CreateScriptsV1Request` | POST | `/v1/scripts` | `HrefResponse` |
| `Scripts\GetScriptV1Request` | GET | `/v1/scripts/{id}` | `Script` |
| `Scripts\ReplaceScriptV1Request` | PUT | `/v1/scripts/{id}` | `Script` |
| `Scripts\DeleteScriptV1Request` | DELETE | `/v1/scripts/{id}` | true |
| `Scripts\GetScriptDownloadV1Request` | GET | `/v1/scripts/{id}/download` | the body as text (text/plain) |
| `Scripts\GetScriptHistoryV1Request` | GET | `/v1/scripts/{id}/history` | a builder over `ObjectHistory` records |
| `Scripts\CreateScriptHistoryV1Request` | POST | `/v1/scripts/{id}/history` | `ObjectHistory` |

<a id="pro-self-service"></a>
### self-service

`Jamf::selfService()`

As a builder over `GET /v1/self-service/settings/history` (`ObjectHistory` records): `where()`, `orderBy()`, `get()`, `first()`, `count()`, `all()`, `lazy()`, `paginate()`, `create()`.

| Request | Method | Path | Returns |
|---|---|---|---|
| `SelfService\GetSelfServiceSettingsV1Request` | GET | `/v1/self-service/settings` | `SelfServiceSettings` |
| `SelfService\ReplaceSelfServiceSettingsV1Request` | PUT | `/v1/self-service/settings` | `SelfServiceSettings` |
| `SelfService\GetSelfServiceSettingsHistoryV1Request` | GET | `/v1/self-service/settings/history` | a builder over `ObjectHistory` records |
| `SelfService\CreateSelfServiceSettingsHistoryV1Request` | POST | `/v1/self-service/settings/history` | `HrefResponse` |

<a id="pro-self-service-branding-ios"></a>
### self-service-branding-ios

`Jamf::selfServiceBrandingIos()`

As a builder over `GET /v1/self-service/branding/ios` (`IosBrandingConfiguration` records): `orderBy()`, `get()`, `first()`, `count()`, `all()`, `lazy()`, `paginate()`, `find($id)`, `create()`, `update()`, `delete()`.

| Request | Method | Path | Returns |
|---|---|---|---|
| `SelfServiceBrandingIos\GetSelfServiceBrandingIosV1Request` | GET | `/v1/self-service/branding/ios` | a builder over `IosBrandingConfiguration` records |
| `SelfServiceBrandingIos\CreateSelfServiceBrandingIosV1Request` | POST | `/v1/self-service/branding/ios` | `HrefResponse` |
| `SelfServiceBrandingIos\GetSelfServiceBrandingIosByIdV1Request` | GET | `/v1/self-service/branding/ios/{id}` | `IosBrandingConfiguration` |
| `SelfServiceBrandingIos\ReplaceSelfServiceBrandingIosV1Request` | PUT | `/v1/self-service/branding/ios/{id}` | `IosBrandingConfiguration` |
| `SelfServiceBrandingIos\DeleteSelfServiceBrandingIosV1Request` | DELETE | `/v1/self-service/branding/ios/{id}` | true |

<a id="pro-self-service-branding-macos"></a>
### self-service-branding-macos

`Jamf::selfServiceBrandingMacos()`

As a builder over `GET /v1/self-service/branding/macos` (`MacOsBrandingConfiguration` records): `orderBy()`, `get()`, `first()`, `count()`, `all()`, `lazy()`, `paginate()`, `find($id)`, `create()`, `update()`, `delete()`.

| Request | Method | Path | Returns |
|---|---|---|---|
| `SelfServiceBrandingMacos\GetSelfServiceBrandingMacosV1Request` | GET | `/v1/self-service/branding/macos` | a builder over `MacOsBrandingConfiguration` records |
| `SelfServiceBrandingMacos\CreateSelfServiceBrandingMacosV1Request` | POST | `/v1/self-service/branding/macos` | `HrefResponse` |
| `SelfServiceBrandingMacos\GetSelfServiceBrandingMacosByIdV1Request` | GET | `/v1/self-service/branding/macos/{id}` | `MacOsBrandingConfiguration` |
| `SelfServiceBrandingMacos\ReplaceSelfServiceBrandingMacosV1Request` | PUT | `/v1/self-service/branding/macos/{id}` | `MacOsBrandingConfiguration` |
| `SelfServiceBrandingMacos\DeleteSelfServiceBrandingMacosV1Request` | DELETE | `/v1/self-service/branding/macos/{id}` | true |

<a id="pro-self-service-branding-preview"></a>
### self-service-branding-preview

`Jamf::selfServiceBrandingPreview()`

| Request | Method | Path | Returns |
|---|---|---|---|
| `SelfServiceBrandingPreview\CreateSelfServiceBrandingImagesRequest` | POST | `/self-service/branding/images` | `BrandingImageUrl` |

<a id="pro-self-service-plus"></a>
### self-service-plus

`Jamf::selfServicePlus()`

| Request | Method | Path | Returns |
|---|---|---|---|
| `SelfServicePlus\GetSelfServicePlusFeatureToggleEnabledV1Request` | GET | `/v1/self-service-plus/feature-toggle/enabled` | true |
| `SelfServicePlus\GetSelfServicePlusSettingsV1Request` | GET | `/v1/self-service-plus/settings` | `SelfServicePlusSettings` |
| `SelfServicePlus\ReplaceSelfServicePlusSettingsV1Request` | PUT | `/v1/self-service-plus/settings` | true |

<a id="pro-service-discovery-enrollment"></a>
### service-discovery-enrollment

`Jamf::serviceDiscoveryEnrollment()`

| Request | Method | Path | Returns |
|---|---|---|---|
| `ServiceDiscoveryEnrollment\GetServiceDiscoveryEnrollmentWellKnownSettingsV1Request` | GET | `/v1/service-discovery-enrollment/well-known-settings` | `WellKnownSettingsResponse` |
| `ServiceDiscoveryEnrollment\ReplaceServiceDiscoveryEnrollmentWellKnownSettingsV1Request` | PUT | `/v1/service-discovery-enrollment/well-known-settings` | true |

<a id="pro-sites"></a>
### sites

`Jamf::sites()`

| Request | Method | Path | Returns |
|---|---|---|---|
| `Sites\GetSitesV1Request` | GET | `/v1/sites` | Collection of `V1Site` |
| `Sites\GetSiteObjectsV1Request` | GET | `/v1/sites/{id}/objects` | a builder over `SiteObject` records |

<a id="pro-slasa"></a>
### slasa

`Jamf::slasa()`

| Request | Method | Path | Returns |
|---|---|---|---|
| `Slasa\GetSlasaV1Request` | GET | `/v1/slasa` | `SlasaAcceptance` |
| `Slasa\CreateSlasaV1Request` | POST | `/v1/slasa` | true |

<a id="pro-smart-computer-groups-preview"></a>
### smart-computer-groups-preview

`Jamf::smartComputerGroupsPreview()`

| Request | Method | Path | Returns |
|---|---|---|---|
| `SmartComputerGroupsPreview\RecalculateComputerSmartGroupsV1Request` | POST | `/v1/computers/{id}/recalculate-smart-groups` | `RecalculationResults` |
| `SmartComputerGroupsPreview\RecalculateSmartComputerGroupV1Request` | POST | `/v1/smart-computer-groups/{id}/recalculate` | `RecalculationResults` |

<a id="pro-smart-mobile-device-groups-preview"></a>
### smart-mobile-device-groups-preview

`Jamf::smartMobileDeviceGroupsPreview()`

| Request | Method | Path | Returns |
|---|---|---|---|
| `SmartMobileDeviceGroupsPreview\RecalculateMobileDeviceSmartGroupsV1Request` | POST | `/v1/mobile-devices/{id}/recalculate-smart-groups` | `RecalculationResults` |
| `SmartMobileDeviceGroupsPreview\RecalculateSmartMobileDeviceGroupV1Request` | POST | `/v1/smart-mobile-device-groups/{id}/recalculate` | `RecalculationResults` |

<a id="pro-smart-user-groups-preview"></a>
### smart-user-groups-preview

`Jamf::smartUserGroupsPreview()`

| Request | Method | Path | Returns |
|---|---|---|---|
| `SmartUserGroupsPreview\RecalculateSmartUserGroupV1Request` | POST | `/v1/smart-user-groups/{id}/recalculate` | `RecalculationResults` |
| `SmartUserGroupsPreview\RecalculateUserSmartGroupsV1Request` | POST | `/v1/users/{id}/recalculate-smart-groups` | `RecalculationResults` |

<a id="pro-smtp-server"></a>
### smtp-server

`Jamf::smtpServer()`

As a builder over `GET /v1/smtp-server/history` (`ObjectHistoryV1` records): `where()`, `orderBy()`, `get()`, `first()`, `count()`, `all()`, `lazy()`, `paginate()`, `create()`.

| Request | Method | Path | Returns |
|---|---|---|---|
| `SmtpServer\GetSmtpServerHistoryV1Request` | GET | `/v1/smtp-server/history` | a builder over `ObjectHistoryV1` records |
| `SmtpServer\CreateSmtpServerHistoryV1Request` | POST | `/v1/smtp-server/history` | `HrefResponse` |
| `SmtpServer\TestSmtpServerV1Request` | POST | `/v1/smtp-server/test` | true |
| `SmtpServer\GetSmtpServerV2Request` | GET | `/v2/smtp-server` | `SmtpServerV2` |
| `SmtpServer\ReplaceSmtpServerV2Request` | PUT | `/v2/smtp-server` | `SmtpServerV2` |
| `SmtpServer\GetSmtpServerAllowedAuthTypesV2Request` | GET | `/v2/smtp-server/allowed-auth-types` | `SmtpAuthenticationTypeList` |

<a id="pro-sso-certificate"></a>
### sso-certificate

`Jamf::ssoCertificate()`

| Request | Method | Path | Returns |
|---|---|---|---|
| `SsoCertificate\GetSsoCertV2Request` | GET | `/v2/sso/cert` | `SsoKeystoreResponseWithDetails` |
| `SsoCertificate\CreateSsoCertV2Request` | POST | `/v2/sso/cert` | `SsoKeystoreResponseWithDetails` |
| `SsoCertificate\ReplaceSsoCertV2Request` | PUT | `/v2/sso/cert` | `SsoKeystoreResponseWithDetails` |
| `SsoCertificate\DeleteSsoCertV2Request` | DELETE | `/v2/sso/cert` | true |
| `SsoCertificate\GetSsoCertDownloadV2Request` | GET | `/v2/sso/cert/download` | the body as text (text/plain) |
| `SsoCertificate\ParseSsoCertV2Request` | POST | `/v2/sso/cert/parse` | `SsoKeystoreCertParseResponse` |

<a id="pro-sso-failover"></a>
### sso-failover

`Jamf::ssoFailover()`

| Request | Method | Path | Returns |
|---|---|---|---|
| `SsoFailover\GetSsoFailoverV1Request` | GET | `/v1/sso/failover` | `SsoFailoverData` |
| `SsoFailover\GenerateSsoFailoverV1Request` | POST | `/v1/sso/failover/generate` | `SsoFailoverData` |

<a id="pro-sso-oauth-session-tokens"></a>
### sso-oauth-session-tokens

`Jamf::ssoOauthSessionTokens()`

| Request | Method | Path | Returns |
|---|---|---|---|
| `SsoOauthSessionTokens\GetOauth2SessionTokensV1Request` | GET | `/v1/oauth2/session-tokens` | `OauthTokens` |

<a id="pro-sso-settings"></a>
### sso-settings

`Jamf::ssoSettings()`

As a builder over `GET /v3/sso/history` (`ObjectHistory` records): `where()`, `orderBy()`, `get()`, `first()`, `count()`, `all()`, `lazy()`, `paginate()`, `create()`.

| Request | Method | Path | Returns |
|---|---|---|---|
| `SsoSettings\GetSsoV3Request` | GET | `/v3/sso` | `SsoSettingsV3` |
| `SsoSettings\ReplaceSsoV3Request` | PUT | `/v3/sso` | `SsoSettingsV3` |
| `SsoSettings\GetSsoDependenciesV3Request` | GET | `/v3/sso/dependencies` | `EnrollmentCustomizationDependencies` |
| `SsoSettings\DisableSsoV3Request` | POST | `/v3/sso/disable` | true |
| `SsoSettings\GetSsoHistoryV3Request` | GET | `/v3/sso/history` | a builder over `ObjectHistory` records |
| `SsoSettings\CreateSsoHistoryV3Request` | POST | `/v3/sso/history` | `HrefResponse` |
| `SsoSettings\GetSsoMetadataDownloadV3Request` | GET | `/v3/sso/metadata/download` | the body as text (text/plain) |
| `SsoSettings\GetSsoOidcBrokerConfigV3Request` | GET | `/v3/sso/oidc-broker-config` | `OidcBrokerConfig` |
| `SsoSettings\ReplaceSsoOidcBrokerConfigV3Request` | PUT | `/v3/sso/oidc-broker-config` | true |

<a id="pro-startup-status"></a>
### startup-status

`Jamf::startupStatus()`

| Request | Method | Path | Returns |
|---|---|---|---|
| `StartupStatus\GetStartupStatusRequest` | GET | `/startup-status` | `StartupStatus` |

<a id="pro-static-user-groups-preview"></a>
### static-user-groups-preview

`Jamf::staticUserGroupsPreview()`

| Request | Method | Path | Returns |
|---|---|---|---|
| `StaticUserGroupsPreview\GetStaticUserGroupsV1Request` | GET | `/v1/static-user-groups` | Collection of `StaticUserGroup` |
| `StaticUserGroupsPreview\GetStaticUserGroupV1Request` | GET | `/v1/static-user-groups/{id}` | `StaticUserGroup` |

<a id="pro-supervision-identities-preview"></a>
### supervision-identities-preview

`Jamf::supervisionIdentitiesPreview()`

As a builder over `GET /v1/supervision-identities` (`SupervisionIdentity` records): `orderBy()`, `get()`, `first()`, `count()`, `all()`, `lazy()`, `paginate()`, `find($id)`, `create()`, `update()`, `delete()`.

| Request | Method | Path | Returns |
|---|---|---|---|
| `SupervisionIdentitiesPreview\GetSupervisionIdentitiesV1Request` | GET | `/v1/supervision-identities` | a builder over `SupervisionIdentity` records |
| `SupervisionIdentitiesPreview\CreateSupervisionIdentitiesV1Request` | POST | `/v1/supervision-identities` | `SupervisionIdentity` |
| `SupervisionIdentitiesPreview\UploadSupervisionIdentitiesV1Request` | POST | `/v1/supervision-identities/upload` | `SupervisionIdentity` |
| `SupervisionIdentitiesPreview\GetSupervisionIdentityV1Request` | GET | `/v1/supervision-identities/{id}` | `SupervisionIdentity` |
| `SupervisionIdentitiesPreview\ReplaceSupervisionIdentityV1Request` | PUT | `/v1/supervision-identities/{id}` | `SupervisionIdentity` |
| `SupervisionIdentitiesPreview\DeleteSupervisionIdentityV1Request` | DELETE | `/v1/supervision-identities/{id}` | true |
| `SupervisionIdentitiesPreview\GetSupervisionIdentityDownloadV1Request` | GET | `/v1/supervision-identities/{id}/download` | the body as text (application/octet-stream) |

<a id="pro-teacher-app"></a>
### teacher-app

`Jamf::teacherApp()`

As a builder over `GET /v1/teacher-app/history` (`ObjectHistory` records): `where()`, `orderBy()`, `get()`, `first()`, `count()`, `all()`, `lazy()`, `paginate()`, `create()`.

| Request | Method | Path | Returns |
|---|---|---|---|
| `TeacherApp\GetTeacherAppV1Request` | GET | `/v1/teacher-app` | `TeacherSettingsResponse` |
| `TeacherApp\ReplaceTeacherAppV1Request` | PUT | `/v1/teacher-app` | `TeacherSettingsResponse` |
| `TeacherApp\GetTeacherAppHistoryV1Request` | GET | `/v1/teacher-app/history` | a builder over `ObjectHistory` records |
| `TeacherApp\CreateTeacherAppHistoryV1Request` | POST | `/v1/teacher-app/history` | `HrefResponse` |

<a id="pro-team-viewer-remote-administration"></a>
### team-viewer-remote-administration

`Jamf::teamViewerRemoteAdministration()`

| Request | Method | Path | Returns |
|---|---|---|---|
| `TeamViewerRemoteAdministration\CreateRemoteAdministrationConfigurationsTeamViewerPreviewRequest` | POST | `/preview/remote-administration-configurations/team-viewer` | `HrefResponse` |
| `TeamViewerRemoteAdministration\GetRemoteAdministrationConfigurationsTeamViewerSessionsPreviewRequest` | GET | `/preview/remote-administration-configurations/team-viewer/{configurationId}/sessions` | a builder over `SessionDetails` records |
| `TeamViewerRemoteAdministration\CreateRemoteAdministrationConfigurationsTeamViewerSessionsPreviewRequest` | POST | `/preview/remote-administration-configurations/team-viewer/{configurationId}/sessions` | `HrefResponse` |
| `TeamViewerRemoteAdministration\GetRemoteAdministrationConfigurationsTeamViewerSessionPreviewRequest` | GET | `/preview/remote-administration-configurations/team-viewer/{configurationId}/sessions/{sessionId}` | `SessionDetails` |
| `TeamViewerRemoteAdministration\CloseRemoteAdministrationConfigurationsTeamViewerSessionPreviewRequest` | POST | `/preview/remote-administration-configurations/team-viewer/{configurationId}/sessions/{sessionId}/close` | true |
| `TeamViewerRemoteAdministration\ResendRemoteAdministrationConfigurationsTeamViewerSessionNotificationPreviewRequest` | POST | `/preview/remote-administration-configurations/team-viewer/{configurationId}/sessions/{sessionId}/resend-notification` | true |
| `TeamViewerRemoteAdministration\GetRemoteAdministrationConfigurationsTeamViewerSessionStatusPreviewRequest` | GET | `/preview/remote-administration-configurations/team-viewer/{configurationId}/sessions/{sessionId}/status` | `SessionStatus` |
| `TeamViewerRemoteAdministration\GetRemoteAdministrationConfigurationsTeamViewerPreviewRequest` | GET | `/preview/remote-administration-configurations/team-viewer/{id}` | `ConnectionConfigurationResponse` |
| `TeamViewerRemoteAdministration\UpdateRemoteAdministrationConfigurationsTeamViewerPreviewRequest` | PATCH | `/preview/remote-administration-configurations/team-viewer/{id}` | `ConnectionConfigurationResponse` |
| `TeamViewerRemoteAdministration\DeleteRemoteAdministrationConfigurationsTeamViewerPreviewRequest` | DELETE | `/preview/remote-administration-configurations/team-viewer/{id}` | true |
| `TeamViewerRemoteAdministration\GetRemoteAdministrationConfigurationsTeamViewerStatusPreviewRequest` | GET | `/preview/remote-administration-configurations/team-viewer/{id}/status` | `ConnectionConfigurationStatusResponse` |

<a id="pro-time-zones-preview"></a>
### time-zones-preview

`Jamf::timeZonesPreview()`

| Request | Method | Path | Returns |
|---|---|---|---|
| `TimeZonesPreview\GetTimeZonesV1Request` | GET | `/v1/time-zones` | Collection of `TimeZone` |

<a id="pro-tomcat-settings-preview"></a>
### tomcat-settings-preview

`Jamf::tomcatSettingsPreview()`

| Request | Method | Path | Returns |
|---|---|---|---|
| `TomcatSettingsPreview\IssueSettingsTomcatSslCertificateRequest` | POST | `/settings/issueTomcatSslCertificate` | true |

<a id="pro-user"></a>
### user

`Jamf::user()`

| Request | Method | Path | Returns |
|---|---|---|---|
| `User\ChangeUserPasswordV1Request` | POST | `/v1/user/change-password` | true |

<a id="pro-user-session-preview"></a>
### user-session-preview

`Jamf::userSessionPreview()`

| Request | Method | Path | Returns |
|---|---|---|---|
| `UserSessionPreview\GetUserRequest` | GET | `/user` | Collection of `Account` |
| `UserSessionPreview\CreateUserUpdateSessionRequest` | POST | `/user/updateSession` | `Session` |

<a id="pro-user-sessions"></a>
### user-sessions

`Jamf::userSessions()`

| Request | Method | Path | Returns |
|---|---|---|---|
| `UserSessions\GetUserSessionsActiveV1Request` | GET | `/v1/user-sessions/active` | Collection of `ActiveUserSession` |
| `UserSessions\GetUserSessionsCountV1Request` | GET | `/v1/user-sessions/count` | `ActiveUsersCount` |

<a id="pro-users"></a>
### users

`Jamf::users()`

As a builder over `GET /v1/users` (`User` records): `where()`, `orderBy()`, `get()`, `first()`, `count()`, `all()`, `lazy()`, `paginate()`, `find($id)`, `create()`, `update()`, `delete()`.

| Request | Method | Path | Returns |
|---|---|---|---|
| `Users\GetUsersV1Request` | GET | `/v1/users` | a builder over `User` records |
| `Users\CreateUsersV1Request` | POST | `/v1/users` | `HrefResponse` |
| `Users\GetUserV1Request` | GET | `/v1/users/{id}` | `User` |
| `Users\ReplaceUserV1Request` | PUT | `/v1/users/{id}` | true |
| `Users\DeleteUserV1Request` | DELETE | `/v1/users/{id}` | true |

<a id="pro-venafi-preview"></a>
### venafi-preview

`Jamf::venafiPreview()`

| Request | Method | Path | Returns |
|---|---|---|---|
| `VenafiPreview\CreatePkiVenafiV1Request` | POST | `/v1/pki/venafi` | `HrefResponse` |
| `VenafiPreview\GetPkiVenafiV1Request` | GET | `/v1/pki/venafi/{id}` | `VenafiCaRecord` |
| `VenafiPreview\UpdatePkiVenafiV1Request` | PATCH | `/v1/pki/venafi/{id}` | `VenafiCaRecord` |
| `VenafiPreview\DeletePkiVenafiV1Request` | DELETE | `/v1/pki/venafi/{id}` | true |
| `VenafiPreview\GetPkiVenafiConnectionStatusV1Request` | GET | `/v1/pki/venafi/{id}/connection-status` | `VenafiServiceStatus` |
| `VenafiPreview\GetPkiVenafiDependentProfilesV1Request` | GET | `/v1/pki/venafi/{id}/dependent-profiles` | Collection of `VenafiPkiPayloadRecord` |
| `VenafiPreview\GetPkiVenafiHistoryV1Request` | GET | `/v1/pki/venafi/{id}/history` | a builder over `ObjectHistory` records |
| `VenafiPreview\CreatePkiVenafiHistoryV1Request` | POST | `/v1/pki/venafi/{id}/history` | `HrefResponse` |
| `VenafiPreview\GetPkiVenafiJamfPublicKeyV1Request` | GET | `/v1/pki/venafi/{id}/jamf-public-key` | the body as text (application/pem-certificate-chain) |
| `VenafiPreview\RegeneratePkiVenafiJamfPublicKeyV1Request` | POST | `/v1/pki/venafi/{id}/jamf-public-key/regenerate` | true |
| `VenafiPreview\GetPkiVenafiProxyTrustStoreV1Request` | GET | `/v1/pki/venafi/{id}/proxy-trust-store` | the body as text (application/pem-certificate-chain) |
| `VenafiPreview\CreatePkiVenafiProxyTrustStoreV1Request` | POST | `/v1/pki/venafi/{id}/proxy-trust-store` | true |
| `VenafiPreview\DeletePkiVenafiProxyTrustStoreV1Request` | DELETE | `/v1/pki/venafi/{id}/proxy-trust-store` | true |

<a id="pro-volume-purchasing-locations"></a>
### volume-purchasing-locations

`Jamf::volumePurchasingLocations()`

As a builder over `GET /v1/volume-purchasing-locations` (`VolumePurchasingLocationListView` records): `where()`, `orderBy()`, `get()`, `first()`, `count()`, `all()`, `lazy()`, `paginate()`, `find($id)`, `create()`, `update()`, `delete()`.

| Request | Method | Path | Returns |
|---|---|---|---|
| `VolumePurchasingLocations\GetVolumePurchasingLocationsV1Request` | GET | `/v1/volume-purchasing-locations` | a builder over `VolumePurchasingLocationListView` records |
| `VolumePurchasingLocations\CreateVolumePurchasingLocationsV1Request` | POST | `/v1/volume-purchasing-locations` | `HrefResponse` |
| `VolumePurchasingLocations\GetVolumePurchasingLocationV1Request` | GET | `/v1/volume-purchasing-locations/{id}` | `VolumePurchasingLocation` |
| `VolumePurchasingLocations\UpdateVolumePurchasingLocationV1Request` | PATCH | `/v1/volume-purchasing-locations/{id}` | `VolumePurchasingLocation` |
| `VolumePurchasingLocations\DeleteVolumePurchasingLocationV1Request` | DELETE | `/v1/volume-purchasing-locations/{id}` | true |
| `VolumePurchasingLocations\GetVolumePurchasingLocationContentV1Request` | GET | `/v1/volume-purchasing-locations/{id}/content` | a builder over `VolumePurchasingContent` records |
| `VolumePurchasingLocations\GetVolumePurchasingLocationHistoryV1Request` | GET | `/v1/volume-purchasing-locations/{id}/history` | a builder over `ObjectHistory` records |
| `VolumePurchasingLocations\CreateVolumePurchasingLocationHistoryV1Request` | POST | `/v1/volume-purchasing-locations/{id}/history` | `ObjectHistory` |
| `VolumePurchasingLocations\ReclaimVolumePurchasingLocationV1Request` | POST | `/v1/volume-purchasing-locations/{id}/reclaim` | true |
| `VolumePurchasingLocations\RevokeVolumePurchasingLocationLicensesV1Request` | POST | `/v1/volume-purchasing-locations/{id}/revoke-licenses` | true |

<a id="pro-volume-purchasing-subscriptions"></a>
### volume-purchasing-subscriptions

`Jamf::volumePurchasingSubscriptions()`

As a builder over `GET /v1/volume-purchasing-subscriptions` (`VolumePurchasingSubscription` records): `orderBy()`, `get()`, `first()`, `count()`, `all()`, `lazy()`, `paginate()`, `find($id)`, `create()`, `update()`, `delete()`.

| Request | Method | Path | Returns |
|---|---|---|---|
| `VolumePurchasingSubscriptions\GetVolumePurchasingSubscriptionsV1Request` | GET | `/v1/volume-purchasing-subscriptions` | a builder over `VolumePurchasingSubscription` records |
| `VolumePurchasingSubscriptions\CreateVolumePurchasingSubscriptionsV1Request` | POST | `/v1/volume-purchasing-subscriptions` | `HrefResponse` |
| `VolumePurchasingSubscriptions\GetVolumePurchasingSubscriptionV1Request` | GET | `/v1/volume-purchasing-subscriptions/{id}` | `VolumePurchasingSubscription` |
| `VolumePurchasingSubscriptions\ReplaceVolumePurchasingSubscriptionV1Request` | PUT | `/v1/volume-purchasing-subscriptions/{id}` | `VolumePurchasingSubscription` |
| `VolumePurchasingSubscriptions\DeleteVolumePurchasingSubscriptionV1Request` | DELETE | `/v1/volume-purchasing-subscriptions/{id}` | true |
| `VolumePurchasingSubscriptions\GetVolumePurchasingSubscriptionHistoryV1Request` | GET | `/v1/volume-purchasing-subscriptions/{id}/history` | a builder over `ObjectHistory` records |
| `VolumePurchasingSubscriptions\CreateVolumePurchasingSubscriptionHistoryV1Request` | POST | `/v1/volume-purchasing-subscriptions/{id}/history` | `HrefResponse` |

## Classic API

<a id="classic-accounts"></a>
### accounts

`Jamf::classic()->accounts()`: records written under `<account>`.

As a collection: `get()`, `all()`, `count()`.

| Request | Method | Path | Returns |
|---|---|---|---|
| `Accounts\FindAccountsRequest` | GET | `/accounts` | Collection of arrays |
| `Accounts\FindGroupsByIdRequest` | GET | `/accounts/groupid/{id}` | the record (array) |
| `Accounts\CreateGroupByIdRequest` | POST | `/accounts/groupid/{id}` | the id (array) |
| `Accounts\UpdateGroupByIdRequest` | PUT | `/accounts/groupid/{id}` | the id (array) |
| `Accounts\DeleteGroupByIdRequest` | DELETE | `/accounts/groupid/{id}` | true |
| `Accounts\FindGroupsByNameRequest` | GET | `/accounts/groupname/{name}` | the record (array) |
| `Accounts\FindUsersByIdRequest` | GET | `/accounts/userid/{id}` | the record (array) |
| `Accounts\CreateUserByIdRequest` | POST | `/accounts/userid/{id}` | the id (array) |
| `Accounts\UpdateUserByIdRequest` | PUT | `/accounts/userid/{id}` | the id (array) |
| `Accounts\DeleteUserByIdRequest` | DELETE | `/accounts/userid/{id}` | true |
| `Accounts\FindUsersByNameRequest` | GET | `/accounts/username/{name}` | the record (array) |

<a id="classic-activationcode"></a>
### activationcode

`Jamf::classic()->activationCode()`: records written under `<activation_code>`.

As a collection: `get()`, `all()`, `count()`.

| Request | Method | Path | Returns |
|---|---|---|---|
| `ActivationCode\FindactivationcodeRequest` (deprecated) | GET | `/activationcode` | Collection of arrays |
| `ActivationCode\UpdateActivationCodeRequest` (deprecated) | PUT | `/activationcode` | the id (array) |

<a id="classic-advancedcomputersearches"></a>
### advancedcomputersearches

`Jamf::classic()->advancedComputerSearches()`: records written under `<advanced_computer_search>`.

As a collection: `get()`, `all()`, `count()`, `find($id)`, `create()`, `update()`, `delete()`.

| Request | Method | Path | Returns |
|---|---|---|---|
| `AdvancedComputerSearches\FindAdvancedComputerSearchesRequest` | GET | `/advancedcomputersearches` | Collection of arrays |
| `AdvancedComputerSearches\FindAdvancedComputerSearchesByIdRequest` | GET | `/advancedcomputersearches/id/{id}` | the record (array) |
| `AdvancedComputerSearches\CreateAdvancedComputerSearchByIdRequest` | POST | `/advancedcomputersearches/id/{id}` | the id (array) |
| `AdvancedComputerSearches\UpdateAdvancedComputerSearchByIdRequest` | PUT | `/advancedcomputersearches/id/{id}` | the id (array) |
| `AdvancedComputerSearches\DeleteAdvancedComputerSearchByIdRequest` | DELETE | `/advancedcomputersearches/id/{id}` | true |
| `AdvancedComputerSearches\FindComputerSearchesByNameRequest` | GET | `/advancedcomputersearches/name/{name}` | the record (array) |

<a id="classic-advancedmobiledevicesearches"></a>
### advancedmobiledevicesearches

`Jamf::classic()->advancedMobileDeviceSearches()`: records written under `<advanced_mobile_device_search>`.

As a collection: `get()`, `all()`, `count()`, `find($id)`, `create()`, `update()`, `delete()`.

| Request | Method | Path | Returns |
|---|---|---|---|
| `AdvancedMobileDeviceSearches\FindAdvancedMobileDeviceSearchesRequest` | GET | `/advancedmobiledevicesearches` | Collection of arrays |
| `AdvancedMobileDeviceSearches\FindAdvancedMobileDeviceSearchesByIdRequest` | GET | `/advancedmobiledevicesearches/id/{id}` | the record (array) |
| `AdvancedMobileDeviceSearches\CreateAdvancedMobileDeviceSearchByIdRequest` | POST | `/advancedmobiledevicesearches/id/{id}` | the id (array) |
| `AdvancedMobileDeviceSearches\UpdateAdvancedMobileDeviceSearchByIdRequest` | PUT | `/advancedmobiledevicesearches/id/{id}` | the id (array) |
| `AdvancedMobileDeviceSearches\DeleteAdvancedMobileDeviceSearchByIdRequest` | DELETE | `/advancedmobiledevicesearches/id/{id}` | true |
| `AdvancedMobileDeviceSearches\FindMobileDeviceSearchesByNameRequest` | GET | `/advancedmobiledevicesearches/name/{name}` | the record (array) |

<a id="classic-advancedusersearches"></a>
### advancedusersearches

`Jamf::classic()->advancedUserSearches()`: records written under `<advanced_user_search>`.

As a collection: `get()`, `all()`, `count()`, `find($id)`, `create()`, `update()`, `delete()`.

| Request | Method | Path | Returns |
|---|---|---|---|
| `AdvancedUserSearches\FindAdvancedUserSearchesRequest` | GET | `/advancedusersearches` | Collection of arrays |
| `AdvancedUserSearches\FindAdvancedUserSearchesByIdRequest` | GET | `/advancedusersearches/id/{id}` | the record (array) |
| `AdvancedUserSearches\CreateAdvancedUserSearchByIdRequest` | POST | `/advancedusersearches/id/{id}` | the id (array) |
| `AdvancedUserSearches\UpdateAdvancedUserSearchByIdRequest` | PUT | `/advancedusersearches/id/{id}` | the id (array) |
| `AdvancedUserSearches\DeleteAdvancedUserSearchByIdRequest` | DELETE | `/advancedusersearches/id/{id}` | true |
| `AdvancedUserSearches\FindUserSearchesByNameRequest` | GET | `/advancedusersearches/name/{name}` | the record (array) |

<a id="classic-allowedfileextensions"></a>
### allowedfileextensions

`Jamf::classic()->allowedFileExtensions()`: records written under `<allowed_file_extension>`.

As a collection: `get()`, `all()`, `count()`, `find($id)`, `create()`, `delete()`.

| Request | Method | Path | Returns |
|---|---|---|---|
| `AllowedFileExtensions\FindAllowedFileExtensionRequest` | GET | `/allowedfileextensions` | Collection of arrays |
| `AllowedFileExtensions\FindAllowedFileExtensionByNameRequest` | GET | `/allowedfileextensions/extension/{extension}` | the record (array) |
| `AllowedFileExtensions\FindAllowedFileExtensionByIdRequest` | GET | `/allowedfileextensions/id/{id}` | the record (array) |
| `AllowedFileExtensions\CreateAllowedFileExtensionByIdRequest` | POST | `/allowedfileextensions/id/{id}` | the id (array) |
| `AllowedFileExtensions\DeleteAllowedFileExtensionByIdRequest` | DELETE | `/allowedfileextensions/id/{id}` | true |

<a id="classic-buildings"></a>
### buildings

`Jamf::classic()->buildings()`: records written under `<building>`.

As a collection: `get()`, `all()`, `count()`, `find($id)`, `create()`, `update()`, `delete()`.

| Request | Method | Path | Returns |
|---|---|---|---|
| `Buildings\FindBuildingsRequest` | GET | `/buildings` | Collection of arrays |
| `Buildings\FindBuildingsByIdRequest` | GET | `/buildings/id/{id}` | the record (array) |
| `Buildings\CreateBuildingByIdRequest` | POST | `/buildings/id/{id}` | the id (array) |
| `Buildings\UpdateBuildingByIdRequest` | PUT | `/buildings/id/{id}` | the id (array) |
| `Buildings\DeleteBuildingByIdRequest` | DELETE | `/buildings/id/{id}` | true |
| `Buildings\FindBuildingsByNameRequest` | GET | `/buildings/name/{name}` | the record (array) |

<a id="classic-categories"></a>
### categories

`Jamf::classic()->categories()`: records written under `<category>`.

As a collection: `get()`, `all()`, `count()`, `find($id)`, `create()`, `update()`, `delete()`.

| Request | Method | Path | Returns |
|---|---|---|---|
| `Categories\FindCategoriesRequest` | GET | `/categories` | Collection of arrays |
| `Categories\FindCategoriesByIdRequest` | GET | `/categories/id/{id}` | the record (array) |
| `Categories\CreateCategoryByIdRequest` | POST | `/categories/id/{id}` | the id (array) |
| `Categories\UpdateCategoryByIdRequest` | PUT | `/categories/id/{id}` | the id (array) |
| `Categories\DeleteCategoryByIdRequest` | DELETE | `/categories/id/{id}` | true |
| `Categories\FindCategoriesByNameRequest` | GET | `/categories/name/{name}` | the record (array) |

<a id="classic-classes"></a>
### classes

`Jamf::classic()->classes()`: records written under `<class>`.

As a collection: `get()`, `all()`, `count()`, `find($id)`, `create()`, `update()`, `delete()`.

| Request | Method | Path | Returns |
|---|---|---|---|
| `Classes\FindClassesRequest` | GET | `/classes` | Collection of arrays |
| `Classes\FindClassesByIdRequest` | GET | `/classes/id/{id}` | the record (array) |
| `Classes\CreateClassByIdRequest` | POST | `/classes/id/{id}` | the id (array) |
| `Classes\UpdateClassByIdRequest` | PUT | `/classes/id/{id}` | the id (array) |
| `Classes\DeleteClassByIdRequest` | DELETE | `/classes/id/{id}` | true |
| `Classes\FindClassesByNameRequest` | GET | `/classes/name/{name}` | the record (array) |

<a id="classic-commandflush"></a>
### commandflush

`Jamf::classic()->commandFlush()`: records written under `<commandflush>`.

| Request | Method | Path | Returns |
|---|---|---|---|
| `CommandFlush\CommandFlushRequest` | DELETE | `/commandflush` | true |
| `CommandFlush\CreateCommandFlushWithIdAndStatusRequest` | DELETE | `/commandflush/{idtype}/id/{id}/status/{status}` | true |

<a id="classic-computerapplicationusage"></a>
### computerapplicationusage

`Jamf::classic()->computerApplicationUsage()`: records written under `<computer_application_usage>`.

| Request | Method | Path | Returns |
|---|---|---|---|
| `ComputerApplicationUsage\FindComputerApplicationUsageByIdRequest` | GET | `/computerapplicationusage/id/{id}/{start_date}_{end_date}` | the record (array) |
| `ComputerApplicationUsage\FindComputerApplicationUsageByMacAddressRequest` | GET | `/computerapplicationusage/macaddress/{macaddress}/{start_date}_{end_date}` | the record (array) |
| `ComputerApplicationUsage\FindComputerApplicationUsageByNameRequest` | GET | `/computerapplicationusage/name/{name}/{start_date}_{end_date}` | the record (array) |
| `ComputerApplicationUsage\FindComputerApplicationUsageBySerialRequest` | GET | `/computerapplicationusage/serialnumber/{serialnumber}/{start_date}_{end_date}` | the record (array) |
| `ComputerApplicationUsage\FindComputerApplicationUsageByUDIDRequest` | GET | `/computerapplicationusage/udid/{udid}/{start_date}_{end_date}` | the record (array) |

<a id="classic-computerapplications"></a>
### computerapplications

`Jamf::classic()->computerApplications()`: records written under `<computer_application>`.

| Request | Method | Path | Returns |
|---|---|---|---|
| `ComputerApplications\FindComputerApplicationsByNameRequest` | GET | `/computerapplications/application/{application}` | the record (array) |
| `ComputerApplications\FindComputerApplicationsByNameInventoryRequest` | GET | `/computerapplications/application/{application}/inventory/{inventory}` | the record (array) |
| `ComputerApplications\FindComputerApplicationByNameAndVersionRequest` | GET | `/computerapplications/application/{application}/version/{version}` | the record (array) |
| `ComputerApplications\FindComputerApplicationsByNameAndVersionAndInventoryRequest` | GET | `/computerapplications/application/{application}/version/{version}/inventory/{inventory}` | the record (array) |

<a id="classic-computercheckin"></a>
### computercheckin

`Jamf::classic()->computerCheckIn()`: records written under `<computer_check_in>`.

As a collection: `get()`, `all()`, `count()`.

| Request | Method | Path | Returns |
|---|---|---|---|
| `ComputerCheckIn\FindComputerCheckinRequest` | GET | `/computercheckin` | Collection of arrays |
| `ComputerCheckIn\UpdateComputerCheckinRequest` | PUT | `/computercheckin` | the id (array) |

<a id="classic-computercommands"></a>
### computercommands

`Jamf::classic()->computerCommands()`: records written under `<computer_command>`.

As a collection: `get()`, `all()`, `count()`.

| Request | Method | Path | Returns |
|---|---|---|---|
| `ComputerCommands\FindComputerCommandsRequest` | GET | `/computercommands` | Collection of arrays |
| `ComputerCommands\CreateComputerCommandByCommandRequest` | POST | `/computercommands/command/{command}` | the id (array) |
| `ComputerCommands\CreateComputerCommandByCommandAndActionRequest` | POST | `/computercommands/command/{command}/action/{action}/id/{id}` | the id (array) |
| `ComputerCommands\CreateComputerCommandByCommandShortcut1Request` | POST | `/computercommands/command/{command}/id/{id}` | the id (array) |
| `ComputerCommands\FindComputerCommandsByNameRequest` | GET | `/computercommands/name/{name}` | the record (array) |
| `ComputerCommands\FindComputerCommandStatusByUuidRequest` | GET | `/computercommands/status/{statusuuid}` | the record (array) |
| `ComputerCommands\FindComputerCommandsByUuidRequest` | GET | `/computercommands/uuid/{uuid}` | the record (array) |

<a id="classic-computerextensionattributes"></a>
### computerextensionattributes

`Jamf::classic()->computerExtensionAttributes()`: records written under `<computer_extension_attribute>`.

As a collection: `get()`, `all()`, `count()`, `find($id)`, `create()`, `update()`, `delete()`.

| Request | Method | Path | Returns |
|---|---|---|---|
| `ComputerExtensionAttributes\FindComputerextensionattributesRequest` | GET | `/computerextensionattributes` | Collection of arrays |
| `ComputerExtensionAttributes\FindComputerextensionattributesByIdRequest` | GET | `/computerextensionattributes/id/{id}` | the record (array) |
| `ComputerExtensionAttributes\CreateComputerextensionattributeByIdRequest` | POST | `/computerextensionattributes/id/{id}` | the id (array) |
| `ComputerExtensionAttributes\UpdateComputerextensionattributeByIdRequest` | PUT | `/computerextensionattributes/id/{id}` | the id (array) |
| `ComputerExtensionAttributes\DeleteComputerextensionattributeByIdRequest` | DELETE | `/computerextensionattributes/id/{id}` | true |
| `ComputerExtensionAttributes\FindComputerextensionattributesByNameRequest` | GET | `/computerextensionattributes/name/{name}` | the record (array) |

<a id="classic-computergroups"></a>
### computergroups

`Jamf::classic()->computerGroups()`: records written under `<computer_group>`.

As a collection: `get()`, `all()`, `count()`, `find($id)`, `create()`, `update()`, `delete()`.

| Request | Method | Path | Returns |
|---|---|---|---|
| `ComputerGroups\FindComputerGroupsRequest` | GET | `/computergroups` | Collection of arrays |
| `ComputerGroups\FindComputerGroupsByIdRequest` | GET | `/computergroups/id/{id}` | the record (array) |
| `ComputerGroups\CreateComputerGroupByIdRequest` | POST | `/computergroups/id/{id}` | the id (array) |
| `ComputerGroups\UpdateComputerGroupByIdRequest` | PUT | `/computergroups/id/{id}` | the id (array) |
| `ComputerGroups\DeleteComputerGroupByIdRequest` | DELETE | `/computergroups/id/{id}` | true |
| `ComputerGroups\FindComputerGroupsByNameRequest` | GET | `/computergroups/name/{name}` | the record (array) |

<a id="classic-computerhardwaresoftwarereports"></a>
### computerhardwaresoftwarereports

`Jamf::classic()->computerHardwareSoftwareReports()`: records written under `<computer_hardware_software_report>`.

| Request | Method | Path | Returns |
|---|---|---|---|
| `ComputerHardwareSoftwareReports\FindComputerHardwareSoftwareReportsByIdRequest` | GET | `/computerhardwaresoftwarereports/id/{id}/{start_date}_{end_date}` | the record (array) |
| `ComputerHardwareSoftwareReports\FindComputerHistoryByIdSubsetRequest` | GET | `/computerhardwaresoftwarereports/id/{id}/{start_date}_{end_date}/subset/{subset}` | the record (array) |
| `ComputerHardwareSoftwareReports\FindComputerHardwareSoftwareReportsByMacAddressRequest` | GET | `/computerhardwaresoftwarereports/macaddress/{macaddress}/{start_date}_{end_date}` | the record (array) |
| `ComputerHardwareSoftwareReports\FindComputerHardwareSoftwareReportsByNameRequest` | GET | `/computerhardwaresoftwarereports/name/{name}/{start_date}_{end_date}` | the record (array) |
| `ComputerHardwareSoftwareReports\FindComputerHardwareSoftwareReportsBySerialRequest` | GET | `/computerhardwaresoftwarereports/serialnumber/{serialnumber}/{start_date}_{end_date}` | the record (array) |
| `ComputerHardwareSoftwareReports\FindComputerHardwareSoftwareReportsByUDIDRequest` | GET | `/computerhardwaresoftwarereports/udid/{udid}/{start_date}_{end_date}` | the record (array) |

<a id="classic-computerhistory"></a>
### computerhistory

`Jamf::classic()->computerHistory()`: records written under `<computer_history>`.

| Request | Method | Path | Returns |
|---|---|---|---|
| `ComputerHistory\FindComputerHistoryByIdRequest` | GET | `/computerhistory/id/{id}` | the record (array) |
| `ComputerHistory\FindComputerHistoryByIdSubsetRequest` | GET | `/computerhistory/id/{id}/subset/{subset}` | the record (array) |
| `ComputerHistory\FindComputerHistoryByMacAddressRequest` | GET | `/computerhistory/macaddress/{macaddress}` | the record (array) |
| `ComputerHistory\FindComputerHistoryByNameRequest` | GET | `/computerhistory/name/{name}` | the record (array) |
| `ComputerHistory\FindComputerHistoryBySerialNumberRequest` | GET | `/computerhistory/serialnumber/{serialnumber}` | the record (array) |
| `ComputerHistory\FindComputerHistoryByUDIDRequest` | GET | `/computerhistory/udid/{udid}` | the record (array) |

<a id="classic-computerinventorycollection"></a>
### computerinventorycollection

`Jamf::classic()->computerInventoryCollection()`: records written under `<computer_inventory_collection>`.

As a collection: `get()`, `all()`, `count()`.

| Request | Method | Path | Returns |
|---|---|---|---|
| `ComputerInventoryCollection\FindcomputerinventorycollectionRequest` | GET | `/computerinventorycollection` | Collection of arrays |
| `ComputerInventoryCollection\UpdateComputerInventoryCollectionRequest` | PUT | `/computerinventorycollection` | the id (array) |

<a id="classic-computerinvitations"></a>
### computerinvitations

`Jamf::classic()->computerInvitations()`: records written under `<computer_invitation>`.

As a collection: `get()`, `all()`, `count()`, `find($id)`, `create()`, `delete()`.

| Request | Method | Path | Returns |
|---|---|---|---|
| `ComputerInvitations\FindComputerInvitationsRequest` | GET | `/computerinvitations` | Collection of arrays |
| `ComputerInvitations\FindComputerInvitationsByIdRequest` | GET | `/computerinvitations/id/{id}` | the record (array) |
| `ComputerInvitations\CreateComputerInvitationByIdRequest` | POST | `/computerinvitations/id/{id}` | the id (array) |
| `ComputerInvitations\DeleteComputerInvitationByIdRequest` | DELETE | `/computerinvitations/id/{id}` | true |
| `ComputerInvitations\FindComputerInvitationsByInvitationRequest` | GET | `/computerinvitations/invitation/{invitation}` | the record (array) |
| `ComputerInvitations\FindComputerInvitationsByNameRequest` | GET | `/computerinvitations/name/{name}` | the record (array) |

<a id="classic-computermanagement"></a>
### computermanagement

`Jamf::classic()->computerManagement()`: records written under `<computer_management>`.

| Request | Method | Path | Returns |
|---|---|---|---|
| `ComputerManagement\FindComputerManagementByIdRequest` | GET | `/computermanagement/id/{id}` | the record (array) |
| `ComputerManagement\FindComputerManagementByIdPatchFilterRequest` | GET | `/computermanagement/id/{id}/patchfilter/{filter}` | the record (array) |
| `ComputerManagement\FindComputerManagementByIdSubsetRequest` | GET | `/computermanagement/id/{id}/subset/{subset}` | the record (array) |
| `ComputerManagement\FindComputerManagementByIdUsernameRequest` | GET | `/computermanagement/id/{id}/username/{username}` | the record (array) |
| `ComputerManagement\FindComputerManagementByIdUsernameSubsetRequest` | GET | `/computermanagement/id/{id}/username/{username}/subset/{subset}` | the record (array) |
| `ComputerManagement\FindComputerManagementByMacAddressRequest` | GET | `/computermanagement/macaddress/{macaddress}` | the record (array) |
| `ComputerManagement\FindComputerManagementByNameRequest` | GET | `/computermanagement/name/{name}` | the record (array) |
| `ComputerManagement\FindComputerManagementBySerialNumberRequest` | GET | `/computermanagement/serialnumber/{serialnumber}` | the record (array) |
| `ComputerManagement\FindComputerManagementByUDIDRequest` | GET | `/computermanagement/udid/{udid}` | the record (array) |

<a id="classic-computerreports"></a>
### computerreports

`Jamf::classic()->computerReports()`: records written under `<computer_report>`.

As a collection: `get()`, `all()`, `count()`, `find($id)`.

| Request | Method | Path | Returns |
|---|---|---|---|
| `ComputerReports\FindComputerReportsRequest` | GET | `/computerreports` | Collection of arrays |
| `ComputerReports\FindComputeReportsByIdRequest` | GET | `/computerreports/id/{id}` | the record (array) |
| `ComputerReports\FindComputeReportsByNameRequest` | GET | `/computerreports/name/{name}` | the record (array) |

<a id="classic-computers"></a>
### computers

`Jamf::classic()->computers()`: records written under `<computer>`.

As a collection: `get()`, `all()`, `count()`, `find($id)`, `create()`, `update()`, `delete()`.

| Request | Method | Path | Returns |
|---|---|---|---|
| `Computers\FindComputersRequest` (deprecated) | GET | `/computers` | Collection of arrays |
| `Computers\FlushComputerExtensionAttributeDataRequest` | DELETE | `/computers/extensionattributedataflush/id/{id}` | true |
| `Computers\FindComputersByIdRequest` (deprecated) | GET | `/computers/id/{id}` | the record (array) |
| `Computers\CreateComputerByIdRequest` (deprecated) | POST | `/computers/id/{id}` | the id (array) |
| `Computers\UpdateComputerByIdRequest` (deprecated) | PUT | `/computers/id/{id}` | the id (array) |
| `Computers\DeleteComputerByIdRequest` (deprecated) | DELETE | `/computers/id/{id}` | true |
| `Computers\FindComputersByIdSubsetRequest` (deprecated) | GET | `/computers/id/{id}/subset/{subset}` | the record (array) |
| `Computers\FindComputersByMacAddressRequest` (deprecated) | GET | `/computers/macaddress/{macaddress}` | the record (array) |
| `Computers\MatchComputersNamesRequest` (deprecated) | GET | `/computers/match/name/{matchname}` | Collection of arrays |
| `Computers\MatchComputersRequest` (deprecated) | GET | `/computers/match/{match}` | Collection of arrays |
| `Computers\FindComputersByNameRequest` (deprecated) | GET | `/computers/name/{name}` | the record (array) |
| `Computers\FindComputersBySerialNumberRequest` (deprecated) | GET | `/computers/serialnumber/{serialnumber}` | the record (array) |
| `Computers\FindComputersBasicRequest` (deprecated) | GET | `/computers/subset/basic` | the record (array) |
| `Computers\FindComputersByUDIDRequest` (deprecated) | GET | `/computers/udid/{udid}` | the record (array) |

<a id="classic-departments"></a>
### departments

`Jamf::classic()->departments()`: records written under `<department>`.

As a collection: `get()`, `all()`, `count()`, `find($id)`, `create()`, `update()`, `delete()`.

| Request | Method | Path | Returns |
|---|---|---|---|
| `Departments\FindDepartmentsRequest` | GET | `/departments` | Collection of arrays |
| `Departments\FindDepartmentsByIdRequest` | GET | `/departments/id/{id}` | the record (array) |
| `Departments\CreateDepartmentByIdRequest` | POST | `/departments/id/{id}` | the id (array) |
| `Departments\UpdateDepartmentByIdRequest` | PUT | `/departments/id/{id}` | the id (array) |
| `Departments\DeleteDepartmentByIdRequest` | DELETE | `/departments/id/{id}` | true |
| `Departments\FindDepartmentsByNameRequest` | GET | `/departments/name/{name}` | the record (array) |

<a id="classic-directorybindings"></a>
### directorybindings

`Jamf::classic()->directoryBindings()`: records written under `<directory_binding>`.

As a collection: `get()`, `all()`, `count()`, `find($id)`, `create()`, `update()`, `delete()`.

| Request | Method | Path | Returns |
|---|---|---|---|
| `DirectoryBindings\FindDirectoryBindingsRequest` | GET | `/directorybindings` | Collection of arrays |
| `DirectoryBindings\FindDirectoryBindingsByIdRequest` | GET | `/directorybindings/id/{id}` | the record (array) |
| `DirectoryBindings\CreateDirectoryBindingByIdRequest` | POST | `/directorybindings/id/{id}` | the id (array) |
| `DirectoryBindings\UpdateDirectoryBindingByIdRequest` | PUT | `/directorybindings/id/{id}` | the id (array) |
| `DirectoryBindings\DeleteDirectoryBindingByIdRequest` | DELETE | `/directorybindings/id/{id}` | true |
| `DirectoryBindings\FindDirectoryBindingsByNameRequest` | GET | `/directorybindings/name/{name}` | the record (array) |

<a id="classic-diskencryptionconfigurations"></a>
### diskencryptionconfigurations

`Jamf::classic()->diskEncryptionConfigurations()`: records written under `<disk_encryption_configuration>`.

As a collection: `get()`, `all()`, `count()`, `find($id)`, `create()`, `update()`, `delete()`.

| Request | Method | Path | Returns |
|---|---|---|---|
| `DiskEncryptionConfigurations\FindDiskEncryptionConfigurationsRequest` | GET | `/diskencryptionconfigurations` | Collection of arrays |
| `DiskEncryptionConfigurations\FindDiskEncryptionConfigurationsByIdRequest` | GET | `/diskencryptionconfigurations/id/{id}` | the record (array) |
| `DiskEncryptionConfigurations\CreateDiskEncryptionConfigurationByIdRequest` | POST | `/diskencryptionconfigurations/id/{id}` | the id (array) |
| `DiskEncryptionConfigurations\UpdateDiskEncryptionConfigurationByIdRequest` | PUT | `/diskencryptionconfigurations/id/{id}` | the id (array) |
| `DiskEncryptionConfigurations\DeleteDiskEncryptionConfigurationByIdRequest` | DELETE | `/diskencryptionconfigurations/id/{id}` | true |
| `DiskEncryptionConfigurations\FindDiskEncryptionConfigurationsByNameRequest` | GET | `/diskencryptionconfigurations/name/{name}` | the record (array) |

<a id="classic-distributionpoints"></a>
### distributionpoints

`Jamf::classic()->distributionPoints()`: records written under `<distribution_point>`.

As a collection: `get()`, `all()`, `count()`, `find($id)`, `create()`, `update()`, `delete()`.

| Request | Method | Path | Returns |
|---|---|---|---|
| `DistributionPoints\FindDistributionPointsRequest` | GET | `/distributionpoints` | Collection of arrays |
| `DistributionPoints\FindDistributionPointsByIdRequest` | GET | `/distributionpoints/id/{id}` | the record (array) |
| `DistributionPoints\CreateDistributionPointByIdRequest` | POST | `/distributionpoints/id/{id}` | the id (array) |
| `DistributionPoints\UpdateDistributionPointByIdRequest` | PUT | `/distributionpoints/id/{id}` | the id (array) |
| `DistributionPoints\DeleteDistributionPointByIdRequest` | DELETE | `/distributionpoints/id/{id}` | true |
| `DistributionPoints\FindDistributionPointsByNameRequest` | GET | `/distributionpoints/name/{name}` | the record (array) |

<a id="classic-dockitems"></a>
### dockitems

`Jamf::classic()->dockItems()`: records written under `<dock_item>`.

As a collection: `get()`, `all()`, `count()`, `find($id)`, `create()`, `update()`, `delete()`.

| Request | Method | Path | Returns |
|---|---|---|---|
| `DockItems\FindDockItemsRequest` | GET | `/dockitems` | Collection of arrays |
| `DockItems\FindDockItemsByIdRequest` | GET | `/dockitems/id/{id}` | the record (array) |
| `DockItems\CreateDockItemByIdRequest` | POST | `/dockitems/id/{id}` | the id (array) |
| `DockItems\UpdateDockItemByIdRequest` | PUT | `/dockitems/id/{id}` | the id (array) |
| `DockItems\DeleteDockItemByIdRequest` | DELETE | `/dockitems/id/{id}` | true |
| `DockItems\FindDockItemsByNameRequest` | GET | `/dockitems/name/{name}` | the record (array) |

<a id="classic-ebooks"></a>
### ebooks

`Jamf::classic()->ebooks()`: records written under `<ebook>`.

As a collection: `get()`, `all()`, `count()`, `find($id)`, `create()`, `update()`, `delete()`.

| Request | Method | Path | Returns |
|---|---|---|---|
| `Ebooks\FindEBooksRequest` | GET | `/ebooks` | Collection of arrays |
| `Ebooks\FindEBooksByIdRequest` | GET | `/ebooks/id/{id}` | the record (array) |
| `Ebooks\CreateEBookByIdRequest` | POST | `/ebooks/id/{id}` | the id (array) |
| `Ebooks\UpdateEBookByIdRequest` | PUT | `/ebooks/id/{id}` | the id (array) |
| `Ebooks\DeleteEBookByIdRequest` | DELETE | `/ebooks/id/{id}` | true |
| `Ebooks\FindEbookssByIdSubsetRequest` | GET | `/ebooks/id/{id}/subset/{subset}` | the record (array) |
| `Ebooks\FindEBooksByNameRequest` | GET | `/ebooks/name/{name}` | the record (array) |

<a id="classic-fileuploads"></a>
### fileuploads

`Jamf::classic()->fileUploads()`: records written under `<file_upload>`.

| Request | Method | Path | Returns |
|---|---|---|---|
| `FileUploads\UploadFilesRequest` | POST | `/fileuploads/{resource}/{idType}/{id}` | true |

<a id="classic-gsxconnection"></a>
### gsxconnection

`Jamf::classic()->gsxConnection()`: records written under `<gsx_connection>`.

As a collection: `get()`, `all()`, `count()`.

| Request | Method | Path | Returns |
|---|---|---|---|
| `GsxConnection\FindGSXConnectionRequest` | GET | `/gsxconnection` | Collection of arrays |
| `GsxConnection\UpdateGSXConnectionRequest` | PUT | `/gsxconnection` | the id (array) |

<a id="classic-healthcarelistenerrule"></a>
### healthcarelistenerrule

`Jamf::classic()->healthcareListenerRules()`: records written under `<healthcare_listener_rule>`.

As a collection: `get()`, `all()`, `count()`, `find($id)`, `create()`, `update()`.

| Request | Method | Path | Returns |
|---|---|---|---|
| `HealthcareListenerRules\FindHealthcareListenerRuleRequest` | GET | `/healthcarelistenerrule` | Collection of arrays |
| `HealthcareListenerRules\FindHealthcareListenerRulesByIdRequest` | GET | `/healthcarelistenerrule/id/{id}` | the record (array) |
| `HealthcareListenerRules\CreateHealthCareListenerRuleByIdRequest` | POST | `/healthcarelistenerrule/id/{id}` | the id (array) |
| `HealthcareListenerRules\UpdateHealthCareListenerRuleByIdRequest` | PUT | `/healthcarelistenerrule/id/{id}` | the id (array) |

<a id="classic-healthcarelistener"></a>
### healthcarelistener

`Jamf::classic()->healthcareListeners()`: records written under `<healthcare_listener>`.

As a collection: `get()`, `all()`, `count()`, `find($id)`, `update()`.

| Request | Method | Path | Returns |
|---|---|---|---|
| `HealthcareListeners\FindHealthcareListenerRequest` | GET | `/healthcarelistener` | Collection of arrays |
| `HealthcareListeners\FindHealthcareListenersByIdRequest` | GET | `/healthcarelistener/id/{id}` | the record (array) |
| `HealthcareListeners\UpdateHealthCareListenerByIdRequest` | PUT | `/healthcarelistener/id/{id}` | the id (array) |

<a id="classic-ibeacons"></a>
### ibeacons

`Jamf::classic()->ibeacons()`: records written under `<ibeacon>`.

As a collection: `get()`, `all()`, `count()`, `find($id)`, `create()`, `update()`, `delete()`.

| Request | Method | Path | Returns |
|---|---|---|---|
| `IBeacons\FindIBeaconsRequest` | GET | `/ibeacons` | Collection of arrays |
| `IBeacons\FindIBeaconsByIdRequest` | GET | `/ibeacons/id/{id}` | the record (array) |
| `IBeacons\CreateIBeaconByIdRequest` | POST | `/ibeacons/id/{id}` | the id (array) |
| `IBeacons\UpdateIBeaconByIdRequest` | PUT | `/ibeacons/id/{id}` | the id (array) |
| `IBeacons\DeleteIBeaconByIdRequest` | DELETE | `/ibeacons/id/{id}` | true |
| `IBeacons\FindIBeaconsByNameRequest` | GET | `/ibeacons/name/{name}` | the record (array) |

<a id="classic-infrastructuremanager"></a>
### infrastructuremanager

`Jamf::classic()->infrastructureManagers()`: records written under `<infrastructure_manager>`.

As a collection: `get()`, `all()`, `count()`, `find($id)`, `update()`.

| Request | Method | Path | Returns |
|---|---|---|---|
| `InfrastructureManagers\FindInfrastructureManagerRequest` | GET | `/infrastructuremanager` | Collection of arrays |
| `InfrastructureManagers\FindInfrastructureManagerByIdRequest` | GET | `/infrastructuremanager/id/{id}` | the record (array) |
| `InfrastructureManagers\UpdateInfrastructureManagerByIdRequest` | PUT | `/infrastructuremanager/id/{id}` | the id (array) |

<a id="classic-jsonwebtokenconfigurations"></a>
### jsonwebtokenconfigurations

`Jamf::classic()->jsonWebTokenConfigurations()`: records written under `<json_web_token_configuration>`.

As a collection: `get()`, `all()`, `count()`, `find($id)`, `create()`, `update()`, `delete()`.

| Request | Method | Path | Returns |
|---|---|---|---|
| `JsonWebTokenConfigurations\FindJsonWebTokenConfigurationsRequest` | GET | `/jsonwebtokenconfigurations` | Collection of arrays |
| `JsonWebTokenConfigurations\FindJsonWebTokenConfigurationByIdRequest` | GET | `/jsonwebtokenconfigurations/id/{id}` | the record (array) |
| `JsonWebTokenConfigurations\CreateJsonWebTokenConfigurationByIdRequest` | POST | `/jsonwebtokenconfigurations/id/{id}` | the id (array) |
| `JsonWebTokenConfigurations\UpdateJsonWebTokenConfigurationByIdRequest` | PUT | `/jsonwebtokenconfigurations/id/{id}` | the id (array) |
| `JsonWebTokenConfigurations\DeleteJsonWebTokenConfigurationByIdRequest` | DELETE | `/jsonwebtokenconfigurations/id/{id}` | true |

<a id="classic-jssuser"></a>
### jssuser

`Jamf::classic()->jssUser()`: records written under `<user>`.

As a collection: `get()`, `all()`, `count()`.

| Request | Method | Path | Returns |
|---|---|---|---|
| `JssUser\FindjssuserRequest` | GET | `/jssuser` | Collection of arrays |

<a id="classic-ldapservers"></a>
### ldapservers

`Jamf::classic()->ldapServers()`: records written under `<ldap_server>`.

As a collection: `get()`, `all()`, `count()`, `find($id)`, `create()`, `update()`, `delete()`.

| Request | Method | Path | Returns |
|---|---|---|---|
| `LdapServers\FindLDAPServersRequest` | GET | `/ldapservers` | Collection of arrays |
| `LdapServers\FindLDAPServersByIdRequest` | GET | `/ldapservers/id/{id}` | the record (array) |
| `LdapServers\CreateLDAPServerByIdRequest` | POST | `/ldapservers/id/{id}` | the id (array) |
| `LdapServers\UpdateLDAPServerByIdRequest` | PUT | `/ldapservers/id/{id}` | the id (array) |
| `LdapServers\DeleteLDAPServerByIdRequest` | DELETE | `/ldapservers/id/{id}` | true |
| `LdapServers\FindLDAPServerGroupRequest` | GET | `/ldapservers/id/{id}/group/{group}` | the record (array) |
| `LdapServers\FindLDAPServerGroupUserRequest` | GET | `/ldapservers/id/{id}/group/{group}/user/{user}` | the record (array) |
| `LdapServers\FindLDAPServerUserRequest` | GET | `/ldapservers/id/{id}/user/{user}` | the record (array) |
| `LdapServers\FindLDAPServersByNameRequest` | GET | `/ldapservers/name/{name}` | the record (array) |

<a id="classic-licensedsoftware"></a>
### licensedsoftware

`Jamf::classic()->licensedSoftware()`: records written under `<licensed_software>`.

As a collection: `get()`, `all()`, `count()`, `find($id)`, `create()`, `update()`, `delete()`.

| Request | Method | Path | Returns |
|---|---|---|---|
| `LicensedSoftware\FindLicensedSoftwareRequest` | GET | `/licensedsoftware` | Collection of arrays |
| `LicensedSoftware\FindLicensedSoftwareByIdRequest` | GET | `/licensedsoftware/id/{id}` | the record (array) |
| `LicensedSoftware\CreateLicensedSoftwareByIdRequest` | POST | `/licensedsoftware/id/{id}` | the id (array) |
| `LicensedSoftware\UpdateLicensedSoftwareByIdRequest` | PUT | `/licensedsoftware/id/{id}` | the id (array) |
| `LicensedSoftware\DeleteLicensedSoftwareByIdRequest` | DELETE | `/licensedsoftware/id/{id}` | true |
| `LicensedSoftware\FindLicensedSoftwareByNameRequest` | GET | `/licensedsoftware/name/{name}` | the record (array) |

<a id="classic-logflush"></a>
### logflush

`Jamf::classic()->logFlush()`: records written under `<logflush>`.

| Request | Method | Path | Returns |
|---|---|---|---|
| `LogFlush\LogFlushRequest` | DELETE | `/logflush` | true |
| `LogFlush\CreateLogFlushWithIdAndIntervalRequest` | DELETE | `/logflush/{log}/id/{id}/interval/{interval}` | true |
| `LogFlush\CreateLogFlushForIntervalRequest` | DELETE | `/logflush/{log}/interval/{interval}` | true |

<a id="classic-macapplications"></a>
### macapplications

`Jamf::classic()->macApplications()`: records written under `<mac_application>`.

As a collection: `get()`, `all()`, `count()`, `find($id)`, `create()`, `update()`, `delete()`.

| Request | Method | Path | Returns |
|---|---|---|---|
| `MacApplications\FindMacappsRequest` | GET | `/macapplications` | Collection of arrays |
| `MacApplications\FindMacappsByIdRequest` | GET | `/macapplications/id/{id}` | the record (array) |
| `MacApplications\CreateMacappByIdRequest` | POST | `/macapplications/id/{id}` | the id (array) |
| `MacApplications\UpdateMacappByIdRequest` | PUT | `/macapplications/id/{id}` | the id (array) |
| `MacApplications\DeleteMacappByIdRequest` | DELETE | `/macapplications/id/{id}` | true |
| `MacApplications\FindMacappsByIdSubsetRequest` | GET | `/macapplications/id/{id}/subset/{subset}` | the record (array) |
| `MacApplications\FindMacappsByNameRequest` | GET | `/macapplications/name/{name}` | the record (array) |

<a id="classic-mobiledeviceapplications"></a>
### mobiledeviceapplications

`Jamf::classic()->mobileDeviceApplications()`: records written under `<mobile_device_application>`.

As a collection: `get()`, `all()`, `count()`, `find($id)`, `create()`, `update()`, `delete()`.

| Request | Method | Path | Returns |
|---|---|---|---|
| `MobileDeviceApplications\FindMobileDeviceApplicationsRequest` | GET | `/mobiledeviceapplications` | Collection of arrays |
| `MobileDeviceApplications\FindMobileDeviceApplicationsByBundleIDRequest` | GET | `/mobiledeviceapplications/bundleid/{bundleid}` | the record (array) |
| `MobileDeviceApplications\FindMobileDeviceApplicationsByBundleIDandVersionRequest` | GET | `/mobiledeviceapplications/bundleid/{bundleid}/version/{version}` | the record (array) |
| `MobileDeviceApplications\FindMobileDeviceApplicationsByIdRequest` | GET | `/mobiledeviceapplications/id/{id}` | the record (array) |
| `MobileDeviceApplications\CreateMobileDeviceApplicationByIdRequest` | POST | `/mobiledeviceapplications/id/{id}` | the id (array) |
| `MobileDeviceApplications\UpdateMobileDeviceApplicationByIdRequest` | PUT | `/mobiledeviceapplications/id/{id}` | the id (array) |
| `MobileDeviceApplications\DeleteMobileDeviceApplicationByIdRequest` | DELETE | `/mobiledeviceapplications/id/{id}` | true |
| `MobileDeviceApplications\FindMobileDeviceAppsByIdSubsetRequest` | GET | `/mobiledeviceapplications/id/{id}/subset/{subset}` | the record (array) |
| `MobileDeviceApplications\FindMobileDeviceApplicationsByNameRequest` | GET | `/mobiledeviceapplications/name/{name}` | the record (array) |

<a id="classic-mobiledevicecommands"></a>
### mobiledevicecommands

`Jamf::classic()->mobileDeviceCommands()`: records written under `<mobile_device_command>`.

As a collection: `get()`, `all()`, `count()`.

| Request | Method | Path | Returns |
|---|---|---|---|
| `MobileDeviceCommands\FindMobileDeviceCommandsRequest` | GET | `/mobiledevicecommands` | Collection of arrays |
| `MobileDeviceCommands\CreateMobileDeviceCommandRequest` | POST | `/mobiledevicecommands/command` | the id (array) |
| `MobileDeviceCommands\CreateMobileDeviceNameCommandURLRequest` | POST | `/mobiledevicecommands/command/DeviceName/{device_name}/id/{id_list}` | the id (array) |
| `MobileDeviceCommands\CreateMobileScheduleOSUpdateCommandURLRequest` | POST | `/mobiledevicecommands/command/ScheduleOSUpdate/{install_action}/id/{id_list}` | the id (array) |
| `MobileDeviceCommands\CreateMobileScheduleOSUpdateCommandWithProductVersionURLRequest` | POST | `/mobiledevicecommands/command/ScheduleOSUpdate/{install_action}/{product_version}/id/{id_list}` | the id (array) |
| `MobileDeviceCommands\FindMobileDeviceCommandsByCommandRequest` | GET | `/mobiledevicecommands/command/{command}` | the record (array) |
| `MobileDeviceCommands\CreateMobileDeviceCommandByCommandRequest` | POST | `/mobiledevicecommands/command/{command}` | the id (array) |
| `MobileDeviceCommands\CreateMobileDeviceCommandURLRequest` | POST | `/mobiledevicecommands/command/{command}/id/{id_list}` | the id (array) |
| `MobileDeviceCommands\FindMobileDeviceCommandsByNameRequest` | GET | `/mobiledevicecommands/name/{name}` | the record (array) |
| `MobileDeviceCommands\FindMobileDeviceCommandsByUuidRequest` | GET | `/mobiledevicecommands/uuid/{uuid}` | the record (array) |

<a id="classic-mobiledeviceconfigurationprofiles"></a>
### mobiledeviceconfigurationprofiles

`Jamf::classic()->mobileDeviceConfigurationProfiles()`: records written under `<configuration_profile>`.

As a collection: `get()`, `all()`, `count()`, `find($id)`, `create()`, `update()`, `delete()`.

| Request | Method | Path | Returns |
|---|---|---|---|
| `MobileDeviceConfigurationProfiles\FindMobileDeviceConfigurationProfilesRequest` | GET | `/mobiledeviceconfigurationprofiles` | Collection of arrays |
| `MobileDeviceConfigurationProfiles\FindMobileDeviceConfigurationProfilesByIdRequest` | GET | `/mobiledeviceconfigurationprofiles/id/{id}` | the record (array) |
| `MobileDeviceConfigurationProfiles\CreateMobileDeviceConfigurationProfileByIdRequest` | POST | `/mobiledeviceconfigurationprofiles/id/{id}` | the id (array) |
| `MobileDeviceConfigurationProfiles\UpdateMobileDeviceConfigurationProfileByIdRequest` | PUT | `/mobiledeviceconfigurationprofiles/id/{id}` | the id (array) |
| `MobileDeviceConfigurationProfiles\DeleteMobileDeviceConfigurationProfileByIdRequest` | DELETE | `/mobiledeviceconfigurationprofiles/id/{id}` | true |
| `MobileDeviceConfigurationProfiles\FindMobileDeviceConfigurationProfilesByIdSubsetRequest` | GET | `/mobiledeviceconfigurationprofiles/id/{id}/subset/{subset}` | the record (array) |
| `MobileDeviceConfigurationProfiles\FindMobileDeviceConfigurationProfilesByNameRequest` | GET | `/mobiledeviceconfigurationprofiles/name/{name}` | the record (array) |

<a id="classic-mobiledeviceenrollmentprofiles"></a>
### mobiledeviceenrollmentprofiles

`Jamf::classic()->mobileDeviceEnrollmentProfiles()`: records written under `<mobile_device_enrollment_profile>`.

As a collection: `get()`, `all()`, `count()`, `find($id)`, `create()`, `update()`, `delete()`.

| Request | Method | Path | Returns |
|---|---|---|---|
| `MobileDeviceEnrollmentProfiles\FindMobileDeviceEnrollmentProfilesRequest` | GET | `/mobiledeviceenrollmentprofiles` | Collection of arrays |
| `MobileDeviceEnrollmentProfiles\FindMobileDeviceEnrollmentProfilesByIdRequest` | GET | `/mobiledeviceenrollmentprofiles/id/{id}` | the record (array) |
| `MobileDeviceEnrollmentProfiles\CreateMobileDeviceEnrollmentProfilesByIdRequest` | POST | `/mobiledeviceenrollmentprofiles/id/{id}` | the id (array) |
| `MobileDeviceEnrollmentProfiles\UpdateMobileDeviceEnrollmentProfileByIdRequest` | PUT | `/mobiledeviceenrollmentprofiles/id/{id}` | the id (array) |
| `MobileDeviceEnrollmentProfiles\DeleteMobileDeviceEnrollmentProfileByIdRequest` | DELETE | `/mobiledeviceenrollmentprofiles/id/{id}` | true |
| `MobileDeviceEnrollmentProfiles\FindMobileDeviceEnrollmentProfilesByIdSubsetRequest` | GET | `/mobiledeviceenrollmentprofiles/id/{id}/subset/{subset}` | the record (array) |
| `MobileDeviceEnrollmentProfiles\FindMobileDeviceEnrollmentProfilesByNameRequest` | GET | `/mobiledeviceenrollmentprofiles/invitation/{invitation}` | the record (array) |
| `MobileDeviceEnrollmentProfiles\FindMobileDeviceEnrollmentProfilesByInvitationRequest` | GET | `/mobiledeviceenrollmentprofiles/name/{name}` | the record (array) |

<a id="classic-mobiledeviceextensionattributes"></a>
### mobiledeviceextensionattributes

`Jamf::classic()->mobileDeviceExtensionAttributes()`: records written under `<mobile_device_extension_attribute>`.

As a collection: `get()`, `all()`, `count()`, `find($id)`, `create()`, `update()`, `delete()`.

| Request | Method | Path | Returns |
|---|---|---|---|
| `MobileDeviceExtensionAttributes\FindMobiledeviceextensionattributesRequest` | GET | `/mobiledeviceextensionattributes` | Collection of arrays |
| `MobileDeviceExtensionAttributes\FindMobiledeviceextensionattributesByIdRequest` | GET | `/mobiledeviceextensionattributes/id/{id}` | the record (array) |
| `MobileDeviceExtensionAttributes\CreateMobiledeviceextensionattributeByIdRequest` | POST | `/mobiledeviceextensionattributes/id/{id}` | the id (array) |
| `MobileDeviceExtensionAttributes\UpdateMobiledeviceextensionattributeByIdRequest` | PUT | `/mobiledeviceextensionattributes/id/{id}` | the id (array) |
| `MobileDeviceExtensionAttributes\DeleteMobiledeviceextensionattributeByIdRequest` | DELETE | `/mobiledeviceextensionattributes/id/{id}` | true |
| `MobileDeviceExtensionAttributes\FindMobiledeviceextensionattributesByNameRequest` | GET | `/mobiledeviceextensionattributes/name/{name}` | the record (array) |

<a id="classic-mobiledevicegroups"></a>
### mobiledevicegroups

`Jamf::classic()->mobileDeviceGroups()`: records written under `<mobile_device_group>`.

As a collection: `get()`, `all()`, `count()`, `find($id)`, `create()`, `update()`, `delete()`.

| Request | Method | Path | Returns |
|---|---|---|---|
| `MobileDeviceGroups\FindMobileDeviceGroupsRequest` | GET | `/mobiledevicegroups` | Collection of arrays |
| `MobileDeviceGroups\FindMobileDeviceGroupsByIdRequest` | GET | `/mobiledevicegroups/id/{id}` | the record (array) |
| `MobileDeviceGroups\CreateMobileDeviceGroupByIdRequest` | POST | `/mobiledevicegroups/id/{id}` | the id (array) |
| `MobileDeviceGroups\UpdateMobileDeviceGroupByIdRequest` | PUT | `/mobiledevicegroups/id/{id}` | the id (array) |
| `MobileDeviceGroups\DeleteMobileDeviceGroupByIdRequest` | DELETE | `/mobiledevicegroups/id/{id}` | true |
| `MobileDeviceGroups\FindMobileDeviceGroupsByNameRequest` | GET | `/mobiledevicegroups/name/{name}` | the record (array) |

<a id="classic-mobiledevicehistory"></a>
### mobiledevicehistory

`Jamf::classic()->mobileDeviceHistory()`: records written under `<mobile_device_history>`.

| Request | Method | Path | Returns |
|---|---|---|---|
| `MobileDeviceHistory\FindMobileDeviceHistoryByIdRequest` | GET | `/mobiledevicehistory/id/{id}` | the record (array) |
| `MobileDeviceHistory\FindMobileDeviceHistoryByIdSubsetRequest` | GET | `/mobiledevicehistory/id/{id}/subset/{subset}` | the record (array) |
| `MobileDeviceHistory\FindMobileDeviceHistoryByMacAddressRequest` | GET | `/mobiledevicehistory/macaddress/{macaddress}` | the record (array) |
| `MobileDeviceHistory\FindMobileDeviceHistoryByNameRequest` | GET | `/mobiledevicehistory/name/{name}` | the record (array) |
| `MobileDeviceHistory\FindMobileDeviceHistoryBySerialNumberRequest` | GET | `/mobiledevicehistory/serialnumber/{serialnumber}` | the record (array) |
| `MobileDeviceHistory\FindMobileDeviceHistoryByUDIDRequest` | GET | `/mobiledevicehistory/udid/{udid}` | the record (array) |

<a id="classic-mobiledeviceinvitations"></a>
### mobiledeviceinvitations

`Jamf::classic()->mobileDeviceInvitations()`: records written under `<mobile_device_invitation>`.

As a collection: `get()`, `all()`, `count()`, `find($id)`, `create()`, `delete()`.

| Request | Method | Path | Returns |
|---|---|---|---|
| `MobileDeviceInvitations\FindMobileDeviceInvitationsRequest` | GET | `/mobiledeviceinvitations` | Collection of arrays |
| `MobileDeviceInvitations\FindMobileDeviceInvitationsByIdRequest` | GET | `/mobiledeviceinvitations/id/{id}` | the record (array) |
| `MobileDeviceInvitations\CreateMobileDeviceInvitationByIdRequest` | POST | `/mobiledeviceinvitations/id/{id}` | the id (array) |
| `MobileDeviceInvitations\DeleteMobileDeviceInvitationByIdRequest` | DELETE | `/mobiledeviceinvitations/id/{id}` | true |
| `MobileDeviceInvitations\FindMobileDeviceInvitationsByInvitationRequest` | GET | `/mobiledeviceinvitations/invitation/{invitation}` | the record (array) |

<a id="classic-mobiledeviceprovisioningprofiles"></a>
### mobiledeviceprovisioningprofiles

`Jamf::classic()->mobileDeviceProvisioningProfiles()`: records written under `<mobile_device_provisioning_profile>`.

As a collection: `get()`, `all()`, `count()`, `find($id)`, `create()`, `update()`, `delete()`.

| Request | Method | Path | Returns |
|---|---|---|---|
| `MobileDeviceProvisioningProfiles\FindMobileDeviceProvisioningProfilesRequest` | GET | `/mobiledeviceprovisioningprofiles` | Collection of arrays |
| `MobileDeviceProvisioningProfiles\FindMobileDeviceProvisioningProfilesByIdRequest` | GET | `/mobiledeviceprovisioningprofiles/id/{id}` | the record (array) |
| `MobileDeviceProvisioningProfiles\CreateMobileDeviceProvisioningProfileByIdRequest` | POST | `/mobiledeviceprovisioningprofiles/id/{id}` | the id (array) |
| `MobileDeviceProvisioningProfiles\UpdateMobileDeviceProvisioningProfileByIdRequest` | PUT | `/mobiledeviceprovisioningprofiles/id/{id}` | the id (array) |
| `MobileDeviceProvisioningProfiles\DeleteMobileDeviceProvisioningProfileByIdRequest` | DELETE | `/mobiledeviceprovisioningprofiles/id/{id}` | true |
| `MobileDeviceProvisioningProfiles\FindMobileDeviceProvisioningProfileByIdSubsetRequest` | GET | `/mobiledeviceprovisioningprofiles/id/{id}/subset/{subset}` | the record (array) |
| `MobileDeviceProvisioningProfiles\FindMobileDeviceProvisioningProfilesByNameRequest` | GET | `/mobiledeviceprovisioningprofiles/name/{name}` | the record (array) |
| `MobileDeviceProvisioningProfiles\FindMobileDeviceProvisioningProfilesByUUIDRequest` | GET | `/mobiledeviceprovisioningprofiles/uuid/{uuid}` | the record (array) |

<a id="classic-mobiledevices"></a>
### mobiledevices

`Jamf::classic()->mobileDevices()`: records written under `<mobile_device>`.

As a collection: `get()`, `all()`, `count()`, `find($id)`, `create()`, `update()`, `delete()`.

| Request | Method | Path | Returns |
|---|---|---|---|
| `MobileDevices\FindMobileDevicesRequest` | GET | `/mobiledevices` | Collection of arrays |
| `MobileDevices\FindMobileDevicesByIdRequest` | GET | `/mobiledevices/id/{id}` | the record (array) |
| `MobileDevices\CreateMobileDeviceByIdRequest` | POST | `/mobiledevices/id/{id}` | the id (array) |
| `MobileDevices\UpdateMobileDeviceByIdRequest` | PUT | `/mobiledevices/id/{id}` | the id (array) |
| `MobileDevices\DeleteMobileDeviceByIdRequest` | DELETE | `/mobiledevices/id/{id}` | true |
| `MobileDevices\FindMobileDevicesByIdSubsetRequest` | GET | `/mobiledevices/id/{id}/subset/{subset}` | the record (array) |
| `MobileDevices\FindMobileDevicesByMacAddressRequest` | GET | `/mobiledevices/macaddress/{macaddress}` | the record (array) |
| `MobileDevices\MatchMobileDevicesRequest` | GET | `/mobiledevices/match/{match}` | Collection of arrays |
| `MobileDevices\FindMobileDevicesByNameRequest` | GET | `/mobiledevices/name/{name}` | the record (array) |
| `MobileDevices\FindMobileDevicesBySerialNumberRequest` | GET | `/mobiledevices/serialnumber/{serialnumber}` | the record (array) |
| `MobileDevices\FindMobileDevicesByUDIDRequest` | GET | `/mobiledevices/udid/{udid}` | the record (array) |

<a id="classic-networksegments"></a>
### networksegments

`Jamf::classic()->networkSegments()`: records written under `<network_segment>`.

As a collection: `get()`, `all()`, `count()`, `find($id)`, `create()`, `update()`, `delete()`.

| Request | Method | Path | Returns |
|---|---|---|---|
| `NetworkSegments\FindNetworkSegmentsRequest` | GET | `/networksegments` | Collection of arrays |
| `NetworkSegments\FindNetworkSegmentsByIdRequest` | GET | `/networksegments/id/{id}` | the record (array) |
| `NetworkSegments\CreateNetworkSegmentByIdRequest` | POST | `/networksegments/id/{id}` | the id (array) |
| `NetworkSegments\UpdateNetworkSegmentByIdRequest` | PUT | `/networksegments/id/{id}` | the id (array) |
| `NetworkSegments\DeleteNetworkSegmentByIdRequest` | DELETE | `/networksegments/id/{id}` | true |
| `NetworkSegments\FindNetworkSegmentsByNameRequest` | GET | `/networksegments/name/{name}` | the record (array) |

<a id="classic-osxconfigurationprofiles"></a>
### osxconfigurationprofiles

`Jamf::classic()->osxConfigurationProfiles()`: records written under `<os_x_configuration_profile>`.

As a collection: `get()`, `all()`, `count()`, `find($id)`, `create()`, `update()`, `delete()`.

| Request | Method | Path | Returns |
|---|---|---|---|
| `OsxConfigurationProfiles\FindOsxConfigurationProfilesRequest` | GET | `/osxconfigurationprofiles` | Collection of arrays |
| `OsxConfigurationProfiles\FindOsxConfigurationProfilesByIdRequest` | GET | `/osxconfigurationprofiles/id/{id}` | the record (array) |
| `OsxConfigurationProfiles\CreateOsxConfigurationProfileByIdRequest` | POST | `/osxconfigurationprofiles/id/{id}` | the id (array) |
| `OsxConfigurationProfiles\UpdateOsxConfigurationProfileByIdRequest` | PUT | `/osxconfigurationprofiles/id/{id}` | the id (array) |
| `OsxConfigurationProfiles\DeleteOsxConfigurationProfileByIdRequest` | DELETE | `/osxconfigurationprofiles/id/{id}` | true |
| `OsxConfigurationProfiles\FindOsxConfigurationProfilesByIdSubsetRequest` | GET | `/osxconfigurationprofiles/id/{id}/subset/{subset}` | the record (array) |
| `OsxConfigurationProfiles\FindOsxConfigurationProfilesByNameRequest` | GET | `/osxconfigurationprofiles/name/{name}` | the record (array) |

<a id="classic-packages"></a>
### packages

`Jamf::classic()->packages()`: records written under `<package>`.

As a collection: `get()`, `all()`, `count()`, `find($id)`, `create()`, `update()`, `delete()`.

| Request | Method | Path | Returns |
|---|---|---|---|
| `Packages\FindPackagesRequest` | GET | `/packages` | Collection of arrays |
| `Packages\FindPackagesByIdRequest` | GET | `/packages/id/{id}` | the record (array) |
| `Packages\CreatePackageByIdRequest` | POST | `/packages/id/{id}` | the id (array) |
| `Packages\UpdatePackageByIdRequest` | PUT | `/packages/id/{id}` | the id (array) |
| `Packages\DeletePackageByIdRequest` | DELETE | `/packages/id/{id}` | true |
| `Packages\FindPackagesByNameRequest` | GET | `/packages/name/{name}` | the record (array) |

<a id="classic-patchavailabletitles"></a>
### patchavailabletitles

`Jamf::classic()->patchAvailableTitles()`: records written under `<patch_available_title>`.

| Request | Method | Path | Returns |
|---|---|---|---|
| `PatchAvailableTitles\FindAvailableTitlesBySourceIdRequest` | GET | `/patchavailabletitles/sourceid/{id}` | the record (array) |

<a id="classic-patchexternalsources"></a>
### patchexternalsources

`Jamf::classic()->patchExternalSources()`: records written under `<patch_external_source>`.

As a collection: `get()`, `all()`, `count()`, `find($id)`, `create()`, `update()`.

| Request | Method | Path | Returns |
|---|---|---|---|
| `PatchExternalSources\FindPatchExternalSourcesRequest` | GET | `/patchexternalsources` | Collection of arrays |
| `PatchExternalSources\FindPatchExternalSourcesByIdRequest` | GET | `/patchexternalsources/id/{id}` | the record (array) |
| `PatchExternalSources\CreatePatchExternalSourcesByIdRequest` | POST | `/patchexternalsources/id/{id}` | the id (array) |
| `PatchExternalSources\UpdatePatchExternalSourcesByIdRequest` | PUT | `/patchexternalsources/id/{id}` | the id (array) |
| `PatchExternalSources\FindPatchExternalSourcesByNameRequest` | GET | `/patchexternalsources/name/{name}` | the record (array) |

<a id="classic-patchinternalsources"></a>
### patchinternalsources

`Jamf::classic()->patchInternalSources()`: records written under `<patch_internal_source>`.

As a collection: `get()`, `all()`, `count()`, `find($id)`.

| Request | Method | Path | Returns |
|---|---|---|---|
| `PatchInternalSources\FindPatchInternalSourcesRequest` | GET | `/patchinternalsources` | Collection of arrays |
| `PatchInternalSources\FindPatchInternalSourcesByIdRequest` | GET | `/patchinternalsources/id/{id}` | the record (array) |
| `PatchInternalSources\FindPatchInternalSourcesByNameRequest` | GET | `/patchinternalsources/name/{name}` | the record (array) |

<a id="classic-patchpolicies"></a>
### patchpolicies

`Jamf::classic()->patchPolicies()`: records written under `<patch_policy>`.

As a collection: `get()`, `all()`, `count()`, `find($id)`, `update()`, `delete()`.

| Request | Method | Path | Returns |
|---|---|---|---|
| `PatchPolicies\FindPatchPoliciesRequest` | GET | `/patchpolicies` | Collection of arrays |
| `PatchPolicies\FindPatchPolicyByIdRequest` | GET | `/patchpolicies/id/{id}` | the record (array) |
| `PatchPolicies\UpdatePatchPolicyByIdRequest` | PUT | `/patchpolicies/id/{id}` | the id (array) |
| `PatchPolicies\DeletePatchPolicyByIdRequest` | DELETE | `/patchpolicies/id/{id}` | true |
| `PatchPolicies\FindPatchPoliciesByIdSubsetRequest` | GET | `/patchpolicies/id/{id}/subset/{subset}` | the record (array) |
| `PatchPolicies\FindPatchPoliciesBySoftwareTitleConfigIdRequest` | GET | `/patchpolicies/softwaretitleconfig/id/{softwaretitleconfigid}` | the record (array) |
| `PatchPolicies\CreatePatchPolicyBySoftwareTitleConfigIdRequest` | POST | `/patchpolicies/softwaretitleconfig/id/{softwaretitleconfigid}` | the id (array) |

<a id="classic-patchreports"></a>
### patchreports

`Jamf::classic()->patchReports()`: records written under `<patch_report>`.

| Request | Method | Path | Returns |
|---|---|---|---|
| `PatchReports\FindPatchReportsByPatchSoftwareTitleIdRequest` | GET | `/patchreports/patchsoftwaretitleid/{id}` | the record (array) |
| `PatchReports\FindComputersByTitleVersionRequest` | GET | `/patchreports/patchsoftwaretitleid/{id}/version/{version}` | the record (array) |

<a id="classic-patchsoftwaretitles"></a>
### patchsoftwaretitles

`Jamf::classic()->patchSoftwareTitles()`: records written under `<patch_software_title>`.

As a collection: `get()`, `all()`, `count()`, `find($id)`, `create()`, `update()`, `delete()`.

| Request | Method | Path | Returns |
|---|---|---|---|
| `PatchSoftwareTitles\FindPatchSoftwareTitlesRequest` | GET | `/patchsoftwaretitles` | Collection of arrays |
| `PatchSoftwareTitles\FindPatchSoftwareTitlesByIdRequest` | GET | `/patchsoftwaretitles/id/{id}` | the record (array) |
| `PatchSoftwareTitles\CreatePatchSoftwareTitleByIdRequest` | POST | `/patchsoftwaretitles/id/{id}` | the id (array) |
| `PatchSoftwareTitles\UpdatePatchSoftwareTitlesByIdRequest` | PUT | `/patchsoftwaretitles/id/{id}` | the id (array) |
| `PatchSoftwareTitles\DeletePatchSoftwareTitlesByIdRequest` | DELETE | `/patchsoftwaretitles/id/{id}` | true |

<a id="classic-patches"></a>
### patches

`Jamf::classic()->patches()`: records written under `<software_title>`.

As a collection: `get()`, `all()`, `count()`, `find($id)`, `create()`, `update()`, `delete()`.

| Request | Method | Path | Returns |
|---|---|---|---|
| `Patches\FindPatchesRequest` | GET | `/patches` | Collection of arrays |
| `Patches\FindPatchesByIdRequest` | GET | `/patches/id/{id}` | the record (array) |
| `Patches\CreatePatchesByIdRequest` | POST | `/patches/id/{id}` | the id (array) |
| `Patches\UpdateSoftwareTitlesByIdRequest` | PUT | `/patches/id/{id}` | the id (array) |
| `Patches\DeleteSoftwareTitlesByIdRequest` | DELETE | `/patches/id/{id}` | true |
| `Patches\FindComputersByTitleVersionRequest` | GET | `/patches/id/{id}/version/{version}` | the record (array) |
| `Patches\FindPatchesByNameRequest` | GET | `/patches/name/{name}` | the record (array) |

<a id="classic-peripheraltypes"></a>
### peripheraltypes

`Jamf::classic()->peripheralTypes()`: records written under `<peripheral_type>`.

As a collection: `get()`, `all()`, `count()`, `find($id)`, `create()`, `update()`, `delete()`.

| Request | Method | Path | Returns |
|---|---|---|---|
| `PeripheralTypes\FindPeripheralTypesRequest` | GET | `/peripheraltypes` | Collection of arrays |
| `PeripheralTypes\FindPeripheralTypesByIdRequest` | GET | `/peripheraltypes/id/{id}` | the record (array) |
| `PeripheralTypes\CreatePeripheralTypeByIdRequest` | POST | `/peripheraltypes/id/{id}` | the id (array) |
| `PeripheralTypes\UpdatePeripheralTypeByIdRequest` | PUT | `/peripheraltypes/id/{id}` | the id (array) |
| `PeripheralTypes\DeletePeripheralByIdRequest` | DELETE | `/peripheraltypes/id/{id}` | true |

<a id="classic-peripherals"></a>
### peripherals

`Jamf::classic()->peripherals()`: records written under `<peripheral>`.

As a collection: `get()`, `all()`, `count()`, `find($id)`, `create()`, `update()`, `delete()`.

| Request | Method | Path | Returns |
|---|---|---|---|
| `Peripherals\FindPeripheralsRequest` | GET | `/peripherals` | Collection of arrays |
| `Peripherals\FindPeripheralsByIdRequest` | GET | `/peripherals/id/{id}` | the record (array) |
| `Peripherals\CreatePeripheralByIdRequest` | POST | `/peripherals/id/{id}` | the id (array) |
| `Peripherals\UpdatePeripheralByIdRequest` | PUT | `/peripherals/id/{id}` | the id (array) |
| `Peripherals\DeletePeripheralByIdRequest` | DELETE | `/peripherals/id/{id}` | true |
| `Peripherals\FindPeripheralsByIdSubsetRequest` | GET | `/peripherals/id/{id}/subset/{subset}` | the record (array) |

<a id="classic-policies"></a>
### policies

`Jamf::classic()->policies()`: records written under `<policy>`.

As a collection: `get()`, `all()`, `count()`, `find($id)`, `create()`, `update()`, `delete()`.

| Request | Method | Path | Returns |
|---|---|---|---|
| `Policies\FindPoliciesRequest` | GET | `/policies` | Collection of arrays |
| `Policies\FindPoliciesByCategoryRequest` | GET | `/policies/category/{category}` | the record (array) |
| `Policies\FindPoliciesByTypeRequest` | GET | `/policies/createdBy/{createdBy}` | the record (array) |
| `Policies\FindPoliciesByIdRequest` | GET | `/policies/id/{id}` | the record (array) |
| `Policies\CreatePolicyByIdRequest` | POST | `/policies/id/{id}` | the id (array) |
| `Policies\UpdatePolicyByIdRequest` | PUT | `/policies/id/{id}` | the id (array) |
| `Policies\DeletePolicyByIdRequest` | DELETE | `/policies/id/{id}` | true |
| `Policies\FindPoliciesByIdSubsetRequest` | GET | `/policies/id/{id}/subset/{subset}` | the record (array) |
| `Policies\FindPoliciesByNameRequest` | GET | `/policies/name/{name}` | the record (array) |

<a id="classic-printers"></a>
### printers

`Jamf::classic()->printers()`: records written under `<printer>`.

As a collection: `get()`, `all()`, `count()`, `find($id)`, `create()`, `update()`, `delete()`.

| Request | Method | Path | Returns |
|---|---|---|---|
| `Printers\FindPrintersRequest` | GET | `/printers` | Collection of arrays |
| `Printers\FindPrintersByIdRequest` | GET | `/printers/id/{id}` | the record (array) |
| `Printers\CreatePrinterByIdRequest` | POST | `/printers/id/{id}` | the id (array) |
| `Printers\UpdatePrinterByIdRequest` | PUT | `/printers/id/{id}` | the id (array) |
| `Printers\DeletePrinterByIdRequest` | DELETE | `/printers/id/{id}` | true |
| `Printers\FindPrintersByNameRequest` | GET | `/printers/name/{name}` | the record (array) |

<a id="classic-removablemacaddresses"></a>
### removablemacaddresses

`Jamf::classic()->removableMacAddresses()`: records written under `<removable_mac_address>`.

As a collection: `get()`, `all()`, `count()`, `find($id)`, `create()`, `update()`, `delete()`.

| Request | Method | Path | Returns |
|---|---|---|---|
| `RemovableMacAddresses\FindRemovableMacAddressesRequest` | GET | `/removablemacaddresses` | Collection of arrays |
| `RemovableMacAddresses\FindRemovableMacAddressesByIdRequest` | GET | `/removablemacaddresses/id/{id}` | the record (array) |
| `RemovableMacAddresses\CreateRemovableMacAddressByIdRequest` | POST | `/removablemacaddresses/id/{id}` | the id (array) |
| `RemovableMacAddresses\UpdateRemovableMacAddressByIdRequest` | PUT | `/removablemacaddresses/id/{id}` | the id (array) |
| `RemovableMacAddresses\DeleteRemovableMacAddressByIdRequest` | DELETE | `/removablemacaddresses/id/{id}` | true |
| `RemovableMacAddresses\FindRemovableMacAddressesByNameRequest` | GET | `/removablemacaddresses/name/{name}` | the record (array) |

<a id="classic-restrictedsoftware"></a>
### restrictedsoftware

`Jamf::classic()->restrictedSoftware()`: records written under `<restricted_software>`.

As a collection: `get()`, `all()`, `count()`, `find($id)`, `create()`, `update()`, `delete()`.

| Request | Method | Path | Returns |
|---|---|---|---|
| `RestrictedSoftware\FindRestrictedSoftwareRequest` | GET | `/restrictedsoftware` | Collection of arrays |
| `RestrictedSoftware\FindRestrictedSoftwareByIdRequest` | GET | `/restrictedsoftware/id/{id}` | the record (array) |
| `RestrictedSoftware\CreateRestrictedSoftwareByIdRequest` | POST | `/restrictedsoftware/id/{id}` | the id (array) |
| `RestrictedSoftware\UpdateRestrictedSoftwareByIdRequest` | PUT | `/restrictedsoftware/id/{id}` | the id (array) |
| `RestrictedSoftware\DeleteRestrictedSoftwareByIdRequest` | DELETE | `/restrictedsoftware/id/{id}` | true |
| `RestrictedSoftware\FindRestrictedSoftwareByNameRequest` | GET | `/restrictedsoftware/name/{name}` | the record (array) |

<a id="classic-savedsearches"></a>
### savedsearches

`Jamf::classic()->savedSearches()`: records written under `<saved_search>`.

As a collection: `get()`, `all()`, `count()`, `find($id)`.

| Request | Method | Path | Returns |
|---|---|---|---|
| `SavedSearches\FindSavedSearchesRequest` | GET | `/savedsearches` | Collection of arrays |
| `SavedSearches\FindSavedSearchesByIdRequest` | GET | `/savedsearches/id/{id}` | the record (array) |
| `SavedSearches\FindSavedSearchesByNameRequest` | GET | `/savedsearches/name/{name}` | the record (array) |

<a id="classic-scripts"></a>
### scripts

`Jamf::classic()->scripts()`: records written under `<script>`.

As a collection: `get()`, `all()`, `count()`, `find($id)`, `create()`, `update()`, `delete()`.

| Request | Method | Path | Returns |
|---|---|---|---|
| `Scripts\FindScriptsRequest` | GET | `/scripts` | Collection of arrays |
| `Scripts\FindScriptsByIdRequest` | GET | `/scripts/id/{id}` | the record (array) |
| `Scripts\CreateScriptByIdRequest` | POST | `/scripts/id/{id}` | the id (array) |
| `Scripts\UpdateScriptByIdRequest` | PUT | `/scripts/id/{id}` | the id (array) |
| `Scripts\DeleteScriptByIdRequest` | DELETE | `/scripts/id/{id}` | true |
| `Scripts\FindScriptsByNameRequest` | GET | `/scripts/name/{name}` | the record (array) |

<a id="classic-sites"></a>
### sites

`Jamf::classic()->sites()`: records written under `<site>`.

As a collection: `get()`, `all()`, `count()`, `find($id)`, `create()`, `update()`, `delete()`.

| Request | Method | Path | Returns |
|---|---|---|---|
| `Sites\FindSitesRequest` | GET | `/sites` | Collection of arrays |
| `Sites\FindSitesByIdRequest` | GET | `/sites/id/{id}` | the record (array) |
| `Sites\CreateSiteByIdRequest` | POST | `/sites/id/{id}` | the id (array) |
| `Sites\UpdateSiteByIdRequest` | PUT | `/sites/id/{id}` | the id (array) |
| `Sites\DeleteSiteByIdRequest` | DELETE | `/sites/id/{id}` | true |
| `Sites\FindSitesByNameRequest` | GET | `/sites/name/{name}` | the record (array) |

<a id="classic-smtpserver"></a>
### smtpserver

`Jamf::classic()->smtpServer()`: records written under `<smtp_server>`.

As a collection: `get()`, `all()`, `count()`.

| Request | Method | Path | Returns |
|---|---|---|---|
| `SmtpServer\FindSMTPServerRequest` | GET | `/smtpserver` | Collection of arrays |
| `SmtpServer\UpdateSMTPServerRequest` | PUT | `/smtpserver` | the id (array) |

<a id="classic-softwareupdateservers"></a>
### softwareupdateservers

`Jamf::classic()->softwareUpdateServers()`: records written under `<software_update_server>`.

As a collection: `get()`, `all()`, `count()`, `find($id)`, `create()`, `update()`, `delete()`.

| Request | Method | Path | Returns |
|---|---|---|---|
| `SoftwareUpdateServers\FindSoftwareUpdateServersRequest` | GET | `/softwareupdateservers` | Collection of arrays |
| `SoftwareUpdateServers\FindSoftwareUpdateServersByIdRequest` | GET | `/softwareupdateservers/id/{id}` | the record (array) |
| `SoftwareUpdateServers\CreateSoftwareUpdateServerByIdRequest` | POST | `/softwareupdateservers/id/{id}` | the id (array) |
| `SoftwareUpdateServers\UpdateSoftwareUpdateServerByIdRequest` | PUT | `/softwareupdateservers/id/{id}` | the id (array) |
| `SoftwareUpdateServers\DeleteSoftwareUpdateServerByIdRequest` | DELETE | `/softwareupdateservers/id/{id}` | true |
| `SoftwareUpdateServers\FindSoftwareUpdateServersByNameRequest` | GET | `/softwareupdateservers/name/{name}` | the record (array) |

<a id="classic-userextensionattributes"></a>
### userextensionattributes

`Jamf::classic()->userExtensionAttributes()`: records written under `<user_extension_attribute>`.

As a collection: `get()`, `all()`, `count()`, `find($id)`, `create()`, `update()`, `delete()`.

| Request | Method | Path | Returns |
|---|---|---|---|
| `UserExtensionAttributes\FindUserextensionattributesRequest` | GET | `/userextensionattributes` | Collection of arrays |
| `UserExtensionAttributes\FindUserextensionattributesByIdRequest` | GET | `/userextensionattributes/id/{id}` | the record (array) |
| `UserExtensionAttributes\CreateUserextensionattributeByIdRequest` | POST | `/userextensionattributes/id/{id}` | the id (array) |
| `UserExtensionAttributes\UpdateUserextensionattributeByIdRequest` | PUT | `/userextensionattributes/id/{id}` | the id (array) |
| `UserExtensionAttributes\DeleteUserextensionattributeByIdRequest` | DELETE | `/userextensionattributes/id/{id}` | true |
| `UserExtensionAttributes\FindUserextensionattributesByNameRequest` | GET | `/userextensionattributes/name/{name}` | the record (array) |

<a id="classic-usergroups"></a>
### usergroups

`Jamf::classic()->userGroups()`: records written under `<user_group>`.

As a collection: `get()`, `all()`, `count()`, `find($id)`, `create()`, `update()`, `delete()`.

| Request | Method | Path | Returns |
|---|---|---|---|
| `UserGroups\FindUserGroupsRequest` | GET | `/usergroups` | Collection of arrays |
| `UserGroups\FindUserGroupsByIdRequest` | GET | `/usergroups/id/{id}` | the record (array) |
| `UserGroups\CreateUserGroupsByIdRequest` | POST | `/usergroups/id/{id}` | the id (array) |
| `UserGroups\UpdateUserGroupsByIdRequest` | PUT | `/usergroups/id/{id}` | the id (array) |
| `UserGroups\DeleteUserGroupsByIdRequest` | DELETE | `/usergroups/id/{id}` | true |
| `UserGroups\FindUserGroupsByNameRequest` | GET | `/usergroups/name/{name}` | the record (array) |

<a id="classic-users"></a>
### users

`Jamf::classic()->users()`: records written under `<user>`.

As a collection: `get()`, `all()`, `count()`, `find($id)`, `create()`, `update()`, `delete()`.

| Request | Method | Path | Returns |
|---|---|---|---|
| `Users\FindUsersRequest` | GET | `/users` | Collection of arrays |
| `Users\FindUsersByEmailAddressRequest` | GET | `/users/email/{email}` | the record (array) |
| `Users\FindUsersByIdRequest` | GET | `/users/id/{id}` | the record (array) |
| `Users\CreateUserByIdRequest` | POST | `/users/id/{id}` | the id (array) |
| `Users\UpdateUserByIdRequest` | PUT | `/users/id/{id}` | the id (array) |
| `Users\DeleteUserByIdRequest` | DELETE | `/users/id/{id}` | true |
| `Users\FindUsersByNameRequest` | GET | `/users/name/{name}` | the record (array) |

<a id="classic-vppaccounts"></a>
### vppaccounts

`Jamf::classic()->vppAccounts()`: records written under `<vpp_account>`.

As a collection: `get()`, `all()`, `count()`, `find($id)`, `create()`, `update()`, `delete()`.

| Request | Method | Path | Returns |
|---|---|---|---|
| `VppAccounts\FindVPPAdminAccountRequest` | GET | `/vppaccounts` | Collection of arrays |
| `VppAccounts\FindAccountByIdRequest` | GET | `/vppaccounts/id/{id}` | the record (array) |
| `VppAccounts\CreateAccountByIdRequest` | POST | `/vppaccounts/id/{id}` | the id (array) |
| `VppAccounts\UpdateAccountByIdRequest` | PUT | `/vppaccounts/id/{id}` | the id (array) |
| `VppAccounts\DeleteAccountByIdRequest` | DELETE | `/vppaccounts/id/{id}` | true |

<a id="classic-vppassignments"></a>
### vppassignments

`Jamf::classic()->vppAssignments()`: records written under `<vpp_assignment>`.

As a collection: `get()`, `all()`, `count()`, `find($id)`, `create()`, `update()`, `delete()`.

| Request | Method | Path | Returns |
|---|---|---|---|
| `VppAssignments\FindVPPAdminAssignmentRequest` | GET | `/vppassignments` | Collection of arrays |
| `VppAssignments\FindAssignmentByIdRequest` | GET | `/vppassignments/id/{id}` | the record (array) |
| `VppAssignments\CreateAssignmentByIdRequest` | POST | `/vppassignments/id/{id}` | the id (array) |
| `VppAssignments\UpdateAssignmentByIdRequest` | PUT | `/vppassignments/id/{id}` | the id (array) |
| `VppAssignments\DeleteAssignmentByIdRequest` | DELETE | `/vppassignments/id/{id}` | true |

<a id="classic-vppinvitations"></a>
### vppinvitations

`Jamf::classic()->vppInvitations()`: records written under `<vpp_invitation>`.

As a collection: `get()`, `all()`, `count()`, `find($id)`, `create()`, `update()`, `delete()`.

| Request | Method | Path | Returns |
|---|---|---|---|
| `VppInvitations\FindVPPAdminInvitationRequest` | GET | `/vppinvitations` | Collection of arrays |
| `VppInvitations\FindInvitationByIdRequest` | GET | `/vppinvitations/id/{id}` | the record (array) |
| `VppInvitations\CreateInvitationByIdRequest` | POST | `/vppinvitations/id/{id}` | the id (array) |
| `VppInvitations\UpdateInvitationByIdRequest` | PUT | `/vppinvitations/id/{id}` | the id (array) |
| `VppInvitations\DeleteInvitationByIdRequest` | DELETE | `/vppinvitations/id/{id}` | true |
| `VppInvitations\FindInvitationsByIdSubsetRequest` | GET | `/vppinvitations/id/{id}/subset/{subset}` | the record (array) |

<a id="classic-webhooks"></a>
### webhooks

`Jamf::classic()->webhooks()`: records written under `<webhook>`.

As a collection: `get()`, `all()`, `count()`, `find($id)`, `create()`, `update()`, `delete()`.

| Request | Method | Path | Returns |
|---|---|---|---|
| `Webhooks\FindWebhooksRequest` | GET | `/webhooks` | Collection of arrays |
| `Webhooks\FindWebhooksByIdRequest` | GET | `/webhooks/id/{id}` | the record (array) |
| `Webhooks\CreateWebhookByIdRequest` | POST | `/webhooks/id/{id}` | the id (array) |
| `Webhooks\UpdateWebhookByIdRequest` | PUT | `/webhooks/id/{id}` | the id (array) |
| `Webhooks\DeleteWebhookByIdRequest` | DELETE | `/webhooks/id/{id}` | true |
| `Webhooks\FindWebhooksByNameRequest` | GET | `/webhooks/name/{name}` | the record (array) |
