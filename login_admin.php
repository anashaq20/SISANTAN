<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
</head>
<body>
		<?php include('header.php')?>
	<h1><center>Login Admin</center></h1>
	<form method="POST" action="proses-login_admin.php">
		<table border="0" width="400" cellpadding="3" align="center">
			<tr>
				<td width="110">Username</td>
				<td><input type="text" name="username"></td>
			</tr>
			<tr>
				<td width="110">Password</td>
				<td>
				    <input type="Password" name="password">
				    </td>
			</tr>
		</table>
		<br>
		<center><input type="submit" name="btnLogin" class="btn-primary" value="Masuk"></center>
	</form>
</body>
<footer style="background-color:white; color:black;">
  <br>
  <center><p>©Copyright M Rizal Abdullah Rozi & Ahmad Nashirul Haq 
</p></center>
<center>Tahun 2020</center>
<br>
</footer>
</html>