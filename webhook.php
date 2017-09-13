<?php
require_once 'class/classParseSettings.php';
$input = @file_get_contents("php://input");
$event_json = json_decode($input);

$query = new \Parse\ParseObject("temp");
$query->set("dump",$event_json);
$query->save();

?>