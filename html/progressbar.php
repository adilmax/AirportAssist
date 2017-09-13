<? $currentUser = Parse\ParseUser::getCurrentUser();
    $responderStatus = false;
    $addressStatus = false;
    $workStatus = false;
    $referencesStatus = false;
    if($currentUser->responderInfo != ""){
        $responderStatus = true;
    }
    if($currentUser->backgroundInfo != ""){
        $addressStatus = true;
    }
    if($currentUser->airportWorkEducation != ""){
        $workStatus = true;
    }
    if($currentUser->references != ""){
        $referencesStatus = true;
    }
?>
<div class="progress" style="margin-top: 20px;height:30px;">
    <div class=" progress-bar <?=($responderStatus)?"progress-bar-success":"progress-bar-danger";?> active" role="progressbar" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" style="width:25%;line-height: 30px;">
        Personal Info
    </div>
    
    <div class="progress-bar <?=($addressStatus)?"progress-bar-success":"progress-bar-danger";?>  active" role="progressbar" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" style="width:25%;line-height: 30px;">
        Address / ID Info
    </div>
    
    <div class="progress-bar <?=($workStatus)?"progress-bar-success":"progress-bar-danger";?> active" role="progressbar" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" style="width:25%;line-height: 30px;">
        Work & Education
    </div>
    <div class="progress-bar <?=($referencesStatus)?"progress-bar-success":"progress-bar-danger";?> active" role="progressbar" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" style="width:25%;line-height: 30px;">
       References
    </div>
</div>