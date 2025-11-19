<style type="text/css">body {width: 100%;} </style> 
<body OnLoad="window.print()" OnFocus="window.close()"> 
<?php
include "../konmysqli.php";
echo"<link href='../ypathcss/$css' rel='stylesheet' type='text/css' />";
$YPATH="../ypathfile/";
$pk="";
$field="status";
$TB=$tbpelanggan;
$item="Pelanggan";



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
					<th width="10%">ID pelanggan</td>
					<th width="20%">Nama pelanggan</td>
					<th width="20%">Telepon</td>
					<th width="20%">Email</td>
					<th width="20%">status</td>
					<th width="20%">alamat</td>
					<th width="20%">Keterangan</td>
  </tr>
<?php  
  $jum=getJum($conn,$sql);
  $no=0;
		if($jum > 0){
	$arr=getData($conn,$sql);
		foreach($arr as $d) {								
		$no++;
				$id_pelanggan = $d["id_pelanggan"];
						$nama_pelanggan = ucwords($d["nama_pelanggan"]);
						$username = $d["username"];
						$password = $d["password"];
						$telepon = $d["telepon"];
						$email = $d["email"];
						$status = $d["status"];
						$alamat = $d["alamat"];
						$keterangan = $d["keterangan"];
				
			
				$color="#dddddd";		
					if($no %2==0){$color="#eeeeee";}
echo"<tr bgcolor='$color'>
				<td>$no</td>
				<td>$id_pelanggan</td>
				<td>$nama_pelanggan</td>
				<td>$telepon</td>
				<td>$email</td>		
				<td>$status</td>			
				<td>$alamat</td>			
				<td>$keterangan</td>
				</tr>";
				}
		}//if
		else{echo"<tr><td colspan='7'><blink>Maaf, Data $item belum tersedia...</blink></td></tr>";}
	
	echo"</table>";
	?>