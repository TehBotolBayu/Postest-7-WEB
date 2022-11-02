<?php
error_reporting(0);

$server = 'localhost';
$username = 'root';
$password = '';
$db_image = 'gambar';
 
$msg = "";
 
$db = mysqli_connect($server, $username, $password, $db_image);

if(!$db){
    die("gagal terhubung");
}
?>