<?php

namespace spkm\Jamf\Exceptions;

use spkm\Jamf\JamfApiException;

/**
 * Jamf has no record at the path (404).
 */
class NotFoundException extends JamfApiException {}
