<?
require_once 'class/classValidation.php';
require_once 'class/classUser.php';
require_once 'class/classGroundHandling.php';

$validationObject = new airportAssValidation\inputValidation;
$groundHandlingObj = new airportAssGroundHandling\groundHandling;

$serverNameValue = $_SERVER['SERVER_NAME'];
$serverName = str_replace("www.", "", $serverNameValue);
$isCity = $validationObject->isCityDomain($serverName);
$airportInfoUrl = "";
$formatName = $validationObject->FormatName($serverName);
if ($formatName != false) {
    $domainName = $formatName['domainName'];
    $titleValue = $formatName['titleName'];
} else {
    $domainName = $serverName;
    $titleValue = $serverName;
}
$_SESSION['title'] = $titleValue;

$status = false;
$mailSend = false;
$userMailStatus = false;
$error = [];
$data = [];


if(isset($_POST['sendQuery'])) {
    $data = $_POST;
    $required = ['name',
        'email',
        'originAirport'

    ];

    $label = ['name' => 'your name',
        'email' => 'your email',
        'originAirport' => 'airport name'


    ];
    $error = $validationObject->checkRequiredValueWithoutLabel($data, $required, $label);
    if (count($error) == 0) {
        $email = $data['email'];
        $emailStatus = $validationObject->validateEmail($email);
        if ($emailStatus) {
            $result = $groundHandlingObj->addQuery($data);
            
            if ($result != false) {
                $mailSend = $groundHandlingObj->sendMailToAdmin($result,$data['email']);
                $fullName = $data['name'];
                $userMailStatus = $groundHandlingObj->sendMailToUser($data['email'],$fullName);
                $mailSend = true;
                $userMailStatus = true;
                $status = true;
                $data = [];
                header("Location:welcome.php");
            }
        }else{
            $error[] = "Invalid Email";
        }
    }
}
include "html/groundhandlinginfo.php";
?>