<div id="wrapper">
    <div id="page-wrapper">
    	<div class="row">
			<div class="col-lg-12">
	            <div class="panel panel-default">
	                <div class="panel-heading">
	                    List Discount
	                </div>
	                <div class="panel-body">
	                	<table  class="table table-striped table-bordered table-hover">
				            <thead>
				                <tr>
				                    <th>Discount No</th>
				                    <th>Hawb No</th>
				                    <th>Discount type</th>
				                    <th>Normal</th>
				                    <th>After Discount</th>
				                    <th>Status</th>
				                    <th>Created</th>
				                </tr>
				            </thead>
				            <tbody>
				            	<?php
				            		if($list_dicount != false) {
				            			foreach ($list_dicount as $key => $row) {
				            				$manifest_data = $this->manifest_model->get_by_data_id($row->data_id);
				            				$normal_price = null;
				            				if($row->type == 'rate') $normal_price = $manifest_data->nt_kurs;
				            				if($row->type == 'value') $normal_price = $manifest_data->value;
				            				if($row->type == 'total') $normal_price = ($manifest_data->kg * $manifest_data->value) * $manifest_data->nt_kurs;
				            				echo '
				            				<tr>
				            					<td>'.$row->discount_id.'</td>
				            					<td>'.$manifest_data->hawb_no.'</td>
				            					<td>'.$row->type.'</td>
				            					<td>'.number_format($normal_price).'</td>
				            					<td>'.number_format($row->set_to).'</td>
				            					<td>'.$row->status.'</td>
				            					<td>'.$row->created_date.'</td>
				            				</tr>
				            				';
				            			}
				            		} else echo '<tr><td colspan="7" class="text-center">No have list discount</td>';
				            	?>
				            </tbody>
				        </table>
	                </div>
	            </div>
	            <div class="col-lg-12">
	            	<button class="btn btn-primary btn-sm" onclick="window.location = '<?=base_url()?>request/discount/select'">Add Discount</button>
	            </div>
	        </div>
	    </div>
    </div>
</div>