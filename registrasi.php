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
    $con = $_POST["confirm"];

    $filename = $_FILES["fileToUpload"]["name"];
    $tempname = $_FILES["fileToUpload"]["tmp_name"];
    $folder = "./asset/" . $filename;
    

    $sql = "SELECT * FROM akun WHERE account = '$email'";
    $user = $db->query($sql);
    
    if(mysqli_num_rows($user) > 0){
        echo "<script>
            alert('Email telah digunakan');
            </script>";
    } else {
        if($pass == $con){
            $pass = password_hash($pass, PASSWORD_DEFAULT);
            if($filename != ""){
            // Get all the submitted data from the form
                $sql = "INSERT INTO akun (username, account, name, birth, pw, tipe, photo, Kesempatan) VALUES ('$uname', '$email', '$rname', '$date', '$pass', 'user', '$filename', 3)";
                move_uploaded_file($tempname, $folder);
            } else {
                $sql = "INSERT INTO akun (username, account, name, birth, pw, tipe, photo, Kesempatan) VALUES ('$uname', '$email', '$rname', '$date', '$pass', 'user', 'akun.png', 3)";   
            }
        // Execute query
            $res = mysqli_query($db, $sql);
            if($res){
                echo "<script>
                alert ('Anda telah terdaftar!');
                </script>"; 
            } else {
                echo "<script>
                alert ('Maaf, gagal menyimpan data anda');
                </script>";                
            }

        } else {
            echo "<script>
                alert ('Konfirmasi passsword salah');
                </script>";
        }
    }
}
?>


<!DOCTYPE html>


<head>
<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="style.css">
	<link rel="stylesheet" href="adminstyle.css"></head>
<body>
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
                    <label for="url">Password Confirm:</label>
                </div>
                <div class="col-90">
                    <input type="text" id="pass" name="confirm">
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
    <p align='center'>Sudah punya akun? Silahkan <a href="index.php">login</a></p>
    <script type="text/javascript" src="script.js">     
    </script>
</div>
</body>