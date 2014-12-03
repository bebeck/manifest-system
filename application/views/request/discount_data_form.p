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

<div class="col-sm-6">
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
<div class="col-sm-6">
	<div class="form-group">
    	<label>Shipper</label>
        <textarea class="form-control" rows="4" disabled><?=ucfirst($shipper);?></textarea>
    </div>
	<div class="form-group">
		<label>Consignee</label>
    	<textarea class="form-control" rows="4" disabled><?=ucfirst($shipper);?></textarea>
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
    	<label>Description</label>
        <textarea class="form-control" rows="3" disabled><?=ucfirst($data->description);?></textarea>
    </div>
</div>
<div class="col-sm-3">
 	<div class="form-group">
    	<label>Other Charge Tata</label>
        <input class="form-control" type="text" value="<?=$data->other_charge_tata;?>" disabled>
    </div>
</div>
	<div class="col-sm-3">
 	<div class="form-group">
    	<label>Other Charge PML</label>
        <input class="form-control" type="text" value="<?=$data->other_charge_pml;?>" disabled>
    </div>
</div>