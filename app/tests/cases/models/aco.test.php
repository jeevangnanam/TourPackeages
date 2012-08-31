<?php
/* Aco Test cases generated on: 2011-09-06 06:57:04 : 1315285024*/
App::import('Model', 'Aco');

class AcoTestCase extends CakeTestCase {
	var $fixtures = array('app.aco', 'app.aro', 'app.aros_aco');

	function startTest() {
		$this->Aco =& ClassRegistry::init('Aco');
	}

	function endTest() {
		unset($this->Aco);
		ClassRegistry::flush();
	}

}
