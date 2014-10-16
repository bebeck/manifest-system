<div id="wrapper">

    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Filter Data
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Type</label>
                                    <select class="form-control cust_type">
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
                                <button type="submit" class="btn btn-default find-data">Find</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row container-data">
            <div class="col-lg-12">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr>
                                <th width="100">Customer ID</th>
                                <th>Address</th>
                                <th align="center" width="135px">Action</th>
                            </tr>
                        </thead>
                        <tbody class="customer-data-row" style="display:none;"></tbody>
                    </table>
                </div>  
            </div>
        </div>

        <div class="row pagination col-lg-12"></div>
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

</script>