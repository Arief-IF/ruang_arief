<?php
require_once "konmysqli.php";
?>
<html>

<head>
	<!-- Basic Page Info -->
	<meta charset="utf-8">
	<title>RuangArief</title>

	<!-- Site favicon -->
	<link rel="apple-touch-icon" sizes="180x180" href="vendors/images/apple-touch-icon.png">
	<link rel="icon" type="image/png" sizes="32x32" href="vendors/images/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="16x16" href="vendors/images/favicon-16x16.png">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<!-- Google Font -->
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
	<!-- CSS -->
	<link rel="stylesheet" type="text/css" href="vendors/styles/core.css">
	<link rel="stylesheet" type="text/css" href="vendors/styles/icon-font.min.css">
	<link rel="stylesheet" type="text/css" href="src/plugins/jquery-steps/jquery.steps.css">
	<link rel="stylesheet" type="text/css" href="vendors/styles/style.css">

	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-119386393-1"></script>
	<script>
		window.dataLayer = window.dataLayer || [];
		function gtag(){dataLayer.push(arguments);}
		gtag('js', new Date());

		gtag('config', 'UA-119386393-1');
	</script>
</head>

<body class="login-page">
	<div class="login-header box-shadow">
		<div class="container-fluid d-flex justify-content-between align-items-center">
			<div class="brand-logo">
				<a href="?mnu=login">
					<img src="vendors/images/deskapp-logo1.jpg" alt="">
				</a>
			</div>
			<div class="login-menu">
				<ul>
					<li><a href="login.php">Login</a></li>
				</ul>
			</div>
		</div>
	</div>
<div class="login-wrap d-flex align-items-center flex-wrap justify-content-center">
		<div class="container">
			<div class="row align-items-center">
				<div class="col-md-6 col-lg-7">
					<img src="vendors/images/login-page-img.png" alt="">
				</div>
				<div class="col-md-6 col-lg-5">
					<div class="login-box bg-white box-shadow border-radius-10">
						<div class="login-title">
							<h2 class="text-center text-primary">Buat Akun</h2>
						</div>
						<form method="post">
							<div class="form-wrap max-width-600 mx-auto">
										<div class="form-group row">
											<label class="col-sm-4 col-form-label">Nama*</label>
											<div class="col-sm-8">
												<input required type="text" name="nama_siswa" class="form-control">
											</div>
										</div>
										
										<div class="form-group row">
											<label class="col-sm-4 col-form-label">Telepon*</label>
											<div class="col-sm-8">
												<input required type="text" name="telepon" class="form-control">
											</div>
										</div>
										
										<div class="form-group row">
											<label class="col-sm-4 col-form-label">Jurusan*</label>
											<div class="col-sm-8">
												<input required type="radio" name="jurusan" checked="checked" value="Teknik Komputer Jaringan"/>Teknik Komputer Jaringan <br>
												<input required type="radio" name="jurusan" value="Teknologi Laboratorium Medik"/>Teknologi Laboratorium Medik
											</div>
										</div>
										
										<div class="form-group row">
											<label class="col-sm-4 col-form-label">Email*</label>
											<div class="col-sm-8">
												<input required type="text" name="email" class="form-control">
											</div>
										</div>
										
										<div class="form-group row">
											<label class="col-sm-4 col-form-label">Username*</label>
											<div class="col-sm-8">
												<input required type="text" name="username" class="form-control">
											</div>
										</div>
										<div class="form-group row">
											<label class="col-sm-4 col-form-label">Password*</label>
											<div class="col-sm-8">
												<input required type="password" name="password" class="form-control">
											</div>
										</div>
										<input class="btn btn-primary btn-lg btn-block" type="submit" value="Daftar" name="daftar">
									</div>
								</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>

	<?php
		if (isset($_POST["daftar"])) {
			$id_siswa = strip_tags($_POST["id_siswa"]);
			$username = strip_tags($_POST["username"]);
			$nama_siswa = strip_tags($_POST["nama_siswa"]);
			$password = strip_tags($_POST["password"]);
			$telepon = strip_tags($_POST["telepon"]);
			$jurusan = strip_tags($_POST["jurusan"]);
			$email = strip_tags($_POST["email"]);
			$status = strip_tags($_POST["status"]);
			$keterangan = strip_tags($_POST["keterangan"]);

				$sql = "select `id_siswa` from `$tbsiswa` order by `id_siswa` desc";
				$jum = getJum($conn, $sql);
				$kd = "PLJ";
				if ($jum > 0) {
					$d = getField($conn, $sql);
					$idmax = $d['id_siswa'];
					$urut = substr($idmax, 3, 2) + 1; //01
					if ($urut < 10) {
						$idmax = "$kd" . "0" . $urut;
					} else {
						$idmax = "$kd" . $urut;
					}
				} else {
					$idmax = "$kd" . "01";
				}
				$id_siswa = $idmax;

				$sql = " INSERT INTO `$tbsiswa` (
					`id_siswa` ,
					`nama_siswa` ,
					`username` ,
					`password` ,
					`telepon` ,
					`jurusan` ,
					`email` ,
					`status` ,
					`keterangan`
					) VALUES (
					'$id_siswa', 
					'$nama_siswa',
					'$username',
					'$password', 
					'$telepon',
					'$jurusan',
					'$email',
					'Aktif',
					'-'
					)";

				$simpan = process($conn, $sql);
				if ($simpan) {
					echo "<script>alert('Data $nama_siswa berhasil disimpan !');document.location.href='login.php';</script>";
				} else {
					echo "<script>alert('Data $nama_siswa gagal disimpan...');document.location.href='login.php';</script>";
				}
		}
				?>
	
	<!-- js -->
	<script src="vendors/scripts/core.js"></script>
	<script src="vendors/scripts/script.min.js"></script>
	<script src="vendors/scripts/process.js"></script>
	<script src="vendors/scripts/layout-settings.js"></script>
	<script src="src/plugins/jquery-steps/jquery.steps.js"></script>
	<script src="vendors/scripts/steps-setting.js"></script>
</body>

</html>