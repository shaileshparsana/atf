<?php

/*
 * @copyright  Copyright (c) 2013 by  ESS-UA.
 */

class Ess_M2ePro_Block_Adminhtml_Marketplace_Switcher extends Ess_M2ePro_Block_Adminhtml_Component_Switcher
{
    protected $paramName = 'marketplace';

    // ########################################

    public function getLabel()
    {
        return Mage::helper('M2ePro')->__($this->getComponentLabel('Choose %component% Marketplace'));
    }

    public function getItems()
    {
        $collection = Mage::getModel('M2ePro/Marketplace')->getCollection()
            ->addFieldToFilter('status', Ess_M2ePro_Model_Marketplace::STATUS_ENABLE)
            ->setOrder('component_mode', 'ASC')
            ->setOrder('title', 'ASC');

        if (!is_null($this->componentMode)) {
            $collection->addFieldToFilter('component_mode', $this->componentMode);
        }

        if ($collection->getSize() < 2) {
            return array();
        }

        $componentTitles = Mage::helper('M2ePro/Component')->getComponentsTitles();

        $items = array();

        foreach ($collection as $marketplace) {
            /** @var $marketplace Ess_M2ePro_Model_Marketplace */

            if (!isset($items[$marketplace->getComponentMode()]['label'])) {
                $label = '';
                if (isset($componentTitles[$marketplace->getComponentMode()])) {
                    $label = $componentTitles[$marketplace->getComponentMode()];
                }
                $items[$marketplace->getComponentMode()]['label'] = $label;
            }

            $items[$marketplace->getComponentMode()]['value'][] = array(
                'value' => $marketplace->getId(),
                'label' => $marketplace->getTitle()
            );
        }

        return $items;
    }

    // ########################################

    public function getDefaultOptionName()
    {
        return Mage::helper('M2ePro')->__('All Marketplaces');
    }

    // ########################################
}