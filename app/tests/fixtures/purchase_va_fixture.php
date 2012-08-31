<?php
/* PurchaseVa Fixture generated on: 2011-10-04 06:21:20 : 1317702080 */
class PurchaseVaFixture extends CakeTestFixture {
	var $name = 'PurchaseVa';

	var $fields = array(
		'vas_id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'index'),
		'purchase_id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'index'),
		'indexes' => array('purchase_id' => array('column' => 'purchase_id', 'unique' => 0), 'vas_id' => array('column' => 'vas_id', 'unique' => 0)),
		'tableParameters' => array('charset' => 'utf8mb4', 'collate' => 'utf8mb4_unicode_ci', 'engine' => 'InnoDB')
	);

	var $records = array(
		array(
			'vas_id' => 1,
			'purchase_id' => 1
		),
	);
}
