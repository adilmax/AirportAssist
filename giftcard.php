<?php

$_SESSION['content'] = [];
require_once 'class/classValidation.php';
require_once 'class/classGiftCard.php';

$giftCardModel = new airportAssGiftCard\giftCard;
$validationModel = new airportAssValidation\inputValidation;
$error = [];
if(isset($_POST['addToCart'])) {


    $data = $_POST;

    $required = ['message' => "Message",
        'giftAmount' => 'Gift Amount',
        'hiddenImage' => "Image",
    ];
    $error = $validationModel->checkRequiredValue($data, $required);
    if (count($error) == 0) {
        if( $data['giftAmount'] >25 &&  $data['giftAmount']<=500){
            $cartContent['image'] = $data['hiddenImage'];
            $cartContent['message'] = $data['message'];
            $cartContent['amount'] = $data['giftAmount'];
            $giftCardModel->addToCard($cartContent);
        }else{
            $error[] = "Enter an amount between $25 - $500.";
        }
    }
}
    if(isset($_POST['checkOut'])){


        $data = $_POST;

        $required = [   'message'=>"Message",
            'giftAmount'=>'Gift Amount',
            'hiddenImage'=>"Image",
        ];
        $error = $validationModel->checkRequiredValue($data, $required);
        if(count($error) == 0){
            if( $data['giftAmount'] >25 &&  $data['giftAmount']<=500){
                $cartContent['image'] = $data['hiddenImage'];
                $cartContent['message'] = $data['message'];
                $cartContent['amount'] = $data['giftAmount'];
                $giftCardModel->addToCard($cartContent);
                header('Location:viewgiftcart');
            }else{
                $error[] = "Enter an amount between $25 - $500.";
            }
        }
    
}
require_once 'html/gc.php';