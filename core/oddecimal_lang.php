<?php
//(C) OXID-Design 2020
//
// The source contained in this file is the property of the OXID-Design
// (Leipziger Allee 36, 76139 Karlsruhe, Germany, https://www.oxid-design.com).
//
// This software is protected by copyright law - it is NOT freeware.
//
// Any unauthorized use of this software is prohibited and will be
// prosecuted by civil and criminal law.
//(C) OXID-Design 2020
//
// The source contained in this file is the property of the OXID-Design
// (Leipziger Allee 36, 76139 Karlsruhe, Germany, www.oxid-design.com).
//
// This software is protected by copyright law - it is NOT freeware.
//
// Any unauthorized use of this software is prohibited and will be
// prosecuted by civil and criminal law.

class oddecimal_lang extends oddecimal_lang_parent
{

    /**
     * Returns formatted number, according to active currency formatting standards.
     *
     * @param float  $dValue  Plain price
     * @param object $oActCur Object of active currency
     *
     * @return string
     */
    public function formatCurrency($dValue, $oActCur = null)
    {
        if (!$oActCur) {
            $oActCur = $this->getConfig()->getActShopCurrencyObject();
        }
        $sValue = \OxidEsales\Eshop\Core\Registry::getUtils()->fRound($dValue, $oActCur);


        // OXID-Design, Rafig - 15.09.2020
        $oActCur->decimal = 2;

        return number_format((double) $sValue, $oActCur->decimal, $oActCur->dec, $oActCur->thousand);
    }
}
