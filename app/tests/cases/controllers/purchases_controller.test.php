<?php
/* Purchases Test cases generated on: 2011-09-21 07:37:56 : 1316583476*/
App::import('Controller', 'Purchases');

class TestPurchasesController extends PurchasesController {
	var $autoRender = false;

	function redirect($url, $status = null, $exit = true) {
		$this->redirectUrl = $url;
	}
}

class PurchasesControllerTestCase extends CakeTestCase {
	var $fixtures = array('app.purchase', 'app.user', 'app.role', 'app.package', 'app.location', 'app.hotel', 'app.hotel_meta', 'app.meal_plan', 'app.room_type', 'app.location_meta', 'app.va', 'app.package_category', 'app.package_meta', 'app.coupon', 'app.payment', 'app.block', 'app.region', 'app.link', 'app.menu', 'app.setting', 'app.node', 'app.comment', 'app.meta', 'app.taxonomy', 'app.term', 'app.vocabulary', 'app.type', 'app.types_vocabulary', 'app.nodes_taxonomy');

	function startTest() {
		$this->Purchases =& new TestPurchasesController();
		$this->Purchases->constructClasses();
	}

	function endTest() {
		unset($this->Purchases);
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
