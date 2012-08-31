<?php
/* HotelMeta Test cases generated on: 2011-09-07 13:10:42 : 1315393842*/
App::import('Model', 'HotelMeta');

class HotelMetaTestCase extends CakeTestCase {
	var $fixtures = array('app.hotel_meta', 'app.hotel', 'app.location', 'app.location_metum', 'app.va', 'app.meal_plan', 'app.room_type', 'app.package', 'app.package_metum', 'app.purchase');

	function startTest() {
		$this->HotelMeta =& ClassRegistry::init('HotelMeta');
	}

	function endTest() {
		unset($this->HotelMeta);
		ClassRegistry::flush();
	}

}
