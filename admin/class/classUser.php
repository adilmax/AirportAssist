<?php

namespace airportAssUser;
require_once 'classParseSettings.php';


class user
{
    public function addUser($data)
    {
        $serviceListObject = new \Parse\ParseObject("AirportServiceList", $data['service']);
        $currencyObject = new \Parse\ParseObject("Airport_Currency", $data['currency']);
        $object = new \Parse\ParseObject("Airport_UserDetails");
        $domainName = $_SERVER['SERVER_NAME'];
        $object->set('domainName', $domainName);
        $object->set('originAirport', $data['originAirport']);
        $object->set('arrivalAirport', $data['arrivalAirport']);
        $object->set('flightType', $data['flightType']);
        $object->set('flightNumber', $data['flightNumber']);
        $object->set('transitFlightNumber', $data['transitFlightNumber']);
        $object->set('arrivalTime', $data['arrivalTime'] . "  " . $data['timing']);
        $object->set('service', $serviceListObject);
        $object->set('title', $data['title']);
        $object->set('firstName', $data['firstName']);
        $object->set('lastName', $data['lastName']);
        $object->set('email', $data['email']);
        $object->set('mobile', $data['mobile']);
        $object->set('message', $data['message']);
        $object->set('status', 1);
        $object->set('paymentStatus', false);
        $object->set('currency', $currencyObject);
        $object->set('classOfTravel', $data['classOfTravel']);
        $object->set('adult', ($data['adult'] != "") ? (int)$data['adult'] : 1);
        $object->set('children', ($data['children'] != "") ? (int)$data['children'] : 0);
        $object->set('infants', ($data['infants'] != "") ? (int)$data['infants'] : 0);
        $object->set('IsPickUp', (bool)$data['IsPickUp']);
        $object->set('pickUpOrDropAddress', $data['pickUpOrDropAddress']);
        try {
            $object->save();
            return $object->getObjectId();
        } catch (ParseException $ex) {
            return false;
        }
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

    public function getUserDetails($userId)
    {
        $query = new \Parse\ParseQuery("Airport_UserDetails");
        $query->includeKey('serviceType');
        $query->includeKey('service');
        $query->includeKey('vendorName');
        $query->includeKey('paymentMode');
         $query->includeKey('vendorCurrency');
        $query->equalTo('objectId', $userId);
        $results = $query->find();
        if (count($results) > 0) {
            return $results[0];
        } else {
            return false;
        }
    }


    public function updatePaymentStatus($conCode, $id)
    {
        $object = new \Parse\ParseObject("Airport_UserDetails", $conCode);
        $object->fetch();
        $object->set('transactionID', $id);
        $object->set('paymentStatus', true);
        $object->set('status', 3);
        $object->save();
    }

    public function updateAmount($conCode, $amount, $advance,$closedPersonName)
    {
        $object = new \Parse\ParseObject("Airport_UserDetails", $conCode);
        $object->fetch();
        $object->set('totalAmount', (int)$amount);
        $object->set('advanceAmount', (int)$advance);
        $object->set('status', 2);
        $object->set('closedPersonName', $closedPersonName);
        try {
            $object->save();
            return true;
        } catch (ParseException $ex) {
            return false;
        }
    }

    public function sendMailToAdmin($refNumber, $email)
    {
        $subject = 'Airport Assistance Enquiry';
        //$to = "contactus@murgency.com";
        $to = "s.markose@murgency.com ";
        $sentmessage = "New Enquiry has been submitted with the reference number $refNumber. ";
        // $to = "s.mather@murgency.com";
        //$to = "m.velyalan@murgency.com";
        $myfile = fopen("emailtemplateforadmin.html", "r") or die("Unable to open file!");
        $fileContent = fread($myfile, filesize("emailtemplateforadmin.html"));

        $fileContent2 = str_replace("[message]", $sentmessage, $fileContent);
        fclose($myfile);
        $headers = "From: Emergency Airport Assistance - <contact@emergencyairportassistance.com>" . "\r\n";
        $headers .= "Reply-To: " . strip_tags($email) . "\r\n";
        $headers .= "MIME-Version: 1.0\r\n";
        $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
        if (mail($to, $subject, $fileContent2, $headers)) {
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

    public function getAllAirportCurrency(){
        $query = new \Parse\ParseQuery("Airport_Currency");
        $query->limit(150);
        $query->ascending("currencyCode");
        return $query->find();
    }

    public function sendMailToUser($email, $name)
    {
        $subject = 'Your enquiry to Emergency Airport Assistance';
        $message = "Thank you for your enquiry. We are totally committed to providing the best airport assistance in all major Airports across the world. 
                                We will get back to you in the next few hours.";

        $myfile = fopen("emailtemplate.html", "r") or die("Unable to open file!");
        $fileContent = fread($myfile, filesize("emailtemplate.html"));
        $fileContent1 = str_replace("[name]", $name, $fileContent);
        $fileContent2 = str_replace("[message]", $message, $fileContent1);
        fclose($myfile);

        $headers = "From: Emergency Airport Assistance - <contact@emergencyairportassistance.com>" . "\r\n";
        $headers .= "Reply-To: " . strip_tags("MUAirportAssist@MUrgency.com") . "\r\n";
        $headers .= "MIME-Version: 1.0\r\n";
        $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
        if (mail($email, $subject, $fileContent2, $headers)) {
            return true;
        } else {
            return false;
        }

    }

    public function sendContactMessage($data)
    {
        $to = "MUAirportAssist@MUrgency.com";
        //$to = "m.velyalan@murgency.com";
        $subject = $data['subject'];
        $myfile = fopen("contactmailtemplate.html", "r") or die("Unable to open file!");
        $fileContent = fread($myfile, filesize("contactmailtemplate.html"));
        $fileContent1 = str_replace("[name]", $data['name'], $fileContent);
        $fileContent2 = str_replace("[email]", $data['email'], $fileContent1);
        $fileContent3 = str_replace("[subject]", $data['subject'], $fileContent2);
        $fileContent4 = str_replace("[message]", $data['message'], $fileContent3);
        fclose($myfile);

        $headers = "From: Emergency Airport Assistance - <contact@emergencyairportassistance.com>" . "\r\n";
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

    public function getAllRequest($fromDate, $toDate, $page, $firstName, $lastName, $email, $mobile, $status)
    {

        $query = new \Parse\ParseQuery("Airport_UserDetails");
        $query->notEqualTo("isDelete", true);
        $skip = ($page - 1) * 100;
        if ($fromDate != '') {
            $query->greaterThanOrEqualTo('createdAt', array("__type" => "Date", "iso" => date('Y-m-d\Th:i:s', $fromDate)));
        }
        if ($toDate != '') {
            $query->lessThanOrEqualTo('createdAt', array("__type" => "Date", "iso" => date('Y-m-d\Th:i:s', $toDate)));
        }
        if ($firstName != "") {
            $query->equalTo('firstName', $firstName);
        }
        if ($lastName != "") {
            $query->equalTo('lastName', $lastName);
        }
        if ($email != "") {
            $query->equalTo('email', $email);
        }
        if ($mobile != "") {
            $query->equalTo('mobile', $mobile);
        }
        if ($status != "") {
            $query->equalTo('status', (int)$status);
        }
        $query->skip($skip);
        $query->limit(100);
        $query->descending("createdAt");
        $results = $query->find();
        return $results;
    }

    public function getAllRequestCount($fromDate, $toDate)
    {
        $query = new \Parse\ParseQuery("Airport_UserDetails");
        $query->notEqualTo("isDelete", true);
        if ($fromDate != '') {
            $query->greaterThanOrEqualTo('createdAt', array("__type" => "Date", "iso" => date('Y-m-d\Th:i:s', $fromDate)));
        }
        if ($toDate != '') {
            $query->lessThanOrEqualTo('createdAt', array("__type" => "Date", "iso" => date('Y-m-d\Th:i:s', $toDate)));
        }
        $query->descending("createdAt");
        return $query->count();
    }

    public function getDubaiTime($time)
    {

        $UTC = new \DateTimeZone("UTC");
        $newTZ = new \DateTimeZone("Asia/Dubai ");
        $date = new \DateTime($time, $UTC);
        $date->setTimezone($newTZ);
        return $date->format('Y-m-d h:i:s a');
    }

    public function getAllCorporateTravelDetails($type)
    {
        if ($type == "") {
            $queryAgent = new \Parse\ParseQuery("_User");
            $queryAgent->equalTo('isAgent', true);

            $queryCorporate = new \Parse\ParseQuery("_User");
            $queryCorporate->equalTo('isCorporate', true);

            $queryResponder = new \Parse\ParseQuery("_User");
            $queryResponder->equalTo('isAirportResponder', true);

            $mainQuery = \Parse\ParseQuery::orQueries([$queryCorporate, $queryAgent, $queryResponder]);
            $mainQuery->descending("createdAt");
            $results = $mainQuery->find();

            return $results;
        } else {
            $query = new \Parse\ParseQuery("_User");
            if ($type == 2) {
                $query->equalTo('isAgent', true);
            } elseif ($type == 1) {
                $query->equalTo('isCorporate', true);
            } else {
                $query->equalTo('isAirportResponder', true);
            }
            $query->descending("createdAt");
            $results = $query->find();

            return $results;
        }
    }

    public function deleteRequest($objectID)
    {
        $object = new \Parse\ParseObject("Airport_UserDetails", $objectID);
        $object->set('isDelete', true);
        $object->save();
        return true;
    }

    public function getServiceTypes($serviceType)
    {
        $query = new \Parse\ParseQuery("AirportServiceType");
        $query->equalTo('title', $serviceType);
        $result = $query->find();

        if (count($result) > 0) {
            $result = $result[0]->getObjectId();
            return $result;
        } else {
            return false;
        }

    }

    public function getServiceList($serviceType)
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

    public function updateUserDetails($userObject, $data)
    {
        $object = new \Parse\ParseObject("Airport_UserDetails", $userObject);
        if($data["vendorName"] != ""){
            $vendorObject = new \Parse\ParseObject("VendorList",$data["vendorName"]);
             $object->set('vendorName',$vendorObject);
        }
        if($data['vendorCurrency'] != ""){
            $vendorCurrencyObject = new \Parse\ParseObject("Airport_Currency",$data["vendorCurrency"]);
            $object->set('vendorCurrency',$vendorCurrencyObject);
       
        }
        if($data['paymentMode'] != ""){
            $paymentModeObject = new \Parse\ParseObject("PaymentMode",$data["paymentMode"]);
             $object->set('paymentMode',$paymentModeObject);
        }

        $object->set('originAirport', $data['updateOriginAirport']);
        $object->set('arrivalAirport', $data['updateArrivalAirport']);
        $object->set('flightType', $data['updateFlightType']);
        if ($data['updateFlightType'] == "3") {
            $object->set('transitFlightNumber', $data['updateTransitFlightNumber']);
        }
        $object->set('flightNumber', $data['updateFlightNumber']);
        $object->set('adult', ($data['updateAdults'] != "") ? (int)$data['updateAdults'] : 0);
        $object->set('children', ($data['updateChildren'] != "") ? (int)$data['updateChildren'] : 0);
        $object->set('infants', ($data['updateInfants'] != "") ? (int)$data['updateInfants'] : 0);
        $object->set('classOfTravel', $data['updateClassOfTravel']);
        $object->set('arrivalTime', $data['updateArrivalDateAndTime']);
        $object->set('departureTime', $data['updateDepartureDateAndTime']);
        if ($data['updateServiceType'] != "") {
            $serviceTypeObject = new \Parse\ParseObject("AirportServiceType", $data['updateServiceType']);
            $object->set('serviceType', $serviceTypeObject);
        }
        if ($data['updateService'] != "") {
            $serviceListObject = new \Parse\ParseObject("AirportServiceList", $data['updateService']);
            $object->set('service', $serviceListObject);
        }
        if (isset($data['updateIsPickUp'])) {
            if ($data['updateIsPickUp'] != "")
                $object->set('IsPickUp', (bool)$data['updateIsPickUp']);
        }
        if (isset($data['updatePickUpOrDropAddress'])) {
            if ($data['updatePickUpOrDropAddress'] != "")
                $object->set('pickUpOrDropAddress', $data['updatePickUpOrDropAddress']);
        }

		if ( $data['isRepeatCustomer']==true )
		{
            $object->set('isRepeatCustomer', true);
		}
		else
		{
			$object->set('isRepeatCustomer', false);
		}


        $object->set('title', $data['updateTitle']);
        $object->set('firstName', $data['updateFirstName']);
        $object->set('lastName', $data['updateLastName']);
        $object->set('email', $data['updateEmailId']);
        $object->set('mobile', $data['updateCountryCode'] . " - " . $data['updateMobileNumber']);
        $object->set('message', $data['updateMessage']);
        $object->set('status', (int)$data['status']);
        $object->set('comment', $data['comment']);

 
        $object->set('vendorAmount',($data['vendorAmount'] != "") ? (int)$data['vendorAmount'] : 0);
        if($data['greeterName'] != ""){
            $object->set('greeterName',$data['greeterName']);
        }
        if($data['greeterNumber'] != ""){
            $object->set('greeterNumber',(int)$data['greeterNumber']);
        }
        try {
            $object->save();
            return $object->getObjectId();
        } catch (ParseException $ex) {
            return false;
        }
    }


	public function addVendor($data)
	{
		$object = new \Parse\ParseObject("VendorList");

        $object->set('name', strtolower($data['name']));
		$object->set('email', strtolower($data['email']));
		$object->set('contactPerson', strtolower($data['contactPerson']));
		$object->set('contactNo', $data['contactNo']);
		$object->set('status', true);

        try {
            $object->save();
            return $object->getObjectId();
        } catch (ParseException $ex) {
            return false;
        }
	}


	public function updateVendorDetails($vendorObject, $data)
    {
        $object = new \Parse\ParseObject("VendorList", $vendorObject);
        
		$object->set('name', strtolower($data['name']));
		$object->set('email', strtolower($data['email']));
		$object->set('contactPerson', strtolower($data['contactPerson']));
		$object->set('contactNo', $data['contactNo']);
		$object->set('status', true);

        try {
            $object->save();
			return true;
        } catch (ParseException $ex) {
            return false;
        }
    }

	public function getVendorDetails($id)
	{
        $query = new \Parse\ParseQuery("VendorList");
		$query->equalTo('objectId', $id);
        $results = $query->find();
        if (count($results) > 0) {
            return $results[0];
        } else {
            return false;
        }
    }

    public function getVendorList($page="", $limit="", $name="", $email="", $contactNo="", $status="")
	{
        $query = new \Parse\ParseQuery("VendorList");
		$query->notEqualTo("status", false);
        $skip = ($page - 1) * 100;
		$limit = $limit == "" ? 100 : $limit;

		if ($name != "") {
            $query->startsWith('name', strtolower($name));
        }
		if ($email != "") {
            $query->startsWith('email', strtolower($email));
        }
		if ($contactNo != "") {
            $query->startsWith('contactNo', $contactNo);
        }
		$query->skip($skip);
		$query->limit($limit);
        $query->ascending("name");
        $results = $query->find();
		return $results; 
    }

	public function getVendorListCount()
    {
		$query = new \Parse\ParseQuery("VendorList");
		$query->notEqualTo("status", false);
		$query->ascending("name");
		return $query->count();
    }	

	public function deleteVendor($objectID)
    {
        $object = new \Parse\ParseObject("VendorList", $objectID);
        $object->set('status', false);
        $object->save();
        return true;
    }


    /*public function getPaymentMode(){
        $query = new \Parse\ParseQuery("PaymentMode");
        $query->ascending("paymentTitle");
        return $query->find();
    }*/


    public function getPaymentMode($paymentModeCode, $paymentTitle, $paymentStatus)
    {
        $query = new \Parse\ParseQuery("PaymentMode");
        $query->equalTo('status', true);
        if ($paymentModeCode != "") {
            $query->startsWith('objectId', $paymentModeCode);
        }
        if ($paymentTitle != "") {
            $query->startsWith('paymentTitle', strtolower($paymentTitle));
        }
        if ($paymentStatus != "") {
            $query->equalTo('status', $paymentStatus);
        }
        $query->limit(100);
        $query->descending("createdAt");
        return $query->find();
    }

    public function getPaymentModeDetails($paymentModeId)
    {
        $query = new \Parse\ParseQuery("PaymentMode");
        $query->equalTo('objectId',$paymentModeId);
        $result = $query->find();

        if (count($result) > 0){
            return $result[0];
        }else{
            return false;
        }
    }

    public function setPaymentMode($paymentTitle)
    {
        $object = new \Parse\ParseObject("PaymentMode");
        $object->set('paymentTitle', strtolower($paymentTitle));
        $object->set('status', true);
        try {
            $object->save();
            return $object->getObjectId();
        } catch (ParseException $ex) {
            return false;
        }
    }

    public function updatePaymentModeTitle($paymentModeId,$paymentModeTitle)
    {
        $object = new \Parse\ParseObject("PaymentMode", $paymentModeId);
        $object->fetch();
        $object->set('paymentTitle', strtolower($paymentModeTitle));
        try {
            $object->save();
            return $object->getObjectId();
        } catch (ParseException $ex) {
            return false;
        }
    }

    public function deletePaymentMode($paymentModeId)
    {
        $object = new \Parse\ParseObject("PaymentMode", $paymentModeId);
        $object->set('status', false);
        try {
            $object->save();
            return $object->getObjectId();
        } catch (ParseException $ex) {
            return false;
        }
    }

    public function updatePaymentMode($paymentModeId)
    {
        $object = new \Parse\ParseObject("PaymentMode", $paymentModeId);
        $object->fetch();
        $object->set('status', false);
        try {
            $object->save();
            return $object->getObjectId();
        } catch (ParseException $ex) {
            return false;
        }
    }
}