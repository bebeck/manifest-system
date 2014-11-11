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
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label>Start Date</label>
                                    <div class="input-group date">
                                        <input type="text" class="form-control" id="created_date">
                                        <span class="input-group-addon datapicker"><i class="glyphicon glyphicon-calendar"></i></span>
                                    </div>
                                </div>                                             
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label>End Date</label>
                                    <div class="input-group date">
                                        <input type="text" class="form-control" id="created_date">
                                        <span class="input-group-addon datapicker"><i class="glyphicon glyphicon-calendar"></i></span>
                                    </div>
                                </div>                                             
                            </div>
                            <div class="col-lg-6">
                                <label>Manifest File</label>
                                <input type="text" class="form-control">
                            </div>
                            <div class="col-lg-12">
                                <button type="submit" class="btn btn-sm btn-primary find-data">Find</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <table  class="table table-striped table-bordered table-hover" style="font-size:11px;">
            <thead>
                <tr>
                    <th class="text-center" rowspan="3">Date</th>
                    <th class="text-center" rowspan="3">Hawb No</th>
                    <th class="text-center" colspan="2">G.W (KGS)</th>
                    <th class="text-center" colspan="3">Income (NT$)</th>
                    <th class="text-center" colspan="5">Cost (NT$)</th>
                    <th class="text-center" rowspan="3">Profit</th>
                    <th class="text-center" rowspan="3">Credit Due To THS</th>
                    <th class="text-center" rowspan="3">Debit Due To PML</th>
                    <th class="text-center" rowspan="2" colspan="3">Acu Account</th>
                </tr>
                <tr>
                    <th class="text-center" rowspan="2">Selling</th>
                    <th class="text-center" rowspan="2">Mawb</th>
                    <th class="text-center" rowspan="2">Prepaid</th>
                    <th class="text-center" rowspan="2">Collect</th>
                    <th class="text-center" rowspan="2">Total</th>
                    <th class="text-center" colspan="2">TATA</th>
                    <th class="text-center" colspan="2">PML</th>
                    <th class="text-center" rowspan="2">Total</th>
                </tr>
                <tr>
                    <th class="text-center">Other</th>
                    <th class="text-center">Freight</th>
                    <th class="text-center">Handling</th>
                    <th class="text-center">Other</th>
                    <th class="text-center">Total Collect</th>
                    <th class="text-center">Cost</th>
                    <th class="text-center">Refund To</th>
                </tr>
            </thead>
            <tbody class="manifest-data-row" style="display:none;"></tbody>
        </table>
        <div class="row pagination col-lg-12"></div>
    </div>
</div>


<script type="text/javascript">
$(document).ready(function(){
    $('.input-group.date').datepicker({
        format: "yyyy-mm-dd",
        keyboardNavigation: false,
        forceParse: false,
        autoclose: true
    })
})
</script>