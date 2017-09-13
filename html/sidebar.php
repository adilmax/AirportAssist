<?php
$general = '';
$currentAdd = '';
$workExp = '';
$refernace = "";
switch($title){
    case "Personal Info":
        $general = 'bg_color_sidebar';
        break;
    case "Current Address":
        $currentAdd = 'bg_color_sidebar';
        break;
    case "Work And Education":
        $workExp = 'bg_color_sidebar';
        break;
    case "References":
        $refernace = 'bg_color_sidebar';
        break;       
}
?>

<div id="sidebar">
    <ul>
    <li class="sidebar_title  <?=$general;?>"><a href="generalinfo">Personal Info</a></li>
    <li class="sidebar_title <?=$currentAdd;?>"><a href="currentaddress">Address / ID Info</a></li>
    <li class="sidebar_title <?=$workExp;?>"><a href="workexperience">Work and Education</a></li>
    <li class="sidebar_title <?=$refernace;?>"><a href="references">References</a></li>
    </ul>
</div>
