<?php
$title = "Vendor List";
require_once('header.php'); ?>
<div class="container-fluid" style="margin-top: 80px;">
    <?php if ($deleteStatus) { ?>
        <div class="alert alert-success">Vendor Deleted Successfully.</div>
    <?php } ?>

	<?php if (isset($result)) {
			if ( isset($result) && $result==true) { ?>
				<div class="alert alert-success alert-dismissable">
					<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
					<?php echo "Vendor ".$resultText." Successfuly!!"; ?>
				</div>
			<?php } else if (isset($result) && $result == false) { ?>
				<div class="alert alert-danger alert-dismissable">
					<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
					<?php echo "Something went wrong. Vendor Not ".$resultText.""; ?>
				</div>
			<?php } 
		} ?>
    <fieldset>
        <legend>Vendor List</legend>

 <!-- filter -->
            <form method="post" class="form-inline" action="vendorlist.php" id="searchForm">
                <div class="row">
				  <div class="col-md-2"></div>
				  <div class="col-md-8">
					  <div class="form-group">
						<div class="col-md-3">
							<input type="text" class="form-control" id="name" name="name" placeholder="Vendor Name" value="<?=$name?>">
						</div>
					  </div>
					  <div class="form-group">
						<div class="col-md-3">
							<input type="text" class="form-control" id="email" name="email" placeholder="Email" value="<?=$email?>">
						</div>
					  </div>
					  <div class="form-group">
						<div class="col-md-3">
							<input type="text" class="form-control" name="contactNo" id="contactNo" placeholder="Contact Number" value="<?=$contactNo?>">
						</div>
					  </div>
					  <div class="form-group">
						  <input type="submit" name="search" id="search" class="btn btn-danger" value="SEARCH" >
					  </div>
					  &nbsp;&nbsp;<a href="addvendor" class="btn btn-danger">Create New Vendor</a>
				   </div>
			   </div>
            </form>
        <br><hr>
        <div class="table-responsive" style="font-size:13px;">
            <table class="table">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Vendor Code</th>
                    <th>Vendor Name</th>
					<th>Email Id</th>
					<th>Contact Number</th>
					<th>Contact Person</th>
					<th></th>
                </tr>
                </thead>
                <tbody>
                <? if (count($vendorList) > 0) { 
                    for ($i = 0; $i < count($vendorList); $i++) {
                        
                ?>
                        <tr class="">
                            <th scope="row"><?=(($page-1)*$limit)+($i+1); ?></th>
                            <td>
                                <a href="editvendor?id=<?= $vendorList[$i]->getObjectId(); ?>"><?= $vendorList[$i]->getObjectId(); ?></a>
                            </td>
                            <td>
								<?=$vendorList[$i]->name?ucwords($vendorList[$i]->name):"-"?>
                            </td>
							<td>
								<?=$vendorList[$i]->email?$vendorList[$i]->email:"-"?>
							</td>
							<td>
								<?=$vendorList[$i]->contactNo?$vendorList[$i]->contactNo:"-"?>
							</td>
							<td>
								<?=$vendorList[$i]->contactPerson?ucwords($vendorList[$i]->contactPerson):"-"?>
							</td>
                            <td><a href="javascript:deleteVendor('<?= $vendorList[$i]->getObjectId(); ?>');" class="button-form">Delete</a>
                            </td>
                        </tr>
                    <? } ?>
                <? } else { ?>
                    <tr><td colspan="5">No Information..</td></tr>
                <? } ?>
                </tbody>
            </table>
        </div>
    </fieldset>
    <form action="" method="post" id="blog" class="form-horizontal">
        <input type="hidden" name="page" id="page" value="<?= $page; ?>">
        <? if ($count > 10) { ?>
            <div>
                <? if (count($vendorList) == 10) { ?><input type="submit" name="next" value="Next >>"
                                                             onclick="changePageValue('next')" id="next"
                                                             class="btn btn-default register_button"><? } ?>
                <? if ($page > 1) { ?><input type="submit" name="prev" value="<< Previous"
                                             onclick="changePageValue('prev')" id="prev"
                                             class="btn btn-default register_button previous_button"><? } ?>
            </div>
        <? } ?>
    </form>
</div>

<? require_once('footer.php'); ?>
<script type="text/javascript">
	$(document).ready(function(){
	});
	
	function deleteVendor(objId)
	{
		var r = confirm("Are you sure?");
		if (r == true)
		{
			window.location = window.location.href+"?id="+objId+"&d=1";
		}
	}

    function changePageValue(type) {
        // alert(type);
        varNextValue = document.getElementById('page').value;
        if (type === "next") {
            varNextValue++;
        }
        if (type === "prev") {
            varNextValue--;
        }
        document.getElementById('page').value = varNextValue;
        //alert(document.getElementById('page').value);
    }

</script>
