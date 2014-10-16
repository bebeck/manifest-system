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
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>Consign To</label>
                                    <input class="form-control consign_to" required>
                                </div>
                                <div class="form-group">
                                    <label>Mawb No</label>
                                    <input class="form-control mawb_no" required>
                                </div>
                                <div class="form-group">
                                    <label>Flight No</label>
                                    <input class="form-control flight_no" required>
                                </div>
                                
                                <div class="form-group">
                                    <label>From</label>
                                    <select class="form-control flight_from" required>
                                        <option>Taiwan</option>
                                        <option>China</option>
                                        <option>Hongkong</option>
                                        <option>Vietnam</option>
                                        <option>Indonesia</option>
                                    </select>                                     
                                </div>
                                
                                <div class="form-group">
                                    <label>To</label>
                                    <select class="form-control flight_to" required>
                                        <option>Taiwan</option>
                                        <option>China</option>
                                        <option>Hongkong</option>
                                        <option>Vietnam</option>
                                        <option>Indonesia</option>
                                    </select>                                     
                                </div>
           
                                <div class="form-group">
                                    <span id="upload_info"></span>
                                    <input type="hidden" name="file_name" class="file_name" value="">
                                    <span class="btn btn-success btn-xs fileinput-button">
                                        <i class="glyphicon glyphicon-plus"></i>
                                        <span>Select files...</span>
                                        <!-- The file input field used as target for the file upload widget -->
                                        <input id="fileupload" type="file" name="files[]" multiple>
                                    </span>
                                    <div id="progress" class="progress" style="margin-top:10px; display:none;">
                                        <div class="progress-bar progress-bar-success"></div>
                                    </div>
                                </div>
                               
                                <button type="submit" class="btn btn-info submit-upload">Submit <img src="<?=base_url('asset/images/ajax-loader.gif')?>" class="ajax-loader" style="margin-left:20px; display:none;"></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript" src="<?=base_url('asset/javascript/bootstrap.min.js')?>"></script>
<script type="text/javascript" src="<?=base_url('asset/library/fileupload/js/jquery.iframe-transport.js')?>"></script>
<script type="text/javascript" src="<?=base_url('asset/library/fileupload/js/vendor/jquery.ui.widget.js')?>"></script>
<script type="text/javascript" src="<?=base_url('asset/library/fileupload/js/jquery.fileupload.js')?>"></script>
<script>
$(function () {

    $('.submit-upload').click(function(){
        $(this).addClass('disabled');
        $('.consign_to, .mawb_no, .flight_no, .flight_from, .flight_to').addClass('disabled');
        $('.ajax-loader').fadeIn();

        consign_to = $('.consign_to').val();
        mawb_no = $('.mawb_no').val();
        flight_no = $('.flight_no').val();
        flight_from = $('.flight_from').val();
        flight_to = $('.flight_to').val();
        file_name = $('.file_name').val();

        $.ajax({
            url: '<?=site_url('manifest/ajax/upload')?>',
            type: 'post',
            data: {'consign_to':consign_to, 'mawb_no': mawb_no, 'flight_no': flight_no, 'flight_from': flight_from, 'flight_to': flight_to, 'file_name': file_name},
            dataType: 'json',
            success: function(data){
                window.location = data.redirect;
            }
        })
    })


    $('#fileupload').fileupload({
        url: '<?=site_url('manifest/ajax/fileupload')?>',
        dataType: 'json',
        done: function (e, data) {
            $('#progress').hide();
            $.each(data.result.files, function (index, file) {
                $('.file_name').val(file.name);
            });
            $('#upload_info').text('File Uploaded');
            $('.fileinput-button').hide();
        },
        progressall: function (e, data) {
            $('.fileinput-button').hide();
            $('#progress').show();
            var progress = parseInt(data.loaded / data.total * 100, 10);
            $('#progress .progress-bar').css(
                'width',
                progress + '%'
            );
        }
    }).prop('disabled', !$.support.fileInput)
        .parent().addClass($.support.fileInput ? undefined : 'disabled');
});
</script>