<?php

require_once ('MetaProperty.class.php');

class CustomMetaProperty extends MetaProperty {

	function CustomMetaProperty($name, $value) {
		parent::MetaProperty($name);
		$this->_value = $value;
	}

	function getValue() {
		return $this->_value;
	}

	function setValue($value) {
		$this->_value = $value;
	}

}

?>