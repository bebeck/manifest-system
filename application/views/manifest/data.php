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
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Upload Date</label>
                                    <div class="input-group date">
                                        <input type="text" class="form-control" id="UPLOAD_DATE">
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


<link rel="stylesheet" href="<?=base_url() ?>asset/library/select2/select2.css">
<link rel="stylesheet" href="<?=base_url() ?>asset/library/select2/bootstrap-select2.css">

<link rel="stylesheet" href="<?=base_url() ?>asset/library/datepicker/datepicker3.css">
<script type="text/javascript" src="<?=base_url('asset/library/datepicker/bootstrap-datepicker.js')?>"></script>
<script type="text/javascript" src="<?=base_url('asset/library/select2/select2.min.js')?>"></script>
<script type="text/javascript">

var FILE_NAME = '';
var NUM_PAGE = 1;
var DATE = '';

$(document).ready(function(){
    $('#FILE_NAME').select2();
    $('.input-group.date').datepicker({
        format: "yyyy-m-d",
        keyboardNavigation: false,
        forceParse: false,
        autoclose: true
    })
    $('.find-data').click(function(){ 
        NUM_PAGE = 1;
        FILE_NAME = $('#FILE_NAME').select2('val');
        DATE = ($('#UPLOAD_DATE').val()) ? $('#UPLOAD_DATE').val() : '';
        get_data(); 
    })
})

function gotopage(i) {
    NUM_PAGE = i;
    get_data();
}

function get_data(){
    $.ajax({
        url: '<?=site_url('manifest/ajax/get')?>',
        type: 'get',
        data: {'FILE_NAME': FILE_NAME,'DATE': DATE,'PAGE': NUM_PAGE},
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
  