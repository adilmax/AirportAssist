<? $title = "Add Vendor";
$titleName = "Add Vendor";
require_once('header.php'); ?>


<div class="row service_text_bg_color">
    <div class="container" style="margin-top: 80px;">
        <form action="" method="post" class="form-horizontal form_top">
				<fieldset>
                    <legend>Add Vendor Details</legend>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Vendor Name:</label>
                        <div class="col-sm-9 label_top">
                            <input type="text" class="form-control" name="name" id="name" value="" data-validation="required" data-validation-error-msg-required="You must enter Vendor Name">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Vendor Email:</label>
                        <div class="col-sm-9 label_top">
                            <input type="email" class="form-control" name="email" id="email" value="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Contact Number:</label>
                        <div class="col-sm-9 label_top">
                            <input type="number" class="form-control" name="contactNo" id="contactNo" value="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Contact Person:</label>
                        <div class="col-sm-9 label_top">
                            <input type="text" class="form-control" name="contactPerson" id="contactPerson" value="">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-5 col-md-offset-3">
                            <input type="submit" class="btn btn-success" value="Add Vendor" name="addVendorDetails" id="addVendorDetails"/>
                        </div>
                    </div>
                </fieldset>
        </form>
    </div>
</div>


<? require_once('footer.php'); ?>
<script>
     $(document).ready(function () {

		 $.validate();
		
	

    });
</script>