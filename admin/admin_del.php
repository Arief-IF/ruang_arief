<?php 
require_once"../konmysqli.php";
$response = array();
//http://localhost/rumput/admin/admin_del.php?id_admin=ADM01
if (isset($_GET['id_admin'])) {
    $id_admin = $_GET['id_admin'];
	$sql="DELETE FROM `$tbadmin` WHERE `id_admin` = '$id_admin'";
	$hapus=process($conn,$sql);
   if($hapus){
        $respon["sukses"] = 1;
        $respon["pesan"] = "1 berhasil dihapus";
        echo json_encode($respon);
    } else {
        $respon["sukses"] = 0;
        $respon["pesan"] = "0 Gagal dihapus";
        echo json_encode($respon);
    }
} else {
    $respon["sukses"] = 0;
    $respon["pesan"] = "? lengkapi data";
    echo json_encode($respon);
}
?>



