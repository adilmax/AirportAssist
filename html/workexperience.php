<?php
$title = "Work And Education";
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
                    <legend>Work And Education</legend>
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
                        <div class="col-lg-4 control-label">Level of Education:<span class="asteric">*</span></div>
                        <div class="col-lg-6">
                            <select name="educationLevel" id="educationLevel" class="form-control field_color place_holder" accept="" data-validation="required" 
                            data-validation-error-msg-required="You select level of education">
                                <option value="" selected="selected">Select Value </option>
                                <?php foreach($education as $key=>$value){?>
                                <option value="<?=$key;?>" <?=($educationLevel != "")?(($educationLevel == $key)?"selected":""):"";?>><?=$value;?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div id="education" class="<?=($educationLevel == 5)?"":"hideField";?>">
                    <div class="form-group ">
                        <div class="col-lg-4 control-label ">Other Education:</div>
                        <div class=" col-lg-6">
                            <input type="text" value="<?=$otherEdu;?>" class="form-control field_color place_holder" name="otherEdu" id="otherEdu" placeholder="Your Education">
                        </div>
                    </div>
                    </div>
                    <div class="form-group ">
                        <div class="col-lg-4 control-label">Field of Education:<span class="asteric">*</span></div>
                        <div class=" col-lg-6">
                            <input type="text" value ="<?=$educationField;?>" class="form-control field_color place_holder" name="educationField" id="educationField" placeholder="Field of Education" accept=""data-validation="required" 
                            data-validation-error-msg-required="You must enter field of education">
                        </div>
                    </div>
                    <div class="form-group ">
                        <div class="col-lg-4 control-label ">Additional Qualification:</div>
                        <div class=" col-lg-6">
                            <input type="text" value ="<?=$addQualification;?>" class="form-control field_color place_holder" name="addQualification" id="addQualification" placeholder="Additional Qualification">
                        </div>
                    </div>
                    <div class="form-group ">
                        <div class="col-lg-4 control-label">Occupation:<span class="asteric">*</span></div>
                        <div class=" col-lg-6">
                            <input type="text" value ="<?=$occupation;?>" class="form-control field_color place_holder" name="occupation" id="occupation" placeholder="Occupation" accept=""data-validation="required" 
                            data-validation-error-msg-required="You must enter occupation">
                        </div>
                    </div>
                     <div class="form-group ">
                        <div class="col-lg-4 control-label ">Airport Work Experience:<span class="asteric">*</span></div>
                        <div class="col-lg-6 field_color place_holder">                              
                                <input type="radio"  name="conditionExp" id="expNo" value="0" <?=($airWorkExp ==false)?"checked":"";?>> No
                                <input type="radio"  name="conditionExp" id="expYes" value="1" <?=($airWorkExp ==true)?"checked":"";?>> Yes                            
                        </div>
                    </div>
                    <div id="expDiv" class="<?=($airWorkExp)?"":"hideField";?>">
                        <div class="form-group ">
                            <div class="col-lg-4 control-label ">Airport Name:<span class="asteric">*</span></div>
                            <div class=" col-lg-6">
                                <input type="text" value ="<?=$expAirName;?>" class="form-control field_color place_holder" name="expAirName" id="expAirName" placeholder="Airport Name">
                                <div id="airportName_error" class="dispaly_none" style="color:#a94442;"></div>
                            </div>
                            
                        </div>

                        <div class="form-group">
                            <div class="col-lg-4 control-label">Designation:<span class="asteric">*</span></div>
                            <div class=" col-lg-6">
                                <input type="text" value ="<?=$designation;?>" class="form-control field_color place_holder" id="designation" placeholder="Designation" name="designation">
                                 <div id="designation_error" class="dispaly_none" style="color:#a94442;"></div>
                            </div>
                           
                        </div>
                         <div class="form-group">
                            <div class="col-lg-4 control-label ">Years of Airport Work Experience:<span class="asteric">*</span></div>
                            <div class="col-lg-6">
                                <input type="number" name="yearExp" id="yearExp" value ="<?=$yearExp;?>" class="form-control field_color place_holder" placeholder="Years of Airport Work Experience" min="1" max="2">
                                <div id="yearsOfExp_error" class="dispaly_none" style="color:#a94442;"></div>
                            </div>                            
                        </div>
                        <div class="form-group">
                            <div class="col-lg-4 control-label ">Airport ID Front Image:<span class="asteric">*</span></div>
                            <div class="col-lg-6">
                                
                                <input type="file" class="field_size small" id="front_image" name="front_image" />
                                <div id="front_image_error" class="dispaly_none" style="color:#a94442;"></div>
                                <div class="small">Note:Please upload image with type:JPEG/PNG/PDF.Total size of files 500KB.</div> 
                                <? if($airportIDFrontStatus){?>
                                    <a href="<?= $airportIDFrontUrl;?>" target="_blank" class="small"> View Attached File</a>
                                <? } ?>
                            </div>                    
                        </div>
                        <div class="form-group">
                            <div class="col-lg-4 control-label ">Airport ID Back Image:<span class="asteric">*</span></div>
                            <div class="col-lg-6">
                                
                                <input type="file" class="field_size small" id="back_image" name="back_image"  />
                                <div id="back_image_error" class="dispaly_none" style="color:#a94442;"></div>
                                <div class="small">Note:Please upload image with type:JPEG/PNG/PDF.Total size of files 500KB.</div>  
                                <? if($airportIDBackStatus){?>
                                    <a href="<?= $airportIDBackUrl;?>" target="_blank" class="small"> View Attached File</a>
                                <? } ?>
                            </div>

                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-lg-4 control-label">Available to Join From:</div>
                        <div class="col-lg-6 ">  
                            <input type="text"  name="joinDate" id="joinDate" value ="<?=$joinDate;?>" class="form-control date_bgcolor field_color place_holder" placeholder="Choose Date">
                        </div>                       
                    </div>
                    
                    <div class="form-group">
                        <div class="col-lg-4 control-label ">CPR Trained :</div>
                        <div class="col-lg-6 field_color place_holder">                           
                                <input type="radio"  name="crptrained" id="crptrainedNo" value="0" <?=($crptrained == false)?"checked":"";?>> No
                                <input type="radio"  name="crptrained" id="crptrainedYes" value="1" <?=($crptrained == true)?"checked":"";?>> Yes 
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-lg-4 control-label ">Clearance to Work at Airport:</div>
                        <div class="col-lg-6 field_color place_holder">
                                <input type="radio"  name="condition" id="conditionNo" value="0" <?=($clearance == false)?"checked":"";?>> No
                                <input type="radio"  name="condition" id="conditionYes" value="1" <?=($clearance == true)?"checked":"";?>> Yes 
                        </div>
                    </div>
                    <div id="workDiv" class="<?=($clearance)?"":"hideField";?>">
                    <div class="form-group ">
                        <div class="col-lg-4 control-label ">Airport Name:<span class="asteric">*</span></div>
                        <div class=" col-lg-6">
                            <input type="text" value ="<?=$airportName;?>" class="form-control field_color place_holder" name="airportName" id="airportName" placeholder="Enter Airport Name">
                        </div>
                    </div>
                    </div>
                    <div class="form-group">
                        <div class="col-lg-4 control-label">Education Certificates:</div>
                        <div class="col-lg-6">
                            
                            <input type="file" class="field_color place_holder small" id="eduCertificate" name="eduCertificate" />
                            <div id="image_error" class="dispaly_none" style="color:#a94442;"></div>
                            <div class="small">Note:Please upload image with type:JPG/PNG/PDF.Total size of files 500KB.</div>
                            <? if($eduCertificateStatus){?>
                            <a href="<?= $eduCertificateUrl;?>" target="_blank" class="small"> View Attached File</a>
                            <? } ?>
                    </div>
                    </div>
                    <div class="form-group">
                        <div class="col-lg-4 control-label ">Experience Certificate:</div>
                        <div class="col-lg-6">
                            
                            <input type="file" class="field_color place_holder small" id="expCertificate" name="expCertificate" />
                            <div id="image_error1" class="dispaly_none" style="color:#a94442;"></div>
                            <div class="small">Note:Please upload image with type:JPG/PNG/PDF.Total size of files 500KB.</div>
                            <? if($eduCertificateStatus){?>
                            <a href="<?= $eduCertificateUrl;?>" target="_blank" class="small"> View Attached File</a>
                            <? } ?>
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
    //date picker for Join date 
     $(function() {
        var start = new Date();
        start.setFullYear(start.getFullYear() - 100);
        
        var end = new Date();
        end.setFullYear(end.getFullYear());       
        
        $('#joinDate').datepicker({
            changeMonth: true,
            changeYear: true,
            minDate: start,
           
            yearRange: start.getFullYear() + ':' + end.getFullYear()
        });
    
    //show and hide secound part of work expirence
    
        $("input[name='condition']").click(function () {
            if ($("#conditionYes").is(":checked")) {                
               $("#workDiv").show();
               }else if(workDiv !==""){
               $("#workDiv").hide();
               }else{               
                $("#workDiv").show();
            }
        });
    
  

//validation and autosearch airport....
   
        $.validate();
    
    $('#expAirName').autocomplete ({source:'airportsearch.php', minLength:1});
    $('#airportName').autocomplete ({source:'airportsearch.php', minLength:1});
 
    // Upload file image validation ...
    
    $("document").ready(function(){    
    $("#eduCertificate").change(function() {        
        var image = $("#eduCertificate").val();
        var fileType = image.split('.').pop().toUpperCase();    
        if(image.length > 1){
            if(fileType === "PNG" || fileType === "JPG" || fileType === "JPEG" || fileType === "PDF"){
                $("#image_error").hide();
                $('#submit').removeAttr('disabled');
               }else{
                $("#image_error").html("File type supported png, jpg, pdf");
                $("#image_error").show();
                $('#submit').attr('disabled','disabled');
           }        
        }    
    });
});
 $("document").ready(function(){    
    $("#expCertificate").change(function() {        
        var image = $("#expCertificate").val();
        var fileType = image.split('.').pop().toUpperCase();    
        if(image.length > 1){
            if(fileType === "PNG" || fileType === "JPG" || fileType === "JPEG" || fileType === "PDF"){
                $("#image_error1").hide();
                $('#submit').removeAttr('disabled');
                }else{
                $("#image_error1").html("File type supported png, jpg, pdf");
                $("#image_error1").show();
                $('#submit').attr('disabled','disabled');
                
           }        
        }    
    });
});
 //show and hide secound part of work expirence
   
        $("input[name='conditionExp']").click(function () {
            if ($("#expYes").is(":checked")) {                
               $("#expDiv").show();
               }else if(expDiv !==""){
               $("#expDiv").hide();
               } else {               
               $("#expDiv").show();
            }
        }); 
 //show and hide secound part of education other section
    
        $('#educationLevel').change( function() {        
        var education = $('#educationLevel').val();  
        if(education == 5){
            $("#education").show();
        }else if(education !==""){
            $("#education").hide();
        }else{
            $("#education").show();
        }        
        });
        
    });
$(function() {
    setTimeout(function() {
        $("#success-alert").hide('blind', {}, 500);
        <? if($status){?>
        $(location).attr('href', 'references');
        <? } ?>
    }, 2000);
    $("#submit").click(function (){
        if ($("#expYes").is(":checked")) { 
            $("#airportName_error").html("");
            $("#designation_error").html("");
            $("#yearsOfExp_error").html("");
            if($("#expAirName").val() === ""){
                $("#airportName_error").html("You must enter Airport Name.");
                $("#airportName_error").show();
                return false;
            }else if($("#designation").val() === ""){
                $("#designation_error").html("You must enter Designation.");
                $("#designation_error").show(); 
                return false;
            }else if($("#yearExp").val() === ""){
                $("#yearsOfExp_error").html("You must enter Years of Experience.");
                $("#yearsOfExp_error").show();  
                return false;
            } else if($("#front_image").val().length === 0){
                <? if($airportIDFrontStatus){?>
                    return true;
                <?}else{?>
                    $("#front_image_error").html("You must upload the Airport Id.");
                    $("#front_image_error").show()
                    return false; 
                <? } ?>
            }else if($("#back_image").val().length === 0){
                <? if($airportIDBackStatus){?>
                    return true;
                <?}else{?>
                    $("#back_image_error").html("You must upload the Airport Id.");
                    $("#back_image_error").show()
                    return false; 
                <? } ?>
            }else{
                return true;
            }
        }else{
            return true;
        }
    });
    
    $("#front_image").change(function() {
        $("#front_image_error").html("");
        var fileInput = $('#front_image');
        var image = $("#front_image").val();
        var fileType = image.split('.').pop().toUpperCase();
        if(image.length > 1){
            if(fileType === "PNG" || fileType === "JPG" || fileType === "JPEG" || fileType === "PDF"){
                var fileSize = Math.round(fileInput.get(0).files[0].size/1024);
                if(fileSize >500){
                    $("#front_image_error").html("Maximum file size you can upload is 500KB.");
                    $("#front_image_error").show();
                    $('#submit').attr('disabled','disabled');
                    return false; 
                }else{
                    $('#submit').removeAttr('disabled');
                    return true;                 
                }                         
            }else{               
                $("#front_image_error").html("File type supported png, jpg and pdf.");
                $("#front_image_error").show();
                $('#submit').attr('disabled','disabled');
                return false;  
           }        
        }    
    });
    
    $("#back_image").change(function() {
        $("#back_image_error").html("");
        var fileInput = $('#back_image');
        var image = $("#back_image").val();
        var fileType = image.split('.').pop().toUpperCase();
        if(image.length > 1){
            if(fileType === "PNG" || fileType === "JPG" || fileType === "JPEG" || fileType === "PDF"){
                var fileSize = Math.round(fileInput.get(0).files[0].size/1024);
                if(fileSize >500){
                    $("#back_image_error").html("Maximum file size you can upload is 500KB.");
                    $("#back_image_error").show();
                    $('#submit').attr('disabled','disabled');
                    return false; 
                }else{
                    $('#submit').removeAttr('disabled');
                    return true;                 
                }                         
            }else{               
                $("#back_image_error").html("File type supported png, jpg and pdf.");
                $("#back_image_error").show();
                $('#submit').attr('disabled','disabled');
                return false;  
           }        
        }    
    });  
});  
    
</script>
