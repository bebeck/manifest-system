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
                                    <label>Select File</label>
                                    <select class="form-control" id="file_name" multiple>
                                        <?php
                                            if($list_file != FALSE) {
                                                foreach ($list_file as $key => $value) {
                                                    echo '<option value="'.$value->file_id.'">'.$value->file_name.'</option>';
                                                }
                                            }
                                        ?>
                                    </select>
                                </div>                                             
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Upload Date</label>
                                    <div class="input-group date">
                                        <input type="text" class="form-control" id="created_date">
                                        <span class="input-group-addon datapicker"><i class="glyphicon glyphicon-th"></i></span>
                                    </div>
                                </div>          
                            </div>
                            <div class="col-lg-12">
                                <button type="submit" class="btn btn-sm btn-primary find-data">Find</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <table  class="table table-striped table-bordered table-hover">
            <thead>
                <tr>
                    <th width="100">Flight No</th>
                    <th width="100">Hawb No</th>
                    <th>Shipper</th>
                    <th>Consignee</th>
                    <th width="40">PKG</th>
                    <th>Description</th>
                    <th width="40">PCS</th>
                    <th width="40">KG</th>
                    <th width="40">Val</th>
                    <th width="40">PP</th>
                    <th width="40">CC</th>
                    <th>Remarks</th>
                    <th align="center" width="85px">Action</th>
                </tr>
            </thead>
            <tbody class="manifest-data-row" style="display:none;"></tbody>
        </table>
        <div class="row pagination col-lg-12"></div>
    </div>
</div>


<script type="text/javascript">
var file_name = '';
var date = '';
var page = 1;

$(document).ready(function(){
    $('#file_name').select2();
    $('.input-group.date').datepicker({
        format: "yyyy-m-d",
        keyboardNavigation: false,
        forceParse: false,
        autoclose: true
    })
    $('.find-data').click(function(){ 
        page = 1;
        file_name = $('#file_name').select2('val');
        date = ($('#created_date').val()) ? $('#created_date').val() : '';
        get_data(); 
    })
})

function gotopage(i) {
    page = i;
    get_data();
}

function get_data(){
    $.ajax({
        url: '<?=site_url('manifest/ajax/get')?>',
        type: 'get',
        data: {'file_name': file_name,'date': date,'page': page},
        dataType: 'json',
        success: function(get){
            elem = $('.manifest-data-row');
            pagination = $('.pagination');
            elem.html(get.data);
            pagination.html(get.pagination);
            elem.fadeIn();
        }
    })
}

</script>
  