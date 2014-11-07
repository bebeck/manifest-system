<html>
<head>
<title>Airway Bill</title>
<link rel="stylesheet" href="<?=base_url() ?>style/css/airwaybill.css">
    <link rel="stylesheet" href="<?=base_url()?>style/css/bootstrap.min.css">
</head>

<body style="width:100%: padding:0px; margin:0px;">
<div class="container" style="width:98%; margin:auto;">
    <div class="row">
        <div class="col-xs-12">
    		<div class="invoice-title">
    			<h2>Invoice</h2><h3 class="pull-right">#<?=$details->data_id?></h3>
    		</div>
    		<hr>
    		<div class="row">
    			<div class="col-xs-6">
    				<address>
    				<strong>From:</strong><br>
                        <?php
                        $shipper = $this->customers_model->get_by_id($details->shipper);
                        echo ucwords(strtolower('
                        '.$shipper->name.'<br/>
                        '.$shipper->address.'<br/>
                        '.$shipper->city.'<br/>
                        '.$shipper->country.'
                        '));
                        ?>
    				</address>
    			</div>
    			<div class="col-xs-6 text-right">
    				<address>
        			<strong>Consignee To:</strong><br>
    					<?php
                        $consignee = $this->customers_model->get_by_id($details->consignee);
                        echo ucwords(strtolower('
                        '.$consignee->name.'<br/>
                        '.$consignee->address.'<br/>
                        '.$consignee->city.'<br/>
                        '.$consignee->country.'
                        '));
                        ?>
    				</address>
    			</div>
    		</div>
    	</div>
    </div>
    
    <div class="row">
    	<div class="col-xs-6">
    		<div class="panel panel-default">
    			<div class="panel-body">
    				<div class="table-responsive">
    					<table class="table">
							<tr>
								<td class="no-line text-left">Total Weight Charge</td>
								<td class="no-line text-right">$10.99</td>
							</tr>
                            </tr>
                                <td class="text-left">Total Charge (Rp)</td>
                                <td class="text-right">Rp. <?=number_format($details->collect*$details->nt_kurs)?></td>
                            </tr>
    					</table>
    				</div>
    			</div>
    		</div>
    	</div>
        <div class="col-xs-6">
            <address>
            <strong>Description:</strong><br>
                <?=$details->description?>
            </address>
        </div>
    </div>
</div>

</body>
<html>
