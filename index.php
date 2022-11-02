<?php
session_start();
$_SESSION['tipe'] = 'null';
error_reporting(E_ERROR);

require 'configimg.php';

if(isset($_POST['sign_btn'])){

	$acc = $_POST['email'];
	
	$res = mysqli_query($db, "SELECT * FROM akun WHERE account='$acc'");
	$data = mysqli_fetch_assoc($res);

	$pw = $_POST['password'];
	$tipe = $data['tipe'];
	
	
	if(password_verify($pw, $data['pw'])){
		$_SESSION['tipe'] = $data['tipe'];
		$_SESSION['akun'] = $data['account'];
		$_SESSION['pw'] = $data['pw'];
		if($tipe == 'admin'){
			header('Location: web_admin.php');
		}
		else if($tipe == 'user'){
			header('Location: web_user.php');
		}
	}
	else{
		echo "<script>
			alert('Maaf, password salah!');
		</script>";
		
	}
}
?>

<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="logstyle.css">
</head>
<body>
<div class="log">
	<div class="header">
		<h2>Sign In</h2>
	</div>
	<form method="post" action="">

		<div class="input-group">
			<label>Email</label>
			<input type="email" name="email" value="">
		</div>
		<div class="input-group">
			<label>Password</label>
			<input type="password" name="password">
		</div>

		<div class="input-group">
			<button type="submit" class="btn" name="sign_btn">Sign In</button>
		</div>
		
	</form>
	<p align='center'>Belum punya akun? <a href='registrasi.php'>Register</a></p>
	
</div>
</body>
</html>