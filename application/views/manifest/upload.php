<style type="text/css">
.tab-pane {
    padding: 10px 20px;
    border-left: 1px solid #e2e2e2;
    border-right: 1px solid #e2e2e2;
    border-bottom: 1px solid #e2e2e2;
}
</style>

<div id="page-wrapper">
    <div class="row">
        <ul class="nav nav-tabs" role="tablist" id="request_tab">
          <li role="presentation" class="active"><a href="#tab-import" role="tab" data-toggle="tab">Import</a></li>
          <li role="presentation"><a href="#tab-export" role="tab" data-toggle="tab">Export</a></li>
        </ul>
        <div class="tab-content">
            <div role="tabpanel" class="tab-pane fade active in" id="tab-import">
                <form id="form_upload_manifest" method="post" action="<?=site_url('manifest/ajax/upload')?>">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label>Consign To</label>
                            <input class="form-control" name="consign_to" required>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label>Mawb No</label>
                            <input class="form-control" name="mawb_no" required>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label>Flight No</label>
                            <input class="form-control" name="flight_no" required>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label>Gross Weight</label>
                            <input class="form-control" name="gross_weight" required>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label>From</label>
                            <select class="form-control flight_from" name="flight_from" required>
                                <?php
                                    foreach ($this->customers_model->list_country() as $key => $value) {
                                        $selected = (strtolower($value) == 'indonesia') ? 'selected' : '';
                                        echo '<option value="'.$value.'" '.$selected.'>'.$value.'</option>';
                                    }
                                ?>          
                            </select>                                     
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label>To</label>
                            <select class="form-control flight_to" name="flight_to" required>
                                <?php
                                    foreach ($this->customers_model->list_country() as $key => $value) {
                                        $selected = (strtolower($value) == 'indonesia') ? 'selected' : '';
                                        echo '<option value="'.$value.'" '.$selected.'>'.$value.'</option>';
                                    }
                                ?>
                            </select>                                  
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group">
                            <input id="fileupload" type="file" name="userfile">
                        </div>
                        <input type="hidden" name="manifest_type" value="import">
                        <button type="submit" class="btn btn-success btn-sm submit-upload">Upload</button>
                    </div>
                </div>
                </form>
            </div>

            <div role="tabpane1" class="tab-pane fade in" id="tab-export">
                <form method="post" action="<?=base_url()?>manifest/ajax/update" id="manifest_data_update">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Data ID</label>
                            <?php
                            $data_id = 'THS' . date('ymdhis') . $this->manifest_model->data_new_id();
                            ?>
                            <input class="form-control" type="text" name="data_id" value="<?=$data_id?>" disabled>
                            <input class="form-control" type="hidden" name="data_id" value="<?=$data_id?>">
                        </div>
                        <div class="form-group">
                            <label>Hawb No</label>
                            <input class="form-control" type="text" name="hawb_no">
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="form-group">
                            <label>Pkg</label>
                            <input class="form-control" type="text" name="pkg">
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="form-group">
                            <label>Pcs</label>
                            <input class="form-control" type="text" name="pcs">
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="form-group">
                            <label>KG</label>
                            <input class="form-control" type="text" name="kg">
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="form-group">
                            <label>Value</label>
                            <input class="form-control" type="text" name="value">
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="form-group">
                            <label>Prepaid</label>
                            <input class="form-control" type="text" name="prepaid">
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="form-group">
                            <label>Collect</label>
                            <input class="form-control" type="text" name="collect">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Shipper</label>
                            <p class="txt-shipper"></p>
                            <input type="hidden" name="shipper" value="">
                            <button type="submit" class="btn btn-success btn-xs submit-upload">Select shipper</button>
                            <button type="submit" class="btn btn-success btn-xs submit-upload">Add new shipper</button>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Consignee</label>
                            <p class="txt-consignee"></p>
                            <input type="hidden" name="consignee" value="">
                            <button type="submit" class="btn btn-success btn-xs submit-upload">Select consignee</button>
                            <button type="submit" class="btn btn-success btn-xs submit-upload">Add new consignee</button>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Description</label>
                            <textarea class="form-control" rows="2" name="description"></textarea>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="form-group">
                            <label>Other Charge Tata</label>
                            <input class="form-control" type="text" name="other_charge_tata">
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="form-group">
                            <label>Other Charge PML</label>
                            <input class="form-control" type="text" name="other_charge_pml">
                        </div>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div id="upload_progress_modal" class="colorbox-modal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-body">
        <div class="progress progress-striped active">
          <div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
        </div>
        <div class="progress-message" style="text-align:center;"></div>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
$(function () {
    $('.flight_from, .flight_to').select2();

    $('#form_upload_manifest').ajaxForm({
        beforeSend: function() {
            var percentVal = '0%';
            $('.progress-bar').width(percentVal).html(percentVal);
        },
        uploadProgress: function(event, position, total, percentComplete) {
            var percentVal = percentComplete + '%';
            $('.progress-bar').width(percentVal).html(percentVal);
            $('.progress-message').html('Please wait . . .');
        },
        beforeSubmit: function() {
            $.colorbox({
                inline:true,
                href:$('#upload_progress_modal')
            })
        },
        dataType: 'json',
        success: function(data) {
            if(data.status == 'error') {
                $('.progress-message').html(data.message);
                setTimeout(function(){
                    $.colorbox.close();
                    $('.progress-message').html('');
                }, 2000);
            } else {
                $('#form_upload_manifest').resetForm();
                $('.progress-message').html('Upload Finished . . .');
                setTimeout(function(){
                    $.colorbox.close();
                }, 4000);
            }
        }
    });
});
</script>