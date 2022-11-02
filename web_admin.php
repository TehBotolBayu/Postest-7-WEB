<?php
session_start();
error_reporting(E_ERROR);
require "configimg.php";

if($_SESSION['tipe'] != "admin"){
	header('Location: index.php');
}

?>

<!DOCTYPE html>

<head>
	<title>Travel.ink</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="style.css">
	<script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>
</head>

<body id="beranda">
	<header>
		<div id="head">
			<input type="checkbox" id="toggle">
			<label for="toggle" id="sidebutton">&#9776;</label>
			<p id="judul">Travel.ink</p>
			<nav id="sidebar">
				<ul>
					<li><a href="admin_data.php" class="q x">Menu Admin
					</a></li>					
					<li><a href="#beranda" class="q z">Beranda</a></li>
					<li><a href="#Destination" class="q">Destinasi</a></li>
					<li><a class="q">Dark Theme
						<input type="checkbox" id="switch" />
						<label id="lbl" for="switch">Toggle</label>
					</a></li>
					<li><a href="#AboutMe" class="q">About Owner</a></li>
					<li><a href="index.php" class="q">Log Out</a></li>
				</ul>
			</nav>
		</div>
	</header>
	<?php include('body.php'); ?>