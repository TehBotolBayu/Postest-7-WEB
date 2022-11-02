<?php
session_start();
if($_SESSION['tipe'] == 'null' || $_SESSION['tipe'] == 'user'){
    header('Location: index.php');
}

    
    require 'configimg.php';
    if(isset($_GET['id'])){
        $id = $_GET['id'];
    }

    $query = "select * from akun where id='$id'";
    $result = mysqli_query($db, $query);
    $row = mysqli_fetch_assoc($result);

    if(isset($_POST['submitacc'])){
        
        $uname = $_POST["uname"];
        $rname = $_POST["name"];
        $date = $_POST['date'];
        $email = $_POST["email"];
        $pass = $_POST["pass"];
    
        $filename = $_FILES["fileToUpload"]["name"];
        $tempname = $_FILES["fileToUpload"]["tmp_name"];
        $folder = "./asset/" . $filename;

        
        if($filename != ""){
            $result = mysqli_query($db, "UPDATE akun SET username='$uname', name='$rname', account='$email', birth='$date', pw='$pass', photo='$filename' WHERE ID='$id'");
            move_uploaded_file($tempname, $folder);
        } else {
            $result = mysqli_query($db, "UPDATE akun SET username='$uname', name='$rname', account='$email', birth='$date', pw='$pass' WHERE ID='$id'");
        }
        if($result){

            echo "<script>
                alert('DATA TERUPDATE!');
                document.location.
                 href = 'admin_data.php'
                </script>";
        } else {
            echo "<script>alert('DATA GAGAL DISIMPAN')</script>";
        }
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
					<li><a href="admin_data.php" class="q">Admin Menu</a></li>
					<li><a href="web_admin.php#beranda" class="q">Beranda</a></li>
					<li><a href="web_admin.php#Destination" class="q">Destinasi</a></li>
					<li><a href="web_admin.php#AboutMe" class="q">About Me</a></li>
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
                    <input type="text" id="uname" name="uname" value="<?=$row['username']?>">
                </div>
            </div>
            <div class="row">
                <div class="col-10">
                    <label for="url">Real Name:</label>
                </div>
                <div class="col-90">
                    <input type="text" id="name" name="name" value="<?=$row['name']?>">
                </div>
            </div>
            <div class="row">
                <div class="col-10">
                    <label for="date">Date of Birth:</label>
                </div>
                <div class="col-90">
                    <input type="date" id="date" name="date" value=<?=$row['birth']?>>
                </div>
            </div>
            <div class="row">
                <div class="col-10">
                    <label for="url">Email:</label>
                </div>
                <div class="col-90">
                    <input type="email" id="email" name="email" value=<?=$row['account']?>>
                </div>
            </div>
            <div class="row">
                <div class="col-10">
                    <label for="url">Password:</label>
                </div>
                <div class="col-90">
                    <input type="text" id="pass" name="pass" value=<?=$row['pw']?>>
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
</div>
<script type="text/javascript" src="script.js">     
    </script>
</body>


