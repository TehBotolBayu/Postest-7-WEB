<?php
session_start();
if($_SESSION['tipe'] == 'null'){
    header('Location: index.php');
}
require 'configimg.php';
$a = $_SESSION['akun'];

$query = " select * from akun where account = '$a'";
$result = mysqli_query($db, $query);
$dataprof = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>

<head>
	<title>Travel.ink</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="style.css">
	<link rel="stylesheet" href="profile.css">
</head>

<body id="beranda">
	<header>
		<div id="head">
			<input type="checkbox" id="toggle">
			<label for="toggle" id="sidebutton">&#9776;</label>
			<p id="judul">Travel.ink</p>
			<nav id="sidebar">
				<ul>
					<li><a href="#" class="q">Profil</a></li>
					<li><a href="web_user.php#beranda" class="q">Beranda</a></li>
					<li><a href="web_user.php#Destination" class="q">Destinasi</a></li>
					<li><a class="q">Dark Theme
						<input type="checkbox" id="switch" />
						<label id="lbl" for="switch">Toggle</label>
					</a></li>
				</ul>
			</nav>
		</div>
	</header>
    <h1 id="AboutMe" align="center">My Profile</h1>
    <div class="profile">
        <div class="profile-content">
            <div class="image">
                <img src="asset/<?php echo $dataprof['photo']; ?>">
            </div>
            <div class="icon">
            </div>
            <div class="identity">
                <table>
                    <tr>
                        <th>
                            Username 
                        </th>
                        <td>
                            : <?php echo $dataprof['username']; ?>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Account
                        </th>
                        <td>
                            : <?php echo $dataprof['account']; ?>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Name
                        </th>
                        <td>
                            : <?php echo $dataprof['name']; ?>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Date of Birth
                        </th>
                        <td>
                            : <?php echo $dataprof['birth']; ?>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
    <div id="n">
        <a href="editaccuser.php?id=<?=$dataprof['id']?>" style="text-decoration: none">
        <div id="edit">
            Edit
        </div>
        </a>
</div>
    <footer>

    </footer>
    <script type="text/javascript" src="script.js">
    </script>
</body>
    
