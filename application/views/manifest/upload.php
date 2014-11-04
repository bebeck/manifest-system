<div id="page-wrapper">
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                        Manifest Upload
                </div>
                <div class="panel-body">
                    <form id="form_upload_manifest" method="post" action="<?=site_url('manifest/ajax/upload')?>">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="alert alert-warning" role="alert">
                                <span class="glyphicon glyphicon-warning-sign"></span> Format header excel
                                <table class="table table-striped table-bordered" style="margin-top:20px;">
                                    <tbody>
                                        <tr>
                                            <?php
                                                foreach ($this->manifest_model->get_header_format() as $key => $value) {
                                                    echo '<td align="center">'.str_ireplace('_', ' ', $value).'</td>';
                                                }
                                            ?>
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                            <div class="form-group">
                                <label>Consign To</label>
                                <input class="form-control" name="consign_to" required>
                            </div>
                            <div class="form-group">
                                <label>Mawb No</label>
                                <input class="form-control" name="mawb_no" required>
                            </div>
                            <div class="form-group">
                                <label>Flight No</label>
                                <input class="form-control" name="flight_no" required>
                            </div>
                            
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
       
                            <div class="form-group">
                                <input id="fileupload" type="file" name="userfile">
                            </div>
                           
                            <button type="submit" class="btn btn-success btn-sm submit-upload">Submit <img src="<?=base_url('asset/images/ajax-loader.gif')?>" class="ajax-loader" style="margin-left:20px; display:none;"></button>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
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