<?php
//membutuhkan koneksi
require("../set.koneksi.php");

	$query2 = "select * from tbpenyisihan";
	$hasil2 = mysqli_query($link, $query2) or die("Kesalahan pada tabel peserta");
?>
<h3> HASIL PENYISIHAN ONLINE</h3>
  	<table border="1">
		<tr>
			<th>Nama Tim</th><th>Sekolah</th><th>Mulai</th><th>Selesai</th><th>Sisa Waktu</th><th>Status</th>
			<?php
			$nomor = 1 ;
			while ( $nomor < 101) {
			 	echo "<th>".$nomor."</th>";
			 	$nomor++;
			 } 
			?>
		</tr>
    	<?php
		
		while ($row = mysqli_fetch_array($hasil2))
		{
		$future=		strtotime($row['selesai']);
		$current=		time();
		$beda=			$future - $current;
			if ($beda < 0) {
			$tampil = 'habis';
		} else {
			$menit= 		floor($beda/60);
			$jam=			floor($beda/3600);
			$r_menit=		floor(($beda-($jam*3600))/60);
			$r_detik=		floor($beda-($menit*60));
		
			$tampil =  '<b>'.$jam.'</b>' .':'.'<b>'.$r_menit.'</b>'.':'.'<b>'.$r_detik.'</b>' ;
		};
		?>
        	  	<tr>
			      	<td><?php echo $row['namatim'] ?></a></td>
			      	<td><?php echo $row['sekolah'] ?></a></td>
	              		<td><?php echo $row['mulai'] ?></a></td>
	             		<td><?php echo $row['selesai'] ?></a></td>
	             		<td><?php echo $tampil ?></a></td>
	             		<td><?php echo $row['sudah'] ?></a></td>
	              		<?php
				$nomor = 1 ;
				while ( $nomor < 101) {
				 	echo "<td>".$row[$nomor]."</td>";
				 	$nomor++;
				 } 
			?>
			</tr>
        <?php
		}
	?> 
    	</table>
<?php
	//pembuatan kunci
		$query3 = "select * from tbkunci";
		$hasil3 = mysqli_query($link, $query3) or die("Kesalahan pada tabel peserta");
		$nomor = 0 ;
		$jawaban ='';

		$arraykunci = array();


		// while example
		while ($row3 = mysqli_fetch_array($hasil3)) {
	   	 	$arraykunci[] = $row3['pertanyaan'];
		} ?>

<h3> TABEL KUNCI</h3>
<table border="1">
		<tr>
			<th>KUNCI</th><th>Status</th>
			<?php
			$nomor = 1 ;
			while ( $nomor < 101) {
			 	echo "<th>".$nomor."</th>";
			 	$nomor++;
			 } 
			?>
		</tr>
        	  	<tr>
			      		<td>kunci</td>
	             		<td>oke</td>
	              		<?php
						$nomor = 1 ;
						$nomorkunci = 0;
						while ( $nomor < 101) {
						 	echo "<td>".$arraykunci[$nomorkunci]."</td>";
						 	$nomor++;
						 	$nomorkunci++;
						 } 
						?>
			</tr>
    	</table>

		<?php
	//habis pembuatan kunci


//---------------------------------------------------------------------------------//

	//coba diproses
		$query2 = "select * from tbpenyisihan";
		$hasil2 = mysqli_query($link, $query2) or die("Kesalahan pada tabel peserta");
?>
<h3> TABEL POIN</h3>
<table border="1">
		<tr>
			<th>Nama Tim</th><th>Sekolah</th><th>Status</th>
			<?php
			$nomor = 1 ;
			while ( $nomor < 101) {
			 	echo "<th>".$nomor."</th>";
			 	$nomor++;
			 } 
			?>
			<th>Jumlah</th>
		</tr>
    	<?php
		
		while ($row = mysqli_fetch_array($hasil2))
		{
		?>
        	  	<tr>
			      	<td><?php echo $row['namatim'] ?></a></td>
			      	<td><?php echo $row['sekolah'] ?></a></td>
	             		<td><?php echo $row['sudah'] ?></a></td>
	              		<?php
						$nomor = 1 ;
						$nomorkunci = 0;
						$jumlah = 0;
						while ( $nomor < 101) {
						 	if ($row[$nomor]== $arraykunci[$nomorkunci]) {
						 		//jika benar
						 		echo '<td> 4 </td>';
						 		$jumlah = $jumlah + 3 ;
						 	} else if ($row[$nomor]==''){ 
						 		//jika kosong
						 		echo "<td> 0 </td>";
						 		$jumlah = $jumlah + 0 ;
						 	} else if ($row[$nomor]=='X'){ 
						 		//jika kosong lagi
						 		echo "<td> 0 </td>";
						 		$jumlah = $jumlah + 0 ;
						 	} else { 
						 		//jika salah
						 		echo "<td> -1 </td>";
						 		$jumlah = $jumlah - 1 ; }
						 	$nomor++;
						 	$nomorkunci++;
						 	};
						 
				?>
				<td><?php echo $jumlah;  ?></td>
			</tr>
        <?php
		}
	?> 
    	</table>
