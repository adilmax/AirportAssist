<?
require_once 'class/classValidation.php';
require_once 'class/classUser.php';
require_once 'class/classAirportAssistContent.php';


$validationObject = new airportAssValidation\inputValidation;
$userModel = new airportAssUser\user;
$airportContent = new airportAssContent\airportAssistContent;

$service = [1 => "Arrival", 2 => 'Transit', 3 => 'Departure'];
$classOfTravel = [1=>'Economy',2=>'Buisness',3=>'First',4=>'Premium Economy'];
$titleList = ['Mr'=>'Mr','Miss'=>'Miss','Mrs'=>'Mrs','Ms'=>'Ms'];
$flightType = [1=>'Arrival',2=>'Departure',3=>'Transit'];
$serviceType = $userModel->getSeviceType();
$serviceList = $userModel->getSeviceList("HiYpSfhlpN");


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
$error = [];
$data = [];
$mailStatus = false;
$userMailStatus = false;
$campaignName = "";

if(isset($_GET['ad'])){
     switch($_GET['ad']){
        case "1":
	        $campaignName = "Grandparent gift FB";
	        break;
	case"2":  
		$campaignName = "FB Campaign - location US";
	        break;
	case"3":  
		$campaignName = "Google Campaign - Location - London,Frankfurt, Singapore-Ad1";
	        break;
	case"4":  
		$campaignName = "Google Campaign - Location - London,Frankfurt, Singapore-Ad2";
	        break;
        case"7":  
		$campaignName = "Passengers travelling for Umrah";
	        break;
        case"8":  
		$campaignName = " Hongkong & China (together)";
	        break;
	case"9":  
		$campaignName = "Valentine Campaign";
	        break;
	case"21":  
		$campaignName = "Google Campaign - Jeddahairport";
	        break;
	case"22":  
		$campaignName = "Google Campaign - Meet and Greet";
	        break;
     }  
}
if(isset($_POST['details'])) {
    if(isset($_POST['callBack'])){
        $callBack = "Yes";
    }else{
        $callBack = "No";
    }
    $data = $_POST;
    $required = ['firstName',
        'lastName',
        'email',
        'originAirport',
        'flightType',
        'flightNumber',
        'arrivalTime',
        'serviceType',
        'title',
        'mobile',
        'classOfTravel'
        

    ];

    $label = ['firstName' => 'First Name',
        'lastName' => 'Last Name',
        'email' => 'Email',
        'originAirport' => 'Origin Airport',
        'flightType' => 'Flight Type',
        'flightNumber' => 'Flight Number',
        'arrivalTime' => 'Arrival Time',
        'serviceType' => 'Service Type',
        'title' => 'Title',
        'mobile' => 'Mobile',
        'classOfTravel' => 'Class Of Travel'



    ];
    $error = $validationObject->checkRequiredValueWithoutLabel($data, $required, $label);
    if (count($error) == 0) {
        $email = $data['email'];
        $emailStatus = $validationObject->validateEmail($email);
        if ($emailStatus) {
            $result = $userModel->addRequestService($data,$callBack,$campaignName);
            if ($result != false){
                $mailStatus = $userModel->sendMailToAdmin($result,$data['email']);
                $fullName = $data['firstName']." ".$data['lastName'];
                $userMailStatus = $userModel->sendMailToUser($data['email'],$fullName);
                if ($result != false) {
                    $status = true;
                    $data = [];
                    header("Location:welcome.php");
                }
            }else{
                $error = "Something Went Wrong. Try it after some time";
            }
        }else{
            $error[] = "Invalid Email";
        }
    }

}
include "html/requestform.php";
?>