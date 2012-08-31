<?php
/* RoomTypes Test cases generated on: 2011-09-07 08:42:46 : 1315377766*/
App::import('Controller', 'RoomTypes');

class TestRoomTypesController extends RoomTypesController {
	var $autoRender = false;

	function redirect($url, $status = null, $exit = true) {
		$this->redirectUrl = $url;
	}
}

class RoomTypesControllerTestCase extends CakeTestCase {
	var $fixtures = array('app.room_type', 'app.hotel', 'app.location', 'app.location_metum', 'app.va', 'app.hotel_metum', 'app.meal_plan', 'app.package', 'app.package_metum', 'app.purchase', 'app.block', 'app.region', 'app.link', 'app.menu', 'app.setting', 'app.node', 'app.user', 'app.role', 'app.comment', 'app.meta', 'app.taxonomy', 'app.term', 'app.vocabulary', 'app.type', 'app.types_vocabulary', 'app.nodes_taxonomy');

	function startTest() {
		$this->RoomTypes =& new TestRoomTypesController();
		$this->RoomTypes->constructClasses();
	}

	function endTest() {
		unset($this->RoomTypes);
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
