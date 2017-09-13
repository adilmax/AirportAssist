<?php
require_once 'class/classUser.php';

if (!isset($_SESSION['userName'])) {
    header("location:login.php");
    exit;
}

$userObject = new airportAssUser\user;

if (isset($_POST['addVendorDetails']))
{
    $result = $userObject->addVendor($_POST);
	header("location: vendorlist.php?venderAdded=true");
}
    
require_once("html/addvendor.php");