<?php

/** @var Mage_Core_Model_Resource_Setup $installer */
$installer = $this;

$installer->startSetup();

$commentTableName = $installer->getTable('silex_ordercomment/order_comment');

$installer->getConnection()
    ->addColumn($commentTableName, 'quote_id', 'INT(10) unsigned COMMENT \'Quote ID\' AFTER `comment_id`');
$installer->getConnection()
    ->addForeignKey(
        $installer->getFkName($commentTableName, 'quote_id', $installer->getTable('sales/quote'), 'entity_id'),
        $commentTableName,
        'quote_id',
        $installer->getTable('sales/quote'),
        'entity_id'
    );

$installer->getConnection()->modifyColumn($commentTableName, 'order_id', 'INT(10) unsigned COMMENT \'Order ID\'');
$installer->getConnection()
    ->addForeignKey(
        $installer->getFkName($commentTableName, 'order_id', $installer->getTable('sales/order'), 'entity_id'),
        $commentTableName,
        'order_id',
        $installer->getTable('sales/order'),
        'entity_id'
    );

$installer->endSetup();
