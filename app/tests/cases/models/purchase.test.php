<?php
/* Purchase Test cases generated on: 2011-09-21 07:30:46 : 1316583046*/
App::import('Model', 'Purchase');

class PurchaseTestCase extends CakeTestCase {
	var $fixtures = array('app.purchase', 'app.user', 'app.role', 'app.package', 'app.location', 'app.hotel', 'app.hotel_meta', 'app.meal_plan', 'app.room_type', 'app.location_meta', 'app.va', 'app.package_category', 'app.package_meta', 'app.coupon', 'app.payment');

	function startTest() {
		$this->Purchase =& ClassRegistry::init('Purchase');
	}

	function endTest() {
		unset($this->Purchase);
		ClassRegistry::flush();
	}

}
