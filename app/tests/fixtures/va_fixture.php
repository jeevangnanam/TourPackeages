<?php
/* Va Fixture generated on: 2011-09-12 06:05:38 : 1315800338 */
class VaFixture extends CakeTestFixture {
	var $name = 'Va';

	var $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
		'name' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 200, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'location_id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'index'),
		'minimum' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 4, 'comment' => 'peoples count'),
		'maximum' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 6, 'comment' => 'peoples count'),
		'price' => array('type' => 'float', 'null' => false, 'default' => NULL),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1), 'location_id' => array('column' => 'location_id', 'unique' => 0)),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_unicode_ci', 'engine' => 'InnoDB')
	);

	var $records = array(
		array(
			'id' => 1,
			'name' => 'Lorem ipsum dolor sit amet',
			'location_id' => 1,
			'minimum' => 1,
			'maximum' => 1,
			'price' => 1
		),
	);
}
