<?php

namespace spkm\Jamf\Pro\Data;

use spkm\Jamf\Data\Data;

/**
 * A SamlSettings record from the Jamf Pro API.
 */
readonly class SamlSettings extends Data
{
    /**
     * @param  array<string, mixed>  $extra  Fields Jamf sent that the model has no property for.
     */
    public function __construct(
        public ?bool $tokenExpirationDisabled = null,
        public ?bool $userAttributeEnabled = null,
        public ?string $userAttributeName = null,
        public ?string $userMapping = null,
        public ?string $groupAttributeName = null,
        public ?string $groupRdnKey = null,
        public ?string $idpProviderType = null,
        public ?string $idpUrl = null,
        public ?string $entityId = null,
        public ?string $metadataFileName = null,
        public ?string $otherProviderTypeName = null,
        public ?string $federationMetadataFile = null,
        public ?string $metadataSource = null,
        public ?int $sessionTimeout = null,
        public array $extra = [],
    ) {}
}
