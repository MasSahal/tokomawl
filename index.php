<?php 
session_start();
//koneksi ke database
include 'koneksi.php';
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Mawl Shop</title>
	<link rel="stylesheet" type="text/css" href="admin/assets/css/bootstrap.css">
</head>
<body>
	<!-- navbar --> 
<nav class="navbar navbar-default">
	<div class="container">
	<ul class="nav navbar-nav">
		<li><a href="index.php">Home</a></li>
				<li><a href="keranjang.php">Keranjang</a></li>
		<li><a href="checkout.php">Checkout</a></li>
		<!--  	jika sudah login(ada session pelanggan) -->
		<?php if (isset($_SESSION["pelanggan"])): ?>
			<li><a href="riwayat.php">Riwayat Belanja</a></li>
			<li><a href="logout.php">Logout</a></li>
		<!-- selain itu (blm login||blm ada session pelanggan) -->
		<?php else: ?>
			<li><a href="login.php">Login</a></li>
			<li><a href="daftar.php">Daftar</a></li>
		<?php endif ?>	
	</ul>
	<form action="pencarian.php" method="get" class="navbar-form navbar-right">
		<input type="text" name="keyword" class="form-control">
		<button class="btn btn-primary">Cari</button>
	</form>	
	</div>
</nav>
<!-- konten -->
<section class="konten">
		<div class="container">
			<h1>Produk Terbaru</h1>
			<div class="row">
				<?php $ambil = $koneksi->query("SELECT * FROM produk"); ?>
				<?php while($perproduk = $ambil->fetch_assoc()){ ?>
				<div class="col-md-3">
					<div class="thumbnail">
						<img src="foto_produk/<?php echo $perproduk['foto_produk']; ?>">
						<div class="caption">
							<h3><?php echo $perproduk['nama_produk']; ?></h3>
							<h5>Rp. <?php echo number_format($perproduk['harga_produk']) ; ?></h5>
							<a href="beli.php?id=<?php echo $perproduk["id_produk"]; ?>" class="btn btn-primary">Beli</a>
							<a href="detail.php?id=<?php echo $perproduk["id_produk"]; ?>" class="btn btn-default">Detail</a>
						</div>
					</div>
				</div>
				<?php } ?>
			</div>
		</div>
</section>

</body>
</html>