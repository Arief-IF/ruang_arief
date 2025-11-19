<?php
$pro = "simpan";

$nama_produk = "";
$deskripsi = "";
$gambar = "";
$harga = "";
$kategori = "";
$status = "Aktif";
$keterangan = "";
?>

<link type="text/css" href="<?php echo "$PATH/base/"; ?>ui.all.css" rel="stylesheet" />
<script type="text/javascript" src="<?php echo "$PATH/"; ?>jquery-1.3.2.js"></script>
<script type="text/javascript" src="<?php echo "$PATH/"; ?>ui/ui.core.js"></script>
<script type="text/javascript" src="<?php echo "$PATH/"; ?>ui/ui.datepicker.js"></script>
<script type="text/javascript" src="<?php echo "$PATH/"; ?>ui/i18n/ui.datepicker-id.js"></script>

<script type="text/javascript">
	function PRINT(pk) {
		win = window.open('produk/produk_print.php?pk=' + pk, 'win', 'width=1000, height=400, menubar=0, scrollbars=1, resizable=0, location=0, toolbar=0, status=0');
	}
</script>
<script language="JavaScript">
	function buka(url) {
		window.open(url, 'window_baru', 'width=800,height=600,left=320,top=100,resizable=1,scrollbars=1');
	}
</script>

<link rel="stylesheet" href="jsacordeon/jquery-ui.css">
<link rel="stylesheet" href="resources/demos/style.css">
<script src="jsacordeon/jquery-1.12.4.js"></script>
<script src="jsacordeon/jquery-ui.js"></script>
<script>
	$(function() {
		$("#accordion").accordion({
			collapsible: true
		});
	});
</script>

<br><br><br><br>
<div id="accordion">
	

	<?php
	$sqlc = "select distinct(`status`) from `$tbproduk` order by `status` asc";
	$jumc = getJum($conn, $sqlc);
	if ($jumc < 1) {
		echo "<h1>Maaf data produk belum tersedia</h1>";
	}
	$arrc = getData($conn, $sqlc);
	foreach ($arrc as $dc) {
		$status = $dc["status"];
	?>
		<h3>Data produk <?php echo $status ?>:</h3>
		<div>
			Cetak | <img src='ypathicon/print.png' title='PRINT' OnClick="PRINT('<?php echo $status; ?>')"> |
			<table class="table table-bordered">
				<tr bgcolor="#cccccc">
					<th width="3%">No</td>
					<th width="10%">ID produk</td>
					<th width="20%">Nama produk</td>
					<th width="20%">Deskripsi</td>
					<th width="20%">harga</td>
					<th width="20%">kategori</td>
					<th width="40%">gambar</td>
					<th width="20%">status</td>
					<th width="20%">Keterangan</td>
				</tr>
				<?php
				$sql = "select * from `$tbproduk` where  `status`='$status' order by `id_produk` asc";
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
						$id_produk = $d["id_produk"];
						$nama_produk = ucwords($d["nama_produk"]);
						$deskripsi = $d["deskripsi"];
						$gambar = $d["gambar"];
						$harga = $d["harga"];
						$kategori = $d["kategori"];
						$status = $d["status"];
						$keterangan = $d["keterangan"];
						$color = "#dddddd";
						if ($no % 2 == 0) {
							$color = "#eeeeee";
						}
						echo "<tr bgcolor='$color'>
				<td>$no</td>
				<td>$id_produk</td>
 				<td>$nama_produk</td>
				<td>$deskripsi</td>
				<td>$harga</td>
				<td>$kategori</td>
<td><div align='center'>";
echo"<a href='#' onclick='buka(\"produk/zoom.php?id=$id_produk\")'>
<img src='$YPATH/$gambar' width='40' height='40' /></a></div>";
				echo"</td>				
				<td>$status</td>			
				<td>$keterangan</td>
					</tr>";
						$no++;
					} //for dalam
				} //if
				else {
					echo "<tr><td colspan='6'><blink>Maaf, Data produk belum tersedia...</blink></td></tr>";
				}
				?>
			</table>

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
				echo "<span class=prevnext><a href='$_SERVER[PHP_SELF]?page=$prev&mnu=produk'>« Prev</a></span> ";
			} else {
				echo "<span class=disabled>« Prev</span> ";
			}

			for ($i = 1; $i <= $jmlhal; $i++)
				if ($i != $page) {
					echo "<a href='$_SERVER[PHP_SELF]?page=$i&mnu=produk'>$i</a> ";
				} else {
					echo " <span class=current>$i</span> ";
				}

			if ($page < $jmlhal) {
				$next = $page + 1;
				echo "<span class=prevnext><a href='$_SERVER[PHP_SELF]?page=$next&mnu=produk'>Next »</a></span>";
			} else {
				echo "<span class=disabled>Next »</span>";
			}
			echo "</div>";
		} //if jmldata

		$jmldata = $jum;
		echo "<p align=center>Total data <b>$jmldata</b> item</p>";

		echo "</div>";
	} //for atas
		?>
		</div>

		<?php
		if (isset($_POST["Simpan"])) {
			$pro = strip_tags($_POST["pro"]);
			$id_produk = strip_tags($_POST["id_produk"]);
			$id_produk0 = strip_tags($_POST["id_produk0"]);
			$nama_produk = strip_tags($_POST["nama_produk"]);
			$deskripsi = strip_tags($_POST["deskripsi"]);
			$harga = strip_tags($_POST["harga"]);
			$kategori = strip_tags($_POST["kategori"]);
			$status = strip_tags($_POST["status"]);
			$keterangan = strip_tags($_POST["keterangan"]);
			
			$gambar0 = strip_tags($_POST["gambar0"]);
	if ($_FILES["gambar"] != "") {
	move_uploaded_file($_FILES["gambar"]["tmp_name"], "$YPATH/" . $_FILES["gambar"]["name"]);
	$gambar = $_FILES["gambar"]["name"];
	} else {
	$gambar = $gambar0;
	}
	if (strlen($gambar) < 1) {
	$gambar = $gambar0;
	}

			if ($pro == "simpan") {
				$sql = " INSERT INTO `$tbproduk` (
					`id_produk` ,
					`nama_produk` ,
					`deskripsi` ,
					`gambar` ,
					`harga` ,
					`kategori` ,
					`status` ,
					`keterangan`
					) VALUES (
					'$id_produk', 
					'$nama_produk',
					'$deskripsi',
					'$gambar', 
					'$harga',
					'$kategori',
					'$status',
					'$keterangan'
					)";

				$simpan = process($conn, $sql);
				if ($simpan) {
					echo "<script>alert('Data $nama_produk berhasil disimpan !');document.location.href='?mnu=produk';</script>";
				} else {
					echo "<script>alert('Data $nama_produk gagal disimpan...');document.location.href='?mnu=produk';</script>";
				}
			} else {
				$sql = "update `$tbproduk` set 
					`nama_produk`='$nama_produk',
					`deskripsi`='$deskripsi',
					`gambar`='$gambar',
					`harga`='$harga' ,
					`kategori`='$kategori',
					`status`='$status',
					`keterangan`='$keterangan'
					 where `id_produk`='$id_produk0'";
					 
				$ubah = process($conn, $sql);
				if ($ubah) {
					echo "<script>alert('Data $nama_produk berhasil diubah !');document.location.href='?mnu=produk';</script>";
				} else {
					echo "<script>alert('Data $nama_produk gagal diubah...');document.location.href='?mnu=produk';</script>";
				}
			} //else simpan
		}
		?>

		<?php
		if (isset($_GET["pro"]) && $_GET["pro"] == "hapus") {
			$id_produk = $_GET["kode"];
			$sql = "delete from `$tbproduk` where `id_produk`='$id_produk'";
			$hapus = process($conn, $sql);
			if ($hapus) {
				echo "<script>alert('Data $id_produk berhasil dihapus !');document.location.href='?mnu=produk';</script>";
			} else {
				echo "<script>alert('Data $id_produk gagal dihapus...');document.location.href='?mnu=produk';</script>";
			}
		}
		?>