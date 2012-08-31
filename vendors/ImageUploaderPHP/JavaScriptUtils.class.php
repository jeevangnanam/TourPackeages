<?php

/**
 * @copyright  Aurigma Inc. 2008-2009 All rights reserved.
 * @version    1.0
 */
class JavaScriptUtils {
	
	/**
	 * This is method renderParam
	 *
	 * @param string $varName This is a description
	 * @param string $paramName This is a description
	 * @param mixed $value This is a description
	 * @param mixed $defaultValue This is a description
	 */
	static function renderParam($varName, $paramName, $value, $defaultValue) {				
		if (is_object($value)) {
			$value = $value->toString();
		}		
		
		if (is_null($defaultValue) || $value != $defaultValue) {
			echo $varName . ".addParam(\"" . $paramName . "\", \"" 
				. JavaScriptUtils::javaScriptEncode(is_bool($value) ? ($value ? 'true' : 'false') : $value) . "\");\n";
		}
	}
				
				
	/**
	 * This is method renderEvent
	 *
	 * @param string $varName This is a description
	 * @param string $eventName This is a description
	 * @param mixed $listeners This is a description
	 */
	static function renderEvent($varName, $eventName, $listeners) {
		if (is_array($listeners)) {
			foreach ($listeners as $listener) {
				if ($listener != '') {
					echo $varName . '.addEventListener("' . $eventName . '", "' . $listener . "\");\n";
				}
			}
		}
	}


	
	/**
	 * This is method renderProperty
	 *
	 * @param string $varName This is a description
	 * @param string $propertyName This is a description
	 * @param mixed $value This is a description
	 * @param mixed $defaultValue This is a description
	 */
	static function renderProperty($varName, $propertyName, $value, $defaultValue) {		
		if (is_string($value)) {
			$v = '"' . $value . '"';
		} elseif (is_bool($value)) {		
			$v = $value ? 'true' : 'false';
		} else {
			$v = $value;
		}		

		if (is_null($defaultValue) || $value != $defaultValue) {
			echo $varName . '.set' . $propertyName . '(' . $v . ");\n";
		}
	}

	
	/**
	 * This is method javaScriptEncode
	 *
	 * @param string $value This is a description
	 * @return string This is the return value description
	 */
	static function javaScriptEncode($value) {
		return str_replace("\r", "\\r", str_replace("\n", "\\n", str_replace("\\", "\\\\", $value)));
	}
}
?>