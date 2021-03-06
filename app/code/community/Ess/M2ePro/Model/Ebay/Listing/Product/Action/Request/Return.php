<?php

/*
 * @copyright  Copyright (c) 2013 by  ESS-UA.
 */

class Ess_M2ePro_Model_Ebay_Listing_Product_Action_Request_Return
    extends Ess_M2ePro_Model_Ebay_Listing_Product_Action_Request_Abstract
{
    /**
     * @var Ess_M2ePro_Model_Ebay_Template_Return
     */
    private $returnTemplate = NULL;

    // ########################################

    public function getData()
    {
        return array(
            'return_policy' => array(
                'accepted'      => $this->getReturnTemplate()->getAccepted(),
                'option'        => $this->getReturnTemplate()->getOption(),
                'within'        => $this->getReturnTemplate()->getWithin(),
                'description'   => $this->getReturnTemplate()->getDescription(),
                'shippingcost'  => $this->getReturnTemplate()->getShippingCost(),
                'restockingfee' => $this->getReturnTemplate()->getRestockingFee()
            )
        );
    }

    // ########################################

    /**
     * @return Ess_M2ePro_Model_Ebay_Template_Return
     */
    private function getReturnTemplate()
    {
        if (is_null($this->returnTemplate)) {
            $this->returnTemplate = $this->getListingProduct()
                                         ->getChildObject()
                                         ->getReturnTemplate();
        }
        return $this->returnTemplate;
    }

    // ########################################
}