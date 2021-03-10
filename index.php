<?php

require 'vendor/autoload.php';

use Mpdf\QrCode\QrCode;
use Mpdf\QrCode\Output;
use \App\Pix\Payload;

$obPayload = (new Payload)->setPixKey('12345678')
    ->setDescription('Pagamento pedido teste')
    ->setMerchantName('Usuário')
    ->setMerchantCity('PASSOS')
    ->setAmount(0.1)
    ->setTxid('mtaqlid1234');

$payloadQrCode = $obPayload->getPayload();

$obQrCode = new QrCode($payloadQrCode);

$image = (new Output\Png)->output($obQrCode, 400);
?>

<h1>QR Code Pix</h1>

<br>

<img src="data:image/png;base64, <?= base64_encode($image) ?>">

<br><br>

<strong><?= $payloadQrCode ?></strong>