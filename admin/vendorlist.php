<?php
require_once 'class/classUser.php';
//-----------------------------------------------------------------------------

if(!isset($_SESSION['userName'])){
    header("location:login.php");
    exit;
}

$userModel = new airportAssUser\user;


$deleteStatus = false;
if(isset($_GET['id']) && $_GET['d']==1)
{
    $objectID = $_GET['id'];
    $deleteStatus = $userModel->deleteVendor($objectID);
}

if(isset($_GET['venderAdded']) && $_GET['venderAdded']==true)
{
	$resultText = "Added";
	$result = true;
}

if(isset($_GET['venderUpdated']) && $_GET['venderUpdated']==true)
{
	$resultText = "Updated";
	$result = true;
}


$page = 1;
$limit = 100;
$name ="";
$email = "";
$contactNo = "";
$status = "";

if (isset($_POST['search']) || isset($_POST['next'])|| isset($_POST['prev']))
{
    $data = $_POST;

    if(isset($_POST['page']) && $_POST['page']){
        $page = $_POST['page'];
    }
    if(isset($_POST['name']) && $_POST['name']!=""){
        $name = $_POST['name'];
    }
    if(isset($_POST['email']) && $_POST['email']!=""){
        $email = $_POST['email'];
    }
    if(isset($_POST['contactNo']) && $_POST['contactNo']!=""){
        $contactNo = $_POST['contactNo'];
    }
    if(isset($_POST['status']) && $_POST['status']!=""){
       $requestStatus = $_POST['status'];
    }
}


$vendorList = $userModel->getVendorList($page, $limit, $name, $email, $contactNo, $status);
$count = $userModel->getVendorListCount();

//----------------------------------------------------------------------------------------------
include 'html/vendorlist.php';
