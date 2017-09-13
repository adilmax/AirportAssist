<?
require_once 'class/classValidation.php';
require_once 'class/classUser.php';
require_once 'class/classFAQ.php';

$validationObject = new airportAssValidation\inputValidation;
$faqModel = new airportAssFAQ\faq;

$serverNameValue = $_SERVER['SERVER_NAME'];
$serverName = str_replace("www.", "", $serverNameValue);
$isCity = $validationObject->isCityDomain($serverName);
$airportInfoUrl = "";
$formatName = $validationObject->FormatName($serverName);
if($formatName != false){
    $domainName = $formatName['domainName'];
    $titleValue = $formatName['titleName'];
}else{
   $domainName =  $serverName;
   $titleValue = $serverName;
}
$_SESSION['title'] = $titleValue;
$faqList = $faqModel->getAllFAQ();


include "html/faq.php";

?>
