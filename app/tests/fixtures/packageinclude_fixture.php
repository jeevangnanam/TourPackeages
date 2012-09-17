<?php
/* Packageinclude Fixture generated on: 2012-09-04 17:04:23 : 1346758463 */
class PackageincludeFixture extends CakeTestFixture {
	var $name = 'Packageinclude';

	var $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
		'package_id' => array('type' => 'integer', 'null' => false, 'default' => NULL),
		'packageincludeitem_id' => array('type' => 'integer', 'null' => false, 'default' => NULL),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1)),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_unicode_ci', 'engine' => 'InnoDB')
	);

	var $records = array(
		array(
			'id' => 1,
			'package_id' => 1,
			'packageincludeitem_id' => 1
		),
	);
}
?>