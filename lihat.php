<?php
error_reporting(0);
session_start();
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
<?php
require("set.koneksi.php");
$email = $_GET["email"]; 
$query = "select * FROM tbpeserta where email='$email'"; 
$hasil = mysqli_query($link, $query) or die("Gagal!");	
$barisdata = mysqli_fetch_array($hasil);
?>
<!-- Modal -->
<div>
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <a href="javascript:history.back(0)" type="button" class="btn btn-default close">Kembali</a>
        <h4 class="modal-title"><center><?php echo $barisdata['namatim']?>'s Profile</center></h4>
      </div>
      <div class="modal-body">
            <div class="row">
            <div class="col-sm-3">
            <div style="background: url('../account/<?php echo $barisdata['poto'] ?>') repeat scroll center center / cover #aaa; padding-bottom:100%;"></div> 
            </div>
            <div class="col-sm-3">
            <h2><?php echo $barisdata['namatim'] ?></h2>
            <span class="field-header">KAPAN MENDAFTAR</span>
            <p><?php echo $barisdata['timestamp'] ?></p>
            <span class="field-header">INFORMASI AKUN</span>
			<br>Email    :<?php echo $barisdata['email'] ?>
            <br>Password :<?php echo $barisdata['password'] ?>
            <br><span class="field-header">ASAL SEKOLAH</span>
            <p><?php echo $barisdata['sekolahasal'] ?> - <?php echo $barisdata['notelpsekolah'] ?></p>
            <span class="field-header">PENDAMPING</span>
            <p><?php echo $barisdata['gurunama'] ?> - <?php echo $barisdata['gurutelp'] ?></p>
            <span class="field-header">ANGGOTA</span>
            <br>1. <?php echo $barisdata['satunama'] ?> (<?php echo $barisdata['satugender'] ?>) - <?php echo $barisdata['satutelp'] ?>
            <br>2. <?php echo $barisdata['duanama'] ?> (<?php echo $barisdata['duagender'] ?>) - <?php echo $barisdata['duatelp'] ?>
            <br>3. <?php echo $barisdata['tiganama'] ?>(<?php echo $barisdata['tigagender'] ?>) - <?php echo $barisdata['tigatelp'] ?>
            </div>
            <div class="col-sm-3">
            <span class="field-header">JALUR PENYISIHAN</span>
            <p><?php echo $barisdata['jalurpenyisihan'] ?></p>
            <span class="field-header">BUKTI PEMBAYARAN</span>
            <p><?php echo $barisdata['buktitransfer'] ?><br />
            <div style="height:300px; width:400px;background: url('../account/<?php echo $barisdata['buktitransfer'] ?>') repeat scroll center center / cover #aaa;"> 
            </div>
            </p>
            
			<span class="field-header">STATUS PEMBAYARAN</span>
            <p><?php echo $barisdata['sudah'] ?></p>
        </div>
      </div>
      <div class="modal-footer">
        <a onClick="return confirm('Anda yakin akan menghapus?')" href="hapus.php?email=<?php echo $email ?>" type="button" class="btn btn-danger">Hapus Akun</a>
        <a onClick="return confirm('Anda mengubah data pembayaran?')" href="bayar.php?email=<?php echo $email ?>"  type="button" class="btn btn-primary">Konfirmasi Pembayaran</a>
      </div>
    </div>
  </div>
 </div>
</body>
</html>