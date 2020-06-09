<?php require_once('cek_sesi_login.php');?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<script type="text/javascript" src="jquery-3.4.1.min.js"></script>
	<link rel="stylesheet" type="text/css" href="efek.css">
    
</head>
<body class="frame">
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
</body>
</html>
</body>
</html>
			<br>
			<div class="biodata">
			<center><h2>Formulir Pesanan</h2></center>
			</div>
			<br>

<?php
$error_nama = "";
$error_pesanan1 = "";
$error_pesanan2 = "";
$error_email = "";
$error_alamat = "";
$error_telp = "";

$nama = "";
$pesanan1 = "";
$pesanan2 = "";
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
	if (empty($_POST["pesanan1"]))
	{
		$error_pesanan1 = "Pesanan tidak boleh kosong, jika ingin pesan lebih silahkan mengisi formulir pesanan kembali";
	}
	else
	{
		$pesanan1 = cek_input ($_POST["pesanan1"]);
	}


	if (empty($_POST["pesanan2"]))
	{
		$error_pesanan2 = "Pesan tidak boleh kosong";
	}
	else
	{
		$pesanan2 = cek_input ($_POST["pesanan2"]);
	}

	if (empty($_POST["email"]))
	{
		$error_email = "Email Tidak boleh kosong";
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
	if(isset($_POST["pesan"]))
	{
	include('koneksi.php');
    // buat query
    $username = $_SESSION["username"];
    $bantuan = "select id from user where username='".$username."'";
    $result = mysqli_query($conn,$bantuan);
    $row = mysqli_fetch_assoc($result);
    $id = $row['id'];
    $sql = "INSERT INTO daftar_pesanan VALUES (NULL,'".$id."','".$nama."','".$pesanan1."','".$pesanan2."','".$email."','".$telp."', '".$alamat."')";
    $query = mysqli_query($conn, $sql);
    // apakah query simpan berhasil?
    if( $query ){
        // kalau berhasil alihkan ke halaman daftar.php dengan message alert!!
        echo "<meta http-equiv='refresh' content='0; url=FormPemesanan.php'>";
        echo "<script>window.alert('Selamat, Anda telah berhasil memesan!!');</script>";
        echo "<script>window.alert('Silahkan hubungi CP untuk konfirmasi!!');</script>";
    } else {
        // kalau gagal alihkan ke halaman indek.php dengan status=gagal
        // header('Location: index.html');
        echo "<script>window.alert('Maaf, Anda gagal memesan!!');</script>";
        echo "<meta http-equiv='refresh' content='0; url=#'>";
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
				<form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"> <div class="form-group row">
					<label for="nama" class="col-sm-2 col-form-label">Nama</label>
					<div class="col-sm-10">
						<input type="text" name="nama" class="form-control <?php echo($error_nama != "" ? "is-invalid" : "");?>" id="nama" placeholder="Masukkan Nama" value="<?php echo $nama; ?>"><span class="text-danger"><?php echo $error_nama; ?></span>
					</div>
				</div>

				<div class="form-group row">
					<label for="pesanan1" class="col-sm-2 col-form-label">Pesanan</label>
					<div class="col-sm-10">
				<select class="form-control" name="pesanan1"  <?php echo($error_pesanan1 != "" ? "is-invalid" : "");?>"" id="pesanan1" value="<?php echo $pesanan1; ?>">
					<option value="">Mesin Alat Pertanian</option>
					<option value="Mesin Pengolah Kopi">Mesin Pengolah Kopi</option>
					<option value="Mesin Pengolah Kelapa">Mesin Pengolah Kelapa</option>
					<option value="Mesin Pengolah Padi">Mesin Pengolah Padi</option>
					<option value="Mesin Pengolah Jagung">Mesin Pengolah Jagung</option>
					<option value="Mesin Pengolah Umbi-Umbian">Mesin Pengolah Umbi-Umbian</option>
				</select>
				<span class="text-danger"><?php echo $error_pesanan1; ?></span>
					</div>
				</div>

				<div class="form-group row">
					<label for="pesanan2" class="col-sm-2 col-form-label"> </label>
					<div class="col-sm-10">
				<select name="pesanan2" class="form-control" <?php echo($error_pesanan2 != "" ? "is-invalid" : "");?>"" id="pesanan2" value="<?php echo $pesanan2; ?>">
					<option value="">Bibit Pertanian</option>
					<option value="Bibit Kopi">Bibit Kopi</option>
					<option value="Bibit Kelapa">Bibit Kelapa</option>
					<option value="Bibit Padi">Bibit Padi</option>
					<option value="Bibit Jagung">Bibit Jagung</option>
					<option value="Bibit Umbi-Umbian">Bibit Umbi-Umbian</option>
				</select><span class="text-danger"><?php echo $error_pesanan2 ; ?></span>
					</div>
				</div>

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
						<button type="submit" name="pesan" class="btn btn-primary">Pesan</button>
					</div>
				</div>
				</center>
				</form>
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