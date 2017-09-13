<?
require_once 'class/classValidation.php';
require_once 'class/classUser.php';


$validationObject = new airportAssValidation\inputValidation;
$userModel = new airportAssUser\user;

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
$error= "";
include "html/gc.php";
?>
