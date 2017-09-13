<?php

namespace airportAssUser;

use Parse\ParseException;

require_once 'classParseSettings.php';


class user
{
    public function addUser($data, $ppc, $corporateObject)
    {

        $currencyObject = new \Parse\ParseObject("Airport_Currency", $data['currency']);
        $object = new \Parse\ParseObject("Airport_UserDetails");
        $formName = "Main Service Form";
        $object->set('formName', $formName);
        $domainName = $_SERVER['SERVER_NAME'];
        $object->set('domainName', $domainName);
        $object->set('ppcSource', $ppc);
        $object->set('originAirport', $data['originAirport']);
        $object->set('arrivalAirport', $data['arrivalAirport']);
        $object->set('flightType', $data['flightType']);
        $object->set('flightNumber', $data['flightNumber']);
        $object->set('transitFlightNumber', $data['transitFlightNumber']);
        $object->set('arrivalTime', $data['arrivalTime'] . " " . $data['timing']);
        $object->set('departureTime', $data['departureTime'] . " " . $data['departureTiming']);
        if ($data['service'] != "") {
            $serviceListObject = new \Parse\ParseObject("AirportServiceList", $data['service']);
            $object->set('service', $serviceListObject);
        }
        if ($data['serviceType'] != "") {
            $serviceTypeObject = new \Parse\ParseObject("AirportServiceType", $data['serviceType']);
            $object->set('serviceType', $serviceTypeObject);
        }
        $object->set('title', $data['title']);
        $object->set('firstName', $data['firstName']);
        $object->set('lastName', $data['lastName']);

        $object->set('email', $data['email']);
        $object->set('mobile', $data['mobileCode'] . " - " . $data['mobile']);
        $object->set('message', $data['message']);
        $object->set('status', 1);
        $object->set('paymentStatus', false);
        $object->set('currency', $currencyObject);
        $object->set('classOfTravel', $data['classOfTravel']);
        $object->set('adult', ($data['adult'] != "") ? (int)$data['adult'] : 0);
        $object->set('children', ($data['children'] != "") ? (int)$data['children'] : 0);
        $object->set('infants', ($data['infants'] != "") ? (int)$data['infants'] : 0);
        if (isset($data['referralCode'])) {
            if ($data['referralCode'] != "")
                $object->set('referralCode', $data['referralCode']);
        }
        if (isset($data['IsPickUp'])) {
            if ($data['IsPickUp'] != "")
                $object->set('IsPickUp', (bool)$data['IsPickUp']);
        }
        if (isset($data['pickUpOrDropAddress'])) {
            if ($data['pickUpOrDropAddress'] != "")
                $object->set('pickUpOrDropAddress', $data['pickUpOrDropAddress']);
        }
        if ($corporateObject != "") {
            $object->set('agentOrCorporateID', $corporateObject);
        }


        $emailArray = explode("@", $data['email']);
        try {
            // if(isset($emailArray[1])){
            //if($emailArray[1] != "mail.ru"){
            $object->save();
            return $object->getObjectId();
            //}else{
            //return false;
            //}
            //}else{
            //return false;
            //}


        } catch (ParseException $ex) {
            return false;
        }
    }

    public function setBookServiceDetails($data)
    {
        $object = new \Parse\ParseObject("Airport_UserDetails");

        $object->set("formName", $data["bs-formName"]);
        $object->set("originAirport", $data["bs-originAirportData"]);
        $object->set("email", $data["bs-email"]);
        $object->set("mobile", $data['bs-countryCode'] . " - " . $data['bs-mobileNumber']);

        try {
            $object->save();
            return $object->getObjectId();
        } catch (ParseException $ex) {
            return false;
        }
    }

    public function getAgentOrCorporateObjectId($agentOrCorporateID)
    {
        $query = new \Parse\ParseQuery('_User');
        $query->equalTo('objectId', $agentOrCorporateID);
        $query->containedIn('accountType', ['tDB8LDzrjw', 'aiXsoMOQkV']);
        $results = $query->find();

        return $results;
    }

    public function getDetails($conCode)
    {
        $query = new \Parse\ParseQuery("Airport_UserDetails");
        $query->equalTo('objectId', $conCode);
        $results = $query->find();
        if (count($results) > 0) {
            return $results[0];
        } else {
            return false;
        }
    }

    public function updatePaymentStatus($conCode, $id, $cardCode, $cardAmount)
    {

        $object = new \Parse\ParseObject("Airport_UserDetails", $conCode);
        $object->fetch();
        $giftCardPaymentObject = "";
        if ($cardCode != false) {
            $giftCardPaymentObject = $this->addRowInGiftCardPayment($cardCode, $cardAmount, $object);
        }
        if ($giftCardPaymentObject != "") {
            $object->set('giftCardPaymentId', $giftCardPaymentObject);
        }
        $object->set('transactionID', $id);
        $object->set('paymentStatus', true);
        $object->set('status', 3);
        $object->save();
        return true;
    }

    public function addRowInGiftCardPayment($cardCode, $cardAmount, $object)
    {
        $giftCardObject = new \parse\ParseObject("GiftCardPayments");
        $giftCardObject->set('amount', (int)$cardAmount);
        $giftCardCodeObject = new \parse\parseObject("GiftCard", $cardCode);
        $giftCardObject->set('couponCode', $giftCardCodeObject);
        $giftCardObject->set('serviceId', $object);
        $giftCardObject->save();

        return $giftCardObject;
    }

    public function updateAmount($conCode, $amount, $advance)
    {
        $object = new \Parse\ParseObject("Airport_UserDetails", $conCode);
        $object->fetch();
        $object->set('totalAmount', (int)$amount);
        $object->set('advanceAmount', (int)$advance);
        $object->set('status', 2);
        try {
            $object->save();
            return true;
        } catch (ParseException $ex) {
            return false;
        }
    }

    public function sendMailToAdmin($refNumber, $email)
    {
        $subject = "Airport Assistance Enquiry";
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

        $mail->setFrom('contact@emergencyairportassistance.com', 'MUrgency Airport Assistance');
        $mail->addAddress('muairportassist@murgency.com');         // Add a recepient
//        $mail->addAddress('sanmitpawar@gmail.com');         // Add a recepient
        $mail->addReplyTo($email, 'MUrgency Airport Assistance');

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

    public function sendMailToUser($email, $name)
    {
        $subject = 'Your enquiry to Emergency Airport Assistance';
        $message = "Thank you for your enquiry. We are totally committed to providing the best airport assistance in all major Airports across the world. 
                                We will get back to you in the next few hours.";
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

        $mail->setFrom('contact@emergencyairportassistance.com', 'MUrgency Airport Assistance');
        $mail->addAddress($email, $name);         // Add a recepient
        $mail->addReplyTo('muairportassist@murgency.com', 'MUrgency Airport Assistance');

        //add attachemnts

        $mail->isHTML(true);
        $myfile = fopen("emailtemplate.html", "r") or die("unable to open file !");
        $fileContent = fread($myfile, filesize("emailtemplate.html"));

        $fileContent1 = str_replace("[name]", $name, $fileContent);
        $fileContent2 = str_replace("[message]", $message, $fileContent1);

        $mail->Subject = $subject;
        $mail->Body = $fileContent2;

        if (!$mail->send()) {
            return true;
        } else {
            return false;
        }
    }


    public function getSeviceType()
    {
        $serviceType = [];
        $query = new \Parse\ParseQuery("AirportServiceType");
        $result = $query->find();
        $count = count($result);
        for ($i = 0; $i < $count; $i++) {
            $object = $result[$i];
            $serviceType[$object->getObjectId()] = $object->title;
        }
        return $serviceType;
    }

    public function getSeviceList($serviceType)
    {
        $serviceList = [];

        $serviceTypeObject = new \Parse\ParseObject("AirportServiceType", $serviceType);
        $query = new \Parse\ParseQuery("AirportServiceList");
        $query->equalTo("serviceType", $serviceTypeObject);
        $result = $query->find();
        $count = count($result);
        for ($i = 0; $i < $count; $i++) {
            $object = $result[$i];
            $serviceList[$object->getObjectId()] = $object->title;
        }
        return $serviceList;
    }

    public function getAllCurrency()
    {
        $query = new \Parse\ParseQuery("Airport_Currency");
        $query->equalTo("status", true);
        $query->limit(150);
        $query->ascending("currencyCode");
        return $query->find();
    }


    public function sendContactMessage($data)
    {
        $to = "MUAirportAssist@MUrgency.com, s.markose@murgency.com";
        //$to = "m.velyalan@murgency.com";
        $subject = $data['subject'];
        $myfile = fopen("contactmailtemplate.html", "r") or die("Unable to open file!");
        $fileContent = fread($myfile, filesize("contactmailtemplate.html"));
        $fileContent1 = str_replace("[name]", $data['name'], $fileContent);
        $fileContent2 = str_replace("[email]", $data['email'], $fileContent1);
        $fileContent3 = str_replace("[subject]", $data['subject'], $fileContent2);
        $fileContent4 = str_replace("[message]", $data['message'], $fileContent3);
        fclose($myfile);

        $headers = "From: MUrgency Airport Assistance - <contact@MUrgencyairportassistance.com>" . "\r\n";
        $headers .= "Reply-To: " . strip_tags($data['email']) . "\r\n";
        $headers .= "MIME-Version: 1.0\r\n";
        $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
        if (mail($to, $subject, $fileContent4, $headers)) {
            return true;
        } else {
            return false;
        }

    }

    function changeCityName($paragraph, $cityName)
    {
        return str_replace("[cityName]", $cityName, $paragraph);
    }

    function changeLinkToBlank($paragraph5, $blankSpace)
    {
        $cityNameVar = $cityName;
        $linkToChange = '<a href="http://www.' . strtolower(str_replace(' ', '', $cityNameVar)) . 'airportassistance.com" target="_blank">' . $cityNameVar . '</a>, ';
        return str_replace($linkToChange, $blankSpace, $paragraph5);

    }

    public function sendContactMail($data)
    {
        $to = $data['email'];
        $subject = $data['subject'];
        $myfile = fopen("contactmailtemplateuser.html", "r") or die("Unable to open file!");
        $fileContent = fread($myfile, filesize("contactmailtemplateuser.html"));
        $name = ucwords(strtolower($data['name']));
        $fileContent1 = str_replace("[name]", $name, $fileContent);
        fclose($myfile);

        $headers = "From: MUrgency Airport Assistance - <contact@MUrgencyairportassistance.com>" . "\r\n";
        $headers .= "Reply-To: " . strip_tags("MUAirportAssist@MUrgency.com") . "\r\n";
        $headers .= "MIME-Version: 1.0\r\n";
        $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
        if (mail($to, $subject, $fileContent1, $headers)) {
            return true;
        } else {
            return false;
        }

    }

    public function helpContactMessage($data)
    {
        $to = "MUAirportAssist@MUrgency.com,s.mrakose@murgency.com,m.velyalan@murgency.com";
        //$to = "m.velyalan@murgency.com";
        $subject = 'Help request message';
        $myfile = fopen("contactmailtemplatehelp.html", "r") or die("Unable to open file!");
        $fileContent = fread($myfile, filesize("contactmailtemplatehelp.html"));
        $fileContent1 = str_replace("[name]", $data['name'], $fileContent);
        $fileContent2 = str_replace("[email]", $data['email'], $fileContent1);
        $fileContent4 = str_replace("[message]", $data['message'], $fileContent2);
        fclose($myfile);

        $headers = "From: MUrgency Airport Assistance - <contact@MUrgencyairportassistance.com>" . "\r\n";
        $headers .= "Reply-To: " . strip_tags($data['email']) . "\r\n";
        $headers .= "MIME-Version: 1.0\r\n";
        $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
        if (mail($to, $subject, $fileContent4, $headers)) {
            return true;
        } else {
            return false;
        }
    }

    public function getUserEmail()
    {
        $query = new \Parse\ParseQuery("Airport_UserDetails");
        $query->limit(1000);
        $result = $query->find();
        return $result;
    }

    public function addRequestService($data, $callBack, $campaignName)
    {
        $serviceTypeObject = new \Parse\ParseObject("AirportServiceType", $data['serviceType']);
        $object = new \Parse\ParseObject("Airport_UserDetails");
        $formName = 'Short Request form';
        $domainName = $_SERVER['SERVER_NAME'];
        $object->set('domainName', $domainName);
        $object->set('originAirport', $data['originAirport']);
        $object->set('flightType', $data['flightType']);
        $object->set('flightNumber', $data['flightNumber']);
        $object->set('transitFlightNumber', $data['transitFlightNumber']);
        $object->set('arrivalTime', $data['arrivalTime'] . " " . $data['timing']);
        $object->set('serviceType', $serviceTypeObject);
        $object->set('title', $data['title']);
        $object->set('firstName', $data['firstName']);
        $object->set('lastName', $data['lastName']);
        $object->set('email', $data['email']);
        $object->set('mobile', $data['mobileCode'] . " - " . $data['mobile']);
        $object->set('message', $data['message']);
        $object->set('status', 1);
        $object->set('classOfTravel', $data['classOfTravel']);
        $object->set('adult', ($data['adult'] != "") ? (int)$data['adult'] : 0);
        $object->set('children', ($data['children'] != "") ? (int)$data['children'] : 0);
        $object->set('infants', ($data['infants'] != "") ? (int)$data['infants'] : 0);
        $object->set('formName', $formName);
        $object->set('callBack', $callBack);

        if ($campaignName != "") {
            $object->set('campaignName', $campaignName);
        }
        $emailArray = explode("@", $data['email']);
        try {
            if (isset($emailArray[1])) {
                if ($emailArray[1] != "mail.ru") {
                    $object->save();
                    return $object->getObjectId();
                } else {
                    return false;
                }
            } else {
                return false;
            }
        } catch (ParseException $ex) {
            return false;
        }
    }

    public function addCallRequest($data)
    {
        $object = new \Parse\ParseObject("Airport_UserDetails");
        $formName = 'Request call Form';
        $domainName = $_SERVER['SERVER_NAME'];
        $object->set('domainName', $domainName);
        $object->set('firstName', $data['name']);
        $object->set('email', $data['email']);
        $object->set('mobile', $data['phoneCode'] . " - " . $data['phone']);
        $object->set('formName', $formName);
        $emailArray = explode("@", $data['email']);
        try {
            if (isset($emailArray[1])) {
                if ($emailArray[1] != "mail.ru") {
                    $object->save();
                    return true;
                }
            }


        } catch (ParseException $ex) {
            return false;
        }
    }


    public function checkFbUser($fbId)
    {
        $object = new \Parse\ParseQuery("_User");
        $object->equalTo("fbId", $fbId);

        try {
            $results = $object->find();
            if (count($results) > 0) {
                return $results[0];
            } else {
                return false;
            }
        } catch (ParseException $e) {
            return false;
        }
    }


    public function addUserFacebook($userData)
    {
        $object = new \Parse\ParseObject("_User");

        $random = $this->generateRandomString();
        $object->set('username', $random);
        $object->set('password', $random);

        $object->set('fbId', $userData['id']);
        $object->set('linkUrl', $userData['link']);
        $object->set('firstName', ucfirst($userData['first_name']));
        $object->set('firstNameLC', strtolower($userData['first_name']));
        $object->set('lastName', ucfirst($userData['last_name']));
        $object->set('lastNameLC', strtolower($userData['last_name']));
        $object->set('gender', $userData['gender']);
        $object->set('emailFB', $userData['email']);
        $object->set('regSource', 'web');
        $object->set('imageUrl', $userData['picture']);

        try {
            $object->save();
            return true;
        } catch (ParseException $e) {
            return false;
        }
    }

    function generateRandomString($length = 15)
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }
}