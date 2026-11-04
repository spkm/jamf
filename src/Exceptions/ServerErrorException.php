<?php

namespace spkm\Jamf\Exceptions;

use spkm\Jamf\JamfApiException;

/**
 * Jamf failed (5xx, 408), or answered a success with something other than the JSON or XML the request expects.
 */
class ServerErrorException extends JamfApiException {}
