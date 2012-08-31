<?php
/* RoomType Test cases generated on: 2011-09-07 08:42:15 : 1315377735*/
App::import('Model', 'RoomType');

class RoomTypeTestCase extends CakeTestCase {
	var $fixtures = array('app.room_type', 'app.hotel', 'app.location', 'app.location_metum', 'app.va', 'app.hotel_metum', 'app.meal_plan', 'app.package', 'app.package_metum', 'app.purchase');

	function startTest() {
		$this->RoomType =& ClassRegistry::init('RoomType');
	}

	function endTest() {
		unset($this->RoomType);
		ClassRegistry::flush();
	}

}
