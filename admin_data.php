<?php
session_start();
if($_SESSION['tipe'] == 'null' || $_SESSION['tipe'] == 'user'){
    header('Location: index.php');
}
?>


<!DOCTYPE html>

<head>
	<title>Travel.ink</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="style.css">
	<link rel="stylesheet" href="admin_data.css">
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
					<li><a href="#" class="q">Admin Menu</a></li>
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

    <form method="POST" action="cari.php" enctype="multipart/form-data">
        <div class="cari">
            <label for="url">Cari Data: </label>
            <input type="text" id="pass" name="pass">
            <input type="submit" value="Upload" name="submitacc">
        </div>
    </form>

<div class="tabletitle"> News Data </div>
<div class="datatable">
<table>
    <tr id="theader">
        <th>
            Title
        </th>
        <th>
            URL
        </th>
        <th>
            Image
        </th>
        <th>
            Date
        </th>
        <th>
            Option
        </th>
    </tr>

<?php
require "configimg.php";
$query = " select * from image";
$result = mysqli_query($db, $query);
$len = 1;
while ($data = mysqli_fetch_assoc($result)) {
?>

    <tr class="datarow">
        <td>
            <?php echo $data['title']; ?>
        </td>
        <td>
            <?php echo $data['url']; ?>
        </td>
        <td>
            <img src="asset/<?php echo $data['image']; ?>" width="100px" height="70px">
        </td>
        <td>
            <?php echo $data['date']; ?>
        </td>
        <td>
            <a href="editnews.php?id=<?=$data['id']?>" class="buttondata U">Edit</a>
            <a href="delete.php?id=<?=$data['id']?>" class="buttondata U">Delete</a>
        </td>
    </tr>

<?php
$len += 1;
}	
?>
</table>
<br>

</div>
<a href="admin_menu.php" class="buttondata">Add News</a>

<div class="tabletitle"> Account Data </div>
<div class="datatable">
<table>
    <tr id="theader">
        <th>
            Username
        </th>
        <th>
            Email
        </th>
        <th>
            Name
        </th>
        <th>
            Date of Birth
        </th>
        <th>
            Photo
        </th>
        <th>
            Type
        </th>
        <th>
            Option
        </th>
    </tr>

<?php
require "configimg.php";
$query = " select * from akun";
$result = mysqli_query($db, $query);
$len = 1;
while ($dataakun = mysqli_fetch_assoc($result)) {
?>

    <tr class="datarow">
        <td>
            <?php echo $dataakun['username']; ?>
        </td>
        <td>
            <?php echo $dataakun['account']; ?>
        </td>
        <td>
            <?php echo $dataakun['name']; ?>
        </td>
        <td>
            <?php echo $dataakun['birth']; ?>
        </td>
        <td>
            <img src="asset/<?php echo $dataakun['photo']; ?>" width="100px" height="100px">
        </td>
        <td>
            <?php echo $dataakun['tipe']; ?>
        </td>
        <td>
            <a href="editacc.php?id=<?=$dataakun['id']?>" class="buttondata U">Edit</a>
            <a href="deleteacc.php?id=<?=$dataakun['id']?>" class="buttondata U">Delete</a>
        </td>
    </tr>

<?php
$len += 1;
}	
?>
</table>
<br>

</div>
<a href="register.php" class="buttondata">Add News</a>

<script type="text/javascript" src="script.js">     
</script>
</body>
