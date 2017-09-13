<?php
require_once 'class/classUser.php';

if (!isset($_SESSION['userName'])) {
    header("location:login.php");
    exit;
}

$userObject = new airportAssUser\user;

$vendorDetails = [];

$serviceId = "";
$services = [1 => "Meet traveler at the curb", 2 => 'Escorted through security', 3 => 'Access to private airline clubs', 4 => 'Constant monitoring of flights',
    5 => 'Seat assignments', 6 => 'Assist with upgrades', 7 => 'Re-booking arrangements', 8 => 'Pre-boarding', 9 => 'Any special requests'
];

if (isset($_POST['updateVendorDetails'])) {

    $data = $_POST;
    $vendorObject = $_POST['vendorId'];
    $result = $userObject->updateVendorDetails($vendorObject, $data);
	header("location: vendorlist.php?venderUpdated=true");
}


if (isset($_GET['id']) && $_GET['id'] != "")
{
    $vendorId = $_GET['id'];
    $vendorDetails = $userObject->getVendorDetails($vendorId);
}
else
{
    echo "No Data Available";
}

//$requestStatusArray = [1=>"Pending",2=>'Processed',3=>'Payment Success',4=>'Refund',5=>'Closed',6=>'Cancelled'];
    
require_once("html/editvendor.php");