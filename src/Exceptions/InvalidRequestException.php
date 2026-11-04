<?php

namespace spkm\Jamf\Exceptions;

use spkm\Jamf\JamfApiException;

/**
 * Jamf could not accept the request: a missing or invalid field, a conflict with a record it already has, or a method or body it doesn't take (400, 405, 406, 409, 412, 415, 422).
 */
class InvalidRequestException extends JamfApiException {}
