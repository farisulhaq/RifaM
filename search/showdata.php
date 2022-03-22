<?php
include('connect.php');

function query($sql)
{
	global $connect;
	$data = mysqli_query($connect, $sql);
	return $data;
}

if (!isset($_POST['submit'])) {
	if (isset($_POST['asc'])) {
		var_dump('saya');
		$getdata = query("select * from menu order by harga asc");
	} elseif (isset($_POST['desc'])) {
		var_dump('saya');
		$getdata = query("select * from menu order by harga desc");
	} else {

		$getdata = query("select * from menu");
	}
} else {
	if (isset($_POST['submit'])) {
		$cari = $_POST['menu'];
		$getdata = query("select * from menu where nama_menu LIKE '%$cari%'");
	}
}



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
	</style>
</head>

<body>
	<h2>Tampilan Menu</h2>
	<form action="" method="POST">
		<label for="fname">Cari</label>
		<input type="text" id="fname" name="menu">
		<input type="submit" value="submit" name="submit">
		<br>
		<input type="submit" value="Naik" name="asc">
		<input type="submit" value="Turun" name="desc">
	</form>
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
		while ($showdata = mysqli_fetch_array($getdata)) :
		?>

			<tr>
				<td><?= $no++ ?></td>
				<td><?= $showdata['idmenu'] ?></td>
				<td><?= $showdata['nama_menu'] ?></td>
				<td><?= $showdata['harga'] ?></td>
				<td><?= $showdata['status'] ?></td>
				<td><?= $showdata['kategori'] ?></td>
			</tr>
		<?php endwhile; ?>


	</table>
</body>

</html>