<?php
/* Packages Test cases generated on: 2011-09-06 07:09:28 : 1315285768*/
App::import('Controller', 'Packages');

class TestPackagesController extends PackagesController {
	var $autoRender = false;

	function redirect($url, $status = null, $exit = true) {
		$this->redirectUrl = $url;
	}
}

class PackagesControllerTestCase extends CakeTestCase {
	var $fixtures = array('app.package', 'app.location', 'app.hotel', 'app.hotel_metum', 'app.meal_plan', 'app.purchase', 'app.room_type', 'app.location_metum', 'app.va', 'app.package_metum', 'app.block', 'app.region', 'app.link', 'app.menu', 'app.setting', 'app.node', 'app.user', 'app.role', 'app.comment', 'app.meta', 'app.taxonomy', 'app.term', 'app.vocabulary', 'app.type', 'app.types_vocabulary', 'app.nodes_taxonomy');

	function startTest() {
		$this->Packages =& new TestPackagesController();
		$this->Packages->constructClasses();
	}

	function endTest() {
		unset($this->Packages);
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
