<?php
session_start();
if(!isset($_SESSION["username"])){
    echo "<script>window.alert('Silahkan login untuk melanjutkan!!');</script>";
    echo "<meta http-equiv='refresh' content='0; url=login.php'>";}
?>