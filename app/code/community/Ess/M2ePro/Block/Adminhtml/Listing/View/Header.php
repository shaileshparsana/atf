<?php

/*
 * @copyright  Copyright (c) 2013 by  ESS-UA.
 */

class Ess_M2ePro_Block_Adminhtml_Listing_View_Header extends Mage_Adminhtml_Block_Widget_Container
{
    protected $_template = 'M2ePro/listing/view/header.phtml';

    // ########################################

    public function getProfileTitle()
    {
        return $this->cutLongLines($this->getListing()->getTitle());
    }

    public function getAccountTitle()
    {
        return $this->cutLongLines($this->getListing()->getAccount()->getTitle());
    }

    public function getMarketplaceTitle()
    {
        return $this->cutLongLines($this->getListing()->getMarketplace()->getTitle());
    }

    public function getStoreViewBreadcrumb()
    {
        $breadcrumb = Mage::helper('M2ePro/Magento_Store')->getStorePath($this->getListing()->getStoreId());

        return $this->cutLongLines($breadcrumb);
    }

    // ########################################

    private function cutLongLines($line)
    {
        if (strlen($line) < 50) {
            return $line;
        }

        return substr($line, 0, 50) . '...';
    }

    // ########################################

    /**
     * @return Ess_M2ePro_Model_Listing
     */
    private function getListing()
    {
        return $this->getData('listing');
    }

    // ########################################
}