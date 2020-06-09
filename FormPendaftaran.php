<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
	<style>
		.password {
			width: 100%;
		}
	</style>
	<script type="text/javascript" src="jquery-3.4.1.min.js"></script>
</head>
<?php include('header.php');?>
<body class="frame">
    <div>
    <div>
	    <center><h2>Formulir Pendaftaran</h2></center>
	<br>
	<br></div>
<?php
$error_nama = "";
$error_username = "";
$error_password = "";
$error_email = "";
$error_alamat = "";
$error_telp = "";

$nama = "";
$username = "";
$password = "";
$email = "";
$alamat = "";
$telp = "";

if ($_SERVER ["REQUEST_METHOD"] == "POST") {
	if (empty($_POST["nama"]))
	{
		$error_nama = "Nama Tidak Boleh Kosong";
	}
	else
	{
		$nama = cek_input($_POST["nama"]);
		if (!preg_match("/^[a-zA-Z ]*$/",$nama))
		{
			$error_nama = "Inputan Hanya boleh huruf dan spasi";
		}
	}
	if (empty($_POST["username"]))
	{
		$error_username = "Username tidak Boleh Kosong";
	}
	else
	{
	$username = cek_input($_POST["username"]);
    // validasi input data
    include('koneksi.php');
    $sql = "select * from user where username='".$username."'";
    $data = mysqli_query($conn,$sql);
    // menghitung jumlah data yang ditemukan
    $cek = mysqli_num_rows($data);
    //perlakuan ketika data yang diinput ada pada tabel admin
    if($cek > 0){
    $error_username = "Username tidak dapat digunakan";
    }
    else
    {
    $username = cek_input($_POST["username"]);
    }
    }
	if (empty($_POST["password"]))
	{
		$error_password = "Password tidak boleh kosong";
	}
	else
	{
		$password = cek_input ($_POST["password"]);
	}

	if (empty($_POST["pesan"]))
	{
		$error_pesan = "Pesan tidak boleh kosong";
	}
	else
	{
		$pesan = cek_input ($_POST["pesan"]);
	}

	if (empty($_POST["email"]))
	{
		$error_email = "Email tidak boleh kosong";
	}
	else
	{
		$email = cek_input ($_POST["email"]);
		if (!filter_var($email, FILTER_VALIDATE_EMAIL))
		{
			$error_email = "Format email tidak valid";
		}
	}
	if (empty($_POST["telp"]))
	{
		$error_telp = "Nomor HP tidak boleh kosong";
	}
	else
	{
		$telp = cek_input($_POST["telp"]);
		if(!is_numeric($telp))
		{
			$error_telp = 'Nomor HP hanya boleh angka';
		}
	}
	if (empty($_POST["alamat"]))
	{
		$error_alamat = "Alamat tidak boleh kosong";
	}
	else
	{
	$alamat = cek_input($_POST["alamat"]);    
	}
	if(isset($_POST['daftar'])){
    include('koneksi.php');
    // buat query
    $username = $_POST["username"];
    $password = $_POST["password"];
    $sql = "INSERT INTO user VALUES (NULL,'".$username."','".$password."','".$nama."','".$email."','".$telp."', '".$alamat."')";
    $query = mysqli_query($conn, $sql);
    // apakah query simpan berhasil?
    if( $query ) {
        // kalau berhasil alihkan ke halaman daftar.php dengan message alert!!
        echo "<meta http-equiv='refresh' content='0; url=index.php'>";
        echo "<script>window.alert('Selamat, Anda telah berhasil mendaftar!!');</script>";
    } else {
        // kalau gagal alihkan ke halaman indek.php dengan status=gagal
        // header('Location: index.html');
        echo "<script>window.alert('Maaf, Anda gagal mendaftar!!');</script>";
        echo "<meta http-equiv='refresh' content='0; url=FormPendaftaran.php'>";
    }} 
    else {
    die("Akses tidak dapat diberkan");
    }
	}


function cek_input($data) {
	$data = trim($data);
	$data = stripcslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}
?>
<div class="container">
<div class="row">
	<div class="col-md">
				<form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"> 
				<div class="form-group row">
					<label for="nama" class="col-sm-2 col-form-label">Nama</label>
					<div class="col-sm-10">
						<input type="text" name="nama" class="form-control <?php echo($error_nama != "" ? "is-invalid" : "");?>" id="nama" placeholder="Masukkan Nama" value="<?php echo $nama; ?>"><span class="text-danger"><?php echo $error_nama; ?></span>
					</div>
				</div>
				<div class="form-group row">
					<label for="username" class="col-sm-2 col-form-label">Username</label>
					<div class="col-sm-10">
						<input type="text" name="username" class="form-control <?php echo($error_username != "" ? "is-invalid" : "");?>" id="user" placeholder="Masukkan Username" value="<?php echo $username; ?>"><span class="text-danger"><?php echo $error_username; ?></span>
					</div>
				</div>
				<div class="form-group row">
					<label for="password" class="col-sm-2 col-form-label">Password</label>
				<div class="col-sm-10">
						<input type="password" class="password" name="password" class="form-control <?php echo($error_password != "" ? "is-invalid" : "");?>" id="password" placeholder="Masukkan Password " value="<?php echo $password; ?>"><span class="text-danger"><?php echo $error_password; ?></span>
					</div>
				</div>
                <div class="form-group row">
					<label for="password" class="col-sm-2 col-form-label"></label>
				<div class="col-sm-10">
						<input type="checkbox" class="form-checkbox"> Show password
					</div>
				</div>
                <script type="text/javascript">
					$(document).ready(function(){		
						$('.form-checkbox').click(function(){
							if($(this).is(':checked')){
								$('.password').attr('type','text');
							}else{
								$('.password').attr('type','password');
							}
						});
					});
				</script>

				<div class="form-group row">
					<label for="email" class="col-sm-2 col-form-label">Email</label>
				<div class="col-sm-10">
						<input type="text" name="email" class="form-control <?php echo($error_email != "" ? "is-invalid" : "");?>" id="email" placeholder="Email" value="<?php echo $email; ?>"><span class="text-danger"><?php echo $error_email; ?></span>
					</div>
				</div>

				<div class="form-group row">
					<label for="telp" class="col-sm-2 col-form-label">No Telp</label>
				<div class="col-sm-10">
						<input type="text" name="telp" class="form-control <?php echo($error_telp != "" ? "is-invalid" : "");?>" id="telp" placeholder="Telepon" value="<?php echo $telp; ?>"><span class="text-danger"><?php echo $error_telp; ?></span>
					</div>
				</div>
					
				<div class="form-group row">
					<label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
				<div class="col-sm-10">
						<textarea type="text" name="alamat" class="form-control <?php echo($error_alamat != "" ? "is-invalid" : "");?>" id="alamat" placeholder="Alamat" value="<?php echo $alamat; ?>"></textarea><span class="text-danger"><?php echo $error_alamat; ?></span>
					</div>
				</div>
				<center>
				<div class="form-group-row">
					<div class="col-sm-10">
						<button type="submit" name="daftar" class="btn btn-primary">Daftar</button>
					</div>
				</div>
				</center>
				</form>
			</div>
	</div>
</div>            
</div>
</body>
<footer style="background-color:white; color:black;">
  <br>
  <center><p>©Copyright M Rizal Abdullah Rozi & Ahmad Nashirul Haq 
</p></center>
<center>Tahun 2020</center>
<br>
</footer>
</html>
