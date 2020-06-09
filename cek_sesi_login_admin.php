<?php
if(!isset($_SESSION["admin_status"])){
    echo "<script>window.alert('Silahkan login untuk melanjutkan!!');</script>";
    echo "<meta http-equiv='refresh' content='0; url=login_admin.php'>";}
?>