<?
require_once 'class/classUser.php';
require_once 'class/classValidation.php';

$validationObject = new airportAssValidation\inputValidation;
$userModel  = new airportAssUser\user;
$status = false;
$userDetails = [];
$conCode = "";
$services  = [1=>"Meet traveler at the curb",2=>'Escorted through security',3=>'Access to private airline clubs',4=>'Constant monitoring of flights',
        5=>'Seat assignments',6=>'Assist with upgrades',7=>'Re-booking arrangements',8=>'Pre-boarding',9=>'Any special requests'
];
$title = ['Mr'=>'Mr','Miss'=>'Miss','Mrs'=>'Mrs','Ms'=>'Ms'];
$flightType = [1=>'Arrival',2=>'Departure',3=>'Transit'];
if (isset($_POST['conCode'])){
    $conCode = $_POST['confirmation'];
    $userDetails = $userModel->getDetails($conCode); 
    if($userDetails->currency != ""){
        $userDetails->currency->fetch();
    }
    $status = ($userDetails != false)?false:true;
}

$serverNameValue = $_SERVER['SERVER_NAME'];
$serverName = str_replace("www.", "", $serverNameValue);
$isCity = $validationObject->isCityDomain($serverName);
$airportInfoUrl = "";
$classOfTravel = [1=>'Economy',2=>'Buisness',3=>'First',4=>'Premium Economy'];
$formatName = $validationObject->FormatName($serverName);
if($formatName != false){
$domainName = $formatName['domainName'];
$titleValue = $formatName['titleName'];
}else{
   $domainName =  $serverName;
   $titleValue = $serverName;
}
 require_once('html/adminpage.php');?>
