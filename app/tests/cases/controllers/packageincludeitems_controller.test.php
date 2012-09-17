<?php
/* Packageincludeitems Test cases generated on: 2012-09-04 17:09:18 : 1346758758*/
App::import('Controller', 'Packageincludeitems');

class TestPackageincludeitemsController extends PackageincludeitemsController {
	var $autoRender = false;

	function redirect($url, $status = null, $exit = true) {
		$this->redirectUrl = $url;
	}
}

class PackageincludeitemsControllerTestCase extends CakeTestCase {
	var $fixtures = array('app.packageincludeitem', 'app.packageinclude', 'app.package', 'app.location', 'app.hotel', 'app.hotel_meta', 'app.meal_plan', 'app.room_type', 'app.location_meta', 'app.va', 'app.package_category', 'app.hotels', 'app.package_meta', 'app.package_availability', 'app.block', 'app.region', 'app.link', 'app.menu', 'app.setting', 'app.node', 'app.user', 'app.role', 'app.comment', 'app.meta', 'app.taxonomy', 'app.term', 'app.vocabulary', 'app.type', 'app.types_vocabulary', 'app.nodes_taxonomy', 'app.api');

	function startTest() {
		$this->Packageincludeitems =& new TestPackageincludeitemsController();
		$this->Packageincludeitems->constructClasses();
	}

	function endTest() {
		unset($this->Packageincludeitems);
		ClassRegistry::flush();
	}

	function testAdminIndex() {

	}

	function testAdminView() {

	}

	function testAdminAdd() {

	}

	function testAdminEdit() {

	}

	function testAdminDelete() {

	}

}
?>