<?php
    	//membutuhkan koneksi
    	require("../set.koneksi.php");

	$query2 = "select * from tbsimulasi";
	$hasil2 = mysqli_query($link, $query2) or die("Kesalahan pada tabel peserta");    

?>

  	<table>
		<tr>
			<th>Nama Tim</th><th>Sekolah</th><th>Mulai</th><th>Selesai</th><th>Sisa Waktu</th><th>Status</th>
			<?php
			$nomor = 1 ;
			while ( $nomor < 41) {
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
				while ( $nomor < 41) {
				 	echo "<td>".$row[$nomor]."</td>";
				 	$nomor++;
				 } 
			?>
			</tr>
        <?php
		}
	?> 
    	</table>
