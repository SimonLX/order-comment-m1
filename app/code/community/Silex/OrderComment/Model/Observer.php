<?php

/**
 * Class Silex_OrderComment_Model_Observer
 *
 * Observer class to add customer comment on checkout completion
 */
class Silex_OrderComment_Model_Observer
{
    /**
     * Add customer comment to order
     *
     * @param Varien_Event_Observer $observer
     *
     * @return void
     *
     * @throws Exception
     */
    public function addOrderComment($observer)
    {
        /** @var Silex_OrderComment_Helper_Data $helper */
        $helper = Mage::helper('silex_ordercomment');

        if ($helper->isFeatureEnabled()) {
            /** @var Mage_Sales_Model_Order $order */
            $order = $observer->getEvent()->getOrder();

            $comment = Mage::app()->getRequest()->getPost('customer-comment', '');

            if ($comment !== '' && $order->getId()) {
                /** @var Silex_OrderComment_Model_Order_Comment $commentModel */
                $commentModel = Mage::getModel('silex_ordercomment/order_comment');
                $commentModel->load($order->getQuoteId(), 'quote_id');

                if (!$commentModel->getId()) {
                    $commentModel->setQuoteId($order->getQuoteId());
                }

                try {
                    $commentModel->setOrderId($order->getId())
                        ->setComment($comment)
                        ->save();
                } catch (Exception $exception) {
                    /** @var Mage_Sales_Model_Order_Status_History $historyComment */
                    $historyComment = $order->addStatusHistoryComment(
                        Mage::helper('silex_ordercomment')->__(
                            'There was an issue when saving customer comment, here it is: %s', $comment
                        )
                    );

                    $historyComment->save();
                }
            }
        }
    }
}
