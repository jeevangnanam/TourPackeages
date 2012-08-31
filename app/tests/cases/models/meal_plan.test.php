<?php
/* MealPlan Test cases generated on: 2011-09-06 13:11:20 : 1315307480*/
App::import('Model', 'MealPlan');

class MealPlanTestCase extends CakeTestCase {
	var $fixtures = array('app.meal_plan', 'app.hotel', 'app.location', 'app.location_metum', 'app.va', 'app.hotel_metum', 'app.package', 'app.room_type', 'app.package_metum', 'app.purchase');

	function startTest() {
		$this->MealPlan =& ClassRegistry::init('MealPlan');
	}

	function endTest() {
		unset($this->MealPlan);
		ClassRegistry::flush();
	}

}
