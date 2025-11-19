<?php
$pro = "simpan";
$id_evaluasi = "";
$id_materi = "";
$soal = "";
$jawaban_A = "";
$jawaban_B = "";
$jawaban_C = "";
$jawaban_D = "";
$level = "";
$jawaban_E = "";
$jawaban_benar = "";
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
	$id_evaluasi = $_GET["kode"];
	$sql = "select * from `$tbevaluasi` where `id_evaluasi`='$id_evaluasi'";
	$d = getField($conn, $sql);
	$id_evaluasi = $d["id_evaluasi"];
	$id_evaluasi0 = $d["id_evaluasi"];
	$id_materi = $d["id_materi"];
	$soal = $d["soal"];
	$jawaban_A = $d["jawaban_A"];
	$jawaban_B = $d["jawaban_B"];
	$jawaban_C = $d["jawaban_C"];
	$jawaban_D = $d["jawaban_D"];
	$jawaban_E = $d["jawaban_E"];
	$jawaban_benar = $d["jawaban_benar"];
	$keterangan = $d["keterangan"];
	$pro = "ubah";
}
?>


<?php
	$id_materi = $_GET["id"];
	$sql = "select * from `$tbmateri` where `id_materi`='$id_materi'";
	$d = getField($conn, $sql);
	$id_materi = $d["id_materi"];
	$jurusan = $d["jurusan"];
	$judul = $d["judul"];
	$deskripsi = $d["deskripsi"];
	$video0 = $d["video"];
	$video = $d["video"];
	$status = $d["status"];
	$catatan = $d["keterangan"];
?>


<div id="accordion">
	<h3>Input Data evaluasi</h3>
	<div>		<div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-body">
				
                  <h4 class="card-title">Data materi</h4><hr>
					
					<div class="row">
					    <div class="col-md-6">
						  <label>Judul</label><br>
						  <?php echo $judul;?>
						</div>
						<div class="col-md-6">
						<label>Jurusan</label><br>
						   <?php echo $jurusan;?>
						</div>
					</div>	
					
                    <div class="row">
						<div class="col-md-6"><br>
						  <label>Deskripsi</label><br>
						  <?php echo $deskripsi;?>
						</div>
						<div class="col-md-6"><br>
						  <label>Video</label><br>
						  <?php echo $video;?>
						</div>
					</div>
					
					 <div class="row">
						<div class="col-md-6"><br>
						  <label>Status</label><br>
						  <?php echo $status;?>
						</div>
						<div class="col-md-6"><br>
						  <label for="keterangan">Keterangan</label><br>
						   <?php echo $catatan;?>
						</div>
					</div>
				  
                </div>
              </div>
            </div>
		</div>
	
	

		<div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-body">
				
                  <h4 class="card-title">Tambah Data evaluasi</h4><hr>
                    <form action="#" method="post" enctype="multipart/form-data">
					
					<div class="row">
						<div class="col-md-12">
						  <label for="soal">Soal </label>
						  <input type="text" class="form-control" required name="soal" id="soal" value="<?php echo $soal;?>" placeholder="">
						</div>
					</div>	
						
                    <div class="row">
						<div class="col-md-6"><br>
						  <label for="jawaban_A">Jawaban_A</label>
						  <input type="text" class="form-control" required name="jawaban_A" id="jawaban_A" value="<?php echo $jawaban_A;?>" placeholder="">
						</div>
						<div class="col-md-6"><br>
						  <label for="jawaban_B">Jawaban_B</label>
						  <input type="text" class="form-control" required name="jawaban_B" id="jawaban_B" value="<?php echo $jawaban_B;?>" placeholder="">
						</div>
					</div>
					
					<div class="row">
						<div class="col-md-6"><br>
						  <label for="jawaban_C">Jawaban_C</label>
						  <input type="text" class="form-control" required name="jawaban_C" id="jawaban_C" value="<?php echo $jawaban_C; ?>" placeholder="">
						</div>
						<div class="col-md-6"><br>
						  <label for="jawaban_D">Jawaban_D</label>
						  <input type="text" class="form-control" required  name="jawaban_D"  id="jawaban_D" value="<?php echo $jawaban_D;?>" placeholder="" />
						</div>
					</div>
					
					<div class="row">
						<div class="col-md-6"><br>
						  <label for="jawaban_E">Jawaban_E</label>
						  <input type="text" class="form-control" required  name="jawaban_E"  id="jawaban_E" value="<?php echo $jawaban_E;?>" placeholder="" />
						</div>
						<div class="col-md-6"><br>
						  <label for="jawaban_benar">Jawaban_Benar</label>
						  <input type="text" class="form-control" required  name="jawaban_benar"  id="jawaban_benar" value="<?php echo $jawaban_benar;?>" placeholder="" />
						</div>
					</div>
					
					<div class="row">
						<div class="col-md-12">
						  <label for="keterangan">Keterangan</label>
						  <textarea name="keterangan" class="form-control" placeholder="keterangan"><?php echo $keterangan;?></textarea>
						</div>
					</div>
                    <div class="row text-center">
						<div class="col-md-12"><br>
                            <button type="submit" name="Simpan" class="btn btn-success btn-sm ">Simpan</button>
							<input name="id_materi" type="hidden" id="id_materi" value="<?php echo $id_materi;?>" />
							<input name="pro" type="hidden" id="pro" value="<?php echo $pro;?>" />
							<input name="id_evaluasi0" type="hidden" id="id_evaluasi0" value="<?php echo $id_evaluasi0;?>" />
							<a href="?mnu=evaluasi"><button class="btn btn-sm btn-danger">Batal</button></a>
						</div>
					</div>
                  </form>
				  
                </div>
              </div>
            </div>
		</div>
		
		
		
	</div>

	<?php
	$sqlc = "select distinct(`id_materi`) from `$tbevaluasi` order by `id_materi` asc";
	$jumc = getJum($conn, $sqlc);
	if ($jumc < 1) {
		echo "<h1>Maaf data evaluasi belum tersedia</h1>";
	}
	$arrc = getData($conn, $sqlc);
	foreach ($arrc as $dc) {
		$id_materi = $dc["id_materi"];
	?>
	<br>
		<h3>Data evaluasi<?php echo $id_materi ?>:</h3>
		<div>
		
<div class="pd-20 card-box mb-30">
					<div class="clearfix mb-20">
						<div class="pull-left">
							<h4 class="text-blue h4">Data evaluasi</h4>
							</div>
						</div>
					<div class="table-responsive">
						<table class="table table-striped">
						<thead>
							<tr>
								<th scope="col">No</th>
								<th scope="col">Detail evaluasi</th>
								<th scope="col">Menu</th>
							</tr>
							<?php
				$sql = "select * from `$tbevaluasi` where  `id_materi`='$id_materi' order by `id_evaluasi` asc";
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
					$arr = getData($conn, $sql2);
					foreach ($arr as $d) {
						$id_evaluasi = $d["id_evaluasi"];
						$id_materi = $d["id_materi"];
						$materi = getMateri($conn,$d["id_materi"]);
						$soal = $d["soal"];
						$jawaban_A = $d["jawaban_A"];
						$jawaban_B = $d["jawaban_B"];
						$jawaban_C = $d["jawaban_C"];
						$jawaban_D = $d["jawaban_D"];
						$jawaban_E = $d["jawaban_E"];
						$jawaban_benar = $d["jawaban_benar"];
						$keterangan = $d["keterangan"];
						$color = "#dddddd";
						if ($no % 2 == 0) {
							$color = "#eeeeee";
						}
						echo "<tr bgcolor='$color'>
						
						
							<td>$no</td>
							<td><b>$soal</b> ($materi)
							<br>Jawaban A: $jawaban_A, 
							<br>Jawaban B: $jawaban_B 
							<br>Jawaban C: $jawaban_C 
							<br>Jawaban D: $jawaban_D 
							<br>Jawaban E: $jawaban_E
							<br>Jawaban benar: $jawaban_benar, 
							<br>Keterangan: $keterangan</td>
							
							<td><div align='center'>
<a href='?mnu=evaluasi&pro=ubah&kode=$id_evaluasi'><img src='ypathicon/ub.png' title='ubah'></a>
<a href='?mnu=evaluasi&pro=hapus&kode=$id_evaluasi'><img src='ypathicon/ha.png' title='hapus' 
onClick='return confirm(\"Apakah Anda benar-benar akan menghapus \"$id_materi\" pada data evaluasi ?..\")'></a></div></td>
				</tr>";
						$no++;
					} //for dalam
				} //if
				else {
					echo "<tr><td colspan='6'><blink>Maaf, Data evaluasi belum tersedia...</blink></td></tr>";
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
			$id_evaluasi = strip_tags($_POST["id_evaluasi"]);
			$id_evaluasi0 = strip_tags($_POST["id_evaluasi0"]);
			$id_materi = strip_tags($_POST["id_materi"]);
			$soal = strip_tags($_POST["soal"]);
			$jawaban_A = strip_tags($_POST["jawaban_A"]);
			$jawaban_B = strip_tags($_POST["jawaban_B"]);
			$jawaban_C = strip_tags($_POST["jawaban_C"]);
			$jawaban_D = strip_tags($_POST["jawaban_D"]);
			$jawaban_E = strip_tags($_POST["jawaban_E"]);
			$jawaban_benar = strip_tags($_POST["jawaban_benar"]);
			$keterangan = strip_tags($_POST["keterangan"]);

			if ($pro == "simpan") {
				$sql = " INSERT INTO `$tbevaluasi` (
					`id_materi` ,
					`soal` ,
					`jawaban_A` ,
					`jawaban_B` ,
					`jawaban_C` ,
					`jawaban_D` ,
					`jawaban_E` ,
					`jawaban_benar` ,
					`keterangan`
					) VALUES (
					'$id_materi',
					'$soal',
					'$jawaban_A', 
					'$jawaban_B',
					'$jawaban_C',
					'$jawaban_D',
					'$jawaban_E',
					'$jawaban_benar',
					'$keterangan'
					)";

				$simpan = process($conn, $sql);
				if ($simpan) {
					echo "<script>alert('Data $id_evaluasi berhasil disimpan !');document.location.href='?mnu=evaluasi';</script>";
				} else {
					echo "<script>alert('Data $id_evaluasi gagal disimpan...');document.location.href='?mnu=evaluasi';</script>";
				}
			} else {
				$sql = "update `$tbevaluasi` set 
					`id_evaluasi`='$id_evaluasi', 
					`id_materi`='$id_materi',
					`soal`='$soal',
					`jawaban_A`='$jawaban_A',
					`jawaban_B`='$jawaban_B' ,
					`jawaban_C`='$jawaban_C',
					`jawaban_D`='$jawaban_D',
					`jawaban_E`='$jawaban_E',
					`jawaban_E`='$jawaban_E',
					`jawaban_benar`='$jawaban_benar'
					 where `id_evaluasi`='$id_evaluasi0'";
					 
				$ubah = process($conn, $sql);
				if ($ubah) {
					echo "<script>alert('Data $id_evaluasi berhasil diubah !');document.location.href='?mnu=evaluasi';</script>";
				} else {
					echo "<script>alert('Data $id_evaluasi gagal diubah...');document.location.href='?mnu=evaluasi';</script>";
				}
			} //else simpan
		}
		?>

		<?php
		if (isset($_GET["pro"]) && $_GET["pro"] == "hapus") {
			$id_evaluasi = $_GET["kode"];
			$sql = "delete from `$tbevaluasi` where `id_evaluasi`='$id_evaluasi'";
			$hapus = process($conn, $sql);
			if ($hapus) {
				echo "<script>alert('Data $id_evaluasi berhasil dihapus !');document.location.href='?mnu=evaluasi';</script>";
			} else {
				echo "<script>alert('Data $id_evaluasi gagal dihapus...');document.location.href='?mnu=evaluasi';</script>";
			}
		}
		?>