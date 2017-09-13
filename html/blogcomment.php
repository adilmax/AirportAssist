<?php $title = $blogTitle;
$titleName =  "Blog";
require_once('header_inner.php');
$doc = new DOMDocument();
@$doc->loadHTML($blogContent);
$tags = $doc->getElementsByTagName('img');
foreach ($tags as $tag) {
        $imgSrc = $tag->getAttribute('src');
        $tag->setAttribute("src", "https://www.murgencyairportassistance.com".$imgSrc);
        
       }
$blogContent=$doc->saveHTML();
?>
<div class="row">
    <div class="middle_image blog-subpage">
        <div></div>        
    </div>
</div> 
<div class="row margin_top">
    <div class="container">
        <fieldset class="col-lg-offset-1">
            <legend>
                <div class="font_size_title"><?= $blogTitle;?></div></legend> 
        </fieldset>
            <div class="col-lg-1"></div>
            <div class="col-lg-10">
                <div class="margin_bottom_img text-center">
                    <div>
                        <?php if($imageStatus){?>                           
                        <div>
                            <div><img src = "<?= $blogImage;?>" title ="Image" class="img-responsive"/></div>
                        </div>
                        <?php }?>
                    </div>
                </div>
            </div>
          
    </div>
</div>
<div class="row">
    <div class="container">
        <div class="col-lg-1"></div>
         <div class="col-lg-10">
            <a href="#" class="btn btn-default register_button margin_right fa fa-facebook" onclick="newWindow('<?= $blogTitle;?>','<?= ($imageStatus)?"$blogImage":"";?>','<?= $objectID;?>')"></a>
        </div>
        
    </div>   
</div>

<div class="row">
    <div class="container">
        <div class="col-lg-1"></div>
        <div class="col-lg-10  margin_bottom_blog">
            
            <div>
                <div class="field_size"><?= $blogContent;?></div>
                <form action="" method="post" class="form-horizontal form_top" >
                    <fieldset>
                        <legend>Leave Comment</legend>                                   
                        <div class="col-lg-12 col-md-12 col-xs-12">
                            <div class="form-group">
                            <? if($status){?>
                                <div class="alert alert-success">Your Comment has been saved successfully</div>
                            <? } ?>
                            <?if(count($error)>0){?>
                                <div class="alert alert-danger col-lg-12">
                                    <? for($i=0;$i<count($error);$i++){
                                        echo $error[$i];echo"<br>";
                                    }?>    
                                </div>
                            <? } ?>
                            </div>
                            <div class="form-group">                                        
                                <div class="col-lg-6">
                                    <input type="text" class="form-control field_size" id="name" placeholder="Enter Your Name" name="name" pattern="[A-Za-z]{1,20}" maxlength="20" oninput="check(this)">
                                </div>
                                <div class="col-lg-6">
                                    <input type="email" class="form-control field_size" id="email" placeholder="Enter Your Email" name="email" maxlength="30">
                                </div>
                            </div>                                      
                            <div class="form-group">
                                <div class="col-lg-12">
                                    <textarea class="form-control field_size" id="description" placeholder="Enter Comment Here" name="description" maxlength="400" rows="5" cols="4"></textarea>
                                </div>
                            </div>                     
                        </div>
                        <div class="form-group">
                            <div class="col-lg-12">                                
                                
                                <input type="submit" class="btn btn-default register_button margin_right" name="submit" value="Post Comment" id="submit">
                            </div>
                        </div> 
                    </fieldset>
                    
                </form>
            </div>
        </div>
    </div>
</div>
<div class="row margin_bottom_comment">
    <div class="container">
        <div class="col-lg-12">
            <? if(count($comment)> 0){ ?>   
               <fieldset>
                   <legend>Comments</legend>                                 
                       <? for ($i = 0; $i < count($comment); $i++) {?>
                       <div class="row">
                           <div class="field_size margin_left font_style">
                               <span class="font_style"><?= $comment[$i]->author?></span>
                               <span class="font_style2"> <?=$comment[$i]->getCreatedAt()->format('d-M-Y');?></span>                                           
                           </div> 
                       </div>
                       <div class="row margin_bottom_comment  margin_right">
                           <div class="margin_left field_size">
                               <?= $comment[$i]->content?>   
                           </div> 
                       </div>                                    
                       <?}?>                             
               </fieldset>
           <? } ?>
        </div>
    </div> 
</div>        
    
<?php require_once('footer_inner.php');?>
<script type="text/javascript">
function check(input) {  
    if(input.validity.patternMismatch){  
        input.setCustomValidity("Please Enter Only Alphabets.");  
    }  
    else {  
        input.setCustomValidity("");  
    }                 
} 

	
	function newWindow(title,imageUrl,objectId){   
        
        var feed = 'https://www.facebook.com/dialog/feed?app_id=1617274408512337';       
        var url = "https://www.murgencyairportassistance.com/blogcomment.php?id="+objectId;
     //   var description = content;
        var name = title;
        feed += '&link=' + url + '&picture='+imageUrl + '&name='+ name ;        
        window.open(feed, 'shareblog', 'width=640,height=480');   
    }
    
   
</script>