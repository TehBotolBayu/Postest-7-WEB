<?php
error_reporting(E_ERROR);
session_start();

require "configimg.php";

$msg = "";

// If upload button is clicked ...
if (isset($_POST['submitacc'])) {

    $uname = $_POST["uname"];
    $rname = $_POST["name"];
    $date = $_POST['date'];
    $email = $_POST["email"];
    $pass = $_POST["pass"];

    $filename = $_FILES["fileToUpload"]["name"];
    $tempname = $_FILES["fileToUpload"]["tmp_name"];
    $folder = "./asset/" . $filename;
    
    if($filename != ""){
    // Get all the submitted data from the form
        $sql = "INSERT INTO akun (username, account, name, birth, pw, tipe, photo) VALUES ('$uname', '$email', '$rname', '$date', '$pass', 'user', '$filename')";
    } else {
        $sql = "INSERT INTO akun (username, account, name, birth, pw, tipe, photo) VALUES ('$uname', '$email', '$rname', '$date', '$pass', 'user', 'akun.png')";   
    }
    // Execute query
    mysqli_query($db, $sql);

    // Now let's move the uploaded image into the folder: image
    if (move_uploaded_file($tempname, $folder)) {
        echo "<script>alert('Data uploaded successfully!')</script></h3>";
    } else {
        echo "<script>alert('Failed to upload data!')</script>";
    }
    header('Location: admin_data.php');
}
?>


<!DOCTYPE html>

<head>
	<title>Travel.ink</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="style.css">
	<link rel="stylesheet" href="adminstyle.css">
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
					<li><a href="profile.php" class="q">Profile</a></li>
					<li><a href="web_user.php#beranda" class="q">Beranda</a></li>
					<li><a href="web_user.php#Destination" class="q">Destinasi</a></li>
					<li><a href="web_user.php#AboutMe" class="q">About Me</a></li>
					<li><a class="q">Dark Theme
						<input type="checkbox" id="switch" />
						<label id="lbl" for="switch">Toggle</label>
					</a></li>
				</ul>
			</nav>
		</div>
	</header>

<div class="fom">
    <h1>Register</h1>

	<form method="POST" action="" enctype="multipart/form-data">	
        <div class="container">
            <div class="row">
                <div class="col-10">
                    <label for="url">User Name:</label>
                </div>
                <div class="col-90">
                    <input type="text" id="uname" name="uname">
                </div>
            </div>
            <div class="row">
                <div class="col-10">
                    <label for="url">Real Name:</label>
                </div>
                <div class="col-90">
                    <input type="text" id="name" name="name">
                </div>
            </div>
            <div class="row">
                <div class="col-10">
                    <label for="date">Date of Birth:</label>
                </div>
                <div class="col-90">
                    <input type="date" id="date" name="date">
                </div>
            </div>
            <div class="row">
                <div class="col-10">
                    <label for="url">Email:</label>
                </div>
                <div class="col-90">
                    <input type="email" id="email" name="email">
                </div>
            </div>
            <div class="row">
                <div class="col-10">
                    <label for="url">Password:</label>
                </div>
                <div class="col-90">
                    <input type="text" id="pass" name="pass">
                </div>
            </div>
            <div class="row">
                <div class="col-10">
                    <label for="city">Image:</label>
                </div>
                <div class="col-90">
                    <input type="file" name="fileToUpload" id="fileToUpload">
                </div>
            </div>
            <div class="row">
                <input type="submit" value="Upload" name="submitacc">
            </div>
        </div>
	</form>
    <script type="text/javascript" src="script.js">     
    </script>
</div>
</body>


