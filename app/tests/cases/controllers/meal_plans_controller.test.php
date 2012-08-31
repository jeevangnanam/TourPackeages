<?php
/* MealPlans Test cases generated on: 2011-09-06 13:12:01 : 1315307521*/
App::import('Controller', 'MealPlans');

class TestMealPlansController extends MealPlansController {
	var $autoRender = false;

	function redirect($url, $status = null, $exit = true) {
		$this->redirectUrl = $url;
	}
}

class MealPlansControllerTestCase extends CakeTestCase {
	var $fixtures = array('app.meal_plan', 'app.hotel', 'app.location', 'app.location_metum', 'app.va', 'app.hotel_metum', 'app.package', 'app.room_type', 'app.package_metum', 'app.purchase', 'app.block', 'app.region', 'app.link', 'app.menu', 'app.setting', 'app.node', 'app.user', 'app.role', 'app.comment', 'app.meta', 'app.taxonomy', 'app.term', 'app.vocabulary', 'app.type', 'app.types_vocabulary', 'app.nodes_taxonomy');

	function startTest() {
		$this->MealPlans =& new TestMealPlansController();
		$this->MealPlans->constructClasses();
	}

	function endTest() {
		unset($this->MealPlans);
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
