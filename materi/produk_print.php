<style type="text/css">body {width: 100%;} </style> 
<body OnLoad="window.print()" OnFocus="window.close()"> 
<?php
include "../konmysqli.php";
echo"<link href='../ypathcss/$css' rel='stylesheet' type='text/css' />";
$YPATH="../ypathfile/";
$pk="";
$field="status";
$TB=$tbproduk;
$item="Produk";



  $sql="select * from `$TB` order by `$field` asc";
  if(isset($_GET["pk"])){
	$pk=$_GET["pk"];
		$sql="select * from `$TB` where `$field`='$pk' order by `$field` asc";
  }

  echo "<h3><center>Laporan Data $item $pk</h3>";
  ?>


 

<table width="98%" border="0">
  <tr>
  <th width="3%">No</td>
    <th width="10%">ID Produk</td>
					<th width="20%">Nama produk</td>
					<th width="20%">Deskripsi</td>
					<th width="20%">harga</td>
					<th width="20%">kategori</td>
					<th width="40%">gambar</td>
					<th width="20%">status</td>
					<th width="20%">Keterangan</td>
  </tr>
<?php  
  $jum=getJum($conn,$sql);
  $no=0;
		if($jum > 0){
	$arr=getData($conn,$sql);
		foreach($arr as $d) {								
		$no++;
				$id_produk = $d["id_produk"];
						$nama_produk = ucwords($d["nama_produk"]);
						$deskripsi = $d["deskripsi"];
						$gambar = $d["gambar"];
						$harga = $d["harga"];
						$kategori = $d["kategori"];
						$status = $d["status"];
						$keterangan = $d["keterangan"];
				
			
				$color="#dddddd";		
					if($no %2==0){$color="#eeeeee";}
echo"<tr bgcolor='$color'>
				<td>$no</td>
				<td>$id_produk</td>
 				<td>$nama_produk</td>
				<td>$deskripsi</td>
				<td>$harga</td>
				<td>$kategori</td>
<td><div align='center'>";
echo"<a href='#' onclick='buka(\"produk/zoom.php?id=$id_produk\")'>
<img src='../ypathfile/$gambar' width='40' height='40' /></a></div>";
				echo"</td>				
				<td>$status</td>			
				<td>$keterangan</td>
				</tr>";
				}
		}//if
		else{echo"<tr><td colspan='7'><blink>Maaf, Data $item belum tersedia...</blink></td></tr>";}
	
	echo"</table>";
	?>