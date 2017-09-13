<?php
require_once 'class/Encrypttools.php';
require_once 'class/classUser.php';
$encrptModel = new airportEncrypt\EncryptTools;
$userModel = new airportAssUser\user;
$errorCode = "";
if(isset($_GET['c'])){    
    $requestId = $_GET['c'];
    $requestDetails = $userModel->getDetails($requestId);
    if($requestDetails != false){
        if($requestDetails->totalAmount != "" && $requestDetails->totalAmount != 0){
            if($requestDetails->transactionID == ""){

                $details = ['amount' => $requestDetails->totalAmount, 'email' => $requestDetails->email, 'requestId' => $requestId,
                'cardCode' => false, 'amountPaid' => $requestDetails->totalAmount, 'cardAmount' => 0];
                $encryptedDetails = $encrptModel->encrypt($details);

                header("Location:carddetails?s=m&t=$encryptedDetails");

            }else{       
                $errorCode = 3;
                 header("Location:paymenterror?s=m&e=$errorCode");
            }

        }else{      
            $errorCode = 2;
             header("Location:paymenterror?s=m&e=$errorCode");
        }

    }else{    
        $errorCode = 1;
         header("Location:paymenterror?s=m&e=$errorCode");
    }
    
}else{
    header("Http/1.0 404 Not Found");
    echo "<h1>404 Not Found</h1>";
    echo "The page that you have requested could not be found.";
    exit();
}