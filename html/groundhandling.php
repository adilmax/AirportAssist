<?
$title = "Service Form – Ground Handling |Ramp Services |Aircraft maintenance | Crew assistance";
$metaDesc = "All ground handling services including aircraft maintenance, VIP Passenger service, Cargo services undertaken globally. Just fill up a simple form to book your now";
require_once 'html/header_inner.php';

?>
<div class="row">
    <div class="middle_image gh-subpage"></div>
</div>

<div class="row service_text_bg_color padding-left">
    <div class="container title_top">
        <fieldset>
            <legend>Request Ground Handling</legend>
        </fieldset>
    </div>
    
<div class="container">
    <div class="row " style="margin-top: 20px;">
        
        <div class="container">
        
            <p class="small gh_content">
                <b>To ensure that your ground handling request is received in time, please submit all requests at least 48 hours in advance of arrival time.
                </b> 
            </p>
        </div>
    </div>
    <div class="container gh_content">
        <div class="stepwizard">
            <div class="stepwizard-row setup-panel">
                <div class="stepwizard-step">
                    <a href="#step-1" type="button" class="btn btn-primary btn-circle gh_button">1</a>
                    <p>Step 1</p>
                </div>
                <div class="stepwizard-step">
                    <a href="#step-2" type="button" class="btn btn-default btn-circle gh_button" disabled="disabled">2</a>
                    <p>Step 2</p>
                </div>
                <div class="stepwizard-step">
                    <a href="#step-3" type="button" class="btn btn-default btn-circle gh_button" disabled="disabled">3</a>
                    <p>Step 3</p>
                </div>
                <div class="stepwizard-step">
                    <a href="#step-4" type="button" class="btn btn-default btn-circle gh_button" disabled="disabled">4</a>
                    <p>Step 4</p>
                </div>
            </div>
        </div>
        <form action="" method="post">
            <div class="col-lg-12 col-xs-12">
                <?if(count($error)>0){?>               
                    <ul class="list-group">
                        <?for($i=0;$i<count($error);$i++){?>
                            <li class="list-group-item list-group-item-danger noborder" ><?=$error[$i];?></li>
                        <?}?>
                    </ul>                
                <?}?>
                <? if($status){?>
                    <div class="alert alert-success">                   
                        Your information has been saved successfully.
                    </div>
                <? }?>
            </div> 
            <!-- first step-->
            <div class="row setup-content" id="step-1" style="margin-bottom: 20px;">
            <div class="col-lg-12">               
                <h4 class="gh_title"> Contact Information </h4>
                <div class="col-lg-6"> 
                    <div class="form-group">  
                        <input  maxlength="100" type="text" required="required" class="form-control place_holder field_color" placeholder="First Name" name="firstName" id="firstName" />
                    </div>
                    <div class="form-group">  
                        <input  maxlength="100" type="text" required="required" class="form-control place_holder field_color" placeholder="Company Name" name="company" id="company" />
                    </div>
                    <div class="form-group">  
                        <select name="country" id="country" class="form-control field_color" required>
                            <option value="" selected="selected">Select Your Country</option>
                            <? foreach($country as $key=>$value){?>
                                <option value="<?=$key;?>"><?=$value;?></option>
                            <? }?>
                        </select>
                    </div>
                    <div class="form-group"> 
                        <textarea name="address" id="address" class="form-control place_holder field_color" placeholder="Address"></textarea>
                    </div>
                     <div class="form-group">                       
                        <input maxlength="100" type="text" class="form-control place_holder field_color" placeholder="Fax" name="fax" id="fax" />
                     </div>  
                </div>
                <div class="col-lg-6"> 
                    <div class="form-group">                       
                        <input maxlength="100" type="text" required="required" class="form-control place_holder field_color" placeholder="Last Name" name="lastName" id="lastName" />
                    </div>
                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-4 nopadding">  
                        <div class="form-group ">
                            <input type='tel' id="phoneCode" class="form-control field_color place_holder" name="phoneCode"  required="true"> 
                        </div>
                    </div> 
                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-8 nopadding"> 
                        <div class="form-group ">
                            <input type='number' max="999999999999999" min="10000000" class="form-control place_holder field_color" placeholder ="Phone" name="phone" id ="phone"  required="true"/>
                        </div>
                    </div>                    
                    <div class="form-group">                       
                        <input maxlength="100" type="email" required="required" class="form-control place_holder field_color" placeholder="Email" name="email" id="email" />
                    </div>
                    <div class="form-group">                       
                        <input maxlength="100" type="text" class="form-control place_holder field_color" placeholder="SITATEX" name="sitatex" id="sitatex" />
                    </div>
                </div>
                <button class="btn btn-primary nextBtn btn-lg pull-right btn-default register_button"  type="button" >Next</button>                
            </div>
        </div>
          <!-- end first step-->   
          
            <!-- seccond step-->
        <div class="row setup-content" id="step-2" style="margin-bottom: 20px;">
            <div class="col-lg-12">
                <h4 class="gh_title"> Flight Information </h4>
                <div class="col-lg-6">
                    <div class="form-group">
                        <select name="requiredService" id="requiredService" class="form-control field_color" required="required">
                            <option value="">Airport where Service Required</option>                            
                            <? foreach($ghServices as $value){?>
                                <option value="<?=$value;?>"><?=$value;?></option>
                            <? }?>
                        </select>
                    </div>
                    <div class="form-group">
                        <input maxlength="200" type="text" required="required" class="form-control place_holder field_color" placeholder="Aircraft Registry" name="airRegistry" id="airRegistry" />
                    </div> 
                    <div class="form-group">
                        <input maxlength="200" type="text" required="required" class="form-control place_holder field_color" placeholder="Flight Number" name="flightNumber" id="flightNumber" />
                    </div>
                    <div class="form-group">
                        <input maxlength="200" type="text" required="required" class="form-control place_holder field_color" placeholder="Arriving from Orgin Airport" name="orginAirport" id="orginAirport" />
                    </div>
                    <div class="form-group">
                        <input maxlength="200" type="text" required="required" class="form-control place_holder field_color" placeholder="Departing to Destination Airport" name="depAirport" id="depAirport" />
                    </div>
                    <div class="form-group">
                        <input maxlength="200" type="text" required="required" class="form-control place_holder field_color" placeholder="Operator" name="operator" id="operator" />
                    </div>
                    <div class="form-group"> 
                        <textarea name="flightPurpose" id="flightPurpose" class="form-control place_holder field_color" placeholder="Purpose of Flight"></textarea>
                    </div>
                    
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <select name="aircraftType" id="aircraftType" required="true" class="form-control field_color">
                            <option value="">Select Aircraft Type</option>
                            <? foreach($aircraftType as $key=>$value){?>
                                <option value="<?=$key;?>"><?=$value;?></option>
                            <? }?>
                        </select>
                    </div>
                    <div class="form-group hideField" id="aircraftSubTypeDiv">
                        <select name="aircraftSubType" id="aircraftSubType" required="true" class="form-control field_color">
                            <option value="">Select Value</option>
                            <? foreach($aircraftSubType as $key=>$value){?>
                                <option value="<?=$key;?>"><?=$value;?></option>
                            <? }?>
                        </select>
                    </div>
                    <div class="form-group hideField"  id="subTypeDiv">
                        <select name="subType" id="subType" required="true" class="form-control field_color">
                            <option value="">Select Value</option>
                            <? foreach($subType as $key=>$value){?>
                                <option value="<?=$key;?>"><?=$value;?></option>
                            <? }?>
                        </select>
                    </div>
                    <div class="form-group">
                        <select name="flightCategory" id="flightCategory" required="true" class="form-control field_color">
                            <option value="">Select Flight Category</option>
                            <? foreach($flightCategoryList as $value){?>
                                <option value="<?=$value;?>"><?=$value;?></option>
                            <? }?>
                        </select>
                    </div> 
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 nopadding"> 
                        <div class="form-group ">
                            <input type='text' class="form-control place_holder field_color" placeholder ="Date of Arrival" name="arrivalTime" id ="arrivalTime" required="true" />
                        </div>
                    </div>    
                       
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 nopadding">  
                        <div class="form-group ">
                            <input type = "text" class="form-control place_holder field_color" name="arrivalTiming" id="arrivalTiming" placeholder ="UTC Time" required="true">
                        </div>
                    </div> 
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 nopadding"> 
                        <div class="form-group ">
                            <input type='text' class="form-control place_holder field_color" placeholder ="Date of Departure" name="departureTime" id ="departureTime" required="true" />
                        </div>
                    </div>    
                       
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 nopadding">  
                        <div class="form-group ">
                            <input type = "text" class="form-control place_holder field_color" name="departureTiming" id="departureTiming" placeholder ="UTC Time" required="true">
                        </div>
                    </div> 
                    <div class="form-group">Will you require fuel?</div>
                    <div>
                        <label class="radio-inline">
                            <input type="radio" id="yesFuel" name="fuel" value="1" />Yes 
                        </label>
                        <label class="radio-inline">
                            <input type="radio" id="noFuel" name="fuel" value="0" checked/>No
                        </label>
                        <div class="form-group" id="fuelQtyDiv" style="display: none;margin-top: 10px;">
                            <input type = "number" class="form-control place_holder field_color" name="fuelQty" id="fuelQty" placeholder ="Required Quantity">
                        </div> 
                        <div class="form-group" id="paymentModeDiv" style="display: none;margin-top: 10px;">
                            <select name="paymentMode" id="paymentMode" class="form-control field_color">
                                <option value="">Mode Of Payment</option>
                                <option value="Cash">Cash</option>
                                <option value="Cheque">Cheque</option>
                            </select>
                        </div>
                    </div>
                    
                  </div>
                <button class="btn btn-primary nextBtn btn-lg pull-right btn-default register_button" type="button" >Next</button>
                
      
    </div>
        </div>
    <!-- end seccond step-->   
    
    <!-- start third step-->
    <div class="row setup-content" id="step-3" style="margin-bottom: 20px;">
        <div class="col-lg-12">
            <h4 class="gh_title"> Crew and Passenger Information </h4>
            <div class="col-lg-6">
                <div class="form-group ">
                    <input type='text' class="form-control place_holder field_color" placeholder ="Captain's Name" name="captainName" id ="captainName" required="true" />
                </div>
                <div class="form-group ">
                    <input type='number' class="form-control place_holder field_color" placeholder ="Number of Crew Arriving (Including Captain)" name="crewArriving" id ="crewArriving" required="true" />
                </div>
                <div class="form-group ">
                    <input type='number' class="form-control place_holder field_color" placeholder ="Number of Passengers Arriving" name="arrivedPassengers" id ="arrivedPassengers" required="true" />
                </div>
            </div>
            
            <div class="col-lg-6">                
                <div class="col-lg-2 col-md-2 col-sm-4 col-xs-4 nopadding">  
                    <div class="form-group ">
                        <input type='tel' id="mobileCode" class="form-control field_color place_holder" name="mobileCode"  required="true"> 
                    </div>
                </div> 
                <div class="col-lg-10 col-md-10 col-sm-8 col-xs-8 nopadding"> 
                    <div class="form-group ">
                        <input type='number' max="999999999999999" min="10000000" class="form-control place_holder field_color" placeholder ="Captain's Mobile" name="captainMobile" id ="captainMobile"  required="true"/>
                    </div>
                </div>                
                 <div class="form-group">
                    <input type='number' class="form-control place_holder field_color" placeholder ="Number of Crew Departing (Including Captain)" name="crewDepart" id ="crewArriving" required="true" />
                </div>
                <div class="form-group">
                    <input type='number' class="form-control place_holder field_color" placeholder ="Number of Passengers Departing" name="departPassengers" id ="arrivedPassengers" required="true" />
                </div>
            </div>
            <button class="btn btn-primary nextBtn btn-lg pull-right field_color btn-default register_button" type="button" >Next</button>
        </div>
    </div>
      <!-- end third step-->
      <!-- start 4th step-->
    <div class="row setup-content" id="step-4" style="margin-bottom: 20px;">
        <div class='container'>
            <div class="col-lg-12">
                <div class="col-lg-12">
                    <h4 class="gh_title"> RAMP SERVICES </h4>
                    <div class="col-lg-12">
                        <h4>Ground Support / Handling Offerings:</h4>
                        <div class="col-lg-6">
                            <label class="checkbox"><input type="checkbox" name='RampServices[]' value="Crew Meet & Assist">Crew Meet & Assist</label>
                            <label class="checkbox"><input type="checkbox" name='RampServices[]' value="Catering">Catering</label>
                            <label class="checkbox"><input type="checkbox" name='RampServices[]' value="Passenger Handling">Passenger Handling</label>
                            <label class="checkbox"><input type="checkbox" name='RampServices[]' value="Crew Transportation, Hotel, and Airticketing">Crew Transportation, Hotel, and Airticketing</label>
                            <label class="checkbox"><input type="checkbox" name='RampServices[]' value="Airside Transportation">Airside Transportation</label>
                            <label class="checkbox"><input type="checkbox" name='RampServices[]' value="Supervision">Supervision</label>
                            <label class="checkbox"><input type="checkbox" name='RampServices[]' value="Ramp Coordination">Ramp Coordination</label>
                            <label class="checkbox"><input type="checkbox" name='RampServices[]' value="eAPIS & API">eAPIS & API</label>
                            <label class="checkbox"><input type="checkbox" name='RampServices[]' value="Hangar Parking Arrangement">Hangar Parking Arrangement</label>
                            
                        </div>
                        <div class="col-lg-6">
                            <label class="checkbox"><input type="checkbox" name='RampServices[]' value="Customs & Immigration Assistance">Customs & Immigration Assistance</label>
                            <label class="checkbox"><input type="checkbox" name='RampServices[]' value="Water Service">Water Service</label>
                            <label class="checkbox"><input type="checkbox" name='RampServices[]' value="Lavatory Service">Lavatory Service</label>
                            <label class="checkbox"><input type="checkbox" name='RampServices[]' value="Aircraft Parking">Aircraft Parking</label>
                            <label class="checkbox"><input type="checkbox" name='RampServices[]' value="Cleaning">Cleaning</label>
                            <label class="checkbox"><input type="checkbox" name='RampServices[]' value="De-Icing">De-Icing</label>
                            <label class="checkbox"><input type="checkbox" name='RampServices[]' value="Towing and Pushback">Towing and Pushback</label>
                            <label class="checkbox"><input type="checkbox" name='RampServices[]' value="Storage of pallets, containers and other unit load devices">Storage of pallets, containers and other unit load devices</label>
                        </div>
                            
                    </div>
                    <div class="col-lg-12">
                        <h4 class='gh_margin'>Ground Equipment:</h4>
                        <div class="col-lg-6">
                            <label class="checkbox"><input type="checkbox" name='GroundEquip[]' value="GPU">GPU </label>
                            <label class="checkbox"><input type="checkbox" name='GroundEquip[]' value="APU">APU</label>
                            <label class="checkbox"><input type="checkbox" name='GroundEquip[]' value="ACU">ACU</label>
                            <label class="checkbox"><input type="checkbox" name='GroundEquip[]' value="Stairs">Stairs</label>
                        </div>
                        <div class="col-lg-6">                           
                            <label class="checkbox"><input type="checkbox" name='GroundEquip[]' value="VIP Stairs">VIP Stairs</label>
                            <label class="checkbox"><input type="checkbox" name='GroundEquip[]' value="High Loaders">High Loaders</label>
                            <label class="checkbox"><input type="checkbox" name='GroundEquip[]' value="Forklift">Forklift</label>
                        </div>
                            
                    </div>
                </div>
                <div class="col-lg-12">
                    <h4 class="gh_title"> VIP PASSENGER HANDLING </h4>
                    <div class="col-lg-6">
                        <label class="checkbox"><input type="checkbox" name='VipPassHand[]' value="VIP ground handling">VIP ground handling </label>
                        <label class="checkbox"><input type="checkbox" name='VipPassHand[]' value="Quality supervision on GSE usage">Quality supervision on GSE usage</label>
                        <label class="checkbox"><input type="checkbox" name='VipPassHand[]' value="VIP baggage handling">VIP baggage handling</label>
                        <label class="checkbox"><input type="checkbox" name='VipPassHand[]' value="Catering arrangement">Catering arrangement</label>
                        <label class="checkbox"><input type="checkbox" name='VipPassHand[]' value="Crew and VIP terminal assistance">Crew and VIP terminal assistance</label>
                        <label class="checkbox"><input type="checkbox" name='VipPassHand[]' value="Ground transportation arrangement">Ground transportation arrangement</label>
                        <label class="checkbox"><input type="checkbox" name='VipPassHand[]' value="Airport Meet and Assistance Services">Airport Meet and Assistance Services</label>
                        <label class="checkbox"><input type="checkbox" name='VipPassHand[]' value="Concierge Services">Concierge Services</label>
                    </div>
                    <div class="col-lg-6">                           
                        <label class="checkbox"><input type="checkbox" name='VipPassHand[]' value="Hotel Booking">Hotel Booking</label>
                        <label class="checkbox"><input type="checkbox" name='VipPassHand[]' value="Aircraft security">Aircraft security</label>
                        <label class="checkbox"><input type="checkbox" name='VipPassHand[]' value="VIP security arrangement" >VIP security arrangement</label>
                        <label class="checkbox"><input type="checkbox" name='VipPassHand[]' value="Cargo and commercial handling">Cargo and commercial handling</label>
                        <label class="checkbox"><input type="checkbox" name='VipPassHand[]' value="Flight monitoring">Flight monitoring</label>
                        <label class="checkbox"><input type="checkbox" name='VipPassHand[]' value="Live updates of all processes" >Live updates of all processes</label>
                        <label class="checkbox"><input type="checkbox" name='VipPassHand[]' value="Lounge Access">Lounge Access</label>
                        <label class="checkbox"><input type="checkbox" name='VipPassHand[]' value="VIP Transportation">VIP Transportation</label>
                    </div>                    
                </div>
            </div>            
                <button class="btn btn-success btn-lg pull-right btn-default register_button" name="submit" id="submit" type="submit">Submit</button>
        </div>        
    </div>
          
      <!-- end 4th step -->
        </form>
</div>
</div>   
<?require_once 'html/footer_inner.php';?>

<script type="text/javascript">
    $(document).ready(function () {
        
        $('#orginAirport').autocomplete ({source:'airportsearch.php', minLength:1});
        $('#depAirport').autocomplete ({source:'airportsearch.php', minLength:1});
        
        $("#arrivalTime").datepicker({
            dateFormat: "dd/mm/yy",
            autoclose: true,
            todayBtn: true,
        });
        
        $('#arrivalTiming').timepicker();
        
        $("#departureTime").datepicker({
            dateFormat: "dd/mm/yy",
            autoclose: true,
            todayBtn: true,
        });
        
        $('#departureTiming').timepicker();
        
        $('#airbridgeHours').timepicker();
        $('#heaterHours').timepicker();
        $('#asuHours').timepicker();
        $('#highloaderHours').timepicker();
        $('#cargoHighloaderHours').timepicker();
        $('#escortHours').timepicker();
        $('#crewTransportHours').timepicker();
        $('#towbar').timepicker();
        $('#forklift').timepicker();
        $('#forkliftPallet').timepicker();
        $('#ldContainer').timepicker();
        $('#cargoPallet').timepicker();
        $('#bagTractor').timepicker();
        $('#bagCart').timepicker();
        $('#beltLoader').timepicker();
        
         $("input[name='fuel']").click(function () {
            if ($("#yesFuel").is(":checked")) {
                $("#fuelQtyDiv").show();
                $("#paymentModeDiv").show();
                $("#fuelQty").attr('required','true');
                $("#paymentMode").attr('required','true');
            } else {
                $("#fuelQtyDiv").hide();
                $("#paymentModeDiv").hide();
                $("#fuelQty").removeAttr('required');
                $("#paymentMode").removeAttr('required');
            }
        });
        
        var navListItems = $('div.setup-panel div a'),
        allWells = $('.setup-content'),
        allNextBtn = $('.nextBtn'),
        allPrevBtn = $('.prevBtn');

        allWells.hide();

        navListItems.click(function (e) {
            e.preventDefault();
            var $target = $($(this).attr('href')),
                    $item = $(this);

            if (!$item.hasClass('disabled')) {
                navListItems.removeClass('btn-primary').addClass('btn-default');
                $item.addClass('btn-primary');
                allWells.hide();
                $target.show();
                $target.find('input:eq(0)').focus();
            }
        });

        allNextBtn.click(function(){
            var curStep = $(this).closest(".setup-content"),
                curStepBtn = curStep.attr("id"),
                nextStepWizard = $('div.setup-panel div a[href="#' + curStepBtn + '"]').parent().next().children("a"),
                curInputs = curStep.find("input[type='text'],input[type='url'],input[type='email'],input[type='number'],input[type='tel'],select"),
                isValid = true;

            $(".form-group").removeClass("has-error");
            for(var i=0; i<curInputs.length; i++){
                if (!curInputs[i].validity.valid){
                    isValid = false;
                    $(curInputs[i]).closest(".form-group").addClass("has-error");
                }
            }

            if (isValid)
                nextStepWizard.removeAttr('disabled').trigger('click');
        });

        allPrevBtn.click(function(){
            var curStep = $(this).closest(".setup-content"),
                curStepBtn = curStep.attr("id"),
                prevStepWizard = $('div.setup-panel div a[href="#' + curStepBtn + '"]').parent().prev().children("a");

            $(".form-group").removeClass("has-error");
            prevStepWizard.removeAttr('disabled').trigger('click');
        });

        $('div.setup-panel div a.btn-primary').trigger('click');
    });
    
    $.get("http://ipinfo.io", function (response) {
       countryName = response.country;
        $("#mobileCode").intlTelInput({
        preferredCountries: [countryName.toLowerCase()],   
    });
    }, "jsonp");
    
    $.get("http://ipinfo.io", function (response) {
       countryName = response.country;
        $("#phoneCode").intlTelInput({
        preferredCountries: [countryName.toLowerCase()],   
    });
    }, "jsonp");
    $(function () {
        $('#aircraftType').change( function() {
        var aircraftType = $('#aircraftType').val();
        $('#aircraftSubType').find('option').remove();
        $('#aircraftSubType').append($('<option>', { value : '' }).text('Select Value')); 
        $('#subType').find('option').remove();
        $('#subType').append($('<option>', { value : '' }).text(' Select Value')); 
        $.post("aircrafttype.php",{aircraftType:aircraftType},function(data){
        var dataArray = jQuery.parseJSON(data);
        $('#aircraftSubType').find('option:not(:first)').remove();
        if(dataArray != ""){            
            $("#aircraftSubTypeDiv").removeClass('hideField');
            $("#aircraftSubType").attr('required','true');
        }else{
            $("#aircraftSubType").removeAttr('required');
            $("#aircraftSubTypeDiv").addClass('hideField');
            $("#subType").removeAttr('required');            
            $("#subTypeDiv").addClass('hideField');
        }
        $.each(dataArray, function(key, value) {              
                $('#aircraftSubType').append($('<option>', { value : key }).text(value));        
          });          
        });
    });
    $('#aircraftSubType').change( function() {       
        var aircraftSubType = $('#aircraftSubType').val();         
        $('#subType').find('option').remove();
        $('#subType').append($('<option>', { value : '' }).text('Select Value')); 
        $.post("aircrafttype.php",{aircraftType:aircraftSubType},function(data){
        var dataArray = jQuery.parseJSON(data);        
        $('#subType').find('option:not(:first)').remove();
        if(dataArray != ""){            
            $("#subType").attr('required','true');            
            $("#subTypeDiv").removeClass('hideField');
        }else{
            $("#subType").removeAttr('required');            
            $("#subTypeDiv").addClass('hideField');
        }
        $.each(dataArray, function(key, value) {            
        $('#subType').append($('<option>', { value : key }).text(value)); 
          });          
        });
    });
       
    });
    
    </script>