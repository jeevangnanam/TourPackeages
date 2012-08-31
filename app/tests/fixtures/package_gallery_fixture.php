<?php
/* PackageGallery Fixture generated on: 2011-09-27 06:52:03 : 1317099123 */
class PackageGalleryFixture extends CakeTestFixture {
	var $name = 'PackageGallery';

	var $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
		'url' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 175, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'package_id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'index'),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1), 'package_id' => array('column' => 'package_id', 'unique' => 0)),
		'tableParameters' => array('charset' => 'latin1', 'collate' => 'latin1_swedish_ci', 'engine' => 'InnoDB')
	);

	var $records = array(
		array(
			'id' => 1,
			'url' => 'Lorem ipsum dolor sit amet',
			'package_id' => 1
		),
	);
}
