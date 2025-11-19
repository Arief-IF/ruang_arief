<?php
$pro = "simpan";
$id_nilai = "";
$id_siswa = "";
$id_materi = "";
$benar = "";
$salah = "";
$level = "";
$nilai = "";
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
	$id_nilai = $_GET["kode"];
	$sql = "select * from `$tbnilai` where `id_nilai`='$id_nilai'";
	$d = getField($conn, $sql);
	$id_nilai = $d["id_nilai"];
	$id_nilai0 = $d["id_nilai"];
	$id_siswa = $d["id_siswa"];
	$id_materi = $d["id_materi"];
	$benar = $d["benar"];
	$salah = $d["salah"];
	$nilai = $d["nilai"];
	$keterangan = $d["keterangan"];
	$pro = "ubah";
}
?>


<div id="accordion">
	<h3>Input Data nilai</h3>
	<div>

		<div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-body">
				
                  <h4 class="card-title">Tambah Data nilai</h4><hr>
                    <form action="#" method="post" enctype="multipart/form-data">
					
					<div class="row">
						
						<div class="col-md-6">
							<label for="id_siswa">Pilih Siswa</label>
							<select class="form-control" name="id_siswa">

								<?php  
									$sql="select * from `$tbsiswa` where status='Aktif'";
									$arr=getData($conn,$sql);
											foreach($arr as $d) {						
											$id_siswa0=$d["id_siswa"]; 
											$nama_siswa=$d["nama_siswa"]; 
										   echo "<option value='$id_siswa0'"; if($id_siswa0==$id_siswa){echo"selected";} echo">$nama_siswa($id_siswa0)</option>";
											}
											?>
											
							</select>
						</div> 
						<div class="col-md-6">
							<label for="id_materi">Pilih Materi</label>
							<select class="form-control" name="id_materi">

								<?php  
									$sql="select * from `$tbmateri` where status='Aktif'";
									$arr=getData($conn,$sql);
											foreach($arr as $d) {						
											$id_materi0=$d["id_materi"];
											$jurusan=ucwords($d["jurusan"]);
										   echo "<option value='$id_materi0'"; if($id_materi0==$id_materi){echo"selected";} echo">$jurusan($id_materi0)</option>";
											}
											?>
											
							</select>
						</div>
					</div>	
					
                    <div class="row">
						<div class="col-md-6"><br>
						  <label for="nilai">Nilai</label>
						  <input type="number" class="form-control" required name="nilai" id="nilai" value="<?php echo $nilai;?>" placeholder="">
						</div> 
						<div class="col-md-6"><br>
						  <label for="benar">Benar</label>
						  <input type="number" class="form-control" required name="benar" id="benar" value="<?php echo $benar;?>" placeholder="">
						</div> 
						<div class="col-md-6"><br>
						  <label for="salah">Salah </label>
						  <input type="number" class="form-control" required name="salah" id="salah" value="<?php echo $salah;?>" placeholder="">
						</div> 
					</div>
					
                    <div class="row"> 
						<div class="col-md-12"><br>
						  <label for="keterangan">Keterangan</label>
						  <textarea name="keterangan" class="form-control" placeholder="keterangan"><?php echo $keterangan;?></textarea>
						</div>
					</div>
					
                    <div class="row text-center">
						<div class="col-md-12"><br>
                            <button type="submit" name="Simpan" class="btn btn-success btn-sm ">Simpan</button>
							<input name="pro" type="hidden" id="pro" value="<?php echo $pro;?>" />
							<input name="id_nilai0" type="hidden" id="id_nilai0" value="<?php echo $id_nilai0;?>" />
							<a href="?mnu=nilai"><button class="btn btn-sm btn-danger">Batal</button></a>
						</div>
					</div>
                  </form>
              </div>
            </div>
		</div>
		
		
		
	</div>

	<?php
	$sqlc = "select distinct(`id_siswa`) from `$tbnilai` order by `id_siswa` asc";
	$jumc = getJum($conn, $sqlc);
	if ($jumc < 1) {
		echo "<h1>Maaf data nilai belum tersedia</h1>";
	}
	$arrc = getData($conn, $sqlc);
	foreach ($arrc as $dc) {
		$id_siswa = $dc["id_siswa"];
	?>
	<br>
		<h3>Data nilai<?php echo $id_siswa ?>:</h3>
		<div>
		
<div class="pd-20 card-box mb-30">
					<div class="clearfix mb-20">
						<div class="pull-left">
							<h4 class="text-blue h4">Data nilai</h4>
							</div>
						</div>
					<div class="table-responsive">
						<table class="table table-striped">
						<thead>
							<tr>
								<th scope="col">No</th>
								<th scope="col">Siswa</th>
								<th scope="col">Materi</th>
								<th scope="col">Salah</th>
								<th scope="col">Benar</th>
								<th scope="col">Nilai</th>
								<th scope="col">Keterangan</th>
								<th scope="col">Menu</th>
							</tr>
							<?php
				$sql = "select * from `$tbnilai` where  `id_siswa`='$id_siswa' order by `id_nilai` desc";
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

					$sql2 = $sql . " LIMIT $posawal,$batas";
					$no = $posawal + 1;
					//--------------------------------------------------------------------------------------------
							$arr = getData($conn, $sql);
					foreach ($arr as $d) {
						$id_nilai = $d["id_nilai"]; 
						$id_materi = $d["id_materi"];
						$materi = getMateri($conn,$d["id_materi"]);
						$id_siswa = $d["id_siswa"];
						$siswa = getSiswa($conn,$d["id_siswa"]);
						$benar = $d["benar"];
						$salah = $d["salah"];
						$nilai = $d["nilai"];
						$keterangan = $d["keterangan"];
						
						
						
					echo"</thead>
						<tbody>
							<tr>
							<td>$no</td>
							<td>$siswa ($id_siswa)</td> 
							<td>$materi</td> 
							<td>$benar</td>
							<td>$salah</td>
							<td>$nilai</td>	
							<td>$keterangan</td>
							<td><div align='center'>
<a href='?mnu=nilai&pro=ubah&kode=$id_nilai'><img src='ypathicon/ub.png' title='ubah'></a>
<a href='?mnu=nilai&pro=hapus&kode=$id_nilai'><img src='ypathicon/ha.png' title='hapus' 
onClick='return confirm(\"Apakah Anda benar-benar akan menghapus \"$id_nilai\" pada data nilai ?..\")'></a></div></td>
				</tr>";
						$no++;
					} //for dalam
				} //if
				else {
					echo "<tr><td colspan='6'><blink>Maaf, Data nilai belum tersedia...</blink></td></tr>";
				}
				?>
							
						</tbody>
					</table>
		
			</div>
		</div>
		<?php
		$jmldata = $jum;
		if ($jmldata > 0) {
			if ($batas < 1) {
				$batas = 1;
			}
			$jmlhal  = ceil($jmldata / $batas);
			echo "<div class=paging>";
			if ($page > 1) {
				$prev = $page - 1;
				echo "<span class=prevnext><a href='$_SERVER[PHP_SELF]?page=$prev&mnu=evaluasi'>« Prev</a></span> ";
			} else {
				echo "<span class=disabled>« Prev</span> ";
			}

			for ($i = 1; $i <= $jmlhal; $i++)
				if ($i != $page) {
					echo "<a href='$_SERVER[PHP_SELF]?page=$i&mnu=evaluasi'>$i</a> ";
				} else {
					echo " <span class=current>$i</span> ";
				}

			if ($page < $jmlhal) {
				$next = $page + 1;
				echo "<span class=prevnext><a href='$_SERVER[PHP_SELF]?page=$next&mnu=evaluasi'>Next »</a></span>";
			} else {
				echo "<span class=disabled>Next »</span>";
			}
			echo "</div>";
		} //if jmldata

		$jmldata = $jum;
		echo "<p align=center>Total data <b>$jmldata</b> item</p>";

		echo "</div>";
	    }//for atas
		?>
		</div>

		<?php
		if (isset($_POST["Simpan"])) {
			$pro = strip_tags($_POST["pro"]);
			$id_nilai = strip_tags($_POST["id_nilai"]);
			$id_nilai0 = strip_tags($_POST["id_nilai0"]);
			$id_siswa = strip_tags($_POST["id_siswa"]); 
			$id_materi = strip_tags($_POST["id_materi"]);
			$benar = strip_tags($_POST["benar"]);
			$salah = strip_tags($_POST["salah"]);
			$nilai = strip_tags($_POST["nilai"]);
			$keterangan = strip_tags($_POST["keterangan"]);

			if ($pro == "simpan") {
				$sql = " INSERT INTO `$tbnilai` (
					`id_siswa` ,
					`id_materi` ,
					`benar` ,
					`salah` ,
					`nilai` ,
					`keterangan`
					) VALUES (
					'$id_siswa',
					'$id_materi', 
					'$benar',
					'$salah',
					'$nilai',
					'$keterangan'
					)";

				$simpan = process($conn, $sql);
				if ($simpan) {
					echo "<script>alert('Data $id_nilai berhasil disimpan !');document.location.href='?mnu=nilai';</script>";
				} else {
					echo "<script>alert('Data $id_nilai gagal disimpan...');document.location.href='?mnu=nilai';</script>";
				}
			} else {
				$sql = "update `$tbnilai` set 
					`id_nilai`='$id_nilai',
					`id_siswa`='$id_siswa',
					`id_materi`='$id_materi',
					`benar`='$benar' ,
					`salah`='$salah',
					`nilai`='$nilai',
					`keterangan`='$keterangan'
					 where `id_nilai`='$id_nilai0'";
					 
				$ubah = process($conn, $sql);
				if ($ubah) {
					echo "<script>alert('Data $id_nilai berhasil diubah !');document.location.href='?mnu=nilai';</script>";
				} else {
					echo "<script>alert('Data $id_nilai gagal diubah...');document.location.href='?mnu=nilai';</script>";
				}
			} //else simpan
		}
		?>

		<?php
		if (isset($_GET["pro"]) && $_GET["pro"] == "hapus") {
			$id_nilai = $_GET["kode"];
			$sql = "delete from `$tbnilai` where `id_nilai`='$id_nilai'";
			$hapus = process($conn, $sql);
			if ($hapus) {
				echo "<script>alert('Data $id_nilai berhasil dihapus !');document.location.href='?mnu=nilai';</script>";
			} else {
				echo "<script>alert('Data $id_nilai gagal dihapus...');document.location.href='?mnu=nilai';</script>";
			}
		}
		?>