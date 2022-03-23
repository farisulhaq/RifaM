<?php
// Memanggil file connect
include('connect.php');
// kembalikan data Ke semua
if (isset($_POST['reload'])) {
    header("Location: page.php");
};
// Batas Baris yang mau ditampilan
$limit = isset($_GET['batas']) ? $_GET['batas'] : 10;
$batas = isset($_POST['batas']) ? $_POST['baris'] : $limit;
// (var_dump($batas));
// $batas = 10;
// Jika $_GET['menu'] ada isinya
$keyword = isset($_GET['menu']) ? $_GET['menu'] : '';
/* 
Cek posisi halaman
jika belum terdapat nilai p maka nilai halamaan = 1,
dan jika terdapat nilai p maka nilai sesuai dengan nilai pnya
*/
$halaman = isset($_GET['p']) ? (int)$_GET['p'] : 1;
$previous = $halaman - 1;
$next = $halaman + 1;
/*  
Jika halamannya lebih dari satu makan halam awal = batas dikali halaman dikurangi batas
dan jika halamannya lebih kecil dari 1 atau sama dengan 1 makan halam awal = 0
*/
$halamanAwal = ($halaman > 1) ? ($halaman * $batas) - $batas : 0;
// Cek Jumlah data 
$JumlahData = mysqli_num_rows((mysqli_query($conn, "SELECT * FROM menu WHERE nama_menu LIKE '%$keyword%'")));
// Mencari jumlah halaman dengan cara Jumlah data dibagi batas dan fungsi ceil yaitu pembulatan ke atas
$jumlahHalaman = ceil($JumlahData / $batas);
$datas = mysqli_query($conn, "SELECT * FROM menu WHERE nama_menu LIKE '%$keyword%' LiMIT $halamanAwal, $batas");
// die(var_dump($JumlahData));


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu</title>
    <style type="text/css">
        .tabel {
            border: 6px solid cadetblue
        }

        th {
            background-color: steelblue;
        }

        tr {
            background-color: skyblue;
        }

        .mb {
            margin-bottom: 5px;
        }

        .mt {
            margin-top: 5px;
        }

        .btn {
            color: white;
            background: red;
        }
    </style>
</head>

<body>
    <h2>Tampilan Menu</h2>
    <form action="" method="GET" class="mb">
        <label for="fname">Cari</label>
        <input type="text" id="fname" name="menu">
        <input type="submit" value="submit" name="submit">
    </form>
    <form action="" method="POST" class="mb">
        <input type="text" name="baris" placeholder="Batas Baris Default 10">
        <input type="submit" value="Atur" name="batas">
    </form>
    <?php if ($halaman > 1) : ?>
        <a href="?p=<?= $previous ?>&menu=<?= $keyword ?>&batas=<?= $batas?>"><button>Previous</button></a>
    <?php endif; ?>
    <?php for ($no = 1; $no <= $jumlahHalaman; $no++) : ?>
        <?php if ($no == $halaman) : ?>
            <a href="?p=<?= $no ?>&menu=<?= $keyword ?>&batas=<?= $batas?>"><button class="mb btn"><?= $no ?></button></a>
        <?php else : ?>
            <a href="?p=<?= $no ?>&menu=<?= $keyword ?>&batas=<?= $batas?>"><button class="mb"><?= $no ?></button></a>
        <?php endif; ?>
    <?php endfor; ?>
    <?php if ($halaman < $jumlahHalaman) : ?>
        <a href="?p=<?= $next ?>&menu=<?= $keyword ?>&batas=<?= $batas?>"><button>Next</button></a>
    <?php endif; ?>
    <table class="tabel">
        <tr>
            <th>NO</th>
            <th>ID MENU</th>
            <th>NAMA MENU</th>
            <th>HARGA</th>
            <th>STATUS</th>
            <th>KATEGORI</th>
        </tr>
        <?php
        $no = 1;
        while ($data = mysqli_fetch_array($datas)) :
        ?>

            <tr>
                <td><?= $no++ ?></td>
                <td><?= $data['idmenu'] ?></td>
                <td><?= $data['nama_menu'] ?></td>
                <td><?= $data['harga'] ?></td>
                <td><?= $data['status'] ?></td>
                <td><?= $data['kategori'] ?></td>
            </tr>
        <?php endwhile; ?>

    </table>
    <form action="" method="POST" class="mt">
        <input type="submit" value="Reload Data" name="reload">
    </form>
</body>

</html>