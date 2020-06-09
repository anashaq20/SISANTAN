<?php
$hostname = 'localhost'; // Nama Server
$username = 'id14003997_sisantan18'; // User Server
$password = 'S1s@ntansi18upn'; // Password Server
$database = 'id14003997_si_santan'; // Nama Database

$conn = mysqli_connect($hostname, $username, $password, $database);
if (!$conn) {
	die ('Gagal terhubung dengan MySQL, Keterangan: ' . mysqli_connect_error());	
}
?>