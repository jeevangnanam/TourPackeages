<?php
/* PackageAvailability Test cases generated on: 2011-10-06 11:58:05 : 1317895085*/
App::import('Model', 'PackageAvailability');

class PackageAvailabilityTestCase extends CakeTestCase {
	var $fixtures = array('app.package_availability', 'app.package', 'app.location', 'app.hotel', 'app.hotel_meta', 'app.meal_plan', 'app.room_type', 'app.location_meta', 'app.va', 'app.package_category', 'app.package_meta', 'app.package_param');

	function startTest() {
		$this->PackageAvailability =& ClassRegistry::init('PackageAvailability');
	}

	function endTest() {
		unset($this->PackageAvailability);
		ClassRegistry::flush();
	}

}
