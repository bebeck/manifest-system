<style>

.user-row {
    margin-bottom: 14px;
}

.user-row:last-child {
    margin-bottom: 0;
}

.dropdown-user {
    margin: 13px 0;
    padding: 5px;
    height: 100%;
}

.dropdown-user:hover {
    cursor: pointer;
}

.table-user-information > tbody > tr {
    border-top: 1px solid rgb(221, 221, 221);
}

.table-user-information > tbody > tr:first-child {
    border-top: 0;
}


.table-user-information > tbody > tr > td {
    border-top: 0;
}
.toppad
{margin-top:20px;
}



</style>

<div class="wrapper">
    <div id="page-wrapper">

    
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xs-offset-0 col-sm-offset-0 col-md-offset-3 col-lg-offset-3 toppad" >
   
   
          <div class="panel panel-info">
            <div class="panel-heading">
              <h3 class="panel-title"><?= $getUser->name?></h3>
            </div>
            <div class="panel-body">
              <div class="row">
                <div class="col-md-3 col-lg-3 " align="center"> <img alt="User Pic" src="https://lh5.googleusercontent.com/-b0-k99FZlyE/AAAAAAAAAAI/AAAAAAAAAAA/eu7opA4byxI/photo.jpg?sz=100" class="img-circle"> </div>
                
                <!--<div class="col-xs-10 col-sm-10 hidden-md hidden-lg"> <br>
                  <dl>
                    <dt>DEPARTMENT:</dt>
                    <dd>Administrator</dd>
                    <dt>HIRE DATE</dt>
                    <dd>11/12/2013</dd>
                    <dt>DATE OF BIRTH</dt>
                       <dd>11/12/2013</dd>
                    <dt>GENDER</dt>
                    <dd>Male</dd>
                  </dl>
                </div>-->
                <div class=" col-md-9 col-lg-9 "> 
                  <table class="table table-user-information">
                    <tbody>
                      <tr>
                        <td>Name:</td>
                        <td><?= $getUser->sort_name ?></td>
                      </tr>
                      <tr>
                        <td>Address</td>
                         <td><?= $getUser->address ?></td>
                      </tr>
                      <tr>
                        <td>Status</td>
                        <td><?= $getUser->status ?></td>
                      </tr>
                   
                         <tr>
                             <tr>
                        <td>Tax Class</td>
                        <?php if ($getUser->tax_class >0 ){$tax_class = $getUser->tax_class."%";}elseif($getUser->tax_class== "none"){
							 $tax_class = $getUser->tax_class;}else $tax_class="" ?>
                        <td><?= $tax_class ?></td>
                      </tr>
                      
                      <tr>
                        <td>Email</td>
                       
                        <td><a href="mailto:info@support.com"><?= $getUser->email?></a></td>
                      </tr>
                        <td>Phone Number</td>
                        <?php if($getUser->mobile != ""){
								$mobile = $getUser->mobile."(mobile)";
							}else $mobile = ""?>
                        <td><?php echo $getUser->phone."(Phone)" ?><br><br><?= $mobile?>
                        </td>
                           
                      </tr>
                     
                    </tbody>
                  </table>
                  
                  <a href="#" class="btn btn-primary">Make Regular Customer</a>
                 
                </div>
              </div>
            </div>
                 <div class="panel-footer">
                        <a data-original-title="Broadcast Message" data-toggle="tooltip" type="button" class="btn btn-sm btn-primary"><i class="glyphicon glyphicon-envelope"></i></a>
                        <span class="pull-right">
                           <?php  echo  "<a href='".base_url()."customers/edit/".$getUser->cust_id."' data-original-title='Edit this user' data-toggle='tooltip' type='button' class='btn btn-sm btn-warning' name='edit'><i class='glyphicon glyphicon-edit'></i></a>
                    
                   <a href='#' data-href='".base_url()."'customers/customer_delete/".$getUser->cust_id."'data-original-title='Remove this user' data-toggle='modal'  data-target='#confirm-delete' class='btn btn-sm btn-danger'><i class='glyphicon glyphicon-remove'></i></a>" ?>
                        </span>
                    </div>
            
          </div>
        </div>
      </div>
      </div>
    </div>
    
      <div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                Confirmation 
            </div>
            <div class="modal-body">
                Are You Sure Want To Delete This User?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                <a href="<?=base_url()?>customers/customer_delete/<?= $getUser->cust_id ?>" class="btn btn-danger danger">Delete</a>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">


$('#confirm-delete').onclick('show.bs.modal',function(e) {
			
 		$(this).find('.danger').attr('href', $(e.relatedTarget).data('href'));
});



</script>