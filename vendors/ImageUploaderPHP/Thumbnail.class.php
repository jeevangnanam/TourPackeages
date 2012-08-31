<?php

require_once ('BaseControl.class.php');

/**
 * @copyright  Aurigma Inc. 2008-2009 All rights reserved.
 * @version    1.0
 */
class Thumbnail extends BaseControl {		
	/**
	 * This is method Thumbnail
	 *
	 * @param stirng $id This is a description
	 * @param int|string $width This is a description
	 * @param int|string $height This is a description
	 */
	function Thumbnail($id = null, $width = null, $height = null) {
		parent::BaseControl($id, $width, $height);
		
		$this->_javaScriptWriterClassName = 'ThumbnailWriter';	

		$this->_init();
	}
	
	//>>>AUTOGENERATED
	function _init() {
		$this->_backgroundColor = $this->_backgroundColorDefaultValue;
		$this->_guid = $this->_guidDefaultValue;
		$this->_parentControlName = $this->_parentControlNameDefaultValue;
		$this->_view = $this->_viewDefaultValue;
	}


	function _renderEvents() {
		$varName = $this->getJavaScriptWriterVariableName();
		JavaScriptUtils::renderEvent($varName, "Click", $this->_clientClick);
		JavaScriptUtils::renderEvent($varName, "InitComplete", $this->_clientInitComplete);
	}


	function _renderParams() {
		$varName = $this->getJavaScriptWriterVariableName();
		JavaScriptUtils::renderParam($varName, "BackgroundColor", $this->_backgroundColor, $this->_backgroundColorDefaultValue);
		JavaScriptUtils::renderParam($varName, "Guid", $this->_guid, $this->_guidDefaultValue);
		JavaScriptUtils::renderParam($varName, "ParentControlName", $this->_parentControlName, $this->_parentControlNameDefaultValue);
		JavaScriptUtils::renderParam($varName, "View", $this->_view, $this->_viewDefaultValue);
	}


	var $_backgroundColorDefaultValue = "#ff7905";
	var $_backgroundColor;
	
	/**
	 * Background color of this instance.
	 * 
	 * @return string
	 */
	function getBackgroundColor() {
		return $this->_backgroundColor;
	}
	
	/**
	 * Background color of this instance.
	 * 
	 * @param string $value
	 */
	function setBackgroundColor($value) {
		$this->_backgroundColor = $value;
	}
	
	
	var $_guidDefaultValue = "";
	var $_guid;
	
	/**
	 * Identifier (GUID) of the item which is represented with this control.
	 * 
	 * @return string
	 */
	function getGuid() {
		return $this->_guid;
	}
	
	/**
	 * Identifier (GUID) of the item which is represented with this control.
	 * 
	 * @param string $value
	 */
	function setGuid($value) {
		$this->_guid = $value;
	}
	
	
	var $_parentControlNameDefaultValue = "";
	var $_parentControlName;
	
	/**
	 * Name of the control instance this thumbnail is associated with.
	 * 
	 * @return string
	 */
	function getParentControlName() {
		return $this->_parentControlName;
	}
	
	/**
	 * Name of the control instance this thumbnail is associated with.
	 * 
	 * @param string $value
	 */
	function setParentControlName($value) {
		$this->_parentControlName = $value;
	}
	
	
	var $_viewDefaultValue = "Thumbnails";
	var $_view;
	
	/**
	 * View mode of this instance.
	 * 
	 * @return string
	 */
	function getView() {
		return $this->_view;
	}
	
	/**
	 * View mode of this instance.
	 * 
	 * @param string $value
	 */
	function setView($value) {
		$this->_view = $value;
	}


	var $_clientClick = array();
	
	/**
	 * Raised when this control is clicked.
	 * 
	 * @param string $clientFunction
	 */
	function addClientClick($clientFunction) {
		if (!in_array($clientFunction, $this->_clientClick)) {
			array_push($this->_clientClick, $clientFunction);
		}
	}
	
	/**
	 * Raised when this control is clicked.
	 * 
	 * @param string $clientFunction
	 */
	function removeClientClick($clientFunction) {
		$key = array_search($clientFunction, $this->_clientClick);
		if ($key !== false) {
			array_splice($this->_clientClick, $key, 1);
		}
	}
	
	
	var $_clientInitComplete = array();
	
	/**
	 * Raised when this instance is completely created and initialized.
	 * 
	 * @param string $clientFunction
	 */
	function addClientInitComplete($clientFunction) {
		if (!in_array($clientFunction, $this->_clientInitComplete)) {
			array_push($this->_clientInitComplete, $clientFunction);
		}
	}
	
	/**
	 * Raised when this instance is completely created and initialized.
	 * 
	 * @param string $clientFunction
	 */
	function removeClientInitComplete($clientFunction) {
		$key = array_search($clientFunction, $this->_clientInitComplete);
		if ($key !== false) {
			array_splice($this->_clientInitComplete, $key, 1);
		}
	}
//AUTOGENERATED<<<	
}

?>