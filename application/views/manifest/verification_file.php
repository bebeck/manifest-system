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
                            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
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
                                        <th>Status</th>
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
                                                echo $row->SHIPPER.'<br/>
                                                    <p><button type="button" class="btn btn-xs btn-danger add-customer">Add as new customer</button></p>';
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
                                                    <p><button type="button" class="btn btn-xs btn-danger add-customer">Add as new customer</button></p>';
                                            }
                                            
                                            echo '
                                                <td>'.$row->PKG.'</td>
                                                <td>'.$row->DESCRIPTION.'</td>
                                                <td>'.$row->PCS.'</td>
                                                <td>'.$row->KG.'</td>
                                                <td>'.$row->VALUE.'</td>
                                                <td>'.$row->PREPAID.'</td>
                                                <td>'.$row->COLLECT.'</td>
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


<div id="add_new_customer_modal" class="colorbox-modal">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close close-modal" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
            <h4 class="modal-title">Add New Customer</h4>
          </div>
          <div class="modal-body">
            <p>One fine body&hellip;</p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-sm btn-primary">Save changes</button>
          </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>

<script type="text/javascript">
$(document).ready(function(){
    $('.add-customer').click(function(){
        $.colorbox({
            inline:true,
            href:$('#add_new_customer_modal'),
            onLoad: function(){ $('.colorbox-modal').show(); }
        })
    })

    $('#form_verification').ajaxForm();
});
</script>