 <link rel="stylesheet" type="text/css" href="<?=base_url('asset/library/fileupload/css/jquery.fileupload.css')?>">
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
                                    <select class="form-control" name="flight_from" required>
                                        <option>Taiwan</option>
                                        <option>China</option>
                                        <option>Hongkong</option>
                                        <option>Vietnam</option>
                                        <option>Indonesia</option>
                                    </select>                                     
                                </div>
                                
                                <div class="form-group">
                                    <label>To</label>
                                    <select class="form-control" name="flight_to" required>
                                        <option>Taiwan</option>
                                        <option>China</option>
                                        <option>Hongkong</option>
                                        <option>Vietnam</option>
                                        <option>Indonesia</option>
                                    </select>                                     
                                </div>
           
                                <div class="form-group">
                                    <input id="fileupload" type="file" name="userfile">
                                </div>
                               
                                <button type="submit" class="btn btn-info submit-upload">Submit <img src="<?=base_url('asset/images/ajax-loader.gif')?>" class="ajax-loader" style="margin-left:20px; display:none;"></button>
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
<div class="modal fade" id="upload_manifest_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-body">
        <div class="progress">
          <div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
        </div>
        <div class="progress-message" style="text-align:center;"></div>
      </div>
    </div>
  </div>
</div>

<script src="<?=base_url('asset/javascript/ajax.form.min.js')?>"></script>
<script type="text/javascript">
$(function () {
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
            $('#upload_manifest_modal').modal({
                backdrop: false,
                keyboard: false,
                show: true
            });
        },
        dataType: 'json',
        success: function(data) {
            if(data.status == 'error') {
                $('#upload_manifest_modal').html(data.message);
            } else {
                $('#form_upload_manifest').resetForm();
                $('.progress-message').html('Upload Finished . . .' + data.redirect);
            }
        }
    });
});
</script>