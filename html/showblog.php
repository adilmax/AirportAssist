<?php $title = "MUrgency Airport Assistance – Blog | Travel Tips";
$metaDesc = "Blog for all those who fly & who want to fly hassle free. Great posts about the airports worldwide and services available, tips for comfortable travel and great travel destinations.";
$titleName = "Blog";
require_once('header_inner.php');
?>

<div class="row">
    <div class="middle_image blog-subpage">
        <div></div>        
    </div>
</div> 
<div class="row">
    <div class="container margin_top">
        <form action="" method="post" id="blog" class="form-horizontal">        
            <div class="col-lg-9" style=" border-right: 1px solid #E5E5E5;">
            <fieldset>
                <legend>BLOG</legend> 
                <? if(count($blog)> 0){ ?>   
                    <?  for ($i = 0; $i < count($blog); $i++) { 
                        $objectID = $blog[$i]->getObjectId();?>
                        <div class="row show_image">                            
                            <div class="col-lg-4">
                                <? if($blog[$i]->image !=''){?>
                                <div>
                                    <div><img src = "<?= $blog[$i]->image->getURL();?>" title ="Image" class="img-responsive img-thumbnail" style="width:238px;height:170px"/></div>
                                </div>
                                <? }?>
                            </div>
                            <div class="col-lg-8">
                                <div>
                                    <h3 class="showblog"><a class="linkcolor" href="blog/<?=$objectID?>/<?=str_replace(" ","-",$blog[$i]->title)?>"><?= $blog[$i]->get('title')?></a></h3>                                
                                </div>
                                <p class="showblog"><b class="datecolor">Published on:-&nbsp;<?=$blog[$i]->getCreatedAt()->format('d-M-Y');?></b></p>
                                <div>
								<p class="showblog content"> <?=substr(strip_tags($blog[$i]->get('content')),0,200);?>..</p>
								
                                    <div align="right"><a href="blog/<?=$objectID?>/<?=str_replace(" ","-",$blog[$i]->title);?>">Read More...</a></div>
                                </div>
                            </div>                             
                      </div>
                    <? }?>
                <? } else {?>
                    <div>No Information..</div>
                <? }?> 
            </fieldset>            
            <input type="hidden" name="page" value="<?= $page;?>" id="page">
            <? if($count > 10){?>
                <div >
                    <? if(count($blog)==10){?><input type="submit" name="next" value="Next >>" onclick="changePageValue('next')" id="next" class="btn btn-default register_button"><? } ?>
                   <? if($page > 1) {?><input type="submit" name="prev" value="<< Previous" onclick="changePageValue('prev')" id="prev" class="btn btn-default register_button previous_button"><? } ?>
                </div>
            <? } ?>            
        </div>         
        <div class="col-lg-3 margin_top">
            <div class="col-lg-12">            
            <?if(count($error)>0){?>
                <div class="alert alert-danger col-lg-12">
                    <? for($i=0;$i<count($error);$i++){
                        echo $error[$i];echo"<br>";
                    }?>    
                </div>
            <? } ?>
            </div>
            
    <div class="form-group">
        <div class="col-lg-12 margin_blog_cat">Category</div>
             <div class="col-lg-12">
             <div class="cube-portfolio">
                <div id="filters-container" class="cbp-l-filters-text content-xs">                    
                 <ul name="category" id="category">
                   <?php foreach($showblogCategory as $key=>$value){?> 
                    <li class="cbp-filter-item" value="<?=$key?>"><a class="categary" href="traveltips.php?id=<?=$key;?>"><?=$value;?></a></li>|
                    <?php } ?>
                    </ul> 
             </div>
            </div>      
            </div> 
            
            <div class="form-group">
                <div class="col-lg-12 margin_blog">Archive</div>
                    <div class="col-lg-12 col-md-12 col-xs-12 col-lg-offset-1">
                        <input type="text"  name="date" id="date" class="form-control field_size place_holder" placeholder="Date" >
                    </div>
                    <div class="col-lg-12 col-md-12 col-xs-12 col-lg-offset-1">
                        <input type="submit" class="btn btn-default register_button achive-search-btn" name="search" value="Search" id="search">
                    </div>              
            </div>
            
            <div class="col-lg-12">
            <? if($statusSub){?>
                <div class="alert alert-success">Thank you for Subscribing...</div>
            <? } ?>
            <?if(count($errorSub)>0){?>
                <div class="alert alert-danger col-lg-12">
                    <? for($i=0;$i<count($errorSub);$i++){
                        echo $errorSub[$i];echo"<br>";
                    }?>    
                </div>
            <? } ?>
            </div>
            <div class="form-group">                
                <div class="col-lg-12 margin_blog">Subscribe to our newsletter:</div>
                <div class="col-lg-12 col-lg-offset-1">
                    <div class="col-lg-9 col-md-9 col-xs-9 subscribe-email">
                        <input type="email" class="form-control field_size place_holder" id="email" placeholder="Email Address" name="email" value="<?= $email;?>">
                    </div>
                    <div class="col-lg-3 col-md-3 col-xs-3 subscribe-btn nopadding">
                        <input type="submit" class="btn btn-default register_button" name="submit" value="Submit" id="submit">
                    </div>              
                </div>
            </div>            
        </div>
        </form>
    </div>
</div>

<?php require_once('footer_inner.php');?>
<script type="text/javascript">
function changePageValue(type){
    //alert(type);
    varNextValue = document.getElementById('page').value;
    if(type === "next"){
        varNextValue++;       
    }
    if(type === "prev"){
        varNextValue--;      
    }
    document.getElementById('page').value = varNextValue;
    //alert(document.getElementById('page').value);
}

$(function() {
        var start = new Date();
        start.setFullYear(start.getFullYear() - 100);
        
        var end = new Date();
        end.setFullYear(end.getFullYear());       
        
        $('#date').datepicker({
            changeMonth: true,
            changeYear: true,
            minDate: start,
            maxDate: end,
            yearRange: start.getFullYear() + ':' + end.getFullYear()
        });
    });
    
    
   
</script>