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
                                                <td>'.$this->customers_model->get_customer($row->SHIPPER,'SHIPPER').'</td>
                                                <td>'.$this->customers_model->get_customer($row->CONSIGNEE,'CONSIGNEE').'</td>
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
                        <?php
                            foreach ($list_data as $key => $row) {
                                echo '
                                    <input type="hidden" id="'.$row->DATA_ID.' - DATA_ID" name="DATA_ID[]" value="'.$row->DATA_ID.'">
                                    <input type="hidden" id="'.$row->DATA_ID.' - DATA_NO" name="DATA_NO[]" value="'.$row->DATA_NO.'">
                                    <input type="hidden" id="'.$row->DATA_ID.' - HAWB_NO" name="HAWB_NO[]" value="'.$row->HAWB_NO.'">
                                    <input type="hidden" id="'.$row->DATA_ID.' - SHIPPER" name="SHIPPER[]" value="'.$row->SHIPPER.'">
                                    <input type="hidden" id="'.$row->DATA_ID.' - CONSIGNEE" name="CONSIGNEE[]" value="'.$row->CONSIGNEE.'">
                                    <input type="hidden" id="'.$row->DATA_ID.' - PKG" name="PKG[]" value="'.$row->PKG.'">
                                    <input type="hidden" id="'.$row->DATA_ID.' - DESCRIPTION" name="DESCRIPTION[]" value="'.$row->DESCRIPTION.'">
                                    <input type="hidden" id="'.$row->DATA_ID.' - PCS" name="PCS[]" value="'.$row->PCS.'">
                                    <input type="hidden" id="'.$row->DATA_ID.' - KG" name="KG[]" value="'.$row->KG.'">
                                    <input type="hidden" id="'.$row->DATA_ID.' - VALUE" name="VALUE[]" value="'.$row->VALUE.'">
                                    <input type="hidden" id="'.$row->DATA_ID.' - PREPAID" name="PREPAID[]" value="'.$row->PREPAID.'">
                                    <input type="hidden" id="'.$row->DATA_ID.' - COLLECT" name="COLLECT[]" value="'.$row->COLLECT.'">
                                    <input type="hidden" id="'.$row->DATA_ID.' - REMARKS" name="REMARKS[]" value="'.$row->REMARKS.'">
                                ';
                            }
                        ?>
                        <div class="btn-group">
                            <button type="submit" class="btn btn-default">Save Verification</button>
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