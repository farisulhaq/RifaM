<?php

if (isset($_POST['submit'])) {
    $fname = $_POST['FName'];
    $lname = $_POST['LName'];
    $email = $_POST['email'];
    $alamat = $_POST['alamat'];
    $tanggal = $_POST['tanggal'];
    $kategori = $_POST['kategori'];
    // $size = $_POST['size'];
    $jumlah = $_POST['jumlah'];
    $opsi = $_POST['opsi'];
    $metode = $_POST['metode'];
    $keterangan = $_POST['keterangan'];
    // $proteksi = $_POST['proteksi'];
    // $dropshipper = $_POST['drop'];
    $subtotal = (int)$kategori * (int)$jumlah;
    $total = (int)$kategori * (int)$jumlah + (int)$opsi;
    // validasi
    $error = [];
    if ($fname == '') {
        $error[] = 'Nama belum diisi';
    }
    if ($lname == '') {
        $error[] = 'Nama belum diisi';
    }
    if ($email == '') {
        $error[] = 'Email belum diisi';
    }
    if ($alamat == '') {
        $error[] = 'Alamat belum diisi';
    }
    if ($tanggal == '') {
        $error[] = 'Tanggal belum diisi';
    }
    if ($kategori == '') {
        $error[] = 'Kategori belum diisi';
    }
    if (empty($_POST["size"])) {
        $error[] = 'Ukuran belum diisi';
    }
    if ($jumlah == '') {
        $error[] = 'Jumlah belum diisi';
    }
    if ($opsi == '') {
        $error[] = 'Opsi belum diisi';
    }
    if ($metode == '') {
        $error[] = 'Metode pembayaran belum diisi';
    }
    if ($keterangan == '') {
        $error[] = 'Keterangan belum diisi';
    }
    if (empty($_POST["proteksi"])) {
        $error[] = 'Proteksi belum diisi';
    }
    if (empty($_POST["drop"])) {
        $error[] = 'Dropshipper belum diisi';
    }
    if (sizeof($error) == 0) {
        session_start();
        $_SESSION['data'] = $_POST;
        header('Location: bayar.php');
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <title>Pemesanan Barang</title>
    <style>
        body {
            background-color: #A9C693;
        }

        h1 {
            text-align: center;
            text-decoration: underline;
        }
    </style>
</head>

<body>
    <ul>
        <?php foreach ($error as $err) : ?>
            <li style="color: red;"><?php echo $err; ?></li>
        <?php endforeach; ?>
    </ul>
    <h1>Pemesanan Barang</h1>
    <form class="form" action="" method="post">
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="FName">First Name</label>
                <input type="text" class="form-control" id="FName" name="FName" placeholder="Nama Depan">
            </div>
            <div class="form-group col-md-6">
                <label for="LName">Last Name</label>
                <input type="text" class="form-control" id="LName" name="LName" placeholder="Nama Belakang">
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-4">
                <label for="email">Email</label>
                <input type="text" class="form-control" id="email" name="email" placeholder="Email : abcde@gmail.com">
            </div>
            <div class="form-group col-md-4">
                <label for="alamat">Address</label>
                <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Alamat Lengkap">
            </div>
            <div class="form-group col-md-4">
                <label for="tanggal">Date</label>
                <input type="date" class="form-control" id="tanggal" name="tanggal">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="kategori">Kategori</label>
                <select name="kategori" id="kategori" class="form-control" onchange="price()">
                    <option value="">Pilih kategori</option>
                    <option value="100000" name="baju">Baju</option>
                    <option value="150000" name="celana">Celana</option>
                </select>
            </div>
            <div class="form-group col-md-6">
                <label for="harga">Harga</label>
                <input type="text" id="harga" class="form-control">
                <script type="text/javascript">
                    function price() {
                        var tes = document.getElementById("kategori").value;
                        document.getElementById("harga").value = tes;
                    }
                </script>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="size">Size</label>
                <br><input type="radio" name="size" value="s">S
                <input type="radio" name="size" value="M">M
                <input type="radio" name="size" value="L">L
                <input type="radio" name="size" value="XL">XL
                <input type="radio" name="size" value="XXL">XXL
                <input type="radio" name="size" value="XXXL">XXXL
            </div>
            <div class="form-group col-md-6">
                <label for="jumlah">Jumlah</label>
                <input type="text" class="form-control" id="jumlah" name="jumlah" placeholder="Jumlah Barang">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-3">
                <label for="opsi">Opsi Pengiriman</label>
                <select name="opsi" id="opsi" class="form-control" onchange="nilai()">
                    <option value="">Pilih Opsi Pengiriman</option>
                    <option value="20000">Reguler</option>
                    <option value="50000">Kargo</option>
                </select>
            </div>
            <div class="form-group col-md-3">
                <label for="rp">Rp</label>
                <input type="text" id="rp" class="form-control">
                <script type="text/javascript">
                    function nilai() {
                        var cek = document.getElementById("opsi").value;
                        document.getElementById("rp").value = cek;
                    }
                </script>
            </div>
            <div class="form-group col-md-6">
                <label for="metode">Metode Pembayaran</label>
                <select name="metode" id="metode" class="form-control">
                    <option value="">Pilih Metode Pembayaran</option>
                    <option value="COD">COD</option>
                    <option value="Transfer Bank">Transfer Bank</option>
                    <option value="Kartu Kredit/Debit">Kartu Kredit/Debit</option>
                    <option value="BRI Direct Debit">BRI Direct Debit</option>
                    <option value="BCA Oneklik">BCA Oneklik</option>
                    <option value="Alfamart / Alfamidi / Dan+Dan">Alfamart / Alfamidi / Dan+Dan</option>
                    <option value="Indomaret / i.Saku">Indomaret / i.Saku</option>
                </select>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-12">
                <label for="keterangan">Keterangan</label>
                <textarea class="form-control" id="keterangan" name="keterangan" rows="4" placeholder="Keterangan pembelian"></textarea>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-12">
                <input type="checkbox" class="custom-control-input" id="proteksi" name="proteksi">
                <label class="custom-control-label" for="proteksi">Proteksi Kerusakan Produk</label>
            </div>
            <div class="form-group col-md-12">
                <input type="checkbox" class="custom-control-input" id="drop" name="drop">
                <label class="custom-control-label" for="drop">Kirim Sebagai Dropshipper</label>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-12">
                <button type="submit" value="bayar" name="submit" class="btn btn-primary">CheckOut</button>
            </div>
        </div>
    </form>



</body>

</html>