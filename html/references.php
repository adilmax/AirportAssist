<?php
$title = "References";
require_once('responder_header.php');
?>

<!--<div class="row">
    <div class="middle_image">
        <div></div>
    </div>
</div> -->
<div class="row margin-registration">
    <div class="container-fluid registration_main_contant_bgcolor">
        <div class="col-lg-2 col-md-2 col-xs-12 nopadding">
            <?php require_once('sidebar.php');?>
        </div>
        <div class="col-lg-10 col-md-10 col-xs-12 registration_right_contant_bgcolor" >
            <? include("html/progressbar.php");?>
            <form action="" method="post" class="form-horizontal form_top" enctype="multipart/form-data">
                <fieldset class="padding-fieldset">
                    <legend>Reference 1</legend>  
                    <div class="form-group">
                        <? if($status){?>
                            <div class="alert alert-success" id="success-alert">
                                <button type="button" class="close" data-dismiss="alert">x</button>
                                <?=$message;?>
                            </div>
                        <? }?>
                        <?                    
                        if(count($error)>0){?>
                            <ul class="list-group">
                                <?for($i=0;$i<count($error);$i++){?>
                                    <li class="list-group-item list-group-item-danger noborder" ><?=$error[$i];?></li>
                                <?}?>
                            </ul>
                        <?}?>
                    </div>
                    <div class="form-group">
                        <div class="col-lg-4 control-label">Name of the Reference:<span class="asteric">*</span></div>
                        <div class=" col-lg-6">
                            <input type="text" class="form-control field_color place_holder" id="reftName" placeholder="Name of the Reference" name="reftName" 
                                   accept=""data-validation="required" 
                                   accesskey=""data-validation-error-msg-required="You must enter name of the reference"
                                   value="<?=$reftName;?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-lg-4 control-label">Designation:</div>
                        <div class=" col-lg-6">
                            <input type="text" class="form-control field_color place_holder" id="designation" placeholder="Designation" name="designation"
                                   value="<?=$title2;?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-lg-4 control-label">Email:<span class="asteric">*</span></div>
                        <div class=" col-lg-6">
                            <input type="email" class="form-control field_color place_holder" id="email" placeholder="Email" name="email" 
                                   accept=""data-validation="required email" 
                                data-validation-error-msg-required="You must enter Email"
                                value="<?=$email;?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-lg-4 control-label">Name of the Company / Institution:<span class="asteric">*</span></div>
                        <div class=" col-lg-6">
                            <input type="text" class="form-control field_color place_holder" id="comName" placeholder="Name of the Company / Institution" name="comName"
                                   accept=""data-validation="required" 
                                   accesskey=""data-validation-error-msg-required="You must enter name of the company / institution"
                                   value="<?=$comName;?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-lg-4 control-label ">Mobile Number:<span class="asteric">*</span></div>
                        <div class=" col-lg-6">
                            <input type="text" class="form-control field_color place_holder" id="mobNumber" placeholder="Mobile Number" name="mobNumber" 
                                    data-validation="required number length" 
                                    data-validation-length="8-15"  
                                    data-validation-error-msg-length="Minimum length should be 8"
                                    data-validation-error-msg-required="You must enter a mobile number"
                                    value="<?=$mobNumber;?>">
                        </div>
                    </div>
                </fieldset>
                <fieldset>
                    <legend>Reference 2</legend>                     
                    <div class="form-group">
                        <div class="col-lg-4 control-label ">Name of the Reference:<span class="asteric">*</span></div>
                        <div class=" col-lg-6">
                            <input type="text" class="form-control field_color place_holder" id="reftName1" placeholder="Name of the Reference" name="reftName1" 
                                   accept=""data-validation="required" 
                                   accesskey=""data-validation-error-msg-required="You must enter name of the reference"
                                   value="<?=$reftName1;?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-lg-4 control-label">Designation:</div>
                        <div class=" col-lg-6">
                            <input type="text" class="form-control field_color place_holder" id="designation1" placeholder="Designation" name="designation1"                                    
                                   value="<?=$title1;?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-lg-4 control-label">Email:<span class="asteric">*</span></div>
                        <div class=" col-lg-6">
                            <input type="email" class="form-control field_color place_holder" id="email1" placeholder="Email" name="email1"
                                   accept=""data-validation="required email" 
                                data-validation-error-msg-required="You must enter email"
                                   value="<?=$email1;?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-lg-4 control-label">Name of the Company / Institution:<span class="asteric">*</span></div>
                        <div class=" col-lg-6">
                            <input type="text" class="form-control field_color place_holder" id="comName1" placeholder="Name of the Company / Institution" name="comName1"
                                   accept=""data-validation="required" 
                                   accesskey=""data-validation-error-msg-required="You must enter name of the company / institution"                                   
                                   value="<?=$comName1;?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-lg-4 control-label ">Mobile Number:<span class="asteric">*</span></div>
                        <div class=" col-lg-6">
                            <input type="text" class="form-control field_color place_holder" id="mobNumber1" placeholder="Mobile Number" name="mobNumber1" 
                                   data-validation="required number length" 
                                    data-validation-length="8-15"  
                                    data-validation-error-msg-length="Minimum length should be 8"
                                    data-validation-error-msg-required="You must enter a Mobile Number"
                                    value="<?=$mobNumber1;?>">
                        </div>
                    </div>
                </fieldset>
                <div class="form-group">
                    <div class="col-lg-offset-3 col-lg-6">
                        <input type="submit" class="btn btn-default register_button" name="submit" value="Submit" id="submit">
                    </div>
                </div>        
            </form>
        </div>
    </div>
</div>
<?php require_once('responder_footer.php');?>
<script type="text/javascript">   
    $(function() {
       $.validate();   
    }); 
    
    $(function() {
    setTimeout(function() {
        $("#success-alert").hide('blind', {}, 500)
    }, 2000);
});
</script>