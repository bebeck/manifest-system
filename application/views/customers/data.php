<div id="wrapper">

    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Filter Data
                    </div>
                    <div class="panel-body">
                    <form method="post">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Type</label>
                                    <select class="form-control cust_type" name="type">
                                        <option value="shipper">Shipper</option>
                                        <option value="consignee">Consignee</option>
                                    </select>
                                </div>
                                <!--<div class="form-group">
                                    <label>Uploade Date</label>
                                    <input type="date" class="form-control" id="upload_date">
                                 
                                </div>-->                            
                            </div>
                            <div class="col-lg-6">
                                <!--<div class="form-group">
                                    <label>Shipper</label>
                                    <input type="text" class="form-control" id="shipper">
                                </div>
                                <div class="form-group">
                                    <label>Consignee</label>
                                    <input type="text" class="form-control" id="consignee">                                 
                                </div>-->                            
                            </div>
                            <div class="col-lg-12">
                            
                               <input type="submit" name="find" class="btn btn-default find-data" value="find">
                            </div>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        
        


        <div class="row container-data">
            <div class="col-lg-12">
                <div class="table-responsive">
           
            <input type="search" class="light-table-filter form-control" data-table="order-table" placeholder="Search" style="width:30%; float:right; margin-bottom:1%;">
                    <table class=" table table-striped table-bordered table-hover order-table table" id="dataTables-example">
                        <thead>
                            <tr>
                                <th>Customer Name</th>
                                <th>Address</th>
                                <th>Type</th>
                                <th align="center" width="135px">Action</th>
                                
                            </tr>
                        </thead>
                        <tbody class="customer-data-row" >
                        
                        	<?php
							
							
							 foreach ($dataResult as $key => $val) { 
								echo "<tr>";
								echo "<td><a href=customers/detail/".$val->cust_id.">".$val->name ."</td>";
								echo "<td>".$val->address ."</td>";
								echo "<td>".$val->type."</td>";
								echo "<td><a href='customers/edit/".$val->cust_id."' data-original-title='Edit this user' data-toggle='tooltip' type='button' class='btn btn-sm btn-warning' name='edit'><i class='glyphicon glyphicon-edit'></i></a> &nbsp;<a href='#' data-href='customers/customer_delete/".$val->cust_id."' data-original-title='Remove this user' data-toggle='modal'  data-target='#confirm-delete' class='btn btn-sm btn-danger'><i class='glyphicon glyphicon-remove'></i></a></td>";
								echo "</tr>";
							}
							?>
                        	
                        
                        
                        </tbody>
                    </table>
                    
                </div>  
            </div>
        </div>

        <div class="row pagination col-lg-12"></div>
    </div>
</div>

<div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                Confirmation 
            </div>
            <div class="modal-body">
                Are You Sure Want To Delete This User?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                <a href="#" class="btn btn-danger danger">Delete</a>
            </div>
        </div>
    </div>
</div>


<script type="text/javascript">
var cust_type = 'shipper';
var numpage = 1;

$(document).ready(function(){
    $('#cust_type').change(function(){  cust_type = $(this).val(); })
    $('.find-data').click(function(){ 
        numpage     = 1; 
        cust_type   = $('.cust_type').val();
        get_data(); 
    })
})

function gotopage(i) {
    numpage = i;
    get_data();
}

function get_data(){
    $.ajax({
        url: '<?=site_url('customers/ajax/get')?>',
        type: 'get',
        data: {'page': numpage, 'type':cust_type},
        dataType: 'json',
        success: function(get){
            elem = $('.customer-data-row');
            pagination = $('.pagination');
            elem.html(get.data);
            pagination.html(get.pagination);
            elem.fadeIn();
        }
    })
}



(function(document) {
	'use strict';

	var LightTableFilter = (function(Arr) {

		var _input;

		function _onInputEvent(e) {
			_input = e.target;
			var tables = document.getElementsByClassName(_input.getAttribute('data-table'));
			Arr.forEach.call(tables, function(table) {
				Arr.forEach.call(table.tBodies, function(tbody) {
					Arr.forEach.call(tbody.rows, _filter);
				});
			});
		}

		function _filter(row) {
			var text = row.textContent.toLowerCase(), val = _input.value.toLowerCase();
			row.style.display = text.indexOf(val) === -1 ? 'none' : 'table-row';
		}

		return {
			init: function() {
				var inputs = document.getElementsByClassName('light-table-filter');
				Arr.forEach.call(inputs, function(input) {
					input.oninput = _onInputEvent;
				});
			}
		};
	})(Array.prototype);

	document.addEventListener('readystatechange', function() {
		if (document.readyState === 'complete') {
			LightTableFilter.init();
		}
	});

})(document);

$('#confirm-delete').on('show.bs.modal', function(e) {
    $(this).find('.danger').attr('href', $(e.relatedTarget).data('href'));
});


</script>