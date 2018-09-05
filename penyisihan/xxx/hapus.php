<?php 
require("../../set.koneksi.php");
$nomor=$_GET["indeks"]; 
$query="delete FROM tbkunci Where indeks='$nomor'"; 
$hasil = mysqli_query($link, $query) or die("Gagal!");	
header('location:index.php');
?>