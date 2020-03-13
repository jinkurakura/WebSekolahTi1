<?php 

require_once 'koneksi.php';
$query = mysqli_query($koneksi, "SELECT * FROM tbl_artikel");
$aktif = 'artikel';
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Daftar Artikel - SLB C1 YPAC SEMARANG</title>
	<link rel="stylesheet" href="resources/fonts/stylesheet.css">
	<link rel="stylesheet" href="resources/css/bootstrap.min.css">
	<link rel="stylesheet" href="resources/css/style.css">
</head>
<body>
	<div class="container bg-light">
		<!-- top bar -->
		<div class="logo clearfix">
			<div class="float-left mt-3 mb-3">
				<div class="text float-right">
					<img src="resources/images/logo.png" alt="Logo Sekolah" width="100px" class="float-left mr-3">
					<span class="smk">SLB C1 YPAC SEMARANG</span><br>
					<span class="visi">TERWUJUDNYA PELAYANAN OPTIMAL BAGI ANAK YANG BEKEBUTUHAN KHUSUS YANG BERTAQWA MANDIRI TERAMPIL BERBUDI LUHUR BERBUDAYA SERTA CINTA DAMAI</span>
				</div>
			</div>
		</div>
			
		<!-- nav bar -->
		<?php require_once 'navbar.php'; ?>
		<br>
		<!-- content -->
		<div class="row p-3">
			<div class="col-md-8">
				<div class="title mb-3">
					Artikel Terbaru
				</div>
				<?php while($artikel = mysqli_fetch_assoc($query)) : ?>
				<div class="artikel">
					<div class="info">
						<div class="post mb-2">
							<span class="tgl"><?= date('d M y', strtotime($artikel['tanggal'])) ?></span>
							<span class="judul"><a href="detail_artikel.php?id=<?= $artikel['id'] ?>"><?= $artikel['judul'] ?></a></span>
						</div>
					</div>
					<div class="detail">
						<div class="clearfix" style="text-align: justify;">
							<img src="images/artikel/<?= $artikel['foto'] ?>" alt="" width="200px" class="float-left mr-2">
							<?= substr($artikel['isi'], 0, 150) . '...' ?>
						</div>
					</div>
					<hr>
				</div>
				<?php endwhile; ?>
			</div>
			<?php require_once 'sidebar.php'; ?>
		</div>
		<div class="text-white footer">
			2020 © Copyright by Web Developer
		</div>
	</div>

	<script src="resources/js/jquery.js"></script>
	<script src="resources/js/bootstrap.min.js"></script>
</body>
</html>