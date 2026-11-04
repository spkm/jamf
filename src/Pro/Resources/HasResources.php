<?php

namespace spkm\Jamf\Pro\Resources;

/**
 * A resource for every group of endpoints in the Jamf Pro API, on the connector and so on the Jamf facade.
 */
trait HasResources
{
    /**
     * The account-groups endpoints.
     */
    public function accountGroups(): AccountGroupsResource
    {
        return new AccountGroupsResource($this);
    }

    /**
     * The accounts endpoints.
     */
    public function accounts(): AccountsResource
    {
        return new AccountsResource($this);
    }

    /**
     * The activation-code endpoints.
     */
    public function activationCode(): ActivationCodeResource
    {
        return new ActivationCodeResource($this);
    }

    /**
     * The adcs-settings endpoints.
     */
    public function adcsSettings(): AdcsSettingsResource
    {
        return new AdcsSettingsResource($this);
    }

    /**
     * The advanced-mobile-device-searches endpoints.
     */
    public function advancedMobileDeviceSearches(): AdvancedMobileDeviceSearchesResource
    {
        return new AdvancedMobileDeviceSearchesResource($this);
    }

    /**
     * The advanced-user-content-searches endpoints.
     */
    public function advancedUserContentSearches(): AdvancedUserContentSearchesResource
    {
        return new AdvancedUserContentSearchesResource($this);
    }

    /**
     * The api-authentication endpoints.
     */
    public function apiAuthentication(): ApiAuthenticationResource
    {
        return new ApiAuthenticationResource($this);
    }

    /**
     * The api-integrations endpoints.
     */
    public function apiIntegrations(): ApiIntegrationsResource
    {
        return new ApiIntegrationsResource($this);
    }

    /**
     * The api-role-privileges endpoints.
     */
    public function apiRolePrivileges(): ApiRolePrivilegesResource
    {
        return new ApiRolePrivilegesResource($this);
    }

    /**
     * The api-roles endpoints.
     */
    public function apiRoles(): ApiRolesResource
    {
        return new ApiRolesResource($this);
    }

    /**
     * The apns-client-push-status endpoints.
     */
    public function apnsClientPushStatus(): ApnsClientPushStatusResource
    {
        return new ApnsClientPushStatusResource($this);
    }

    /**
     * The app-request-preview endpoints.
     */
    public function appRequestPreview(): AppRequestPreviewResource
    {
        return new AppRequestPreviewResource($this);
    }

    /**
     * The app-store-country-codes-preview endpoints.
     */
    public function appStoreCountryCodesPreview(): AppStoreCountryCodesPreviewResource
    {
        return new AppStoreCountryCodesPreviewResource($this);
    }

    /**
     * The branding endpoints.
     */
    public function branding(): BrandingResource
    {
        return new BrandingResource($this);
    }

    /**
     * The buildings endpoints.
     */
    public function buildings(): BuildingsResource
    {
        return new BuildingsResource($this);
    }

    /**
     * The cache-settings endpoints.
     */
    public function cacheSettings(): CacheSettingsResource
    {
        return new CacheSettingsResource($this);
    }

    /**
     * The categories endpoints.
     */
    public function categories(): CategoriesResource
    {
        return new CategoriesResource($this);
    }

    /**
     * The certificate-authority endpoints.
     */
    public function certificateAuthority(): CertificateAuthorityResource
    {
        return new CertificateAuthorityResource($this);
    }

    /**
     * The classic-ldap endpoints.
     */
    public function classicLdap(): ClassicLdapResource
    {
        return new ClassicLdapResource($this);
    }

    /**
     * The client-check-in endpoints.
     */
    public function clientCheckIn(): ClientCheckInResource
    {
        return new ClientCheckInResource($this);
    }

    /**
     * The cloud-azure endpoints.
     */
    public function cloudAzure(): CloudAzureResource
    {
        return new CloudAzureResource($this);
    }

    /**
     * The cloud-distribution-point endpoints.
     */
    public function cloudDistributionPoint(): CloudDistributionPointResource
    {
        return new CloudDistributionPointResource($this);
    }

    /**
     * The cloud-idp endpoints.
     */
    public function cloudIdp(): CloudIdpResource
    {
        return new CloudIdpResource($this);
    }

    /**
     * The cloud-information endpoints.
     */
    public function cloudInformation(): CloudInformationResource
    {
        return new CloudInformationResource($this);
    }

    /**
     * The cloud-ldap endpoints.
     */
    public function cloudLdap(): CloudLdapResource
    {
        return new CloudLdapResource($this);
    }

    /**
     * The computer-extension-attributes endpoints.
     */
    public function computerExtensionAttributes(): ComputerExtensionAttributesResource
    {
        return new ComputerExtensionAttributesResource($this);
    }

    /**
     * The computer-groups endpoints.
     */
    public function computerGroups(): ComputerGroupsResource
    {
        return new ComputerGroupsResource($this);
    }

    /**
     * The computer-inventory endpoints.
     */
    public function computerInventory(): ComputerInventoryResource
    {
        return new ComputerInventoryResource($this);
    }

    /**
     * The computer-inventory-collection-settings endpoints.
     */
    public function computerInventoryCollectionSettings(): ComputerInventoryCollectionSettingsResource
    {
        return new ComputerInventoryCollectionSettingsResource($this);
    }

    /**
     * The computer-prestages endpoints.
     */
    public function computerPrestages(): ComputerPrestagesResource
    {
        return new ComputerPrestagesResource($this);
    }

    /**
     * The computers-preview endpoints.
     */
    public function computersPreview(): ComputersPreviewResource
    {
        return new ComputersPreviewResource($this);
    }

    /**
     * The conditional-access endpoints.
     */
    public function conditionalAccess(): ConditionalAccessResource
    {
        return new ConditionalAccessResource($this);
    }

    /**
     * The csa endpoints.
     */
    public function csa(): CsaResource
    {
        return new CsaResource($this);
    }

    /**
     * The dashboard endpoints.
     */
    public function dashboard(): DashboardResource
    {
        return new DashboardResource($this);
    }

    /**
     * The declarative-device-management endpoints.
     */
    public function declarativeDeviceManagement(): DeclarativeDeviceManagementResource
    {
        return new DeclarativeDeviceManagementResource($this);
    }

    /**
     * The departments endpoints.
     */
    public function departments(): DepartmentsResource
    {
        return new DepartmentsResource($this);
    }

    /**
     * The device-communication-settings endpoints.
     */
    public function deviceCommunicationSettings(): DeviceCommunicationSettingsResource
    {
        return new DeviceCommunicationSettingsResource($this);
    }

    /**
     * The device-enrollments endpoints.
     */
    public function deviceEnrollments(): DeviceEnrollmentsResource
    {
        return new DeviceEnrollmentsResource($this);
    }

    /**
     * The device-enrollments-devices endpoints.
     */
    public function deviceEnrollmentsDevices(): DeviceEnrollmentsDevicesResource
    {
        return new DeviceEnrollmentsDevicesResource($this);
    }

    /**
     * The devices endpoints.
     */
    public function devices(): DevicesResource
    {
        return new DevicesResource($this);
    }

    /**
     * The digicert endpoints.
     */
    public function digicert(): DigicertResource
    {
        return new DigicertResource($this);
    }

    /**
     * The distribution-point endpoints.
     */
    public function distributionPoint(): DistributionPointResource
    {
        return new DistributionPointResource($this);
    }

    /**
     * The dock-items endpoints.
     */
    public function dockItems(): DockItemsResource
    {
        return new DockItemsResource($this);
    }

    /**
     * The ebooks endpoints.
     */
    public function ebooks(): EbooksResource
    {
        return new EbooksResource($this);
    }

    /**
     * The enrollment endpoints.
     */
    public function enrollment(): EnrollmentResource
    {
        return new EnrollmentResource($this);
    }

    /**
     * The enrollment-customization endpoints.
     */
    public function enrollmentCustomization(): EnrollmentCustomizationResource
    {
        return new EnrollmentCustomizationResource($this);
    }

    /**
     * The enrollment-customization-preview endpoints.
     */
    public function enrollmentCustomizationPreview(): EnrollmentCustomizationPreviewResource
    {
        return new EnrollmentCustomizationPreviewResource($this);
    }

    /**
     * The groups endpoints.
     */
    public function groups(): GroupsResource
    {
        return new GroupsResource($this);
    }

    /**
     * The gsx-connection endpoints.
     */
    public function gsxConnection(): GsxConnectionResource
    {
        return new GsxConnectionResource($this);
    }

    /**
     * The health-check endpoints.
     */
    public function healthCheck(): HealthCheckResource
    {
        return new HealthCheckResource($this);
    }

    /**
     * The icon endpoints.
     */
    public function icon(): IconResource
    {
        return new IconResource($this);
    }

    /**
     * The impact-alert-notification-settings endpoints.
     */
    public function impactAlertNotificationSettings(): ImpactAlertNotificationSettingsResource
    {
        return new ImpactAlertNotificationSettingsResource($this);
    }

    /**
     * The inventory-information endpoints.
     */
    public function inventoryInformation(): InventoryInformationResource
    {
        return new InventoryInformationResource($this);
    }

    /**
     * The inventory-preload endpoints.
     */
    public function inventoryPreload(): InventoryPreloadResource
    {
        return new InventoryPreloadResource($this);
    }

    /**
     * The jamf-cloud-distribution-service endpoints.
     */
    public function jamfCloudDistributionService(): JamfCloudDistributionServiceResource
    {
        return new JamfCloudDistributionServiceResource($this);
    }

    /**
     * The jamf-connect endpoints.
     */
    public function jamfConnect(): JamfConnectResource
    {
        return new JamfConnectResource($this);
    }

    /**
     * The jamf-management-framework endpoints.
     */
    public function jamfManagementFramework(): JamfManagementFrameworkResource
    {
        return new JamfManagementFrameworkResource($this);
    }

    /**
     * The jamf-package endpoints.
     */
    public function jamfPackage(): JamfPackageResource
    {
        return new JamfPackageResource($this);
    }

    /**
     * The jamf-pro-account-preferences endpoints.
     */
    public function jamfProAccountPreferences(): JamfProAccountPreferencesResource
    {
        return new JamfProAccountPreferencesResource($this);
    }

    /**
     * The jamf-pro-information endpoints.
     */
    public function jamfProInformation(): JamfProInformationResource
    {
        return new JamfProInformationResource($this);
    }

    /**
     * The jamf-pro-initialization endpoints.
     */
    public function jamfProInitialization(): JamfProInitializationResource
    {
        return new JamfProInitializationResource($this);
    }

    /**
     * The jamf-pro-notifications endpoints.
     */
    public function jamfProNotifications(): JamfProNotificationsResource
    {
        return new JamfProNotificationsResource($this);
    }

    /**
     * The jamf-pro-server-url-preview endpoints.
     */
    public function jamfProServerUrlPreview(): JamfProServerUrlPreviewResource
    {
        return new JamfProServerUrlPreviewResource($this);
    }

    /**
     * The jamf-pro-user-account-settings endpoints.
     */
    public function jamfProUserAccountSettings(): JamfProUserAccountSettingsResource
    {
        return new JamfProUserAccountSettingsResource($this);
    }

    /**
     * The jamf-pro-version endpoints.
     */
    public function jamfProVersion(): JamfProVersionResource
    {
        return new JamfProVersionResource($this);
    }

    /**
     * The jamf-protect endpoints.
     */
    public function jamfProtect(): JamfProtectResource
    {
        return new JamfProtectResource($this);
    }

    /**
     * The jamf-remote-assist endpoints.
     */
    public function jamfRemoteAssist(): JamfRemoteAssistResource
    {
        return new JamfRemoteAssistResource($this);
    }

    /**
     * The last-login endpoints.
     */
    public function lastLogin(): LastLoginResource
    {
        return new LastLoginResource($this);
    }

    /**
     * The ldap endpoints.
     */
    public function ldap(): LdapResource
    {
        return new LdapResource($this);
    }

    /**
     * The local-admin-password endpoints.
     */
    public function localAdminPassword(): LocalAdminPasswordResource
    {
        return new LocalAdminPasswordResource($this);
    }

    /**
     * The locales-preview endpoints.
     */
    public function localesPreview(): LocalesPreviewResource
    {
        return new LocalesPreviewResource($this);
    }

    /**
     * The log-flushing endpoints.
     */
    public function logFlushing(): LogFlushingResource
    {
        return new LogFlushingResource($this);
    }

    /**
     * The login-customization endpoints.
     */
    public function loginCustomization(): LoginCustomizationResource
    {
        return new LoginCustomizationResource($this);
    }

    /**
     * The m2m endpoints.
     */
    public function m2m(): M2mResource
    {
        return new M2mResource($this);
    }

    /**
     * The macos-managed-software-updates endpoints.
     */
    public function macosManagedSoftwareUpdates(): MacosManagedSoftwareUpdatesResource
    {
        return new MacosManagedSoftwareUpdatesResource($this);
    }

    /**
     * The managed-software-updates endpoints.
     */
    public function managedSoftwareUpdates(): ManagedSoftwareUpdatesResource
    {
        return new ManagedSoftwareUpdatesResource($this);
    }

    /**
     * The mdm endpoints.
     */
    public function mdm(): MdmResource
    {
        return new MdmResource($this);
    }

    /**
     * The mdm-renewal endpoints.
     */
    public function mdmRenewal(): MdmRenewalResource
    {
        return new MdmRenewalResource($this);
    }

    /**
     * The mobile-device-apps endpoints.
     */
    public function mobileDeviceApps(): MobileDeviceAppsResource
    {
        return new MobileDeviceAppsResource($this);
    }

    /**
     * The mobile-device-enrollment-profile endpoints.
     */
    public function mobileDeviceEnrollmentProfile(): MobileDeviceEnrollmentProfileResource
    {
        return new MobileDeviceEnrollmentProfileResource($this);
    }

    /**
     * The mobile-device-extension-attributes endpoints.
     */
    public function mobileDeviceExtensionAttributes(): MobileDeviceExtensionAttributesResource
    {
        return new MobileDeviceExtensionAttributesResource($this);
    }

    /**
     * The mobile-device-extension-attributes-preview endpoints.
     */
    public function mobileDeviceExtensionAttributesPreview(): MobileDeviceExtensionAttributesPreviewResource
    {
        return new MobileDeviceExtensionAttributesPreviewResource($this);
    }

    /**
     * The mobile-device-groups endpoints.
     */
    public function mobileDeviceGroups(): MobileDeviceGroupsResource
    {
        return new MobileDeviceGroupsResource($this);
    }

    /**
     * The mobile-device-prestages endpoints.
     */
    public function mobileDevicePrestages(): MobileDevicePrestagesResource
    {
        return new MobileDevicePrestagesResource($this);
    }

    /**
     * The mobile-devices endpoints.
     */
    public function mobileDevices(): MobileDevicesResource
    {
        return new MobileDevicesResource($this);
    }

    /**
     * The oidc endpoints.
     */
    public function oidc(): OidcResource
    {
        return new OidcResource($this);
    }

    /**
     * The onboarding endpoints.
     */
    public function onboarding(): OnboardingResource
    {
        return new OnboardingResource($this);
    }

    /**
     * The packages endpoints.
     */
    public function packages(): PackagesResource
    {
        return new PackagesResource($this);
    }

    /**
     * The parent-app-preview endpoints.
     */
    public function parentAppPreview(): ParentAppPreviewResource
    {
        return new ParentAppPreviewResource($this);
    }

    /**
     * The patch-management endpoints.
     */
    public function patchManagement(): PatchManagementResource
    {
        return new PatchManagementResource($this);
    }

    /**
     * The patch-policies endpoints.
     */
    public function patchPolicies(): PatchPoliciesResource
    {
        return new PatchPoliciesResource($this);
    }

    /**
     * The patch-policy-logs endpoints.
     */
    public function patchPolicyLogs(): PatchPolicyLogsResource
    {
        return new PatchPolicyLogsResource($this);
    }

    /**
     * The patch-software-title-configurations endpoints.
     */
    public function patchSoftwareTitleConfigurations(): PatchSoftwareTitleConfigurationsResource
    {
        return new PatchSoftwareTitleConfigurationsResource($this);
    }

    /**
     * The policies-preview endpoints.
     */
    public function policiesPreview(): PoliciesPreviewResource
    {
        return new PoliciesPreviewResource($this);
    }

    /**
     * The re-enrollment-preview endpoints.
     */
    public function reEnrollmentPreview(): ReEnrollmentPreviewResource
    {
        return new ReEnrollmentPreviewResource($this);
    }

    /**
     * The remote-administration endpoints.
     */
    public function remoteAdministration(): RemoteAdministrationResource
    {
        return new RemoteAdministrationResource($this);
    }

    /**
     * The return-to-service endpoints.
     */
    public function returnToService(): ReturnToServiceResource
    {
        return new ReturnToServiceResource($this);
    }

    /**
     * The scheduler endpoints.
     */
    public function scheduler(): SchedulerResource
    {
        return new SchedulerResource($this);
    }

    /**
     * The scripts endpoints.
     */
    public function scripts(): ScriptsResource
    {
        return new ScriptsResource($this);
    }

    /**
     * The self-service endpoints.
     */
    public function selfService(): SelfServiceResource
    {
        return new SelfServiceResource($this);
    }

    /**
     * The self-service-branding-ios endpoints.
     */
    public function selfServiceBrandingIos(): SelfServiceBrandingIosResource
    {
        return new SelfServiceBrandingIosResource($this);
    }

    /**
     * The self-service-branding-macos endpoints.
     */
    public function selfServiceBrandingMacos(): SelfServiceBrandingMacosResource
    {
        return new SelfServiceBrandingMacosResource($this);
    }

    /**
     * The self-service-branding-preview endpoints.
     */
    public function selfServiceBrandingPreview(): SelfServiceBrandingPreviewResource
    {
        return new SelfServiceBrandingPreviewResource($this);
    }

    /**
     * The self-service-plus endpoints.
     */
    public function selfServicePlus(): SelfServicePlusResource
    {
        return new SelfServicePlusResource($this);
    }

    /**
     * The service-discovery-enrollment endpoints.
     */
    public function serviceDiscoveryEnrollment(): ServiceDiscoveryEnrollmentResource
    {
        return new ServiceDiscoveryEnrollmentResource($this);
    }

    /**
     * The sites endpoints.
     */
    public function sites(): SitesResource
    {
        return new SitesResource($this);
    }

    /**
     * The slasa endpoints.
     */
    public function slasa(): SlasaResource
    {
        return new SlasaResource($this);
    }

    /**
     * The smart-computer-groups-preview endpoints.
     */
    public function smartComputerGroupsPreview(): SmartComputerGroupsPreviewResource
    {
        return new SmartComputerGroupsPreviewResource($this);
    }

    /**
     * The smart-mobile-device-groups-preview endpoints.
     */
    public function smartMobileDeviceGroupsPreview(): SmartMobileDeviceGroupsPreviewResource
    {
        return new SmartMobileDeviceGroupsPreviewResource($this);
    }

    /**
     * The smart-user-groups-preview endpoints.
     */
    public function smartUserGroupsPreview(): SmartUserGroupsPreviewResource
    {
        return new SmartUserGroupsPreviewResource($this);
    }

    /**
     * The smtp-server endpoints.
     */
    public function smtpServer(): SmtpServerResource
    {
        return new SmtpServerResource($this);
    }

    /**
     * The sso-certificate endpoints.
     */
    public function ssoCertificate(): SsoCertificateResource
    {
        return new SsoCertificateResource($this);
    }

    /**
     * The sso-failover endpoints.
     */
    public function ssoFailover(): SsoFailoverResource
    {
        return new SsoFailoverResource($this);
    }

    /**
     * The sso-oauth-session-tokens endpoints.
     */
    public function ssoOauthSessionTokens(): SsoOauthSessionTokensResource
    {
        return new SsoOauthSessionTokensResource($this);
    }

    /**
     * The sso-settings endpoints.
     */
    public function ssoSettings(): SsoSettingsResource
    {
        return new SsoSettingsResource($this);
    }

    /**
     * The startup-status endpoints.
     */
    public function startupStatus(): StartupStatusResource
    {
        return new StartupStatusResource($this);
    }

    /**
     * The static-user-groups-preview endpoints.
     */
    public function staticUserGroupsPreview(): StaticUserGroupsPreviewResource
    {
        return new StaticUserGroupsPreviewResource($this);
    }

    /**
     * The supervision-identities-preview endpoints.
     */
    public function supervisionIdentitiesPreview(): SupervisionIdentitiesPreviewResource
    {
        return new SupervisionIdentitiesPreviewResource($this);
    }

    /**
     * The teacher-app endpoints.
     */
    public function teacherApp(): TeacherAppResource
    {
        return new TeacherAppResource($this);
    }

    /**
     * The team-viewer-remote-administration endpoints.
     */
    public function teamViewerRemoteAdministration(): TeamViewerRemoteAdministrationResource
    {
        return new TeamViewerRemoteAdministrationResource($this);
    }

    /**
     * The time-zones-preview endpoints.
     */
    public function timeZonesPreview(): TimeZonesPreviewResource
    {
        return new TimeZonesPreviewResource($this);
    }

    /**
     * The tomcat-settings-preview endpoints.
     */
    public function tomcatSettingsPreview(): TomcatSettingsPreviewResource
    {
        return new TomcatSettingsPreviewResource($this);
    }

    /**
     * The user endpoints.
     */
    public function user(): UserResource
    {
        return new UserResource($this);
    }

    /**
     * The user-session-preview endpoints.
     */
    public function userSessionPreview(): UserSessionPreviewResource
    {
        return new UserSessionPreviewResource($this);
    }

    /**
     * The user-sessions endpoints.
     */
    public function userSessions(): UserSessionsResource
    {
        return new UserSessionsResource($this);
    }

    /**
     * The users endpoints.
     */
    public function users(): UsersResource
    {
        return new UsersResource($this);
    }

    /**
     * The venafi-preview endpoints.
     */
    public function venafiPreview(): VenafiPreviewResource
    {
        return new VenafiPreviewResource($this);
    }

    /**
     * The volume-purchasing-locations endpoints.
     */
    public function volumePurchasingLocations(): VolumePurchasingLocationsResource
    {
        return new VolumePurchasingLocationsResource($this);
    }

    /**
     * The volume-purchasing-subscriptions endpoints.
     */
    public function volumePurchasingSubscriptions(): VolumePurchasingSubscriptionsResource
    {
        return new VolumePurchasingSubscriptionsResource($this);
    }
}
