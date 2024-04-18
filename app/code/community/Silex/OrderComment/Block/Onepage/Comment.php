<?php

/**
 * Class Silex_OrderComment_Block_Onepage_Comment
 *
 * Block class for comment in checkout
 */
class Silex_OrderComment_Block_Onepage_Comment extends Mage_Checkout_Block_Onepage_Abstract
{
    /**
     * Get comment text for current quote
     *
     * @return string
     */
    public function getCommentText()
    {
        /** @var Silex_OrderComment_Model_Order_Comment $commentModel */
        $commentModel = Mage::getModel('silex_ordercomment/order_comment');

        return $commentModel->loadByQuote($this->getQuote())->getComment(false);
    }
}