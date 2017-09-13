<?php
require_once 'class/classUser.php';

if (!isset($_SESSION['userName'])) {
    header("location:login.php");
    exit;
}

$userModel = new airportAssUser\user;
$status = false;
$userDetails = [];
$serviceId = "";
$services = [1 => "Meet traveler at the curb", 2 => 'Escorted through security', 3 => 'Access to private airline clubs', 4 => 'Constant monitoring of flights',
    5 => 'Seat assignments', 6 => 'Assist with upgrades', 7 => 'Re-booking arrangements', 8 => 'Pre-boarding', 9 => 'Any special requests'
];


if (isset($_POST['updateUserDetails'])) {

    $data = $_POST;
    $userObject = $_POST['updateUserId'];

    $result = $userModel->updateUserDetails($userObject, $data);


}
if (isset($_GET['userId']) && $_GET['userId'] != "") {

    $userId = $_GET['userId'];
    $userDetails = $userModel->getUserDetails($userId);
    if($userDetails->vendorName != ""){
        $vendorName = $userDetails->venderName->getObjectId();
    }else{
        $vendorName = "";
    }
    
    if($userDetails->paymentMode != ""){
        $paymentModeValue = $userDetails->paymentMode->getObjectId();
    }else{
        $paymentModeValue = "";
    }
    
    if($userDetails->vendorCurrency != ""){
        $vendorCurrency = $userDetails->vendorCurrency->getObjectId();
    }else{
        $vendorCurrency = "";
    }

    $serviceTypeId = 'HiYpSfhlpN';


    if ($userDetails->serviceType != "") {
        $serviceTypeId = $userDetails->serviceType->getObjectId();
    }

    if ($serviceTypeId != "YllNCfF8tL") {
    	if($userDetails->service != ""){
           $serviceId = $userDetails->service->getObjectId();
        }
    }

    $serviceType = $userModel->getSeviceType();
    $serviceList = $userModel->getSeviceList($serviceTypeId);


    $currencyValues = $userModel->getAllAirportCurrency();

    $vendorList = $userModel->getVendorList();

    $paymentMode = $userModel->getPaymentMode();



//
//    foreach ($currencyValues->results as $value){
//        echo $value['currencyName'];
//    }



} else {
    echo "No Data Available";
}

$requestStatusArray = [1=>"Pending",2=>'Processed',3=>'Payment Success',4=>'Refund',5=>'Closed',6=>'Cancelled'];
    
require_once("html/edituserdetails.php");