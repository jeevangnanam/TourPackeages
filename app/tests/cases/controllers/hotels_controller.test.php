<?php
/* Hotels Test cases generated on: 2011-09-06 07:02:04 : 1315285324*/
App::import('Controller', 'Hotels');

class TestHotelsController extends HotelsController {
	var $autoRender = false;

	function redirect($url, $status = null, $exit = true) {
		$this->redirectUrl = $url;
	}
}

class HotelsControllerTestCase extends CakeTestCase {
	var $fixtures = array('app.hotel', 'app.location', 'app.location_metum', 'app.va', 'app.hotel_metum', 'app.meal_plan', 'app.package', 'app.purchase', 'app.room_type', 'app.block', 'app.region', 'app.link', 'app.menu', 'app.setting', 'app.node', 'app.user', 'app.role', 'app.comment', 'app.meta', 'app.taxonomy', 'app.term', 'app.vocabulary', 'app.type', 'app.types_vocabulary', 'app.nodes_taxonomy');

	function startTest() {
		$this->Hotels =& new TestHotelsController();
		$this->Hotels->constructClasses();
	}

	function endTest() {
		unset($this->Hotels);
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
