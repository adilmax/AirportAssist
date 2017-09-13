<?php $title = "Blog";
$titleName = "Blog";
require_once('header.php');
?>

 
<div class="row">
    <div class="container margin_top">        
        <div class="col-lg-12">
            <fieldset>
                <legend>Blog</legend> 
                <? if($deletestatus){?>
                    <div class="alert alert-success">Blog has been deleted successfully.</div>
                <? } ?>
                <? if(count($blogList)> 0){ ?>   
                    <?  for ($i = 0; $i < count($blogList); $i++) { 
                        $objectID = $blogList[$i]->getObjectId();?>
                        <div class="row show_image">
                            <div class="container">
                                <div class="col-lg-3">
                                    <? if($blogList[$i]->image !=''){?>
                                    <div>
                                        <div><img src = "<?= $blogList[$i]->image->getURL();?>" title ="Image" class="img-responsive img-thumbnail blog_image" style="width:250px;height:200px"/></div>
                                    </div>
                                    <? }?>
                                </div>
                                <div class="col-lg-9">
                                    <div><h3 class="showblog"><a href="blogpost.php?id=<?=$objectID?>"><?= $blogList[$i]->get('title')?></a></h3></div>
                                    <p class="showblog"><b>Publish on:-&nbsp;<?=$blogList[$i]->getCreatedAt()->format('d-M-Y');?></b></p>
                                    <div><p class="showblog content"> <?=substr(strip_tags($blogList[$i]->get('content')),0,200);?>..</p></div>
                                    <a href="blogpost.php?id=<?=$objectID?>" class="btn btn-default register_button" style="margin-left: 10px;">Edit</a>
                                    <a href="deleteblog.php?id=<?=$objectID?>" class="btn btn-default register_button" >Delete</a>
                                </div> 
                            </div>
                      </div>
                    <? }?>
                <? } else {?>
                    <div>No Information..</div>
                <? }?> 
            </fieldset>        
            <form action="" method="post" id="blog" class="form-horizontal">
            <input type="hidden" name="page" value="<?= $page;?>" id="page">
            <? if($count > 10){?>
                <div >
                    <? if(count($blogList)==10){?><input type="submit" name="next" value="Next >>" onclick="changePageValue('next')" id="next" class="btn btn-default register_button"><? } ?>
                   <? if($page > 1) {?><input type="submit" name="prev" value="<< Previous" onclick="changePageValue('prev')" id="prev" class="btn btn-default register_button previous_button"><? } ?>
                </div>
            <? } ?> 
             </form>
        </div>  
    </div>
</div>
<div id="confirm" class="modal hide fade">
  <div class="modal-body">
    Are you sure?
  </div>
  <div class="modal-footer">
    <button type="button" data-dismiss="modal" class="btn btn-primary" id="delete">Delete</button>
    <button type="button" data-dismiss="modal" class="btn">Cancel</button>
  </div>
</div>
<?php require_once('footer.php');?>
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
</script>