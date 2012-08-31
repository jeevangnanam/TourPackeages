<?php
/* Location Test cases generated on: 2011-09-06 08:33:03 : 1315290783*/
App::import('Model', 'Location');

class LocationTestCase extends CakeTestCase {
	var $fixtures = array('app.location', 'app.hotel', 'app.hotel_metum', 'app.meal_plan', 'app.package', 'app.room_type', 'app.package_metum', 'app.purchase', 'app.location_metum', 'app.va');

	function startTest() {
		$this->Location =& ClassRegistry::init('Location');
	}

	function endTest() {
		unset($this->Location);
		ClassRegistry::flush();
	}

}
