<?php

require_once ('MetaProperty.class.php');

class PredefinedMetaProperty extends MetaProperty {

	function PredefinedMetaProperty($name, $field) {		parent::MetaProperty($name);
		$this->_field = $field;
	}

	function getField() {
		return $this->_field;
	}

	function setField($value) {

		//TODO: check whether predefined property exists
		$this->_field = $value;
	}

}

?>