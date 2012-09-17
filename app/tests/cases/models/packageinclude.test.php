<?php
/* Packageinclude Test cases generated on: 2012-09-04 17:04:23 : 1346758463*/
App::import('Model', 'Packageinclude');

class PackageincludeTestCase extends CakeTestCase {
	var $fixtures = array('app.packageinclude', 'app.package', 'app.location', 'app.hotel', 'app.hotel_meta', 'app.meal_plan', 'app.room_type', 'app.location_meta', 'app.va', 'app.package_category', 'app.hotels', 'app.package_meta', 'app.package_availability', 'app.packageincludeitem');

	function startTest() {
		$this->Packageinclude =& ClassRegistry::init('Packageinclude');
	}

	function endTest() {
		unset($this->Packageinclude);
		ClassRegistry::flush();
	}

}
?>