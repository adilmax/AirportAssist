<?php

require_once 'class/classUser.php';
//-----------------------------------------------------------------------------

if (!isset($_SESSION['userName'])) {
    header("location:login.php");
    exit;
}

$userModel = new airportAssUser\user;

$paymentModeId = $_GET["paymentModeId"];

if (isset($paymentModeId)) {
    $response = $userModel->getPaymentModeDetails($paymentModeId);
}

if (isset($_POST["updatePaymentMode"])) {
    $data = $_POST;
    $paymentModeTitle = $data["paymentTitle"];
    $setPaymentModeTitle = $userModel->updatePaymentModeTitle($paymentModeId, $paymentModeTitle);
	header("location: paymentmode.php?paymentModeUpdated=true");
}



include_once("html/editpaymentmode.php");