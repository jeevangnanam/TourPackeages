<?php
/* Coupon Test cases generated on: 2011-09-21 06:54:50 : 1316580890*/
App::import('Model', 'Coupon');

class CouponTestCase extends CakeTestCase {
	var $fixtures = array('app.coupon', 'app.purchase', 'app.user', 'app.role', 'app.package', 'app.location', 'app.hotel', 'app.hotel_meta', 'app.meal_plan', 'app.room_type', 'app.location_meta', 'app.va', 'app.package_category', 'app.package_meta', 'app.payment');

	function startTest() {
		$this->Coupon =& ClassRegistry::init('Coupon');
	}

	function endTest() {
		unset($this->Coupon);
		ClassRegistry::flush();
	}

}
