<?php 
require_once"../konmysqli.php";
$respon = array();

//http://localhost/rumput/admin/admin_update.php?id_admin=ADM02&nama_admin=2&username=3&password=4&telepon=5&email=6&status=7&keterangan=8
if (isset($_GET['id_admin'])) {    
		$id_admin= $_GET['id_admin'];
		$nama_admin= $_GET['nama_admin'];
		$username = $_GET['username'];
		$password = $_GET['password'];
		$telepon = $_GET['telepon'];
		$email = $_GET['email'];
		$status = $_GET['status'];
		$keterangan = $_GET['keterangan'];

	$sql="UPDATE `$tbadmin` SET 
	`nama_admin` = '$nama_admin',
	`username` = '$username', 
	`password` = '$password', 
	`telepon` = '$telepon', 
	`email` = '$email', 
	`keterangan` = '$keterangan', 
	`status` = '$status' 
	WHERE `id_admin` = '$id_admin'";
    $ubah=process($conn,$sql);

    if ($ubah) {
        $respon["sukses"] = 1;
        $respon["pesan"] = "1 sukses update.";     
        echo json_encode($respon);
    } else {
        $respon["sukses"] = 0;
        $respon["pesan"] = "Gagal update data.";
        echo json_encode($respon);
        
    }
} else {
    $respon["sukses"] = 0;
    $respon["pesan"] = "data belum terset/terisi";
    echo json_encode($respon);
}
?>


