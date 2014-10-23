
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
                                    <select class="form-control" id="FILE_NAME" multiple>
                                        <?php
                                            if($list_file != FALSE) {
                                                foreach ($list_file as $key => $value) {
                                                    echo '<option value="'.$value->FILE_ID.'">'.$value->FILE_NAME.'</option>';
                                                }
                                            }
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Shipper</label>
                                    <select class="form-control" id="SHIPPER" multiple>
                                    </select>
                                </div>                                                            
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Upload Date</label>
                                    <div class="input-group date">
                                        <input type="text" class="form-control" id="UPLOAD_DATE">
                                        <span class="input-group-addon datapicker"><i class="glyphicon glyphicon-th"></i></span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Consignee</label>
                                    <select class="form-control" id="CONSIGNEE" multiple>
                                    </select>                               
                                </div>                            
                            </div>
                            <div class="col-lg-12">
                                <button type="submit" class="btn btn-default find-data">Find</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <table  class="table table-striped table-bordered table-hover">
            <thead>
                <tr>
                    <th>Flight No</th>
                    <th>Hawb No</th>
                    <th>Shipper</th>
                    <th>Consignee</th>
                    <th>PKG</th>
                    <th>Description</th>
                    <th>PCS</th>
                    <th>KG</th>
                    <th>Value</th>
                    <th>PP</th>
                    <th>CC</th>
                    <th>Remarks</th>
                    <th align="center" width="135px">Action</th>
                </tr>
            </thead>
            <tbody class="manifest-data-row" style="display:none;"></tbody>
        </table>
        <div class="row pagination col-lg-12"></div>
    </div>
</div>


<link rel="stylesheet" href="<?=base_url() ?>asset/library/select2/select2.css">
<link rel="stylesheet" href="<?=base_url() ?>asset/library/select2/bootstrap-select2.css">

<link rel="stylesheet" href="<?=base_url() ?>asset/library/datepicker/datepicker3.css">
<script type="text/javascript" src="<?=base_url('asset/library/datepicker/bootstrap-datepicker.js')?>"></script>
<script type="text/javascript" src="<?=base_url('asset/library/select2/select2.min.js')?>"></script>
<script type="text/javascript">

$(document).ready(function(){
    $('#FILE_NAME, #SHIPPER, #CONSIGNEE').select2();
    $('.input-group.date').datepicker({
        format: "yyyy-m-d",
        keyboardNavigation: false,
        forceParse: false,
        autoclose: true
    });
})


var file = '';
var numpage = 1;
$('.find-data').click();
$(document).ready(function(){
    $('#file').change(function(){  file = $(this).val(); })
    $('.find-data').click(function(){ 
        numpage = 1; 
        file = $('#file').val();
        get_data(); 
    })
})

function gotopage(i) {
    numpage = i;
    get_data();
}

function get_data(){
    $.ajax({
        url: '<?=site_url('manifest/ajax/get')?>',
        type: 'get',
        data: {'file': file,'page': numpage},
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
  