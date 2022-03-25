<?php
    include 'connect.php';  
    if(isset($_POST['submit'])) {
        $nama = $_POST['menu'];
        $harga = mysqli_fetch_array(mysqli_query($conn, "SELECT harga FROM menu WHERE nama_menu = '$nama'"))['harga'];
        $jumlah = $_POST['jumlah'];
        // $harga = $_POST['harga'];
        $total = (int)$harga * (int)$jumlah;
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pesanan</title>
</head>
<body>
    <table>
        <tr>
            <td>Nama Pesanan</td>
            <td>:</td>
            <td><?= $nama ?></td>
        </tr>
        <tr>
            <td>Harga</td>
            <td>:</td>
            <td>RP. <?= $harga ?></td>
        </tr>
        <tr>
            <td>Jumlah</td>
            <td>:</td>
            <td><?= $jumlah ?></td>
        </tr>
        <tr>
            <td>Total</td>
            <td>:</td>
            <td>Rp. <?= $total ?></td>
        </tr>
    </table>
</body>
</html>