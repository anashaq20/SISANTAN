<?phprequire_once('cek_sesi_login_admin.php');?>
<!DOCTYPE html/>
<title>Sistem Informasi Pemesanan Alat Pertanian</title>
<head>
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
<table width="85%">
    <tr>
        <td>
            <div>
                <center><h2 class="heading">Daftar Pesanan SI SANTAN</h2></center>
                </div><br>
                <div><a href="pie_chart_pemesanan.php">Tampilkan Statistik Pemesanan Alat & Bibit</a></div>
                <br>
        </td>
    </tr>
</table>
<table width="85%" border="3" cellpadding="2"> 
          <thead class="thead">   
              <?php
              include ('koneksi.php');
              $select = "SELECT * FROM daftar_pesanan;";
              $result = mysqli_query($conn, $select);
              if(!$result) {
                die ('SQL Error: ' . mysqli_error($conn));
                  }
              else if (mysqli_num_rows($result) > 0) {
              $no   = 1;
              ?>
                <tr>
                  <th>NO</th>
                  <th>ID PESANAN</th>
                  <th>ID PELANGGAN</th>
                  <th>NAMA</th>
                  <th>ALAT PERTANIAN</th>
                  <th>BIBIT PERTANIAN</th>
                  <th>EMAIL</th>
                  <th>NO HP</th>
                  <th>ALAMAT</th>
                </tr>
              </thead>
              <tbody>
                <?php while ($row = mysqli_fetch_assoc($result)) 
                  {
                    echo '
                      <tr>
                        <td>'.$no.'</td>
                        <td>'.$row['id_pesanan'].'</td>
                        <td>'.$row['id'].'</td>
                        <td>'.$row['nama'].'</td>
                        <td>'.$row['pesanan1'].'</td>
                        <td>'.$row['pesanan2'].'</td>
                        <td>'.$row['email'].'</td>
                        <td>'.$row['telp'].'</td>
                        <td>'.$row['alamat'].'</td>
                        </tr>';
                    $no++;
                  };
                   }else {
                        echo '<script>window.alert("Data Pesanan belum terisi");</script>';
                        };
                    ?>
                  </tbody>
                </table>
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