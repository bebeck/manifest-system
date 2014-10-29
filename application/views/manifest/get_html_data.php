
<?php
    if($manifest != false) {
        $no = 1;
        foreach ($manifest as $key => $row) {
            echo '
            <tr>
                <td>'.$row->DATA_NO.'</td>
                <td>'.$row->HAWB_NO.'</td>
                <td>'.$row->SHIPPER.'</td>
                <td>'.$row->CONSIGNEE.'</td>
                <td>'.$row->PKG.'</td>
                <td>'.$row->DESCRIPTION.'</td>
                <td>'.$row->PCS.'</td>
                <td>'.$row->KG.'</td>
                <td>'.$row->VALUE.'</td>
                <td>'.$row->PREPAID.'</td>
                <td>'.$row->COLLECT.'</td>
                <td>'.$row->REMARKS.'</td>
                <td>
                    <div class="btn-group btn-group-xs">
                        <button type="button" class="btn btn-default" title="Details"><span class="glyphicon glyphicon-search"></span></button>
                        <button type="button" class="btn btn-default" title="Edit"><span class="glyphicon glyphicon-edit"></span></button>
                        <button type="button" class="btn btn-default" title="Print"><span class="glyphicon glyphicon-print"></span></button>
                    </div>
                </td>
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
