<div id="wrapper">
    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Customer Card
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <form method="get">
                            <div class="col-lg-12">
                                <div class="form-group">
                                <label>Manifest File</label>
                                    <select class="form-control" name="file_id" id="file_name">
                                        <?php
                                            if($list_file != FALSE) {
                                                foreach ($list_file as $key => $value) {
                                                    echo '<option value="'.$value->file_id.'">'.$value->file_name.'</option>';
                                                }
                                            }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <button type="submit" class="btn btn-sm btn-primary find-data">Find</button>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php if(isset($valid_file) == TRUE):?>
        <table class="table table-striped table-bordered">
            <tr>
                <td width="200px"><strong>Total Prepaid</strong></td>
                <td><?=number_format($total_pp)?></td>
            </tr>
            <tr>
                <td><strong>Total Collect</strong></td>
                <td><?=number_format($total_cc)?></td>
            </tr>
            <tr>
                <td><strong>Total Pkg</strong></td>
                <td><?=number_format($total_pkg)?></td>
            </tr>
            <tr>
                <td><strong>Total Pcs</strong></td>
                <td><?=number_format($total_pcs)?></td>
            </tr>
            <tr>
                <td><strong>Total KG</strong></td>
                <td><?=$total_kg?></td>
            </tr>
            <tr>
                <td><strong>Total Value</strong></td>
                <td><?=number_format($total_value)?></td>
            </tr>
            <tr>
                <td><strong>Other Charge Tata</strong></td>
                <td><?=number_format($total_oth_chr_tata)?></td>
            </tr>
            <tr>
                <td><strong>Other Charge PML</strong></td>
                <td><?=number_format($total_oth_chr_pml)?></td>
            </tr>
        </table>
        <table  class="table table-striped table-bordered table-hover" style="font-size:10px;">
            <thead>
                <tr>
                    <th class="text-center" rowspan="3">DATE</th>
                    <th class="text-center" rowspan="3" width="150px">MAWB</th>
                    <th class="text-center" colspan="5" width="240px">G.W (KGS)</th>
                    <th class="text-center" colspan="3" width="150px">Income (NT$)</th>
                    <th class="text-center" colspan="6" width="300px">COST (NT$)</th>
                    <th class="text-center" rowspan="3">PROFIT</th>
                    <th class="text-center" rowspan="3">PML</th>
                    <th class="text-center" rowspan="3">TATA</th>
                </tr>
                <tr>
                    <th class="text-center" rowspan="2">HC</th>
                    <th class="text-center" rowspan="2">FTZ</th>
                    <th class="text-center" rowspan="2">PIBK</th>
                    <th class="text-center" rowspan="2">DOC FTZ</th>
                    <th class="text-center" rowspan="2">TTL</th>
                    <th class="text-center" rowspan="2">PP</th>
                    <th class="text-center" rowspan="2">CC</th>
                    <th class="text-center" rowspan="2">TTL</th>
                    <th class="text-center" colspan="2">PML</th>
                    <th class="text-center" colspan="4">TATA</th>
                <tr>
                    <th class="text-center">OTHER</th>
                    <th class="text-center">FREIGHT</th>
                    <th class="text-center">HC</th>
                    <th class="text-center">FTZ</th>
                    <th class="text-center">OTHER</th>
                    <th class="text-center">TTL</th>
                </tr>
                </tr>
            </thead>
            <tbody class="manifest-data-row">
                <tr>
                    <td class="text-center">Date</td>
                    <td class="text-center"><?=$data->mawb_no?></td>
                    <td class="text-center"><input type="text" style="width:35px; text-align:center;" value="<?=$this->manifest_model->get_total_where('kg',$data->file_id,'mawb_type','hc')?>"></td>
                    <td class="text-center"><input type="text" style="width:35px; text-align:center;" value="<?=$this->manifest_model->get_total_where('kg',$data->file_id,'mawb_type','ftz')?>"></td>
                    <td class="text-center"><input type="text" style="width:35px; text-align:center;" value="<?=$this->manifest_model->get_total_where('kg',$data->file_id,'mawb_type','pibk')?>"></td>
                    <td class="text-center"><input type="text" style="width:35px; text-align:center;" value="<?=$this->manifest_model->get_count_where($data->file_id,'mawb_type','ftz')?>"></td>
                    <td class="text-center"><span class="total_gw">0</span></td>
                    <td class="text-center"><?=number_format($total_pp)?></td>
                    <td class="text-center"><?=number_format($total_pp)?></td>
                    <td class="text-center"><?=number_format($total_pp + $total_cc)?></td>
                    <td class="text-center"><?=number_format($total_oth_chr_pml)?></td>
                    <td class="text-center"><span class="pml_freight">0</span></td>
                    <td class="text-center">0</td>
                    <td class="text-center">0</td>
                    <td class="text-center"><?=number_format($total_oth_chr_pml)?></td>
                    <td class="text-center">0</td>
                    <td class="text-center">0</td>
                    <td class="text-center">0</td>
                    <td class="text-center">0</td>
                </tr>
            </tbody>
        </table>
        <?php endif; ?>
        <div class="row pagination col-lg-12"></div>
    </div>
</div>


<script type="text/javascript">
$(document).ready(function(){
    $('#file_name').select2();
})
</script>