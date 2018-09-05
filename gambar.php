 <?php 
 require("set.koneksi.php");
 $namatim = $_GET["roww"];
 $query0 = "select * from tbpeserta where namatim='$namatim'";
 $hasil0 = mysqli_query($link, $query0) or die("Kesalahan pada tabel peserta");		
 $barisdata0 = mysqli_fetch_array($hasil0);
 ?> 