<?php
/* PackageGallery Test cases generated on: 2011-09-27 06:52:03 : 1317099123*/
App::import('Model', 'PackageGallery');

class PackageGalleryTestCase extends CakeTestCase {
	var $fixtures = array('app.package_gallery', 'app.package', 'app.location', 'app.hotel', 'app.hotel_meta', 'app.meal_plan', 'app.room_type', 'app.purchase', 'app.user', 'app.role', 'app.coupon', 'app.payment', 'app.location_meta', 'app.va', 'app.package_category', 'app.package_meta');

	function startTest() {
		$this->PackageGallery =& ClassRegistry::init('PackageGallery');
	}

	function endTest() {
		unset($this->PackageGallery);
		ClassRegistry::flush();
	}

}
