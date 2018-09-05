<?php
error_reporting(0);
session_start();
require("set.koneksi.php");
$query = "select * from tbadmin where username='".$_SESSION['username']."' and password='".$_SESSION['password']."'";
$hasil  = mysqli_query($link, $query) or die("Kesalahan pada tabel admin!");		
$barisdata = mysqli_fetch_array($hasil);
 
// just to escape undesirable characters
$name = $_POST["name"];
//ambil database peserta
$query2 = "select * from tbpeserta where namatim like '%$name%'";
$hasil2 = mysqli_query($link, $query2) or die("Kesalahan pada tabel peserta");
//cek
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
    <link href='https://fonts.googleapis.com/css?family=Source+Sans+Pro' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link href="css/global.css" rel="stylesheet">
	<script src="js/jquery-1.11.3.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/bootbox.min.js"></script>
    <script src="sweetalert-master/dist/sweetalert-dev.js"></script>
  	<link rel="stylesheet" href="sweetalert-master/dist/sweetalert.css">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <!-- fungsi pada disini -->
      <!--hapus -->
	  <!-- lihat -->
          
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
    <li   class="active" >
      <a href="peserta.php"><span class="glyphicon glyphicon-user"></span><span class="link-text">Daftar Peserta</span></a>
    </li>
    <li  >
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
		<h1>Daftar Peserta GENIUS 2016</h1>
	</div>
	    <div >
    <p>Daftar Peserta Penyisihan GENIUS 2016<a href="set.cari.php">[Tampilkan Semua]</a></p>
    <div class="form-horizontal"> 
        <form name="cari" id="cari" method="post" action="set.cari.php">
        <div class="input-group">
          <input name="name" id="name" type="text" class="form-control" placeholder="Cari . . .">
          <span class="input-group-btn">
          <button class="btn btn-default" type="submit">Cari</button>
          </span>
    </div><!-- /input-group -->
    </form>
    </div>
    <div class="table-responsive">
  	<table class="table table-hover">
  	<thead>
	<tr>
	<th>Nama Tim</th><th>Asal Sekolah</th><th>Jalur Penyisihan</th><th>Bukti Transfer</th><th>Konfirmasi</th><th>Hapus</th></tr>
	</thead>
	<tbody>
    <?php
	if( empty( $name )){
    // this will be displayed if search value is blank
    //menampilkan
		while ($row = mysqli_fetch_array($hasil2))
		{?>
		      <tr onClick="javascript:window.location='lihat.php?email=<?php echo $row['email']?>'">
              <td><?php echo $row['namatim'] ?></a></td>
              <td><?php echo $row['sekolahasal'] ?></a></td>
              <td><?php echo $row['jalurpenyisihan'] ?></a></td>
        	  <td><a href="<?php echo "../account/".$row['buktitransfer']?>"class="h5"><?php echo $row['buktitransfer'] ?></a></td>
			  <td><a onClick="return confirm('Anda yakin akan mengganti data pembayaran?')" href="bayar.php?email=<?php echo $row['email'] ?>"><?php echo $row['sudah'] ?></a></td>
              <td><a onClick="return confirm('Anda yakin akan menghapus?')" href="hapus.php?email=<?php echo $row['email'] ?>">Hapus</a></td>		
			  </tr>
        <?php
}}
	else{	
		while ($row = mysqli_fetch_array($hasil2))
		{?>
        	  <tr onClick="javascript:window.location='lihat.php?email=<?php echo $row['email']?>'">
		      <td><?php echo $row['namatim'] ?></a></td>
              <td><?php echo $row['sekolahasal'] ?></a></td>
              <td><?php echo $row['jalurpenyisihan'] ?></a></td>
        	  <td><a href="<?php echo "../g16/".$row['buktitransfer']?>"class="h5"><?php echo $row['buktitransfer'] ?></a></td>
			  <td><a onClick="return confirm('Anda yakin akan mengganti data pembayaran?')" href="bayar.php?email=<?php echo $row['email'] ?>"><?php echo $row['sudah'] ?></a></td>
              <td><a onClick="return confirm('Anda yakin akan menghapus?')" href="hapus.php?email=<?php echo $row['email'] ?>">Hapus</a></td>	
			  </tr>
        <?php
		}}
	?> 
    </tbody>
    </table>
    </div>
    
    </div>
</div>  
  </body>
</html>
<?php
     }
     else
     {
     header('Location:login.php');
     }
?>
