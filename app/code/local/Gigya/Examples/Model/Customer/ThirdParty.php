<?php

/**
 * Created by PhpStorm.
 * User: Yaniv Aran-Shamir
 * Date: 10/23/16
 * Time: 8:56 AM
 */
class Gigya_Examples_Model_Customer_ThirdParty
{

    /**
     * @param $observer
     *
     * This is an example of how to fetch only DS data.
     * It fetches the data on the current user after a successful parches.
     */
    public function sendDsOnly($observer)
    {
        if (Mage::getSingleton('customer/session')->isLoggedIn()) {
            $customerData = Mage::getSingleton('customer/session')->getCustomer();
            $gigyaId = $customerData->getData("gigya_uid");
            if (!empty($gigyaId)) {
                $dsGetter = new Gigya_Ds_Model_MagentoDsUpdater($gigyaId);
                $dsInfo   = $dsGetter->fetchDsData();
                // From here is would be custom third party code that sends the DS info to the third party service
            }
        }

    }

}