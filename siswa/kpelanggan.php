<?php
$pro = "simpan";

$nama_pelanggan = "";
$username = "";
$password = "";
$telepon = "";
$email = "";
$status = "Aktif";
$alamat = "";
$keterangan = "";
?>

<link type="text/css" href="<?php echo "$PATH/base/"; ?>ui.all.css" rel="stylesheet" />
<script type="text/javascript" src="<?php echo "$PATH/"; ?>jquery-1.3.2.js"></script>
<script type="text/javascript" src="<?php echo "$PATH/"; ?>ui/ui.core.js"></script>
<script type="text/javascript" src="<?php echo "$PATH/"; ?>ui/ui.datepicker.js"></script>
<script type="text/javascript" src="<?php echo "$PATH/"; ?>ui/i18n/ui.datepicker-id.js"></script>

<script type="text/javascript">
	function PRINT(pk) {
		win = window.open('pelanggan/pelanggan_print.php?pk=' + pk, 'win', 'width=1000, height=400, menubar=0, scrollbars=1, resizable=0, location=0, toolbar=0, status=0');
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
	$sqlc = "select distinct(`status`) from `$tbpelanggan` order by `status` asc";
	$jumc = getJum($conn, $sqlc);
	if ($jumc < 1) {
		echo "<h1>Maaf data pelanggan belum tersedia</h1>";
	}
	$arrc = getData($conn, $sqlc);
	foreach ($arrc as $dc) {
		$status = $dc["status"];
	?>
		<h3>Data pelanggan <?php echo $status ?>:</h3>
		<div>
			Cetak | <img src='ypathicon/print.png' title='PRINT' OnClick="PRINT('<?php echo $status; ?>')"> |
			<table class="table table-bordered">
				<tr bgcolor="#cccccc">
					<th width="3%">No</td>
					<th width="10%">ID pelanggan</td>
					<th width="20%">Nama pelanggan</td>
					<th width="20%">Telepon</td>
					<th width="20%">Email</td>
					<th width="20%">status</td>
					<th width="20%">alamat</td>
					<th width="20%">Keterangan</td>
				</tr>
				<?php
				$sql = "select * from `$tbpelanggan` where  `status`='$status' order by `id_pelanggan` desc";
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
						$id_pelanggan = $d["id_pelanggan"];
						$nama_pelanggan = ucwords($d["nama_pelanggan"]);
						$username = $d["username"];
						$password = $d["password"];
						$telepon = $d["telepon"];
						$email = $d["email"];
						$status = $d["status"];
						$alamat = $d["alamat"];
						$keterangan = $d["keterangan"];
						$color = "#dddddd";
						if ($no % 2 == 0) {
							$color = "#eeeeee";
						}
						echo "<tr bgcolor='$color'>
				<td>$no</td>
				<td>$id_pelanggan</td>
				<td>$nama_pelanggan</td>
				<td>$telepon</td>
				<td>$email</td>		
				<td>$status</td>			
				<td>$alamat</td>			
				<td>$keterangan</td>
			</tr>";
						$no++;
					} //for dalam
				} //if
				else {
					echo "<tr><td colspan='6'><blink>Maaf, Data pelanggan belum tersedia...</blink></td></tr>";
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
				echo "<span class=prevnext><a href='$_SERVER[PHP_SELF]?page=$prev&mnu=pelanggan'>« Prev</a></span> ";
			} else {
				echo "<span class=disabled>« Prev</span> ";
			}

			for ($i = 1; $i <= $jmlhal; $i++)
				if ($i != $page) {
					echo "<a href='$_SERVER[PHP_SELF]?page=$i&mnu=pelanggan'>$i</a> ";
				} else {
					echo " <span class=current>$i</span> ";
				}

			if ($page < $jmlhal) {
				$next = $page + 1;
				echo "<span class=prevnext><a href='$_SERVER[PHP_SELF]?page=$next&mnu=pelanggan'>Next »</a></span>";
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
			$id_pelanggan = strip_tags($_POST["id_pelanggan"]);
			$id_pelanggan0 = strip_tags($_POST["id_pelanggan0"]);
			$username = strip_tags($_POST["username"]);
			$nama_pelanggan = strip_tags($_POST["nama_pelanggan"]);
			$password = strip_tags($_POST["password"]);
			$telepon = strip_tags($_POST["telepon"]);
			$email = strip_tags($_POST["email"]);
			$status = strip_tags($_POST["status"]);
			$alamat = strip_tags($_POST["alamat"]);
			$keterangan = strip_tags($_POST["keterangan"]);

			if ($pro == "simpan") {
				$sql = " INSERT INTO `$tbpelanggan` (
					`id_pelanggan` ,
					`nama_pelanggan` ,
					`username` ,
					`password` ,
					`telepon` ,
					`email` ,
					`status` ,
					`alamat` ,
					`keterangan`
					) VALUES (
					'$id_pelanggan', 
					'$nama_pelanggan',
					'$username',
					'$password', 
					'$telepon',
					'$email',
					'$status',
					'$alamat',
					'$keterangan'
					)";

				$simpan = process($conn, $sql);
				if ($simpan) {
					echo "<script>alert('Data $nama_pelanggan berhasil disimpan !');document.location.href='?mnu=pelanggan';</script>";
				} else {
					echo "<script>alert('Data $nama_pelanggan gagal disimpan...');document.location.href='?mnu=pelanggan';</script>";
				}
			} else {
				$sql = "update `$tbpelanggan` set 
					`nama_pelanggan`='$nama_pelanggan',
					`username`='$username',
					`password`='$password',
					`telepon`='$telepon' ,
					`email`='$email',
					`status`='$status',
					`alamat`='$alamat',
					`keterangan`='$keterangan'
					 where `id_pelanggan`='$id_pelanggan0'";
					 
				$ubah = process($conn, $sql);
				if ($ubah) {
					echo "<script>alert('Data $nama_pelanggan berhasil diubah !');document.location.href='?mnu=pelanggan';</script>";
				} else {
					echo "<script>alert('Data $nama_pelanggan gagal diubah...');document.location.href='?mnu=pelanggan';</script>";
				}
			} //else simpan
		}
		?>

		<?php
		if (isset($_GET["pro"]) && $_GET["pro"] == "hapus") {
			$id_pelanggan = $_GET["kode"];
			$sql = "delete from `$tbpelanggan` where `id_pelanggan`='$id_pelanggan'";
			$hapus = process($conn, $sql);
			if ($hapus) {
				echo "<script>alert('Data $id_pelanggan berhasil dihapus !');document.location.href='?mnu=pelanggan';</script>";
			} else {
				echo "<script>alert('Data $id_pelanggan gagal dihapus...');document.location.href='?mnu=pelanggan';</script>";
			}
		}
		?>