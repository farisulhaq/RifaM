<?php
include 'connect.php';
$sql = "SELECT DISTINCT kategori FROM menu";
$datas = mysqli_query($conn, $sql);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Selection</title>
</head>

<body>
    <?php $menuPilih = isset($_POST['menu']) ? $_POST['menu'] : '' ?>
    <form action="" method="post">
        <select name="menu" id="menu" onchange="this.form.submit();">
            <option value="-- ! --">-- ! --</option>
            <?php foreach ($datas as $data) : ?>
                <option value="<?= $data['kategori'] ?>" <?php ($menuPilih == $data['kategori']) ? print 'selected' : print '' ?>><?= $data['kategori'] ?></option>
            <?php endforeach; ?>
        </select>
        <!-- <input type="submit" value="submit" name="submit" <?php $menuPilih != '' ? print 'hidden' : print '' ?>> -->
    </form>
    <?php if ($menuPilih) : ?>
        <?php $datas = mysqli_query($conn, "SELECT nama_menu, harga FROM menu WHERE kategori = '$menuPilih'") ?>
        <form action="bayar.php" method="post">
            <select name="menu" id="menu">
                <option value="-- ! --">-- ! --</option>
                <?php foreach ($datas as $data) : ?>
                    <option value="<?= $data['nama_menu'] ?>" <?php ($menuPilih == $data['nama_menu']) ? print 'selected' : print '' ?> name="menu"><?= $data['nama_menu'] ?></option>
                <?php endforeach; ?>
            </select>
            <br>
            <!-- <input type="text" value="<?= $data['harga'] ?>"> -->
            <input type="text" placeholder="Jumlah Pesanan" name="jumlah">
            <br>
            <input type="submit" value="bayar" name="submit">
        </form>
    <?php endif ?>
</body>

</html>