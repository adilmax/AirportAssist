<?php

namespace airportAssGroundHandling;
require_once 'classParseSettings.php';

class groundHandling
{
    public function getCountryCode()
    {
        $query = new \Parse\ParseQuery("Country");
        $query->equalTo("Root", "0");
        $query->notEqualTo("Title", 'All');
        $query->ascending("Title");

        $query->limit(300);
        $results = $query->find();
        $country = [];
        for ($i = 0; $i < count($results); $i++) {
            $object = $results[$i];
            $country[$object->AreaCode] = $object->Title;
        }
        return $country;
    }

    public function getAircraftType()
    {
        $query = new \Parse\ParseQuery("AircraftType");
        $query->equalTo("parent", "0");
        $query->ascending("title");
        $results = $query->find();
        $type = [];
        for ($i = 0; $i < count($results); $i++) {
            $object = $results[$i];
            $type[$object->getObjectId()] = $object->title;
        }
        return $type;
    }

    public function getAircraftSubType($id)
    {

        $query = new \Parse\ParseQuery("AircraftType");
        $query->equalTo('parent', $id);
        $query->ascending("title");
        $results = $query->find();
        $subType = [];
        for ($i = 0; $i < count($results); $i++) {
            $object = $results[$i];
            $subType[$object->getObjectId()] = $object->title;
        }

        return $subType;
    }

    public function addGroundHandlingRequest($data, $contactNumber, $capContactNumber)
    {
        $object = new \Parse\ParseObject("GroundHandling");
        $formName = 'Ground Handling Form';
        $domainName = $_SERVER['SERVER_NAME'];
        $object->set('domainName', $domainName);
        $object->set('formName', $formName);
        $object->set('fname', $data['firstName']);
        $object->set('lname', $data['lastName']);
        $object->set('cname', $data['company']);
        $object->set('mobileNumber', (double)$contactNumber);
        $object->set('country', $data['country']);
        $object->set('email', $data['email']);
        $object->set('address', $data['address']);
        $object->set('SITATEX', $data['sitatex']);
        $object->set('fax', (int)$data['fax']);
        $object->set('servicePlace', $data['requiredService']);
        $object->set('aircraftRegistry', $data['airRegistry']);
        $object->set('flightNumber', $data['flightNumber']);
        $object->set('originAirport', $data['orginAirport']);
        $object->set('destinationAirport', $data['depAirport']);
        $object->set('operator', $data['operator']);
        $object->set('purpose', $data['flightPurpose']);
        $object->set('aircraftType', $data['aircraftType']);
        $object->set('flightCat', $data['flightCategory']);
        if ($data['arrivalTime'] != "") {
            $date = str_replace('/', '-', $data['arrivalTime']);
            $toDate = new \DateTime($date);
            $object->set('arrivalDate', $toDate);
        }
        $object->set('arrivalTime', $data['arrivalTiming']);

        if ($data['departureTime'] != "") {
            $date = str_replace('/', '-', $data['departureTime']);
            $formDate = new \DateTime($date);
            $object->set('departureDate', $formDate);
        }
        $object->set('departureTime', $data['departureTiming']);
        $object->set('fuelRequirement', ($data['fuel'] == 1) ? true : false);
        $object->set('quantityFuel', $data['fuelQty']);
        $object->set('paymentFuel', $data['paymentMode']);
        $object->set('capName', $data['captainName']);
        $object->set('numCrewArrival', (int)$data['crewArriving']);
        $object->set('numPassengerArrival', (int)$data['arrivedPassengers']);
        $object->set('capMobileNumber', (int)$capContactNumber);
        $object->set('numCrewDeparture', (int)$data['crewDepart']);
        $object->set('numPassengerDeparture', (int)$data['departPassengers']);
        $object->set('aircraftCat', $data['aircraftSubType']);
        $object->set('aircraftSubCat', $data['subType']);
        if (count($data['RampServices']) > 0) {
            $object->setArray('rampSupport', $data['RampServices']);
        }
        if (count($data['GroundEquip']) > 0) {
            $object->setArray('rampEquipment', $data['GroundEquip']);
        }
        if (count($data['VipPassHand']) > 0) {
            $object->setArray('vipServices', $data['VipPassHand']);
        }
        try {
            $object->save();
            return $object->getObjectId();
        } catch (ParseException $ex) {
            return false;
        }
    }

    public function addCampaignRequest($data, $contactNumber)
    {
        $object = new \Parse\ParseObject("GroundHandling");
        $formName = 'Short Campaign form';
        $domainName = $_SERVER['SERVER_NAME'];
        $object->set('domainName', $domainName);
        $object->set('fname', $data['fullName']);
        $object->set('email', $data['email']);
        $object->set('originAirport', $data['aircraftOrginAirport']);
        $object->set('mobileNumber', (double)$contactNumber);
        $object->set('formName', $formName);
        try {
            $object->save();
            return $object->getObjectId();
        } catch (ParseException $ex) {
            return false;
        }
    }

    public function addQuery($data)
    {
        $object = new \Parse\ParseObject("GroundHandling");
        $formName = 'Satelight Form';
        $domainName = $_SERVER['SERVER_NAME'];
        $object->set('domainName', $domainName);
        $object->set('formName', $formName);
        $object->set('fname', $data['name']);
        $object->set('email', $data['email']);
        $object->set('originAirport', $data['originAirport']);
        try {
            $object->save();
            return $object->getObjectId();
        } catch (ParseException $ex) {
            return false;
        }
    }

    public function sendMailToAdmin($refNumber, $email)
    {
        $subject = "Ground Handling Enquiry";
        $sentmessage = "New Enquiry has been submitted with the reference number <b>$refNumber.</b> ";

        require_once("PHPMailer/PHPMailerAutoload.php");


        $mail = new \PHPMailer;

// $mail->smtpDebug = 3;                           // Enable Verbose debug output

        $mail->isSMTP();                                     //  set mailer to use php
        $mail->Host = 'smtp.gmail.com';                    //  set smtp main and backup server
        $mail->SMTPAuth = true;                            //  Enable SMTP Authentication
        $mail->Username = 'info@murgency.com';       //  SMTP Username
        $mail->Password = 'pass@123';                   //  SMTP Password
        $mail->SMTPSecure = 'tls';                         // Enable tls encryption 'ssl' also accepted
        $mail->Port = 25;                                  //  TCT Port to Connect to

        $mail->setFrom('muairportassist@murgency.com', 'MUrgency Ground Handling');
        $mail->addAddress('muairportassist@murgency.com');         // Add a recepient
        $mail->addReplyTo($email, 'MUrgency Ground Handling');


//add attachemnts

        $mail->isHTML(true);
        $myfile = fopen("emailtemplateforadmin.html", "r") or die("unable to open file !");
        $fileContent = fread($myfile, filesize("emailtemplateforadmin.html"));

        $fileContent1 = str_replace("[message]", $sentmessage, $fileContent);

        $mail->Subject = $subject;
        $mail->Body = $fileContent1;

        if (!$mail->send()) {
            return true;
        } else {
            return false;
        }
    }


    public function sendMailToUser($email, $fullName)
    {

        $subject = 'Your Enquiry to MUrgency Ground Handling';
        $message = "Thank you for your enquiry. We are totally committed to providing the best airport assistance in all major airports across the world. 
                                We will get back to you shortly.";
        require_once("PHPMailer/PHPMailerAutoload.php");

        $mail = new \PHPMailer;

// $mail->smtpDebug = 3;                           // Enable Verbose debug output

        $mail->isSMTP();                                     //  set mailer to use php
        $mail->Host = 'smtp.gmail.com';                    //  set smtp main and backup server
        $mail->SMTPAuth = true;                            //  Enable SMTP Authentication
        $mail->Username = 'info@murgency.com';       //  SMTP Username
        $mail->Password = 'pass@123';                   //  SMTP Password
        $mail->SMTPSecure = 'tls';                         // Enable tls encryption 'ssl' also accepted
        $mail->Port = 25;                                  //  TCT Port to Connect to

        $mail->setFrom('MUAirportAssist@MUrgency.com', 'MUAirportAssist@MUrgency.com');
        $mail->addAddress($email, $fullName);         // Add a recepient
        $mail->addReplyTo('muairportassist@murgency.com', 'MUrgency Airport Assistance');

//add attachemnts

        $mail->isHTML(true);
        $myfile = fopen("emailtemplate.html", "r") or die("unable to open file !");
        $fileContent = fread($myfile, filesize("emailtemplate.html"));

        $fileContent1 = str_replace("[name]", $fullName, $fileContent);
        $fileContent2 = str_replace("[message]", $message, $fileContent1);

        $mail->Subject = $subject;
        $mail->Body = $fileContent2;

        if (!$mail->send()) {
            return true;
        } else {
            return false;
        }
    }

}
//GroundHandling