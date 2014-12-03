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
				                    <th>Normal Price</th>
				                    <th>Discount Price</th>
				                    <th>Status</th>
				                    <th>Created</th>
				                </tr>
				            </thead>
				            <tbody>
				            	<?php
				            		if($list_dicount != false) {
				            			foreach ($list_dicount as $key => $row) {
				            				echo '
				            				<tr>
				            					<td>'.$row->discount_no.'</td>
				            					<td>'.$row->hawb_no.'</td>
				            					<td>'.$row->type.'</td>
				            					<td>'.$row->normal.'</td>
				            					<td>'.$row->discount.'</td>
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
	            	<button class="btn btn-primary btn-sm" onclick="window.location = '<?=base_url()?>request/discount/add'">Add Discount</button>
	            </div>
	        </div>
	    </div>
    </div>
</div>