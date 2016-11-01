<?php

/**
 * Created by PhpStorm.
 * User: Yaniv Aran-Shamir
 * Date: 11/1/16
 * Time: 2:53 PM
 */
class Gigya_Examples_Model_Customer_Ds
{

    /**
     * @param Varien_Event_Observer $observer
     *
     * This example would boost the score field returned from the DS by 2
     * note: This example require that you have a field score in the ds
     *
     */
    public function boostSegmentationScore($observer) {
        $dsData = $observer->getData('dsData');
        $dsData->score = $dsData->score * 2;
    }

}