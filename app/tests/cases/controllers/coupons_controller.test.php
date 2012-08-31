<?php
/* Coupons Test cases generated on: 2011-09-21 06:55:11 : 1316580911*/
App::import('Controller', 'Coupons');

class TestCouponsController extends CouponsController {
	var $autoRender = false;

	function redirect($url, $status = null, $exit = true) {
		$this->redirectUrl = $url;
	}
}

class CouponsControllerTestCase extends CakeTestCase {
	var $fixtures = array('app.coupon', 'app.purchase', 'app.user', 'app.role', 'app.package', 'app.location', 'app.hotel', 'app.hotel_meta', 'app.meal_plan', 'app.room_type', 'app.location_meta', 'app.va', 'app.package_category', 'app.package_meta', 'app.payment', 'app.block', 'app.region', 'app.link', 'app.menu', 'app.setting', 'app.node', 'app.comment', 'app.meta', 'app.taxonomy', 'app.term', 'app.vocabulary', 'app.type', 'app.types_vocabulary', 'app.nodes_taxonomy');

	function startTest() {
		$this->Coupons =& new TestCouponsController();
		$this->Coupons->constructClasses();
	}

	function endTest() {
		unset($this->Coupons);
		ClassRegistry::flush();
	}

	function testIndex() {

	}

	function testView() {

	}

	function testAdd() {

	}

	function testEdit() {

	}

	function testDelete() {

	}

}
