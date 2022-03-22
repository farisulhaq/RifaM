<?php  
    include('connect.php');
    if(isset($_POST['submit'])) {
        $nama = $_POST['nama'];
        $alamat = $_POST['alamat'];
        $sql = "INSERT INTO mhs (nama, alamat) VALUE ('$nama', '$alamat')";
        $query = mysqli_query($conn, $sql);
        if($query) {
            var_dump("Berhasil");
        }else {
            var_dump("gagal");
        }
    }
?>