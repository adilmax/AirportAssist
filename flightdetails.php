<?php
$flightDetails = [];

if (isset($_POST['flightSerachNumber'])) {
    $airlineCode = $_POST['airlineName'];
    $airlineNumber = $_POST['flightNumber'];
    $departureDate = $_POST['date'];
    $flightStatusArray = ['S' => 'SCHEDULED',
        'A' => 'ACTIVE',
        'U' => 'UNKNOWN',
        'R' => 'REDIRECTED',
        'L' => 'LANDED',
        'D' => 'DIVERTED',
        'C' => 'CANCELLED',
        'NO' => 'NOT OPERATIONAL'
    ];
    // Get cURL resource

    $curl = curl_init();
    // Set some options - we are passing in a useragent too here
    $appID = "4b44e371";
    $appKey = "249d2ce781e95fb490e00ab24b144216";
    $utc = false;
    curl_setopt_array($curl, [
        CURLOPT_RETURNTRANSFER => 1,
        CURLOPT_SSL_VERIFYPEER => false,
        //CURLOPT_URL => "https://api.flightstats.com/flex/flightstatus/rest/v2/json/flight/status/859818277?appId=4b44e371&appKey=249d2ce781e95fb490e00ab24b144216",
        CURLOPT_URL => "https://api.flightstats.com/flex/flightstatus/rest/v2/json/flight/status/$airlineCode/$airlineNumber/dep/$departureDate?appId=$appID&appKey=$appKey&utc=$utc",
        CURLOPT_USERAGENT => 'Flight Status'
    ]);

    // Send the request & save response to $resp
    $result = curl_exec($curl);
    $flightDetails = json_decode($result, true);

    if (curl_errno($curl)) {
        echo 'Request Error:' . curl_error($curl);
    }
    /*echo"<pre>";
    echo"</pre>";*/

    // Close request to clear up some resources
    curl_close($curl);

    require 'class/classFlightDetails.php';
    $fObj = new flightAssAirport\flight;


}
require_once 'html/flightdetails.php';
?>