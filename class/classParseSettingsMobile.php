<?php

/*
 * Parse setting
 * API ID..
 * REST KEY..
 * MASTER KEY..
 */
require 'autoload.php';

//Production database with credentials back.end@murgency.com
//$app_id = "39oUadt1lTe3jHHB26X0ixwnxK7UoQOt0XDG1SMq";
//$rest_key = "HqE9BszSIWNc6LLUsuTzZX0rb7TAIxhBznU6mqeB";
//$master_key = "TSEegBOgoSVd3nGuZHLjY6LHeYbFLuAeZpBZvMun";

//Production database with credentials m.velyalan@murgency.com
$app_id = "Kr7ewDJoT9YafYaz4a2rq0Q9kumLepaHC6UcJeGo";
$rest_key = "nvm2PSfhJ26FLDwNt2jpNaRmw14HZwC1JWBhfvH6";
$master_key = "CVaBMyigDkwFVYLOjucedcyKUk3QYvnYej2IwMJe";

//Development database with credentials m.velyalan@murgency.com
//$app_id = "QhBYbWUeqG5aZdGskdPHjk51TqAT4mAKxRBNlsvZ";
//$rest_key = "pwgrNOPFogpwer0JTjOY6zErFQCvtlRKeMQ6SEzZ";
//$master_key = "e8oLk1pAyoU8Ql8AR2OsnzcXPsiD73gKm1bk1jI4";

//--
//app_id = "valY2dudZqq60SwiMbGECN3N00pv2qaiN31wrzzl";
//$rest_key = "DJN5MfZWcPxM3LWhiGIGdTAYSxTHAtU6gzhP5Oi5";
//$master_key = "DBBcClSxne53FmfeACRux1XVtuciPsGGCEIJbWx0";

//$master_key = '';

session_start();

//Inetialze the Parseclient for processing the request..
Parse\ParseClient::initialize( $app_id, $rest_key, $master_key );
Parse\ParseClient::setServerURL('https://parseapi.back4app.com/');

