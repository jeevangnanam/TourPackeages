<?php
/* Packageincludeitem Test cases generated on: 2012-09-04 17:08:11 : 1346758691*/
App::import('Model', 'Packageincludeitem');

class PackageincludeitemTestCase extends CakeTestCase {
	var $fixtures = array('app.packageincludeitem', 'app.packageinclude', 'app.package', 'app.location', 'app.hotel', 'app.hotel_meta', 'app.meal_plan', 'app.room_type', 'app.location_meta', 'app.va', 'app.package_category', 'app.hotels', 'app.package_meta', 'app.package_availability');

	function startTest() {
		$this->Packageincludeitem =& ClassRegistry::init('Packageincludeitem');
	}

	function endTest() {
		unset($this->Packageincludeitem);
		ClassRegistry::flush();
	}

}
?>