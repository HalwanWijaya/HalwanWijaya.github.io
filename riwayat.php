<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<title>riwayat</title>

	<!-- FONT -->
	<link rel="preconnect" href="https://fonts.googleapis.com" />
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
	<link href="https://fonts.googleapis.com/css2?family=Rubik:ital,wght@0,300..900;1,300..900&display=swap"
		rel="stylesheet" />

	<link rel="stylesheet" href="css/reset.css" />
	<link rel="stylesheet" href="css/font.css" />
	<link rel="stylesheet" href="css/navigasi.css" />
	<link rel="stylesheet" href="css/footer.css" />
	<link rel="stylesheet" href="css/riwayat.css" />
</head>

<body>
	<nav class="navigasi mode2">
		<div class="menu">
			<a href="index.php">
				<img src="img/home-icon.png" alt="" />
				<p>Beranda</p>
			</a>
			<a href="pesan.php">
				<img src="img/shopping-icon.png" alt="" />
				<p>Pesan</p>
			</a>
			<a href="riwayat.php">
				<img src="img/note-icon.png" alt="" />
				<p>Riwayat</p>
			</a>
		</div>
	</nav>

	<header>
		<h1>Riwayat Pemesanan</h1>
	</header>

	<main>
		<h1 id="judull"></h1>
		<div class="container">
			<!-- MENGAMBIL DARI KOMPONEN DAFTAR RIWAYAT PEMESANAN LEWAT JAVASCRIPT -->
		</div>
	</main>

	<div class="delete-confirm">
		<div class="box">
			<div class="deskripsi">
				<p>Menghapus pesanan atas nama :</p>
				<p id="nama-aktif"></p>
				<p>yakiin?</p>
			</div>
			<div class="tombol-grup">
				<button class="batal-delete" name="batal-delete">batal</button>
				<button id="delete" name="del">delete</button>
			</div>
		</div>
	</div>


	<form action="" method="post" id="form-edit">
		<div class="box-edit">
			<section class="pemesanan">
				<input type="text" name="id" id="id" hidden>
				<div class="nama">
					<label for="nama">Nama Pemesan :</label>
					<input type="text" name="nama" id="nama" placeholder="Nama Anda" required>
				</div>
				<div class="nomer">
					<label for="nomer">Nomer Telp/HP :</label>
					<input type="text" name="nomer" id="nomer" placeholder="0819 1234 XXXX" required>
				</div>
				<div class="tanggal">
					<label for="tanggal">Waktu Pelaksanaan perjalanan :</label>
					<input type="date" name="tanggal" id="tanggal" placeholder="dd / mm / yyyy" required>
				</div>
				<div class="jumlah-peserta">
					<label for="jumlah-peserta">Jumlah Peserta :</label>
					<input type="number" name="jumlah-peserta" id="jumlah-peserta" placeholder="contoh : 5">
				</div>
				<div class="pelayanan">
					<label>Pelayanan Paket perjalanan :</label>
					<label class="penginapan" for="penginapan">
						<input type="checkbox" name="penginapan" id="penginapan">
						<span class="checkmark"></span>
						<label for="penginapan">Penginapan</label>
					</label>
					<label class="transportasi" for="transportasi">
						<input type="checkbox" name="transportasi" id="transportasi">
						<span class="checkmark"></span>
						<label for="transportasi">Transportasi</label>
					</label>
					<label class="konsumsi" for="konsumsi">
						<input type="checkbox" name="konsumsi" id="konsumsi">
						<span class="checkmark"></span>
						<label for="konsumsi">Makanan</label>
					</label>
				</div>
			</section>

			<section class="tombol">
				<div class="container">
					<div class="atas">
						<button type="submit" class="edit">edit</button>
						<button type="reset" class="batal-edit">batal</button>
					</div>
				</div>
			</section>
		</div>
	</form>



	<footer>
		<div class="nav">
			<a href="index.php">HOME</a>
			<a href="pesan.php">SHOP</a>
			<a href="riwayat.php">HISTORY</a>
		</div>
		<div class="copyright">
			<p>&copy; 2024 HalwanWijaya</p>
		</div>
	</footer>

	<script src="javascript/jquery.js"></script>
	<script src="javascript/edit-delete.js"></script>
</body>

</html>