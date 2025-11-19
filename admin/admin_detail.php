<?php 
require_once"../konmysqli.php";
$respon = array();
//http://localhost/rumput/admin/admin_detail.php?id_admin=ADM02
if (isset($_GET["id_admin"])) {
    $id_admin = $_GET['id_admin'];
	$sql="SELECT * FROM `$tbadmin` WHERE `id_admin` = '$id_admin'";
    $jum=getJum($conn,$sql);
    if ($jum>0) {
            $d=getField($conn,$sql);
		    $record = array();
            $record["id_admin"] = $d["id_admin"];
			$record["nama_admin"] = $d["nama_admin"];
			$record["username"] = $d["username"];
			$record["password"] = $d["password"];
			$record["telepon"] = $d["telepon"];
			$record["email"] = $d["email"];
			$record["status"] = $d["status"];
			$record["keterangan"] = $d["keterangan"];
			
            $respon["sukses"] = 1;
            $respon["record"] = array();
			
            array_push($respon["record"], $record);
             $respon["pesan"] = "$jum record";
			echo json_encode($respon);
        } else {
            $respon["sukses"] = 0;
            $respon["pesan"] = "0 record";
            echo json_encode($respon);
        }

} else {
    $respon["sukses"] = 0;
    $respon["pesan"] = "? lengkapi data";
    echo json_encode($respon);
}
?>
