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
                                        <th>Remarks</th>
                                    </tr>
                                </thead>
                                <tbody class="manifest-data-row">
                                <?php
                                    if($list_data != false) {
                                        $no = 1;
                                        foreach ($list_data as $key => $row) {
                                            echo '
                                            <tr class="row-' . $row->DATA_ID.'">
                                                <td>'.$row->DATA_NO.'</td>
                                                <td>'.$row->HAWB_NO.'</td>
                                            ';

                                            //SHIPPER
                                            echo '<td>';
                                            $shipper = $this->customers_model->get_customer($row->SHIPPER,'SHIPPER');
                                            if($shipper != FALSE) {                                                
                                                echo $shipper->name.' <br/>
                                                    '.$shipper->address.' <br/>
                                                    '.$shipper->country;
                                            } else {
                                                echo $row->SHIPPER.'<br/
                                                    <p><button type="button" class="btn btn-xs btn-danger add-customer" title="Add as new customer" manifest_data_id="'.$row->DATA_ID.'" data_type="SHIPPER"><span class="glyphicon glyphicon-plus"></span></button></p>';
                                            }
                                            echo '</td>';

                                            //CONSIGNEE
                                            echo '<td>';
                                            $consignee = $this->customers_model->get_customer($row->CONSIGNEE,'CONSIGNEE');
                                            if($consignee != FALSE) {                                                
                                                echo '
                                                    '.$consignee->name.' <br/>
                                                    '.$consignee->address.' <br/>
                                                    '.$consignee->country;
                                            } else {
                                                echo $row->CONSIGNEE.'<br/>
                                                    <p><button type="button" class="btn btn-xs btn-danger add-customer" title="Add as new customer" manifest_data_id="'.$row->DATA_ID.'" data_type="CONSIGNEE"><span class="glyphicon glyphicon-plus"></span></button></p>';
                                            }
                                            
                                            echo '
                                                <td align="center">'.$row->PKG.'</td>
                                                <td>'.$row->DESCRIPTION.'</td>
                                                <td align="center">'.$row->PCS.'</td>
                                                <td align="center">'.$row->KG.'</td>
                                                <td align="center">'.$row->VALUE.'</td>
                                                <td align="center">'.$row->PREPAID.'</td>
                                                <td align="center">'.$row->COLLECT.'</td>
                                                <td>'.$row->REMARKS.'</td>
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
                        <form id="form_verification" method="post" action="<?=site_url('manifest/ajax/verification')?>">
                        <input type="hidden" name="FILE_ID" value="<?=$file->FILE_ID?>">
                        <div class="btn-group">
                            <button type="submit" class="btn btn-sm btn-primary">Save Verification</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <form id="add_customer_modal" method="post" action="<?=base_url()?>customers/ajax/add_customer">
    <input type="hidden" class="form-control cust_id" name="cust_id" value="">
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
                                <label>Name</label>
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
                                <label >State</label>
                                <input id="state" name="cust_state" type="text" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>City</label>
                                <input id="city" name="cust_city" type="text" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>Country</label>
                                <select class="form-control bfh-states" name="cust_country">
                                    <?php
                                        foreach ($this->customers_model->list_country() as $key => $value) {
                                            echo '<option value="'.$value.'">'.$value.'</option>';
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
                      Contact
                    </a>
                  </h4>
                </div>
                <div id="collapseTwo" class="panel-collapse collapse">
                  <div class="panel-body">
                    <div class="form-group">   
                        <label>Email</label>
                        <input type="email" class="form-control" name="cust_email" required>
                    </div>                   
                    <div class="form-group">   
                        <label>Phone</label>
                        <input type="text" class="form-control" name="cust_phone" required>
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

<script type="text/javascript">
$(document).ready(function(){
    $('button.add-customer').click(function(){
        $('#add_customer_modal').resetForm();
        data_id = $(this).attr('manifest_data_id');
        data_type = $(this).attr('data_type');
        $.post('<?=base_url()?>customers/ajax/get_new_cust_id',function(data){
            $('input.cust_id, input.cust_id_').val(data);
        })

        $.post('<?=base_url()?>manifest/ajax/get_by_data_id',{'manifest_data_id':data_id},function(data){
            data = JSON.parse(data);
            $('.manifest-data-id').html('#' + data.DATA_ID);
            $('.address-string').html(data_type + ': ' +data.SHIPPER);
        })

        $('#myModal').modal('show');
    })

    $('#add_customer_modal').ajaxForm();

    $('#form_verification').ajaxForm();
});
</script>