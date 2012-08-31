<?php
/* PackageGalleries Test cases generated on: 2011-09-27 06:52:24 : 1317099144*/
App::import('Controller', 'PackageGalleries');

class TestPackageGalleriesController extends PackageGalleriesController {
	var $autoRender = false;

	function redirect($url, $status = null, $exit = true) {
		$this->redirectUrl = $url;
	}
}

class PackageGalleriesControllerTestCase extends CakeTestCase {
	var $fixtures = array('app.package_gallery', 'app.package', 'app.location', 'app.hotel', 'app.hotel_meta', 'app.meal_plan', 'app.room_type', 'app.purchase', 'app.user', 'app.role', 'app.coupon', 'app.payment', 'app.location_meta', 'app.va', 'app.package_category', 'app.package_meta', 'app.block', 'app.region', 'app.link', 'app.menu', 'app.setting', 'app.node', 'app.comment', 'app.meta', 'app.taxonomy', 'app.term', 'app.vocabulary', 'app.type', 'app.types_vocabulary', 'app.nodes_taxonomy');

	function startTest() {
		$this->PackageGalleries =& new TestPackageGalleriesController();
		$this->PackageGalleries->constructClasses();
	}

	function endTest() {
		unset($this->PackageGalleries);
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
