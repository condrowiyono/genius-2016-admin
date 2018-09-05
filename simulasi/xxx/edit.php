<!-- LAST UPADATE BY 03/1/2016  16:48 
penambahan fitur seperti :
o buat soal mandiri
o indeks yang auto increasement
o text area dengan ckeditor ( ckeditor nya baik banget)
o saol dan jawaban langsung dimuat

LAST UPADATE BY 03/1/2016  20:58 
penambahan fitur seperti :
o ini fitur edit
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

	<!-- little javascript -->
	</head>
<body>
<!-- JUDUL -->
<div class="judul" id="judul">
	PENYISIHAN ONLINE GENIUS 2016
</div>

<!-- TIKET / LANDING PAGENYA -->
<div class="section group">
	<div class="tiket">

		<!-- CODE HERE -->
		<?php require("../../set.koneksi.php");?>
		<div class="judul">EDIT XXX</div>
		<div class="isi">
		<form action="setedit.php" method="POST">
		<div>
			<div>
				<?php 
				$indek = $_GET['indeks'];
				require("../../set.koneksi.php");
				$query2 = "SELECT * FROM tbkuncisimulasi where indeks like ".$indek;
				$hasil= mysqli_query($link, $query2) or die("Kesalahan pada query!");
				$barisdata = mysqli_fetch_array($hasil);
				$nomor = $barisdata['indeks'];
				$pertanyaan = $barisdata['pertanyaan'];
				?>
				<label>Nomor Soal</label>
				<input type="text" name="nomor" id="nomor" value="<?php echo $nomor; ?>"> 
			</div>
				<!-- EDITOR SOAL -->
	      		<h2>KUNCI</h2>
	      		<textarea id="contenteditor" name="content" id="content" rows="12">
	      		<?php echo $pertanyaan; ?>
              	</textarea>
			<button class="tombol" type="submit"> Simpan </button>
		</div>	

		</form>

		<!-- END HERE -->
		<br />
		<a class="tombol" href="index.php"> Kembali </a>
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