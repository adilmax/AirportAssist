<?php

require_once 'class/classUser.php';
//-----------------------------------------------------------------------------

if (!isset($_SESSION['userName'])) {
    header("location:login.php");
    exit;
}

$userModel = new airportAssUser\user;

if (isset($_POST["addPaymentMode"])) {
    $paymentTitle = $_POST["paymentTitle"];
    $addPaymentMode = $userModel->setPaymentMode($paymentTitle);
	header("location: paymentmode.php?paymentModeAdded=true");
}

include_once("html/addpaymentmode.php");