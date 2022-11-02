<?php
session_start();
if($_SESSION['tipe'] == 'null' || $_SESSION['tipe'] == 'user'){
    header('Location: index.php');
}

    require "configimg.php";


    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $query = "delete from akun where id='$id'";
        $result = mysqli_query($db, $query);
    
        if($result){
            echo "<script>
                alert('DATA TERHAPUS!');
                document.location.href = 'index.php'
                </script>";
        } else {
            echo "<script>alert('DATA GAGAL TERHAPUS')</script>";
        }
    
    }
    header('Location: admin_data.php')
?>