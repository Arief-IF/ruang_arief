<?php
if (version_compare(phpversion(), "5.3.0", ">=")  == 1)
	error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED);
else
	error_reporting(E_ALL & ~E_NOTICE);
?>
<?php
session_start();
//error_reporting(0);
require_once "konmysqli.php";

$mnu = "";
if (isset($_GET["mnu"])) {
	$mnu = $_GET["mnu"];
}

if(!isset($_SESSION["cid"])){
die("<script>location.href='login.php';</script>");

}


require_once"layout/head.php";
require_once"layout/navbar.php";
require_once"layout/sidebar.php";
?>
<div class="main-container">
		<div class="pd-ltr-20 xs-pd-20-10">
			<div class="min-height-200px">
				<div class="page-header">
					<div class="row">
						<div class="col-md-12">
							<?php
								if($mnu=="admin"){include"admin/admin.php";} 
								else if($mnu=="siswa"){include"siswa/siswa.php";}
								else if($mnu=="materi"){include"materi/materi.php";}
								else if($mnu=="evaluasi"){include"evaluasi/evaluasi.php";}
								else if($mnu=="evaluasid"){include"evaluasi/evaluasid.php";}
								else if($mnu=="nilai"){include"nilai/nilai.php";}
								
								else if($mnu=="sprofile"){include"sprofile.php";}
								else if($mnu=="smateri"){include"materi/smateri.php";}
								else if($mnu=="snilai"){include"nilai/snilai.php";}

								else if($mnu=="login"){include"login.php";}
								else if($mnu=="register"){include"register.php";}
								else if($mnu=="logout"){include"logout.php";}
								else if($mnu=="produk"){include"produk.php";}
								else{include"home.php";}
								?>
				
			            </div>
					</div>
				</div>
			</div>
			<div class="footer-wrap pd-20 mb-20 card-box">
				Aplikasi ini adalah media pembelajaran online RuangArief. Sistem ini ada dalam rangka mengikuti perkembangan teknologi.</a>
		    </div>
		</div>
	</div>


			
<?php
  include"layout/js.php";
 ?>
 

	

	

	

	
