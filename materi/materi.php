<?php
$pro = "simpan";
$id_materi = "";
$jurusan = "";
$judul = "";
$deskripsi = "";
$video = "";
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
if (isset($_GET["pro"]) && $_GET["pro"] == "ubah") {
	$id_materi = $_GET["kode"];
	$sql = "select * from `$tbmateri` where `id_materi`='$id_materi'";
	$d = getField($conn, $sql);
	$id_materi = $d["id_materi"];
	$id_materi0 = $d["id_materi"];
	$jurusan = $d["jurusan"];
	$judul = $d["judul"];
	$deskripsi = $d["deskripsi"];
	$video0 = $d["video"];
	$video = $d["video"];
	$status = $d["status"];
	$keterangan = $d["keterangan"];
	$pro = "ubah";
}
?>


<div id="accordion">
	<h3>Input Data materi</h3>
	<div>

		<div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-body">
				
                  <h4 class="card-title">Tambah Data materi</h4><hr>
                    <form action="#" method="post" enctype="multipart/form-data">
					
					<div class="row">
					    <div class="col-md-6"><br>
						  <label for="judul">Judul</label>
						  <input type="text" class="form-control" required name="judul" id="judul" value="<?php echo $judul;?>" placeholder="">
						</div>
						<div class="col-md-6"><br>
						  <label for="jurusan">Jurusan</label><br>
						  <input type="radio" name="jurusan" id="jurusan"  checked="checked" value="Teknik Komputer Jaringan" <?php if($jurusan=="Teknik Komputer Jaringan"){echo"checked";}?>/>Teknik Komputer Jaringan <br>
						  <input type="radio" name="jurusan" id="jurusan" value="Teknologi Laboratorium Medik" <?php if($jurusan=="Teknologi Laboratorium Medik"){echo"checked";}?>/>Teknologi Laboratorium Medik
						</div>
						
					</div>	
					
                    <div class="row">
						<div class="col-md-6"><br>
						  <label for="deskripsi">Deskripsi</label>
						  <input type="text" class="form-control" required name="deskripsi" id="deskripsi" value="<?php echo $deskripsi;?>" placeholder="">
						</div>
						<div class="col-md-6"><br>
						  <label for="video">Video</label>
						  <input type="file" class="form-control" required  name="video"  id="video" value="<?php echo $video;?>" placeholder="" />
						</div>
					</div>
					
					 <div class="row">
						<div class="col-md-6"><br>
						  <label for="status">Status</label><br>
						  <input type="radio" name="status" id="status"  checked="checked" value="Aktif" <?php if($status=="Aktif"){echo"checked";}?>/>Aktif <br>
						  <input type="radio" name="status" id="status" value="Tidak Aktif" <?php if($status=="Tidak Aktif"){echo"checked";}?>/>Tidak Aktif
						</div>
						<div class="col-md-6"><br>
						  <label for="keterangan">Keterangan</label>
						   <input type="text" class="form-control"  name="keterangan" id="keterangan" value="<?php echo $deskripsi;?>" placeholder="">
						</div>
					</div>
					
                    <div class="row text-center">
						<div class="col-md-12"><br>
                            <button type="submit" name="Simpan" class="btn btn-success btn-sm ">Simpan</button>
							<input name="pro" type="hidden" id="pro" value="<?php echo $pro;?>" />
							<input name="id_materi0" type="hidden" id="id_materi0" value="<?php echo $id_materi0;?>" />
							<input name="video0" type="hidden" id="video0" value="<?php echo $video0; ?>" />
							<a href="?mnu=materi"><button class="btn btn-sm btn-danger">Batal</button></a>
						</div>
					</div>
                  </form>
				  
                </div>
              </div>
            </div>
		</div>
		
		
		
	</div>

	<?php
	$sqlc = "select distinct(`status`) from `$tbmateri` order by `status` asc";
	$jumc = getJum($conn, $sqlc);
	if ($jumc < 1) {
		echo "<h1>Maaf data materi belum tersedia</h1>";
	}
	$arrc = getData($conn, $sqlc);
	foreach ($arrc as $dc) {
		$status = $dc["status"];
	?>
	<br>
		<h3>Data materi<?php echo $status ?>:</h3>
		<div>
		
<div class="pd-20 card-box mb-30">
					<div class="clearfix mb-20">
						<div class="pull-left">
							<h4 class="text-blue h4">Data materi</h4>
							</div>
						</div>
					<div class="table-responsive">
						<table class="table table-striped">
						<thead>
							<tr>
								<th scope="col">No</th>
								<th scope="col">Video</th>
								<th scope="col">Detail Materi</th>
								<th scope="col">Menu</th>
							</tr>
							<?php
				$sql = "select * from `$tbmateri` where  `status`='$status' order by `id_materi` asc";
				$jum = getJum($conn, $sql);
				if ($jum > 0) {
					//--------------------------------------------------------------------------------------------
					$batas   = 10;
					$page = 1;
					if (isset($_GET['page'])) {
						$page = $_GET['page'];
					}
					if (empty($page)) {
						$posawal  = 0;
						$page = 1;
					} else {
						$posawal = ($page - 1) * $batas;
					}

					$sql = $sql . " LIMIT $posawal,$batas";
					$no = $posawal + 1;
					//--------------------------------------------------------------------------------------------		
							$arr = getData($conn, $sql);
					foreach ($arr as $d) {
						$id_materi = $d["id_materi"];
						$jurusan = $d["jurusan"];
						$judul = $d["judul"];
						$deskripsi = $d["deskripsi"];
						$video = $d["video"];
						$status = $d["status"];
						$keterangan = $d["keterangan"];
						
					echo"</thead>
						<tbody>
							<tr>
							<td>$no</td>
							<td><a href='downloadget.php?nf=$video' target='_blank'>Download File</a></td>
							<td><b>$judul</b> #$jurusan<br>
							<small><b>Deskripsi:</b> $deskripsi,</br> <b>Status:</b> $status,</br> 
							<b>Keterangan:</b> $keterangan,</small>
							</td>
							<td><div align='center'>
<a href='?mnu=evaluasi&id=$id_materi'><img src='ypathicon/11.png' title='evaluasi'></a>
<a href='?mnu=materi&pro=ubah&kode=$id_materi'><img src='ypathicon/ub.png' title='ubah'></a>
<a href='?mnu=materi&pro=hapus&kode=$id_materi'><img src='ypathicon/ha.png' title='hapus' 
onClick='return confirm(\"Apakah Anda benar-benar akan menghapus \"$id_materi\" pada data materi ?..\")'></a></div></td>
				</tr>";
						$no++;
					} //for dalam
				} //if
				else {
					echo "<tr><td colspan='6'><blink>Maaf, Data materi belum tersedia...</blink></td></tr>";
				}
				?>
							
						</tbody>
					</table>
			
		</div>
	<?php } ?>
		</div>

		<?php
		if (isset($_POST["Simpan"])) {
			$pro = strip_tags($_POST["pro"]);
			$id_materi = strip_tags($_POST["id_materi"]);
			$id_materi0 = strip_tags($_POST["id_materi0"]);
			$jurusan = strip_tags($_POST["jurusan"]);
			$judul = strip_tags($_POST["judul"]);
			$deskripsi = strip_tags($_POST["deskripsi"]);
			$video = strip_tags($_POST["video"]);
			$status = strip_tags($_POST["status"]);
			$keterangan = strip_tags($_POST["keterangan"]);
			
			$video0 = strip_tags($_POST["video0"]);
			if ($_FILES["video"] != "") {
			move_uploaded_file($_FILES["video"]["tmp_name"], "$YPATH/" . $_FILES["video"]["name"]);
			$video = $_FILES["video"]["name"];
			} else {
			$video = $video0;
			}
			if (strlen($video) < 1) {
			$video = $video0;
			}

			if ($pro == "simpan") {
				$sql = " INSERT INTO `$tbmateri` (
					`jurusan` ,
					`judul` ,
					`deskripsi` ,
					`video` ,
					`status` ,
					`keterangan`
					) VALUES (
					'$jurusan', 
					'$judul',
					'$deskripsi',
					'$video',
					'$status',
					'$keterangan'
					)";

				$simpan = process($conn, $sql);
				if ($simpan) {
					echo "<script>alert('Data $id_materi berhasil disimpan !');document.location.href='?mnu=materi';</script>";
				} else {
					echo "<script>alert('Data $id_materi gagal disimpan...');document.location.href='?mnu=materi';</script>";
				}
			} else {
				$sql = "update `$tbmateri` set 
					`jurusan`='$jurusan',
					`judul`='$judul' ,
					`deskripsi`='$deskripsi',
					`video`='$video',
					`status`='$status',
					`keterangan`='$keterangan'
					 where `id_materi`='$id_materi0'";
					 
				$ubah = process($conn, $sql);
				if ($ubah) {
					echo "<script>alert('Data $id_materi berhasil diubah !');document.location.href='?mnu=materi';</script>";
				} else {
					echo "<script>alert('Data $id_materi gagal diubah...');document.location.href='?mnu=materi';</script>";
				}
			} //else simpan
		}
		?>

		<?php
		if (isset($_GET["pro"]) && $_GET["pro"] == "hapus") {
			$id_materi = $_GET["kode"];
			$sql = "delete from `$tbmateri` where `id_materi`='$id_materi'";
			$hapus = process($conn, $sql);
			if ($hapus) {
				echo "<script>alert('Data $id_materi berhasil dihapus !');document.location.href='?mnu=materi';</script>";
			} else {
				echo "<script>alert('Data $id_materi gagal dihapus...');document.location.href='?mnu=materi';</script>";
			}
		}
		?>