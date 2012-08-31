<?php
/* Payment Fixture generated on: 2011-09-21 09:05:17 : 1316588717 */
class PaymentFixture extends CakeTestFixture {
	var $name = 'Payment';

	var $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
		'user_id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'index'),
		'purchase_id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'index'),
		'total_amount' => array('type' => 'float', 'null' => false, 'default' => NULL),
		'merchant_reference' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 50, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'status' => array('type' => 'text', 'null' => false, 'default' => NULL, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'authorized_admin' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'index'),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1), 'authorized_admin' => array('column' => 'authorized_admin', 'unique' => 0), 'purchase_id' => array('column' => 'purchase_id', 'unique' => 0), 'user_id' => array('column' => 'user_id', 'unique' => 0)),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_unicode_ci', 'engine' => 'InnoDB')
	);

	var $records = array(
		array(
			'id' => 1,
			'user_id' => 1,
			'purchase_id' => 1,
			'total_amount' => 1,
			'merchant_reference' => 'Lorem ipsum dolor sit amet',
			'status' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'authorized_admin' => 1
		),
	);
}
