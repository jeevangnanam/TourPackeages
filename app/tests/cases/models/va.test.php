<?php
/* Va Test cases generated on: 2011-09-12 06:05:38 : 1315800338*/
App::import('Model', 'Va');

class VaTestCase extends CakeTestCase {
	var $fixtures = array('app.va', 'app.location', 'app.hotel', 'app.hotel_meta', 'app.meal_plan', 'app.room_type', 'app.package', 'app.package_meta', 'app.purchase', 'app.location_meta');

	function startTest() {
		$this->Va =& ClassRegistry::init('Va');
	}

	function endTest() {
		unset($this->Va);
		ClassRegistry::flush();
	}

}
