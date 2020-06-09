<?php
session_start();
include('koneksi.php');
$produk = mysqli_query($conn,"select * from jumlah_alat_pesanan");
while($row = mysqli_fetch_array($produk)){
	$nama_alat[] = $row['nama_alat'];
	
	$query = mysqli_query($conn,"select jumlah as jumlah from jumlah_alat_pesanan where id_barang='".$row['id_barang']."'");
	$row = $query->fetch_array();
	$jumlah_pesanan[] = $row['jumlah'];
}

include('koneksi.php');
$produk2 = mysqli_query($conn,"select * from jumlah_bibit");
while($row = mysqli_fetch_array($produk2)){
	$nama_bibit[] = $row['nama_bibit'];
	
	$query = mysqli_query($conn,"select jumlah as jumlah from jumlah_bibit where id='".$row['id']."'");
	$row = $query->fetch_array();
	$jumlah_pesanan2[] = $row['jumlah'];
}
?>
<!doctype html>
<html>
<head>
    <title>Sistem Informasi Pemesanan Alat Pertanian</title>
	<script type="text/javascript" src="Chart.js"></script>
	<link rel="stylesheet" type="text/css" href="efek.css">
</head>
<body class="frame">
<div>
		<table border="0" cellpadding="3" cellspacing="0" width="85%">
		<tr>
			<td></td>
			<td><center><h1>Sistem Informasi Pemesanan Alat Pertanian (SI SANTAN)</h1></center></td>
		</tr>
		</table>


		<center>
		<div class="menu">
			<a href="index.php">Beranda</a>
			<a href="Mesin Pertanian.php">Mesin Pertanian</a>
			<a href="Bibit Pertanian.php">Bibit Pertanian</a>
			<a href="Profil.php">Profile/Kontak Kami</a>
			<a href="FormPemesanan.php">Pesan Sekarang</a>
			<a href="logout.php">Logout</a>
			</div>
		</center>
		<a href="daftar_pesanan.php">Kembali</a>
	<div>
	<table align="center">
	    <tr>
	        <td>
	            <div><h3>Perbandingan Jumlah Pemesanan Alat Pertanian SI Santan</h3></div>
	            <div id="canvas-holder" style="background-color: white;">
	                <canvas id="chart-area"></canvas>
	                </div>
	        </td>
	        <td>

	        </td>
	        <td>
	            <div><h3>Perbandingan Jumlah Pemesanan Bibit Pertanian SI Santan</h3></div>
	            <div id="canvas-holder" style="background-color: white;">
	                <canvas id="chart-area2"></canvas>
	            </div>
	        </td>
	    </tr>
	</table>
	<br>
	</div>
	<script>
		var config = {
			type: 'pie',
			data: {
				datasets: [{
					data:<?php echo json_encode($jumlah_pesanan); ?>,
					backgroundColor: [
					'rgba(255, 99, 132, 0.2)',
					'rgba(54, 162, 235, 0.2)',
					'rgba(255, 206, 86, 0.2)',
					'rgba(75, 192, 192, 0.2)',
					'rgba(242, 130, 2, 0.2)',
					],
					borderColor: [
					'rgba(255,99,132,1)',
					'rgba(54, 162, 235, 1)',
					'rgba(255, 206, 86, 1)',
					'rgba(75, 192, 192, 1)',
					'rgba(242, 130, 2, 1)',
					],
					label: 'Presentase Total Pesanan'
				}],
				labels: <?php echo json_encode($nama_alat); ?>},
			options: {
				responsive: true
			}
		};
		var config2 = {
			type: 'pie',
			data: {
				datasets: [{
					data:<?php echo json_encode($jumlah_pesanan2); ?>,
					backgroundColor: [
					'rgba(255, 99, 132, 0.2)',
					'rgba(54, 162, 235, 0.2)',
					'rgba(255, 206, 86, 0.2)',
					'rgba(75, 192, 192, 0.2)',
					'rgba(242, 130, 2, 0.2)',
					],
					borderColor: [
					'rgba(255,99,132,1)',
					'rgba(54, 162, 235, 1)',
					'rgba(255, 206, 86, 1)',
					'rgba(75, 192, 192, 1)',
					'rgba(242, 130, 2, 1)',
					],
					label: 'Presentase Total Pesanan Bibit'
				}],
				labels: <?php echo json_encode($nama_bibit); ?>},
			options: {
				responsive: true
			}
		};

		window.onload = function() {
			var ctx = document.getElementById('chart-area').getContext('2d');
			var ctx2 = document.getElementById('chart-area2').getContext('2d');
			window.myPie = new Chart(ctx, config);
			window.myPie = new Chart(ctx2,config2);
		    
		};
	</script>


</body>
<footer style="background-color:white; color:black;">
  <br>
  <center><p>©Copyright M Rizal Abdullah Rozi & Ahmad Nashirul Haq 
</p></center>
<center>Tahun 2020</center>
<br>
</footer>
</html>
