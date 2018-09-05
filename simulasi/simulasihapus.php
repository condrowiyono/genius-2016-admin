<?php 
require("../set.koneksi.php");
$email=$_GET["email"]; 
$query="delete FROM tbsimulasi Where email='$email'"; 
$hasil = mysqli_query($link, $query) or die("Gagal!");	
header('location:simulasi.php');
?>