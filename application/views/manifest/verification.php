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
                                        <th align="center">Valid</th>
                                    </tr>
                                </thead>
                                <tbody class="manifest-data-row">
                                <?php
                                    if($manifest != false) {
                                        $no = 1;
                                        foreach ($manifest as $key => $row) {
                                            echo '
                                            <tr class="row-'.$row->data_id.' success">
                                                <td>'.$row->no.'</td>
                                                <td>'.$row->hawb_no.'</td>
                                                <td>'.wordwrap(str_ireplace('_x000D_', ' ',$row->shipper)).'</td>
                                                <td>'.wordwrap(str_ireplace('_x000D_', ' ',$row->cnee)).'</td>
                                                <td>'.$row->pkg.'</td>
                                                <td>'.$row->description.'</td>
                                                <td>'.$row->pcs.'</td>
                                                <td>'.$row->kg.'</td>
                                                <td>'.$row->value.'</td>
                                                <td>'.$row->pp.'</td>
                                                <td>'.$row->cc.'</td>
                                                <td>'.wordwrap($row->remarks).'</td>
                                                <td><input type="checkbox" name="valid['.$row->data_id.']" id="'.$row->data_id.'" class="validate" checked="checked"></td>
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

                        <button type="submit" class="btn btn-info submit-upload">Submit <img src="<?=base_url('asset/images/ajax-loader.gif')?>" class="ajax-loader" style="margin-left:20px; display:none;"></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<script type="text/javascript">
$(document).ready(function(){
    $('input.validate').click(function(){
        data_id = $(this).attr('id');
        if($(this).is(':checked')) {
            $('.row-' + data_id).addClass('success').removeClass('danger');
        } else {
            $('.row-' + data_id).addClass('danger').removeClass('success');            
        }
    })
})
</script>