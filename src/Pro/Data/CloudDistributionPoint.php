<?php

namespace spkm\Jamf\Pro\Data;

use spkm\Jamf\Data\Data;

/**
 * A CloudDistributionPoint record from the Jamf Pro API.
 */
readonly class CloudDistributionPoint extends Data
{
    protected const HIDDEN = ['password', 'privateKey'];

    /**
     * @param  array<string, mixed>  $extra  Fields Jamf sent that the model has no property for.
     */
    public function __construct(
        /** Indicates whether the connection to the cloud distribution point was successful. If `true`, the connection was successful. If `false`, the connection failed. Possible values are: false true */
        public ?bool $hasConnectionSucceeded = null,
        /** A message detailing the result of the connection test. This could be a success message or an error message if the connection failed. */
        public ?string $message = null,
        /** The unique identifier (inventoryId) that links the cloud distribution point to its inventory data. By default, its value is 0, and it increments by +1 based on the existing inventory ID present in... */
        public ?string $inventoryId = null,
        /** Specifies the content delivery network (CDN) used to distribute content for the cloud distribution point. */
        public ?string $cdnType = null,
        /** Use as principal distribution point. Use as the authoritative source for all files. Possible values are: false true */
        public ?bool $master = null,
        /** The username or access key used for authenticating with the selected content delivery network (CDN). This field is required when the **cdnType** is set to **Rackspace Cloud... */
        public ?string $username = null,
        /** The password or authentication key used for connecting to the selected content delivery network (CDN). This field is required when the **cdnType** is set to **Rackspace Cloud... */
        public ?string $password = null,
        /** The directory or path for content delivery in Akamai. This field is required when the **cdnType** is set to **Akamai(AKAMAI)** and specifies where content is stored within Akamai's system. */
        public ?string $directory = null,
        /** The CDN URL for the cloud distribution point. The URL format varies depending on the selected CDN provider: - **Rackspace Cloud Files(RACKSPACE_CLOUD_FILES)** - **Amazon Web Services(AMAZON_S3)** -... */
        public ?string $cdnUrl = null,
        /** The URL used to upload files to Akamai's NetStorage. This field is required when the **cdnType** is set to **Akamai(AKAMAI)**. It specifies where content should be uploaded to Akamaiâs cloud... */
        public ?string $uploadUrl = null,
        /** The URL used to access and download content from Akamai's EdgeSuite. This field is required when the **cdnType** is set to **Akamai(AKAMAI)**. It specifies the endpoint from which files are retrieved... */
        public ?string $downloadUrl = null,
        /** Enable Remote Authentication.Authorize requests for files stored on the distribution point. This field is required when the **cdnType** is set to **Akamai(AKAMAI)**. Possible values are: false true */
        public ?bool $secondaryAuthRequired = null,
        /** Secondary Auth Status Code. Configure the HTTP response code that will be returned by Jamf Pro during remote authentication. This field is required when the **cdnType** is set to **Akamai(AKAMAI)**... */
        public ?int $secondaryAuthStatusCode = null,
        /** Secondary Auth Time To Live. Number of seconds before the authorization token expires. This field is required when the **cdnType** is set to **Akamai(AKAMAI)** and **secondaryAuthRequired** is true. */
        public ?int $secondaryAuthTimeToLive = null,
        /** Amazon Sign Url. It restrict access to requests that use a signed URL. This field is required when the **cdnType** is set to **Amazon Web Services(AMAZON_S3)**. Possible values are: false true */
        public ?bool $requireSignedUrls = null,
        /** The CloudFront Access Key ID (keyPairId) is part of the credentials used to generate signed URLs for secure access to content in a CloudFront distribution. When using AWS, this key is paired with the... */
        public ?string $keyPairId = null,
        /** Signed URL Expiration. Number of seconds before the signed URL expires, This field is required when the **cdnType** is set to **Amazon Web Services(AMAZON_S3)** and **requireSignedUrls** is true. */
        public ?int $expirationSeconds = null,
        /** The CloudFront Private Key file is required when the **cdnType** is set to **Amazon Web Services(AMAZON_S3)** and **requireSignedUrls** parameter is enabled. This private key is used for signing URLs... */
        public ?string $privateKey = null,
        public array $extra = [],
    ) {}
}
