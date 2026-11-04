<?php

namespace spkm\Jamf\Pro\Requests\CloudLdap;

use JsonSerializable;
use spkm\Jamf\Pro\Data\CloudLdapKeystore;
use spkm\Jamf\Requests\WriteRequest;

/**
 * Validate keystore for Cloud Identity Provider secure connection: POST /v1/ldap-keystore/verify.
 */
class VerifyLdapKeystoreV1Request extends WriteRequest
{
    protected string $responseShape = self::ONE;

    protected ?string $dto = CloudLdapKeystore::class;

    /**
     * @param  array<mixed>|JsonSerializable  $body  The record, as an array of Jamf's field names or a model.
     * @param  array<string, mixed>  $options  Query options.
     */
    public function __construct(array|JsonSerializable $body, array $options = [])
    {
        $this->record = $body;
        $this->options = $options;
    }

    public function resolveEndpoint(): string
    {
        return '/v1/ldap-keystore/verify';
    }
}
