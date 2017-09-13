<?php


require_once ("class/classValidation.php");
require_once ("class/classUser.php");
require_once ("class/classAirportAssistContent.php");
require_once ("class/classTestimonial.php");
require_once ("class/classCurrencyConverter.php");
require_once ("class/classAirportsubscription.php");


Parse\ParseUser::logOut();
$userTestimonial = new airportAssTestimonial\testimonial;

$airportContent = new airportAssContent\airportAssistContent;

$validation = new airportAssValidation\inputValidation;

$userModel = new airportAssUser\user;

$currencyModel = new airportAssCurrency\currency;

$subscriptionModal = new airportSubscribe\subscribe;



$status = false;

$mailStatus = false;

$error = [];

$data = [];

$ppc = false;

if (isset($_GET['ppc'])) {

    if ($_GET['ppc'] == 1) {

        $ppc = true;

    }

}



if (isset($_POST['email'])) {

    $result = $subscriptionModal->addSubscribe($_POST['email']);





}


if (isset($_POST['submit-book-service'])){

    $data = $_POST;

    $setBsResponse = $userModel->setBookServiceDetails($data);

    if ($setBsResponse != ""){
        $mailStatusAdmin = $userModel->sendMailToAdmin($setBsResponse, $data['bs-email']);
        $fullName = "";
        $mailStatusUser = $userModel->sendMailToUser($data['bs-email'], $fullName);
    }
}

if (isset($_GET['p'])){

    $airportUserDetails = $userModel->getDetails($_GET['p']);
    $data['email'] = ($airportUserDetails->email != "") ? $airportUserDetails->email : "";
    $data['mobile'] = ($airportUserDetails->mobile != "") ? $airportUserDetails->mobile : "";

    $mobileNumber = explode("-",$data['mobile']);

    $data['countryCode'] = $mobileNumber[0];
    $data['mobile'] =$mobileNumber[1];


}




if (isset($_POST['details'])) {

    $data = $_POST;

    $notRequired = ['message', 'children', 'infants'];

    if ($data['serviceType'] == 'YllNCfF8tL') {

        array_push($notRequired, 'service');

    }



    if ($data['flightType'] == 2) {

        array_push($notRequired, 'transitFlightNumber');

        array_push($notRequired, 'departureTime');

        array_push($notRequired, 'departureTiming');



    }

    if ($data['flightType'] == 1) {

        array_push($notRequired, 'transitFlightNumber');

        array_push($notRequired, 'departureTime');

        array_push($notRequired, 'departureTiming');

    }



    $normalUser = false;



    if ($data['agentOrCorporateID'] == '') {

        array_push($notRequired, 'agentOrCorporateID');

        $normalUser = true;

    }

    if ($normalUser) {

        $error = $validation->checkEmpty($data, $notRequired);



        if (count($error) == 0) {

            $refNumber = $userModel->addUser($data, $ppc, $corporateId = "");

            if ($refNumber != false) {

                $mailStatus = $userModel->sendMailToAdmin($refNumber, $data['email']);

                $fullName = $data['firstName'] . " " . $data['lastName'];

                $userMailStatus = $userModel->sendMailToUser($data['email'], $fullName);

                if ($refNumber != false) {

                    $status = true;

                    $data = [];

                    header("Location:welcome");

                }

            } else {

                $errorMessage = "Something Went Wrong. Try it after some time";

            }

        }

    } else {



        $codeArray = explode("-", $data['agentOrCorporateID']);

        if (count($codeArray) == 2) {

            $codeId = $codeArray[1];

        } else {

            $codeId = $codeArray[0];

        }

        $results = $userModel->getAgentOrCorporateObjectId($codeId);

        if (count($results) > 0) {

            $error = $validation->checkEmpty($data, $notRequired);

            if (count($error) == 0) {

                $refNumber = $userModel->addUser($data, $ppc, $results[0]);

                if ($refNumber != false) {

                    $mailStatus = $userModel->sendMailToAdmin($refNumber, $data['email']);

                    $fullName = $data['firstName'] . " " . $data['lastName'];

                    $userMailStatus = $userModel->sendMailToUser($data['email'], $fullName);

                    if ($refNumber != false) {

                        $status = true;

                        $data = [];

                        header("Location:welcome");

                    }

                } else {

                    $errorMessage = "Something Went Wrong. Try it after some time";

                }



            }



        } else {

            $errorMessage = "Please Enter Valid Murgency Network Id";

        }

    }

}





// request call back from



if (isset($_POST['callbutton'])) {

    $data = $_POST;

    $required = ['name' => 'Your Name',

        'email' => 'Your Email',

        'phoneCode' => 'Country Code',

        'phone' => 'Mobile Number'



    ];



    $error = $validation->checkRequiredValue($data, $required);

    if (count($error) == 0) {

        $email = $data['email'];

        $emailStatus = $validation->validateEmail($email);

        if ($emailStatus) {

            $result = $userModel->addCallRequest($data);

            if ($result != false) {

                $status = true;

                $data = [];

                header("Location:welcome");

            }

        }



    }

}



// end of request call back form



$services = [1 => "Meet traveler at the curb", 2 => 'Escorted through security', 3 => 'Access to private airline clubs', 4 => 'Constant monitoring of flights',

    5 => 'Seat assignments', 6 => 'Assist with upgrades', 7 => 'Re-booking arrangements', 8 => 'Pre-boarding', 9 => 'Any special requests'

];

$classOfTravel = [1 => 'Economy', 2 => 'Buisness', 3 => 'First', 4 => 'Premium Economy'];

$stripeAllowedCurrency = $userModel->getAllCurrency();

$serviceType = $userModel->getSeviceType();

$serviceList = $userModel->getSeviceList("HiYpSfhlpN");

$titleList = ['Mr' => 'Mr', 'Miss' => 'Miss', 'Mrs' => 'Mrs', 'Ms' => 'Ms'];

$flightType = [1 => 'Arrival', 2 => 'Departure', 3 => 'Transit'];

$serverNameValue = $_SERVER['SERVER_NAME'];

$serverName = str_replace("www.", "", $serverNameValue);

$isCity = $validation->isCityDomain($serverName);

$airportInfoUrl = "";

$formatName = $validation->FormatName($serverName);

if ($formatName != false) {

    $domainName = $formatName['domainName'];

    $titleValue = $formatName['titleName'];

} else {

    $domainName = $_SERVER['SERVER_NAME'];

    $titleValue = $_SERVER['SERVER_NAME'];

}

$_SESSION['title'] = $titleValue;

$getAllContent = $airportContent->getAllContent($type = 2);

$allServiceList = $airportContent->getAllServiceList();

$testimonial = $userTestimonial->fetchTestimonial();





$allCurrency = $currencyModel->getAllCurrency();



if (isset($_GET['code']) != "") {

    $networkCodeValue = explode('-', $_GET['code']);

}





//print_r($allCurrency);



require_once 'html/index.php';



