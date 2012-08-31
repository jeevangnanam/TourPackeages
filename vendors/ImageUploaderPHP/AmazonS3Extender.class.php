<?php
require_once ('ImageUploader.class.php');
require_once ("FileSettings.class.php");

/**
 * @copyright  Aurigma Inc. 2008-2009 All rights reserved.
 * @version    1.0
 */
class AmazonS3Extender {

	function AmazonS3Extender($parent) {
		$this->_parent = $parent;

		$this->_policyExpiration = 3600;

		$this->_sourceFile = new FileSettings("SourceFile");
		$this->_thumbnail1 = new FileSettings("Thumbnail1");
		$this->_thumbnail2 = new FileSettings("Thumbnail2");
		$this->_thumbnail3 = new FileSettings("Thumbnail3");

		//register required javascript files
		$this->_parent->registerClientScripts(array("iuembed.js", "iuembed.AmazonS3.js"));
		//add this extender to extender collection
		$parent->addExtender($this);
	}

	function getAWSAcceccKeyId() {
		return $this->_AWSAccessKeyId;
	}

	function setAWSAcceccKeyId($value) {
		$this->_AWSAccessKeyId = $value;
	}

	function getSecretAccessKey() {
		return $this->_secretAccessKey;
	}

	function setSecretAccessKey($value) {
		$this->_secretAccessKey = $value;
	}

	function getBucket() {
		return $this->_bucket;
	}

	function setBucket($value) {
		$this->_bucket = $value;
	}

	function getBucketHostName() {
		return $this->_bucketHostName;
	}

	function setBucketHostName($value) {
		$this->_bucketHostName = $value;
	}

	function getPolicyExpiration() {
		return $this->_policyExpiration;
	}

	function setPolicyExpiration($value) {
		$this->_policyExpiration = $value;
	}

	function getSourceFile()
	{
		return $this->_sourceFile;
	}

	function getThumbnail1()
	{
		return $this->_thumbnail1;
	}

	function getThumbnail2()
	{
		return $this->_thumbnail2;
	}

	function getThumbnail3()
	{
		return $this->_thumbnail3;
	}

	function render() {

		//amazon s3 extender javascript init function name
		$funcName = $this->_parent->getId() . "_as3_InitWriter";

		echo "var " . $funcName . " = function(writer) {\n";

		echo "writer.removeParam(\"Action\");\n";
		echo "var as3 = new AmazonS3Extender(writer);\n";

		if (isset($this->_AWSAccessKeyId) && $this->_AWSAccessKeyId) {
		echo "as3.setAWSAccessKeyId(\"" . JavaScriptUtils::javaScriptEncode($this->_AWSAccessKeyId) . "\");\n";
		}

		if (isset($this->_bucket) && $this->_bucket) {
		echo "as3.setBucket(\"" . JavaScriptUtils::javaScriptEncode($this->_bucket) . "\");\n";
		}

		if (isset($this->_bucketHostName) && $this->_bucketHostName) {
			echo "as3.setBucketHostName(\"" . JavaScriptUtils::javaScriptEncode($this->_bucketHostName) . "\");\n";
		}


        if ($this->_parent->getUploadSourceFile()) {
        	$this->renderFileSettingsScript($this->getSourceFile());
        }

        if ($this->_parent->getUploadThumbnail1FitMode() != "Off") {
        	$this->renderFileSettingsScript($this->getThumbnail1());
        }

        if ($this->_parent->getUploadThumbnail2FitMode() != "Off") {
        	$this->renderFileSettingsScript($this->getThumbnail2());
        }

        if ($this->_parent->getUploadThumbnail3FitMode() != "Off") {
        	$this->renderFileSettingsScript($this->getThumbnail3());
        }

        echo "}\n";

        echo $funcName . "(" . $this->_parent->getJavaScriptWriterVariableName() . ");";

        echo "\n";
	}

	function renderFileSettingsScript($settings)
	{
		echo "var fileSettings = as3.get" . $settings->getName() . "();\n";
		echo "fileSettings.setAcl(\"" . JavaScriptUtils::javaScriptEncode($settings->getAcl()) . "\");\n";
		echo "fileSettings.setKey(\"" . JavaScriptUtils::javaScriptEncode($settings->getKey()) . "\");\n";

		//Policy and signature
		$policy = $this->constructPolicy($settings);

		//Step 1. Encode the policy using Base64.
		$policyB64 = base64_encode($policy);

		//Step 2. Get policy signature
		$signature = $this->amazon_hmac($policyB64);

		echo " fileSettings.setPolicy(\"" . $policyB64 . "\");\n";
		echo " fileSettings.setSignature(\"" . $signature . "\");\n";

		//Meta properties
		foreach ($settings->_metaProperties as $mp)
		{
			if ($mp instanceof CustomMetaProperty)
			{
				echo "	fileSettings.addProperty(\""
					. JavaScriptUtils::javaScriptEncode($mp->getName()) . "\", \""
					. JavaScriptUtils::javaScriptEncode($mp->getValue())
					. "\");\n";
			}

			if ($mp instanceof PredefinedMetaProperty)
			{
				echo "	fileSettings.addPredefinedProperty(\""
					. JavaScriptUtils::javaScriptEncode($mp->getName()) . "\", \""
					. JavaScriptUtils::javaScriptEncode($mp->getField())
					. "\");\n";
			}
		}
	}

	function constructPolicy($settings)
	{
		$policy = "";
		$expDate =gmdate("Y-m-d\TH:i:s.000\Z", time() + $this->_policyExpiration);

		$policy .= "{ \"expiration\": \"" . $expDate . "\"";
		$policy .= ", \"conditions\": [";
		$policy .= "	{\"acl\": \"" . JavaScriptUtils::javaScriptEncode($settings->getAcl()) . "\" }";
		$policy .= "	, {\"bucket\": \"" . JavaScriptUtils::javaScriptEncode($this->getBucket()) . "\" }";
		$policy .= "	, {\"success_action_status\": \"200\"}";

		$f = explode("\${filename}", JavaScriptUtils::javaScriptEncode($settings->getKey()));
		$policy .= "	, [\"starts-with\", \"\$key\", \"" . JavaScriptUtils::javaScriptEncode((count($f) > 1 ? $f[0] : "")) . "\"]";

		foreach ($settings->_metaProperties as $mp) {
			$policy .= "	, [\"starts-with\", \"\$x-amz-meta-" . JavaScriptUtils::javaScriptEncode(strtolower($mp->getName())) . "\", \"\"]";
		}

		$policy .= "]";
		$policy .= "}";

		return $policy;
	}

	// hmac-sha1 code START
	// hmac-sha1 function:  assuming key is global $aws_secret 40 bytes long
	// read more at http://en.wikipedia.org/wiki/HMAC
	function amazon_hmac($stringToSign)
	{
	    // helper function binsha1 for amazon_hmac (returns binary value of sha1 hash)
	    if (!function_exists('binsha1'))
	    {
	        if (version_compare(phpversion(), "5.0.0", ">=")) {
	            function binsha1($d) { return sha1($d, true); }
	        } else {
	            function binsha1($d) { return pack('H*', sha1($d)); }
	        }
	    }

	    $aws_secret = $this->_secretAccessKey;

	    if (strlen($aws_secret) == 40)
	        $aws_secret = $aws_secret.str_repeat(chr(0), 24);

	    $ipad = str_repeat(chr(0x36), 64);
	    $opad = str_repeat(chr(0x5c), 64);

	    $hmac = binsha1(($aws_secret^$opad).binsha1(($aws_secret^$ipad).$stringToSign));
	    return base64_encode($hmac);
	}
	// hmac-sha1 code END
}

?>