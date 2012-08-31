<?php
/* MealPlan Fixture generated on: 2011-09-06 13:11:20 : 1315307480 */
class MealPlanFixture extends CakeTestFixture {
	var $name = 'MealPlan';

	var $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
		'hotel_id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'index'),
		'room_type_id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'index'),
		'price' => array('type' => 'float', 'null' => false, 'default' => NULL),
		'image' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 50, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'info' => array('type' => 'text', 'null' => false, 'default' => NULL, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1), 'hotel_id' => array('column' => 'hotel_id', 'unique' => 0), 'room_type_id' => array('column' => 'room_type_id', 'unique' => 0)),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_unicode_ci', 'engine' => 'InnoDB')
	);

	var $records = array(
		array(
			'id' => 1,
			'hotel_id' => 1,
			'room_type_id' => 1,
			'price' => 1,
			'image' => 'Lorem ipsum dolor sit amet',
			'info' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.'
		),
	);
}
