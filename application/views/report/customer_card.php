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
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Select Date</label>
                                    <div class="input-group date">
                                        <input type="text" class="form-control" id="created_date">
                                        <span class="input-group-addon datapicker"><i class="glyphicon glyphicon-th"></i></span>
                                    </div>
                                </div>                                             
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
                    <th class="text-center" colspan="3">INCOME (NT$)</th>
                    <th class="text-center" colspan="5">COST (NT$)</th>
                    <th class="text-center" rowspan="3">PROFIT</th>
                    <th class="text-center" rowspan="3">CREDIT DUE TO THS</th>
                    <th class="text-center" rowspan="3">DEBIT DUE TO PML</th>
                    <th class="text-center" rowspan="2" colspan="3">ACU ACCOUNT</th>
                </tr>
                <tr>
                    <th class="text-center" rowspan="2">SELLING</th>
                    <th class="text-center" rowspan="2">MAWB</th>
                    <th class="text-center" rowspan="2">PP</th>
                    <th class="text-center" rowspan="2">CC</th>
                    <th class="text-center" rowspan="2">TOTAL</th>
                    <th class="text-center" colspan="2">TATA</th>
                    <th class="text-center" colspan="2">PML</th>
                    <th class="text-center" rowspan="2">TOTAL</th>
                </tr>
                <tr>
                    <th class="text-center">OTHER</th>
                    <th class="text-center">FREIGHT</th>
                    <th class="text-center">HANDLING</th>
                    <th class="text-center">OTHER</th>
                    <th class="text-center">TOTAL CC</th>
                    <th class="text-center">COST</th>
                    <th class="text-center">123</th>
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