<?php
namespace airportAssTestimonial;

class testimonial{
    public function fetchTestimonial(){
        $query = new \Parse\ParseQuery("AirportTestimonial");
        $query->equalTo('status', true);
        $query->ascending("priority");
        $results = $query->find();
        return $results;
    }
}