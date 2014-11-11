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
    <button type="button" class="btn btn-sm btn-primary navbar-btn" onCLick="window.location='<?=base_url()?>manifest/modal/edit?data_id=<?=$data->data_id;?>'">Edit data</button>
    <button type="button" class="btn btn-sm btn-primary navbar-btn">Set Payment</button>
    <button type="button" class="btn btn-sm btn-primary navbar-btn" onClick="print('<?=$data->data_id?>')">Print</button>
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
	            <input class="form-control" type="text" value="<?=$data->hawb_no;?>" disabled>
	        </div>
	    </div>
	    <div class="col-sm-2">
	    	<div class="form-group">
	            <label>Pkg</label>
	            <input class="form-control" type="text" value="<?=$data->pkg;?>" disabled>
	        </div>
	    </div>
	    <div class="col-sm-2">
	    	<div class="form-group">
	            <label>Pcs</label>
	            <input class="form-control" type="text" value="<?=$data->pcs;?>" disabled>
	        </div>
	    </div>
	    <div class="col-sm-2">
	    	<div class="form-group">
	            <label>KG</label>
	            <input class="form-control" type="text" value="<?=$data->kg;?>" disabled>
	        </div>
	    </div>
	    <div class="col-sm-2">
	    	<div class="form-group">
	            <label>Value</label>
	            <input class="form-control" type="text" value="<?=$data->value;?>" disabled>
	        </div>
	    </div>
	    <div class="col-sm-2">
	    	<div class="form-group">
	            <label>Prepaid</label>
	            <input class="form-control" type="text" value="<?=$data->prepaid;?>" disabled>
	        </div>
	    </div>
	    <div class="col-sm-2">
	    	<div class="form-group">
	            <label>Collect</label>
	            <input class="form-control" type="text" value="<?=$data->collect;?>" disabled>
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
		        <textarea class="form-control" rows="4" disabled><?=ucfirst($data->description);?></textarea>
		    </div>
	    </div>
	    <div class="col-sm-6">
	     	<div class="form-group">
		    	<label>Other Charge</label>
		        <input class="form-control" type="text" value="<?=$data->other_charge;?>" disabled>
		    </div>
	    </div>
	</div>
</div>

<script type="text/javascript">
function print(data_id) {
    window.open('<?=base_url()?>download/pdf?data_id=' + data_id,'_blank');
}
</script>