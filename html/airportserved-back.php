<?
$title = "Airport assistance worldwide| Airport transfer| Wheelchair assistance at airport| Transit & Lounge Services";
$titleName = "Airports Served";
$content = $titleValue." serves 500+ Airports around the world (North America, South America, Africa, Europe, Asia and Australasia – Oceania)";
require_once 'header_inner.php';
?>

 <div class="row">
    <div class="middle_image airportserved-subpage"><div></div></div>
</div>
<div class="row padding-left-airport-served">
    <div class="container title_top">
        <fieldset>
            <legend>AIRPORTS SERVED (country-wise) </legend>
        </fieldset>
        <div class='ul_bottom'>
            <form action="" method="post">       
            <div class="row">
                <div class="col-xs-12 col-sm-6 col-md-6 form-group searchpadding">
                    <select name="nameAirport" id="nameAirport" class="form-control">
                        <option  value="">Select Country Name</option>
                        <?foreach($countryArray as $key=>$value){?>
                        <option value="<?=$value;?>"><?=$value;?></option>
                        <? }?>
                    </select>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-6 nopadding">
                    <input type="submit" class="landing-button_airportserved" name="detailsAirportServed" value="Go" id="detailsAirportServed"> 
                    
                </div>
            </div>
            </form>
            
        </div>
        
    </div>
</div>
<div class="row padding-left-airport-served">
    <div class="container">
        <?
        if(count($country)>0){
        foreach($country as $key=>$value){
        $id = strtoupper($value[0]);
        ?>            
        <div id="<?=$id;?>" style="margin-bottom: 30px;">&nbsp;</div>
            <fieldset id="<?= $value; ?>">
                <legend itemprop="country"><span itemprop="country" ><?= $value; ?></span></legend>               
                <ul class='ul_bottom'>
                    
                    <? sort($airportDetails[$value]);foreach($airportDetails[$value] as $list=>$airportName){
                   // $formatName = $validationObject->airportServedName($airportName) ;  
                    ?>
                    <li itemprop='<?=$airportName?>'itemprop="name"><?=$airportName;?></li>                     
                    <? } ?>
                </ul>
            </fieldset>  
        <? }}else{ ?> 
        <div class="error">We are sorry...no such a country available in our system.</div>
        <?}?>
    </div>
</div>
<div><a href = "#" class="back-to-top" style="display: inline;">
<i class="fa fa-arrow-circle-up"></i>
</a></div>
<? require_once('footer_inner.php');?>
<script type="text/javascript">
     /* $(function() {
        
        <?php 
       /* $data = "";
        foreach($countryArray as $key=>$value){
            $data = $data.'"'.$value.'",';
        }?>
                
        var availableTags =  [<?php echo $data; ?>] ;  
       
        $( "#nameAirport" ).autocomplete({
            source: availableTags            
            });
        });
    function search(ele) {
        if(event.keyCode == 13) {
            alert(ele.value);
            <?php
                $username = '"+ele.value+"';
            ?>
        }
    }*/
    
</script>   

