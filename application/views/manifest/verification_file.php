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

                                            $shipper = $this->customers_model->get_customer($row->SHIPPER,'SHIPPER');
                                            if($shipper != FALSE) {                                                
                                                echo '<td>
                                                    '.$shipper->name.' <br/>
                                                    '.$shipper->address.' <br/>
                                                    '.$shipper->country.'
                                                </td>';
                                            } else {
                                                echo '<td>
                                                    '.$row->SHIPPER.'<br/>
                                                    <p><button type="button" class="btn btn-xs btn-danger">Add as new customer</button></p>
                                                </td>';
                                            }

                                            $consignee = $this->customers_model->get_customer($row->CONSIGNEE,'CONSIGNEE');
                                            if($consignee != FALSE) {                                                
                                                echo '<td>
                                                    '.$consignee->name.' <br/>
                                                    '.$consignee->address.' <br/>
                                                    '.$consignee->country.'
                                                </td>';
                                            } else {
                                                echo '<td>
                                                    '.$row->CONSIGNEE.'<br/>
                                                    <p><button type="button" class="btn btn-xs btn-danger">Add as new customer</button></p>
                                                </td>';
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

<script type="text/javascript">
$(function () {
    $('#form_verification').ajaxForm();
});
</script>