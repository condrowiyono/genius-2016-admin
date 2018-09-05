<?php
	session_start();
	require("set.koneksi.php");
	$email = $_POST['email']; 
	$password = $_POST['password']; 
	$query = "select username, password from tbadmin where username='$email' and password='$password'";
	$hasil = mysqli_query($link, $query) or die("Kesalahan pada query!");		
	$count = mysqli_num_rows($hasil);
	$barisdata = mysqli_fetch_array($hasil);
	if($count==1)
		{
		$_SESSION['username'] = $barisdata[username];
		$_SESSION['password'] = $barisdata[password];
		$_SESSION['statusLogin'] = 1;
		header("location:index.php");
		} else 
		{
		$_SESSION['statusLogin'] = 0;
		{
		header("location:login.php");
		}
		}
	mysqli_free_result($hasil);	  
?>