<?php

/**
 * Class Silex_OrderComment_Helper_Data
 *
 * Translation helper
 */
class Silex_OrderComment_Helper_Data extends Mage_Core_Helper_Abstract
{
    /**
     * Check if order comment feature is enabled
     *
     * @return bool
     */
    public function isFeatureEnabled()
    {
        return Mage::getStoreConfigFlag('checkout/comment/active');
    }
}
