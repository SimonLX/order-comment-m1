<?php

require_once 'Mage/Checkout/controllers/CartController.php';

/**
 * Class Silex_OrderComment_Checkout_CartController
 *
 * Controller class handling specific actions for order comment
 */
class Silex_OrderComment_Checkout_CartController extends Mage_Checkout_CartController
{
    /**
     * Comment post action
     *
     * @return void
     *
     * @throws Mage_Exception
     */
    public function commentPostAction()
    {
        $comment = (string) $this->getRequest()->getParam('customer-comment');

        if ($comment === '') {
            $this->_goBack();
            return;
        }

        /** @var Silex_OrderComment_Model_Order_Comment $commentModel */
        $commentModel = Mage::getModel('silex_ordercomment/order_comment');
        $commentModel->loadByQuote($this->_getQuote());

        if (!$commentModel->getId()) {
            $commentModel->setQuoteId($this->_getQuote()->getId());
        }
        $commentModel->setComment($comment);

        try {
            $commentModel->save();

            $this->_getSession()->addSuccess($this->__('Your comment has been saved.'));
        } catch (Mage_Core_Exception $e) {
            $this->_getSession()->addError($e->getMessage());
        } catch (Exception $e) {
            $this->_getSession()->addError(
                $this->__('An error occurred when trying to save your comment, please try again.')
            );

            Mage::logException($e);
        }

        $this->_goBack();
    }
}
