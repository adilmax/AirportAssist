<?
$title = "Airport Assistance| FAQs| Departure|  Arrival |Transfer| Transit| Lounge ";
$titleName = "FAQ";
$content = $titleValue." answers FAQ (Frequently Asked Questions) in regard to Departure, Arrival, Transfer / Transit & Lounge Services offered across 500+ Airports around the world (North America, South America, Africa, Europe, Asia and Australasia – Oceania)`";
require_once 'header.php';
?>
<div class="row">
    <div class="middle_image faq-subpage"><div></div></div>
</div>

<div class="row service_text_bg_color padding-left">
    <div class="container title_top">
        <fieldset>
            <legend>FREQUENTLY ASKED QUESTIONS</legend>
        </fieldset>
    </div>
    <div class="landing-button_faq_div">
        <a href="#General" class="landing-button_ourservices">General</a>
        <a href="#Booking" class="landing-button_ourservices">Booking</a>
        <a href="#Service" class="landing-button_ourservices">Service</a>
    </div>
    <div class="container title_top ">
        <? $idCount = 0; $c = 0;$count = 0;$mainCount = 0;foreach($faqList as $key=>$value){?>
        <fieldset id="<?=$key;?>" <?=($mainCount!=0)?:"";?>>
            <legend><h1 ><?=$key;?></h1></legend>
            <?if($key == "Service"){?>
            <div>
                <h4>Airport Assistance Services</h4>
            </div>
            <?}?>
            <div class="panel-group" id="accordion<?=$c;?>" style="margin-top: 40px;">
                <? $count = 0;for($i=0;$i<count($faqList[$key]);$i++){?>
                    <?if($key == "Service" && $i == 8){
                    $count = 0;?>
                    <div style="margin-bottom: 40px;margin-top: 20px;">
                        <h4>Aircraft Groundhandling Assistance Services</h4>
                    </div>
                    <?}?>
                    <div class="panel panel-default">   
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" data-parent="#accordion" href="#collapse<?=$idCount;?>"><?=++$count.". ".$faqList[$key][$i][0];?></a>
                            </h4>
                        </div>
                        <div id="collapse<?=$idCount;?>" class="panel-collapse collapse <?=($c==0)?'in':'';?>">
                            <div class="panel-body">
                                <p>
                                    <?=$faqList[$key][$i][1];?>
                                </p>
                            </div>
                        </div>
                    </div>
                <? ++$c;++$idCount;} ?>
            </div>
       </fieldset>
        <? ++$mainCount;}?>
    </div>
    <div  class="container"style="text-align: center;margin-bottom: 30px;"><h4>Didn't find the answer to your question ? <a href="contact">Contact Us</a></h4></div>

</div>

<? require_once('footer.php');?>

