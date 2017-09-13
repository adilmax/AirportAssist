<?php

require_once 'class/classTestimonial.php';
require_once 'class/classAirportServices.php';
require_once 'class/classValidation.php';
require_once 'class/classCurrencyConverter.php';

$userTestimonial = new airportAssTestimonial\testimonial;
$userServices = new airportServices\services;
$validation = new airportAssValidation\inputValidation;
$currencyModel = new airportAssCurrency\currency;


$status = false;
$error = [];
$errorArrival = [];
$errorDepar = [];
$errorTransit = [];
$errorLimousine = [];



$services = ['Departure'=>'Departure','Arrival'=>'Arrival', 'TransferTransit'=>'Transit / Transfer', 'Limousine'=>'Limousine'];
// For  Quick form

if (isset($_POST['quickBtn'])) {
  $formId = "Departure";
    $data = $_POST;
    $required = ['firstName',
        'lastName',
        'email',
        'quickOrigin'
    ];
    $label = ['firstName' => 'First Name',
        'lastName' => 'Last Name',
        'email' => 'Email',
        'quickOrigin' => 'Airport Service'
    ];
    $error = $validation->checkRequiredValueWithLabel($data, $required, $label);
    if (count($error) == 0) {
        $email = $data['email'];
        $emailStatus = $validation->validateEmail($email);
        if ($emailStatus) {
            $quickContact = $userServices->quickContact($data);
            $mailStatus = $userServices->sendMailToAdmin($quickContact, $data['email']);
            $fullName = $data['firstName'] . " " . $data['lastName'];
            $userMailStatus = $userServices->sendMailToUser($data['email'], $fullName);
            if ($quickContact != false) {
                $status = true;
                $data = [];
                header("Location:welcome.php");
            }
        } else {
            $error[] = "Invalid Email";
        }
    }
}

//For Arrival Form
if (isset($_POST['arrivalBtn'])) {
    $formId = "Arrival";
    $data = $_POST;
     $required = ['arrivalName',
         'arrivalEmail',
         'arrivalOriginAirport',
         'arrivalAirport',
         'arrivalTime',
         'flightNumber'

     ];

     $label = ['arrivalName' => 'First Name',
         'arrivalEmail' => 'Email',
         'arrivalOriginAirport' => 'Origin Airport',
         'arrivalAirport' => 'Arrival Airport',
         'arrivalTime' => 'Arrival Time',
         'flightNumber' => 'Flight Number'
     ];
 $errorArrival = $validation->checkRequiredValueWithLabelArrival($data, $required, $label);
     if (count($errorArrival) == 0) {
         $email = $data['arrivalEmail'];
         $emailStatus = $validation->validateEmail($email);
         if ($emailStatus) {
             $arrivalServices = $userServices->arrivalServices($data);
             $mailStatus = $userServices->sendMailToAdminArrival($arrivalServices,$data['arrivalEmail']);
             $fullName = $data['arrivalName'];
             $userMailStatus = $userServices->sendMailToUser($data['arrivalEmail'],$fullName);
             if ($arrivalServices != false) {
                 $status = true;
                 $data = [];
                 header("Location:welcome.php");
             }
         }else{
             $error[] = "Invalid Email";
         }

     }

}
//For Departure form

if (isset($_POST['departureBtn'])) {
    $formId = "Departure";
    $data = $_POST;
      $required = ['departureName',
          'departureEmail',
          'departureAirport',
          'destinationAirport',
          'departureTime',
          'departureFlightNumber'

      ];

      $label = ['departureName' => 'First Name',
          'departureEmail' => 'Email',
          'departureAirport' => 'Departure Airport',
          'destinationAirport' => 'Destination Airport',
          'departureTime' => 'Departure Time',
          'departureFlightNumber' => 'departure Flight Number'
      ];
      $errorDepar = $validation->checkRequiredValueWithLabelDeparture($data, $required, $label);
      if (count($errorDepar) == 0) {
       $email = $data['departureEmail'];
          $emailStatus = $validation->validateEmail($email);
          if ($emailStatus) {
              $departureServices = $userServices->departureServices($data);
              $mailStatus = $userServices->sendMailToAdminDeparture($departureServices,$data['departureEmail']);
              $fullName = $data['departureName'];
              $userMailStatus = $userServices->sendMailToUser($data['departureEmail'],$fullName);
              if ($departureServices != false) {
                  $status = true;
                  $data = [];
                   header("Location:welcome.php");
              }
          }else{
              $error[] = "Invalid Email";
          }
      }
}

// For Transit Services
$formId = "TransferTransit";
if (isset($_POST['transitBtn'])) {
    
    $data = $_POST;
     $required = ['transitName',
         'transitEmail',
         'transitOriginAirport',
         'transitArrivalAirport',
         'transitArrivalTime',
         'transitFlightNumber',
         'transitDepartureAirport',
         'transitDestinationAirport',
         'transitDepartureTime',
         'transitDepartureFlightNumber'

     ];

     $label = ['transitName' => 'First Name',
         'transitEmail' => 'Email',
         'transitOriginAirport' => 'Origin Airport',
         'transitArrivalAirport' => 'Arrival Airport',
         'transitArrivalTime' => 'Arrival Date',
         'transitFlightNumber' => 'Flight Number',
         'transitDepartureAirport' => 'Departure Airport',
         'transitDestinationAirport' => 'Destination Airport',
         'transitDepartureTime' => 'Departure Date',
         'transitDepartureFlightNumber' => 'departure Flight Number'
     ];
     $errorTransit = $validation->checkRequiredValueWithLabelTransit($data, $required, $label);
     if (count($errorTransit) == 0) {
      $email = $data['transitEmail'];
         $emailStatus = $validation->validateEmail($email);
         if ($emailStatus) {
             $transitServices = $userServices->transitServices($data);
             $mailStatus = $userServices->sendMailToAdminTransit($transitServices,$data['transitEmail']);
             $fullName = $data['transitName'];
             $userMailStatus = $userServices->sendMailToUser($data['transitEmail'],$fullName);
             if ($transitServices != false) {
                 $status = true;
                 $data = [];
                 header("Location:welcome.php");
             }
         }else{
             $error[] = "Invalid Email";
         }
     }
}

//For Limousin ervices
if (isset($_POST['limousineBtn'])) {
    $formId = "Limousine";
    $data = $_POST;
      $required = ['limousineName',
          'limousineLastName',
          'limousineEmail',
          'limousineArrivalTime',
          'limousineOriginAirport',
          'limousineFlightNumber'
          
          ];

     $label = ['limousineName' => 'First Name',
         'limousineLastName' => 'Last Name',
         'limousineEmail' => 'Email',
         'limousineArrivalTime' => 'Limousin Date',
         'limousineOriginAirport' => 'Airport Name',
         'limousinFlightNumber' => 'Limousin Flight Number'

     ];
          $errorLimousine = $validation->checkRequiredValueWithLabelLimousine($data, $required, $label);
          if (count($errorLimousine) == 0) {
          $email = $data['limousineEmail'];
          $emailStatus = $validation->validateEmail($email);
          if ($emailStatus) {
              $limousineServices = $userServices->limousineServices($data);

              $mailStatus = $userServices->sendMailToAdminLimousine($limousineServices,$data['limousineEmail']);
              $fullName = $data['limousineName']." ".$data['limousineLastName'];
              $userMailStatus = $userServices->sendMailToUser($data['limousineEmail'],$fullName);
              if ($limousineServices != false) {
                  $status = true;
                  $data = [];
                  header("Location:welcome.php");
              }
          }else{
              $error[] = "Invalid Email";
          }
      }
}

$testimonial = $userTestimonial->fetchTestimonial();
$allCurrency = $currencyModel->getAllCurrency();

require_once 'html/index.php';
?>