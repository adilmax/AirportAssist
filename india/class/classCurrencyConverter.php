<?php

namespace airportAssCurrency;

class currency{ 

    function __construct(){
         $this->apiURL = 'https://www.google.com/finance/converter';
    }
// function get al country name with currency..

    public function getAllCurrency(){
        $rawHTML = file_get_contents($this->apiURL);
        preg_match_all("/value=\"([A-Z]+)\">(.+?)<\/option>/", $rawHTML, $output_array);
        $array = array();
        foreach ($output_array[0] as $key => $value)
            array_push($array, array("country" => $output_array[2][$key], "currency" => $output_array[1][$key]));
        return $array;
    }
// get converted rate...

    function currencyConverter($from_Currency,$to_Currency,$amount) {
        $encode_amount = 1;
        $from_Currency = urlencode($from_Currency);
        $to_Currency = urlencode($to_Currency);

        $get = file_get_contents("$this->apiURL?a=$encode_amount&from=$from_Currency&to=$to_Currency");
        $get = explode("<span class=bld>",$get);
        $get = explode("</span>",$get[1]);
        $rate= preg_replace("/[^0-9\.]/", null, $get[0]);
        //$rate = (float)$rate;
        $converted_amount = $amount*$rate;
        $data = array( 'rate' => $rate, 'converted_amount' =>$converted_amount, 'from_Currency' => strtoupper($from_Currency), 'to_Currency' => strtoupper($to_Currency));
        echo json_encode( $data );
    }
//
//    function currencyConverter(){
//        $amount = $_POST['amount'];
//        $from  = $_POST['from'];
//        $to = $_POST['to'];
//
//
//
//        function convertCurrency($amount, $from, $to){
//            $data = file_get_contents("https://www.google.com/finance/converter?a=$amount&from=$from&to=$to");
//            preg_match("/<span class=bld>(.*)<\/span>/",$data, $converted);
//            $converted[1] = str_replace(',', '', $converted[1]);
//            $converted = preg_replace("/[^0-9.]/", "", $converted[1]);
//            return number_format(round($converted, 3),2);
//        }
//
//        $finalResult = convertCurrency($amount,$from,$to);
//
//        echo $finalResult;
//
//    }

}