<?php
/* Payments Test cases generated on: 2011-09-21 09:07:36 : 1316588856*/
App::import('Controller', 'Payments');

class TestPaymentsController extends PaymentsController {
	var $autoRender = false;

	function redirect($url, $status = null, $exit = true) {
		$this->redirectUrl = $url;
	}
}

class PaymentsControllerTestCase extends CakeTestCase {
	var $fixtures = array('app.payment', 'app.user', 'app.role', 'app.purchase', 'app.package', 'app.location', 'app.hotel', 'app.hotel_meta', 'app.meal_plan', 'app.room_type', 'app.location_meta', 'app.va', 'app.package_category', 'app.package_meta', 'app.coupon', 'app.block', 'app.region', 'app.link', 'app.menu', 'app.setting', 'app.node', 'app.comment', 'app.meta', 'app.taxonomy', 'app.term', 'app.vocabulary', 'app.type', 'app.types_vocabulary', 'app.nodes_taxonomy');

	function startTest() {
		$this->Payments =& new TestPaymentsController();
		$this->Payments->constructClasses();
	}

	function endTest() {
		unset($this->Payments);
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
