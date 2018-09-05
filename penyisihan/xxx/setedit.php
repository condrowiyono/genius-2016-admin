<?php
	$soal = $_POST['content'];
	require("../../set.koneksi.php");
	$query2 = "update tbkunci set
				pertanyaan 			= '".$soal."'
				where indeks 		='".$_POST['nomor']."'";
		$hasil= mysqli_query($link, $query2) or die("Kesalahan pada query!");	
	if ($hasil) {
		header('location:index.php');
	} else {
		echo "gagal";
	}
?>