<?php

/*
 * Parse setting
 * API ID..
 * REST KEY..
 * MASTER KEY..
 */
require 'autoload.php';

$app_id = "39oUadt1lTe3jHHB26X0ixwnxK7UoQOt0XDG1SMq";
$rest_key = "HqE9BszSIWNc6LLUsuTzZX0rb7TAIxhBznU6mqeB";
$master_key = "TSEegBOgoSVd3nGuZHLjY6LHeYbFLuAeZpBZvMun";

/*$app_id = "valY2dudZqq60SwiMbGECN3N00pv2qaiN31wrzzl";
$rest_key = "DJN5MfZWcPxM3LWhiGIGdTAYSxTHAtU6gzhP5Oi5";
$master_key = "DBBcClSxne53FmfeACRux1XVtuciPsGGCEIJbWx0";*/

//$master_key = '';

session_start();

//Inetialze the Parseclient for processing the request..
Parse\ParseClient::initialize( $app_id, $rest_key, $master_key );
Parse\ParseClient::setServerURL('https://parseapi.back4app.com/');

