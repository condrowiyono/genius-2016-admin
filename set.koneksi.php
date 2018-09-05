<?php
     $server = "localhost";
     $username = "root"; 
     $password = "root"; 
     $db = "genius-2016";
	 $port = 3308;
	 $link = mysqli_connect($server, $username, $password, $db, $port)
	         or die("Salah server, nama pengguna, atau passwordnya!");
?>