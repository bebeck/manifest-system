<div id="wrapper">
    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">        	
	            <div class="col-lg-2">
	            	<div class="form-group">
		                <label>Chart</label>
	                	<select class="form-control type-chart">
	                		<option value="bar">Bar</option>
	                		<option value="pie">Pie</option>
	                	</select>
		            </div>
		        </div>
	            <!--<div class="col-lg-2">
	            	<div class="form-group">
		                <label>Priode</label>
	                	<select class="form-control priode">
	                		<option value="daily">Daily</option>
	                		<option value="month">Month</option>
	                	</select>
		            </div>
				</div>
				<div class="col-lg-2">
	            	<div class="form-group">
		                <label>Filter</label>
	                	<select class="form-control filtering">
	                		<option value="total_kg">Total Kg</option>
	                	</select>
		            </div>
				</div>-->
	            <div class="col-lg-2">
	            	<div class="form-group">
		                <label>Month</label>
		                <div class="input-group date">
							<input type="text" class="form-control month">
		                </div>
		            </div>
				</div>
				<div class="col-lg-2">
	            	<div class="form-group">
		                <label>&nbsp;</label>
		                <button type="submit" class="btn btn-sm btn-primary form-control process-chart">Process</button>
		            </div>
				</div>
			</div>
            <div class="col-lg-12">
				<div id="container" style="margin-top:20px;"></div>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
$(document).ready(function(){
	$('.type-chart, .priode, .filtering').select2();

    $('.input-group .month').datepicker({
        format: "yyyy-mm",
        keyboardNavigation: false,
        autoclose: true,
		viewMode: "months", 
		minViewMode: "months"
    })

    $('.process-chart').click(function(){
    	var type = $('.type-chart').select2('val');
    	var month = $('.month').val();

	    $.get('<?=base_url('highchart/get')?>',{'type':type, 'month':month},function(data){
	    	$('#container').html(data);
	    })
    })

    $.get('<?=base_url('highchart/get')?>',{'type':'bar', 'motnh':'<?=date("Y-m")?>'},function(data){
    	$('#container').html(data);
    })
})
</script>