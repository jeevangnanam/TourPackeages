<?php
/* ArosAco Test cases generated on: 2011-09-06 06:57:07 : 1315285027*/
App::import('Model', 'ArosAco');

class ArosAcoTestCase extends CakeTestCase {
	var $fixtures = array('app.aros_aco', 'app.aro', 'app.aco');

	function startTest() {
		$this->ArosAco =& ClassRegistry::init('ArosAco');
	}

	function endTest() {
		unset($this->ArosAco);
		ClassRegistry::flush();
	}

}
