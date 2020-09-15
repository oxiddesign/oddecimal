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


class oddecimal_utilsview extends oddecimal_utilsview_parent
{

    public function getSmarty($blReload = false)
    {
        $smarty = parent::getSmarty(true);
        $smarty->unregister_function('oxprice');
        $smarty->register_function('oxprice', array($this, 'odsetdecimal'));
        return $smarty;
    }

    function odSetDecimal($params, &$smarty)
    {
        $sOutput = '';
        $iDecimals = 2;
        $sDecimalsSeparator = ',';
        $sThousandSeparator = '.';
        $sCurrencySign = '';
        $sSide = '';
        $mPrice = $params['price'];

        if (!is_null($mPrice)) {
            $config = oxRegistry::getConfig();
            $currencyArray = $config->getCurrencyArray();
            $defaultConfigCurrency = null;
            if (!empty($currencyArray)) {
                $defaultConfigCurrency = $currencyArray[0];
            }

            $sPrice = ($mPrice instanceof oxPrice) ? $mPrice->getPrice() : $mPrice;
            $oCurrency = isset($params['currency']) ? $params['currency'] : $defaultConfigCurrency;

            if (!is_null($oCurrency)) {
                $sDecimalsSeparator = isset($oCurrency->dec) ? $oCurrency->dec : $sDecimalsSeparator;
                $sThousandSeparator = isset($oCurrency->thousand) ? $oCurrency->thousand : $sThousandSeparator;
                $sCurrencySign = isset($oCurrency->sign) ? $oCurrency->sign : $sCurrencySign;
                $sSide = isset($oCurrency->side) ? $oCurrency->side : $sSide;
                //$iDecimals = isset($oCurrency->decimal) ? (int) $oCurrency->decimal : $iDecimals;
            }

            if (is_numeric($sPrice)) {
                if ((float) $sPrice > 0 || $sCurrencySign) {
                    $sPrice = number_format($sPrice, $iDecimals, $sDecimalsSeparator, $sThousandSeparator);
                    $sOutput = (isset($sSide) && $sSide == 'Front') ? $sCurrencySign . $sPrice : $sPrice . ' ' . $sCurrencySign;
                }

                $sOutput = trim($sOutput);
            }
        }

        return $sOutput;
    }
}
