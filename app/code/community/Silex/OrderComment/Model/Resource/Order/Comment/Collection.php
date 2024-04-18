<?php

/**
 * Class Silex_OrderComment_Model_Resource_Order_Comment_Collection
 *
 * Collection class for order comment
 */
class Silex_OrderComment_Model_Resource_Order_Comment_Collection extends Mage_Core_Model_Resource_Db_Collection_Abstract
{
    /**
     * Silex_OrderComment_Model_Resource_Order_Comment_Collection constructor
     *
     * @return void
     */
    public function _construct()
    {
        parent::_construct();
        $this->_init('silex_ordercomment/order_comment');
    }
}
