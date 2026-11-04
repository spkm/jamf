<?php

namespace spkm\Jamf\Pro\Resources;

use JsonSerializable;
use spkm\Jamf\Data\Data;
use spkm\Jamf\Pro\Data\EnrollmentCustomizationPanelList;
use spkm\Jamf\Pro\Data\GetEnrollmentCustomizationPanel;
use spkm\Jamf\Pro\Data\GetEnrollmentCustomizationPanelLdapAuth;
use spkm\Jamf\Pro\Data\GetEnrollmentCustomizationPanelSsoAuth;
use spkm\Jamf\Pro\Data\GetEnrollmentCustomizationPanelText;
use spkm\Jamf\Pro\Data\Markdown;
use spkm\Jamf\Pro\ProConnector;
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
use spkm\Jamf\Resources\BaseResource;

/**
 * The enrollment-customization-preview endpoints of the Jamf Pro API, from Jamf::enrollmentCustomizationPreview().
 *
 * @extends BaseResource<Data>
 */
class EnrollmentCustomizationPreviewResource extends BaseResource
{
    public function __construct(ProConnector $connector)
    {
        parent::__construct($connector, null);
    }

    /**
     * Create an LDAP Panel for a single Enrollment Customization: POST /v1/enrollment-customization/{id}/ldap.
     *
     * @param  array<mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options  Query options.
     */
    public function createEnrollmentCustomizationLdapV1(int|string $id, array|JsonSerializable $body, array $options = []): ?GetEnrollmentCustomizationPanelLdapAuth
    {
        return $this->fetch(new CreateEnrollmentCustomizationLdapV1Request($id, $body, $options));
    }

    /**
     * Create an SSO Panel for a single Enrollment Customization: POST /v1/enrollment-customization/{id}/sso.
     *
     * @param  array<mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options  Query options.
     */
    public function createEnrollmentCustomizationSsoV1(int|string $id, array|JsonSerializable $body, array $options = []): ?GetEnrollmentCustomizationPanelSsoAuth
    {
        return $this->fetch(new CreateEnrollmentCustomizationSsoV1Request($id, $body, $options));
    }

    /**
     * Create a Text Panel for a single Enrollment Customization: POST /v1/enrollment-customization/{id}/text.
     *
     * @param  array<mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options  Query options.
     */
    public function createEnrollmentCustomizationTextV1(int|string $id, array|JsonSerializable $body, array $options = []): ?GetEnrollmentCustomizationPanelText
    {
        return $this->fetch(new CreateEnrollmentCustomizationTextV1Request($id, $body, $options));
    }

    /**
     * Delete a single Panel from an Enrollment Customization: DELETE
     * /v1/enrollment-customization/{id}/all/{panel-id}.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function deleteEnrollmentCustomizationAllV1(int|string $id, int|string $panelId, array $options = []): bool
    {
        return $this->perform(new DeleteEnrollmentCustomizationAllV1Request($id, $panelId, $options));
    }

    /**
     * Delete an LDAP single panel from an Enrollment Customization: DELETE
     * /v1/enrollment-customization/{id}/ldap/{panel-id}.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function deleteEnrollmentCustomizationLdapV1(int|string $id, int|string $panelId, array $options = []): bool
    {
        return $this->perform(new DeleteEnrollmentCustomizationLdapV1Request($id, $panelId, $options));
    }

    /**
     * Delete a single SSO Panel from an Enrollment Customization: DELETE
     * /v1/enrollment-customization/{id}/sso/{panel-id}.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function deleteEnrollmentCustomizationSsoV1(int|string $id, int|string $panelId, array $options = []): bool
    {
        return $this->perform(new DeleteEnrollmentCustomizationSsoV1Request($id, $panelId, $options));
    }

    /**
     * Delete a Text single Panel from an Enrollment Customization: DELETE
     * /v1/enrollment-customization/{id}/text/{panel-id}.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function deleteEnrollmentCustomizationTextV1(int|string $id, int|string $panelId, array $options = []): bool
    {
        return $this->perform(new DeleteEnrollmentCustomizationTextV1Request($id, $panelId, $options));
    }

    /**
     * Get a single Panel for a single Enrollment Customization: GET /v1/enrollment-customization/{id}/all/{panel-id}.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function getEnrollmentCustomizationAllByPanelIdV1(int|string $id, int|string $panelId, array $options = []): ?GetEnrollmentCustomizationPanel
    {
        return $this->fetch(new GetEnrollmentCustomizationAllByPanelIdV1Request($id, $panelId, $options));
    }

    /**
     * Get all Panels for single Enrollment Customization: GET /v1/enrollment-customization/{id}/all.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function getEnrollmentCustomizationAllV1(int|string $id, array $options = []): ?EnrollmentCustomizationPanelList
    {
        return $this->fetch(new GetEnrollmentCustomizationAllV1Request($id, $options));
    }

    /**
     * Get a single LDAP panel for a single Enrollment Customization: GET
     * /v1/enrollment-customization/{id}/ldap/{panel-id}.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function getEnrollmentCustomizationLdapV1(int|string $id, int|string $panelId, array $options = []): ?GetEnrollmentCustomizationPanelLdapAuth
    {
        return $this->fetch(new GetEnrollmentCustomizationLdapV1Request($id, $panelId, $options));
    }

    /**
     * Get a single SSO Panel for a single Enrollment Customization: GET
     * /v1/enrollment-customization/{id}/sso/{panel-id}.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function getEnrollmentCustomizationSsoV1(int|string $id, int|string $panelId, array $options = []): ?GetEnrollmentCustomizationPanelSsoAuth
    {
        return $this->fetch(new GetEnrollmentCustomizationSsoV1Request($id, $panelId, $options));
    }

    /**
     * Get the markdown output of a single Text Panel for a single Enrollment: GET
     * /v1/enrollment-customization/{id}/text/{panel-id}/markdown.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function getEnrollmentCustomizationTextMarkdownV1(int|string $id, int|string $panelId, array $options = []): ?Markdown
    {
        return $this->fetch(new GetEnrollmentCustomizationTextMarkdownV1Request($id, $panelId, $options));
    }

    /**
     * Get a single Text Panel for a single Enrollment Customization: GET
     * /v1/enrollment-customization/{id}/text/{panel-id}.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function getEnrollmentCustomizationTextV1(int|string $id, int|string $panelId, array $options = []): ?GetEnrollmentCustomizationPanelText
    {
        return $this->fetch(new GetEnrollmentCustomizationTextV1Request($id, $panelId, $options));
    }

    /**
     * Parse the given string as markdown text and return Html output: POST
     * /v1/enrollment-customization/parse-markdown.
     *
     * @param  array<mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options  Query options.
     */
    public function parseEnrollmentCustomizationMarkdownV1(array|JsonSerializable $body, array $options = []): ?Markdown
    {
        return $this->fetch(new ParseEnrollmentCustomizationMarkdownV1Request($body, $options));
    }

    /**
     * Update a single LDAP Panel for a single Enrollment Customization: PUT
     * /v1/enrollment-customization/{id}/ldap/{panel-id}.
     *
     * @param  array<mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options  Query options.
     */
    public function replaceEnrollmentCustomizationLdapV1(int|string $id, int|string $panelId, array|JsonSerializable $body, array $options = []): ?GetEnrollmentCustomizationPanelLdapAuth
    {
        return $this->fetch(new ReplaceEnrollmentCustomizationLdapV1Request($id, $panelId, $body, $options));
    }

    /**
     * Update a single SSO Panel for a single Enrollment Customization: PUT
     * /v1/enrollment-customization/{id}/sso/{panel-id}.
     *
     * @param  array<mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options  Query options.
     */
    public function replaceEnrollmentCustomizationSsoV1(int|string $id, int|string $panelId, array|JsonSerializable $body, array $options = []): ?GetEnrollmentCustomizationPanelSsoAuth
    {
        return $this->fetch(new ReplaceEnrollmentCustomizationSsoV1Request($id, $panelId, $body, $options));
    }

    /**
     * Update a single Text Panel for a single Enrollment Customization: PUT
     * /v1/enrollment-customization/{id}/text/{panel-id}.
     *
     * @param  array<mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options  Query options.
     */
    public function replaceEnrollmentCustomizationTextV1(int|string $id, int|string $panelId, array|JsonSerializable $body, array $options = []): ?GetEnrollmentCustomizationPanelText
    {
        return $this->fetch(new ReplaceEnrollmentCustomizationTextV1Request($id, $panelId, $body, $options));
    }
}
