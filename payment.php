<?
require_once 'class/Encrypttools.php';
require_once 'class/classValidation.php';
require_once 'class/classUser.php';
require_once 'class/classGiftCard.php';

$validation = new airportAssValidation\inputValidation;
$encrptModel = new airportEncrypt\EncryptTools;
$userModel = new airportAssUser\user;
$giftCardObj = new airportAssGiftCard\giftCard;
$status = false;
$userDetails = [];
$amount = "";
$paymentStatus = false;
$services = [1 => "Meet traveler at the curb", 2 => 'Escorted through security', 3 => 'Access to private airline clubs', 4 => 'Constant monitoring of flights',
    5 => 'Seat assignments', 6 => 'Assist with upgrades', 7 => 'Re-booking arrangements', 8 => 'Pre-boarding', 9 => 'Any special requests'
];
$title = ['Mr' => 'Mr', 'Miss' => 'Miss', 'Mrs' => 'Mrs', 'Ms' => 'Ms'];
$flightType = [1 => 'Arrival', 2 => 'Departure', 3 => 'Transit'];
if (isset($_POST['conCode'])) {
    $conCode = $_POST['confirmation'];
    $userDetails = $userModel->getDetails($conCode);
    if ($userDetails->currency != "") {
        $userDetails->currency->fetch();
    }
    $status = ($userDetails != false) ? false : true;
}
$paymentID = "";
if(isset($_GET['t'])){
$paymentID = $_GET['t'];
}

if (isset($_POST['makePayment'])) {
    $conCode = $_POST['objectId'];
    $userDetails = $userModel->getDetails($conCode);
    if($userDetails != false) {
        $couponCode = $_POST['cardCode'];
        $couponAmount = $_POST['amount'];
        if ($couponCode == "") {

            $details = ['amount' => $userDetails->totalAmount, 'email' => $userDetails->email, 'requestId' => $conCode,
                'cardCode' => false, 'amountPaid' => $userDetails->totalAmount, 'cardAmount' => 0];
            $encryptedDetails = $encrptModel->encrypt($details);


            header("Location:carddetails?t=$encryptedDetails");
        } else  {

            if ($userDetails->totalAmount > $couponAmount) {
                 $paidAmount = $userDetails->totalAmount - $couponAmount;
                $details = ['amount' => $userDetails->totalAmount, 'email' => $userDetails->email, 'requestId' => $conCode,
                    'cardCode' => $couponCode, 'amountPaid' => $paidAmount, 'cardAmount' => $couponAmount];
                $encryptedDetails = $encrptModel->encrypt($details);


            header("Location:carddetails?t=$encryptedDetails");

            } elseif ($userDetails->totalAmount <= $couponAmount) {
                $id = "";
                $update = $userModel->updatePaymentStatus($conCode, $id, $couponCode, $couponAmount);
                if ($update) {
                    header('Location:welcome.php');
                }

            }
        }
    } else{
        $status = true;
    }
}


$classOfTravel = [1 => 'Economy', 2 => 'Buisness', 3 => 'First', 4 => 'Premium Economy'];
$serverNameValue = $_SERVER['SERVER_NAME'];
$serverName = str_replace("www.", "", $serverNameValue);
$isCity = $validation->isCityDomain($serverName);
$airportInfoUrl = "";
$formatName = $validation->FormatName($serverName);
if ($formatName != false) {
    $domainName = $formatName['domainName'];
    $titleValue = $formatName['titleName'];
} else {
    $domainName = $serverName;
    $titleValue = $serverName;
}
$_SESSION['title'] = $titleValue;
require_once('html/payment.php'); ?>