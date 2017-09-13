<?php 
$flightDetails = [];

if(isset($_POST['flightSerachNumber']))
{
    $airlineCode = $_POST['airlineName'];
    $airlineNumber = $_POST['flightNumber'];
    $departureDate = $_POST['date'];
    $flightStatusArray = ['S'=>'Scheduled',
                        'A'=>'Active',
                        'U'=>'Unknown',
                        'R'=>'Redirected',
                        'L'=>'Landed',
                        'D'=>'Diverted',
                        'C'=>'Cancelled',
                        'NO'=>'Not Operational'
                        ];
    // Get cURL resource

    $curl = curl_init();
    // Set some options - we are passing in a useragent too here
    $appID = "4b44e371";
    $appKey = "249d2ce781e95fb490e00ab24b144216";
    $utc = false;
    curl_setopt_array($curl, [
        CURLOPT_RETURNTRANSFER => 1,
        //CURLOPT_URL => "https://api.flightstats.com/flex/flightstatus/rest/v2/json/flight/status/859818277?appId=4b44e371&appKey=249d2ce781e95fb490e00ab24b144216",
        CURLOPT_URL => "https://api.flightstats.com/flex/flightstatus/rest/v2/json/flight/status/$airlineCode/$airlineNumber/dep/$departureDate?appId=$appID&appKey=$appKey&utc=$utc",
        CURLOPT_USERAGENT => 'Flight Status'
    ]);

    // Send the request & save response to $resp
    $result = curl_exec($curl);
    $flightDetails = json_decode($result,true);
    /*echo"<pre>";
    print_r($flightDetails);
    echo"</pre>";*/

    // Close request to clear up some resources
    curl_close($curl);
    $airLineDetails = [];
    if(isset($flightDetails['flightStatuses'])){
       if(count($flightDetails['flightStatuses'])>0){
            $flightStatusDetail = $flightDetails['flightStatuses'][0];
       }else{
          $flightStatusDetail  = []; 
       }
    }else{
        if(count($flightDetails['flightStatus'])>0){
            $flightStatusDetail = $flightDetails['flightStatus'];
        }else{
            $flightStatusDetail  = []; 
        }
    }
    if(count($flightStatusDetail)>0){
        $airNumber  = (isset($flightStatusDetail['flightNumber']))?$flightStatusDetail['flightNumber']:"";
        $airLineDetails = (isset($flightDetails['appendix']['airlines']))?$flightDetails['appendix']['airlines']:[];
        $destinationAirport = [];
        $arrivalAirport = [];
        $operationTime = [];
        for($i=0;$i<count($airLineDetails);$i++){
            if($airLineDetails[$i]['fs'] == $airlineCode){
                $code = $airLineDetails[$i]['fs'];
                $airLineName = $airLineDetails[$i]['name'];
            }
        }
        if(isset($flightStatusDetail['status'])){
            $flightStatus = $flightStatusArray[$flightStatusDetail['status']];
        }else{
            $flightStatus = "";
        }
    $destinationAirportCode = (isset($flightStatusDetail['departureAirportFsCode']))?$flightStatusDetail['departureAirportFsCode']:"-";
        $arrivalAirportCode = (isset($flightStatusDetail['arrivalAirportFsCode']))?$flightStatusDetail['arrivalAirportFsCode']:"-";
        for($i=0;$i<count($flightDetails['appendix']["airports"]);$i++){
            if($flightDetails['appendix']["airports"][$i]['fs'] == $destinationAirportCode){
                $destinationAirport = $flightDetails['appendix']["airports"][$i];
            }else{
                $arrivalAirport = $flightDetails['appendix']["airports"][$i];
            }
        }
        if(count($destinationAirport)>0){
            $destinationAirportName = (isset($destinationAirport["name"]))?$destinationAirport["name"]:"-";
            $destinationCity = (isset($destinationAirport["city"]))?$destinationAirport["city"].",":"-";
            $destinationCountryCode = (isset($destinationAirport["countryCode"]))?$destinationAirport["countryCode"]:"";
            $destinationAirportCode = (isset($destinationAirport["cityCode"]))?$destinationAirport["cityCode"]:"";
            $destinationStateCode = (isset($destinationAirport["stateCode"]))?$destinationAirport["stateCode"].",":"";
            $departureDateObject = (isset($flightStatusDetail['departureDate']["dateLocal"]))?new DateTime($flightStatusDetail['departureDate']["dateLocal"]):"-";
            $departureUTCHour = (isset($destinationAirport["utcOffsetHours"]))?$destinationAirport["utcOffsetHours"].",":"";
            $departureLocalTime = (isset($destinationAirport['localTime']))?new DateTime($destinationAirport['localTime']):"-";       
        }
        if(count($arrivalAirport)>0){
            $arrivalAirportName = (isset($arrivalAirport["name"]))?$arrivalAirport["name"]:"-";
            $arrivalCity = (isset($arrivalAirport["city"]))?$arrivalAirport["city"].",":"-";
            $arrivalAirportCode = (isset($arrivalAirport["cityCode"]))?$arrivalAirport["cityCode"]:"-";
            $arrivalCountryCode = (isset($arrivalAirport["countryCode"]))?$arrivalAirport["countryCode"]:"-";
            $arrivalStateCode = (isset($arrivalAirport["stateCode"]))?$arrivalAirport["stateCode"].",":"";
            $arrivalDateObject = (isset($flightStatusDetail['arrivalDate']["dateLocal"]))?new DateTime($flightStatusDetail['arrivalDate']["dateLocal"]):"-";
            $arrivalUTCHour = (isset($arrivalAirport["utcOffsetHours"]))?$arrivalAirport["utcOffsetHours"].",":"";
            $arrivalLocalTime = (isset($arrivalAirport['localTime']))?new DateTime($arrivalAirport['localTime']):"-";  
        }
        $route = "($destinationAirportCode), $destinationCity  $destinationStateCode $destinationCountryCode to ($arrivalAirportCode), $arrivalCity $arrivalStateCode  $arrivalCountryCode";
        $departureTerminal = (isset($flightStatusDetail['airportResources']['departureTerminal']))?$flightStatusDetail['airportResources']['departureTerminal']:"N/A";
        $departureGate = (isset($flightStatusDetail['airportResources']['departureGate']))?$flightStatusDetail['airportResources']['departureGate']:"N/A";
        $baggageClaim = (isset($flightStatusDetail['airportResources']['baggage']))?$flightStatusDetail['airportResources']['baggage']:"N/A";
        $arrivalTerminal = (isset($flightStatusDetail['airportResources']['arrivalTerminal']))?$flightStatusDetail['airportResources']['arrivalTerminal']:"N/A";
        $operationTime = (isset($flightStatusDetail['operationalTimes']))?$flightStatusDetail['operationalTimes']:[];
    
        if(count($operationTime)>0){
            $scheduledGateDeparture = (isset($operationTime["scheduledGateDeparture"]["dateLocal"]))? new DateTime($operationTime['scheduledGateDeparture']["dateLocal"]):"-";
            $actualGateDeparture = (isset($operationTime["actualGateDeparture"]["dateLocal"]))? new DateTime($operationTime['actualGateDeparture']["dateLocal"]):"-";
            $estimatedGateDeparture = (isset($operationTime["estimatedGateDeparture"]["dateLocal"]))? new DateTime($operationTime['estimatedGateDeparture']["dateLocal"]):"-";        
            
            $scheduledRunWayDeparture = (isset($operationTime["scheduledRunwayDeparture"]["dateLocal"]))? new DateTime($operationTime['scheduledRunwayDeparture']["dateLocal"]):"-";   
            $actualRunWayDeparture = (isset($operationTime["actualRunwayDeparture"]["dateLocal"]))? new DateTime($operationTime['actualRunwayDeparture']["dateLocal"]):"-";      
            $estimatedRunwayDeparture = (isset($operationTime["estimatedRunwayDeparture"]["dateLocal"]))? new DateTime($operationTime['estimatedRunwayDeparture']["dateLocal"]):"-";      
        
            $scheduledGateArrival = (isset($operationTime["scheduledGateArrival"]["dateLocal"]))? new DateTime($operationTime['scheduledGateArrival']["dateLocal"]):"-";        
            $estimatedGateArrivalObject = (isset($operationTime["estimatedGateArrival"]["dateLocal"]))? new DateTime($operationTime['estimatedGateArrival']["dateLocal"]):"-";               
            $actualGateArrival = (isset($operationTime["actualGateArrival"]["dateLocal"]))? new DateTime($operationTime['actualGateArrival']["dateLocal"]):"-";        
            
            $scheduledRunwayArrival = (isset($operationTime["scheduledRunwayArrival"]["dateLocal"]))? new DateTime($operationTime['scheduledRunwayArrival']["dateLocal"]):"-";        
            $estimatedRunwayArrival = (isset($operationTime["estimatedRunwayArrival"]["dateLocal"]))? new DateTime($operationTime['estimatedRunwayArrival']["dateLocal"]):"-";        
            $actualRunwayArrival = (isset($operationTime["actualRunwayArrival"]["dateLocal"]))? new DateTime($operationTime['actualRunwayArrival']["dateLocal"]):"-";        
            
        }
        $flightDuration = (isset($flightStatusDetail['flightDurations']))?$flightStatusDetail['flightDurations']:[];
        if(count($flightDuration)>0){
            $totalHours = floor($flightDuration["scheduledBlockMinutes"] / 60);
            $totalMinutes = $flightDuration["scheduledBlockMinutes"] % 60;
        }else{
            $totalHours = "";
            $totalMinutes = "";
        }
        $equipments = (isset($flightDetails['appendix']["equipments"][0]['name']))? $flightDetails['appendix']["equipments"][0]['name']:"-";
        $flightDelays = (isset($flightStatusDetail["delays"]))?$flightStatusDetail["delays"]:[];
        $departureGateDelay = 0;
        $arrivalGateDelay = 0;
        if(count($flightDelays)>0){
            $departureGateDelay = (isset($flightDelays['departureGateDelayMinutes']))?$flightDelays['departureGateDelayMinutes']:"0";
            $arrivalGateDelay = (isset($flightDelays['arrivalGateDelayMinutes']))?$flightDelays['arrivalGateDelayMinutes']:"0";
        }
    }else{
        $flightDetails = [];
    }
}
require_once 'html/flightdetails.php';
?>