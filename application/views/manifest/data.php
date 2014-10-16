
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
                                    <select class="form-control" id="file">
                                        <option value="">All Files</option>
                                        <?php
                                            if($list_file != FALSE) {
                                                foreach ($list_file as $key => $value) {
                                                    if(isset($_GET['file'])) $selected = ($value->file_id == $_GET['file']) ? 'selected' : '';

                                                    echo '<option value="'.$value->file_id.'" selected="'.$selected.'">'.$value->name.'</option>';
                                                }
                                            }
                                        ?>
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


<script type="text/javascript">
var file = '';
var numpage = 1;
$('.find-data').click();
$(document).ready(function(){
    <?php if(isset($_GET['file'])) {
        echo "
        file = $('#file').val();
        get_data();
        ";
    } ?>

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
  