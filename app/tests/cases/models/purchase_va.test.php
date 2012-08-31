<?php
/* PurchaseVa Test cases generated on: 2011-10-04 06:21:20 : 1317702080*/
App::import('Model', 'PurchaseVa');

class PurchaseVaTestCase extends CakeTestCase {
	var $fixtures = array('app.purchase_va', 'app.vas', 'app.purchase', 'app.user', 'app.role', 'app.package', 'app.location', 'app.hotel', 'app.hotel_meta', 'app.meal_plan', 'app.room_type', 'app.location_meta', 'app.va', 'app.package_category', 'app.package_meta', 'app.coupon', 'app.payment');

	function startTest() {
		$this->PurchaseVa =& ClassRegistry::init('PurchaseVa');
	}

	function endTest() {
		unset($this->PurchaseVa);
		ClassRegistry::flush();
	}

}
