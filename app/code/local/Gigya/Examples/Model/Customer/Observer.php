<?php

/**
 * Created by PhpStorm.
 * User: Yaniv Aran-Shamir
 * Date: 6/16/16
 * Time: 2:37 PM
 */
class Gigya_Examples_Model_Customer_Observer
{

    /**
     * @param Varien_Event_Observer $observer
     *
     * This is an example of an observer method that deals with the different format of the DOB field in magento and gigya
     * it assumes that there is a mapping between gigya birthDay field and magento dob field.
     *
     */

    public function convertDobFromGigya($observer)
    {
        /** @var Gigya_Social_Helper_FieldMapping_MagentoUpdater $updater */
        $updater                             = $observer->getData("updater");
        $gigyaAccount                        = $updater->getGigyaAccount();
        $gigyaAccount['profile']['birthDay'] = $gigyaAccount['profile']['birthYear'] . "-"
            . $gigyaAccount['profile']['birthMonth'] . "-"
            . $gigyaAccount['profile']['birthDay'];
        $updater->setGigyaAccount($gigyaAccount);
    }

    /**
     * @param Varien_Event_Observer $observer
     * This is an example of an observer method that deals with the different format of the DOB field in magento and gigya
     * it assumes that there is a psado mapping between magento birthYear to gigya profile.birthYear,
     * from magento birthMonth to gigya profile.birthMonth and from magento birthDay and gigya profile.birthDay
     */
    public function convertDobToGigya($observer)
    {
        /** @var Gigya_Social_Helper_FieldMapping_GigyaUpdater $updater */
        $updater = $observer->getData("updater");
        $cmsArray = $updater->getCmsArray();
        $dateParts = explode("-",$cmsArray['dob']);
        $cmsArray['birthYear'] = $dateParts[0];
        $cmsArray['birthMonth'] = $dateParts[1];
        $cmsArray['birthDay'] = $dateParts[2];
        $updater->setCmsArray($cmsArray);
    }
}