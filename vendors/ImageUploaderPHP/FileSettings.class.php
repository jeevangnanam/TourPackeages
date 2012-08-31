<?php

require_once ('PredefinedMetaProperty.class.php');
require_once ('CustomMetaProperty.class.php');

class FileSettings {

	function FileSettings($name) {
		$this->_name = $name;

		$this->_acl = 'private';
		$this->_key = '${filename}';

		$this->_metaProperties = array();
	}

	function getName()
	{
		return $this->_name;
	}

	function setName($value)
	{
		$this->_name = $value;
	}

	function getAcl()
	{
		return $this->_acl;
	}

	function setAcl($value)
	{
		$this->_acl = $value;
	}

	function getKey()
	{
		return $this->_key;
	}

	function setKey($value)
	{
		$this->_key = $value;
	}

	function addMetaProperty($metaProperty) {
		if (!in_array($metaProperty, $this->_metaProperties)) {
			array_push($this->_metaProperties, $metaProperty);
		}
	}

	function removeMetaProperty($metaProperty) {
		$key = array_search($metaProperty, $this->_metaProperties);
		if ($key !== false) {
			array_splice($this->_metaProperties, $key, 1);
		}
	}
}

?>