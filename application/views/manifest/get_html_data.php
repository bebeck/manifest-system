
<?php
    if($manifest != false) {
        $no = 1;
        foreach ($manifest as $key => $row) {
            echo '
            <tr>
                <td>'.$row->no.'</td>
                <td>'.$row->hawb_no.'</td>
                <td>'.$row->shipper.'</td>
                <td>'.$row->cnee.'</td>
                <td>'.$row->pkg.'</td>
                <td>'.$row->description.'</td>
                <td>'.$row->pcs.'</td>
                <td>'.$row->kg.'</td>
                <td>'.$row->value.'</td>
                <td>'.$row->pp.'</td>
                <td>'.$row->cc.'</td>
                <td>'.wordwrap($row->remarks).'</td>
                <td>
                    <div class="btn-group btn-group-xs">
                        <button type="button" class="btn btn-default">Details</button>
                        <button type="button" class="btn btn-default">Edit</button>
                        <button type="button" class="btn btn-default">Print</button>
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
