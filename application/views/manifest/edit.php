<?php
$shipper = $this->customers_model->get_by_id($data->shipper);
$shipper = $shipper->name.'
'.$shipper->address.'
'.$shipper->country;

$consignee = $this->customers_model->get_by_id($data->consignee);
$consignee = $consignee->name.'
'.$consignee->address.'
'.$consignee->country;
?>

<nav class="navbar navbar-default navbar-fixed-bottom text-right" role="navigation" style="padding:0px 10px;">
    <button type="button" class="btn btn-sm btn-primary navbar-btn">Save</button>
    <button type="button" class="btn btn-sm btn-danger navbar-btn" onClick="parent.$.colorbox.close();">Close</button>
</nav>

<div id="wrapper" style="padding:20px;">
	<div class="row">
	    <div class="col-sm-6">
	        <div class="form-group">
	            <label>Data ID</label>
	            <input class="form-control" type="text" value="<?=$data->data_id;?>" disabled>
	        </div>
	        <div class="form-group">
	            <label>Hawb No</label>
	            <input class="form-control" type="text" value="<?=$data->hawb_no;?>">
	        </div>
	    </div>
	    <div class="col-sm-2">
	    	<div class="form-group">
	            <label>Pkg</label>
	            <input class="form-control" type="text" value="<?=$data->pkg;?>">
	        </div>
	    </div>
	    <div class="col-sm-2">
	    	<div class="form-group">
	            <label>Pcs</label>
	            <input class="form-control" type="text" value="<?=$data->pcs;?>">
	        </div>
	    </div>
	    <div class="col-sm-2">
	    	<div class="form-group">
	            <label>KG</label>
	            <input class="form-control" type="text" value="<?=$data->kg;?>">
	        </div>
	    </div>
	    <div class="col-sm-2">
	    	<div class="form-group">
	            <label>Value</label>
	            <input class="form-control" type="text" value="<?=$data->value;?>">
	        </div>
	    </div>
	    <div class="col-sm-2">
	    	<div class="form-group">
	            <label>Prepaid</label>
	            <input class="form-control" type="text" value="<?=$data->prepaid;?>">
	        </div>
	    </div>
	    <div class="col-sm-2">
	    	<div class="form-group">
	            <label>Collect</label>
	            <input class="form-control" type="text" value="<?=$data->collect;?>">
	        </div>
	    </div>
	    <div class="col-sm-6">
	    	<div class="form-group">
		    	<label>Shipper</label>
		        <textarea class="form-control" rows="5" disabled><?=ucfirst($shipper);?></textarea>
		    </div>
	    </div>
	    <div class="col-sm-6">
	    	<div class="form-group">
	    		<label>Consignee</label>
	        	<textarea class="form-control" rows="5" disabled><?=ucfirst($shipper);?></textarea>
	    	</div>
	    </div>
	    <div class="col-sm-6">
	     	<div class="form-group">
		    	<label>Description</label>
		        <textarea class="form-control" rows="4"><?=ucfirst($data->description);?></textarea>
		    </div>
	    </div>
	    <div class="col-sm-6">
	     	<div class="form-group">
		    	<label>Other Charge</label>
		        <input class="form-control" type="text" value="<?=$data->other_charge;?>">
		    </div>
	    </div>
	</div>
</div>