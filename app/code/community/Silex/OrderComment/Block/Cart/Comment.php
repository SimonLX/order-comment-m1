<?php

/**
 * Class Silex_OrderComment_Block_Cart_Comment
 *
 * Block class for comment in cart
 */
class Silex_OrderComment_Block_Cart_Comment extends Mage_Checkout_Block_Cart_Abstract
{
    /**
     * Check if comment block has to be displayed in cart page
     *
     * @return bool
     */
    public function isBlockDisplayed()
    {
        /** @var Silex_OrderComment_Helper_Data $helper */
        $helper = Mage::helper('silex_ordercomment');

        return $helper->isFeatureEnabled() && Mage::getStoreConfigFlag('checkout/comment/display_in_cart');
    }

    /**
     * Check if there is a comment defined in config to be displayed under the textarea
     *
     * @return bool
     */
    public function hasFieldComment()
    {
        return Mage::getStoreConfigFlag('checkout/comment/cart_field_comment');
    }

    /**
     * Get the text comment to be displayed under the textarea
     *
     * @return string|null
     */
    public function getFieldComment()
    {
        return Mage::getStoreConfig('checkout/comment/cart_field_comment');
    }

    /**
     * Return "comment" form action url
     *
     * @return string
     */
    public function getFormActionUrl()
    {
        return $this->getUrl('checkout/cart/commentPost', array('_secure' => $this->_isSecure()));
    }

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