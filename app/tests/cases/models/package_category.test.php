<?php
/* PackageCategory Test cases generated on: 2011-09-19 07:27:53 : 1316410073*/
App::import('Model', 'PackageCategory');

class PackageCategoryTestCase extends CakeTestCase {
	var $fixtures = array('app.package_category');

	function startTest() {
		$this->PackageCategory =& ClassRegistry::init('PackageCategory');
	}

	function endTest() {
		unset($this->PackageCategory);
		ClassRegistry::flush();
	}

}
