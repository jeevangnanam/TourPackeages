<?php

class MetaProperty {

	function MetaProperty($name) {
		$this->_name = $name;
	}

	function getName() {
		return $this->_name;
	}

	function setName($value) {
		$this->_name = $value;
	}

}

?>