<?php
$soal = $_POST['content'];
$indeks = $_POST['nomor'];
require("../../set.koneksi.php");
		$query2 = "INSERT INTO tbkunci(indeks, pertanyaan) VALUES (
				'".$indeks."',
				'".$soal."')";
		$hasil= mysqli_query($link, $query2) or die("Kesalahan pada query!");		
if ($hasil)
			{header("location:index.php");				
			}
?>