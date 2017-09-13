<?php 
require_once 'class/classCurrencyConverter.php';
//----------------------------------------------------------------------
$currencyModel = new airportAssCurrency\currency;
$allCurrency = $currencyModel->getAllCurrency();
//----------------------------------------------------------------------
require_once 'html/currencyconverter.php';
?>