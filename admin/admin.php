<?php
$pro = "simpan";
$nama_admin = "";
$username = "";
$password = "";
$telepon = "";
$email = "";
$level = "";
$status = "Aktif";
$keterangan = "";
?>

<link type="text/css" href="<?php echo "$PATH/base/"; ?>ui.all.css" rel="stylesheet" />
<script type="text/javascript" src="<?php echo "$PATH/"; ?>jquery-1.3.2.js"></script>
<script type="text/javascript" src="<?php echo "$PATH/"; ?>ui/ui.core.js"></script>
<script type="text/javascript" src="<?php echo "$PATH/"; ?>ui/ui.datepicker.js"></script>
<script type="text/javascript" src="<?php echo "$PATH/"; ?>ui/i18n/ui.datepicker-id.js"></script>

<link rel="stylesheet" href="assets/jsacordeon/jquery-ui.css">
<link rel="stylesheet" href="resources/demos/style.css">
<script src="assets/jsacordeon/jquery-1.12.4.js"></script>
<script src="assets/jsacordeon/jquery-ui.js"></script>
<script>
	$(function() {
		$("#accordion").accordion({
			collapsible: true
		});
	});
</script>

<?php
$sql = "select `id_admin` from `$tbadmin` order by `id_admin` desc";
$jum = getJum($conn, $sql);
$kd = "ADM";
if ($jum > 0) {
	$d = getField($conn, $sql);
	$idmax = $d['id_admin'];
	$urut = substr($idmax, 3, 2) + 1; //01
	if ($urut < 10) {
		$idmax = "$kd" . "0" . $urut;
	} else {
		$idmax = "$kd" . $urut;
	}
} else {
	$idmax = "$kd" . "01";
}
$id_admin = $idmax;
?>

<?php
if (isset($_GET["pro"]) && $_GET["pro"] == "ubah") {
	$id_admin = $_GET["kode"];
	$sql = "select * from `$tbadmin` where `id_admin`='$id_admin'";
	$d = getField($conn, $sql);
	$id_admin = $d["id_admin"];
	$id_admin0 = $d["id_admin"];
	$nama_admin = $d["nama_admin"];
	$username = $d["username"];
	$password = $d["password"];
	$telepon = $d["telepon"];
	$email = $d["email"];
	$status = $d["status"];
	$keterangan = $d["keterangan"];
	$pro = "ubah";
}
?>


<div id="accordion">
	<h3>Input Data Admin</h3>
	<div>

		<div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-body">
				
                  <h4 class="card-title">Tambah Data Admin</h4><hr>
                    <form action="#" method="post" enctype="multipart/form-data">
					
					<div class="row">
						<div class="col-md-6">
						  <label for="id_admin">ID Admin</label>
						  <input type="text" class="form-control" required name="id_admin" id="id_admin" value="<?php echo $id_admin;?>" readonly>
						</div>
						<div class="col-md-6">
						  <label for="nama_admin">Nama Admin</label>
						  <input type="text" class="form-control" required name="nama_admin" id="nama_admin" value="<?php echo $nama_admin;?>" placeholder="">
						</div>
					</div>	
					
					<div class="row">
						<div class="col-md-6"><br>
						  <label for="telepon">Telepon</label>
						  <input type="number" class="form-control" required name="telepon" id="telepon" value="<?php echo $telepon;?>" placeholder="">
						</div>
						<div class="col-md-6"><br>
						  <label for="email">Email </label>
						  <input type="email" class="form-control" required name="email" id="email" value="<?php echo $email;?>" placeholder="">
						</div>
					</div>	
						
                    <div class="row">
						<div class="col-md-6"><br>
						  <label for="username">Username</label>
						  <input type="text" class="form-control" required name="username" id="username" value="<?php echo $username;?>" placeholder="">
						</div>
						<div class="col-md-6"><br>
						  <label for="password">Password</label>
						  <input type="password" class="form-control" required  name="password"  id="password" value="<?php echo $password;?>" placeholder="" />
						</div>
					</div>
					
                    <div class="row">
					    <div class="col-md-6"><br>
						  <label for="status">Status</label><br>
						  <input type="radio" name="status" id="status"  checked="checked" value="Aktif" <?php if($status=="Aktif"){echo"checked";}?>/>Aktif 
						  <input type="radio" name="status" id="status" value="Tidak Aktif" <?php if($status=="Tidak Aktif"){echo"checked";}?>/>Tidak Aktif
						</div>
						<div class="col-md-6"><br>
						  <label for="keterangan">Keterangan</label>
						  <textarea name="keterangan" class="form-control" placeholder="keterangan"><?php echo $keterangan;?></textarea>
						</div>
					</div>
					
                    <div class="row text-center">
						<div class="col-md-12"><br>
                            <button type="submit" name="Simpan" class="btn btn-success btn-sm ">Simpan</button>
							<input name="pro" type="hidden" id="pro" value="<?php echo $pro;?>" />
							<input name="id_admin" type="hidden" id="id_admin" value="<?php echo $id_admin;?>" />
							<input name="id_admin0" type="hidden" id="id_admin0" value="<?php echo $id_admin0;?>" />
							<a href="?mnu=admin"><button class="btn btn-sm btn-danger">Batal</button></a>
						</div>
					</div>
                  </form>
              </div>
            </div>
		</div>
		
		
		
	</div>

	<?php
	$sqlc = "select distinct(`status`) from `$tbadmin` order by `status` asc";
	$jumc = getJum($conn, $sqlc);
	if ($jumc < 1) {
		echo "<h1>Maaf data Admin belum tersedia</h1>";
	}
	$arrc = getData($conn, $sqlc);
	foreach ($arrc as $dc) {
		$status = $dc["status"];
	?>
	<br>
		<h3>Data Admin<?php echo $status ?>:</h3>
		<div>
		
<div class="pd-20 card-box mb-30">
					<div class="clearfix mb-20">
						<div class="pull-left">
							<h4 class="text-blue h4">Data Admin</h4>
							</div>
						</div>
					<div class="table-responsive">
						<table class="table table-striped">
						<thead>
							<tr>
								<th scope="col">No</th>
								<th scope="col">Id Admin</th>
								<th scope="col">Nama Admin</th>
								<th scope="col">Email</th>
								<th scope="col">Telepon</th>
								<th scope="col">Keterangan</th>
								<th scope="col">Menu</th>
							</tr>
							<?php
				$sql = "select * from `$tbadmin` where  `status`='$status' order by `id_admin` desc";
				$jum = getJum($conn, $sql);
				if ($jum > 0) {
					$no=1;
							$arr = getData($conn, $sql);
					foreach ($arr as $d) {
						$id_admin = $d["id_admin"];
						$nama_admin = ucwords($d["nama_admin"]);
						$username = $d["username"];
						$password = $d["password"];
						$telepon = $d["telepon"];
						$email = $d["email"];
						$status = $d["status"];
						$keterangan = $d["keterangan"];
						
						
						
					echo"</thead>
						<tbody>
							<tr>
							<td>$no</td>
							<td>$id_admin</td>
							<td>$nama_admin</td>
							<td>$email</td>
							<td>$telepon</td>	
							<td>$keterangan</td>
							<td><div align='center'>
<a href='?mnu=admin&pro=ubah&kode=$id_admin'><img src='ypathicon/ub.png' title='ubah'></a>
<a href='?mnu=admin&pro=hapus&kode=$id_admin'><img src='ypathicon/ha.png' title='hapus' 
onClick='return confirm(\"Apakah Anda benar-benar akan menghapus \"$nama_admin\" pada data admin ?..\")'></a></div></td>
				</tr>";
						$no++;
					} //for dalam
				} //if
				else {
					echo "<tr><td colspan='6'><blink>Maaf, Data admin belum tersedia...</blink></td></tr>";
				}
				?>
							
						</tbody>
					</table>
		
	<?php } ?>
		</div>

		<?php
		if (isset($_POST["Simpan"])) {
			$pro = strip_tags($_POST["pro"]);
			$id_admin = strip_tags($_POST["id_admin"]);
			$id_admin0 = strip_tags($_POST["id_admin0"]);
			$username = strip_tags($_POST["username"]);
			$nama_admin = strip_tags($_POST["nama_admin"]);
			$password = strip_tags($_POST["password"]);
			$telepon = strip_tags($_POST["telepon"]);
			$email = strip_tags($_POST["email"]);
			$status = strip_tags($_POST["status"]);
			$keterangan = strip_tags($_POST["keterangan"]);

			if ($pro == "simpan") {
				$sql = " INSERT INTO `$tbadmin` (
					`id_admin` ,
					`nama_admin` ,
					`username` ,
					`password` ,
					`telepon` ,
					`email` ,
					`status` ,
					`keterangan`
					) VALUES (
					'$id_admin', 
					'$nama_admin',
					'$username',
					'$password', 
					'$telepon',
					'$email',
					'$status',
					'$keterangan'
					)";

				$simpan = process($conn, $sql);
				if ($simpan) {
					echo "<script>alert('Data $nama_admin berhasil disimpan !');document.location.href='?mnu=admin';</script>";
				} else {
					echo "<script>alert('Data $nama_admin gagal disimpan...');document.location.href='?mnu=admin';</script>";
				}
			} else {
				$sql = "update `$tbadmin` set 
					`nama_admin`='$nama_admin',
					`username`='$username',
					`password`='$password',
					`telepon`='$telepon' ,
					`email`='$email',
					`status`='$status',
					`keterangan`='$keterangan'
					 where `id_admin`='$id_admin0'";
					 
				$ubah = process($conn, $sql);
				if ($ubah) {
					echo "<script>alert('Data $nama_admin berhasil diubah !');document.location.href='?mnu=admin';</script>";
				} else {
					echo "<script>alert('Data $nama_admin gagal diubah...');document.location.href='?mnu=admin';</script>";
				}
			} //else simpan
		}
		?>

		<?php
		if (isset($_GET["pro"]) && $_GET["pro"] == "hapus") {
			$id_admin = $_GET["kode"];
			$sql = "delete from `$tbadmin` where `id_admin`='$id_admin'";
			$hapus = process($conn, $sql);
			if ($hapus) {
				echo "<script>alert('Data $id_admin berhasil dihapus !');document.location.href='?mnu=admin';</script>";
			} else {
				echo "<script>alert('Data $id_admin gagal dihapus...');document.location.href='?mnu=admin';</script>";
			}
		}
		?>