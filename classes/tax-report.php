<?php

class WC_Report_Sales_By_Country_Tax extends WC_Tax {
    public function getTax($price, $rates, $dollarSign) {

        $vat = $this->calc_exclusive_tax($price, $rates);

        
        if (!isset($vat) || empty($vat)) {
            return "None";
        }

        if ($dollarSign) {
            return get_woocommerce_currency_symbol() . array_values($vat)[0];
        }

        return array_values($vat)[0];
    }

    public function getTaxRate($country) {
        $taxRates = $this->find_rates($country);

        if (is_null($taxRates) || count($taxRates) == 0) {
            return 0;
        }

        return $taxRates;
    }
}
