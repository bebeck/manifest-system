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
              <h3 class="panel-title"><?= $customer_data->name?></h3>
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
   <form method="post">              
                  <table class="table table-user-information">
                    <tbody>
                      <tr>
                        <td>Attn:</td>
                        <td><?= $customer_data->sort_name ?></td>
                      </tr>
                      <tr>
                        <td>Address</td>
                         <td><?= $customer_data->address ?></td>
                      </tr>
                      <tr>
                        <td>Status</td>
                        <td><?= $customer_data->status ?></td>
                      </tr>
                   
                         <tr>
                             <tr>
                        <td>Tax Class</td>
                        <?php if ($customer_data->tax_class >0 ){$tax_class = $customer_data->tax_class."%";}elseif($customer_data->tax_class== "none"){
							 $tax_class = $customer_data->tax_class;}else $tax_class="" ?>
                        <td><?= $tax_class ?></td>
                      </tr>
                      
                      <tr>
                        <td>Email</td>
                       
                        <td><a href="mailto:<?= $customer_data->email?>"><?= $customer_data->email?></a></td>
                      </tr>
					  <tr>
                        <td>Phone Number</td>
                        <?php if($customer_data->mobile != ""){
								$mobile = $customer_data->mobile."(mobile)";
							}else $mobile = ""?>
                        <td><?php echo $customer_data->phone."(Phone)" ?><br><br><?= $mobile?>
                        </td>
                           
                      </tr>

					  <tr>
                        <td>Due Date Payment</td>
                        <?php if($customer_data->due_date_payment != "0000-00-00"){
								$duedate = $customer_data->due_date_payment;
							}elseif($customer_data->due_date_payment == "0000-00-00"){
								$duedate = "<div style='color:red'>not set </div>";
							}
							?>
                        <td><?php echo $duedate?><br><br>
                        </td>
                           
                      </tr>
                     
                    </tbody>
                  </table>
               
                  <?php if($customer_data->status == "regular"){
                 	echo "<input type='submit' name='unRegular' class='btn btn-primary' value='set Unregular customer'>";
				  }elseif($customer_data->status == ""){
					echo "<input type='submit' name='subRegular' class='btn btn-primary' value='make regular customer'>";
				  }
                    ?>
               </form>
                </div>
              </div>
            </div>
                 <div class="panel-footer">
                        <a data-original-title="Broadcast Message" data-toggle="tooltip" type="button" class="btn btn-sm btn-primary"><i class="glyphicon glyphicon-envelope"></i></a>
                        <span class="pull-right">
                           <?php  echo  "<a href='".base_url()."customers/edit/".$customer_data->cust_id."' data-original-title='Edit this user' data-toggle='tooltip' type='button' class='btn btn-sm btn-warning' name='edit'><i class='glyphicon glyphicon-edit'></i></a>
                    
                   <a href='#' data-href='".base_url()."'customers/customer_delete/".$customer_data->cust_id."'data-original-title='Remove this user' data-toggle='modal'  data-target='#confirm-delete' class='btn btn-sm btn-danger'><i class='glyphicon glyphicon-remove'></i></a>" ?>
                        </span>
                    </div>
            
          </div>
          
        </div>

                           <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example">
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
                                    </tr>
                                </thead>
                                <tbody class="manifest-data-row">
                                <?php
                                    if($cust_activity != false) {
                                        $no = 1;
                                        foreach ($cust_activity as $key => $row) {
                                            echo '
                                            <tr id="' . $row->data_id.'">
                                                <td class="data_no">'.$row->data_no.'</td>
                                                <td class="hawb_no">'.$row->hawb_no.'</td>
                                            ';

                                            echo '<td class="shipper">';
                                            $shipper = $this->customers_model->get_by_id($row->shipper);
                                            if($shipper != FALSE) {                                                
                                                echo '
                                                    <strong>'.$shipper->name.'</strong><br/>
                                                    '.$shipper->address.'<br/>
                                                    '.$shipper->country;
                                            }
                                            echo '</td>';

                                            echo '<td class="consignee">';
                                            $consignee = $this->customers_model->get_by_id($row->consignee);
                                            if($consignee != FALSE) {                                                
                                                echo '
                                                    <strong>'.$consignee->name.'</strong><br/>
                                                    '.$consignee->address.'<br/>
                                                    '.$consignee->country;
                                            }
                                            echo '</td>';
											
                                            echo '
                                                <td align="center" class="pkg">'.$row->pkg.'</td>
                                                <td class="description">'.$row->description.'</td>
                                                <td align="center" class="pcs">'.$row->pcs.'</td>
                                                <td align="center" class="kg">'.$row->kg.'</td>
                                                <td align="center" class="value">'.$row->value.'</td>
                                                <td align="center" class="prepaid">'.$row->prepaid.'</td>
                                                <td align="center" class="collect">'.$row->collect.'</td>
                                                <td class="remarks">'.$row->remarks.'</td>
                                            </tr>
                                            ';
                                            $no++;
                                        }
                                    } else {
                                        echo '
                                        <tr>
                                            <td colspan="13" align="center">No found data</td>
                                        </tr>
                                        ';
                                    }
                                ?>
                            </tbody>
                        </table>

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