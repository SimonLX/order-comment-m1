<?php

/** @var Mage_Core_Model_Resource_Setup $installer */
$installer = $this;

$installer->startSetup();

$table = $installer->getConnection()
    ->newTable($installer->getTable('silex_ordercomment/order_comment'))
    ->addColumn('comment_id', Varien_Db_Ddl_Table::TYPE_INTEGER, null, array(
        'identity' => true,
        'unsigned' => true,
        'nullable' => false,
        'primary'  => true,
    ), 'Comment ID')
    ->addColumn('order_id', Varien_Db_Ddl_Table::TYPE_INTEGER, null, array(
        'unsigned' => true,
        'nullable' => false
    ), 'Order ID')
    ->addColumn('comment', Varien_Db_Ddl_Table::TYPE_TEXT, '64k', array(
        'nullable' => false
    ), 'Comment')
    ->setComment('Order Customer Comment Table');

$installer->getConnection()->createTable($table);

$installer->endSetup();
