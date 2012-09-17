<?php
/* Packageincludes Test cases generated on: 2012-09-04 17:05:10 : 1346758510*/
App::import('Controller', 'Packageincludes');

class TestPackageincludesController extends PackageincludesController {
	var $autoRender = false;

	function redirect($url, $status = null, $exit = true) {
		$this->redirectUrl = $url;
	}
}

class PackageincludesControllerTestCase extends CakeTestCase {
	var $fixtures = array('app.packageinclude', 'app.package', 'app.location', 'app.hotel', 'app.hotel_meta', 'app.meal_plan', 'app.room_type', 'app.location_meta', 'app.va', 'app.package_category', 'app.hotels', 'app.package_meta', 'app.package_availability', 'app.packageincludeitem', 'app.block', 'app.region', 'app.link', 'app.menu', 'app.setting', 'app.node', 'app.user', 'app.role', 'app.comment', 'app.meta', 'app.taxonomy', 'app.term', 'app.vocabulary', 'app.type', 'app.types_vocabulary', 'app.nodes_taxonomy', 'app.api');

	function startTest() {
		$this->Packageincludes =& new TestPackageincludesController();
		$this->Packageincludes->constructClasses();
	}

	function endTest() {
		unset($this->Packageincludes);
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