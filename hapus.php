<?php 
require("set.koneksi.php");
$email=$_GET["email"]; 
$query="delete FROM tbpeserta Where email='$email'"; 
$hasil = mysqli_query($link, $query) or die("Gagal!");	
header('location:set.cari.php');
?>