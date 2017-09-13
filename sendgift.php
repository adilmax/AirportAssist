<?php
require_once 'class/Encrypttools.php';
require_once 'class/classValidation.php';
require_once 'class/classGiftCard.php';

$encryptObj = new airportEncrypt\EncryptTools;
$validation = new airportAssValidation\inputValidation;
$giftCardObj = new airportAssGiftCard\giftCard;

$status = false;
$error = [];
$data = [];
$mailStatus = false;
 if(isset($_SESSION['status'] )){
     $sendStatus = true;
 }else {
     $sendStatus = false;
 }
 if(isset($_GET['t'])){
    $couponCode = $encryptObj->decrypt($_GET['t']);

 }

if (isset($_POST['receiverName'])) {
    $data = $_POST;
    $_SESSION['status'] = true;
    $required = ['receiverName' => "Name",
        'receiverEmail' => 'Email',
    ];
    $error = $validation->checkRequiredValue($data, $required);
    if (count($error) == 0) {
        $email = $data['receiverEmail'];
        $emailStatus = $validation->validateEmail($email);
        if ($emailStatus) {
            $result = $giftCardObj->updateReceiverInfo($data, $data['objectId']);
            if ($result != false) {
                $status = true;
                $data = [];
            }
        } else {
            $error[] = "Invalid Email";
        }

    }
}
$giftCardDetails = $giftCardObj->fetchGiftCard($couponCode);
if(count($giftCardDetails) == 0) {
     $senderName = $giftCardObj->getSenderName($couponCode[0]);
    unset($_SESSION['status']);
    header("Location: giftcardwelcome?s=$senderName");
}
require_once 'html/sendgiftcard.php';

?>