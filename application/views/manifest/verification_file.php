<div id="wrapper">
    <div id="page-wrapper">
        <div class="row">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Verification Data
                </div>
                <div class="row" style="padding:5px;">
                    <div class="col-lg-12">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover">
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
                                        <th width="70">Remarks</th>
                                        <th width="70">Other Charge Tata</th>
                                        <th width="70">Other Charge PML</th>
                                    </tr>
                                </thead>
                                <tbody class="manifest-data-row">
                                <?php
                                    if($list_data != false) {
                                        $no = 1;
                                        foreach ($list_data as $key => $row) {
                                            $check_valid_status = $this->manifest_model->check_valid_status($row->data_id);
                                            switch ($check_valid_status) {
                                                case '0': $status_class = ''; break;
                                                case '1': $status_class = 'warning'; break;
                                                case '2': $status_class = 'success'; break;
                                                default: $status_class = ''; break;
                                            }
                                            echo '
                                            <tr id="' . $row->data_id.'" class="'.$status_class.'">
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
                                            } else {
                                                echo $row->shipper;
                                                echo '<hr/>';
                                                $similar = $this->customers_model->check_speeling_address($row->shipper);
                                                echo '<div class="btn-group">';
                                                if($similar != FALSE) {
                                                    echo '
                                                        <button class="btn btn-xs btn-info show-similar" type="button" title="You have '.count($similar).' similar customer(s)" manifest_data_id="'.$row->data_id.'" data_type="shipper">
                                                          Similar <span class="badge">'.count($similar).'</span>
                                                        </button>
                                                    ';
                                                }
                                                echo '
                                                <button type="button" class="btn btn-xs btn-danger add-customer" title="Add as new customer" manifest_data_id="'.$row->data_id.'" data_type="shipper">
                                                    <span class="glyphicon glyphicon-plus"></span>
                                                </button>
                                                </div>';
                                            }
                                            echo '</td>';

                                            echo '<td class="consignee">';
                                            $consignee = $this->customers_model->get_by_id($row->consignee);
                                            if($consignee != FALSE) {                                                
                                                echo '
                                                    <strong>'.$consignee->name.'</strong><br/>
                                                    '.$consignee->address.'<br/>
                                                    '.$consignee->country;
                                            } else {
                                                echo $row->consignee;
                                                echo '<hr/>';
                                                $similar = $this->customers_model->check_speeling_address($row->consignee);
                                                echo '<div class="btn-group">';
                                                if($similar != FALSE) {
                                                    echo '
                                                        <button class="btn btn-xs btn-info show-similar" type="button" title="You have '.count($similar).' similar customer(s)" manifest_data_id="'.$row->data_id.'" data_type="consignee">
                                                          Similar <span class="badge">'.count($similar).'</span>
                                                        </button>
                                                    ';
                                                }
                                                echo '
                                                    <button class="btn btn-xs btn-danger add-customer" title="Add as new customer" manifest_data_id="'.$row->data_id.'" data_type="consignee">
                                                    <span class="glyphicon glyphicon-plus"></span>
                                                    </button>
                                                </div>';
                                            }
                                            
                                            echo '
                                                <td align="center" class="pkg">'.$row->pkg.'</td>
                                                <td class="description">'.$row->description.'</td>
                                                <td align="center" class="pcs">'.$row->pcs.'</td>
                                                <td align="center" class="kg">'.$row->kg.'</td>
                                                <td align="center" class="value">'.$row->value.'</td>
                                                <td align="center" class="prepaid">'.$row->prepaid.'</td>
                                                <td align="center" class="collect">'.$row->collect.'</td>
                                                <td class="remarks">'.$row->remarks.'</td>
                                                <td class="remarks">'.$row->other_charge_tata.'</td>
                                                <td class="remarks">'.$row->other_charge_pml.'</td>
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
                        <!--<form id="form_verification" method="post" action="<?=site_url('manifest/ajax/verification')?>">
                        <input type="hidden" name="FILE_ID" value="<?=$file->file_id?>">
                        <div class="btn-group">
                            <button type="submit" class="btn btn-sm btn-primary">Save Verification</button>
                        </div>-->
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modal_add_customer" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <form id="add_customer_modal" method="post" action="<?=base_url()?>customers/ajax/add_customer">
    <input type="hidden" class="form-control cust_id" name="cust_id" value="">
    <input type="hidden" class="form-control data_id" name="data_id" value="">
    <input type="hidden" class="form-control data_type" name="data_type" value="">

    <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close close-modal" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
            <h4 class="modal-title">Add New Customer <span class="manifest-data-id"></span></h4>
          </div>
          <div class="modal-body">
            <div class="alert alert-info address-string" role="alert"></div>
            <div class="panel-group" id="accordion">
              <div class="panel panel-default">
                <div class="panel-heading">
                  <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                      General
                    </a>
                  </h4>
                </div>
                <div id="collapseOne" class="panel-collapse collapse in">
                  <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label>Refference Id</label>
                                <input type="text" class="form-control cust_id_" name="cust_id" value="" disabled>
                            </div>
                            <div class="form-group">   
                                <label>Name</label>
                                <input type="text" class="form-control" name="cust_name" required>
                            </div>
                            
                            
                            <div class="form-group">
                                <label>Address</label>
                                <textarea class="form-control" name="cust_address" rows="3" required></textarea>
                            </div>
                            
                             <div class="form-group">   
                                <label>Attn</label>
                                <input type="text" class="form-control" name="attn" required>
                            </div>
                            <div class="form-group">
                                <label >State</label>
                                <input id="state" name="cust_state" type="text" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>City</label>
                                <input id="city" name="cust_city" type="text" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>Country</label>
                                <select class="form-control bfh-states country" name="cust_country">
                                    <?php
                                        foreach ($this->customers_model->list_country() as $key => $value) {
                                            $selected = (strtolower($value) == 'indonesia') ? 'selected' : '';
                                            echo '<option value="'.$value.'" '.$selected.'>'.$value.'</option>';
                                        }
                                    ?>
                                </select>
                            </div>
                        </div>
                    </div>                    
                  </div>
                </div>
              </div>
              <div class="panel panel-default">
                <div class="panel-heading">
                  <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
                      Other
                    </a>
                  </h4>
                </div>
                <div id="collapseTwo" class="panel-collapse collapse">
                  <div class="panel-body">
                    <div class="form-group">   
                        <label>Email</label>
                        <input type="email" class="form-control" name="cust_email" >
                    </div>                   
                    <div class="form-group">   
                        <label>Phone</label>
                        <input type="text" class="form-control" name="cust_phone" >
                    </div>   
                     <div class="form-group">
                        <label>Tax Class</label>
                        <select required class="form-control" name="tax_class" >
                          <option value=""></option>
                          	<option value="0">None</option>
               				<option value="1">1%</option>
                            <option value="10">10%</option>
                        </select>
                       
                      </div>    
                            
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-sm btn-default close-modal" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-sm btn-primary">Add customer</button>
          </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
    </form>
</div>

<div class="modal fade" id="modal_similar_customer" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <form id="add_customer_modal" method="post" action="<?=base_url()?>customers/ajax/add_customer">
    <input type="hidden" class="form-control cust_id" name="cust_id" value="">
    <input type="hidden" class="form-control data_id" name="data_id" value="">
    <input type="hidden" class="form-control data_type" name="data_type" value="">

    <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close close-modal" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
            <h4 class="modal-title">Select Similar Customer</h4>
          </div>
          <div class="modal-body">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Address</th>
                        <th>City</th>
                        <th>Country</th>
                        <th>Phone</th>
                        <th>Email</th>
                        <th>Select</th>
                    </tr>
                </thead>
                <tbody class="similar-customer-container"></tbody>
            </table>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-sm btn-default close-modal" data-dismiss="modal">Close</button>
          </div>
        </div>
    </div>
    </form>
</div>

<script type="text/javascript">
$(document).ready(function(){
    $('.country').select2();

    $('button.add-customer').click(function(){
        $('#add_customer_modal').resetForm();
        data_id = $(this).attr('manifest_data_id');
        data_type = $(this).attr('data_type');
        $.post('<?=base_url()?>customers/ajax/get_new_cust_id',function(data){
            $('input.cust_id, input.cust_id_').val(data);
        })

        $.post('<?=base_url()?>manifest/ajax/get_data',{'data_id':data_id},function(data){
            data = JSON.parse(data);
            $('.manifest-data-id').html('#' + data.data_id);
            if(data_type == 'shipper') $('.address-string').html(data_type + ': ' +data.shipper);
            if(data_type == 'consignee') $('.address-string').html(data_type + ': ' +data.consignee);
            
            $('input.data_id').val(data.data_id);
            $('input.data_type').val(data_type);
        })

        $('#modal_add_customer').modal('show');
    })

    $('#add_customer_modal').ajaxForm({
        dataType:'json',
        success: function(data){
            $('tr#' + data.data_id).removeClass('warning').addClass(data.status);
            $('tr#' + data.data_id).find('td.' + data.type).html(data.data);
            $('#modal_add_customer').modal('hide');
        }
    });

    $('.show-similar').click(function(){
        data_id = $(this).attr('manifest_data_id');
        data_type = $(this).attr('data_type');
        $.post('<?=base_url()?>customers/ajax/get_similar_customer',{'data_id':data_id,'type':data_type},function(data){
            $('tbody.similar-customer-container').html(data);
        })

        $('#modal_similar_customer').modal('show');
    })

    $('.select-similar-customer').live('click',function(){
        cust_id = $(this).attr('cust_id');
        data_id = $(this).attr('data_id');
        data_type = $(this).attr('data_type');

        $.post('<?=base_url()?>customers/ajax/set_customer_to_data',{'cust_id':cust_id,'data_id':data_id,'type':data_type},function(data){
            data = JSON.parse(data);
            $('tr#' + data.data_id).removeClass('warning').addClass(data.status);
            $('tr#' + data.data_id).find('td.' + data.type).html(data.data);
            $('#modal_similar_customer').modal('hide');
        })
    })
});
</script>