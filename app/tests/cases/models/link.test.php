<?php
/* Link Test cases generated on: 2011-11-03 05:32:28 : 1320294748*/
App::import('Model', 'Link');

class LinkTestCase extends CakeTestCase {
	var $fixtures = array('app.link', 'app.menu');

	function startTest() {
		$this->Link =& ClassRegistry::init('Link');
	}

	function endTest() {
		unset($this->Link);
		ClassRegistry::flush();
	}

}
