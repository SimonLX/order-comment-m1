<?php

/**
 * Class Silex_OrderComment_Model_Order_Comment
 *
 * Model class for order comment
 *
 * @method int getQuoteId()
 * @method Silex_OrderComment_Model_Order_Comment setQuoteId(int $quoteId)
 * @method int getOrderId()
 * @method Silex_OrderComment_Model_Order_Comment setOrderId(int $orderId)
 */
class Silex_OrderComment_Model_Order_Comment extends Mage_Core_Model_Abstract
{
    /**
     * Silex_OrderComment_Model_Order_Comment constructor
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('silex_ordercomment/order_comment');
    }

    /**
     * Load comment by quote
     *
     * @param Mage_Sales_Model_Quote $quote
     *
     * @return Silex_OrderComment_Model_Order_Comment
     */
    public function loadByQuote($quote)
    {
        return $this->load($quote->getId(), 'quote_id');
    }

    /**
     * Load comment by order ID
     *
     * @param int $orderId
     *
     * @return Silex_OrderComment_Model_Order_Comment
     */
    public function loadByOrderId($orderId)
    {
        return $this->load($orderId, 'order_id');
    }

    /**
     * Returns comment
     *
     * @return string
     */
    public function getComment($nl2br = true)
    {
        $result = $this->getData('comment');
        if ($nl2br) {
            $result = nl2br($result);
        }

        return $result;
    }

    /**
     * Set comment
     *
     * @param string $comment
     *
     * @return Silex_OrderComment_Model_Order_Comment
     */
    public function setComment($comment)
    {
        return $this->setData('comment', preg_replace('#<br\s*/?>#i', "\n", $comment));
    }
}
