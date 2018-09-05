<?php 
require("../set.koneksi.php");
$email=$_GET["email"]; 
$query="delete FROM tbpenyisihan Where email='$email'"; 
$hasil = mysqli_query($link, $query) or die("Gagal!");	
header('location:penyisihan.php');
?>