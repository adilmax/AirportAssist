<?php


$amount = $_POST['amount'];
$from  = $_POST['from'];
$to = $_POST['to'];



function convertCurrency($amount, $from, $to){
    $data = file_get_contents("https://www.google.com/finance/converter?a=$amount&from=$from&to=$to");
    preg_match("/<span class=bld>(.*)<\/span>/",$data, $converted);
    $converted[1] = str_replace(',', '', $converted[1]);
    $converted = preg_replace("/[^0-9.]/", "", $converted[1]);
    return number_format(round($converted, 3),2);
}

$finalResult = convertCurrency($amount,$from,$to);

echo $finalResult;