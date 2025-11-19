<style type="text/css">body {width: 100%;} </style> 
<body OnLoad="window.print()" OnFocus="window.close()"> 
<?php
include "../konmysqli.php";
$YPATH="../ypathfile/";
$pk="";
$field="status";
$TB=$tbadmin;
$item="Admin";


  $sql="select * from `$TB` order by `$field` asc";
  if(isset($_GET["pk"])){
	$pk=$_GET["pk"];
		$sql="select * from `$TB` where `$field`='$pk' order by `$field` asc";
  }

  ?>




  <table width="100%" border="0">
    <tr>
      <td width="3%" height="135" rowspan="4">&nbsp;</td>
      <td width="13%" rowspan="4" valign="top"><img src="../ypathfile/avatar.jpg" width="142" height="150" /></td>
      <td colspan="4" align="center" valign="top"><h2>YAYASAN LEMBAGA PEDULI PENDIDIKA MASYARAKAT ARAY</h2></td>
      <td width="2%" rowspan="4">&nbsp;</td>
    </tr>
    <tr>
      <td colspan="4" align="center" valign="top"><span class="fadeOut">Jl.Raya Lenteng Agung Timur No.6</td>
    </tr>
    <tr>
      <td colspan="4" align="center" valign="top">Kelurahan Serangseng Sawah, Kecamatan Jagakarsa, Jakarata Selatan 12640</td>
    </tr>
    <tr>
      <td height="24" colspan="4" align="center" valign="top"><img src="../ypathicon/icon012.jpg" width="19" height="21" />021-22712148/0852-7995-9498/0812-9474-9521</td>
    </tr>
    <tr>
      <td colspan="7"><hr></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td width="41%">&nbsp;</td>
      <td width="14%">&nbsp;</td>
      <td width="26%" align="right">Jakarta, Agustus 2020</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>No</td>
      <td>:</td>
      <td>03/SE-LP2MA/VIII/2020</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>Perihal</td>
      <td>:</td>
      <td>Nota Pengeluaran </td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>Kepada</td>
      <td>:</td>
      <td>Seluruh staff Adm &amp; Siswa/i LP2M Aray</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td width="1%">&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td height="121">&nbsp;</td>
      <td colspan="5" align="center" valign="top">
      
      
      
     <table width="98%" border="1">
  <tr bgcolor="#cccccc">
  <th width="3%">No</td>
    <th width="10%">Id_Admin</td>
    <th width="20%">Nama_Admin</td>
    <th width="20%">Telepon</td>
	 <th width="20%">keterangan</td>
  </tr>
<?php  
  $jum=getJumM($conn,$sql);
  $no=0;
		if($jum > 0){
	$arr=getDataM($conn,$sql);
		foreach($arr as $d) {								
		$no++;
				$id_admin=$d["id_admin"];
				$nama_admin=strtoupper($d["nama_admin"]);
				$username=$d["username"];
				$password=$d["password"];
				$telepon=$d["telepon"];
				$email=$d["email"];
				$status=$d["status"];
				$keterangan=$d["keterangan"];
				
			
				$color="#dddddd";		
					if($no %2==0){$color="#eeeeee";}
echo"<tr bgcolor='$color'>
				<td>$no</td>
				<td>$id_admin</td>
				<td><a href='mailto:$email'>$nama_admin</a></td>
				<td>$telepon</td>
				<td>$keterangan</td>
				</tr>";
				}
		}//if
		else{echo"<tr><td colspan='7'><blink>Maaf, Data $item belum tersedia...</blink></td></tr>";}
	echo"</table>";
	?>
      </td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td colspan="5">&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td colspan="4">&nbsp;</td>
      <td align="center" valign="top"><p>TTD</p>
      <p>&nbsp;</p>
      <p>___________________</p></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td colspan="5">&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
  </table>
 

