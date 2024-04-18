<?php

/**
 * Class Silex_OrderComment_Model_Resource_Order_Comment
 *
 * Resource class for order comment
 */
class Silex_OrderComment_Model_Resource_Order_Comment extends Mage_Core_Model_Resource_Db_Abstract
{
    /**
     * Silex_OrderComment_Model_Resource_Order_Comment constructor
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('silex_ordercomment/order_comment', 'comment_id');
    }
}
