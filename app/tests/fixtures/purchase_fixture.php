<?php
/* Purchase Fixture generated on: 2011-09-21 07:30:45 : 1316583045 */
class PurchaseFixture extends CakeTestFixture {
	var $name = 'Purchase';

	var $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
		'date' => array('type' => 'datetime', 'null' => false, 'default' => NULL),
		'user_id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'index'),
		'package_id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'index'),
		'hotel_id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'index'),
		'user_remarks' => array('type' => 'text', 'null' => false, 'default' => NULL, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'order_processed_by' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'index'),
		'order_approved_by' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'index'),
		'coupon_id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'index'),
		'admin_remarks' => array('type' => 'text', 'null' => false, 'default' => NULL, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1), 'user_id' => array('column' => 'user_id', 'unique' => 0), 'package_id' => array('column' => 'package_id', 'unique' => 0), 'order_processed_by' => array('column' => 'order_processed_by', 'unique' => 0), 'order_approved_by' => array('column' => 'order_approved_by', 'unique' => 0), 'coupon_id' => array('column' => 'coupon_id', 'unique' => 0), 'hotel_id' => array('column' => 'hotel_id', 'unique' => 0)),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_unicode_ci', 'engine' => 'InnoDB')
	);

	var $records = array(
		array(
			'id' => 1,
			'date' => '2011-09-21 07:30:45',
			'user_id' => 1,
			'package_id' => 1,
			'hotel_id' => 1,
			'user_remarks' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'order_processed_by' => 1,
			'order_approved_by' => 1,
			'coupon_id' => 1,
			'admin_remarks' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.'
		),
	);
}
