<?php 
//memulai session
session_start();
// menghapus semua session
$status="logout";
session_destroy();
 
// mengalihkan halaman sambil mengirim pesan logout
echo ("<script>window.alert('Anda telah Logout, terimakasih telah menggunakan layanan kami.')</script>");
echo "<meta http-equiv='refresh' content='0; url=login.php'>";
?>