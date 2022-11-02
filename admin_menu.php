<?php
error_reporting(E_ERROR);
session_start();
if($_SESSION['tipe'] == 'null' || $_SESSION['tipe'] == 'user'){
    header('Location: index.php');
}
$tgl = date("Y/m/d");
require "configimg.php";

$msg = "";

// If upload button is clicked ...
if (isset($_POST['submit'])) {

    $url = $_POST["url"];
    $title = $_POST["title"];
    $date = $_POST['date'];

    $filename = $_FILES["fileToUpload"]["name"];
    $tempname = $_FILES["fileToUpload"]["tmp_name"];
    $folder = "./asset/" . $filename;
 
    // Get all the submitted data from the form
    $sql = "INSERT INTO image (url, date, title, image) VALUES ('$url', '$date', '$title', '$filename')";
 
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
    <h1 class="tabletitle">Add News</h1>
    
	<form method="POST" action="" enctype="multipart/form-data">	
        <input type="hidden" name="date" value=<?=$tgl?>>
        <div class="container">
            <div class="row">
                <div class="col-10">
                    <p>Hari ini: <?php echo $tgl; ?></p>
                </div>
            </div>
            <div class="row">
                <div class="col-10">
                    <label for="url">News URL:</label>
                </div>
                <div class="col-90">
                    <input type="url" id="url" name="url" placeholder="www.example.com">
                </div>
            </div>
            <div class="row">
                <div class="col-10">
                    <label for="title">News Title:</label>
                </div>
                <div class="col-90">
                    <textarea name="title" id="title" cols="30" rows="10"></textarea>
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
                <input type="submit" value="Upload" name="submit">
            </div>
        </div>
	</form>
 
	</form>
    <script type="text/javascript" src="script.js">     
    </script>
</div>
</body>


