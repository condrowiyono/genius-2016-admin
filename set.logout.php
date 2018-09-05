<?php
	session_start();
		unset($_SESSION['email']);
		unset($_SESSION['password']);
		$_SESSION['statusLogin'] = 0;
	header("location:index.php");
?>