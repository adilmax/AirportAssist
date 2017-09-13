<?php
$title = "Comment List";
require_once('header.php');?>
 <div class="container-fluid margin_top">   
    <? if(count($comment)> 0){ ?>   
       <fieldset>
           <legend>Verify Comments</legend>  
            <div>
                <div class="verify_box verified"></div>
                <div class="verify_box_title">Verified</div>
            </div>
            <div>
                <div class="verify_box noverified"></div>
                <div class="verify_box_title">Not Verified</div>
            </div>
            <div class="table-responsive font_size_table">
                <table class="table">
                    <thead>
                        <tr>
                            <th >ID</th>
                            <th>Name</th> 
                            <th>Email</th>
                            <th>User Comment</th>                                                             
                            <th>Blog Title</th>
                            <th>Date</th>
                            <th>Verify Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <? $c = 0;for ($i = 0; $i < count($comment); $i++) {
                            $objectID = $comment[$i]->getObjectId();
                            $class="";
                            if($comment[$i]->status){
                               $class = "verified" ;
                            }else{
                                $class = "noverified" ;
                            }
                        ?>
                        <tr class="<?=$class;?>">
                            <td><?= ++$c?></td>
                            <td><?= $comment[$i]->author;?></a></td>
                            <td><?= $comment[$i]->email;?></td>
                            <td><?= $comment[$i]->content;?></td>
                            <td>
                                <? if($comment[$i]->postID !=""){
                                    $comment[$i]->postID->fetch();?>
                                <a href="../blogcomment?id=<?= $comment[$i]->postID->getObjectId();?>" target="_blank"><?= $comment[$i]->postID->title;?></a>
                                <?}?>
                            </td>
                            <td><?= $comment[$i]->getCreatedAt()->format('d-M-Y');?></td>
                            <td>
                                <?= ($comment[$i]->status)?"<a href='commentverification?type=false&id=$objectID'>Verified</a>":"<a href='commentverification?type=true&id=$objectID'>Not Verified</a>"?>
                            </td>
                        </tr>
                        <? } ?>
                    </tbody>
                </table>                    
            </div>  
            <form action="" method="post" id="blog">
                <input type="hidden" name="page" value="<?= $page;?>" id="page">
                 <? if($count > 100){?>
                    <div >
                        <? if(count($comment)==100){?><input type="submit" name="next" value="Next >>" onclick="changePageValue('next')" id="next" class="btn btn-default register_button"><? } ?>
                       <? if($page > 1) {?><input type="submit" name="prev" value="<< Previous" onclick="changePageValue('prev')" id="prev" class="btn btn-default register_button"><? } ?>
                    </div>
                 <? } ?>
            </form>
       </fieldset>
   <? } ?>
</div>   
<? require_once('footer.php');?>
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