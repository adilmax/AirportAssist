<?php
if (isset($_POST['rml'])) {
    if (isset($_POST['email']) && !$_POST['email'] == "") {
        if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            require_once 'class/classAirportsubscription.php';
            $subscriptionModal = new airportSubscribe\subscribe;
            $result = $subscriptionModal->addSubscribe($_POST['email']);
            print $result;
        } else {
            print 3;
        }
    } else {
        print 4;
    }
} else {
    require_once 'class/classParseSettings.php';
    require_once 'class/classTestimonial.php';


    $userTestimonial = new airportAssTestimonial\testimonial;

    $testimonial = $userTestimonial->fetchTestimonial();


    require_once('html/appcampaign.php');
}