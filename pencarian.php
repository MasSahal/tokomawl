<?php 
include 'koneksi.php';
 ?>
 <?php $keyword = $_GET["keyword"]; 

$semuadata=array();
$ambil = $koneksi->query("SELECT * FROM produk WHERE nama_produk LIKE '%$keyword%' OR deskripsi_produk LIKE '%$keyword%'");
while ($pecah = $ambil->fetch_assoc()) 
{
	$semuadata[]=$pecah;
}
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>login</title>
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
		<div class="container">
			<h3>Hasil Pencarian : <?php echo $keyword ?></h3>

			<?php if (empty($semuadata)): ?>
				<div class="alert alert-danger">Produk <strong><?php echo $keyword ?></strong> Tidak Ditemukan</div>
			<?php endif ?>

			<div class="row">

				<?php foreach ($semuadata as $key => $value): ?>
				<div class="col-md-3">
					<div class="thumbnail">
						<img src="foto_produk/<?php echo $value["foto_produk"] ?>" alt="" class="img-responsive">
						<div class="caption">
						<h3><?php echo $value["nama_produk"] ?></h3>
						<h5>Rp. <?php echo number_format($value['harga_produk']) ?></h5>
						<a href="beli.php?id=<?php echo $value["id_produk"]; ?>" class="btn btn-primary">Beli</a>
						<a href="detail.php?id=<?php echo $value["id_produk"]; ?>" class="btn btn-default">Detail</a>
					</div>
					</div>
				</div>
			<?php endforeach ?>
			</div>
		</div>
</body>
</html>