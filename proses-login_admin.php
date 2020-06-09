<?php 
// mengaktifkan sesi sebuah php
session_start();
 
// menghubungkan dengan koneksi
include ('koneksi.php');

// menangkap data yang dikirim dari form
$admin = $_POST['username'];
$password = $_POST['password'];
 
// menyeleksi data admin dengan username dan password yang sesuai pada database 18082010028 dengan tabel admin
$data = mysqli_query($conn,"select * from admin_sisantan where user_admin='$admin' and pass_admin='$password';"); 
//mysqli_query berguna untuk memanggil sebuah query sql

// menghitung jumlah data yang ditemukan
$cek = mysqli_num_rows($data);

//perlakuan ketika data yang diinput ada pada tabel admin
if($cek > 0){
	$_SESSION['admin'] = $admin; //berguna untuk menyimpan variabel username pada sesi login
	$_SESSION['admin_status'] = "login"; //menyimpan variabel status sebagai login pada sesi tersebut
	    echo "<script>window.alert('Selamat datang Admin Website Si Santan, Selamat mengelola pesanan!!');</script>";
        echo "<meta http-equiv='refresh' content='0; url=daftar_pesanan.php'>";
	//mengarahkan ke laman cetak.php dengan menyimpan value pesan login
}else{
    echo "<meta http-equiv='refresh' content='0; url=login_admin.php'>"; //mengarahkan ke laman login.php dengan menyimpan value pesan gagal
	echo "<script>window.alert('Login gagal, username atau password salah!!')</script>"; //memunculkan alert sesuai pesan yang diberikan
}
?>