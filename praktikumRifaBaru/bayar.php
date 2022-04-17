<?php
session_start();

if (isset($_SESSION['data'])) {
    $fname = $_SESSION['data']['FName'];
    $lname = $_SESSION['data']['LName'];
    $email = $_SESSION['data']['email'];
    $alamat = $_SESSION['data']['alamat'];
    $tanggal = $_SESSION['data']['tanggal'];
    $kategori = $_SESSION['data']['kategori'];
    $size = $_SESSION['data']['size'];
    $jumlah = $_SESSION['data']['jumlah'];
    $opsi = $_SESSION['data']['opsi'];
    $metode = $_SESSION['data']['metode'];
    $keterangan = $_SESSION['data']['keterangan'];
    $proteksi = $_SESSION['data']['proteksi'];
    $dropshipper = $_SESSION['data']['drop'];
    $subtotal = (int)$kategori * (int)$jumlah;
    $total = (int)$kategori * (int)$jumlah + (int)$opsi;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <title>Rincian Pembayaran</title>
    <style>
        body {
            background-color: #A9C693;
        }

        h1 {
            text-decoration: underline;
        }
    </style>
</head>

<body>
    <h1>Rincian Pembayaran</h1>
    <table class="table tablel-bordered table-condensed table-hover">
        <tr>
            <td>Nama</td>
            <td>:</td>
            <td><?= $fname ?> <?= $lname ?></td>
        </tr>
        <tr>
            <td>Email</td>
            <td>:</td>
            <td><?= $email ?></td>
        </tr>
        <tr>
            <td>Alamat</td>
            <td>:</td>
            <td><?= $alamat ?></td>
        </tr>
        <tr>
            <td>Tanggal Pemesanan</td>
            <td>:</td>
            <td><?= $tanggal ?></td>
        </tr>
        <tr>
            <td>Jumlah barang</td>
            <td>:</td>
            <td><?= $jumlah ?></td>
        </tr>
        <tr>
            <td>metode pembayaran</td>
            <td>:</td>
            <td><?= $metode ?></td>
        </tr>
        <tr>
            <td>proteksi</td>
            <td>:</td>
            <td><?= $proteksi ?></td>
        </tr>
        <tr>
            <td>Dropshipper</td>
            <td>:</td>
            <td><?= $dropshipper ?></td>
        </tr>
        <tr>
            <td>Subtotal Untuk Produk</td>
            <td>:</td>
            <td>Rp. <?= $subtotal ?></td>
        </tr>
        <tr>
            <td>Subtotal Pengiriman</td>
            <td>:</td>
            <td>Rp. <?= $opsi ?></td>
        </tr>
        <tr>
            <td>Total Pembayaran</td>
            <td>:</td>
            <td>Rp. <?= $total ?></td>
        </tr>
    </table>
</body>

</html>