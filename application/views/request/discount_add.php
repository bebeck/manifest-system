<div id="wrapper">
    <div id="page-wrapper">
    	<div class="row">
    		<button type="button" class="btn btn-warning btn-sm" id="select-hawb" style="margin-bottom:15px;">Select Hawb</button>
            <div class="panel panel-default panel-discount" style="display:none;">
                <div class="panel-heading">
                    Add Discount
                </div>
                <div class="panel-body">
                	<form id="form_add_discount" method="post" action="<?=base_url()?>manifest/ajax/set_discount">
						<div class="col-lg-12 data_form"></div>
	                	<div class="col-lg-12">
		                	<div class="col-lg-6">
		                		<div class="form-group">
		                			<label>Type Discount</label>
		                			<select class="form-control" name="type_discount">
		                				<option value="rate">Rate</option>
		                				<option value="value">Value</option>
		                				<option value="total">Total</option>
		                			</select>
		                		</div>
		                	</div>
		                	<div class="col-lg-6">
		                		<div class="form-group">
		                			<label>Set Discount</label>
		                			<input type="text" class="form-control" name="set_discount">
		                		</div>
		                	</div>
		                </div>
           	    		<div class="col-lg-12">
	           	    		<button type="submit" class="btn btn-primary btn-sm" style="margin-bottom:15px;">Create Discount</button>
	           	    	</div>
					</form>
                </div>
            </div>
    	</div>
    </div>
</div>

<div id="select_hawb_modal" class="colorbox-modal colorbox-style" style="width:100%;">
    <div class="colorbox-header">
        <span>Search Hawb No</span>
    </div>
    <div class="colorbox-body">
        <form id="search-customer">
        <div class="form-group">
            <label>Search Hawb No</label>
            <input type="hidden" class="type-search-customer">
            <input class="form-control" type="text" class="search-hawb" onkeyup="search_hawb(this)">
        </div>
        </form>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>Hawb No</th>
                    <th width="75px;">Select</th>
                </tr>
            </thead>
            <tbody class="result-search-customer"></tbody>
        </table>
    </div>
</div>


<script type="text/javascript">
$(document).ready(function(){
	$('button#select-hawb').click(function(){
        $.colorbox({
            inline:true,
            href: $('#select_hawb_modal'),
            width: 800,
            height:400,
            scrolling:true,
        })
    })

	$('button.select-search-customer').live('click',function(){
        data_id = $(this).attr('data_id');
        $.post('<?=base_url()?>manifest/ajax/get_data_form',{'data_id':data_id},function(data){
        	$('div.data_form').html(data);
        	$('.panel-discount').fadeIn();
        	$.colorbox.close();
        })
    })
})


function search_hawb(t) {
    if(t.value.length > 0) {
        $.post('<?=base_url()?>manifest/ajax/search_hawb',{'keyword': t.value, 'type':$('.type-search-customer').val()}, function(data){
            if(data == 0) {
                $('.result-search-customer').html('').hide();
            } else {
                $('.result-search-customer').html(data).show();
            }
        })
    } else {
        $('.result-search-customer').html('').hide();
    }
}
</script>