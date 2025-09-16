<?php

/** @var Mage_Core_Model_Resource_Setup $installer */
$installer = $this;

$installer->startSetup();

$commentTableName = $installer->getTable('silex_ordercomment/order_comment');

$installer->getConnection()
    ->dropForeignKey(
        $commentTableName,
        $installer->getFkName($commentTableName, 'quote_id', $installer->getTable('sales/quote'), 'entity_id')
    )->dropForeignKey(
        $commentTableName,
        $installer->getFkName($commentTableName, 'order_id', $installer->getTable('sales/order'), 'entity_id')
    );

$installer->endSetup();
