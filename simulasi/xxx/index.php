<!-- LAST UPADATE BY 03/1/2016  16:48 
penambahan fitur seperti :
o buat soal mandiri
o indeks yang auto increasement
o text area dengan ckeditor ( ckeditor nya baik banget)
o saol dan jawaban langsung dimuat

20:58
o ditambah fitur edit 
o hapus
-->
<!DOCTYPE html>
<html>
	<head>
	<!-- deifinisikan karakter set -->
	<meta charset="utf-8">

	<!-- deifinisikan viewport, fitur baru di html5 biar bisa responsive -->
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!-- definisikan favicon -->
	<link rel="bookmark" href="favicon_16.ico"/>

	<!-- definisikan deskripsi dari website -->
	<meta name="description" content="Penyisihan GENIUS 2016">
	<meta name="author" content="OSIS SMAN SBBS - ALUMNI">

	<!-- definisikan judul -->
	<title>	GENIUS 2016 | BUAT SOAL</title>

	<!-- definisikan stylesheet / CSS -->
	<link rel="stylesheet" type="text/css" href="../../alat/gaya.css">

	<!-- little javascript untuk menampilkan editor soals -->
	</head>
<body>
<!-- JUDUL -->
<div class="judul" id="judul">
	XXX
</div>

<!-- TIKET / LANDING PAGENYA -->
<div class="section group">
	<div class="tiket">

		<!-- CODE HERE -->
		<?php require("../../set.koneksi.php");?>
		<div class="judul">KUNCI</div>
		<div class="isi">
		<form action="setbuat.php" method="POST">
		<div>
			<div>
				<?php 
				require("../../set.koneksi.php");
				$query2 = "SELECT indeks FROM tbkuncisimulasi";
				$hasil= mysqli_query($link, $query2) or die("Kesalahan pada query!");
				$barisdata = mysqli_fetch_array($hasil);
				$nomor = mysqli_num_rows($hasil) ;
				$nomor++ ;
				?>
				<label>Nomor Soal</label>
				<input type="text" name="nomor" id="nomor" value="<?php echo $nomor ?>"> 
			</div>
				<!-- EDITOR SOAL -->
	      		<h2>KUNCI</h2>
	      		<input id="contenteditor" name="content" id="content" rows="12" />
			<button type="submit" class="tombol"> Simpan </button>
		</div>	

		</form>
		</div>
		<!-- END HERE -->
	</div>

	<!-- BARU DITAMBAHKAN 20:08 2/1/2016 -->
	<div id="tampilkan" class="tiket">
		<div class="judul" >DAFTAR PERTANYAAN</div>
		<div class="isi">
			<?php 
			require("../../set.koneksi.php");
				$query2 = "SELECT * from tbkuncisimulasi";
				$hasil= mysqli_query($link, $query2) or die("Kesalahan pada query!");
				while ($row = mysqli_fetch_array($hasil)) {
			?>
				<table>
					<tr>
						<td><?php echo $row['indeks']; ?></td>
						<td><a href="edit.php?indeks=<?php echo $row['indeks']; ?>" >[Lihat/Edit]</a></td>
						<td><a onClick="return confirm('Anda yakin akan menghapus?')" href="hapus.php?indeks=<?php echo $row['indeks']; ?>">Hapus</a></td>
					</tr>
				</table>
			<?php					
						}		
			?>
		</div>
	</div>
</div>

<!-- FOOTER -->
<div class="section group">
	<div class="col u12">
		<a href="#judul">
		<div class="naik">
		^
		</div>
		</a>
	</div>
</div>

</body>
</html>