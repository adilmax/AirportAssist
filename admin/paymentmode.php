<?php

require_once 'class/classUser.php';
//-----------------------------------------------------------------------------

if (!isset($_SESSION['userName'])) {
    header("location:login.php");
    exit;
}

$userModel = new airportAssUser\user;

$paymentModeCode = "";
$paymentTitle = "";
$paymentStatus = "";

$deleteStatus = false;
if (isset($_GET['paymentModeId']))
{
    $paymentModeId = $_GET["paymentModeId"];
    $deleteStatus = $userModel->deletePaymentMode($paymentModeId);
}

if(isset($_GET['paymentModeAdded']) && $_GET['paymentModeAdded']==true)
{
	$resultText = "Added";
	$result = true;
}

if(isset($_GET['paymentModeUpdated']) && $_GET['paymentModeUpdated']==true)
{
	$resultText = "Updated";
	$result = true;
}


if (isset($_POST['search'])) {
    $data = $_POST;
    if (isset($_POST['paymentModeCode']) && $_POST['paymentModeCode'] != "") {
        $paymentModeCode = $_POST['paymentModeCode'];
    }
    if (isset($_POST['paymentTitle']) && $_POST['paymentTitle'] != "") {
        $paymentTitle = $_POST['paymentTitle'];
    }
}



$paymentModeList = $userModel->getPaymentMode($paymentModeCode, $paymentTitle, $paymentStatus);


include_once("html/paymentmode.php");