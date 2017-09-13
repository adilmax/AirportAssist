<?php $title = "Blog Post";
$titleName = "Blog Post";
require_once('header.php');
?>
<script type="text/javascript" src="js/tinymce/tinymce.min.js"></script>
    <script type="text/javascript">
 
        tinymce.init({
          selector: "textarea",

          // ===========================================
          // INCLUDE THE PLUGIN
          // ===========================================

          plugins: [
            "advlist autolink lists link image charmap print preview anchor",
            "searchreplace visualblocks code fullscreen",
            "insertdatetime media table contextmenu paste jbimages"
          ],

          // ===========================================
          // PUT PLUGIN'S BUTTON on the toolbar
          // ===========================================

          toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image jbimages",

          // ===========================================
          // SET RELATIVE_URLS to FALSE (This is required for images to display properly)
          // ===========================================

          relative_urls: false

        });

</script>
<div class="container-fluid margin_top">  
<div class="row">
    <div class="container ">
        <form action="" method="post" class="form-horizontal form_top" id="blog-form" enctype="multipart/form-data">
            <fieldset>
                <legend>Post Blog</legend> 
            </fieldset>
            <div class="col-lg-12 col-md-12 col-xs-12">
                <div class="col-lg-12">
                <? if($status){?>
                    <div class="alert alert-success">Your Blog has been saved successfully</div>
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
                   <div  class="col-lg-2 control-label field_size">Title:<span class="asteric">*</span> </div>
                    <div class="col-lg-10">
                        <input type="text" class="form-control field_size place_holder" id="postTitle" placeholder="Post Title" name="postTitle" value="<?= $blogTitle;?>">
                    </div>
                </div>
                <div class="form-group">
                    <div  class="col-lg-2 control-label field_size">Message:<span class="asteric">*</span></div>
                    <div class=" col-lg-10">
                        <textarea rows="4" cols="50" class="form-control field_size place_holder" id="postDetails" placeholder="Post Details" name="postDetails"  ><?= $blogContent;?></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <div  class="col-lg-2 control-label field_size">Tags: </div>
                    <div class="col-lg-10">
                        <input type="text" class="form-control field_size place_holder" id="tags" placeholder="Put comma to seprate the tags" name="tags" value="<?= $tags;?>">
                    </div>
                </div>
                <div class="form-group">
                    <div  class="col-lg-2 control-label field_size">Main Image:</div>
                    <div class="col-lg-10">
                        <? if($imgStatus){?>
                        <div>
                            <div><img src = "<?= $image;?>" title ="Image" class="img-responsive img-thumbnail" style="height: 200px;width: 250px;"/></div>
                        </div>
                        <? }?>
                        <input type="file" class="field_size" id="image" placeholder="Images" name="image" >
                        <div id="image_error" class="dispaly_none" style="color:red;"></div>
                        <div>Note:Please upload image with size 900X300 about 500kb and type:JPEG/PNG.  </div>
                    </div>
                    
                </div>

            </div>
            <div class="form-group">
                <div class="col-lg-offset-3 col-lg-9">
                    <input type="submit" class="btn btn-default register_button" name="submit" value="Submit" id="submit">
                </div>
            </div>               
        </form>
    </div>
</div>
</div>
<?php require_once('footer.php');?>
<script  type="text/javascript">
        $("#image") .change(function(){  
            var _URL = window.URL || window.webkitURL;
            var image = $("#image").val();
            var fileType = image.split('.').pop().toUpperCase();          
            if(image.length > 1){
                if(fileType === "PNG" || fileType === "JPG" || fileType === "JPEG"){
                    if ((file = this.files[0])) {                       
                        img = new Image();
                        img.onload = function() {
                            if(this.width == 900 && this.height == 300){
                                var filesize = parseInt(file.size/1024);
                                if(filesize > 500){
                                    $("#image_error").html("Maximum file size should be 500kb");
                                    $("#image_error").show();                                
                                    $('#submit').attr('disabled','disabled');
                                }else{
                                    $('#submit').removeAttr('disabled');
                                    $("#image_error").hide();
                                }
                            }else{
                                    $("#image_error").html("Width and height should be 900 / 300");
                                    $("#image_error").show();                               
                                    $('#submit').attr('disabled','disabled');
                            }                          
                        };                      
                        img.src = _URL.createObjectURL(file);
                    }
                   
                } else{
                    $("#image_error").html("File type supported png, jpg");
                    $("#image_error").show();
                    $('#submit').attr('disabled','disabled');
               }
            }
		

    });
</script>

