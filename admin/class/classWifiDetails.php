<?php


namespace airportWifi;

use Parse\ParseObject;
use Parse\ParseQuery;

require_once 'classParseSettings.php';


class wifiDetails
{
    public function addWifiDetails($data)
    {
        $object = new \Parse\ParseObject('WifiDetails');
        $airportId = $this->getAirportId($data['airportName']);

        if ($airportId != false) {
            $object->set("airportId", $airportId);
            $object->set("password", $data["password"]);
            $object->set("network", $data["network"]);
            $object->set("locationLounge", $data["locationLounge"]);
            $object->set("airwaysLounge", $data["airwaysLounge"]);
            $object->set("details", $data["details"]);
            $object->set("freeWifi", $data["freeWifi"]);
            $object->set("timeLimit", $data["timeLimit"]);

            $object->save();

            $this->updateAirportDetails($airportId,$object);

            return true;


        } else {
            return false;
        }

    }

    public function getAirportId($airportName)
    {
        $query = new \Parse\ParseQuery('Airport_Detail');
        $query->equalTo('airportName', $airportName);
        $result = $query->find();

        if (count($result) > 0) {
            return $result[0];
        } else {
            return false;
        }
    }

    public function updateAirportDetails($airportId, $wifiObject)
    {
        $object = new \Parse\ParseObject("Airport_Detail", $airportId->getObjectId());
        $object->fetch();
        $wifiDetails = [];
        $wifiDetails = $object->wifiDetails;

        if (count($wifiDetails) > 0) {
            array_push($wifiDetails, $wifiObject);
        } else {
            $wifiDetails = [$wifiObject];
        }

        $object->setArray('wifiDetails',$wifiDetails);
        $object->set('hasWifi',true);
        $object->set('showWifi',true);

        $object->save();
    }
    public function getWifiDetails($airportName){
        $query = new \Parse\ParseQuery('Airport_Detail');
        $query->equalTo('airportName', $airportName);
        $result = $query->find();
        
        if (count($result) > 0) {
            return $result[0];
        } else {
            return false;
        }
    }

}