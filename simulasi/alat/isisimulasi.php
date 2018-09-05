<?php
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));

    error_reporting(0);

    //membutuhkan koneksi
    require("../../set.koneksi.php");

	$query2 = "select * from tbsimulasi";
	$hasil2 = mysqli_query($link, $query2) or die("Kesalahan pada tabel peserta");    

?>

    <div class="table-responsive">
  	<table class="table table-hover">
  	<thead>
		<tr>
			<th>Nama Tim</th><th>Mulai</th><th>Selesai</th><th>Sisa Waktu</th><th>Status</th><th>Hapus</th>
		</tr>
	</thead>
	<tbody>
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
	              		<td><?php echo $row['mulai'] ?></a></td>
	             		<td><?php echo $row['selesai'] ?></a></td>
	             		<td><?php echo $tampil ?></a></td>
	             		<td><?php echo $row['sudah'] ?></a></td>
	              		<td><a onClick="return confirm('Anda yakin akan menghapus?')" href="simulasihapus.php?email=<?php echo $row['email'] ?>">Hapus</a></td>	
			</tr>
        <?php
		}
	?> 
    	</tbody>
    	</table>
    </div>
