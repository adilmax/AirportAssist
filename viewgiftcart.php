<?php
require_once 'class/classValidation.php';
require_once 'class/classGiftCard.php';


$giftCardModel = new airportAssGiftCard\giftCard;
$validationModel = new airportAssValidation\inputValidation;

$error = [];

if (isset($_POST['payment'])) {
       $data = $_POST;
        
        $required = [   'senderName'=>"Name",
                        'senderEmail'=>'Email',
                    ];

        $paymentError = $validationModel->giftAmount($data['totalAmount']);
        if(count($paymentError) == 0){
	          $error = $validationModel->checkRequiredValue($data, $required);
	          if (count($error) == 0) {
	          	 $_SESSION['senderEmail'] = $data['senderEmail'];
	          	 $_SESSION['senderName'] = $data['senderName'];
		          header("Location:giftcardpayment");
	          }
		     
        }else {
        	$error = $paymentError;
        }
       
}

include_once 'html/cart.php';

