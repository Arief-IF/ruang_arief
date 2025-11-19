<?php 
require_once"../konmysqli.php";

$respon = array();
if (isset($_GET['nama_admin'])) { 

 $sql="select `id_admin` from `$tbadmin` order by `id_admin` desc";
  $jum= getJum($conn,$sql);
  $kd="ADM";
		if($jum > 0){
				$d=getField($conn,$sql);
    			$idmax=$d['id_admin'];	
				$urut=substr($idmax,3,2)+1;//01
				if($urut<10){$idmax="$kd"."0".$urut;}
				else{$idmax="$kd".$urut;}
			}
		else{$idmax="$kd"."01";}
  $id_admin=$idmax;
  
		$nama_admin= $_GET['nama_admin'];
		$username = $_GET['username'];
		$password = $_GET['password'];
		$telepon = $_GET['telepon'];
		$email = $_GET['email'];
		$status = "Aktif";
		$keterangan = "";

	$sql="INSERT INTO `$tbadmin` (
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
$simpan=process($conn,$sql);

   if($simpan){
        $respon["sukses"] = 1;
        $respon["pesan"] = "1 sukses tambah.";
        echo json_encode($respon);
    } else {
        $respon["sukses"] = 0;
        $respon["pesan"] = "0 gagal tambah";
        echo json_encode($respon);
    }
} else {
    $respon["sukses"] = 0;
    $respon["pesan"] = "? lengkapi data";
    echo json_encode($respon);
}
?>

