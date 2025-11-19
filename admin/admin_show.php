<?php 
require_once"../konmysqli.php";
$respon = array();

$sql="SELECT * FROM `$tbadmin` order by `id_admin` desc";
$jum=getJum($conn,$sql);
if ($jum> 0) {
    $respon["record"] = array();  
	$arr=getData($conn,$sql);
		foreach($arr as $d) {
        $record = array();
            $record["id_admin"] = $d["id_admin"];
			$record["nama_admin"] = $d["nama_admin"];
			$record["username"] = $d["username"];
			$record["password"] = $d["password"];
			$record["telepon"] = $d["telepon"];
			$record["email"] = $d["email"];
			$record["status"] = $d["status"];
			$record["keterangan"] = $d["keterangan"];
			
        
        array_push($respon["record"], $record);       //tambahkan array 'record' pada array final 'respon'
    }
    // sukses
    $respon["sukses"] = 1;
	$respon["pesan"] = "$jum record";
    echo json_encode($respon);
} else {
    // jika data kosong
	$respon["record"]="";
    $respon["sukses"] = 0;
    $respon["pesan"] = "0 record";
    echo json_encode($respon);
}
?>
