<?php

namespace spkm\Jamf\Exceptions;

use spkm\Jamf\JamfApiException;

/**
 * Jamf refused the token, or the API client's roles or the account's privileges don't allow the operation (401, 403).
 */
class UnauthorizedException extends JamfApiException {}
