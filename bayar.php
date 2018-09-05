<?php 
require("set.koneksi.php");
$email=$_GET["email"];
//dapatkan datanya dulu
$query="select * FROM tbpeserta Where email='$email'";
$hasil = mysqli_query($link, $query) or die("Gagal!");
$barisdata = mysqli_fetch_array($hasil);
if (($barisdata['sudah']=='belum') or ($barisdata['sudah']==''))
	{ $bayar = 'sudah';	
	} else
	{ $bayar = 'belum';}
	    $query1 = "update tbpeserta set
				sudah     			='".$bayar."'
				where email   		='".$email."'" ;
 
$hasil1 = mysqli_query($link, $query1) or die("Gagal!");	
header('location:set.cari.php');
?>