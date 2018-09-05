<?php
error_reporting(0);
session_start();
require("set.koneksi.php");
$query = "select * from tbadmin where username='".$_SESSION['username']."' and password='".$_SESSION['password']."'";
$hasil = mysqli_query($link, $query) or die("Kesalahan pada query 2!");		
$barisdata = mysqli_fetch_array($hasil);
if ($_SESSION['statusLogin'] =="1")
{
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="bookmark" href="favicon_16.ico"/>
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="Web GENIUS 2016">
    <meta name="author" content="OSIS SBBS dan ANTARES (c) 2015">
    <title>GENIUS 2016</title>
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/global.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Source+Sans+Pro' rel='stylesheet' type='text/css'>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
<nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container-fluid">
    <div class="navbar-header">
    <h3 style="color:#FFFFFF">Halaman Administrasi GENIUS 2016</h3>
    </div>
  </div>
</nav>
<div class="sidebar">
  <ul class="nav nav-sidebar">
    <li >
      <a href="index.php"><span class="glyphicon glyphicon-home"></span><span class="link-text">Beranda</span></a>
    </li>
    <li  >
      <a href="peserta.php"><span class="glyphicon glyphicon-user"></span><span class="link-text">Daftar Peserta</span></a>
    </li>
    <li   class="active" >
      <a href="tes.php"><span class="glyphicon glyphicon-tasks"></span><span class="link-text">Tes Online</span></a>
    </li>
    <li >
      <a href="tentang.php"><span class="glyphicon glyphicon-phone"></span><span class="link-text">Tentang</span></a>
    </li>
  </ul>

  <ul class="nav nav-sidebar right">
    <li><a href="set.logout.php"><span class="glyphicon glyphicon-log-out"></span><span class="link-text">Logout</span></a></li>
  </ul>
</div>
<div class="page-container-full" style="margin:20px;">
	<div class="page-header">
		<h1>Tes Online GENIUS 2016</h1>
	</div>
	    <div >
    <p>Penyisihan GENIUS 2016</p>
    <div class="table-responsive">
  	<table class="table table-hover">
  	<thead>
	<tr>
	<th>Nama Tes</th><th>Monitor</th><th>Link</th></tr>
	</thead>
	<tbody>
    <tr><td>Simulasi Penyisihan Online GENIUS 2016</td><td><a href="simulasi/simulasi.php">Monitor</a></td><td><a href="simulasi/export.php">Hasil</a></td></tr>
    <tr><td>Penyisihan Online GENIUS 2016</td><td><a href="penyisihan">Monitor</a></td><td><a href="penyisihan/export.php">Hasil</a></td></tr>
    <tr><td>Kuisioner GENIUS 2016</td><td>Monitor</td><td>Hasil</td></tr>
    </tbody>
    </table>
    </div>
    
    </div>
</div>  
	<script src="/js/jquery-1.11.3.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>
  </body>
</html>
<?php
     }
     else
     {
     header('Location:login.php');
     }
?>