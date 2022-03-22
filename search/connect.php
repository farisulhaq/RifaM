<?php

$host = "localhost";
$user = "root";
$pass = "";
$database = "ejuwelen_kasir";


$connect = mysqli_connect($host, $user, $pass);
if ($connect) {
	$open = mysqli_select_db($connect, $database);
	echo "BERIKUT DATA DARI TABEL MENU";
	if (!$open) {
		echo "DATABASE TIDAK DAPAT TERHUBUNG";
	}
} else {
	echo "DATABASE TIDAK DAPAT TERHUBUNG";
}
