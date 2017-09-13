<?php

namespace airportAssSearch;


class ClassAirportSearch
{
    public function getAirportSearchDetails($name)
    {
        $query1 = new \Parse\ParseQuery("Airport_Detail");
        $query1->startsWith('IATA', strtoupper(strip_tags($name)));
        $query2 = new \Parse\ParseQuery("Airport_Detail");
        $query2->startsWith('airportName', ucfirst(strip_tags($name)));
        $query3 = new \Parse\ParseQuery("Airport_Detail");
        $query3->startsWith('locationServed', ucfirst(strip_tags($name)));
        $query = \Parse\ParseQuery::orQueries([$query1, $query2, $query3]);
        $query->ascending("IATA");
        $results = $query->find();
        for ($i = 0; $i < count($results); $i++) {
            $object = $results[$i];
            $data[] = array(
                'label' => $object->locationServed . "-" . $object->airportName . ' (' . $object->IATA . ')',
                'value' => $object->locationServed . "-" . $object->airportName . ' (' . $object->IATA . ')'
            );
        }
        return $data;
    }

    public function getAirportName($name)
    {
        $query1 = new \Parse\ParseQuery("Airport_Detail");
        $query1->startsWith('IATA', strtoupper(strip_tags($name)));
        $query2 = new \Parse\ParseQuery("Airport_Detail");
        $query2->startsWith('airportName', ucfirst(strip_tags($name)));
        $query3 = new \Parse\ParseQuery("Airport_Detail");
        $query3->startsWith('locationServed', ucfirst(strip_tags($name)));
        $query = \Parse\ParseQuery::orQueries([$query1, $query2, $query3]);
        $query->ascending("IATA");
        $results = $query->find();
        for ($i = 0; $i < count($results); $i++) {
            $object = $results[$i];
            $data[] = array(
                'label' => $object->airportName ,
                'value' => $object->airportName
            );
        }
        return $data;
    }



}