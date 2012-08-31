<?php

/**
 * @copyright  Aurigma Inc. 2008-2009 All rights reserved.
 * @version    1.0
 */
class NirvanixException extends Exception {
	
	function NirvanixException($exceptionObject) {
		parent::__construct($exceptionObject->ResponseCode . ": " . $exceptionObject->ErrorMessage);
	}
}

?>