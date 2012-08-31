<?php
/* Aro Test cases generated on: 2011-09-06 06:57:05 : 1315285025*/
App::import('Model', 'Aro');

class AroTestCase extends CakeTestCase {
	var $fixtures = array('app.aro', 'app.aco', 'app.aros_aco');

	function startTest() {
		$this->Aro =& ClassRegistry::init('Aro');
	}

	function endTest() {
		unset($this->Aro);
		ClassRegistry::flush();
	}

}
