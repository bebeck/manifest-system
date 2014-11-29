<!DOCTYPE html>
<html lang="en">
<head>
<title>Airway Bill</title>
<link rel="stylesheet" href="<?=base_url() ?>style/css/airwaybill.css">
</head>
<body>
<div class="paper">
    <div class="contaier border-line" style="max-height:96mm;">
        <div class="header">
            <img src="<?=base_url()?>download/barcode/QRCODE/<?=$details->hawb_no?>" class="barcode" style="float:left; height:60px; width:60px; margin-right:20px;">
            <img src="<?=base_url()?>asset/images/tata-logo.png" class="logo" style="float:left; height:55px; margin-top:5px;">
            <img src="<?=base_url()?>download/barcode/1D/<?=$details->hawb_no?>" class="barcode" style="float:right; margin-top:5px; height:50px;">
        </div>
        <div class="info">
            <table style="width:100%:"><tr>
            <td style="width:50%;">Airwaybill #<?=$details->hawb_no?></td>
            <td style="text-align:right;">Lembar THS</td>
            </tr></table>
        </div>
        <div class="content" style="height:20px;">
            <div class="shipment">
                <?php
                $shipper = $this->customers_model->get_by_id($details->shipper);
                $consignee = $this->customers_model->get_by_id($details->consignee);
                ?>
                <strong>From Sender:</strong> <?=ucwords(strtolower($shipper->name))?><br/>
                <?=ucwords(strtolower($shipper->address . ' ' . $shipper->country))?><br/>
                <?=$shipper->phone?><br/>
                <?php echo ($shipper->sort_name) ? 'Attn: '.$shipper->sort_name .'<br/>': '';?>

                <div style="margin:7px 0px;"><strong>To Consignee:</strong> <?=ucwords(strtolower($consignee->name))?><br/>
                <?=ucwords(strtolower($consignee->address . ' ' . $consignee->country))?><br/>
                <?=$consignee->phone?><br/>
                <?php echo ($consignee->sort_name) ? 'Attn: '.$consignee->sort_name .'<br/>': '';?></div>

                <strong>Keterangan:</strong> <?=$details->description?>

            </div>

            <div class="details">
                <div class="item-field">
                    <div class="item">Exchange Rate</div><div class="value"><?=$details->nt_kurs?></div>
                    <div class="item">Pcs</div><div class="value"><?=$details->pcs?></div>
                    <div class="item">KG</div><div class="value"><?=$details->kg?></div>
                    <div class="item">Rate/kg</div><div class="value"><?=$details->value?></div>
                    <?php 
                    $total = ($details->value*$details->kg)*$details->nt_kurs;
                    if($extra_charge != false) {
                        foreach ($extra_charge as $row) {
                            echo '<div class="item">'.$row->type.' <em>('.$row->description.')</em></div><div class="value">'.number_format($row->price).'</div>';
                            $total = $total + $row->price;
                        }
                    }
                    ?>
                    <div class="item"><strong>Total Charge (Rp)</strong></div><div class="value"><?=number_format($total)?></div>
                </div>
                <div class="signature">
                    <div class="item">Jakarta, <?=date('dS m, Y')?></div><div class="value">Tanda tangan</div>
                    <div class="item" style="margin-top:40px;">Sales</div><div class="value" style="margin-top:40px;">Nama</div>
                </div>
            </div>
        </div>
    </div>

    <div class="contaier border-line" style="margin-top:7px; max-height:96mm;">
        <div class="header">
            <img src="<?=base_url()?>download/barcode/QRCODE/<?=$details->hawb_no?>" class="barcode" style="float:left; height:60px; width:60px; margin-right:20px;">
            <img src="<?=base_url()?>asset/images/tata-logo.png" class="logo" style="float:left; height:55px; margin-top:5px;">
            <img src="<?=base_url()?>download/barcode/1D/<?=$details->hawb_no?>" class="barcode" style="float:right; margin-top:5px; height:50px;">
        </div>
        <div class="info">
            <table style="width:100%:"><tr>
            <td style="width:50%;">Airwaybill #<?=$details->hawb_no?></td>
            <td style="text-align:right;">Lembar Arsip</td>
            </tr></table>
        </div>
        <div class="content" style="height:20px;">
            <div class="shipment">
                <?php
                $shipper = $this->customers_model->get_by_id($details->shipper);
                $consignee = $this->customers_model->get_by_id($details->consignee);
                ?>
                <strong>From Sender:</strong> <?=ucwords(strtolower($shipper->name))?><br/>
                <?=ucwords(strtolower($shipper->address . ' ' . $shipper->country))?><br/>
                <?=$shipper->phone?><br/>
                <?php echo ($shipper->sort_name) ? 'Attn: '.$shipper->sort_name .'<br/>': '';?>

                <div style="margin:7px 0px;"><strong>To Consignee:</strong> <?=ucwords(strtolower($consignee->name))?><br/>
                <?=ucwords(strtolower($consignee->address . ' ' . $consignee->country))?><br/>
                <?=$consignee->phone?><br/>
                <?php echo ($consignee->sort_name) ? 'Attn: '.$consignee->sort_name .'<br/>': '';?></div>

                <strong>Keterangan:</strong> <?=$details->description?>

            </div>

            <div class="details">
                <div class="item-field">
                    <div class="item">Exchange Rate</div><div class="value"><?=$details->nt_kurs?></div>
                    <div class="item">Pcs</div><div class="value"><?=$details->pcs?></div>
                    <div class="item">KG</div><div class="value"><?=$details->kg?></div>
                    <div class="item">Rate/kg</div><div class="value"><?=$details->value?></div>
                    <?php 
                    $total = ($details->value*$details->kg)*$details->nt_kurs;
                    if($extra_charge != false) {
                        foreach ($extra_charge as $row) {
                            echo '<div class="item">'.$row->type.' <em>('.$row->description.')</em></div><div class="value">'.number_format($row->price).'</div>';
                            $total = $total + $row->price;
                        }
                    }
                    ?>
                    <div class="item"><strong>Total Charge (Rp)</strong></div><div class="value"><?=number_format($total)?></div>
                </div>
                <div class="signature">
                    <div class="item">Jakarta, <?=date('dS m, Y')?></div><div class="value">Tanda tangan</div>
                    <div class="item" style="margin-top:40px;">Sales</div><div class="value" style="margin-top:40px;">Nama</div>
                </div>
            </div>
        </div>
    </div>

    <div class="contaier" style="margin-top:7px; max-height:96mm;">
        <div class="header">
            <img src="<?=base_url()?>download/barcode/QRCODE/<?=$details->hawb_no?>" class="barcode" style="float:left; height:60px; width:60px; margin-right:20px;">
            <img src="<?=base_url()?>asset/images/tata-logo.png" class="logo" style="float:left; height:55px; margin-top:5px;">
            <img src="<?=base_url()?>download/barcode/1D/<?=$details->hawb_no?>" class="barcode" style="float:right; margin-top:5px; height:50px;">
        </div>
        <div class="info">
            <table style="width:100%:"><tr>
            <td style="width:50%;">Airwaybill #<?=$details->hawb_no?></td>
            <td style="text-align:right;">Lembar Penerima</td>
            </tr></table>
        </div>
        <div class="content" style="height:20px;">
            <div class="shipment">
                <?php
                $shipper = $this->customers_model->get_by_id($details->shipper);
                $consignee = $this->customers_model->get_by_id($details->consignee);
                ?>
                <strong>From Sender:</strong> <?=ucwords(strtolower($shipper->name))?><br/>
                <?=ucwords(strtolower($shipper->address . ' ' . $shipper->country))?><br/>
                <?=$shipper->phone?><br/>
                <?php echo ($shipper->sort_name) ? 'Attn: '.$shipper->sort_name .'<br/>': '';?>

                <div style="margin:7px 0px;"><strong>To Consignee:</strong> <?=ucwords(strtolower($consignee->name))?><br/>
                <?=ucwords(strtolower($consignee->address . ' ' . $consignee->country))?><br/>
                <?=$consignee->phone?><br/>
                <?php echo ($consignee->sort_name) ? 'Attn: '.$consignee->sort_name .'<br/>': '';?></div>

                <strong>Keterangan:</strong> <?=$details->description?>

            </div>

            <div class="details">
                <div class="item-field">
                    <div class="item">Exchange Rate</div><div class="value"><?=$details->nt_kurs?></div>
                    <div class="item">Pcs</div><div class="value"><?=$details->pcs?></div>
                    <div class="item">KG</div><div class="value"><?=$details->kg?></div>
                    <div class="item">Rate/kg</div><div class="value"><?=$details->value?></div>
                    <?php 
                    $total = ($details->value*$details->kg)*$details->nt_kurs;
                    if($extra_charge != false) {
                        foreach ($extra_charge as $row) {
                            echo '<div class="item">'.$row->type.' <em>('.$row->description.')</em></div><div class="value">'.number_format($row->price).'</div>';
                            $total = $total + $row->price;
                        }
                    }
                    ?>
                    <div class="item"><strong>Total Charge (Rp)</strong></div><div class="value"><?=number_format($total)?></div>
                </div>
                <div class="signature">
                    <div class="item">Jakarta, <?=date('dS m, Y')?></div><div class="value">Tanda tangan</div>
                    <div class="item" style="margin-top:40px;">Sales</div><div class="value" style="margin-top:40px;">Nama</div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
<html>
