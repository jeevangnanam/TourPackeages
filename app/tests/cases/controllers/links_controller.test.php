<?php
/* Links Test cases generated on: 2011-11-03 05:32:46 : 1320294766*/
App::import('Controller', 'Links');

class TestLinksController extends LinksController {
	var $autoRender = false;

	function redirect($url, $status = null, $exit = true) {
		$this->redirectUrl = $url;
	}
}

class LinksControllerTestCase extends CakeTestCase {
	var $fixtures = array('app.link', 'app.menu', 'app.block', 'app.region', 'app.setting', 'app.node', 'app.user', 'app.role', 'app.comment', 'app.meta', 'app.taxonomy', 'app.term', 'app.vocabulary', 'app.type', 'app.types_vocabulary', 'app.nodes_taxonomy', 'app.hotel', 'app.location', 'app.location_meta', 'app.va', 'app.hotel_meta', 'app.meal_plan', 'app.room_type', 'app.package', 'app.package_category', 'app.hotels', 'app.package_meta', 'app.package_availability');

	function startTest() {
		$this->Links =& new TestLinksController();
		$this->Links->constructClasses();
	}

	function endTest() {
		unset($this->Links);
		ClassRegistry::flush();
	}

}
