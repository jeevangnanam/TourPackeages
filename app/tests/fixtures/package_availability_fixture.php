<?php
/* PackageAvailability Fixture generated on: 2011-10-06 11:58:05 : 1317895085 */
class PackageAvailabilityFixture extends CakeTestFixture {
	var $name = 'PackageAvailability';

	var $fields = array(
		'package_id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'index'),
		'start_date' => array('type' => 'date', 'null' => false, 'default' => NULL),
		'end_date' => array('type' => 'date', 'null' => false, 'default' => NULL),
		'indexes' => array('package_id' => array('column' => 'package_id', 'unique' => 0)),
		'tableParameters' => array('charset' => 'utf8mb4', 'collate' => 'utf8mb4_unicode_ci', 'engine' => 'InnoDB')
	);

	var $records = array(
		array(
			'package_id' => 1,
			'start_date' => '2011-10-06',
			'end_date' => '2011-10-06'
		),
	);
}
