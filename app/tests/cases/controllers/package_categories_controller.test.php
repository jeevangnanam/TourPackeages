<?php
/* PackageCategories Test cases generated on: 2011-09-19 07:28:42 : 1316410122*/
App::import('Controller', 'PackageCategories');

class TestPackageCategoriesController extends PackageCategoriesController {
	var $autoRender = false;

	function redirect($url, $status = null, $exit = true) {
		$this->redirectUrl = $url;
	}
}

class PackageCategoriesControllerTestCase extends CakeTestCase {
	var $fixtures = array('app.package_category', 'app.block', 'app.region', 'app.link', 'app.menu', 'app.setting', 'app.node', 'app.user', 'app.role', 'app.comment', 'app.meta', 'app.taxonomy', 'app.term', 'app.vocabulary', 'app.type', 'app.types_vocabulary', 'app.nodes_taxonomy', 'app.hotel', 'app.location', 'app.location_meta', 'app.va', 'app.hotel_meta', 'app.meal_plan', 'app.room_type', 'app.package', 'app.package_meta', 'app.purchase');

	function startTest() {
		$this->PackageCategories =& new TestPackageCategoriesController();
		$this->PackageCategories->constructClasses();
	}

	function endTest() {
		unset($this->PackageCategories);
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
