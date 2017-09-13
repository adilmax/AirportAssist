<?

$title = "Airport assistance| Ground handling services| Airport meet and greet | VIP travel services|
Airport concierge| Ramp Services|Crew Assistance";
$titleName = "FAQ";
$content = $titleValue . " answers FAQ (Frequently Asked Questions) in regard to Departure, Arrival, Transfer / Transit & Lounge Services offered across 500+ Airports around the world (North America, South America, Africa, Europe, Asia and Australasia – Oceania)`";
require_once 'header_inner.php';
?>


<div class="row">

</div>
<div class="row service_text_bg_color padding-left">
    <div class="container " style="margin-top: 120px;">
        <fieldset>
            <legend>SERVICE REQUEST FORM</legend>
            <div class="row padding-left" id="service_request_form">
                <div class="container" class="request-form-top">

                    <div class="col-sm-1 col-md-1 col-lg-1"></div>
                    <div class="col-sm-11 col-md-11 col-lg-11">

                        <form action="" method="post">
                            <? if($status){?>
                                <div class="alert alert-success" role="alert">
                                    Your request has been placed successfully.
                                </div><? } ?>
                            <? if(count($error)){?>
                                <div class="alert alert-danger" role="alert">
                                <?php for($i = 0;$i<count($error);$i++){
                                    echo $error[$i];echo"<br>";
                                }?>
                                </div><? } ?>
                            <div class="col-sm-6 col-md-6 col-lg-6" itemprop="airportassist">
                                <div class="form-group">
                                    <input type="text" value ="<?=(isset($data['originAirport']))?$data['originAirport']:"";?>" class="form-control place_holder field_color" name="originAirport" id="originAirport" placeholder="Airport Service Needed - Name/Code"
                                           data-validation="required"
                                           data-validation-error-msg-required="You must enter an Orgin Airport"
                                    >
                                </div>
                                <?
                                if(isset($data['flightType'])){
                                    $flightTypeValue = $data['flightType'];
                                }else{
                                    $flightTypeValue = "";
                                }
                                ?>
                                <div class="form-group">

                                    <select class="form-control field_color place_holder" name="flightType" id="flightType" accept=""data-validation="required"
                                            data-validation-error-msg-required="You must select Flight Type">
                                        <option value="">[Select Flight Type]</option>
                                        <? foreach($flightType as $key=>$value):?>
                                            <option value="<?=$key?>" <?=($flightTypeValue == $key)?"selected":"";?>><?=$value?></option>
                                        <? endforeach;?>
                                    </select>
                                </div>
                                <div class="form-group">

                                    <input type="text" value ="<?=(isset($data['flightNumber']))?$data['flightNumber']:"";?>"class="form-control place_holder field_color" name= "flightNumber" id="flightNumber" placeholder="Enter Fight Number" accept=""data-validation="required"
                                           data-validation-error-msg-required="You must enter Flight Number">
                                </div>
                                <div class="form-group dispaly_none" id="transit">

                                    <input type="text" value ="<?=(isset($data['transitFlightNumber']))?$data['transitFlightNumber']:"";?>"class="form-control  place_holder field_color" name= "transitFlightNumber" id="transitFlightNumber" placeholder="Enter Transit Flight Number" accept="">
                                </div>



                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 nopadding">
                                    <div class="form-group ">
                                        <input type='text' class="form-control place_holder field_color" accept=""data-validation="required"  value ="<?=(isset($data['arrivalTime']))?$data['arrivalTime']:"";?>" placeholder =" Enter Arrival Date "
                                               name="arrivalTime" id ="arrivalTime"
                                               data-validation-error-msg-required="You must enter an Arrival Date"  />
                                    </div>
                                </div>

                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 nopadding">
                                    <div class="form-group ">
                                        <input type = "text" class="form-control place_holder field_color" name="timing" id="timing" placeholder ="Enter Arrival Time"
                                               accept=""data-validation="required"  data-validation-error-msg-required="You must enter Arrival Time"
                                        >
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 nopadding">
                                    <div class="form-group ">
                                        <input type = "number" class="form-control place_holder field_color" name="adult" id="adult" placeholder ="Adult" value ="<?=(isset($data['adult']))?$data['adult']:"";?>"
                                               data-validation="required"  data-validation-error-msg-required="You must enter Number Of Adult"  min="1"
                                        >
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 nopadding">
                                    <div class="form-group ">
                                        <input type = "number" class="form-control place_holder field_color" name="children" id="children" placeholder ="Children" value ="<?=(isset($data['children']))?$data['children']:"";?>"
                                               min="0">
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 nopadding">
                                    <div class="form-group ">
                                        <input type = "number" class="form-control place_holder field_color" name="infants" id="infants" placeholder ="Infants" value ="<?=(isset($data['infants']))?$data['infants']:"";?>"
                                               min="0">
                                    </div>
                                </div>
                                <?
                                if(isset($data['classOfTravel'])){
                                    $classType = $data['classOfTravel'];
                                }else{
                                    $classType = "";
                                }
                                ?>
                                <div class="form-group">

                                    <select class="form-control field_color place_holder field_color" name="classOfTravel" id="classOfTravel" accept="" data-validation="required"
                                            data-validation-error-msg-required="You must select class Of Travel">
                                        <option value="">[Select Class Of Travel]</option>
                                        <? foreach($classOfTravel as $key=>$value):?>
                                            <option value="<?=$key?>" <?=($classType ==$key)?"selected":"";?>><?=$value?></option>
                                        <? endforeach;?>
                                    </select>
                                </div>

                                <?
                                if(isset($data['serviceType'])){
                                    $serviceTypeValue = $data['service'];
                                }else{
                                    $serviceTypeValue = "";
                                }
                                ?>
                                <div class="form-group">

                                    <select class="form-control field_color place_holder field_color" name="serviceType" id="serviceType" accept=""data-validation="required"
                                            data-validation-error-msg-required="You must select Service Type">
                                        <option value="">[Select Service Type]</option>
                                        <? foreach($serviceType as $key=>$value):?>
                                            <option value="<?=$key?>" <?=($serviceTypeValue ==$key)?"selected":"";?>><?=$value?></option>
                                        <? endforeach;?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-6 col-lg-6" itemprop="airportassist">
                                <?
                                if(isset($data['title'])){
                                    $titleValue = $data['title'];
                                }else{
                                    $titleValue = "";
                                }
                                ?>
                                <div class="form-group">

                                    <select class="form-control place_holder field_color" name="title" id="title" accept=""data-validation="required"
                                            data-validation-error-msg-required="You must enter a Title">
                                        <option value="">[Select Title]</option>
                                        <? foreach($titleList as $key=>$value):?>
                                            <option value="<?=$key?>" <?=($titleValue == $key)?"selected":"";?>><?=$key?></option>
                                        <? endforeach;?>
                                    </select>
                                </div>
                                <div class="form-group">

                                    <input type="text" class="form-control place_holder field_color" name="firstName" id="firstName" placeholder="Enter First Name" accept=""data-validation="required"
                                           data-validation-error-msg-required="You must enter a First Name" value ="<?=(isset($data['firstName']))?$data['firstName']:"";?>">
                                </div>
                                <div class="form-group">

                                    <input type="text" class="form-control place_holder field_color" id="lastName" name="lastName" placeholder="Enter Last Name" accept=""data-validation="required"
                                           data-validation-error-msg-required="You must enter a Last Name" value ="<?=(isset($data['lastName']))?$data['lastName']:"";?>">
                                </div>
                                <div class="form-group">

                                    <input type="email" class="form-control place_holder field_color" id="email" name="email" placeholder="Enter Email"
                                           data-validation="required email"
                                           data-validation-error-msg-required="You must enter an Email" value ="<?=(isset($data['email']))?$data['email']:"";?>">
                                </div>


                               <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 nopadding">
                                    <div class="form-group ">
                                        <input type='number' id="mobileCode" placeholder="Country Code(+1)"  class="form-control field_color place_holder" name="mobileCode" accept=""data-validation="required"
                                               data-validation-error-msg-required="You must enter Country Code" value ="<?=(isset($data['mobileCode']))?$data['mobileCode']:"";?>">
                                    </div>
                                </div>
                                <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8 nopadding">
                                     <div class="form-group ">
                                        <input type="text" class="form-control place_holder field_color" id="mobile" name="mobile" placeholder="Mobile Number"
                                               data-validation="required number length"
                                               data-validation-length="8-15"
                                               data-validation-error-msg-length="Minimum length should be 8"
                                               data-validation-error-msg-required="You must enter a Mobile Number" value ="<?=(isset($data['mobile']))?$data['mobile']:"";?>">
                                    </div>
                                </div>


                                <div class="form-group">

                                    <textarea class="form-control place_holder field_color" rows="3" id="message" name="message" placeholder="Message" style="resize: vertical;"><?=(isset($data['message']))?$data['message']:"";?></textarea>
                                </div>
                                <div class="col-md-12">
                                    <input type="checkbox" name="callBack" id="callBack" value=""/>&nbsp; Request call Back
                                </div>
                                <input type="submit" class="btn btn-default register_button" name="details" value="SUBMIT" id="details">
                            </div>

                        </form>

                    </div>

                </div>
            </div>
    </div>
</div>
</div>


<? require_once('footer_inner.php'); ?>
<script type="text/javascript">
    //seaqrch city or code

    $(function () {
        $.validate();
        $('#originAirport').autocomplete({source: 'airportsearch.php', minLength: 1});
        $("#arrivalTime").datepicker({
            dateFormat: "dd/ mm / yy",
            autoclose: true,
            todayBtn: true,
        });
        $('#timing').timepicker();

    });
    $("#serviceType").change(function(){
        $("#preloader").show();
        var serviceType = $("#serviceType").val();
        $('#service').find('option').remove();
        $('#service')
            .append($('<option>', { value : '' })
                .text('[Select Service]'));
        $.post("servicelist.php",{serviceType:serviceType},function(data){
            var dataArray = jQuery.parseJSON(data)
            $('#state').find('option:not(:first)').remove();

            $.each(dataArray, function(key, value) {
                $('#service')
                    .append($('<option>', { value : key })
                        .text(value));

            });
            $("#preloader").hide();
        });

    });

    /// date placeholder chenge
    $("#flightType").change(function(){
        if($("#flightType").val()=== "3" ){
            $("#transit").show();
            $('#flightNumber').attr("placeholder","Enter Arrival Flight Number");
            $('#arrivalTime').attr("placeholder","Enter Arrival Date");
            $('#timing').attr("placeholder","Enter Arrival Time");

        }else{
            $("#transit").hide();
            $('#flightNumber').attr("placeholder","Enter Flight Number");
        }
    });
    $("#flightType").change(function(){
        if($("#flightType").val()=== "2" ){
            $('#arrivalTime').attr("placeholder","Enter Departure Date");
            $('#timing').attr("placeholder","Enter Departure Time");

        }
    });
    $("#flightType").change(function(){
        if($("#flightType").val()=== "1" ){
            $('#arrivalTime').attr("placeholder","Enter Arrival Date");
            $('#timing').attr("placeholder","Enter Arrival Time");

        }
    });
</script>
