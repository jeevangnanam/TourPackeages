<?php
/* PackageMetas Test cases generated on: 2012-09-10 15:03:58 : 1347269638*/
App::import('Controller', 'PackageMetas');

class TestPackageMetasController extends PackageMetasController {
	var $autoRender = false;

	function redirect($url, $status = null, $exit = true) {
		$this->redirectUrl = $url;
	}
}

class PackageMetasControllerTestCase extends CakeTestCase {
	var $fixtures = array('app.package_meta', 'app.package', 'app.location', 'app.hotel', 'app.hotel_meta', 'app.meal_plan', 'app.room_type', 'app.location_meta', 'app.va', 'app.package_category', 'app.hotels', 'app.package_availability', 'app.block', 'app.region', 'app.link', 'app.menu', 'app.setting', 'app.node', 'app.user', 'app.role', 'app.comment', 'app.meta', 'app.taxonomy', 'app.term', 'app.vocabulary', 'app.type', 'app.types_vocabulary', 'app.nodes_taxonomy', 'app.api');

	function startTest() {
		$this->PackageMetas =& new TestPackageMetasController();
		$this->PackageMetas->constructClasses();
	}

	function endTest() {
		unset($this->PackageMetas);
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