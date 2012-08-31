<?php

class InstallationProgress {
	var $_parent;

	//>>>AUTOGENERATED
	var $_commonHtmlDefaultValue = "<p>Aurigma Image Uploader ActiveX control is necessary to upload your files quickly and easily. You will be able to select multiple images in user-friendly interface instead of clumsy input fields with <strong>Browse</strong> button.</p>";
	var $_progressHtmlDefaultValue = "<p><img src=\"{0}\" /><br />Loading Aurigma Image Uploader ActiveX...</p>";
	var $_javaProgressHtmlDefaultValue = "<p><img src=\"{0}\" /><br />Loading Aurigma Image Uploader Java Applet...</p>";
	var $_beforeIE6XPSP2ProgressHtmlDefaultValue = "<p>To install Image Uploader, please wait until the control will be loaded and click the <strong>Yes</strong> button when you see the installation dialog.</p>";
	var $_beforeIE6XPSP2InstructionsHtmlDefaultValue = "<p>To install Image Uploader, please reload the page and click the <strong>Yes</strong> button when you see the control installation dialog. If you don't see installation dialog, please check your security settings.</p>";
	var $_IE6XPSP2ProgressHtmlDefaultValue = "<p>Please wait until the control will be loaded.</p>";
	var $_IE6XPSP2InstructionsHtmlDefaultValue = "<p>To install Image Uploader, please click on the <strong>Information Bar</strong> and select <strong>Install ActiveX Control</strong> from the dropdown menu. After page reload click <strong>Install</strong> when you see the control installation dialog. If you don't see Information Bar, please try to reload the page and/or check your security settings.</p>";
	var $_IE7ProgressHtmlDefaultValue = "<p>Please wait until the control will be loaded.</p>";
	var $_IE7InstructionsHtmlDefaultValue = "<p>To install Image Uploader, please click on the <strong>Information Bar</strong> and select <strong>Install ActiveX Control</strong> or <strong>Run ActiveX Control</strong> from the dropdown menu.</p><p>Then either click <strong>Run</strong> or after the page reload click <strong>Install</strong> when you see the control installation dialog. If you don't see Information Bar, please try to reload the page and/or check your security settings.</p>";
	var $_IE8ProgressHtmlDefaultValue = "<p>Please wait until the control will be loaded.</p>";
	var $_IE8InstructionsHtmlDefaultValue = "<p>To install Image Uploader, please click on the <strong>Information Bar</strong> and select <strong>Install This Add-on</strong> or <strong>Run Add-on</strong> from the dropdown menu.</p><p>Then either click <strong>Run</strong> or after the page reload click <strong>Install</strong> when you see the control installation dialog. If you don't see Information Bar, please try to reload the page and/or check your security settings.</p>";
	var $_altInstallerHtmlDefaultValue = "<p>You can also download <a href=\"{0}\">standalone installator</a>.</p>";
	var $_updateInstructionsDefaultValue = "You need to update Image Uploader ActiveX control. Click <strong>Install</strong> or <strong>Run</strong> button when you see the control installation dialog. If you don't see installation dialog, please try to reload the page.";
	var $_commonInstallJavaHtmlDefaultValue = "<p>You need to install Java for running Image Uploader.</p>";
	var $_beforeIE6XPSP2InstallJavaHtmlDefaultValue = "<p>To install Java, please reload the page and click the <strong>Yes</strong> button when you see the control installation dialog. If you don't see installation dialog, please check your security settings.</p>";
	var $_IE6XPSP2InstallJavaHtmlDefaultValue = "<p>To install Java, please click on the <strong>Information Bar</strong> and select <strong>Install ActiveX Control</strong> from the dropdown menu. After page reload click <strong>Install</strong> when you see the control installation dialog. If you don't see Information Bar, please try to reload the page and/or check your security settings.</p>";
	var $_IE7InstallJavaHtmlDefaultValue = "<p>To install Java, please click on the <strong>Information Bar</strong> and select <strong>Install ActiveX Control</strong> or <strong>Run ActiveX Control</strong> from the dropdown menu.</p><p>Then either click <strong>Run</strong> or after the page reload click <strong>Install</strong> when you see the control installation dialog. If you don't see Information Bar, please try to reload the page and/or check your security settings.</p>";
	var $_IE8InstallJavaHtmlDefaultValue = "<p>To install Java, please click on the <strong>Information Bar</strong> and select <strong>Install This Add-on</strong> or <strong>Run Add-on</strong> from the dropdown menu.</p><p>Then either click <strong>Run</strong> or after the page reload click <strong>Install</strong> when you see the control installation dialog. If you don't see Information Bar, please try to reload the page and/or check your security settings.</p>";
	var $_MacInstallJavaHtmlDefaultValue = "<p>Use the <a href=\"http://support.apple.com/kb/HT1338\">Software Update</a> feature (available on the Apple menu) to check that you have the most up-to-date version of Java for your Mac.</p>";
	var $_miscBrowsersInstallJavaHtmlDefaultValue = "<p>Please <a href=\"http://www.java.com/en/download/\">download</a> and install Java.</p>";
	//AUTOGENERATED<<<		
	
	var $_visible = true;	
	var $_progressCssClass = '';
	var $_instructionsCssClass = '';
	var $_commonHtml;
	var $_progressHtml;
	var $_progressImageUrl = '';
	var $_beforeIE6XPSP2ProgressHtml;
	var $_beforeIE6XPSP2InstructionsHtml;	
	var $_IE6XPSP2ProgressHtml;
	var $_IE6XPSP2InstructionsHtml;
	var $_IE7ProgressHtml;
	var $_IE7InstructionsHtml;
	var $_IE8ProgressHtml;
	var $_IE8InstructionsHtml;
	var $_altInstallerEnabled = false;
	var $_altInstallerHtml;
	var $_altInstallerUrl = '';
	var $_updateInstructions;
	var $_commonInstallJavaHtml;
	var $_beforeIE6XPSP2InstallJavaHtml;
	var $_IE6XPSP2InstallJavaHtml;
	var $_IE7InstallJavaHtml;
	var $_IE8InstallJavaHtml;
	var $_MacInstallJavaHtml;
	var $_miscBrowsersInstallJavaHtml;
	var $_javaProgressHtml;
	
		
	/**
	 * [to be supplied]
	 *
	 * @param mixed $parent This is a description
	 * @return mixed This is the return $value description
	 */
	function InstallationProgress($parent) {
		$this->_parent = $parent;
		
		$this->_commonHtml = $this->_commonHtmlDefaultValue;
		$this->_progressHtml = $this->_progressHtmlDefaultValue;
		$this->_beforeIE6XPSP2ProgressHtml = $this->_beforeIE6XPSP2ProgressHtmlDefaultValue;
		$this->_beforeIE6XPSP2InstructionsHtml = $this->_beforeIE6XPSP2InstructionsHtmlDefaultValue;
		$this->_IE6XPSP2ProgressHtml = $this->_IE6XPSP2ProgressHtmlDefaultValue;
		$this->_IE6XPSP2InstructionsHtml = $this->_IE6XPSP2InstructionsHtmlDefaultValue;
		$this->_IE7ProgressHtml = $this->_IE7ProgressHtmlDefaultValue;
		$this->_IE7InstructionsHtml = $this->_IE7InstructionsHtmlDefaultValue;
		$this->_IE8ProgressHtml = $this->_IE8ProgressHtmlDefaultValue;
		$this->_IE8InstructionsHtml = $this->_IE8InstructionsHtmlDefaultValue;
		$this->_altInstallerHtml = $this->_altInstallerHtmlDefaultValue;
		
		$this->_updateInstructions = $this->_updateInstructionsDefaultValue;
		$this->_commonInstallJavaHtml = $this->_commonInstallJavaHtmlDefaultValue;
		$this->_beforeIE6XPSP2InstallJavaHtml = $this->_beforeIE6XPSP2InstallJavaHtmlDefaultValue;
		$this->_IE6XPSP2InstallJavaHtml = $this->_IE6XPSP2InstallJavaHtmlDefaultValue;
		$this->_IE7InstallJavaHtml = $this->_IE7InstallJavaHtmlDefaultValue;
		$this->_IE8InstallJavaHtml = $this->_IE8InstallJavaHtmlDefaultValue;
		$this->_MacInstallJavaHtml = $this->_MacInstallJavaHtmlDefaultValue;
		$this->_miscBrowsersInstallJavaHtml = $this->_miscBrowsersInstallJavaHtmlDefaultValue;
		$this->_javaProgressHtml = $this->_javaProgressHtmlDefaultValue;
	}


	/** 
	 * Get ...
	 * 
	 * @return bool
	 */
	function getVisible() {
		return $this->_visible;
	}

	/**
	 * Set ...
	 * 
	 * @param bool $value
	 */
	function setVisible($value) {
		$this->_visible = $value;
	}

	
	/** 
	 * Get ..
	 * 
	 * @return string
	 */
	function getProgressCssClass() {
		return $this->_progressCssClass;
	}

	/**
	 * Set ...
	 * 
	 * @param string $value
	 */	
	function setProgressCssClass($value) {
		$this->_progressCssClass = $value;
	}

	
	/** 
	 * Get ...
	 * 
	 * @return string
	 */
	function getInstructionsCssClass() {
		return $this->_instructionsCssClass;
	}

	/**
	 * Set ...
	 * 
	 * @param string $value
	 */	
	function setInstructionsCssClass($value) {
		$this->_instructionsCssClass = $value;
	}


	/** 
	 * Get ...
	 * 
	 * @return string
	 */
	function getCommonHtml() {
		return $this->_commonHtml;
	}

	/**
	 * Set ...
	 * 
	 * @param string $value
	 */
	function setCommonHtml($value) {	
		$this->_commonHtml = $value;
	}


	/** 
	 * Get ...
	 * 
	 * @return string
	 */
	function getProgressHtml() {
		return $this->_progressHtml;
	}

	/**
	 * Set ...
	 * 
	 * @param string $value
	 */
	function setProgressHtml($value) {
		$this->_progressHtml = $value;
	}


	/** 
	 * Get ...
	 * 
	 * @return string
	 */
	function getProgressImageUrl() {
		return $this->_progressImageUrl;
	}
	
	/**
	 * Set ...
	 * 
	 * @param string $value
	 */	
	function setProgressImageUrl($value) {
		$this->_progressImageUrl = $value;
	}


	/** 
	 * Get ...
	 * 
	 * @return string
	 */
	function getBeforeIE6XPSP2ProgressHtml() {
		return $this->_beforeIE6XPSP2ProgressHtml;
	}

	/**
	 * Set ...
	 * 
	 * @param string $value
	 */
	function setBeforeIE6XPSP2ProgressHtml($value) {
		$this->_beforeIE6XPSP2ProgressHtml = $value;
	}


	/** 
	 * Get ...
	 * 
	 * @return string
	 */
	function getBeforeIE6XPSP2InstructionsHtml() {
		return $this->_beforeIE6XPSP2InstructionsHtml;
	}

	/**
	 * Set ...
	 * 
	 * @param string $value
	 */	
	function setBeforeIE6XPSP2InstructionsHtml($value) {
		$this->_beforeIE6XPSP2InstructionsHtml = $value;
	}
	

	/** 
	 * Get ...
	 * 
	 * @return string
	 */
	function getIE6XPSP2ProgressHtml() {
		return $this->_IE6XPSP2ProgressHtml;
	}
	
	/**
	 * Set ...
	 * 
	 * @param string $value
	 */	
	function setIE6XPSP2ProgressHtml($value) {
		$this->_IE6XPSP2ProgressHtml = $value;
	}


	/** 
	 * Get ...
	 * 
	 * @return string
	 */
	function getIE6XPSP2InstructionsHtml() {
		return $this->_IE6XPSP2InstructionsHtml;
	}
	
	/**
	 * Set ...
	 * 
	 * @param string $value
	 */	
	function setIE6XPSP2InstructionsHtml($value) {
		$this->_IE6XPSP2InstructionsHtml = $value;
	}		
	

	/** 
	 * Get ...
	 * 
	 * @return string
	 */
	function getIE7ProgressHtml() {
		return $this->_IE7ProgressHtml;
	}

	/**
	 * Set ...
	 * 
	 * @param string $value
	 */	
	function setIE7ProgressHtml($value) {
		$this->_IE7ProgressHtml = $value;
	}


	/** 
	 * Get ...
	 * 
	 * @return string
	 */
	function getIE7InstructionsHtml() {
		return $this->_IE7InstructionsHtml;
	}

	/**
	 * Set ...
	 * 
	 * @param string $value
	 */	
	function setIE7InstructionsHtml($value) {	
		$this->_IE7InstructionsHtml = $value;
	}		
	
	
	/** 
	 * Get ...
	 * 
	 * @return string
	 */
	function getIE8ProgressHtml() {
		return $this->_IE8ProgressHtml;
	}

	/**
	 * Set ...
	 * 
	 * @param string $value
	 */	
	function setIE8ProgressHtml($value) {		
		$this->_IE8ProgressHtml = $value;
	}

	
	/** 
	 * Get ...
	 * 
	 * @return string
	 */
	function getIE8InstructionsHtml() {
		return $this->_IE8InstructionsHtml;
	}

	/**
	 * Set ...
	 * 
	 * @param string $value
	 */	
	function setIE8InstructionsHtml($value) {
		$this->_IE8InstructionsHtml = $value;
	}
		

	/** 
	 * Get ...
	 * 
	 * @return bool
	 */
	function getAltInstallerEnabled() {
		return $this->_altInstallerEnabled;
	}

	/**
	 * Set ...
	 * 
	 * @param bool $value
	 */
	function setAltInstallerEnabled($value) {
		$this->_altInstallerEnabled = $value;
	}


	/** 
	 * Get ...
	 * 
	 * @return int|string
	 */
	function getAltInstallerHtml() {
		return $this->_altInstallerHtml;
	}
	
	/**
	 * Set ...
	 * 
	 * @param string $value
	 */
	function setAltInstallerHtml($value) {
		$this->_altInstallerHtml = $value;
	}	


	/** 
	 * Get ...
	 * 
	 * @return string
	 */
	function getAltInstallerUrl() {
		return $this->_altInstallerUrl;
	}


	/**
	 * Set ...
	 * 
	 * @param string $value
	 */	
	function setAltInstallerUrl($value) {
		$this->_altInstallerUrl = $value;
	}


	/** 
	 * Get ...
	 * 
	 * @return string
	 */
	function getUpdateInstructions() {
		return $this->_updateInstructions;
	}


	/**
	 * Set ...
	 * 
	 * @param string $value
	 */	
	function setUpdateInstructions($value) {
		$this->_updateInstructions = $value;
	}
	
	/** 
	 * Get ...
	 * 
	 * @return string
	 */
	function getCommonInstallJavaHtml() {
		return $this->_commonInstallJavaHtml;
	}


	/**
	 * Set ...
	 * 
	 * @param string $value
	 */	
	function setCommonInstallJavaHtml($value) {
		$this->_commonInstallJavaHtml = $value;
	}
	
	/** 
	 * Get ...
	 * 
	 * @return string
	 */
	function getBeforeIE6XPSP2InstallJavaHtml() {
		return $this->_beforeIE6XPSP2InstallJavaHtml;
	}


	/**
	 * Set ...
	 * 
	 * @param string $value
	 */	
	function setBeforeIE6XPSP2InstallJavaHtml($value) {
		$this->_beforeIE6XPSP2InstallJavaHtml = $value;
	}
	
	
	/** 
	 * Get ...
	 * 
	 * @return string
	 */
	function getIE6XPSP2InstallJavaHtml() {
		return $this->_IE6XPSP2InstallJavaHtml;
	}


	/**
	 * Set ...
	 * 
	 * @param string $value
	 */	
	function setIE6XPSP2InstallJavaHtml($value) {
		$this->_IE6XPSP2InstallJavaHtml = $value;
	}
	
	
	/** 
	 * Get ...
	 * 
	 * @return string
	 */
	function getIE7InstallJavaHtml() {
		return $this->_IE7InstallJavaHtml;
	}


	/**
	 * Set ...
	 * 
	 * @param string $value
	 */	
	function setIE7InstallJavaHtml($value) {
		$this->_IE7InstallJavaHtml = $value;
	}
	
	
	/** 
	 * Get ...
	 * 
	 * @return string
	 */
	function getIE8InstallJavaHtml() {
		return $this->_IE8InstallJavaHtml;
	}


	/**
	 * Set ...
	 * 
	 * @param string $value
	 */	
	function setIE8InstallJavaHtml($value) {
		$this->_IE8InstallJavaHtml = $value;
	}
	
	
	/** 
	 * Get ...
	 * 
	 * @return string
	 */
	function getMacInstallJavaHtml() {
		return $this->_MacInstallJavaHtml;
	}


	/**
	 * Set ...
	 * 
	 * @param string $value
	 */	
	function setMacInstallJavaHtml($value) {
		$this->_MacInstallJavaHtml = $value;
	}
	
	
	/** 
	 * Get ...
	 * 
	 * @return string
	 */
	function getMiscBrowsersInstallJavaHtml() {
		return $this->_miscBrowsersInstallJavaHtml;
	}


	/**
	 * Set ...
	 * 
	 * @param string $value
	 */	
	function setMiscBrowsersInstallJavaHtml($value) {
		$this->_miscBrowsersInstallJavaHtml = $value;
	}
	
/** 
	 * Get ...
	 * 
	 * @return string
	 */
	function getJavaProgressHtml() {
		return $this->_javaProgressHtml;
	}


	/**
	 * Set ...
	 * 
	 * @param string $value
	 */	
	function setJavaProgressHtml($value) {
		$this->_javaProgressHtml = $value;
	}
	
	
	/**
	 * This is method render
	 */
	function render() {
		if ($this->_visible) {			
			$varName = $this->_parent->getId() . '_ip';
			
			echo 'var ' . $varName . ' = new InstallationProgressExtender(' 
				. $this->_parent->getJavaScriptWriterVariableName() . ");\n";

			JavaScriptUtils::renderProperty($varName, 'ProgressCssClass', $this->_progressCssClass, '');
			
			JavaScriptUtils::renderProperty($varName, 'InstructionsCssClass', $this->_instructionsCssClass, '');
			
			JavaScriptUtils::renderProperty($varName, 'CommonHtml', $this->_commonHtml
				, $this->_commonHtmlDefaultValue);
			
			JavaScriptUtils::renderProperty($varName, 'ProgressHtml', $this->_progressHtml
				, $this->_progressHtmlDefaultValue);
				
			$progressImageUrl = $this->_progressImageUrl == ''
				? $this->_parent->getScriptsDirectoryResolved() . 'InstallationProgress.gif'
				: $this->_progressImageUrl;
			JavaScriptUtils::renderProperty($varName, 'ProgressImageUrl', $progressImageUrl, '');
				
			JavaScriptUtils::renderProperty($varName, 'BeforeIE6XPSP2ProgressHtml', $this->_beforeIE6XPSP2ProgressHtml
				, $this->_beforeIE6XPSP2ProgressHtmlDefaultValue);
			
			JavaScriptUtils::renderProperty($varName, 'BeforeIE6XPSP2InstructionsHtml', $this->_beforeIE6XPSP2InstructionsHtml
				, $this->_beforeIE6XPSP2InstructionsHtmlDefaultValue);
			
			JavaScriptUtils::renderProperty($varName, 'IE6XPSP2ProgressHtml', $this->_IE6XPSP2ProgressHtml
				, $this->_IE6XPSP2ProgressHtmlDefaultValue);
			
			JavaScriptUtils::renderProperty($varName, 'IE6XPSP2InstructionsHtml', $this->_IE6XPSP2InstructionsHtml
				, $this->_IE6XPSP2InstructionsHtmlDefaultValue);

			JavaScriptUtils::renderProperty($varName, 'IE7ProgressHtml', $this->_IE7ProgressHtml
				, $this->_IE7ProgressHtmlDefaultValue);

			JavaScriptUtils::renderProperty($varName, 'IE7InstructionsHtml', $this->_IE7InstructionsHtml
				, $this->_IE7InstructionsHtmlDefaultValue);

			JavaScriptUtils::renderProperty($varName, 'IE8ProgressHtml', $this->_IE8ProgressHtml
				, $this->_IE8ProgressHtmlDefaultValue);

			JavaScriptUtils::renderProperty($varName, 'IE8InstructionsHtml', $this->_IE8InstructionsHtml
				, $this->_IE8InstructionsHtmlDefaultValue);
						
			JavaScriptUtils::renderProperty($varName, 'AltInstallerEnabled', $this->_altInstallerEnabled
				, false);

			//JavaScriptUtils::renderProperty($varName, 'AltInstallerHtml', $this->_altInstallerHtml
			//	, $this->_altInstallerHtmlDefaultValue);

			//JavaScriptUtils::renderProperty($varName, 'AltInstallerUrl', $this->_altInstallerUrl, '');
			
			JavaScriptUtils::renderProperty($varName, 'UpdateInstructions', $this->_updateInstructions
				, $this->_updateInstructionsDefaultValue);
			
			JavaScriptUtils::renderProperty($varName, 'CommonInstallJavaHtml', $this->_commonInstallJavaHtml
				, $this->_commonInstallJavaHtmlDefaultValue);
				
			JavaScriptUtils::renderProperty($varName, 'BeforeIE6XPSP2InstallJavaHtml', $this->_beforeIE6XPSP2InstallJavaHtml
				, $this->_beforeIE6XPSP2InstallJavaHtmlDefaultValue);
				
			JavaScriptUtils::renderProperty($varName, 'IE6XPSP2InstallJavaHtml', $this->_IE6XPSP2InstallJavaHtml
				, $this->_IE6XPSP2InstallJavaHtmlDefaultValue);
				
			JavaScriptUtils::renderProperty($varName, 'IE7InstallJavaHtml', $this->_IE7InstallJavaHtml
				, $this->_IE7InstallJavaHtmlDefaultValue);
				
			JavaScriptUtils::renderProperty($varName, 'IE8InstallJavaHtml', $this->_IE8InstallJavaHtml
				, $this->_IE8InstallJavaHtmlDefaultValue);
				
			JavaScriptUtils::renderProperty($varName, 'MacInstallJavaHtml', $this->_MacInstallJavaHtml
				, $this->_MacInstallJavaHtmlDefaultValue);
				
			JavaScriptUtils::renderProperty($varName, 'MiscBrowsersInstallJavaHtml', $this->_miscBrowsersInstallJavaHtml
				, $this->_miscBrowsersInstallJavaHtmlDefaultValue);
				
			JavaScriptUtils::renderProperty($varName, 'JavaProgressHtml', $this->_javaProgressHtml
				, $this->_javaProgressHtmlDefaultValue);
		}
	}
}

?>