<?php
/* Block Test cases generated on: 2011-09-06 06:57:08 : 1315285028*/
App::import('Model', 'Block');

class BlockTestCase extends CakeTestCase {
	var $fixtures = array('app.block', 'app.region');

	function startTest() {
		$this->Block =& ClassRegistry::init('Block');
	}

	function endTest() {
		unset($this->Block);
		ClassRegistry::flush();
	}

}
