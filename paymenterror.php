<?php 
require_once 'class/classValidation.php';
$validation = new airportAssValidation\inputValidation;
$errorMessage = "";
if(isset($_GET['e'])){
    $errorCode = $_GET['e'];
    $source = $_GET['s'];
    switch($errorCode){
        case 1 : 
            $errorMessage = "Invalid Request Id.";
            break;
        case 2 : 
            $errorMessage = "Invalid Amount.";
            break;
        case 3 : 
            $errorMessage = "You already paid the amount.";
            break;
    }
    include('html/paymenterror.php');
}