<?php
/**
 * @copyright  Aurigma Inc. 2008-2009 All rights reserved.
 * @version    1.0
 */
class UploadedFiles {	
	/* ----------------------------------------------------------------------
	 * Non-public members
	 * ----------------------------------------------------------------------*/
	
	static $_files = null;
	static $_savedFiles = array();	
	static $_index = 0;	
	
	static $_directoryNotFoundException = 'The destination directory is not found.';
	static $_sourceFileNotUploadedException = 'Source file is not uploaded. In order to upload source file you should pass true value to ImageUploader.setUploadSourceFile method.';
	static $_incorrectPostException = 'It is not Image Uploader post...';
	static $_thumbnailWithIndexSmaller1Exception = 'Thumbnail index should be larger or equal 1.';
	static $_thumbnailNotUploadedException = 'Thumbnail with index %1$s doesn\'t exist. In order to upload it you should set ImageUploader.UploadThumbnail%1$sFitMode to other value then ThumbnailFitMode.Off.';
	static $_thumbnailWithIndexLarger3NotUploadedException = 'Thumbnail with index %1$s doesn\'t exist. In order to upload it you should set via scripting using ImageUploader.UploadThumbnailAddclient-side method. See reference for more info.';
	static $_fileAlreadySavedException = 'File is already saved. You can save file only once.';
	static $_metaPropertyNotFoundException = 'The \'%1$s\' property  you requested was not specified to upload in ImageUploader.Extract%2$s property. See reference for more info.';
	static $_noHashCodeException = 'Can\'t validate file as no hash was send. You should pass %1$s value to ImageUploader.setHashAlgorithm method for it.';
	static $_uploadException = 'The exception occured during upload processing.';	
	/*Constants from PHP docs*/
	static $_uploadErrIniSizeException = 'The uploaded file exceeds the upload_max_filesize directive in php.ini.';
	static $_uploadErrFormSizeException = 'The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the HTML form.';
	static $_uploadErrPartialException = 'The uploaded file was only partially uploaded.';
	static $_uploadErrNoFileException = 'No file was uploaded.';
	static $_uploadErrNoTmpDirException = 'Missing a temporary folder.';
	static $_uploadErrCantWriteException = 'Failed to write file to disk.';
	static $_uploadErrExtensionException = 'File upload stopped by extension.';
		
	/**
	 * This is method _throwException
	 *
	 * @param string $message 
	 */
	static function _throwException($message) {
		header('HTTP/1.0 500 Internal Server Error');						
		throw new Exception($message);
	}
	
	
	/**
	 * [to be supplied]
	 *
	 * @param string $key
	 */	
	static function _getPostFile($key) {
		if (array_key_exists($key, $_FILES)) {
			return $_FILES[$key];
		}
		else {
			return null;	
		}
	}	
	
	
	/* ----------------------------------------------------------------------
	 * Public members
	 * ----------------------------------------------------------------------*/
	
	/**
	 * This is method getUploadedFiles
	 *
	 * @return array
	 */
	static function getAll() {		
		if (UploadedFiles::$_files == null) {
			
			UploadedFiles::$_files = array();		
			
			// check if upload wasn't cancelled bug 0011198
			if (UploadedFiles::isRequestCompletelyReceived()) {
				$fileCount = (int)($_POST['FileCount']);
				
				for ($i = 1; $i <= $fileCount; $i++) {
					array_push(UploadedFiles::$_files, new UploadedFile($i));			
				}
			}
		}
				
		return UploadedFiles::$_files;
	}
	
	
	/**
	 * Indicates whether upload wasn't cancelled.
	 * @return boolean Returns false if upload was cancelled, otherwise returns true.
	 */
	static function isRequestCompletelyReceived() {
		return array_key_exists('FileCount', $_POST);
	}
	
	/**
	 * This is method fetchNext
	 *
	 * @return UploadedFile This is the return value description
	 */
	static function fetchNext() {
		$f = UploadedFiles::getAll();
		
		if (UploadedFiles::$_index >= count($f)) {
			return null;	
		}
		else {
			$z = UploadedFiles::$_index;
			UploadedFiles::$_index++;
			return $f[$z];
		}		
	}
	
	/**
	 * [to be supplied]
	 */
	static function moveFirst() {
		UploadedFiles::$_index = 0;
	}
}

class UploadedFile {
	/* ----------------------------------------------------------------------
	 * Non-public members
	 * ----------------------------------------------------------------------*/
		
	var $_fileIndex;
	var $_sourceFile;
	var $_thumbnails;

	/**
	 * [to be supplied]
	 * 
	 * @param int $fileIndex
	 */
	function UploadedFile($fileIndex) {
		$this->_fileIndex = $fileIndex;
		$this->_thumbnails = array();
	}


	/**
	 * This is method _getMetaProperty
	 *
	 * @param string $key This is a description
	 * @param string $type This is a description
	 * @return string This is the return value description
	 */
	function _getMetaProperty($key, $type) {
		$k = $key . '_' . $this->_fileIndex;
		
		if (array_key_exists($k, $_POST)) {		
			return $_POST[$k];		
		}
		else {
			//UploadedFiles::_throwException(vsprintf(UploadedFiles::$_metaPropertyNotFoundException, array($key, $type)));			
			return "";
		}		
	}
	

	/* ----------------------------------------------------------------------
	 * Public members
	 * ----------------------------------------------------------------------*/

	/**
	 * [to be supplied]
	 * 
	 * @return int
	 */
	function getFileIndex() {
		return $this->_fileIndex;
	}


	/**
	 * [to be supplied]
	 * 
	 * @return int
	 */
	function getPackageIndex() {
		return (int)($_POST['PackageIndex']);
	}


	/**
	 * [to be supplied]
	 * 
	 * @return int
	 */
	function getPackageCount() {
		return (int)($_POST['PackageCount']);
	}


	/**
	 * [to be supplied]
	 * 
	 * @return string
	 */
	function getPackageGuid() {
		return $_POST['PackageGuid'];
	}


	/**
	 * [to be supplied]
	 * 
	 * @return int
	 */
	function getFileCount() {
		return (int)($_POST['FileCount']);
	}


	/**
	 * [to be supplied]
	 * 
	 * @return bool
	 */
	function getFirstUploaded() {
		return $this->getPackageIndex() == 0 && $this->_fileIndex == 1;
	} 


	/**
	 * [to be supplied]
	 * 
	 * @return SourceFileInfo
	 */
	function getSourceFile() {
		if ($this->_sourceFile == null) {
			$this->_sourceFile = new SourceFileInfo($this, UploadedFiles::_getPostFile('SourceFile_' . $this->_fileIndex));
		}
		return $this->_sourceFile;
	}


	/**
	 * [to be supplied]
	 * 
	 * @param int $index
	 * @return ThumbnailInfo
	 */
	function getThumbnail($index) {
		if ($index < 1) {
			UploadedFiles::_throwException(UploadedFiles::$_thumbnailWithIndexSmaller1Exception);
		}

		$f = UploadedFiles::_getPostFile('Thumbnail' . $index . '_' . $this->_fileIndex);

		if ($f == null) {
			if ($index <= 3) {
				$mes = vsprintf(UploadedFiles::$_thumbnailNotUploadedException, $index);
			}
			else {
				$mes = vsprintf(UploadedFiles::$_thumbnailWithIndexLarger3NotUploadedException, $index);
			}

			UploadedFiles::_throwException($mes);
		}

		if (array_key_exists($index, $this->_thumbnails)) { 
			return $this->_thumbnails[$index];
		}

		$info = new ThumbnailInfo($this, $f, $index);
		$this->_thumbnails[$index] = $info;

		return $info;
	}


	/**
	 * [to be supplied]
	 * 
	 * @return int
	 */				
	function getAngle() {
		return (int)($_POST['Angle_' . $this->_fileIndex]);
	}


	/**
	 * [to be supplied]
	 * 
	 * @return string
	 */
	function getDescription() {
		return $_POST['Description_' . $this->_fileIndex];
	}


	/**
	 * [to be supplied]
	 * 
	 * @param string $key This is a description
	 * @return string
	 */
	function getExif($key) {
		return $this->_getMetaProperty($key, 'Exif');
	}


	/**
	 * [to be supplied]
	 * 
	 * @param string $key This is a description* 
	 * @return string
	 */
	function getIptc($key) {
		return $this->_getMetaProperty($key, 'Iptc');
	}
}
	

abstract class BaseFileInfo {
	/* ----------------------------------------------------------------------
	 * Non-public members
	 * ----------------------------------------------------------------------*/	
	var $_parent;
	var $_postedFile;

	/**
	 * [to be supplied]
	 * 
	 * @param UploadedFile $parent
	 * @param object $postedFile
	 */
	function BaseFileInfo($parent, $postedFile) {
		$this->_parent = $parent;
		$this->_postedFile = $postedFile;
	}


	/**
	 * [to be supplied]
	 * 
	 * @return bool
	 */
	function _checkWhetherUploaded() {
		if ($this->_postedFile == null) {
			UploadedFiles::_throwException($this->_getFileNotUploadedExceptionText());
		}
		
		$e = $this->_postedFile['error'];
				
		if ($e == 0) {
			return;	
		}

		switch ($e) {
			case 1:
				$m = UploadedFiles::$_uploadErrIniSizeException;
				break;
			case 2:
				$m = UploadedFiles::$_uploadErrFormSizeException;
				break;
			case 3:
				$m = UploadedFiles::$_uploadErrPartialException;
				break;
			case 4:
				$m = UploadedFiles::$_uploadErrNoFileException;
				break;
			case 6:
				$m = UploadedFiles::$_uploadErrNoTmpDirException;
				break;
			case 7:
				$m = UploadedFiles::$_uploadErrCantWriteException;
				break;
			case 8:
				$m = UploadedFiles::$_uploadErrExtensionException;
				break;
			default:
				$m = '';
		}
		
		UploadedFiles::_throwException(UploadedFiles::$_uploadException	.' ' . $m);	
	}

	/**
	 * [to be supplied]
	 * 
	 * @return string
	 */
	abstract function _getFileNotUploadedExceptionText();
	

	/* ----------------------------------------------------------------------
	 * Non-public members
	 * ----------------------------------------------------------------------*/

	/**
	 * [to be supplied]
	 * 
	 * @return int
	 */
	abstract function getFileSize();

	
	/**
	 * [to be supplied]
	 * 
	 * @return int
	 */
	abstract function getWidth();


	/**
	 * [to be supplied]
	 * 
	 * @return int
	 */
	abstract function getHeight();


	/**
	 * [to be supplied]
	 * 
	 * @return object
	 */
	function getPostedFile() {
		$this->_checkWhetherUploaded();			
		return $this->_postedFile;
	}


	/**
	 * [to be supplied]
	 * 
	 * @return int
	 */
	function getContentLength() {
		$this->_checkWhetherUploaded();
		return $this->_postedFile['size'];
	}


	/**
	 * [to be supplied]
	 * 
	 * @return string
	 */
	function getContentType() {
		$this->_checkWhetherUploaded();
		return $this->_postedFile['type'];
	}


	/**
	 * [to be supplied]
	 * 
	 * @return string
	 */
	function getFileName() {
		$this->_checkWhetherUploaded();
		return basename($this->_postedFile['name']);
	}


	/**
	 * [to be supplied]
	 * 
	 * @return string
	 */
	function getRelativeFilePath() {
		$this->_checkWhetherUploaded();
		return $this->_postedFile['name'];
	}
	
	/**
	 * [to be supplied]
	 * 
	 * @return string
	 */ 
	function getTempFileName() {
		$this->_checkWhetherUploaded();
		return $this->_postedFile['tmp_name'];		
	}
	
	
	/**
	 * [to be supplied]
	 * 
	 * @param string $dirPath
	 * @return bool
	 */
	function getSafeFileName($dirPath) {
		$this->_checkWhetherUploaded();
		
		if (!file_exists($dirPath)) {
			UploadedFiles::_throwException(UploadedFiles::$_directoryNotFoundException, $dirPath);
		}
		
		$fileName = basename($this->getFileName());
		
		$info = pathinfo($fileName);
		
		$baseFileName = $info['filename'];
		$ext = $info['extension'];
		if ($ext != "") {
			$ext = "." . $ext;	
		}
		
		$i = 1;
		
		while (file_exists($dirPath . "/" . $fileName)) {
			$fileName = $baseFileName . '_' . $i . $ext;
			$i++;
		}
		
		return $fileName;
	}
		
	
	/**
	 * [to be supplied]
	 * 
	 * @param string $filename
	 */
	function save($filename) {
		$this->_checkWhetherUploaded();
				
		if (array_key_exists($this->_postedFile['tmp_name'], UploadedFiles::$_savedFiles)) {
			UploadedFiles::_throwException(UploadedFiles::$_fileAlreadySavedException);
		}
		
		UploadedFiles::$_savedFiles[$this->_postedFile['tmp_name']] = 1;
		move_uploaded_file($this->_postedFile['tmp_name'], $filename);		
	}
	
	
	/**
	 * [to be supplied]
	 * 
	 * @param string $dirPath
	 * @param bool $renameConflicted
	 */
	function saveToFolder($dirPath, $renameConflicted = false) {
		$this->_checkWhetherUploaded();
		
		if (!file_exists($dirPath)) {
			UploadedFiles::_throwException(UploadedFiles::$_directoryNotFoundException, $dirPath);
		}
		
		$fileName = $renameConflicted ? $this->getSafeFileName($dirPath) : $this->getFileName();
		
		$this->save($dirPath . "/" . $fileName);
	}	
}


class SourceFileInfo extends BaseFileInfo {
	/* ----------------------------------------------------------------------
	 * Non-public members
	 * ----------------------------------------------------------------------*/
	
	/**
	 * [to be supplied]
	 * 
	 * @param UploadedFile $parent
	 * @param object $postedFile
	 */
	function SourceFileInfo($parent, $postedFile) {
		parent::BaseFileInfo($parent, $postedFile);
	}		
	
	
	/**
	 * This is method _parseExifDate
	 *
	 * @param striing $date This is a description
	 * @return DateTime This is the return value description
	 */
	function _parseExifDate($date) {
		for ($i = 0; $i < 2; $i++) {
			$date[strpos($date, ':')] = '-';
		}
		
		return new DateTime($date);		
	}
	
	
	/**
	 * [to be supplied]
	 * 
	 * @param string $algorithm
	 * @return $string
	 */
	function _getHashCode($algorithm) {
		$k = 'HashCode' . $algorithm . '_' . $this->_parent->_fileIndex;
		
		if (!array_key_exists($k, $_POST)) {
			UploadedFiles::_throwException(vsprintf(UploadedFiles::$_noHashCodeException, $algorithm));
		} 		
		
		return $_POST[$k];
	}		
	
	
	/**
	 * [to be supplied]
	 * 
	 * @return string
	 */
	function _getFileNotUploadedExceptionText() {
		return UploadedFiles::$_sourceFileNotUploadedException;
	}	

	
	/* ----------------------------------------------------------------------
	 * Public members
	 * ----------------------------------------------------------------------*/	

	/**
	 * [to be supplied]
	 * 
	 * @return int
	 */
	function getFileSize() {
		return (int)($_POST['SourceFileSize_' . $this->_parent->_fileIndex]);
	}


	/**
	 * [to be supplied]
	 * 
	 * @return int
	 */
	function getWidth() {
		return (int)($_POST['Width_' . $this->_parent->_fileIndex]);
	}


	/**
	 * [to be supplied]
	 * 
	 * @return int
	 */
	function getHeight() {
		return (int)($_POST['Height_' . $this->_parent->_fileIndex]);
	}


	/**
	 * [to be supplied]
	 * 
	 * @return DateTime
	 */
	function getCreatedDateTime() {
		return $this->_parseExifDate($_POST['SourceFileCreatedDateTime_' . $this->_parent->_fileIndex]);
	}


	/**
	 * [to be supplied]
	 * 
	 * @return DateTime
	 */
	function getModifiedDateTime() {
		return $this->_parseExifDate($_POST['SourceFileLastModifiedDateTime_' . $this->_parent->_fileIndex]);
	}


	/**
	 * [to be supplied]
	 * 
	 * @return float
	 */
	function getHorizontalResolution() {
		return (float)($_POST['HorizontalResolution_' . $this->_parent->_fileIndex]);
	}


	/**
	 * [to be supplied]
	 * 
	 * @return float
	 */
	function getVerticalResolution() {
		return (float)($_POST['VerticalResolution_' . $this->_parent->_fileIndex]);
	}


	/**
	 * [to be supplied]
	 * 
	 * @return string
	 */
	function getHashCodeSHA() {
		return $this->_getHashCode('SHA');		
	}


	/**
	 * [to be supplied]
	 * 
	 * @return string
	 */
	function getHashCodeMD2() {
		return $this->_getHashCode('MD2');
	}


	/**
	 * [to be supplied]
	 * 
	 * @return string
	 */
	function getHashCodeMD5() {
		return $this->_getHashCode('MD5');
	}


	/**
	 * [to be supplied]
	 * 
	 * @return bool
	 */
	function validateHashCodeSHA() {
		$postedSHAHash = $this->getHashCodeSHA();		
			
		//Compute SHA1 hash. Since Image Uploader sends the hash value encoded with Base 64 algorithm
		//the result should be also encoded with Base 64.
		$actualSHAHash = base64_encode(pack("H*",sha1_file($this->_postedFile['tmp_name'])));
		
		//If the result differs from the uploaded one, the upload should be interpreted as corrupted.
		return $postedSHAHash == $actualSHAHash;
	}


	/**
	 * [to be supplied]
	 * 
	 * @return bool
	 */
	function validateHashCodeMD5() {
		$postedMD5Hash = $this->getHashCodeMD5();
				
		//Compute MD5 hash. Since Image Uploader sends the hash value encoded with Base 64 algorithm
		//the result should be also encoded wi	th Base 64.
		$actualMD5Hash = base64_encode(pack("H*",md5_file($this->_postedFile['tmp_name'])));
		
		//If the result differs from the uploaded one, the upload should be interpreted as corrupted.
		return $postedMD5Hash == $actualMD5Hash;
	}
}
	
	
class ThumbnailInfo extends BaseFileInfo {
	/* ----------------------------------------------------------------------
	 * Non-public members
	 * ----------------------------------------------------------------------*/	
	
	var $_index;

	/**
	 * [to be supplied]
	 * 
	 * @param UploadedFile $parent
	 * @param object $postedFile
	 * @param int $thumbnailIndex
	 */
	function ThumbnailInfo($parent, $postedFile, $thumbnailIndex) {
		parent::BaseFileInfo($parent, $postedFile);		
		$this->_index = $thumbnailIndex;
	}


	/**
	 * [to be supplied]
	 * 
	 * @return string
	 */
	function _getFileNotUploadedExceptionText() {
		return vsprintf(Resources::thumbnailNotUploadedException, $this->_index);
	}


	/* ----------------------------------------------------------------------
	 * Public members
	 * ----------------------------------------------------------------------*/		

	/**
	 * [to be supplied]
	 * 
	 * @return int
	 */
	function getFileSize() {
		return (int)($_POST['Thumbnail' . $this->_index . 'FileSize_' . $this->_parent->_fileIndex]);
	}


	/**
	 * [to be supplied]
	 * 
	 * @return int
	 */
	function getWidth() {
		return (int)($_POST['Thumbnail' . $this->_index . 'Width_' . $this->_parent->_fileIndex]);
	}


	/**
	 * [to be supplied]
	 * 
	 * @return int
	 */
	function getHeight() {
		return (int)($_POST['Thumbnail' . $this->_index . 'Height_' . $this->_parent->_fileIndex]);
	}


	/**
	 * [to be supplied]
	 * 
	 * @return string
	 */
	function getCompressionMode() {
		return $_POST['UploadFile' . $this->_index . 'CompressionMode_' . $this->_parent->_fileIndex];
	}


	/**
	 * [to be supplied]
	 * 
	 * @return bool
	 */
	function getSucceeded() {
		return (bool)($_POST['Thumbnail' . $this->_index . 'Succeeded_' . $this->_parent->_fileIndex]);
	}


	/**
	 * [to be supplied]
	 * 
	 * @return int
	 */
	function getIndex() {
		return $this->_index;
	}
}
?>