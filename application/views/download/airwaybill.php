<!DOCTYPE html>
<html lang="en">
<head>
<title>Airway Bill</title>
<link rel="stylesheet" href="<?=base_url() ?>style/css/airwaybill.css">
</head>
<body>
<div class="paper">
    <div class="contaier border-line" style="padding-top:20px;">
        <div class="header">
            <img src="<?=base_url()?>asset/images/tata-logo.png" height="60px" class="logo">
            <img src="<?=base_url()?>asset/qrcode/DATA_<?=$details->data_id;?>.png" height="60" width="60" class="barcode" style="float:right">
        </div>
        <div class="info">
            <div class="item">AIRWAYBILL #<?=$details->data_id?></div>
            <div class="value">Lembar Customer</div>
        </div>
        <div class="content" style="height:20px;">
            <div class="shipment">
                <?php
                $shipper = $this->customers_model->get_by_id($details->shipper);
                $consignee = $this->customers_model->get_by_id($details->consignee);
                ?>
                <strong>Pengirim:</strong> <?=ucwords(strtolower($shipper->name))?><br/>
                <?=ucwords(strtolower($shipper->address . ' ' . $shipper->country))?><br/>
                <?=$shipper->phone?><br/><br/>

                <strong>Penerima:</strong> <?=ucwords(strtolower($consignee->name))?><br/>
                <?=ucwords(strtolower($consignee->address . ' ' . $consignee->country))?><br/>
                <?=$consignee->phone?><br/><br/>

                <strong>Keterangan:</strong> <?=$details->description?>

            </div>

            <div class="details">
                <div class="item">Nt Kurs</div><div class="value"><?=$details->nt_kurs?></div>
                <div class="item">Pcs</div><div class="value"><?=$details->pcs?></div>
                <div class="item">KG</div><div class="value"><?=$details->kg?></div>
                <div class="item">Value</div><div class="value"><?=$details->value?></div><br/>
                <div class="item"><strong>Total (Rp)</strong></div><div class="value">Rp. <?=number_format(($details->pcs*$details->kg)*$details->nt_kurs*$details->prepaid)?></div>
                <div class="item" style="margin-top:20px;">Jakarta, <?=date('dS m, Y')?></div><div class="value" style="margin-top:20px;">Tanda tangan</div>
                <div class="item" style="margin-top:40px;">Sales</div><div class="value" style="margin-top:40px;">Nama</div>
            </div>
        </div>
    </div>

    <div class="contaier border-line" style="padding-top:20px;">
        <div class="header">
            <img src="<?=base_url()?>asset/images/tata-logo.png" height="60px" class="logo">
            <img src="<?=base_url()?>asset/qrcode/DATA_<?=$details->data_id;?>.png" height="60" width="60" class="barcode" style="float:right">
        </div>
        <div class="info">
            <div class="item">AIRWAYBILL #<?=$details->data_id?></div>
            <div class="value">Lembar Customer</div>
        </div>
        <div class="content" style="height:20px;">
            <div class="shipment">
                <?php
                $shipper = $this->customers_model->get_by_id($details->shipper);
                $consignee = $this->customers_model->get_by_id($details->consignee);
                ?>
                <strong>Pengirim:</strong> <?=ucwords(strtolower($shipper->name))?><br/>
                <?=ucwords(strtolower($shipper->address . ' ' . $shipper->country))?><br/>
                <?=$shipper->phone?><br/><br/>

                <strong>Penerima:</strong> <?=ucwords(strtolower($consignee->name))?><br/>
                <?=ucwords(strtolower($consignee->address . ' ' . $consignee->country))?><br/>
                <?=$consignee->phone?><br/><br/>

                <strong>Keterangan:</strong> <?=$details->description?>

            </div>

            <div class="details">
                <div class="item">Nt Kurs</div><div class="value"><?=$details->nt_kurs?></div>
                <div class="item">Pcs</div><div class="value"><?=$details->pcs?></div>
                <div class="item">KG</div><div class="value"><?=$details->kg?></div>
                <div class="item">Value</div><div class="value"><?=$details->value?></div><br/>
                <div class="item"><strong>Total (Rp)</strong></div><div class="value">Rp. <?=number_format(($details->pcs*$details->kg)*$details->nt_kurs*$details->prepaid)?></div>
                <div class="item" style="margin-top:20px;">Jakarta, <?=date('dS m, Y')?></div><div class="value" style="margin-top:20px;">Tanda tangan</div>
                <div class="item" style="margin-top:40px;">Sales</div><div class="value" style="margin-top:40px;">Nama</div>
            </div>
        </div>
    </div>

    <div class="contaier" style="padding-top:20px;">
        <div class="header">
            <img src="<?=base_url()?>asset/images/tata-logo.png" height="60px" class="logo">
            <img src="<?=base_url()?>asset/qrcode/DATA_<?=$details->data_id;?>.png" height="60" width="60" class="barcode" style="float:right">
        </div>
        <div class="info">
            <div class="item">AIRWAYBILL #<?=$details->data_id?></div>
            <div class="value">Lembar Customer</div>
        </div>
        <div class="content" style="height:20px;">
            <div class="shipment">
                <?php
                $shipper = $this->customers_model->get_by_id($details->shipper);
                $consignee = $this->customers_model->get_by_id($details->consignee);
                ?>
                <strong>Pengirim:</strong> <?=ucwords(strtolower($shipper->name))?><br/>
                <?=ucwords(strtolower($shipper->address . ' ' . $shipper->country))?><br/>
                <?=$shipper->phone?><br/><br/>

                <strong>Penerima:</strong> <?=ucwords(strtolower($consignee->name))?><br/>
                <?=ucwords(strtolower($consignee->address . ' ' . $consignee->country))?><br/>
                <?=$consignee->phone?><br/><br/>

                <strong>Keterangan:</strong> <?=$details->description?>

            </div>

            <div class="details">
                <div class="item">Nt Kurs</div><div class="value"><?=$details->nt_kurs?></div>
                <div class="item">Pcs</div><div class="value"><?=$details->pcs?></div>
                <div class="item">KG</div><div class="value"><?=$details->kg?></div>
                <div class="item">Value</div><div class="value"><?=$details->value?></div><br/>
                <div class="item"><strong>Total (Rp)</strong></div><div class="value">Rp. <?=number_format(($details->pcs*$details->kg)*$details->nt_kurs*$details->prepaid)?></div>
                <div class="item" style="margin-top:20px;">Jakarta, <?=date('dS m, Y')?></div><div class="value" style="margin-top:20px;">Tanda tangan</div>
                <div class="item" style="margin-top:40px;">Sales</div><div class="value" style="margin-top:40px;">Nama</div>
            </div>
        </div>
    </div>
</div>
</body>
<html>
