<div id="wrapper">
    <div id="page-wrapper">
        <div class="row">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Manage User
                </div>
                <div class="row" style="padding:5px;">
                    <div class="col-lg-12">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>Username</th>
                                        <th>Last Activity</th>
                                        <th width="150">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        foreach ($list_user as $key => $row) {
                                            if(strtolower($row->type) == 'admin') $disabled = 'disabled'; else $disabled = '';
                                            echo '
                                                <tr>
                                                    <td valign="middle">'.$row->username.'</td>
                                                    <td valign="middle">'.$row->last_activity.'</td>
                                                    <td valign="middle">
                                                        <div class="btn-group btn-group-xs">
                                                            <button type="button" class="btn btn-default">Activity</button>
                                                            <button type="button" class="btn btn-default '.$disabled.'">Edit</button>
                                                            <button type="button" class="btn btn-danger '.$disabled.' delete-user" username="'.$row->username.'" user_id="'.$row->user_id.'">Delete</button>
                                                        </div>
                                                    </td>
                                                </tr>
                                            ';
                                        }
                                    ?>
                                </tbody>
                            </table>
                        <div class="btn-group btn-group-s">
                            <button type="button" class="btn btn-primary btn-sm add-user">Add User</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="add_user_modal">
<form id="form_add_user" method="post" action="<?=site_url('administrator/ajax/add_user')?>">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title">Add User</h4>
      </div>
      <div class="modal-body">
        <p class="message-form-add" style="padding:15px 15px; display:none;"></p>
        <div class="form-group">
            <label>Username</label>
            <input class="form-control username" type="text" name="username" min-length="3" placeholder="Enter Username" required/>
        </div>                                             
        <div class="form-group">
            <label>Password</label>
            <input class="form-control" type="password" name="password" min-length="8" placeholder="Enter Password" required/>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-sm btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</form>
</div>

<div class="modal fade" id="delete_user_modal">
<form id="form_delete_user" method="post" action="<?=site_url('administrator/ajax/delete_user')?>">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title">Delete User</h4>
      </div>
      <div class="modal-body">
        <p class="message-form-delete" style="padding:15px 15px; display:none;"></p>
        <input type="hidden" name="user_id" id="USER_ID_DELETE"/>
        Are you sure want to delete user "<strong><span class="delete-username"><span></strong>"?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-sm btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</form>
</div>

<script type="text/javascript">
$(document).ready(function(){
    $('.add-user').click(function(){
        $('#form_add_user').resetForm();
        $('#add_user_modal').modal('show');
    })
    $('.delete-user').click(function(){
        user_id = $(this).attr('user_id');
        username = $(this).attr('username');

        $('#USER_ID_DELETE').val(user_id);
        $('.delete-username').text(username);
        $('#delete_user_modal').modal('show');
    })

    $('#form_add_user').ajaxForm({
        dataType: 'json',
        success: function(data){
            if(data.error == 'error') {
                $('.message-form-add').html(data.message).addClass('bg-danger').removeClass('bg-success').fadeIn();
                setTimeout(function(){
                    $('.message-form-add').fadeOut();
                }, 3000);
            } else {
                $('.message-form-add').html(data.message).removeClass('bg-danger').addClass('bg-success').fadeIn();
                setTimeout(function(){
                    $('#add_user_modal').modal('hide');
                    location.reload();
                }, 3000);
            }
        }
    })

    $('#form_delete_user').ajaxForm({
        dataType: 'json',
        success: function(data){
            if(data.error == 'error') {
                $('.message-form-delete').html(data.message).addClass('bg-danger').removeClass('bg-success').fadeIn();
                setTimeout(function(){
                    $('.message-form-delete').fadeOut();
                }, 3000);
            } else {
                $('.message-form-delete').html(data.message).removeClass('bg-danger').addClass('bg-success').fadeIn();
                setTimeout(function(){
                    $('#add_user_modal').modal('hide');
                    location.reload();
                }, 3000);
            }
        }
    })
})
</script>