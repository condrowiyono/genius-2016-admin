<?php 
require("../../set.koneksi.php");
$nomor=$_GET["indeks"]; 
$query="delete FROM tbkuncisimulasi Where indeks='$nomor'"; 
$hasil = mysqli_query($link, $query) or die("Gagal!");	
header('location:index.php');
?>