<?php
error_reporting(0);
session_start();
require("set.koneksi.php");
$query = "select * from tbadmin where username='".$_SESSION['username']."' and password='".$_SESSION['password']."'";
$hasil  = mysqli_query($link, $query) or die("Kesalahan pada tabel admin!");		
$barisdata = mysqli_fetch_array($hasil);

//ambil database peserta
$query2 = "select * from tbpeserta";
$hasil2 = mysqli_query($link, $query2) or die("Kesalahan pada tabel peserta");
//cek
if ($_SESSION['statusLogin'] =="1")
{	echo 'username,password,firstname,lastname,email'.'<br>';

	while ($row = mysqli_fetch_array($hasil2))
		{
		 if ($row['namatim']=='') { echo 'kosong,';} else { echo $row['namatim'].',';};
		 if ($row['password']=='') { echo 'kosong,';} else { echo $row['password'].',';};
		 if ($row['namatim']=='') { echo 'kosong,';} else {echo $row['namatim'].',';};
		 if ($row['sekolahasal']=='') { echo 'kosong,';} else { echo $row['sekolahasal'].',';};
		 if ($row['email']=='') { echo 'kosong';} else {echo $row['email'];};
     		 echo '<br>';
     		};
     	}	else
     		{
     			header('Location:login.php');
    		};
?>